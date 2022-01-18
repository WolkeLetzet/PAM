<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Computador;
use \App\Models\Oficina;
use App\Models\Comentario;
use App\Models\TipoUso;

class ComputadorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $data=Computador::with('oficinas')->with('encargado')->with('tipo_usos')->with('comentarios')->paginate(5);
        //$data=Computador::with('oficinas')->with('encargado')->get();
        
        return view('relaciones.index')->with('data',$data);
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
        return view('relaciones.create')->with('oficinas',$oficinas)->with('tipo_usos',$tipo_usos);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $computer=Computador::find($id);
        return view('relaciones.edit')->with('computer',$computer);
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
        
        return view('relaciones.edit')->with('computer',$computador)->with('oficinas',$oficinas)->with('tipo_usos',$tipo_usos);
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
