<?php

namespace App\Http\Controllers;

use App\Models\encargadoSitio;
use App\Models\Place;
use App\Models\User;
use Illuminate\Http\Request;

class PlaceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $places = Place::paginate(15);
        //$encargado = encargadoSitio::all();
   
        $encargado = encargadoSitio::with('getUser','id')->where('idUser','=', $places);
        return view('admin.places.index', compact('places','encargado'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $usuarios = User::all();
        return view('admin.places.crear', compact('usuarios'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        //valida la informacion
       /** $request->validate($request, [
            'name' => 'required|unique',
            'capacidadMax' => 'required',
            'localizacion' => 'required'
        ]);*/


        $places =Place::create([
            'name'=>$request->get('nombre'),
             'capacidadMax' =>$request->get('capacidad'),
            'localizacion' => $request->get('localizacion')
        ]);
      encargadoSitio::create([
          'idPlace'=> $places->id,
          'idUser' => $request->get('idUser')
      ]);

        return redirect('places');
        //Place::create($request->all());

      //  return back();
        //  return redirect()->back()->with('mensaje', 'your message,here');
      //  return redirect()->route('places.index');






    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Place $place
     * @return \Illuminate\Http\Response
     */
    public function show(Place $place)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Place $place
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $places = Place::find($id);
        return view('admin.places.edit', compact('places'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Place $place
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $places = Place::find($id);

        $places->name = $request->nombre;
        $places->capacidadMax = $request->capacidad;
        $places->localizacion = $request->localizacion;

        $places->update();
        if ($places->update()){
            return redirect()->route('places.index')->with('mensaje', 'Usuario actualizado con exito');

        }
        return redirect()->route('places.edit', $places->id)->with('mensaje', 'No se pudo actualizar el usuario');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Place $place
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $places = Place::find($id);

        if ($places != null){

            if ($places->delete()) {
                return redirect()->route('places.index')->with('mensaje', 'Lugar eliminado correctamente');

            }
        }
        return redirect()->route('places.index')->with('mensaje', 'Es posible que el lugar con este Id no exista');
    }
}
