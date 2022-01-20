<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Computador;
use \App\Models\Oficina;
use App\Models\Comentario;
use App\Models\TipoUso;
use Illuminate\Support\Facades\DB;

class ComputadorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $data=Computador::with('oficinas') 
                        ->with('tipo_usos')
                        ->with('comentarios')->paginate(10);
        //$data=Computador::with('oficinas')->with('encargado')->get();
        
        return view('relaciones.index')->with('computers',$data);
                                       
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
        $tipo_usos= TipoUso::all();
        $marcas= DB::table('computadores')->select('marca')->distinct()->get();
        $sos= DB::table('computadores')->select('so')->distinct()->get();
        return view('relaciones.create')->with('oficinas',$oficinas)
                                        ->with('tipo_usos',$tipo_usos)
                                        ->with('marcas',$marcas)
                                        ->with('sos',$sos);
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

        
        $computador= new Computador;
        $computador->marca= $req->marca;
        $computador->so= $req->so;
        $computador->fecha=$req->fecha;
        $computador->almacenamiento=$req->almacenamiento;
        $computador->modelo=$req->modelo;
        $computador->ram=$req->ram;
        $computador->tipo_almac=$req->tipoAlm;

        
       
        
                
        $computador->save();

        foreach ($req->oficinas as $oficina_id) {
            # code...
            $oficina=Oficina::find($oficina_id);
           
            $computador->oficinas()->attach($oficina);
        }

        foreach ($req->tipo_usos as $usos_id) {
            # code...
            $tipo_uso=TipoUso::find($usos_id);
            $computador->tipo_usos()->attach($tipo_uso);
        }

        return redirect('/');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $computer=Computador::find($id);
        return view('relaciones.show')->with('computer',$computer);
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
        $computador=Computador::find($id);
        $oficinas = Oficina::all();
        $tipo_usos= TipoUso::all();
        $sos= DB::table('computadores')->select('so')->distinct()->get();

        
        return view('relaciones.edit')  ->with('computer',$computador)
                                        ->with('oficinas',$oficinas)
                                        ->with('tipo_usos',$tipo_usos)
                                        ->with('sos',$sos);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
