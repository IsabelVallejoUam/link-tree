<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\SocialNetwork;
use Illuminate\Http\Request;
use App\Http\Requests\SocialNetworkRequest;

class SocialNetworkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $socialNetworks = SocialNetwork::orderBy('network', 'asc')->get();
        return response()->json(['data' => $socialNetworks], 200);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SocialNetworkRequest $socialNetworkRequest)
    {
        $socialNetwork = SocialNetwork::create($socialNetworkRequest->all());

        return response()->json(['data' => $socialNetwork], 201);
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Link  $link
     * @return \Illuminate\Http\Response
     */
    public function show(SocialNetwork $socialNetwork)
    {
        return response()->json(['data' => $socialNetwork], 200);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Link  $link
     * @return \Illuminate\Http\Response
     */
    public function update(SocialNetworkRequest $socialNetworkRequest, SocialNetwork $socialNetwork)
    {
        $socialNetwork->update($socialNetworkRequest->all());

        return response()->json(['data' => $socialNetwork], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Link  $link
     * @return \Illuminate\Http\Response
     */
    public function destroy(SocialNetwork $socialNetwork)
    {
        $socialNetwork->delete();
        return response(null, 204);
    }
}

