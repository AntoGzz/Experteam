@extends('layouts.template')
@section('title', 'Registrar Factura')
@section('styles')
  <link rel="stylesheet" href="{{ asset('assets/css/toastr.min.css') }}">
@endsection
@section('content')
	<div class="content-wrapper">
          <div class="page-header">
            <h3 class="page-title">
              Ingreso de Pago
            </h3>
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('payments.index') }}">Pagos</a></li>
                <li class="breadcrumb-item active" aria-current="page">Crear Nueva</li>
              </ol>
            </nav>
          </div>
          @if (session()->has('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif
          <div class="card">
            <div class="card-body">
              {!! Form::open(['route'=>'payments.store', 'method'=>'POST']) !!}
                <div class="card-body">

                    <div class="d-flex justify-content-between">
                        <h4 class="card-title">Registro de Pago</h4>
                    </div>


                  @livewire('payments')

                </div>


                {!! Form::close() !!}
            </div>
          </div>
        </div>
@endsection
@section('scripts')
    {!! Html::script('assets/js/select2.js') !!}
    {!! Html::script('assets/js/alerts.js') !!}
    {!! Html::script('assets/js/avgrund.js') !!}
    {!! Html::script('assets/js/toastr.min.js') !!}
@endsection
