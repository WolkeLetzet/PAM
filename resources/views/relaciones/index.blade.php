@extends('layouts.navbar')

@section('table')

    
    <table class="table ">
        <thead>
            <tr>
                <th>ID PC</th>
                <th>Marca</th>
                <th>Modelo</th>
                <th>ID Oficina</th>
                <th>Oficina</th>
                <th>ID Usuario</th>
                <th>Usuario</th>
                <th>ID Tipo de Uso</th>  
                <th>Tipo de Uso</th>
                <th>Comentarios</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $item)
                <tr>
                    <td>{{$item->id}}</td>
                    <td>{{$item->marca}}</td>
                    <td>{{$item->modelo}}</td>
                    @if ($item->oficinas->first() == null)
                        <td>No tiene oficina asignada</td>
                        <td>No tiene oficina asignada</td>
                    @else
                        <td>
                        @foreach ($item->oficinas as $oficina)
                            {{$oficina->id}};
                    
                            
                        @endforeach
                        </td>
                        <td>
                        @foreach ($item->oficinas as $oficina)
                            {{$oficina->nombre}};                           
                        @endforeach
                        </td>

                    @endif
                    <td>{{$item->encargado->id}}</td>     
                    <td>{{$item->encargado->nombre}}</td>   
                    
                    @if ($item->tipo_usos->first() == null)
                        <td>No tiene tipo de uso asignado</td>
                        <td>No tiene tipo de uso asignado</td>
                    @else
                        <td>
                        @foreach ($item->tipo_usos as $tipo_uso)
                            {{$tipo_uso->id}};
                    
                            
                        @endforeach
                        </td>
                        <td>
                        @foreach ($item->tipo_usos as $tipo_uso)
                            {{$tipo_uso->nombre}};                           
                        @endforeach
                        </td>
                    @endif

                    @if ($item->comentarios->first() == null)
                        <td> </td>

                    @else

                        <td>
                        @foreach ($item->comentarios as $comentario)
                            {{$comentario->comentario}};                           
                        @endforeach
                        </td>

                    @endif
            <th>
                <a href="{{route('create',)}}" class="btn btn-primary">Agregar</a>
                <a href="{{url('/comp/'.$item->id.'/edit/')}}" class= "btn btn-primary">Editar</a>
                <form action="" method="post">
                    @csrf
                    <input type="submit" value="Eliminar" class="btn btn-danger">
                </form>
            
            </th>


            @endforeach
            
            
        </tbody>
    </table>

@endsection