@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar informacion de Perfil</h1>
    @include('layouts.sub_form-errors')
    <a type="button" class="btn btn-secondary mb-4 mt-2" href="{{ url()->previous() }}"><i class="far fa-hand-point-left"></i> Volver</a>
    <form action="{{ route('user.update', $user->id) }}" method="post">
        @csrf
        @method('put')
        @include('user.sub_form')
        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
</div>
@endsection

