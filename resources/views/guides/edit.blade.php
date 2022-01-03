@extends('layouts.template')
@section('title', 'Editar Guia')
@section('styles')
  <link rel="stylesheet" href="{{asset('assets/vendors/lightgallery/css/lightgallery.css') }}">
@endsection
@section('content')
  <div class="content-wrapper">
          <div class="page-header">
            <h3 class="page-title">
              Editar Guia
            </h3>
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('guides.index') }}">Guias</a></li>
                <li class="breadcrumb-item active" aria-current="page">Editar {{$guide->NumeroGuia}}</li>
              </ol>
            </nav>
          </div>
          <div class="card">
            <div class="card-body">
              {{-- <h4 class="card-title">Guias</h4> --}}

              <div class="row">
                  <div class="col-12">
                    {!! Form::model($guide, ['route' => ['guides.update', $guide], 'method' => 'PUT', 'files' => true]) !!}
                       <div class="form-control">
                        <hr class="solid">
                        <h2 style="text-align:center"><strong>Datos de la Guia</strong></h2>
                        <hr class="solid">
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="NumeroGuia"><strong>Numero de Guia</strong></label>
                                    <input type="number" onKeyDown="if(this.value.length==8 && event.keyCode!=8) return false;"  value="{{ $guide->NumeroGuia }}" name="NumeroGuia"
                                        id="NumeroGuia" class="form-control" placeholder="Ingrese el numero de la Guia"
                                        autofocus required>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="FechaEnvio"><strong>Fecha de Envio</strong></label>
                                    <input type="text" value="{{ $guide->FechaEnvio }}" name="FechaEnvio"
                                        id="FechaEnvio" class="form-control" placeholder="Ingrese la fecha de envio"
                                        autofocus required readonly>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="Total"><strong>Total</strong></label>
                                    <input type="number" step="0.01" value="{{ $guide->Total }}" name="Total"
                                        id="Total" class="form-control" placeholder="Ingrese el valor total"
                                        autofocus required>
                                </div>
                            </div>
                        </div>
                        <hr class="solid">
                        <h2 style="text-align:center"><strong>Datos del Remitente</strong></h2>
                        <hr class="solid">
                        <div class="row">
                            <div class="col-lg-3">
                                <div class="form-group">
                                    {{-- <label for="PaisOrigen"><strong>Pais de Origen</strong></label>
                                    <input type="text" value="{{ $guide->PaisOrigen }}" name="PaisOrigen"
                                        id="PaisOrigen" class="form-control"
                                        placeholder="Ingrese el Pais de Origen de la Guia" autofocus required> --}}
                                    <label for="PaisOrigen"><strong>Categoría</strong></label>
                                    <select name="PaisOrigen" class="form-control form-control-lg">
                                    <option>--- Seleccione uno ---</option>
                                        @foreach ($countries as $country)
                                        <option value="{{ $country->id }}"
                                            @if ($country->id == $guide->PaisOrigen)
                                            selected
                                            @endif

                                        >{{ $country->name }}</option>
                                    @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label for="NombreRemitente"><strong>Nombre Remitente</strong></label>
                                    <input type="text" maxlength="100" value="{{ $guide->NombreRemitente }}" name="NombreRemitente"
                                        id="NombreRemitente" class="form-control"
                                        placeholder="Ingrese el Nombre del Remitente de la Guia" required>
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <div class="form-group">
                                    <label for="DireccionRemitente"><strong>Direccion Remitente</strong></label>
                                    <input type="text" maxlength="100" value="{{ $guide->DireccionRemitente }}"
                                        name="DireccionRemitente" id="DireccionRemitente" class="form-control"
                                        placeholder="Ingrese la Direccion del Remitente de la Guia" required>
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <div class="form-group">
                                    <label for="TelefonoRemitente"><strong>Telefono del Remitente</strong></label>
                                    <input type="tel" maxlength="50" value="{{ $guide->TelefonoRemitente }}"
                                        name="TelefonoRemitente" id="TelefonoRemitente" class="form-control"
                                        placeholder="Ingrese el Telefono del Remitente de la Guia" required>
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <div class="form-group">
                                    <label for="EmailRemitente"><strong>Email Remitente</strong></label>
                                    <input type="email" maxlength="50" value="{{ $guide->EmailRemitente }}"
                                        name="EmailRemitente" id="EmailRemitente" class="form-control"
                                        placeholder="Ingrese la Email del Remitente de la Guia" required>
                                </div>
                            </div>
                        </div>
                        <hr class="solid">
                        <h2 style="text-align:center"><strong>Datos del Destinatario</strong></h2>
                        <hr class="solid">
                        <div class="row">
                            <div class="col-lg-3">
                                <div class="form-group">
                                    {{-- <label for="PaisDestino"><strong>Pais de Destino</strong></label>
                                    <input type="text" maxlength="100" value="{{ $guide->PaisDestino }}" name="PaisDestino"
                                        id="PaisDestino" class="form-control"
                                        placeholder="Ingrese el Pais de Destino de la Guia" autofocus required> --}}
                                    <label for="PaisDestino"><strong>Categoría</strong></label>
                                    <select name="PaisDestino" class="form-control form-control-lg">
                                    <option>--- Seleccione uno ---</option>
                                        @foreach ($countries as $country)
                                        <option value="{{ $country->id }}"
                                            @if ($country->id == $guide->PaisDestino)
                                            selected
                                            @endif

                                        >{{ $country->name }}</option>
                                    @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label for="NombreDestinatario"><strong>Nombre Destinatario</strong></label>
                                    <input type="text" maxlength="100" value="{{ $guide->NombreDestinatario }}" name="NombreDestinatario"
                                        id="NombreDestinatario" class="form-control"
                                        placeholder="Ingrese el Nombre del Destinatario de la Guia" required>
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <div class="form-group">
                                    <label for="DireccionDestinatario"><strong>Direccion Destinatario</strong></label>
                                    <input type="text" maxlength="100" value="{{ $guide->DireccionDestinatario }}"
                                        name="DireccionDestinatario" id="DireccionDestinatario" class="form-control"
                                        placeholder="Ingrese la Direccion del Destinatario de la Guia" required>
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <div class="form-group">
                                    <label for="TelefonoDestinatario"><strong>Telefono del Destinatario</strong></label>
                                    <input type="tel" maxlength="50" value="{{ $guide->TelefonoDestinatario }}"
                                        name="TelefonoDestinatario" id="TelefonoDestinatario" class="form-control"
                                        placeholder="Ingrese el Telefono del Destinatario de la Guia" required>
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <div class="form-group">
                                    <label for="EmailDestinatario"><strong>Email Destinatario</strong></label>
                                    <input type="email" maxlength="50" value="{{ $guide->EmailDestinatario }}"
                                        name="EmailDestinatario" id="EmailDestinatario" class="form-control"
                                        placeholder="Ingrese la Email del Destinatario de la Guia" required>
                                </div>
                            </div>
                        </div>
                        </div>

                       <div class="form-group mt-2 mr-2">
                    <a href="{{ route('guides.index') }}" class="btn btn-light">Regresar</a>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                 </div>
               {!! Form::close() !!}
                </div>
              </div>
            </div>
          </div>
        </div>
@endsection
@section('scripts')
  <script src="{{asset('assets/js/dropify.js')}}"></script>
  <script src="{{asset('assets/vendors/lightgallery/js/lightgallery-all.min.js')}}"></script>
<script src="{{ asset('assets/js/inputMask.js') }}"></script>
@endsection
