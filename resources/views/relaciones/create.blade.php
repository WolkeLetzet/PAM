@extends('layouts.navbar')

@section('create-form')

    <div class="container-sm">

        <form action="{{ route('create')}}" method="POST">
            @csrf

            <div class="row">
                <div class="mb-3 col-6">
                    <label for="marca" class="form-label">Marca</label>
                    <input type="text" list="marcasList" class="form-control" name="marca" id="marca" placeholder="Marca"
                        value="">
                    <small  class="form-text text-muted">Marca del Fabricante</small>
                    <datalist id="marcasList">
                        @foreach ($marcas as $marca)
                            <option value="{{ $marca->marca }}"></option>
                        @endforeach
                    </datalist>
                </div>


                <div class="mb-3 col-6">
                    <label for="modelo" class="form-label">Modelo</label>
                    <input type="text" class="form-control" name="modelo" id="modelo" placeholder="Modelo" value="">
                    <small  class="form-text text-muted">Modelo del Computador</small>
                </div>


                <div class="mb-3 col-6">
                    <label for="so" class="form-label">Sistema Operativo</label>
                    <input type="text" list="soList" class="form-control" name="so" id="so"
                        placeholder="Sistema Operativo" value="">
                    <small  class="form-text text-muted">Ejemplo: " Windows 10 "</small>
                    <datalist id="soList">
                        @foreach ($sos as $so)
                            <option value="{{ $so->so }}"></option>
                        @endforeach
                    </datalist>
                </div>
                <div class="mb-3 col-6">
                    <label for="ram" class="form-label">RAM</label>
                    <input type="text" class="form-control" name="ram" id="ram" placeholder="RAM" value="">
                    <small class="form-text text-muted">Ejemplo: " 4 GB "</small>
                </div>

                <div class="mb-3 col-6">
                    <label for="almacenamiento" class="form-label">Almacenamiento</label>
                    
                        <div class="col">
                            <input type="text" class="form-control" name="almacenamiento" id="Almacenamiento"
                                placeholder="Almacenamiento" value="">
                            <small  class="form-text text-muted">Ejemplo: " 500 GB "</small>
                        </div>
                </div>



                <div class="mb-3 col-6">
                    <label for="encargado" class="form-label">Encargado</label>
                    <input type="text" class="form-control" name="encargado" id="encargado" placeholder="Encargado"
                        value="">
                    <small  class="form-text text-muted">Persona a cargo del Computador</small>
                </div>
                

                <div class="mb-3 col-6">
                    <label for="so_key" class="form-label">Key del Sitema Operativo</label>
                    <input type="text" class="form-control" name="so_key" id="so_key" placeholder="" value="">
                    <small  class="form-text text-muted">opcional</small>
                </div>

                <div class="mb-3 col-6">
                    <label for="office_key" class="form-label">Key de Microsoft Office</label>
                    <input type="text" class="form-control" name="office_key" id="office_key" placeholder="" value="">
                    <small  class="form-text text-muted">opcional</small>
                </div>
                <div class="mb-3 col-6">
                    <label for="fecha" class="form-label">Fecha</label>
                    <input type="date" class="form-control" name="fecha" id="fecha" placeholder="Fecha" value="">
                    <small  class="form-text text-muted"></small>
                </div>
                <div class="mb-3 col-6">
                    <label for="codigo_inventario" class="form-label">Codigo de Inventario</label>
                    <input type="text" class="form-control" name="codigo_inventario" id="codigo_inventario" placeholder="" value="">
                    <small  class="form-text text-muted">opcional</small>
                </div>

            </div>

            <div class="row">

{{-- Oficinas del Computador --}}
                <div class="col">
                    <h6>Elija a que oficina(s) pertenece el Computador</h6>
                    @foreach ($oficinas as $oficina)

                        <div class="form-check">

                            <input class="form-check-input" type="checkbox" name="oficinas[]"
                                id="oficina{{ $oficina->id }}" value="{{ $oficina->id }}">

                            <label for="oficina{{ $oficina->id }}" class="form-check-label">
                                {{ $oficina->nombre }}
                            </label>

                        </div>
                    @endforeach

                </div>

        {{-- Usos del Computador --}}
                <div class="col">
                    <h6>Elija que Uso(s) tiene, tuvo o tendra</h6>
                    @foreach ($tipo_usos as $uso)

                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" name="tipo_usos[]" id="uso{{ $uso->id }}"
                                value="{{ $uso->id }}">
                            <label class="form-check-label" for="uso{{ $uso->id }}">
                                {{ $uso->nombre }}
                            </label>
                        </div>

                    @endforeach
                </div>
            </div>

            <div class="row">
                <div class="col-6">
                    <label for="comentario" class="form-label">Comentario</label>
                    <textarea class="form-control" name="comentario" id="comentario" rows="5"></textarea>
                </div>
            </div>



            {{-- Botones --}}

            <div id="buttons" class="row">
                <div>
                    <button type="submit" class="btn btn-dark">Submit</button>
                    <button type="reset" class="btn btn-secondary">Reset</button>
                    <a href="{{ route('index') }}" class="btn btn-danger">Cancel</a>
                </div>

            </div>

        </form>

        <style>
            .row {
                margin-top: 2%;
            }

            div#buttons {}

        </style>
    </div>
@endsection
