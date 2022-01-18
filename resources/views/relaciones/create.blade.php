@extends('layouts.navbar')

@section('create-form')

<div class="container-sm">
       
    <form action="" method="post">


        <div class="mb-3">
            <label for="marca" class="form-label">Marca</label>
            <input type="text"
            class="form-control" name="marca" id="marca" placeholder="Marca" value="">
            <small id="helpId" class="form-text text-muted">Marca del Fabricante</small>
        </div>

        <div class="mb-3">
            <label for="modelo" class="form-label">Modelo</label>
            <input type="text" class="form-control" name="modelo" id="modelo" placeholder="Modelo" value="">
            <small id="helpId" class="form-text text-muted">Modelo del Computador</small>
        </div>

        <div class="mb-3">
            @foreach ($oficinas as $oficina)
                
                <div class="form-check">

                    <input class="form-check-input" type="checkbox" name="oficinas" id="oficina{{$oficina->id}}">
                    
                    <label for="oficina{{$oficina->id}}" class="form-check-label">
                        {{$oficina->nombre}}
                    </label>
                
                </div>
            @endforeach            

            
        </div>

        <div class="mb-3">
            
            @foreach ($tipo_usos as $uso )

                <div class="form-check">
                  <input type="checkbox" class="form-check-input" name="tipos_usos" id="uso{{$uso->id}}" value="{{$uso->id}}">
                  <label class="form-check-label" for="uso{{$uso->id}}">
                    {{$uso->nombre}}
                  </label>
                </div>
                
            @endforeach

        </div>


        <div class="mb-3 ">
            <div class="input-group">
                <span onclick="agregarOtroComentario()" class="input-group-text" style="display: flex; align-items: center"><i class="bi bi-question-lg" style="font-size: 30px"></i> </span>
                <textarea class="form-control" aria-label="Comentario"></textarea>
            </div>
        </div>


        <button type="submit" class="btn btn-primary">Submit</button>
        <button type="reset" class="btn btn-secondary">Reset</button>
        <a href="{{url('comp')}}" class="btn btn-danger">Cancel</a>

    </form>
    
    
</div>
@endsection