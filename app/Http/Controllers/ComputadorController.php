<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Computador;
use \App\Models\Oficina;
use App\Models\Comentario;
use App\Models\TipoUso;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade as PDF;


class ComputadorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $req)
    {    
        $search = trim($req->search);
        if($search){
            $data = Computador::where('estado','=','1')->whereHas('oficinas',function($query) use ($search){
                return $query->where('nombre','LIKE',"%$search%");
            })->orWhere('encargado','LIKE',"%$search%")
            ->with('oficinas')
            ->with('tipo_usos')
            ->with('comentarios')
            ->paginate(10);
            $data->appends(['search'=>$search]);
        }
        else{
            $data = Computador::where('estado','=','1')
            ->with('oficinas')
            ->with('tipo_usos')
            ->with('comentarios')->paginate(10);
        }

        
        
        

        return view('relaciones.index')->with('computers', $data);
    }

    public function imprimir($id)
    {
        $computer=Computador::find($id);
        $pdf= PDF::loadView('relaciones.print_comp',compact('computer'));
        return $pdf->download('invoice.pdf');
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        $oficinas = Oficina::all();
        $tipo_usos = TipoUso::all();
        $marcas = DB::table('computadores')->select('marca')->distinct()->get();
        $sos = DB::table('computadores')->select('so')->distinct()->get();
        return view('relaciones.create')->with('oficinas', $oficinas)
            ->with('tipo_usos', $tipo_usos)
            ->with('marcas', $marcas)
            ->with('sos', $sos);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $req)
    {
        //Recordatorio: Modificar el create para aceptar nuevas Oficinas y Tipos de Uso


        $computador = new Computador;
        $computador->marca = $req->marca;
        $computador->so = $req->so;
        $computador->fecha = $req->fecha;
        $computador->encargado = $req->encargado;
        $computador->modelo = $req->modelo;
        $computador->ram = $req->ram;
        $computador->almacenamiento= $req->almacenamiento;
        $computador->codigo_inventario = $req->codigo_inventario;

        $computador->save();
        foreach ($req->oficinas as $oficina_id) {
            # code...
            $oficina = Oficina::find($oficina_id);

            $computador->oficinas()->attach($oficina);
        }

        foreach ($req->tipo_usos as $usos_id) {
            # code...
            $tipo_uso = TipoUso::find($usos_id);
            $computador->tipo_usos()->attach($tipo_uso);
        }

        if($req->comentario){

            $comentario=new Comentario;
            $comentario->computador()->associate($computador);
            $comentario->comentario= $req->comentario;
            $comentario->save();
        }
        


        return redirect(route('show',$computador->id));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $computer = Computador::find($id);


        return view('relaciones.show')->with('computer', $computer);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $computador = Computador::find($id);
        $oficinas = Oficina::all();
        $tipo_usos = TipoUso::all();
        $sos = DB::table('computadores')->select('so')->distinct()->get();


        return view('relaciones.edit')->with('computer', $computador)
            ->with('oficinas', $oficinas)
            ->with('tipo_usos', $tipo_usos)
            ->with('sos', $sos);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $req, $id)
    {
        //
        $computador = Computador::find($id);
        $computador->marca = $req->marca;
        $computador->so = $req->so;
        $computador->fecha = $req->fecha;
        $computador->encargado = $req->encargado;
        $computador->modelo = $req->modelo;
        $computador->ram = $req->ram;
        $computador->codigo_inventario = $req->codigo_inventario;

        $computador->save();

        foreach ($req->oficinas as $oficina_id) {
            # code...
            $oficina = Oficina::find($oficina_id);

            $computador->oficinas()->attach($oficina);
        }

        foreach ($req->tipos_usos as $usos_id) {
            # code...
            $tipo_uso = TipoUso::find($usos_id);
            $computador->tipo_usos()->attach($tipo_uso);
        }



        return redirect(url('comp/show/' . $computador->id));
    }

    /**
     * Remove the specified resource from storage.
     *<
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $computador=Computador::find($id);
        $computador->estado=false;
        $computador->save();
        
        return redirect(route('index'));

    }


    /**
     * Eliminar Comentario
     * @param int $computer_id
     * @param int $comentario_id
     */

    public function destroyComentario($computer_id,$id)
    {
        
        $comentario=Comentario::find($id);
        $comentario->delete();
        return redirect(route('show',$computer_id));
    }

    public function editarComentario($id)
    {
        $comentario=Comentario::find($id);
        $computador=Computador::find($comentario->computador->id);
        return view('relaciones.edit_comentario')->with('comentario',$comentario)
                                                ->with('computador',$computador);
    }

    /**
     * Agregar comentario
     * @param  \Illuminate\Http\Request  $req
     * @param int id
     * @return \Illuminate\Http\Response
     */
    public function agregarComentario($id)
    {
        $computador=Computador::find($id);
       
        return view('relaciones.add_comentario')->with('comentarios',$computador->comentarios)->with('compu_id',$id);
    }

    /**
     * Actualizar comentario
     * @param  \Illuminate\Http\Request  $req
     * @param int id
     * @return \Illuminate\Http\Response
     */
    public function updateComentario(Request $req,$id)
    {
        
        $comentario=Comentario::find($id);
        $comentario->comentario= $req->comentario;
        $comentario->save();
        return redirect(route('addcomentario',$comentario->computador_id));
    }
    /**
     * Guardar Comentario
     * @param  \Illuminate\Http\Request  $req
     * @param int id
     * @return \Illuminate\Http\Response
     */

    public function guardarComentario($computer_id,Request $req){

        $comentario= new Comentario;
        $computador= Computador::find($computer_id);
        $comentario->comentario= $req->comentario;
        $comentario->computador()->associate($computador);
        $comentario->save();
        return redirect(route('addcomentario',$computer_id));

    }
}
