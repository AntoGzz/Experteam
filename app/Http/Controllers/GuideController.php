<?php

namespace App\Http\Controllers;

use App\Guide;
use App\Country;
use Illuminate\Http\Request;

class GuideController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $guides = Guide::orderBy('id', 'desc')->paginate(10);
        $countries = Country::get();
        return view('guides.index', compact('guides','countries'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $countries = Country::get();
        return view('guides.create', compact('countries'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'NumeroGuia' => 'required',
            'FechaEnvio' => 'required',
            'PaisOrigen' => 'required',
            'NombreRemitente' => 'required',
            'DireccionRemitente' => 'required',
            'TelefonoRemitente' => 'required',
            'EmailRemitente' => 'required',
            'PaisDestino' => 'required',
            'NombreDestinatario' => 'required',
            'DireccionDestinatario' => 'required',
            'TelefonoDestinatario' => 'required',
            'EmailDestinatario' => 'required',
            'Total' => 'required'

        ]);

        $FechaEnvio = '2021-12-08 00:00:00';

        // Guide::create($request->all()
        Guide::create($validated
        // +
        // [
        //     'FechaEnvio' => $FechaEnvio,
        // ]
        );
        session()->flash('message', 'Guia creada con éxito');
        // return ($request);
        return redirect()->route('guides.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Guide  $guide
     * @return \Illuminate\Http\Response
     */
    public function show(Guide $guide)
    {
        $countries = Country::get();
        return view('guides.show', compact('guide','countries'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Guide  $guide
     * @return \Illuminate\Http\Response
     */
    public function edit(Guide $guide)
    {
        $countries = Country::get();
        return view('guides.edit', compact('guide','countries'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Guide  $guide
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Guide $guide)
    {
        $validated = $request->validate([
            'NumeroGuia' => 'required',
            'PaisOrigen' => 'required',
            'NombreRemitente' => 'required',
            'DireccionRemitente' => 'required',
            'TelefonoRemitente' => 'required',
            'EmailRemitente' => 'required',


        ]);
        $guide->update($request->all());
        return redirect()->route('guides.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Guide  $guide
     * @return \Illuminate\Http\Response
     */
    public function destroy(Guide $guide)
    {
        $guide->delete();
        return redirect()->route('guides.index');
    }
}
