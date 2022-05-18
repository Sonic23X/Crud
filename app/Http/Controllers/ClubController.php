<?php

namespace App\Http\Controllers;

use App\Models\Club;
use App\Models\Pais;
use App\Models\Ciudad;
use Illuminate\Http\Request;

class ClubController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
       
        $clubs = Club::all();
        return view('crud.index', compact('clubs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $paises = Pais::all();
        $ciudades = Ciudad::all();
        return view('crud.create', compact('paises','ciudades'));
    }

    public function getCityByAjax($id)
    {
        $paises = Pais::all();
        $ciudades = Ciudad::where('CountryCode', $id)->select('id','Name')->get();
        return response()->json($ciudades);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request) {
        $data = [
            'nombre' => $request->nombre,
            'apellidos' => $request->apellidos,
            'telefono' => $request->telefono,
            'fNacimiento' => $request->fNacimiento,
            'pais' => $request->pais,
            'ciudad' => $request->ciudad,
            'edad' => $this->calcularEdad($request->fNacimiento)
        ];
        
    
        Club::create($data);
    
        return redirect("club");
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
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id){
        $usuarioClub = Club::find($id);
        $paises = Pais::all();
        $ciudades = Ciudad::all();
        return view('crud.update', compact('usuarioClub', 'paises', 'ciudades'));
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
        $data = [
            'nombre' => $request->nombre,
            'apellidos' => $request->apellidos,
            'telefono' => $request->telefono,
            'fNacimiento' => $request->fNacimiento,
            'pais' => $request->pais,
            'ciudad' => $request->ciudad,
            'edad' => $this->calcularEdad($request->fNacimiento)
        ];
    
        $data = Club::where("id", $id)->update($data);
     
        return redirect('club') -> with ('usuario modificado', 'usuario modificado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        Club::destroy($id);
    
        return back() -> with ('usuario eliminado', 'usuario eliminado');
    }
    
    public function calcularEdad($fNacimiento){
        list($ano,$mes,$dia) = explode("-",$fNacimiento);
        $ano_diferencia  = date("Y") - $ano;
        $mes_diferencia = date("m") - $mes;
        $dia_diferencia   = date("d") - $dia;
        if ($dia_diferencia < 0 || $mes_diferencia < 0)
        $ano_diferencia--;
        
        return $ano_diferencia;
    }
}