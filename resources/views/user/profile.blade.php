@extends('layouts.sidebar')
<link rel="stylesheet" href="{{ asset('css/perfil.css') }}">
<script src="https://code.jquery.com/jquery-3.5.0.js"> </script>
@section('profile')
    {{-- <h1>{{auth()->user()->name}}</h1>
    <h2>{{auth()->user()->email}}</h2>


    @can('all')
        @if (auth()->user()->hasRole('admin'))
            
        @endif
        


    @endcan --}}


    <div class="container-fluid">
        <nav class="row">

        </nav>

        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Informacion de Usuario</h4>
            </div>
            <div class="card-body">

                <table class="table">

                    <tbody>
                        <tr>
                            <th>Nombre</th>
                            <td>
                                <form id="cambioNombre" action="{{ route('cambiar-nombre') }}" method="POST">
                                    @csrf
                                    <div class="row">

                                        <div class="input-group col">

                                            <input name="nombre" id="nombre" type="text"class="form-control" disabled value="{{ auth()->user()->name }}">
                                            <button type="button" id="cambiarNombre" class="btn btn-outline-secondary"  ><i class="bi bi-pencil-square"></i></button>

                                            <button id="subir"  hidden type="submit"  class="btn btn-outline-success"><i class="bi bi-check2"></i></button>


                                        </div>

                                    </div>
                                </form>
                            </td>

                        </tr>
                        <tr>
                            <th>Email</th>
                            <td>{{ auth()->user()->email }}</td>

                        </tr>
                        <tr>
                            <th>Contraseña</th>
                            <td>
                                <div class="row">
                                    <div class="input-group col">
                                        <input type="password" class="form-control" disabled value="**********">
                                        <a class="btn btn-outline-secondary" value="***" type="button"
                                            href="{{ route('cambiar-contraseña') }}"><i
                                                class="bi bi-pencil-square"></i></a>
                                    </div>
                                </div>

                            </td>

                        </tr>
                    </tbody>
                </table>

            </div>


            <div class="card-footer"></div>
        </div>


    </div>

   
    <script type="text/javascript">
        $(document).ready(function(){
            $("#nombre").attr("disabled","");
            $("#cambiarNombre").click(function(event){
                $("#subir").removeAttr("hidden");
                $("#nombre").removeAttr("disabled")
                $(this).attr("hidden","");
                
            });

            
        });
        
    </script>











@endsection
