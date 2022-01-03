<?php

namespace App\Http\Livewire;

use App\Guide;
use App\Invoice;
use App\Country;
use App\GuidesInvoices;
use Livewire\Component;

class Invoices extends Component
{
    public $guide_id, $FechaEmision, $PuntoEmision, $Establecimiento, $Secuencial, $tax = 12; //Array para la tabla de Factura
    public $subtotal, $taxiva, $itemtotal, $total, $price_guide; // Para la tabla de detalle de la factura
    public $selected_id, $search; // Seleccionar y buscar
    public $guides, $guide; // Para los listados
    public $orderInvoices = []; // Array del detalle de factura
    public $action = 1;

    public function render()
    {
        $this->countries = Country::all();
        $this->guides = Guide::all();
        if ( $this->selected_id > 0 ){
            $this->guide = Guide::find($this->selected_id);
            $this->guide_id = $this->guide->id;
            return view('livewire.invoices', [
                'guides' => $this->guides,
                'guide' => $this->guide_id,
                'countries' => $this->countries,
                'orderInvoices' => $this->orderInvoices,
            ]);
        }else{
            return view('livewire.invoices', [
                'guides' => $this->guides,
                'guide' => $this->guide_id,
                'countries' => $this->countries,
                'orderInvoices' => $this->orderInvoices,
            ]);
        }
    }

    public function doAction($action)
    {
        $this->selected_id = $action;
    }

    public function resetInput()
    {
        $this->guide_id = '';
        $this->price_guide = null;
    }

    public function addGuia()
    {
        if ($this->guide_id == '' || $this->price_guide == '')
        {
            $this->emit('msg-error', 'Ingrese todos los campos para agregar una guia a la lista');
        }else{
            $guide = Guide::find($this->guide_id);
            $NumeroGuia = $guide->NumeroGuia;
            $this->itemtotal = floatval($this->price_guide);
            $this->subtotal = floatval($this->subtotal) + floatval($this->itemtotal);
            $this->taxiva = (floatval($this->subtotal) * floatval($this->tax)) / 100;
            $this->total = floatval($this->subtotal) + floatval($this->taxiva);

            $orderInvoices = array(
                'guide_id' => $this->guide_id,
                'NumeroGuia' => $NumeroGuia,
                'price_guide' => $this->price_guide,
                'itemtotal' => $this->itemtotal,
            );
            $this->orderInvoices[] = $orderInvoices;
            $this->emit('msgok', 'Agregado con éxito' );
            $this->resetInput();
        }
    }

    public function removeItem($key)
    {
        $this->subtotal = $this->subtotal - $this->orderInvoices[$key]['itemtotal'];
        $this->taxiva = (floatval($this->subtotal) * floatval($this->tax)) / 100;
        $this->total = floatval($this->subtotal) + floatval($this->taxiva);
        unset($this->orderInvoices[$key]);
        $this->emit('msgDel', 'Eliminado con éxito' );
    }

    public function storeGuide()
    {
        if ($this->Secuencial == '' || $this->PuntoEmision == '' || $this->Establecimiento == '' || $this->FechaEmision == '')
        {
            $this->emit('msg-error', 'Ingrese los campos de la guia para poder guardar la factura');
        }else{
            $this->validate([
                'guide_id' => 'required',
                'Secuencial' => 'required',
                'PuntoEmision' => 'required',
                'Establecimiento' => 'required',
                'FechaEmision' => 'required',
            ]);

            $invoice = Invoice::create([
                'guide_id' => $this->guide_id,
                'user_id' => Auth()->user()->id,
                'Establecimiento' => $this->Establecimiento,
                'PuntoEmision' => $this->PuntoEmision,
                'Secuencial' => $this->Secuencial,
                'FechaEmision' => $this->FechaEmision,
                'Subtotal' => $this->subtotal,
                'Impuesto' => $this->taxiva,
                'Total' => $this->total
            ]);

            foreach ($this->orderInvoices as $key => $guide) {
                $results = array(
                    "invoice_id" => $invoice->id,
                    "guide_id" => $guide['guide_id'],
                    "created_at" => now(),
                    "updated_at" => now()
                );
                GuidesInvoices::insert($results);
            }

            $this->emit('msgok', 'Factura creada con éxito');
            return redirect()->route('invoices.index');
        }

    }
}
