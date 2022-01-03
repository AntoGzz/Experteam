<?php

namespace App\Http\Livewire;

use App\Invoice;
use App\Payment;
use App\InvoicesPayments;
use Livewire\Component;

class Payments extends Component
{
    public $invoice_id, $TipoPago, $Total, $tax = 12; //Array para la tabla de Factura
    public $subtotal, $taxiva, $itemtotal, $total, $price_invoice; // Para la tabla de detalle de la factura
    public $selected_id, $search; // Seleccionar y buscar
    public $invoices, $invoice; // Para los listados
    public $orderPayments = []; // Array del detalle de factura
    public $action = 1;

    public function render()
    {
        $this->invoices = Invoice::all();
        if ( $this->selected_id > 0 ){
            $this->invoice = Invoice::find($this->selected_id);
            $this->invoice_id = $this->invoice->id;
            return view('livewire.payments', [
                'invoices' => $this->invoices,
                'invoice' => $this->invoice_id,
                'orderPayments' => $this->orderPayments,
            ]);
        }else{
            return view('livewire.payments', [
                'invoices' => $this->invoices,
                'invoice' => $this->invoice_id,
                'orderPayments' => $this->orderPayments,
            ]);
        }
    }

    public function doAction($action)
    {
        $this->selected_id = $action;
    }

    public function resetInput()
    {
        $this->invoice_id = '';
        $this->price_invoice = null;
    }

    public function addInvoice()
    {
        if ($this->invoice_id == '' || $this->price_invoice == '')
        {
            $this->emit('msg-error', 'Ingrese todos los campos para agregar una guia a la lista');
        }else{
            $invoice = Invoice::find($this->invoice_id);
            $Secuencial = $invoice->Secuencial;
            $this->itemtotal = floatval($this->price_invoice);
            $this->subtotal = floatval($this->subtotal) - floatval($this->itemtotal);
            // $this->taxiva = (floatval($this->subtotal) * floatval($this->tax)) / 100;
            $this->total = floatval($this->subtotal);

            $orderPayments = array(
                'invoice_id' => $this->invoice_id,
                'Secuencial' => $Secuencial,
                'price_invoice' => $this->price_invoice,
                'itemtotal' => $this->itemtotal,
            );
            $this->orderPayments[] = $orderPayments;
            $this->emit('msgok', 'Agregado con éxito' );
            $this->resetInput();
        }
    }

    public function removeItem($key)
    {
        $this->subtotal = $this->subtotal + $this->orderPayments[$key]['itemtotal'];
        // $this->taxiva = (floatval($this->subtotal) * floatval($this->tax)) / 100;
        $this->total = floatval($this->subtotal);
        unset($this->orderPayments[$key]);
        $this->emit('msgDel', 'Eliminado con éxito' );
    }

    public function storePayment()
    {
        if ($this->TipoPago == '' || $this->Total == '' )
        {
            $this->emit('msg-error', 'Ingrese los campos de la factura para poder guardar el pago');
        }else{
            $this->validate([
                'invoice_id' => 'required',
                'TipoPago' => 'required',
                'Total' => 'required',
            ]);

            $payment = Payment::create([
                'invoice_id' => $this->invoice_id,
                'user_id' => Auth()->user()->id,
                'TipoPago' => $this->TipoPago,
                // 'Subtotal' => $this->subtotal,
                // 'Impuesto' => $this->taxiva,
                'Total' => $this->Total
            ]);

            $invoice = InvoicesPayments::create([
                "payment_id" => $payment->id,
                "invoice_id" => $this->invoice_id,
                "created_at" => now(),
                "updated_at" => now()
            ]);

            $this->emit('msgok', 'Pago creado con éxito');
            return redirect()->route('payments.index');
        }

    }
}
