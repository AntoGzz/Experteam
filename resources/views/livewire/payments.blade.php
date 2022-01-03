<div>
    @if ($selected_id > 0)
        <div class="row">
            <div class="col-12 grid-margin">
                <div class="card">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="card-body">
                                <h5 class="mb-4">
                                    Secuencial de Factura: <strong>{{ $invoice->Secuencial }}</strong>
                                </h5>
                                <p class="ml-5"><strong> Datos Factura </strong></p>
                                <p class="ml-5">Establecimiento: <strong>{{ $invoice->Establecimiento }}</strong></p>
                                <p class="ml-5">Punto Emision: <strong>{{ $invoice->PuntoEmision }}</strong></p>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card-body">
                                <h5 class="mb-4">
                                    Fecha de Emision: <strong>{{ $invoice->FechaEmision }}</strong>
                                </h5>
                                <button type="button" wire:click="doAction(0)" class="btn btn-outline-secondary btn-rounded btn-icon float-right">
                                    <i class="fa fa-trash text-danger"></i>
                                </button>
                                <p class="ml-5">Sub-Total: <strong>$ {{ $invoice->Subtotal }}</strong></p>
                                <p class="ml-5">Impuesto: <strong>$ {{ $invoice->Impuesto }}</strong></p>
                                <p class="ml-5">Total: <strong>$ {{ $invoice->Total }}</strong></p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <card-body class="mb-3">
                                <div class="col-md-6 float-left mt-2">
                                    <label>Tipo Pago: </label>
                                    <select id="TipoPago" name="TipoPago" class="form-control text-center" wire:model="TipoPago">
                                        <option value="Elegir">>-- Seleccione --<</option>
                                        <option value="EFECTIVO">>-- EFECTIVO --<</option>
                                        <option value="TRANSFERENCIA">>-- TRANSFERENCIA --<</option>
                                        <option value="CHEQUE">>-- CHEQUE --<</option>
                                    </select>
                                </div>
                                <div class="col-md-6 float-left mt-2">
                                    <label>Monto del Pago: </label>
                                    <input type="text" class="form-control" wire:model="Total" maxlength="3">
                                </div>
                                <div class="col-md-6 float-left mt-2">
                                    <label>Restante: </label>
                                    <input type="text" class="form-control"  maxlength="3" placeholder="${{ $invoice->Total }}" readonly>
                                </div>
                            </card-body>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @else
        <div class="row">
            <div class="col-12 grid-margin">
                <div class="card">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card-body">
                                <label>Seleccione una Factura: </label>
                                <select class="form-control form-control-lg" wire:model.lazy="selected_id">
                                    <option value="Elegir">>-- Seleccione --<</option>
                                    @foreach ($invoices as $invoice)
                                    <option value="{{$invoice->id}}">{{$invoice->Secuencial}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card-body">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif

    {{-- <div class="form-control">
        <div class="row">
            <div class="col-md-5 grid-margin grid-margin-10-0">
                <div class="form-group" wire:ignore>
                    <label><strong>Buscar Factura</strong></label>
                    <select class="form-control form-control-lg" wire:model="selected_id">
                        <option value="Elegir">>-- Elegir Factura --<</option>
                        @foreach ($invoices as $invoice)
                            <option value="{{ $invoice->id }}"> {{ $invoice->Secuencial }} </option>
                        @endforeach
                    </select>
                </div>
            </div>
            @if ($invoice_id > 0)
            <div class="col-md-6">
                <div class="form-group">
                    @if ($invoice_id > 0)
                        @foreach ($invoices as $invoice)
                            @if ($invoice->id == $invoice_id)
                                <label>Total Factura - Confirme el monto <strong>{{$invoice->Total}}</strong> en el campo de abajo</label>
                                <input type="number" wire:model="price_invoice" class="form-control" placeholder="{{$invoice->Total}}">
                            @endif
                        @endforeach
                    @endif
                </div>
            </div>
            <div class="col-md-1">
                <div class="form-group">
                    <button class="btn btn-primary float-right mt-4 ml-2" wire:click.prevent="addInvoice()"> Agregar</button>
                </div>
            </div>
            @endif
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card px2">
                    <div class="card-body">
                        <div class="container-fluid mt-5 d-flex justify-content-center w-100">
                            <div class="table-responsive w-100">
                                <table class="table">
                                    <thead>
                                        <tr class="bg-dark text-white">
                                            <th>#</th>
                                            <th class="text-center">Descripcion</th>
                                            <th class="text-center">Total del Pago por Factura</th>
                                            <th class="text-center">Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($orderInvoices as $key => $invoice)
                                            <tr class="text-center" wire:key="{{ $key }}"></tr>
                                            <td class="text-center"> {{ $key + 1 }} </td>
                                            <td class="text-center"> {{ $invoice['Secuencial'] }} </td>
                                            <td class="text-center">{{ $invoice['price_invoice'] }}</td>
                                            <td class="text-center">
                                                <button class="btn btn-danger btn-sm" wire:click.prevent="removeItem({{$key}})">X</button>
                                            </td>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="container-fluid mt-5 w-100">
                            <p class="text-right mb-2">SubTotal: ${{ $subtotal }}</p>
                            <h4 class="text-right mb-2">Total: ${{ $invoice->Total }}</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
    <div class="form-group mr-2 mt-4 float-right">
        <a href="{{ route('payments.index')}}" class="btn btn-light">Cancelar</a>
        <button type="submit" class="btn btn-primary" wire:click.prevent="storePayment()">Guardar</button>
    </div>
</div>
