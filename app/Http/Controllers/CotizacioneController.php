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
        $buscarpor = $request->input('buscarpor', '');
        $orden = $request->input('orden', 'cliente'); // Cambia 'nombrecliente' por el campo de tu tabla
        $direccion = $request->input('direccion', 'asc');

        $direccionCliente = ($orden === 'cliente') ? ($direccion === 'asc' ? 'desc' : 'asc') : 'asc';
        $direccionServicio = ($orden === 'servicio') ? ($direccion === 'asc' ? 'desc' : 'asc') : 'asc';
        $direccionPlanes = ($orden === 'planes') ? ($direccion === 'asc' ? 'desc' : 'asc') : 'asc';
        $direccionImporte = ($orden === 'importe') ? ($direccion === 'asc' ? 'desc' : 'asc') : 'asc';
        $direccionDescuento = ($orden === 'descuento') ? ($direccion === 'asc' ? 'desc' : 'asc') : 'asc';
        $direccionDocumento = ($orden === 'documento') ? ($direccion === 'asc' ? 'desc' : 'asc') : 'asc';

        $cotizaciones = Cotizacione::where('cliente', 'like', '%' . $buscarpor . '%')
            ->orWhere('servicio', 'like', '%' . $buscarpor . '%')
            ->orWhere('planes', 'like', '%' . $buscarpor . '%')
            ->orWhere('importe', 'like', '%' . $buscarpor . '%')
            ->orWhere('descuento', 'like', '%' . $buscarpor . '%')
            ->orderBy($orden, $direccion)
            ->paginate(10);

        return view('cotizacione.index', compact('cotizaciones', 'buscarpor', 'orden', 'direccionCliente', 'direccionServicio', 'direccionPlanes', 'direccionImporte', 'direccionDescuento','direccionDocumento'))
            ->with('i', (request()->input('page', 1) - 1) * $cotizaciones->perPage());
    }

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
        Carbon::setLocale('es');
        // Obtén la fecha actual con el formato deseado (Nov-28-23)
        $fechaActual = now()->format('M-d-y');

        // Concatena las partes para formar el nombre del archivo
        $nombreArchivo = "COT-{$abreviaturaServicio}-{$nombreCliente}-{$fechaActual}";

        // Obtener importe, descuento e importe adicional del formulario
        $importe = floatval($request->input('importe'));
        $descuento = floatval($request->input('descuento'));
        $importeAdicional = floatval($request->input('importeadicional'));

        // Calcular el total
        $total = $importe;

        // Si importe adicional no está vacío, agregarlo al total y restar el descuento
        if (!empty($importeAdicional)) {
            $total += $importeAdicional;
            $total -= $descuento;
        } else {
            // Si importe adicional está vacío, restar el descuento al total
            $total -= $descuento;
        }
        // Calcular anticipoadi solo si hay importe adicional
        $anticipoadi = (!empty($importeAdicional)) ? $importeAdicional / 2 : 0;

        $anticipo = $total / 2;

        // Crear la cotización
        $cotizacione = Cotizacione::create($request->all() + [
            'total' => number_format($total, 2, '.', ''), // Formatear total con 2 decimales
            'anticipo' => number_format($anticipo, 2, '.', ''), // Formatear anticipo con 2 decimales
            'anticipoadi' => number_format($anticipoadi, 2, '.', ''), // Formatear anticipoadi con 2 decimales
            'anticipototal' => number_format($anticipo, 2, '.', ''), // Inicialmente anticipototal es igual a anticipo
        ]);

        // Generate the PDF
        $pdf = PDF::loadView('cotizacione.cotizacion', compact('cotizacione', 'nombreArchivo'));

        // Save the PDF in the public/archivo/documentos folder
        $pdfPath = "archivo/documentos/{$nombreArchivo}.pdf";
        $pdf->save(public_path($pdfPath));

        // Update the 'documento' field in the Cotizacione
        $cotizacione->update(['documento' => $pdfPath]);

        Alert::success('AGREGADO', 'Cotización creada con éxito');
        return redirect()->route('cotizaciones.index');
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

        return view('cotizacione.show', compact('cotizacione','nombreArchivo'));
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

        Carbon::setLocale('es');
        // Obtén la fecha actual con el formato deseado (Nov-28-23)
        $fechaActual = now()->format('M-d-y');

        // Concatena las partes para formar el nombre del archivo
        $nombreArchivo = "COT-{$abreviaturaServicio}-{$nombreCliente}-{$fechaActual}";

        // Obtener importe y descuento del formulario
        $importe = floatval($request->input('importe'));
        $descuento = floatval($request->input('descuento'));

        // Calcular el total
        $total = $importe - $descuento;

        // Calcular el anticipo
        $anticipo = $total / 2;

        // Formatear importe, descuento y anticipo con 2 decimales
        $importeFormateado = number_format($importe, 2, '.', '');
        $descuentoFormateado = number_format($descuento, 2, '.', '');
        $anticipoFormateado = number_format($anticipo, 2, '.', '');

        // Actualizar la cotización con los nuevos valores
        $cotizacione->update(array_merge($request->all(), [
            'importe' => $importeFormateado,
            'descuento' => $descuentoFormateado,
            'anticipo' => $anticipoFormateado,
        ]));

        // Generate the updated PDF
        $pdf = PDF::loadView('cotizacione.cotizacion', compact('cotizacione', 'nombreArchivo'));

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
