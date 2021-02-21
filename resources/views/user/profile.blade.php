<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $user->email }}</title>

    
</head>

<body>

    @extends('layouts.app')

    @section('content')
        <div class="jumbotron col-lg-6 col-md-6 col-sm-6 col-xs-6 offset-3 float-md-center text-center" style=" width:500px;">
            <h1>Perfil de {{ $user->name }}</h1>
            <p>
            <img class="col-lg-6 col-md-6 col-sm-6 col-xs-6 offset-3 float-md-center" src="/images/{{$user->profile_photo}}" style="width:150px; height150px;  border-radius:50%; display: block;">
            </p>
            <div class="container">
                <h1>Mis Links</h1>
                <table class="table table-striped table-hover" style="font-weight:bolder; color:black;">
                    @foreach ($links as $link)
                        <tr >
                            @if ($link->id % 2 == 0)
                                <td class="bg-info" style="border-radius: 5%; "><a style="color: black" href="{{ $link->url }}">{{ $link->label }}</a></td>
                            @else
                                <td class="bg-succes" style="border-radius: 5%; "><a style="color: black" href="{{ $link->url }}">{{ $link->label }}</a></td>
                            @endif
                        </tr>
                    @endforeach
                </table>
                {{ $links->links() }}
            </div>

            <div class="container">
                <h1>Mis Redes Sociales</h1>
                <table class="table table-striped table-hover">
                    @foreach ($socialNetworks as $socialNetwork)
                        <tr>
                            @switch($socialNetwork->network)
                                @case("facebook")
                                <a href="{{ $socialNetwork->url }}" class="btn btn-info"
                                    title={{ $socialNetwork->network }}><img src="/images/facebook.png" style="width:50px; height100px; margin-left:10px; "></a>
                                @break
                                @case("instagram")
                                <a href="{{ $socialNetwork->url }}" class="btn btn-info"
                                    title={{ $socialNetwork->network }}><img src="/images/instagram.png" style="width:50px; height100px;margin-left:10px; "></a>
                                @break
                                @case("twitter")
                                <a href="{{ $socialNetwork->url }}" class="btn btn-info"
                                    title={{ $socialNetwork->network }}><img src="/images/twitter.png" style="width:50px; height100px; margin-left:10px; "></a>
                                @break
                                @case("youtube")
                                <a href="{{ $socialNetwork->url }}" class="btn btn-info"
                                    title={{ $socialNetwork->network }}><img src="/images/youtube.png" style="width:50px; height100px;margin-left:10px;  "></a>
                                @break
                            @endswitch
                        </tr>
                    @endforeach
                </table>
                {{ $socialNetworks->links() }}
            </div>
        </div>


    @endsection

</body>

</html>
