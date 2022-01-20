@extends('layouts.navbar')

@section('show-computer')


    <div class="container-sm">

        <div class="row" style="margin-top: 2%">
            <div class="col-xs|sm|md|lg|xl-1-12">
                <div class="card">

                    <ul class="nav nav-tabs" id="myTab" role="tablist" style="margin-top: 5px; margin-left: 5px">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="info-tab" data-bs-toggle="tab" data-bs-target="#info"
                                type="button" role="tab" aria-controls="info" aria-selected="true">Informacion</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="comments-tab" data-bs-toggle="tab" data-bs-target="#comments"
                                type="button" role="tab" aria-controls="comments" aria-selected="false">Comentarios</button>
                        </li>

                    </ul>


                    <div class="card-body">
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="info" role="tabpanel" aria-labelledby="home-tab">

                                <h3 class="card-title">{{ $computer->marca . ' ' . $computer->modelo }}</h3>


                                <table class="table" style="width:70%">


                                    <tr>
                                        <th>Marca</th>
                                        <td>{{ $computer->marca }}</td>
                                    </tr>
                                    <tr>
                                        <th>Modelo</th>
                                        <td>{{ $computer->modelo }}</td>
                                    </tr>
                                    <tr>
                                        <th>Encargado</th>
                                        @if ($computer->encargado)
                                            <td>{{ $computer->encargado->nombre }}</td>

                                        @else
                                            <td></td>

                                        @endif


                                    </tr>

                                    <tr>
                                        <th>Oficinas</th>

                                        @if ($computer->oficinas)
                                            <td>
                                                @foreach ($computer->oficinas as $oficina)
                                                    {{ $oficina->nombre }} |
                                                @endforeach
                                            </td>
                                        @else
                                            <td>Null</td>
                                        @endif
                                    </tr>

                                    <tr>
                                        <th>Tipos de Uso</th>
                                        @if ($computer->tipo_usos)
                                            <td>
                                                @foreach ($computer->tipo_usos as $usos)
                                                    {{ $usos->nombre }} |
                                                @endforeach
                                            </td>

                                        @else
                                            <td>Empty</td>

                                        @endif
                                    </tr>
                                    <tr>
                                        <th>Sistema Operativo</th>
                                        <td>{{ $computer->so }}</td>
                                    </tr>

                                    <tr>
                                        <th>Almacenamiento</th>
                                        <td>{{ $computer->almacenamiento }}</td>
                                    </tr>
                                    <tr>
                                        <th>Tipo de Almacenamiento</th>
                                        <td>{{ $computer->tipo_almac }}</td>
                                    </tr>
                                    <tr>
                                        <th>RAM</th>
                                        <td>{{ $computer->ram }}</td>
                                    </tr>
                                    <tr>
                                        <th>Fecha</th>
                                        <td>{{ date('d-m-Y', strtotime($computer->fecha)) }}</td>

                                    </tr>

                                </table>

                            </div>

                            <div class="tab-pane fade" id="comments" role="tabpanel" aria-labelledby="profile-tab">


                            </div>

                        </div>



                    </div>
                    <div class="card-footer">
                        <a class="btn btn-primary" href="{{ route('edit', $computer->id) }}" role="button">Editar</a>
                        <a class="btn btn-secondary" href="">Agregar Comentario</a>

                    </div>
                </div>
            </div>

        </div>

    </div>


@endsection
