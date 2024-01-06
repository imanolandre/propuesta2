<?php

namespace App\Http\Controllers;

use App\Models\Comprobante;
use Illuminate\Http\Request;
use App\Models\Cotizacione;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use RealRashid\SweetAlert\Facades\Alert;
/**
 * Class ComprobanteController
 * @package App\Http\Controllers
 */
class ComprobanteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comprobantes = Comprobante::orderBy('created_at', 'desc')->get();

        return view('comprobante.index', compact('comprobantes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $comprobante = new Comprobante();
        $cotizaciones = Cotizacione::orderBy('documento')->pluck('documento', 'id');

        // Extraer solo el nombre del archivo de la ruta
        $cotizaciones = $cotizaciones->map(function ($documento) {
            return pathinfo($documento)['filename'];
        });
        // Obtener datos adicionales de la cotización seleccionada
        $nombreCliente = ''; // Obtén el nombre del cliente utilizando la función obtenerNombreCliente
        $nombreServicio = ''; // Obtén el nombre del servicio de la cotización seleccionada
        $nombreTotal = ''; // Obtén el total de la cotización seleccionada
        $nombreAnticipo = ''; // Obtén el anticipo de la cotización seleccionada
        $nombreDescripcion = ''; // Obtén la descripción de la cotización seleccionada

        return view('comprobante.create', compact('comprobante', 'cotizaciones', 'nombreCliente', 'nombreServicio', 'nombreTotal', 'nombreAnticipo', 'nombreDescripcion'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(Comprobante::$rules);

        // Obtén la cotización antes de crear el comprobante
        $cotizacionId = $request->input('cotizacion_id');
        $cotizacione = Cotizacione::find($cotizacionId);
        $fechaFolio = Carbon::now()->locale('es_ES')->isoFormat('MMM');
        $fechaFolioMayuscula = strtoupper($fechaFolio);
        $foliocom = "COMP-{$fechaFolioMayuscula}";
        $foliocot = $cotizacione->folio . '-' . str_pad($cotizacione->id, 3, '0', STR_PAD_LEFT);

        if (!$cotizacione) {
            // Manejar el caso en el que la cotización no se encuentre
            return redirect()->route('comprobante.index')->with('error', 'No se pudo encontrar la cotización asociada.');
        }

        $comprobante = Comprobante::create($request->all());
        // Usar comillas dobles para evaluar las variables correctamente
        $nombreDocumento = "{$cotizacione->servicio} {$cotizacione->planes}";

        // Genera el PDF utilizando la vista 'comprobante.blade.php'
        $pdf = PDF::loadView('comprobante.comprobante', compact('cotizacione','comprobante','nombreDocumento','foliocom','foliocot'));

        // Guarda el PDF en la carpeta public/archivo/comprobante
        $pdfPath = "archivo/comprobante/Comprobante de Pago {$nombreDocumento} - {$comprobante->documento} - DESARROLLALAB.pdf";
        $pdf->save(public_path($pdfPath));

        // Actualiza el campo 'adjunto' en el modelo Comprobante
        $comprobante->update(['adjunto' => $pdfPath]);

        Alert::success('AGREGADO', 'Comprobante creada con éxito');
        return redirect()->route('comprobante.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $comprobante = Comprobante::find($id);

        return view('comprobante.show', compact('comprobante'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $comprobante = Comprobante::find($id);
        $cotizaciones = Cotizacione::orderBy('documento')->pluck('documento', 'id');

        // Extraer solo el nombre del archivo de la ruta
        $cotizaciones = $cotizaciones->map(function ($documento) {
            return pathinfo($documento)['filename'];
        });

        // Obtener datos adicionales de la cotización seleccionada
        $nombreCliente = ''; // Inicializar las variables
        $nombreServicio = '';
        $nombreTotal = '';
        $nombreAnticipo = '';
        $nombreDescripcion = '';

        return view('comprobante.edit', compact('comprobante', 'cotizaciones', 'nombreCliente', 'nombreServicio', 'nombreTotal', 'nombreAnticipo', 'nombreDescripcion'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Comprobante $comprobante
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comprobante $comprobante)
    {
        $request->validate(Comprobante::$rules);

        // Obtén la cotización antes de actualizar el comprobante
        $cotizacionId = $request->input('cotizacion_id');
        $cotizacione = Cotizacione::find($cotizacionId);
        $fechaFolio = Carbon::now()->locale('es_ES')->isoFormat('MMM');
        $fechaFolioMayuscula = strtoupper($fechaFolio);
        $foliocom = "COMP-{$fechaFolioMayuscula}";
        $foliocot = $cotizacione->folio . '-' . str_pad($cotizacione->id, 3, '0', STR_PAD_LEFT);

        if (!$cotizacione) {
            // Manejar el caso en el que la cotización no se encuentre
            return redirect()->route('comprobante.index')->with('error', 'No se pudo encontrar la cotización asociada.');
        }

        $comprobante->update($request->all());
        // Usar comillas dobles para evaluar las variables correctamente
        $nombreDocumento = "{$cotizacione->servicio} {$cotizacione->planes}";

        // Genera el PDF utilizando la vista 'comprobante.blade.php'
        $pdf = PDF::loadView('comprobante.comprobante', compact('cotizacione', 'comprobante', 'nombreDocumento', 'foliocom', 'foliocot'));

        // Guarda el PDF en la carpeta public/archivo/comprobante
        $pdfPath = "archivo/comprobante/Comprobante de Pago {$nombreDocumento} - {$comprobante->documento} - DESARROLLALAB.pdf";
        $pdf->save(public_path($pdfPath));

        // Actualiza el campo 'adjunto' en el modelo Comprobante
        $comprobante->update(['adjunto' => $pdfPath]);

        Alert::success('ACTUALIZADO', 'Comprobante actualizado correctamente');
        return redirect()->route('comprobante.index');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $comprobante = Comprobante::find($id);
        $documentoPath = $comprobante->adjunto;
        // Elimina la cotización
        $comprobante->delete();
        if (!empty($documentoPath) && file_exists(public_path($documentoPath))) {
            unlink(public_path($documentoPath));
        }

        Alert::success('Eliminado', 'El comprobante ha sido borrado');
        return redirect()->route('comprobante.index');
    }

    // Función en el controlador de PagoController
    public function obtenerDatosCotizacion($cotizacionId)
    {
        $cotizacion = Cotizacione::find($cotizacionId);

        if ($cotizacion) {

                $nombreCliente = $cotizacion->cliente;
                $nombreServicio = $cotizacion->servicio;
                $nombreTotal = $cotizacion->total;
                $nombreAnticipo = $cotizacion->anticipo;
                $nombreDescripcion = $cotizacion->descripcion;


            return response()->json(['nombreCliente' => $nombreCliente, 'nombreServicio' => $nombreServicio, 'nombreTotal' => $nombreTotal, 'nombreAnticipo' => $nombreAnticipo, 'nombreDescripcion' => $nombreDescripcion]);
        }

        return response()->json([]);
    }
}
