@extends('layouts.template')
@section('title', 'Factura')
@section('content')
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">
                Datos de Factura: {{ $invoice->Establecimiento }}
            </h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('invoices.index') }}">Facturas</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Crear Nueva</li>
                </ol>
            </nav>
        </div>
        <div class="card">
            <div class="card-body">
                {{-- <h4 class="card-title">Facturas</h4> --}}

                <div class="row">
                    <div class="col-12">
                        <div class="row">
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="Establecimiento"><strong>Establecimiento</strong></label>
                                    <input type="text" value="{{ $invoice->Establecimiento }}" name="Establecimiento"
                                        id="Establecimiento" class="form-control" placeholder="Ingrese el Establecimiento" autofocus
                                        required maxlength="3" disabled>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="PuntoEmision"><strong>Punto Emision</strong></label>
                                    <input type="text" name="PuntoEmision" value="{{ $invoice->PuntoEmision }}" id="PuntoEmision"
                                        class="form-control" placeholder="Ingrese el punto de emision" maxlength="3" disabled>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="Secuencial"><strong>Secuencial</strong></label>
                                    <input type="number" name="Secuencial" value="{{ $invoice->Secuencial }}" id="Secuencial"
                                        class="form-control" placeholder="Ingrese el secuencial" disabled>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="FechaEmision"><strong>Fecha de Emisión</strong></label>
                                    <input type="texr" value="{{ $invoice->FechaEmision }}" name="FechaEmision"
                                        id="FechaEmision" class="form-control" placeholder="Ingrese la Fecha de Emision" autofocus
                                        required readonly>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="Subtotal"><strong>Subtotal</strong></label>
                                    <input type="text" name="Subtotal" value="{{ $invoice->Subtotal }}" id="Subtotal"
                                        class="form-control" readonly>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="form-group">
                                    <label for="Impuesto"><strong>Impuesto</strong></label>
                                    <input type="text" name="Impuesto" value="{{ $invoice->Impuesto }}" id="Impuesto"
                                        class="form-control" readonly>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="form-group">
                                    <label for="Total"><strong>Total</strong></label>
                                    <input type="text" name="Total" value="{{ $invoice->Total }}" id="Total"
                                        class="form-control" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 d-flex justify-content-between">
                            <a href="{{ route('invoices.edit', $invoice) }}" class="col-6 btn btn-success">Editar</a>
                            <a href="{{ route('invoices.index') }}" class="col-6 btn btn-primary btn-block">Regresar</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
