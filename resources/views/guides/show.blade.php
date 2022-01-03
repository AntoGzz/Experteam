@extends('layouts.template')
@section('title', 'Ver Guia')
@section('styles')
  {{-- expr --}}
@endsection
@section('content')
     <div class="content-wrapper">
          <div class="page-header">
            <h3 class="page-title">
              Datos de la Guia: {{ $guide->NumeroGuia }}
            </h3>
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('guides.index') }}">Guias</a></li>
                <li class="breadcrumb-item active" aria-current="page">Guia: {{ $guide->NumeroGuia }}</li>
              </ol>
            </nav>
          </div>
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-body">
                  <div class="row">
                    <div class="col-lg-4">
                      <div class="py-4">
                        <div class="border-bottom text-center pb-4">
                        <p>Datos de la Guia: <strong>{{ $guide->NumeroGuia }}</strong> </p>
                      </div>
                        <p class="clearfix">
                          <span class="float-left">
                            Numero de Guia
                          </span>
                          <span class="float-right text-muted">
                            {{ $guide->NumeroGuia }}
                          </span>
                        </p>
                        <p class="clearfix">
                          <span class="float-left">
                            Fecha Envio
                          </span>
                          <span class="float-right text-muted">
                            {{ $guide->FechaEnvio }}
                          </span>
                        </p>
                      </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="py-4">
                            <div class="border-bottom text-center pb-4">
                                <p>Datos del Remitente: <strong>{{ $guide->NombreRemitente }}</strong> </p>
                            </div>
                            <p class="clearfix">
                              <span class="float-left">
                                Pais Origen
                              </span>
                              <span class="float-right text-muted">
                                @foreach ($countries as $country)
                                    @if ($country->id == $guide->PaisOrigen)
                                    {{ $country->name }}
                                    @endif
                                @endforeach
                              </span>
                            </p>
                            <p class="clearfix">
                              <span class="float-left">
                                Nombre Remitente
                              </span>
                              <span class="float-right text-muted">
                                {{ $guide->NombreRemitente }}
                              </span>
                            </p>
                            <p class="clearfix">
                              <span class="float-left">
                                Direccion Remitente
                              </span>
                              <span class="float-right text-muted">
                                {{ $guide->DireccionRemitente }}
                              </span>
                            </p>
                            <p class="clearfix">
                                <span class="float-left">
                                  Email Remitente
                                </span>
                                <span class="float-right text-muted">
                                  {{ $guide->EmailRemitente }}
                                </span>
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="py-4">
                            <div class="border-bottom text-center pb-4">
                                <p>Datos del Destinatario: <strong>{{ $guide->NombreDestinatario }}</strong> </p>
                            </div>
                            <p class="clearfix">
                              <span class="float-left">
                                Pais Destino
                              </span>
                              <span class="float-right text-muted">
                                @foreach ($countries as $country)
                                    @if ($country->id == $guide->PaisDestino)
                                    {{ $country->name }}
                                    @endif
                                @endforeach
                            </span>
                            </p>
                            <p class="clearfix">
                              <span class="float-left">
                                Nombre Destinatario
                              </span>
                              <span class="float-right text-muted">
                                {{ $guide->NombreDestinatario }}
                              </span>
                            </p>
                            <p class="clearfix">
                              <span class="float-left">
                                Direccion Destinatario
                              </span>
                              <span class="float-right text-muted">
                                {{ $guide->DireccionDestinatario }}
                              </span>
                            </p>
                            <p class="clearfix">
                                <span class="float-left">
                                  Email Destinatario
                                </span>
                                <span class="float-right text-muted">
                                  {{ $guide->EmailDestinatario }}
                                </span>
                            </p>
                        </div>
                    </div>
                    <div class="col-12 d-flex justify-content-between">
                        <a href="{{ route('guides.edit', $guide) }}" class="col-6 btn btn-success">Editar</a>
                        <a href="{{ route('guides.index') }}" class="col-6 btn btn-primary btn-block">Regresar</a>
                    </div>
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
