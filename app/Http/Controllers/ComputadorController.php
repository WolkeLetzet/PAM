<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\TipoUso;
use \App\Models\Oficina;
use App\Models\Comentario;
use App\Models\Computador;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Facades\DB;


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
        if ($search) {
            $data = Computador::where('estado', '=', '1')->whereHas('oficinas', function ($query) use ($search) {
                return $query->where('nombre', 'LIKE', "%$search%");
            })->orWhere('encargado', 'LIKE', "%$search%")
                ->with('oficinas')
                ->with('tipo_usos')
                ->with('comentarios')
                ->paginate(10);
            $data->appends(['search' => $search]);
        } else {
            $data = Computador::where('estado', '=', '1')
                ->with('oficinas')
                ->with('tipo_usos')
                ->with('comentarios')->paginate(10);
        }





        return view('computador.index')->with('computers', $data);
    }
    /**IMPRIMIR */
    public function imprimir($id)
    {
        $computer = Computador::find($id);
        return PDF::setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true])->loadView('computador.print_comp', compact('computer'))->stream('invoice.pdf');
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
        return view('computador.create')->with('oficinas', $oficinas)
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

        $computador = new Computador;

        $req->validate([
            'modelo' => 'required|max:255',
            'fecha' => 'required|date',
            'marca' => 'required|max:255',
            'ram'=>'max:255',
            'encargado'=>'max:255',
            'so'=>'max:255',
            'codigo_inventario'=>'max:255',
            'almacenamiento'=>'max:255',
        ], $message = [
            'required' => 'Este campo es obligatorio',
            'max' => 'Maximo de 255 caracteres'
        ]);

        try {
            $computador->marca = $req->marca;
            $computador->so = $req->so;
            $computador->fecha = $req->fecha;
            $computador->encargado = $req->encargado;
            $computador->modelo = $req->modelo;
            $computador->ram = $req->ram;
            $computador->almacenamiento = $req->almacenamiento;
            $computador->codigo_inventario = $req->codigo_inventario;

            $computador->save();
            if ($req->newOficina) {
                $of = new Oficina;
                $of->nombre = $req->newOficina;
                $of->save();
                $computador->oficinas()->attach($of);
            }
            if ($req->newUso) {
                $newUso = new TipoUso;
                $newUso->nombre = $req->newUso;
                $newUso->save();
                $computador->tipo_usos()->attach($newUso);
            }
            if ($req->oficinas) {
                foreach ($req->oficinas as $oficina_id) {
                    # code...
                    $oficina = Oficina::find($oficina_id);

                    $computador->oficinas()->attach($oficina);
                }
            }
            if ($req->tipo_usos) {
                foreach ($req->tipo_usos as $usos_id) {
                    # code...
                    $tipo_uso = TipoUso::find($usos_id);
                    $computador->tipo_usos()->attach($tipo_uso);
                }
            }
            if ($req->comentario) {

                $comentario = new Comentario;
                $comentario->computador()->associate($computador);
                $comentario->comentario = $req->comentario;
                $comentario->save();
            }


            return redirect(route('show', $computador->id));
        } catch (Exception $e) {
            return view('error.show')->with('message', $e->getMessage());
        }
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
        if ($computer == null) {
            abort(404);
        }


        return view('computador.show')->with('computer', $computer);
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
        if ($computador == null) {
            abort(404);
        }

        $oficinas = Oficina::all();
        $tipo_usos = TipoUso::all();
        $sos = DB::table('computadores')->select('so')->distinct()->get();


        return view('computador.edit')->with('computer', $computador)
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
        if ($computador == null) {
            abort(404);
        }

        $req->validate([
            'modelo' => 'required|max:255',
            'fecha' => 'required|date',
            'marca' => 'required|max:255',
            'ram'=>'max:255',
            'encargado'=>'max:255',
            'so'=>'max:255',
            'codigo_inventario'=>'max:255',
            'almacenamiento'=>'max:255',
        ], $message = [
            'required' => 'Este campo es obligatorio',
            'max' => 'Maximo de 255 caracteres'
        ]);

        try {


            $computador->marca = $req->marca;
            $computador->so = $req->so;
            $computador->fecha = $req->fecha;
            $computador->encargado = $req->encargado;
            $computador->modelo = $req->modelo;
            $computador->ram = $req->ram;
            $computador->codigo_inventario = $req->codigo_inventario;

            $computador->save();

            if ($req->newOficina) {
                $of = new Oficina;
                $of->nombre = $req->newOficina;
                $of->save();
                $computador->oficinas()->attach($of);
            }
            if ($req->newUso) {
                $newUso = new TipoUso;
                $newUso->nombre = $req->newUso;
                $newUso->save();
                $computador->tipo_usos()->attach($newUso);
            }
            if ($req->oficinas) {
                foreach ($req->oficinas as $oficina_id) {
                    # code...
                    $oficina = Oficina::find($oficina_id);

                    $computador->oficinas()->attach($oficina);
                }
            }


            if ($req->tipo_usos) {
                foreach ($req->tipo_usos as $usos_id) {
                    # code...
                    $tipo_uso = TipoUso::find($usos_id);
                    $computador->tipo_usos()->attach($tipo_uso);
                }
            }
            return redirect(route('show', $computador->id));
        } catch (Exception $e) {
            return view('error.show')->with('message', $e->getMessage());
        }
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
        $computador = Computador::find($id);
        if ($computador == null) {
            abort(404);
        }

        $computador->estado = false;
        $computador->save();

        return redirect(route('index'));
    }


    /**
     * Eliminar Comentario
     * @param int $computer_id
     * @param int $comentario_id
     */

    public function destroyComentario($computer_id, $id)
    {

        $comentario = Comentario::find($id);
        $comentario->delete();
        return redirect(route('show', $computer_id));
    }

    public function editarComentario($id)
    {
        $comentario = Comentario::find($id);
        if ($comentario == null) {
            abort(404);
        }
        $computador = Computador::find($comentario->computador->id);
        return view('computador.edit_comentario')->with('comentario', $comentario)
            ->with('computador', $computador);
    }

    /**
     * Agregar comentario
     * @param  \Illuminate\Http\Request  $req
     * @param int id
     * @return \Illuminate\Http\Response
     */
    public function agregarComentario($id)
    {
        $computador = Computador::find($id);
        if ($computador == null) {
            abort(404);
        }

        return view('computador.add_comentario')->with('comentarios', $computador->comentarios)->with('compu_id', $id);
    }

    /**
     * Actualizar comentario
     * @param  \Illuminate\Http\Request  $req
     * @param int id
     * @return \Illuminate\Http\Response
     */
    public function updateComentario(Request $req, $id)
    {

        $comentario = Comentario::find($id);
        if ($comentario == null) {
            abort(404);
        }
        $req->validate([
            'comentario' => 'max:255'
        ]);
        $comentario->comentario = $req->comentario;
        $comentario->save();
        return redirect(route('addcomentario', $comentario->computador_id));
    }
    /**
     * Guardar Comentario
     * @param  \Illuminate\Http\Request  $req
     * @param int id
     * @return \Illuminate\Http\Response
     */

    public function guardarComentario($computer_id, Request $req)
    {
        $req->validate([
            'comentario' => 'max:255'
        ]);
        $comentario = new Comentario;
        $computador = Computador::find($computer_id);
        $comentario->comentario = $req->comentario;
        $comentario->computador()->associate($computador);
        $comentario->save();
        return redirect(route('addcomentario', $computer_id));
    }
}
