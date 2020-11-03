<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Evento;
use App\Models\Convite;
use Illuminate\Http\Request;
use Auth;

class ConviteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $convites = User::find(Auth::user()->id)->eventos;
        return view('convites.index', ['convites' => $convites]);
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
     * @param  \App\Models\Convite  $convite
     * @return \Illuminate\Http\Response
     */
    public function show(Convite $convite)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Convite  $convite
     * @return \Illuminate\Http\Response
     */
    public function edit(Convite $convite)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Convite  $convite
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Convite $convite)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Convite  $convite
     * @return \Illuminate\Http\Response
     */
    public function destroy(Convite $convite)
    {
        //
    }

    public function aceitar(Request $request)
    {
        $convite = Convite::find($request->convite_id);
        $convite->status = 1;
        $convite->save();

        return redirect()->route('convites.index');
    }

    public function recusar(Request $request)
    {
        $convite = Convite::find($request->convite_id);
        $convite->status = 2;
        $convite->save();

        return redirect()->route('convites.index');
    }
}
