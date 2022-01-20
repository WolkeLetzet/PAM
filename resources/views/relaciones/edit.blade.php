@extends('layouts.navbar')

@section('edit-form')
    <?php
    $i = 0;
    $ar = null;
    $ar2 = null;
    foreach ($computer->oficinas as $oficina) {
        # code...
        $ar[$i] = $oficina->id;
        $i++;
    }
    $i = 0;
    
    foreach ($computer->tipo_usos as $uso) {
        # code...
        $ar2[$i] = $uso->id;
        $i++;
    }
    
    ?>
    <div class="container-sm">

        <form action="" method="post">

            <div class="row">


                <div class="mb-3 col-6">
                    <label for="marca" class="form-label">Marca</label>
                    <input type="text" class="form-control" name="marca" id="marca" placeholder="Marca"
                        value="{{ $computer->marca }}">
                    <small id="helpId" class="form-text text-muted">Marca del Fabricante</small>
                </div>

                <div class="mb-3 col-6">
                    <label for="modelo" class="form-label">Modelo</label>
                    <input type="text" class="form-control" name="modelo" id="modelo" placeholder="Modelo"
                        value="{{ $computer->modelo }}">
                    <small id="helpId" class="form-text text-muted">Modelo del Computador</small>
                </div>


                <div class="mb-3 col-6">
                    <label for="so" class="form-label">Sistema Operativo</label>
                    <input type="text" list="soList" class="form-control" name="so" id="so"
                        placeholder="Sistema Operativo" value="{{ $computer->so }}">
                    <small id="helpId" class="form-text text-muted">Ejemplo: " Windows 10 "</small>
                    <datalist id="soList">
                        @foreach ($sos as $so)
                            <option value="{{ $so->so }}"></option>
                        @endforeach
                    </datalist>
                </div>
                <div class="mb-3 col-6">
                    <label for="ram" class="form-label">RAM</label>
                    <input type="text" class="form-control" name="ram" id="ram" placeholder="RAM"
                        value="{{ $computer->ram }}">
                    <small class="form-text text-muted">Ejemplo: " 4 GB "</small>
                </div>
                <div class="mb-3">
                    <label for="almacenamiento" class="form-label">Almacenamiento</label>
                    <div class="row">
                        <div class="col">
                            <input type="text" class="form-control" name="encargado" id="Almacenamiento"
                                placeholder="Almacenamiento" value="{{ $computer->almacenamiento }}">
                            <small id="helpId" class="form-text text-muted">Ejemplo: " 500 GB "</small>
                        </div>

                        <div class="col">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="tipoAlm" id="HDD" value="HDD"
                                    @if ($computer->tipo_almac == 'HDD')
                                checked
                                @endif
                                >
                                <label class="form-check-label" for="HDD">
                                    HDD
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="tipoAlm" id="SDD" value="SDD"
                                    @if ($computer->tipo_almac == 'SDD')
                                checked
                                @endif
                                >
                                <label class="form-check-label" for="SDD">
                                    SDD
                                </label>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="mb-3 col-6">
                    <label for="encargado" class="form-label">Encargado</label>
                    <input type="text" class="form-control" name="encargado" id="encargado" placeholder="Encargado"
                        @if ($computer->encargado)
                    value="{{ $computer->encargado->nombre }}"
                    @endif
                    >
                    <small id="helpId" class="form-text text-muted">Persona a cargo del Computador</small>
                </div>

                <div class="mb-3 col-6">
                    <label for="fecha" class="form-label">Fecha</label>
                    <input type="date" class="form-control" name="fecha" id="fecha" placeholder="Fecha"
                        value="{{ $computer->fecha }}">
                    <small id="helpId" class="form-text text-muted"></small>
                </div>
            </div>

            <div class="row">
                <div class="mb-3 col">
                    <h6>Elija a que oficina(s) pertenece el Computador</h6>
                    @foreach ($oficinas as $oficina)

                        <div class="form-check">

                            <input class="form-check-input" type="checkbox" name="oficinas[]" id="oficina{{ $oficina->id }}"
                                value="{{ $oficina->id }}" @if ($ar)
                            @if (in_array($oficina->id, $ar))
                                checked
                            @endif
                    @endif
                    >
                    <label for="oficina{{ $oficina->id }}" class="form-check-label">
                        {{ $oficina->nombre }}
                    </label>

                </div>
                @endforeach


            </div>

            <div class="mb-3 col">
                <h6>Elija que Uso(s) tiene, tuvo o tendra</h6>

                @foreach ($tipo_usos as $uso)

                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" name="tipos_usos[]" id="uso{{ $uso->id }}"
                            value="{{ $uso->id }}" @if ($ar2)
                        @if (in_array($uso->id, $ar2))
                            checked
                        @endif
                @endif


                >
                <label class="form-check-label" for="uso{{ $uso->id }}">
                    {{ $uso->nombre }}
                </label>
            </div>

            @endforeach

    </div>
    </div>




   


    <button type="submit" class="btn btn-primary">Submit</button>
    <button type="reset" class="btn btn-secondary">Reset</button>
    <a href="{{ url('comp') }}" class="btn btn-danger">Cancel</a>

    </form>


    </div>

    <script>


    </script>



@endsection
