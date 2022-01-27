@extends('layouts.sidebar')

@section('profile')
    <h1>{{auth()->user()->name}}</h1>
    <h2>{{auth()->user()->email}}</h2>


    @can('all')
        @if (auth()->user()->hasRole('admin'))
            
        @endif
        


    @endcan

@endsection
