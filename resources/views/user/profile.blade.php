@extends('layouts.sidebar')

@section('profile')
    <h1>{{auth()->user()->name}}</h1>
    <h2>{{auth()->user()->email}}</h2>
    <h3>{{auth()->user()->password}}</h3>

    @can('all')
        @if (auth()->user()->hasRole('admin'))
            <ul>
                @foreach ($users as $user )
                    <li>{{$user}}</li>
                @endforeach
            </ul>
        @endif
        


    @endcan

@endsection
