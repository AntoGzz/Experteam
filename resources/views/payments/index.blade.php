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
        Lista de Pagos
        </h3>

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Pagos</li>
            </ol>
        </nav>
    </div>
    <div class="card">
        <div class="card-body">
            <div class="d-flex justify-content-between">
                <div>
                    <h3>Pagos</h3>
                </div>
                <div>
                    <a href="#" class="btn btn-success">
                        <i class="fas fa-download"></i>
                    </a>
                <a href="{{ route('payments.create') }}" class="btn btn-primary"><i class="fa fa-plus-circle"></i></a >
            </div>
        </div><br>
        <div class="row">
            <div class="col-12">
                <div class="table-responsive">
                    <table id="order-listing" class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>TIPO DE PAGO</th>
                                <th>TOTAL</th>
                                <th>FACTURA N°</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($payments as $payment)
                            <tr>
                                <td scope="row">{{ $payment->id }}</td>
                                {{-- <td> --}}
                                    {{-- <a href="{{ route('payments.show', $payment->id) }}">{{ $payment->Establecimiento }}</a> --}}
                                {{-- </td> --}}
                                <td>{{ $payment->TipoPago }}</td>
                                <td>{{ $payment->Total }}</td>
                                {{-- <td>@foreach ($invoices as $invoice)
                                        @if ($invoice->id == $invoicesPayments->invoice_id)
                                        {{ $invoice->Secuencial}}
                                        @endif
                                    @endforeach</td> --}}
                                <td>@foreach ($invoicesPayments as $invoicesPayment)
                                    @if ($invoicesPayment->payment_id == $payment->id)
                                    {{ $invoicesPayment->invoice_id }}
                                    @endif
                                @endforeach</td>
                                {{-- <td> @foreach ($invoices as $invoice) @if ($invoice->id == $invoicesPayments->invoice_id) {{ $invoice->Secuencial }} @endif @endforeach</td> --}}

                                <td>
                                    {!! Form::open(['route' => ['payments.destroy', $payment ], 'method' => 'DELETE']) !!}
                                    <a href="{{ route('payments.edit', $payment) }}" title="Editar" class="jsgrid-button jsgrid-edit-button">
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
