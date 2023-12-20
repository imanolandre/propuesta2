<?php

namespace App\Http\Controllers;

use App\Models\Proyecto;
use App\Models\Cliente;
use Illuminate\Http\Request;
use App\Exports\ProyectosExport;
use Maatwebsite\Excel\Facades\Excel;
use RealRashid\SweetAlert\Facades\Alert;

/**
 * Class ProyectoController
 * @package App\Http\Controllers
 */
class ProyectoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $proyectos = Proyecto::all();

        return view('proyecto.index', compact('proyectos'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $proyecto = new Proyecto();
        $clientes = Cliente::orderBy('nombrecliente')->pluck('nombrecliente', 'id'); // Obtener todos los nombres de clientes
        return view('proyecto.create', compact('proyecto', 'clientes'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'prototipo' => 'required|file|mimes:pdf|max:10240',
            'requerimientos' => 'required|file|mimes:pdf|max:10240',
        ]);
        $proyectoData = $request->except('prototipo', 'requerimientos');
        $proyectoData['cliente_id'] = $request->input('cliente_id');

        if ($request->hasFile('prototipo')) {
            $prototipoArchivo = $request->file('prototipo');
            $nombrePrototipo = $prototipoArchivo->getClientOriginalName();
            $prototipoArchivo->move(public_path('archivo/prototipo'), $nombrePrototipo);
            $proyectoData['prototipo'] = $nombrePrototipo;
        }

        if ($request->hasFile('requerimientos')) {
            $requerimientosArchivo = $request->file('requerimientos');
            $nombreRequerimientos = $requerimientosArchivo->getClientOriginalName();
            $requerimientosArchivo->move(public_path('archivo/requerimientos'), $nombreRequerimientos);
            $proyectoData['requerimientos'] = $nombreRequerimientos;
        }

        $proyecto = Proyecto::create($proyectoData);

        Alert::success('AGREGADO', 'Proyecto creado con éxito');
        return redirect()->route('proyectos.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $proyecto = Proyecto::find($id);
        $clientes = Cliente::pluck('nombrecliente', 'id');
        return view('proyecto.show', compact('proyecto','clientes'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $proyecto = Proyecto::find($id);
        $clientes = Cliente::orderBy('nombrecliente')->pluck('nombrecliente', 'id');
        return view('proyecto.edit', compact('proyecto','clientes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Proyecto $proyecto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Proyecto $proyecto)
    {
        $rules = Proyecto::$rules;
        $rules['prototipo'] = 'sometimes|file|mimes:pdf|max:10240';
        $rules['requerimientos'] = 'sometimes|file|mimes:pdf|max:10240';
        request()->validate($rules);

        $proyectoData = $request->except('prototipo', 'requerimientos');

        // Manejo del campo prototipo
        if ($request->hasFile('prototipo')) {
            $prototipoArchivo = $request->file('prototipo');
            $nombrePrototipo = $prototipoArchivo->getClientOriginalName();
            $prototipoArchivo->move(public_path('archivo/prototipo'), $nombrePrototipo);

            // Elimina el archivo anterior si existe
            $archivoAnteriorRuta = public_path('archivo/prototipo/' . $proyecto->prototipo);
            if (file_exists($archivoAnteriorRuta)) {
                unlink($archivoAnteriorRuta);
            }

            $proyectoData['prototipo'] = $nombrePrototipo;
        }

        // Manejo del campo requerimientos
        if ($request->hasFile('requerimientos')) {
            $requerimientosArchivo = $request->file('requerimientos');
            $nombreRequerimientos = $requerimientosArchivo->getClientOriginalName();
            $requerimientosArchivo->move(public_path('archivo/requerimientos'), $nombreRequerimientos);

            // Elimina el archivo anterior si existe
            $archivoAnteriorRuta = public_path('archivo/requerimientos/' . $proyecto->requerimientos);
            if (file_exists($archivoAnteriorRuta)) {
                unlink($archivoAnteriorRuta);
            }

            $proyectoData['requerimientos'] = $nombreRequerimientos;
        }

        $proyecto->update($proyectoData);

        Alert::success('ACTUALIZADO', 'Proyecto actualizado correctamente');
        return redirect()->route('proyectos.index');
    }


    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $proyecto = Proyecto::find($id);

        if (!$proyecto) {
            return redirect()->route('proyectos.index')
                ->with('error', 'Proyecto not found');
        }

        $archivo = public_path('archivo/prototipo/' . $proyecto->prototipo);
        if (file_exists($archivo)) {
            unlink($archivo);
        }

        $archivo = public_path('archivo/requerimientos/' . $proyecto->requerimientos);
        if (file_exists($archivo)) {
            unlink($archivo);
        }
        // Eliminar el proyecto
        $proyecto->delete();

        Alert::success('Eliminado', 'El proyecto ha sido borrado');
        return redirect()->route('proyectos.index');
    }



    public function export()
    {
        return Excel::download(new ProyectosExport, 'proyectos.xlsx');
    }
}
