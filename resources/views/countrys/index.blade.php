@extends('layouts.template')
@section('title', 'Lista de Paises')
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
              Lista de Paises
            </h3>

            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Paises</li>
              </ol>
            </nav>
          </div>
          <div class="card">
            <div class="card-body">
              <div class="d-flex justify-content-between">
                <div>
                  <h3>Paises</h3>
                </div>
                <div>
                  <a href="#" class="btn btn-success">
                    <i class="fas fa-download"></i>
                  </a>
                  <a href="{{ route('countrys.create') }}" class="btn btn-primary"><i class="fa fa-plus-circle"></i></a >
                </div>
              </div><br>

              <div class="row">
                <div class="col-12">
                  <div class="table-responsive">
                    <table id="order-listing" class="table">
                      <thead>
                        <tr>
                            <th>ID</th>
                            <th>NOMBRE</th>
                            <th>DESCRIPCIÓN</th>
                            <th>Actions</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($countrys as $category)
                        	<tr>
                            <td scope="row">{{ $category->id }}</td>
                            <td>
                              <a href="{{ route('countrys.show', $category) }}">{{ $category->name }}</a>

                            </td>
                            <td>{{ $category->description }}</td>
                            <td>
                              {!! Form::open(['route' => ['countrys.destroy', $category ], 'method' => 'DELETE']) !!}
                                 <a href="{{ route('countrys.edit', $category) }}" title="Editar" class="jsgrid-button jsgrid-edit-button">
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
