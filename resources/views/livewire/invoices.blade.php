<div>
    @if ($selected_id > 0)
        <div class="row">
            <div class="col-12 grid-margin">
                <div class="card">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="card-body">
                                <h5 class="mb-4">
                                    Numero de la Guia: <strong>{{ $guide->NumeroGuia }}</strong>
                                </h5>
                                <p class="ml-5"><strong> Datos Remitente </strong></p>
                                <p class="ml-5">Pais de Origen:
                                    <strong>
                                        @foreach ($countries as $country)
                                            @if ($country->id == $guide->PaisOrigen)
                                                {{ $country->name }}
                                            @endif
                                        @endforeach
                                    </strong>
                                </p>
                                <p class="ml-5">Nombre Remitente: <strong>{{ $guide->NombreRemitente }}</strong></p>
                                <p class="ml-5">Dirección Remitente: <strong>{{ $guide->DireccionRemitente }}</strong></p>
                                <p class="ml-5">Telefono Remitente: <strong>{{ $guide->TelefonoRemitente }}</strong></p>
                                <p class="ml-5">Email Remitente: <strong>{{ $guide->EmailRemitente }}</strong></p>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card-body">
                                <h5 class="mb-4">
                                    Fecha de Envio: <strong>{{ $guide->FechaEnvio }}</strong>
                                </h5>
                                <button type="button" wire:click="doAction(0)" class="btn btn-outline-secondary btn-rounded btn-icon float-right">
                                    <i class="fa fa-trash text-danger"></i>
                                </button>
                                <p class="ml-5"><strong> Datos Destinatario </strong></p>

                                <p class="ml-5">Pais de Destino:
                                    <strong>
                                        @foreach ($countries as $country)
                                            @if ($country->id == $guide->PaisDestino)
                                                {{ $country->name }}
                                            @endif
                                        @endforeach
                                    </strong>
                                </p>
                                <p class="ml-5">Nombre Destinatario: <strong>{{ $guide->NombreDestinatario }}</strong></p>
                                <p class="ml-5">Dirección Destinatario: <strong>{{ $guide->DireccionDestinatario }}</strong></p>
                                <p class="ml-5">Telefono Destinatario: <strong>{{ $guide->TelefonoDestinatario }}</strong></p>
                                <p class="ml-5">Email Destinatario: <strong>{{ $guide->EmailDestinatario }}</strong></p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <card-body class="mb-3">
                                <div class="col-md-6 float-left mt-2">
                                    <label>PuntoEmision: </label>
                                    <input type="text" class="form-control" wire:model="PuntoEmision" maxlength="3">
                                </div>
                                <div class="col-md-6 float-left mt-2">
                                    <label>Establecimiento: </label>
                                    <input type="text" class="form-control" wire:model="Establecimiento" maxlength="3">
                                </div>
                                <div class="col-md-6 float-left mt-2">
                                    <label>Secuencial: </label>
                                    <input type="text" class="form-control" wire:model="Secuencial" maxlength="11">
                                </div>
                                <div class="col-md-6 float-left mt-2">
                                    <label>Fecha de Emision: </label>
                                    <input type="date" class="form-control" wire:model="FechaEmision">
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
                                <label>Seleccione una Guia: </label>
                                <select class="form-control form-control-lg" wire:model.lazy="selected_id">
                                    <option value="Elegir">>-- Seleccione --<</option>
                                    @foreach ($guides as $guide)
                                    <option value="{{$guide->id}}">{{$guide->NumeroGuia}}</option>
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

    <div class="form-control">
        <div class="row">
            <div class="col-md-5 grid-margin grid-margin-10-0">
                <div class="form-group" wire:ignore>
                    <label><strong>Buscar Guia</strong></label>
                    <select class="form-control form-control-lg" wire:model="selected_id">
                        <option value="Elegir">>-- Elegir Guia --<</option>
                        @foreach ($guides as $guide)
                            <option value="{{ $guide->id }}"> {{ $guide->NumeroGuia }} </option>
                        @endforeach
                    </select>
                </div>
            </div>
            @if ($guide_id > 0)
            <div class="col-md-6">
                <div class="form-group">
                    @if ($guide_id > 0)
                        @foreach ($guides as $guide)
                            @if ($guide->id == $guide_id)
                                <label>Total Guia - Confirme el monto <strong>{{$guide->Total}}</strong> en el campo de abajo</label>
                                <input type="number" wire:model="price_guide" class="form-control" placeholder="{{$guide->Total}}">
                            @endif
                        @endforeach
                    @endif
                </div>
            </div>
            <div class="col-md-1">
                <div class="form-group">
                    <button class="btn btn-primary float-right mt-4 ml-2" wire:click.prevent="addGuia()"> Agregar</button>
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
                                            <th class="text-center">Precio de la Guia</th>
                                            <th class="text-center">Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($orderInvoices as $key => $guide)
                                            <tr class="text-center" wire:key="{{ $key }}"></tr>
                                            <td class="text-center"> {{ $key + 1 }} </td>
                                            <td class="text-center"> {{ $guide['NumeroGuia'] }} </td>
                                            <td class="text-center">{{ $guide['price_guide'] }}</td>
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
                            <p class="text-right mb-2">IVA (12%): ${{ $taxiva }}</p>
                            <h4 class="text-right mb-2">Total: ${{ $total }}</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="form-group mr-2 mt-4 float-right">
        <a href="{{ route('invoices.index')}}" class="btn btn-light">Cancelar</a>
        <button type="submit" class="btn btn-primary" wire:click.prevent="storeGuide()">Guardar</button>
    </div>
</div>
