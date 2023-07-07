<?php

namespace App\Http\Controllers;

use App\Models\kieuphim;
use Illuminate\Http\Request;

class kieuphimController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = kieuphim::orderBy('id', 'ASC')->search()->paginate(10);
        return view('admin.kieuphim.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\kieuphim  $kieuphim
     * @return \Illuminate\Http\Response
     */
    public function show(kieuphim $kieuphim)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\kieuphim  $kieuphim
     * @return \Illuminate\Http\Response
     */
    public function edit(kieuphim $kieuphim)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\kieuphim  $kieuphim
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, kieuphim $kieuphim)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\kieuphim  $kieuphim
     * @return \Illuminate\Http\Response
     */
    public function destroy(kieuphim $kieuphim)
    {
        //
    }
}
