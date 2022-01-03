@extends('layouts.template')
@section('title', 'Lista de Factura')
@section('styles')
<style type="text/css">
    .unstyled-button{
    border: none;
    padding: 0;
    background: none;
    }
</style>
@endsection
@section('content')
<div class="content-wrapper">
    <div class="page-header">
        <h3 class="page-title">
        Lista de Facturas
        </h3>

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Facturas</li>
            </ol>
        </nav>
    </div>
    <div class="card">
        <div class="card-body">
            <div class="d-flex justify-content-between">
                <div>
                    <h3>Facturas</h3>
                </div>
                <div>
                    <a href="#" class="btn btn-success">
                        <i class="fas fa-download"></i>
                    </a>
                <a href="{{ route('invoices.create') }}" class="btn btn-primary"><i class="fa fa-plus-circle"></i></a >
            </div>
        </div><br>
        <div class="row">
            <div class="col-12">
                <div class="table-responsive">
                    <table id="order-listing" class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>ESTABLECIMIENTO</th>
                                <th>PUNTO DE EMISION</th>
                                <th>SECUENCIAL</th>
                                <th>FECHA DE EMISION</th>
                                <th>SUBTOTAL</th>
                                <th>IMPUESTO</th>
                                <th>TOTAL</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($invoices as $invoice)
                            <tr>
                                <td scope="row">{{ $invoice->id }}</td>
                                <td>
                                    <a href="{{ route('invoices.show', $invoice->id) }}">{{ $invoice->Establecimiento }}</a>
                                </td>
                                <td>{{ $invoice->PuntoEmision }}</td>
                                <td>{{ $invoice->Secuencial }}</td>
                                <td>{{ $invoice->FechaEmision }}</td>
                                <td>{{ $invoice->Subtotal }}</td>
                                <td>{{ $invoice->Impuesto }}</td>
                                <td>{{ $invoice->Total }}</td>

                                <td>
                                    {!! Form::open(['route' => ['invoices.destroy', $invoice ], 'method' => 'DELETE']) !!}
                                    <a href="{{ route('invoices.edit', $invoice) }}" title="Editar" class="jsgrid-button jsgrid-edit-button">
                                        <i class="far fa-edit"></i>
                                    </a>
                                    <button title="Eliminar" class="jsgrid-button jsgrid-delete-button unstyled-button">
                                    <i class="far fa-trash-alt" type="submit"></i>
                                    </button>
                                    {!! Form::close() !!}
                                </td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
@section('scripts')
    <script src="{{asset ('assets/js/data-table.js')}}"></script>

@endsection
