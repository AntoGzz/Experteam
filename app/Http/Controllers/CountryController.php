<?php

namespace App\Http\Controllers;

use App\country;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $countrys = Country::get();
        return view('countrys.index', compact('countrys'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('countrys.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Country::create($request->all());
        return redirect()->route('countrys.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\country  $country
     * @return \Illuminate\Http\Response
     */
    public function show(country $country)
    {
        return view('countrys.show', compact('country'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\country  $country
     * @return \Illuminate\Http\Response
     */
    public function edit(country $country)
    {
        return view('countrys.edit', compact('country'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\country  $country
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, country $country)
    {
        $country->update($request->all());
        return redirect()->route('countrys.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\country  $country
     * @return \Illuminate\Http\Response
     */
    public function destroy(country $country)
    {
        $country->delete();
        return redirect()->route('countrys.index');
    }
}
