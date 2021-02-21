@extends('layouts.app')

@section('content')

    <div class="container">
        <h1>Mis Redes Sociales</h1>
        <a type="button" class="btn btn-primary mb-4 mt-2" href="{{ route('socialNetworks.create') }}"><i class="far fa-plus-square"></i> Conectar a una Red Social</a>
        <table class="table table-striped table-hover">
            <tr>
                <th scope="col">Código</td>
                <th scope="col">Red Social</td>
                <th scope="col">URL</td>
                <th scope="col">Opciones</td>
            </tr>

            @foreach ($socialNetworks as $socialNetwork)
                <tr>
                    <td>{{ $socialNetwork->id }}</td>
                    <td>{{ $socialNetwork->network }}</td>
                    <td><a href="{{ $socialNetwork->url }}">{{ $socialNetwork->url }}</a></td>
                    <td>
                        <div class="btn-group" role="group" aria-label="Link options">
                            <a href="{{ route('socialNetworks.show', $socialNetwork->id) }}" class="btn btn-info" title="Ver"><i class="far fa-eye"></i></a>
                            <a href="{{ route('socialNetworks.edit', $socialNetwork->id) }}" class="btn btn-warning" title="Editar"><i class="far fa-edit"></i></a>
                            <form action="{{ route('socialNetworks.destroy', $socialNetwork->id) }}" method="post"
                                onsubmit="return confirm('¿Esta seguro que desea remover el enlace a esta red?')">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-danger" title="Remover"><i class="fas fa-trash"></i></button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
        </table>

        {{ $socialNetworks->links() }}
    </div>

@endsection
