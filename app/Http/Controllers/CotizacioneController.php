<?php

namespace App\Http\Controllers;

use App\Models\Cotizacione;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use RealRashid\SweetAlert\Facades\Alert;

/**
 * Class CotizacioneController
 * @package App\Http\Controllers
 */
class CotizacioneController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $cotizaciones = Cotizacione::orderBy('created_at', 'desc')->get();

        return view('cotizacione.index', compact('cotizaciones'));    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cotizacione = new Cotizacione();
        return view('cotizacione.create', compact('cotizacione'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Cotizacione::$rules);

         // Obtén la abreviatura del servicio
        $abreviaturaServicio = ($request->input('servicio') === 'E-commerce') ? 'EC' : 'PW';

        // Obtén el nombre del cliente
        $nombreCliente = $request->input('cliente');
        // Obtén la fecha actual con el formato deseado (Nov-28-23)
        $fechaActual = Carbon::now()->locale('es_ES')->isoFormat('D-MMM-YY');
        $fechaActualEnMayuscula = strtoupper($fechaActual);

        $fechaFolio = Carbon::now()->locale('es_ES')->isoFormat('MMM');
        $fechaFolioMayuscula = strtoupper($fechaFolio);
        $folio = "COT-{$fechaFolioMayuscula}";
        // Concatena las partes para formar el nombre del archivo
        $nombreArchivo = "COT-{$abreviaturaServicio}-{$nombreCliente}-{$fechaActualEnMayuscula}";

        // Obtener importe, descuento e importe adicional del formulario
        $importe = number_format(floatval($request->input('importe')), 2, '.', '');
        $descuento = number_format(floatval($request->input('descuento')), 2, '.', '');
        $total = number_format(floatval($request->input('total')), 2, '.', '');
        $importeAdicional1 = number_format(floatval($request->input('importeadicional1')), 2, '.', '');
        $importeAdicional2 = number_format(floatval($request->input('importeadicional2')), 2, '.', '');
        $importeAdicional3 = number_format(floatval($request->input('importeadicional3')), 2, '.', '');
        $importeAdicional4 = number_format(floatval($request->input('importeadicional4')), 2, '.', '');
        $importeAdicional5 = number_format(floatval($request->input('importeadicional5')), 2, '.', '');
        $importeAdicionalTotal = $importeAdicional1+$importeAdicional2+$importeAdicional3+$importeAdicional4+$importeAdicional5;

        // Calcular el total
        $total = $importe;

        // Si importe adicional no está vacío, agregarlo al total y restar el descuento
        if (!empty($importeAdicionalTotal)) {
            $total += $importeAdicionalTotal;
            $total -= $descuento;
        } else {
            // Si importe adicional está vacío, restar el descuento al total
            $total -= $descuento;
        }
        // Calcular anticipoadi solo si hay importe adicional
        $anticipoadi = (!empty($importeAdicionalTotal)) ? $importeAdicionalTotal / 2 : 0;

        $anticipo = $total / 2;
        $anticipopr = number_format(($importe - $descuento) / 2, 2, '.', '');

        // Crear la cotización
        $cotizacione = Cotizacione::create($request->all() + [
            'total' => number_format($total, 2, '.', ''),
            'importe' => $importe, // Formatear valor con 2 decimales
            'descuento' => $descuento,
            'anticipo' => number_format($anticipo, 2, '.', ''),
            'anticipoadi' => number_format($anticipoadi, 2, '.', ''),
            'anticipototal' => number_format($anticipo, 2, '.', ''),
            'importeadicional1' => $importeAdicional1,
            'importeadicional2' => $importeAdicional2,
            'importeadicional3' => $importeAdicional3,
            'importeadicional4' => $importeAdicional4,
            'importeadicional5' => $importeAdicional5,
            'folio' => $folio,
        ]);

        // Generate the PDF
        $pdf = PDF::loadView('cotizacione.cotizacion', compact('cotizacione', 'nombreArchivo','anticipopr'));

        // Save the PDF in the public/archivo/documentos folder
        $pdfPath = "archivo/documentos/{$nombreArchivo}.pdf";
        $pdf->save(public_path($pdfPath));

        // Update the 'documento' field in the Cotizacione
        $cotizacione->update(['documento' => $pdfPath]);

        Alert::success('AGREGADO', 'Cotización creada con éxito');
        return redirect()->route('cotizaciones.index')->with('folio', $folio);;
    }
    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cotizacione = Cotizacione::find($id);
        $nombreArchivo = "COT-{$cotizacione->abreviatura_servicio}-{$cotizacione->cliente}-{$cotizacione->fecha_actual}";
        $anticipopr = "{$cotizacione->anticipopr}";
        return view('cotizacione.show', compact('cotizacione','nombreArchivo','anticipopr'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cotizacione = Cotizacione::find($id);
        return view('cotizacione.edit', compact('cotizacione'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Cotizacione $cotizacione
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cotizacione $cotizacione)
    {
        request()->validate(Cotizacione::$rules);

        $abreviaturaServicio = ($request->input('servicio') === 'E-commerce') ? 'EC' : 'PW';

        // Obtén el nombre del cliente
        $nombreCliente = $request->input('cliente');

        $fechaActual = Carbon::now()->locale('es_ES')->isoFormat('D-MMM-YY');
        $fechaActualEnMayuscula = strtoupper($fechaActual);

        $fechaFolio = Carbon::now()->locale('es_ES')->isoFormat('MMM');
        $fechaFolioMayuscula = strtoupper($fechaFolio);
        $folio = "COT-{$fechaFolioMayuscula}";
        // Concatena las partes para formar el nombre del archivo
        $nombreArchivo = "COT-{$abreviaturaServicio}-{$nombreCliente}-{$fechaActualEnMayuscula}";

        // Obtener importe y descuento del formulario
        $importe = floatval($request->input('importe'));
        $descuento = floatval($request->input('descuento'));
        $importeAdicional1 = number_format(floatval($request->input('importeadicional1')), 2, '.', '');
        $importeAdicional2 = number_format(floatval($request->input('importeadicional2')), 2, '.', '');
        $importeAdicional3 = number_format(floatval($request->input('importeadicional3')), 2, '.', '');
        $importeAdicional4 = number_format(floatval($request->input('importeadicional4')), 2, '.', '');
        $importeAdicional5 = number_format(floatval($request->input('importeadicional5')), 2, '.', '');
        $importeAdicionalTotal = $importeAdicional1+$importeAdicional2+$importeAdicional3+$importeAdicional4+$importeAdicional5;
        $total = $importe;

        // Si importe adicional no está vacío, agregarlo al total y restar el descuento
        if (!empty($importeAdicionalTotal)) {
            $total += $importeAdicionalTotal;
            $total -= $descuento;
        } else {
            // Si importe adicional está vacío, restar el descuento al total
            $total -= $descuento;
        }
        // Calcular anticipoadi solo si hay importe adicional
        $anticipoadi = (!empty($importeAdicionalTotal)) ? $importeAdicionalTotal / 2 : 0;

        $anticipo = $total / 2;
        $anticipopr = number_format(($importe - $descuento) / 2, 2, '.', '');
        // Formatear importe, descuento y anticipo con 2 decimales
        $importeFormateado = number_format($importe, 2, '.', '');
        $descuentoFormateado = number_format($descuento, 2, '.', '');
        $anticipoFormateado = number_format($anticipo, 2, '.', '');

        // Actualizar la cotización con los nuevos valores
        $cotizacione->update(array_merge($request->all(), [
            'total' => number_format($total, 2, '.', ''), // Formatear total con 2 decimales
            'anticipo' => number_format($anticipo, 2, '.', ''), // Formatear anticipo con 2 decimales
            'anticipoadi' => number_format($anticipoadi, 2, '.', ''), // Formatear anticipoadi con 2 decimales
            'anticipototal' => number_format($anticipo, 2, '.', ''),
            'importe' => number_format($importe, 2, '.', ''), // Inicialmente anticipototal es igual a anticipo
            'descuento' => number_format($descuento, 2, '.', ''),
            'importeadicional1' => $importeAdicional1,
            'importeadicional2' => $importeAdicional2,
            'importeadicional3' => $importeAdicional3,
            'importeadicional4' => $importeAdicional4,
            'importeadicional5' => $importeAdicional5,
            'folio' => $folio,
        ]));

        // Generate the updated PDF
        $pdf = PDF::loadView('cotizacione.cotizacion', compact('cotizacione', 'nombreArchivo','anticipopr'));

        // Save the updated PDF in the public/archivo/documentos folder
        $pdfPath = "archivo/documentos/{$nombreArchivo}.pdf";
        $pdf->save(public_path($pdfPath));

        // Update the 'documento' field in the Cotizacione
        $cotizacione->update(['documento' => $pdfPath]);

        Alert::success('ACTUALIZADO', 'Cotización actualizado correctamente');
        return redirect()->route('cotizaciones.index');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        // Obtén la cotización
        $cotizacione = Cotizacione::find($id);

        // Obtén el nombre del archivo del campo 'documento'
        $documentoPath = $cotizacione->documento;

        // Elimina la cotización
        $cotizacione->delete();

        // Verifica si el nombre del archivo existe y elimina el archivo correspondiente
        if (!empty($documentoPath) && file_exists(public_path($documentoPath))) {
            unlink(public_path($documentoPath));
        }
        Alert::success('Eliminado', 'La cotización ha sido borrado');
        return redirect()->route('cotizaciones.index');
    }
}
