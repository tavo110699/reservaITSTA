<?php

namespace App\Http\Controllers;

use App\Models\Evento;
use App\Models\User;
use Illuminate\Http\Request;
use Carbon\Carbon;



use Illuminate\Support\Facades\DB;


class EventoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        request()->validate(Evento::$rules);
        Evento::create([
            'title' => $request->get('title'),
            'description' => $request->get('description'),
            'idUser' => $request->user()->id,
            'start' => $request->get('start'),
            'end' => $request->get('end'),
        ]);
        //$evento = Evento::create($request->all());
        /**
         * $this->validate($request,[
         * 'title'=> 'required',
         * 'description' => 'required',
         * 'start' =>'required',
         * 'end' => 'required',
         * ]);
         *
         * $request['idUser'] = Auth::user()->id;
         *
         * Evento::create($request->all());
         *
         *
         * Evento::create([
         * 'title'=> $request->get('title'),
         * 'description' => $request->get('description'),
         * 'idUser' =>  $request->user()->id,
         * 'start' => $request->get('start'),
         * 'end' => $request->get('end'),
         * ]);
         */
        //   return view('dashboard');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Evento $evento
     * @return \Illuminate\Http\Response
     */
    public function show(Evento $evento)
    {
        //

        $evento = Evento::all();
        return response()->json($evento);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Evento $evento
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //

        $evento = Evento::find($id);
        $evento->start = Carbon::parse($evento->start)->format('Y-m-d\TH:i');
        $evento->end = Carbon::parse($evento->end)->format('Y-m-d\TH:i');
        return response()->json($evento);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Evento $evento
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Evento $evento)
    {
        //
        request()->validate(Evento::$rules);

        $evento->update([
            'title' => $request->get('title'),
            'description' => $request->get('description'),
            'idUser' => $request->user()->id,
            'start' => $request->get('start'),
            'end' => $request->get('end'),
        ]);
        return response()->json($evento);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Evento $evento
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //

        $evento = Evento::find($id);
        $userDB = $evento->idUser;
        $userLog = auth()->user()->id;

        if ($userLog == $userDB) {

            $evento = Evento::find($id)->delete();

            session()->flash('mensaje', 'Evento eliminado exitosamente.');

            return response()->json($evento)-with('mensaje',"Evento eliminado exitosamente.");
            Session::flash('message', 'Evento eliminado exitosamente.');
            return redirect()->route('dashboard');

        }else{

            return  session()->flash('mensaje', 'No puedes eliminar eventos a menos que seas quien lo creo');

        }

    }
}
