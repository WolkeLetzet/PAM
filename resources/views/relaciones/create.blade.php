@extends('layouts.navbar')

@section('create-form')

    <div class="">
        <form action="" method="post">
            @csrf
            <div class="form-group">
                <label for="encargado">Encargado</label>
                <input type="text" class="form-control" id="encargado" name="encargado" placeholder="Enter name">
            </div>
            <div class="form-group">
                <label for="modelo">Email</label>
                <input type="tex" class="form-control" id="modelo" name="modelo" placeholder="Enter email">
            </div>
            <div class=" form-group">
                <label for="marca">Marca</label>
               <input type="text" name="marca" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection