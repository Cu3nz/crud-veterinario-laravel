<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //? Devolvemos la vista index.blade.php
        $clients = Client::orderBy('id' , 'desc') -> paginate(10); //? Estamos recuperando todos los clientes, ordenandolos por id de forma descendente, por lo tanto los mas nuevos, son los que se van a ver primero.
        return view('clientes.index' , compact('clients'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //? Devolvemos la vista del formulario

        return view('clientes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //? Hacemos las validaciones del formulario.

        //todo Todos son requeridos
        //todo Todos son de tipo string
        //todo Min: Significa los caracteres minimos que tiene que tener para que no de error de validacion 
        //todo Max: Justo lo contrario, los caretres maximos que tiene que tener para que no de error la validacion.
        //todo unique:table,column --> quiere decir que ese atributo tiene que ser unico y defino en que tabla y en que columna no se puede repetir.

        $request -> validate([
            'nombre' => ['required' , 'string' , 'min:3'],
            'apellidos' => ['required' , 'string' , 'min:5'],
            'telefono' => [ 'required ' , 'string' , 'min:9' , 'max:15' , 'unique:clients,telefono' ], //? Este campo no se puede repetir por eso pongo que es unico en la tabla clients en la columna o atributo telefono
            'email' => ['required' , 'string' , 'unique:clients,email'],
            'direccion' =>  ['required' , 'string' , 'min:5']
        ]);

        //* Si hemos llegado aqui es porque hemos pasado las validaciones, por lo tanto vamos a crear el cliente

        Client::create([

            'nombre' => ucfirst($request -> nombre),
            'apellidos' => ucfirst($request -> apellidos),
            'telefono' => $request -> telefono,
            'email' => $request -> email,
            'direccion' => $request -> direccion
        ]);

        return redirect() -> route('clients.index') -> with('mensaje' , 'Cliente ' . $request -> nombre . ' creado correctamente ');

    }

    /**
     * Display the specified resource.
     */
    public function show(Client $client)
    {
        //? Devolvemos la vista y junto a ella todos los datos en un array del cliente al cual se ha hecho click 

        return view('clientes.show' , compact('client'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Client $client)
    {
        // ? Devolvemos la vista, con todos los datos del cliente al que se ha hecho click 

        return view('clientes.update' , compact('client'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Client $client)
    {
        //

        $request -> validate([
            'nombre' => ['required' , 'string' , 'min:3'],
            'apellidos' => ['required' , 'string' , 'min:5'],
            'telefono' => [ 'required ' , 'string' , 'min:9' , 'max:15' , 'unique:clients,telefono,'. $client -> id ], //? Este campo no se puede repetir por eso pongo que es unico en la tabla clients en la columna o atributo telefono
            'email' => ['required' , 'string' , 'unique:clients,email,' . $client -> id],
            'direccion' =>  ['required' , 'string' , 'min:5']
        ]);

        $client -> update([
            'nombre' => ucfirst($request -> nombre),
            'apellidos' => ucfirst($request -> apellidos),
            'telefono' => $request -> telefono,
            'email' => $request -> email,
            'direccion' => $request -> direccion
        ]);

        return redirect() -> route('clients.index') -> with('mensaje' , 'Cliente actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Client $client)
    {
        //? Borramos el cliente

        $client -> delete();

        return redirect() -> route('clients.index') -> with('mensaje' , 'Cliente ' . $client -> nombre .' borrado correctamente');

    }
}
