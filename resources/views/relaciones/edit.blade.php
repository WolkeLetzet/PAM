@extends('layouts.navbar')

@section('edit-form')

    <div class="container-sm">
        <P>{{$oficinas}}</P>
        <form action="" method="post">


            <div class="mb-3">
                <label for="" class="form-label"></label>
                <input type="text"
                class="form-control" name="marca" id="marca" placeholder="Marca" value="{{$computer->marca}}">
                <small id="helpId" class="form-text text-muted">Marca del Fabricante</small>
            </div>

            <div class="mb-3">
                <label for="" class="form-label"></label>
                <input type="text" class="form-control" name="modelo" id="modelo" placeholder="Modelo" value="{{$computer->modelo}}">
                <small id="helpId" class="form-text text-muted">Modelo del Computador</small>
            </div>

            <div class="mb-3">
                @foreach ($oficinas as $oficina )
                    
                    <div class="form-check">
                        @if (!empty($computer->oficinas))
                            @foreach ($computer->oficinas as $c_oficina)

                                @if ($oficina->id == $c_oficina->id)
                                    <input type="checkbox" class="form-check-input" name="oficinas" id="oficina{{$oficina->id}}" value="{{$oficina->id}}" checked>                           
                                @else
                                    <input type="checkbox" class="form-check-input" name="oficinas" id="oficina{{$oficina->id}}" value="{{$oficina->id}}"> 
                                @endif
                                
                            @endforeach
                        @else

                            <input type="checkbox" class="form-check-input" name="oficinas" id="oficina{{$oficina->id}}" value="{{$oficina->id}}">
                            
                        @endif
                        <label for="oficina{{$oficina->id}}" class="form-check-label">{{$oficina->nombre}}</label>
                    
                    </div>
                @endforeach            

                
                
                
            </div>
            
            <button type="submit" class="btn btn-primary">Submit</button>
            <button type="reset" class="btn btn-secondary">Reset</button>
            <a href="{{url('comp')}}" class="btn btn-danger">Cancel</a>

        </form>
        
    </div>

@endsection