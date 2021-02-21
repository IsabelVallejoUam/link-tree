<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\SocialNetwork;
use App\Http\Requests\SocialNetworkRequest;
use SebastianBergmann\Environment\Console;


use App\Models\User;

class SocialNetworkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $socialNetworks = SocialNetwork::ownedBy(Auth::id())->simplePaginate(5);

        return view('socialNetworks.index', compact('socialNetworks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $social_network=[
            ["nombre" => "facebook"],
            ["nombre" => "instagram"],
            ["nombre" => "twitter"],
            ["nombre" => "youtube"],

        ];
        return view('socialNetworks.create', compact('social_network'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SocialNetworkRequest $request)
    {
        $socialNetwork = new SocialNetwork();
        $socialNetwork->network = $request->input('network');
        $socialNetwork->url = $request->input('url');
        $socialNetwork->user_id = Auth::id();
        $socialNetwork->save();

        return redirect(route('socialNetworks.index'))->with('_success', '¡Red Social creada exitosamente!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(SocialNetwork $socialNetwork)
    {
        
        return view('socialNetworks.show', compact('socialNetwork'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(SocialNetwork $socialNetwork)
    {   
        $social_network=[
            ["nombre" => "facebook"],
            ["nombre" => "instagram"],
            ["nombre" => "twitter"],
            ["nombre" => "youtube"],

        ];

        return view('socialNetworks.edit', compact('socialNetwork','social_network'));
    }

    /**
     * Update the specified resource in storage.

     */
    public function update(SocialNetworkRequest $request, SocialNetwork $socialNetwork)
    {
        $socialNetwork->network = $request->input('network');
        $socialNetwork->url = $request->input('url');
        $socialNetwork->save();

        return redirect(route('socialNetworks.index'))->with('_success', '¡Enlace editado exitosamente!');
    }

    /**
     * Remove the specified resource from storage.
 
     */
    public function destroy(SocialNetwork $socialNetwork)
    {
        if($socialNetwork->owner->id == Auth::id())
        {
            $socialNetwork->delete();

            return back()->with('_success', '¡Enlace borrado exitosamente!');
        }
        
        return back()->with('_failure', '¡No tiene permiso de borrar ese recurso!');
    }


}
