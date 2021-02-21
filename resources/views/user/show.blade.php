@extends('layouts.app')

@section('content')

<div class="container">
    <h1>Informacion del Perfil {{$user->name}}</h1>
    <a type="button" class="btn btn-secondary mb-4 mt-2" href="{{ url()->previous() }}"><i class="far fa-hand-point-left"></i> Volver</a>
    <table class="table table-striped table-hover">
        <tr>
            <th scope="col" style="width: 200px">Id</th>
            <td>{{ $user->id }}</td>
        </tr>
        <tr>
            <th scope="col">Nombre</th>
            <td>{{ $user->name }}</td>
        </tr>
        <tr>
            <th scope="col">Correo</th>
            <td>{{ $user->email }}</td>
        </tr>
        <tr>
            <th scope="col">Fecha de verificacion de Correo</th>
            <td>{{ $user->email_verified_at?? "Desconocida" }}</td>
        </tr>
        <tr>
            <th scope="col">Fecha creacion</th>
            <td>{{ $user->created_at ?? "Desconocida"  }}</td>
        </tr>
            
        
        
    </table>

     <div class="btn-group" role="group" aria-label="Link options">
        <a href="{{ route('user.edit', $user->id) }}" class="btn btn-warning" title="Editar"><i class="far fa-edit"></i></a>
        <form action="{{ route('user.destroy', $user->id) }}" method="post"
            onsubmit="return confirm('¿Esta seguro que desea Eliminar su cuenta?')">
            @csrf
            @method('delete')
            <button type="submit" class="btn btn-danger" title="Remover"><i class="fas fa-trash"></i></button>
        </form>
    </div> 
</div>
@endsection