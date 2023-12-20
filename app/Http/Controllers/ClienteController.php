<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;
use App\Exports\ClientesExport;
use Maatwebsite\Excel\Facades\Excel;
use RealRashid\SweetAlert\Facades\Alert;

/**
 * Class ClienteController
 * @package App\Http\Controllers
 */
class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $clientes = Cliente::all();

        return view('cliente.index', compact('clientes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cliente = new Cliente();
        return view('cliente.create', compact('cliente'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = Cliente::$rules;
        $rules['constanciasituaciónFiscal'] = 'sometimes|file|mimes:pdf|max:10240';
        $customMessages = [
            'nombrecliente.required' => 'El campo Nombre del Cliente es obligatorio.',
            'correo.required' => 'El campo Correo Electrónico es obligatorio.',
            'teléfono.required' => 'El campo Teléfono es obligatorio.',
            'empresa.required' => 'El campo Nombre de la Empresa es obligatorio.',
            'sitioweb.required' => 'El campo Sitio Web es obligatorio.',
            'dirección.required' => 'El campo Dirección es obligatorio.',
        ];
        request()->validate($rules, $customMessages);

        $clienteData = $request->except('constanciasituaciónFiscal');

        if ($request->hasFile('constanciasituaciónFiscal')) {
            $archivo = $request->file('constanciasituaciónFiscal');
            $nombreArchivo = $archivo->getClientOriginalName();
            $archivo->move(public_path('archivo/clientes'), $nombreArchivo);
            $clienteData['constanciasituaciónFiscal'] = $nombreArchivo;
        }

        $cliente = Cliente::create($clienteData);

        Alert::success('AGREGADO', 'Cliente creado con éxito');
        return redirect()->route('clientes.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cliente = Cliente::find($id);

        return view('cliente.show', compact('cliente'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cliente = Cliente::find($id);

        return view('cliente.edit', compact('cliente'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Cliente $cliente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cliente $cliente)
    {
        $rules = Cliente::$rules;
        $rules['constanciasituaciónFiscal'] = 'sometimes|file|mimes:pdf|max:10240';
        request()->validate($rules);

        // Obtén el nombre del archivo actual asociado al cliente
        $archivoAnterior = $cliente->constanciasituaciónFiscal;
        $archivoAnteriorRuta = public_path('archivo/clientes/' . $archivoAnterior);

        $clienteData = $request->except('constanciasituaciónFiscal');

        if ($request->hasFile('constanciasituaciónFiscal')) {
            // Sube el nuevo archivo
            $archivoNuevo = $request->file('constanciasituaciónFiscal');
            $nombreArchivoNuevo = $archivoNuevo->getClientOriginalName();
            $archivoNuevo->move(public_path('archivo/clientes'), $nombreArchivoNuevo);

            // Actualiza el nombre del archivo en los datos del cliente
            $clienteData['constanciasituaciónFiscal'] = $nombreArchivoNuevo;

            // Elimina el archivo anterior
            if ($archivoAnterior && file_exists($archivoAnteriorRuta)) {
                unlink($archivoAnteriorRuta);
            }
        } elseif ($request->filled('constanciasituaciónFiscal')) {
            // Mantén el nombre del archivo actual solo si existe
            if ($archivoAnterior && file_exists($archivoAnteriorRuta)) {
                $clienteData['constanciasituaciónFiscal'] = $archivoAnterior;
            } else {
                // Maneja el caso en el que el archivo anterior no existe
                $clienteData['constanciasituaciónFiscal'] = null;
            }
        } else {
            // No se proporcionó un nuevo archivo y el campo está vacío
            $clienteData['constanciasituaciónFiscal'] = $archivoAnterior;
        }

        $cliente->update($clienteData);

        Alert::success('ACTUALIZADO', 'Cliente actualizado correctamente');
        return redirect()->route('clientes.index');
    }


    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $cliente = Cliente::find($id);

        if (!$cliente) {
            return redirect()->route('clientes.index')
                ->with('error', 'Cliente not found');
        }

        $archivo = public_path('archivo/clientes/' . $cliente->constanciasituaciónFiscal);
        if (file_exists($archivo)) {
            unlink($archivo);
        }

        $cliente->delete();

        Alert::success('Eliminado', 'El cliente ha sido borrado');
        return redirect()->route('clientes.index');
    }

    public function export()
    {
        return Excel::download(new ClientesExport, 'clientes.xlsx');
    }
}
