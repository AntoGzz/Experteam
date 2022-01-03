@extends('layouts.template')
@section('title', 'Lista de Guias')
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
              Lista de Guias
            </h3>
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Guias</li>
              </ol>
            </nav>
          </div>
          <div class="card">
            <div class="card-body">
              @include('common.alerts')
              @include('common.messages')
              <div class="d-flex justify-content-between">
                <div>
                  <h3>Guias</h3>
                </div>
                <div>
                  <a href="#" class="btn btn-success">
                    <i class="fas fa-download"></i>
                  </a>
                  <a href="{{ route('guides.create') }}" class="btn btn-primary"><i class="fa fa-plus-circle"></i></a >
                </div>
              </div><br>
              <div class="row">
                <div class="col-12">
                  <div class="table-responsive">
                    <table id="order-listing" class="table">
                      <thead>
                        <tr>
                            <th># Guia</th>
                            <th>Fecha Envio</th>
                            <th>Pais Origen</th>
                            <th>Nombre Remitente</th>
                            <th>Dirección Remitente</th>
                            <th>Telefono Remitente</th>
                            <th>Email Remitente</th>
                            <th>Pais Destino</th>
                            <th>Actions</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($guides as $guide)
                        <tr>

                        <td scope="row">
                            <a href="{{ route('guides.show', $guide) }}">{{ $guide->NumeroGuia }}</a>
                        </td>
                        <td>{{ $guide->FechaEnvio }}</td>
                        <td>@foreach ($countries as $country)
                            @if ($country->id == $guide->PaisOrigen)
                            {{ $country->name }}
                            @endif
                        @endforeach</td>
                        <td>{{ $guide->NombreRemitente }}</td>
                        <td>{{ $guide->DireccionRemitente }}</td>
                        <td>{{ $guide->TelefonoRemitente }}</td>
                        <td>{{ $guide->EmailRemitente }}</td>
                        <td>@foreach ($countries as $country)
                            @if ($country->id == $guide->PaisDestino)
                            {{ $country->name }}
                            @endif
                        @endforeach</td>
                        <td>
                          {!! Form::open(['route' => ['guides.destroy', $guide ], 'method' => 'DELETE']) !!}
                             <a href="{{ route('guides.edit', $guide) }}" title="Editar" class="jsgrid-button jsgrid-edit-button">
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
                  {{$guides->links()}}
                </div>
              </div>
            </div>
          </div>
        </div>
@endsection
@section('scripts')
	<script src="{{asset ('assets/js/data-table.js')}}"></script>
@endsection
