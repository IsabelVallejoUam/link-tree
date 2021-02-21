@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Linkear una nueva Red Social</h1>
    @include('layouts.sub_form-errors')
    <a type="button" class="btn btn-secondary mb-4 mt-2" href="{{ url()->previous() }}"><i class="far fa-hand-point-left"></i> Volver</a>
    <form action="{{ route('socialNetworks.store') }}" method="post">
        @csrf
        @include('socialNetworks.sub_form')
        <button type="submit" class="btn btn-primary">Crear</button>
    </form>
</div>
@endsection