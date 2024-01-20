@extends('plantillas.plantilla') {{-- todo extendemos de la plantilla que hemos creado anteriormente --}} 
@section('titulo')

Información del cliente

@endsection

@section('cabecera')

Información del cliente <strong> {{$client -> nombre}}</strong>

@endsection

@section('contenido')



<div class=" mx-auto  max-w-xl bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
        <img class="rounded-t-lg" src="https://www.zarla.com/images/zarla-carevet-1x1-2400x2400-20210809-ctbb9btmp84tpccp4hdr.png?crop=1:1,smart&width=250&dpr=2" alt="" />
    <div class="p-5">

        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
            <i class="fas fa-user"></i> Nombre: {{$client->nombre}}
        </h5>
        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
            <i class="fas fa-user-tag"></i> Apellidos: {{$client->apellidos}}
        </h5>
        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
            <i class="fas fa-phone-alt"></i> Teléfono: {{$client->telefono}}
        </h5>
        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
            <i class="fas fa-envelope"></i> Email: {{$client->email}}
        </h5>
        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
            <i class="fas fa-map-marker-alt"></i> Dirección: {{$client->direccion}}
        </h5>
        
        <a href="{{route('clients.index')}}" class=" mt-2 inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
            <i class="fas fa-home mr-2"></i> Ir a inicio
        </a>
    </div>
</div>


@endsection