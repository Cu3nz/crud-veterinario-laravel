@extends('plantillas.plantilla') {{-- todo extendemos de la plantilla que hemos creado anteriormente --}} 
@section('titulo')
Inicio
@endsection

@section('cabecera')
Lista de Clientes
@endsection

@section('contenido')

<div class="relative overflow-x-auto">
    <div class="flex flex-row-reverse mb-2">
        {{-- todo La pagina o ruta para ir al formulario es la de create --}}
        <a href="{{route('clients.create')}}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"><i class="fas fa-plus mr-2"></i>Nuevo cliente</a>
    </div>
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                   Nombre del Cliente
                </th>
                <th scope="col" class="px-6 py-3">
                    Apellidos del Cliente
                </th>
                <th scope="col" class="px-6 py-3">
                    Télefono
                </th>
                <th scope="col" class="px-6 py-3">
                    Email
                </th>
                <th scope="col" class="px-6 py-3">
                    Direccion
                </th>
                <th scope="col" class="px-6 py-3">
                    Actions
                </th>
            </tr>
        </thead>
        <tbody>
             @foreach ($clients as $item )
                 
             
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{$item -> nombre}}
                </th>
                <td class="px-6 py-4">
                   {{$item -> apellidos}}
                </td>
                <td class="px-6 py-4">
                    {{$item -> telefono }}
                </td>
                <td class="px-6 py-4">
                {{$item -> email}}
                 </td>
                 <td class="px-6 py-4">
                    {{$item -> direccion }}
                 </td>
                <td class="px-6 py-4">
                    <form action="{{route('clients.destroy' , $item)}}" method="post"> {{-- todo La ruta destroy para el delete, necesita que se le pase el cliente que se quiere borrar (al cual se le ha hecho click) --}}
                        @csrf
                        @method('delete')
                        <a href="{{route('clients.edit' , $item)}}"><i class="fas fa-edit text-yellow-600"></i></a>
                        <a href="{{route('clients.show' , $item)}}"><i class="fas fa-info text-blue-600 mr-1"></i></a> {{-- todo A la ruta show (info con la card) necesita que se le pase el cliente que se quiere visualizar --}}
                        <button type="submit"><i class="fas fa-trash text-red-600"></i></button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="my-2">
         {{$clients -> links()}}
    </div>

</div>
@if (session('mensaje'))
<script>
    Swal.fire({
  icon: "success",
  title: "{{ session('mensaje')}}", /* Para mostrar el mensaje */
  showConfirmButton: false,
  timer: 2000
});
</script>
@endif
@endsection

