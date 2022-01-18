@extends('layouts.navbar')

@section('table')

    
    <table class="table ">
        <thead>
            <tr>
                <th>ID PC</th>
                <th>Marca</th>
                <th>Modelo</th>
             
                <th>Oficina</th>

                <th>Usuario</th>
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

                    @else
 
                        <td>
                        @foreach ($item->oficinas as $oficina)
                            {{$oficina->nombre}};                           
                        @endforeach
                        </td>

                    @endif  
                    @if ($item->encargado !=null)
                        <td>{{$item->encargado->nombre}}</td>  
                    @else
                        <td>No tiene encargado</td>
                    @endif
                     
                    
                    @if ($item->tipo_usos->first() == null)

                        <td>No tiene tipo de uso asignado</td>
                    @else
                        <td>
                        @foreach ($item->tipo_usos as $tipo_uso)
                            {{$tipo_uso->nombre}};                           
                        @endforeach
                        </td>
                    @endif

 
            <th>
                
                <a href="{{url('/comp/show/'.$item->id)}}" class= "btn btn-secondary">Ver</a>
            
            </th>


            @endforeach
            
            
        </tbody>
    </table>
    <div>
        {{$data->links()}}
    </div>
    

@endsection