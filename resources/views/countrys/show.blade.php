@extends('layouts.template')
@section('title', 'Pais')
@section('content')
	<div class="content-wrapper">
          <div class="page-header">
            <h3 class="page-title">
              Editar Pais {{$country->name}}
            </h3>
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('countrys.index') }}">Paiss</a></li>
                <li class="breadcrumb-item active" aria-current="page">Crear Nueva</li>
              </ol>
            </nav>
          </div>
          <div class="card">
            <div class="card-body">
              {{-- <h4 class="card-title">Paiss</h4> --}}

              <div class="row">
                  <div class="col-12">

	                     <div class="form-group">
			                  <label for="name"><strong>Nombre</strong></label>
			                  <input type="text" value="{{$country->name}}" name="name" id="name" class="form-control" disabled>
			                </div>
			                <div class="form-group">
			                  <label for="description"><strong>Descripción</strong></label>
			                  <input type="text" name="description" value="{{$country->description}}" id="description" class="form-control" disabled>
			                </div>
	                     <div class="form-group mr-2">
      								    <a href="{{ route('countrys.index') }}" class="btn btn-light">Regresar</a>

      							   </div>
                </div>
              </div>
            </div>
          </div>
        </div>
@endsection
