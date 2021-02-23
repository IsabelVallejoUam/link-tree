<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use App\Models\SocialNetwork;
use App\Models\Link;
use App\Models\User;
use Intervention\Image\Facades\Image;

class ProfileController extends Controller
{


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('user.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $userRequest, User $user)
    {

        $user->name =  $userRequest->input('name');
        $user->email = $userRequest->input('email');
        $user->password = $userRequest->input('password');
        // $user->profile_photo = $userRequest->input('profile_photo');
        if($userRequest->hasFile('profile_photo')){
            $profile_photo = $userRequest->file('profile_photo');
            $filename = time() . '.' . $profile_photo->getClientOriginalExtension();
            Image::make($profile_photo)->resize(300,300)->save(public_path('/images/' . $filename));
            $user->profile_photo = $filename;
        }
        $user->save();

        return redirect(route('user.index', ['user' => User::findOrFail($user->id)]), compact('socialNetworks','links','user'))->with('_success', '¡Perfil editado exitosamente!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        if($user->owner->id == Auth::id())
        {
            $user->delete();

            return back()->with('_success', 'Perfil borrado exitosamente!');
        }
        
        return back()->with('_failure', '¡No tiene permiso de borrar este Perfil!');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $links = Link::ownedBy(Auth::id())->simplePaginate(5);
        $socialNetworks = SocialNetwork::ownedBy(Auth::id())->simplePaginate(5);
        $user = auth()->user();  

        return view('user.index', ['user' => User::findOrFail($user->id)], compact('socialNetworks','links','user'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //NO TIENE
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $userRequest)
    {
     //NO TIENE
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('user.show', compact('user'));
    }
}
