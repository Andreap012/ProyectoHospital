<?php

namespace App\Http\Controllers;

use App;
use Gate;
use Illuminate\Http\Request;

class Diagnos2Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $diaagnos2 = App\Diagnos2::orderby('fecha','asc')->get();
        return view('diagnos2.index', compact('diagnos2'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Gate::denies('crear')) {
            return redirect()->route('diagnos2.index');
        }

        $pacientes = App\Paciente::orderby('nombre','asc')->get();
        $diagnosticos = App\Diagnostico::orderby('codigo','asc')->get();
        return view('diagnos2.insert', compact('pacientes','diagnosticos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'fecha' => 'required',
            'idpaciente' => 'required',
            'iddiagnostico' => 'required'
            ]);

       App\Diagnos2::create($request->all());

       return redirect()->route('diagnos2.index')
                        ->with('exito','Se ha Creado Resultado Correctamente!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Diagnos2  $diagnos2
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $diagnos2 = App\Diagnos2::join('pacientes','diagnos2s.idpaciente','pacientes.id')
                            ->join('diagnosticos','diaagnos2.iddiagnostico','diagnosticos.id')
                            ->select('diagnos2s.*','pacientes.nombre as paciente','diagnosticos.codigo as diagnostico')
                            ->where('diagnos2s.id',$id)
                            ->first();


        return view('diagnos2.view', compact('diagnos2'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Diagnos2  $diagnos2
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (Gate::denies('editar')) {
            return redirect()->route('diagnos2.index');
        }

        $pacientes = App\Paciente::orderby('nombre','asc')->get();
        $diagnosticos = App\Diagnostico::orderby('codigo','asc')->get();
        $consulta = App\Consulta::findorfail($id);

        return view('consulta.edit', compact('consulta','medicos','diagnosticos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Diagnos2  $diagnos2
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Diagnos2 $diagnos2)
    {
        $request->validate([
            'fecha' => 'required',
            'idpaciente' => 'required',
            'iddiagnostico' => 'required'
        ]);


       $diagdiagnos2 = App\Diagnos2::findorfail($id);
       
       $diagnos2->update($request->all());

       return redirect()->route('diagnos2.index')
                        ->with('exito','Resultado modificado con exito!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Diagnos2  $diagnos2
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        if (Gate::denies('eliminar')) {
            return redirect()->route('diagnos2.index');
        }

        $diagnos2 = App\Diagnos2::findorfail($id);

        $diagnos2->delete();

        return redirect()->route('diagnos2.index')
                        -> with('exito','Resultado eliminado correctamente!');
    }
    
}
