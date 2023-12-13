<?php

namespace App\Http\Controllers;

use App\Models\Pago;
use App\Models\Proyecto;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Barryvdh\DomPDF\Facade\Pdf;

/**
 * Class PagoController
 * @package App\Http\Controllers
 */
class PagoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $buscarpor = $request->input('buscarpor', '');
        $orden = $request->input('orden', 'fecha');
        $direccion = $request->input('direccion', 'desc');

        $direccionFecha = ($orden === 'fecha') ? ($direccion === 'asc' ? 'desc' : 'asc') : 'asc';
        $direccionNombreProyecto = ($orden === 'proyecto.nombre') ? ($direccion === 'asc' ? 'desc' : 'asc') : 'asc';
        $direccionCliente = ($orden === 'cliente') ? ($direccion === 'asc' ? 'desc' : 'asc') : 'asc';
        $direccionMonto = ($orden === 'monto') ? ($direccion === 'asc' ? 'desc' : 'asc') : 'asc';
        $direccionGastosIngreso = ($orden === 'gastosingreso') ? ($direccion === 'asc' ? 'desc' : 'asc') : 'asc';
        $direccionDiezmo = ($orden === 'diezmo') ? ($direccion === 'asc' ? 'desc' : 'asc') : 'asc';
        $direccionLibre = ($orden === 'libre') ? ($direccion === 'asc' ? 'desc' : 'asc') : 'asc';

        $pagos = Pago::join('proyectos', 'pagos.proyecto_id', '=', 'proyectos.id')
            ->select('pagos.*', 'proyectos.nombre as nombre_proyecto')
            ->where(function ($query) use ($buscarpor) {
                $query->where('pagos.cliente', 'like', '%' . $buscarpor . '%')
                    ->orWhere('pagos.fecha', 'like', '%' . $buscarpor . '%')
                    ->orWhere('proyectos.nombre', 'like', '%' . $buscarpor . '%')
                    ->orWhere('pagos.monto', 'like', '%' . $buscarpor . '%')
                    ->orWhere('pagos.gastosingreso', 'like', '%' . $buscarpor . '%')
                    ->orWhere('pagos.diezmo', 'like', '%' . $buscarpor . '%')
                    ->orWhere('pagos.libre', 'like', '%' . $buscarpor . '%');
            });

        // Aplicamos la ordenación
        if ($orden == 'proyecto.nombre') {
            $pagos->orderBy('proyectos.nombre', $direccion);
        } else {
            $pagos->orderBy($orden, $direccion);
        }

        $pagos = $pagos->paginate(10);

        return view('pago.index', compact('pagos', 'buscarpor', 'direccionFecha', 'direccionNombreProyecto', 'direccionCliente', 'direccionMonto', 'direccionGastosIngreso', 'direccionDiezmo', 'direccionLibre'))
            ->with('i', ($request->input('page', 1) - 1) * $pagos->perPage());
    }

    public function mostrarFormularioFechas()
    {
        return view('pago.filtrar-fechas');
    }
    public function generarReporte(Request $request)
    {
        $fechaInicio = $request->input('fechaInicio');
        $fechaFin = $request->input('fechaFin');
        $pagos = Pago::whereBetween('fecha', [$fechaInicio, $fechaFin])->get();
        $ingresoBruto = $pagos->sum('monto');
        $gastototal= $pagos->sum('gastosingreso');
        $diezmototal= $pagos->sum('diezmo');
        $fechaEmision = now();
        $libretotal= $pagos->sum('libre');
        $data = [
            'pagos' => $pagos,
            'fechaInicio' => $fechaInicio,
            'fechaFin' => $fechaFin,
            'ingresoBruto' => $ingresoBruto,
            'gastototal'=>$gastototal,
            'diezmototal' => $diezmototal,
            'fechaEmision' => $fechaEmision,
            'libretotal'=> $libretotal,
        ];
        $pdf = PDF::loadView('pago.pdf', $data);
        return $pdf->download('Informe de pagos.pdf');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pago = new Pago();
        $proyectos = Proyecto::orderBy('nombre')->pluck('nombre', 'id');
        $nombreCliente = ''; // Establecer un valor predeterminado
        return view('pago.create', compact('pago', 'proyectos', 'nombreCliente'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(['adjunto' => 'image|mimes:jpeg,png,jpg|max:10240']);
        $data = $request->all();
        if ($request->hasFile('adjunto')) {
            $adjuntoArchivo = $request->file('adjunto');
            $extension = $adjuntoArchivo->getClientOriginalExtension();
            if (in_array(strtolower($extension), ['jpeg', 'png', 'jpg'])) {
                $nombreAdjunto = $adjuntoArchivo->getClientOriginalName();
                $adjuntoArchivo->move(public_path('archivo/adjunto'), $nombreAdjunto);
                $data['adjunto'] = $nombreAdjunto;
            } else {
                return redirect()->back()->withErrors(['adjunto' => 'Solo se permiten archivos de imagen.']);
            }
        }
        $monto = floatval($data['monto']);
        $gastosingreso = floatval($data['gastosingreso']);
        $diezmo = ($monto - $gastosingreso) * 0.10;
        $data['diezmo'] = number_format($diezmo, 2, '.', '');
        $libre = $monto - $gastosingreso - $diezmo;
        $data['libre'] = number_format($libre, 2, '.', '');
        $data['monto'] = number_format($data['monto'], 2, '.', '');
        $data['gastosingreso'] = number_format($data['gastosingreso'], 2, '.', '');
        $pago = Pago::create($data);

        Alert::success('AGREGADO', 'pago registrado con éxito');
        return redirect()->route('pagos.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pago = Pago::find($id);

        return view('pago.show', compact('pago'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pago = Pago::find($id);
        $proyectos = Proyecto::orderBy('nombre')->pluck('nombre', 'id');
        $nombreCliente = $pago->proyecto->cliente->nombrecliente; // Obtener el nombre del cliente del proyecto asociado al pago
        return view('pago.edit', compact('pago', 'proyectos', 'nombreCliente'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Pago $pago
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pago $pago)
    {
        $request->validate(['adjunto' => 'image|mimes:jpeg,png,jpg|max:10240']);
        // Actualización de los datos
        $pagoData = $request->except('adjunto');
        // Manejo del campo adjunto
        if ($request->hasFile('adjunto')) {
            $adjuntoArchivo = $request->file('adjunto');
            $extension = $adjuntoArchivo->getClientOriginalExtension();

            // Eliminar el archivo anterior si existe
            $archivoAnteriorRuta = public_path('archivo/adjunto/' . $pago->adjunto);
            if (file_exists($archivoAnteriorRuta)) {
                unlink($archivoAnteriorRuta);
            }

            if (in_array(strtolower($extension), ['jpeg', 'png', 'jpg'])) {
                $nombreAdjunto = $adjuntoArchivo->getClientOriginalName();
                $adjuntoArchivo->move(public_path('archivo/adjunto'), $nombreAdjunto);
                $pagoData['adjunto'] = $nombreAdjunto;
            } else {
                return redirect()->back()->withErrors(['adjunto' => 'Solo se permiten archivos de imagen.']);
            }
        }

        // Recalcular diezmo y libre después de la actualización
        $monto = floatval($pago->monto);
        $gastosingreso = floatval($pago->gastosingreso);
        $diezmo = ($monto - $gastosingreso) * 0.10;
        $pagoData['diezmo'] = number_format($diezmo, 2, '.', '');
        $libre = $monto - $gastosingreso - $diezmo;
        $pagoData['libre'] = number_format($libre, 2, '.', '');

        // Actualizar los datos después de recalcular
        $pago->update($pagoData);

        Alert::success('ACTUALIZADO', 'Pago actualizado correctamente');
        return redirect()->route('pagos.index');
    }


    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $pago = Pago::find($id);

        if (!$pago) {
            return redirect()->route('pagos.index')
                ->with('error', 'Pago not found');
        }

        // Eliminar el archivo adjunto si existe
        $archivoAdjunto = public_path('archivo/adjunto/' . $pago->adjunto);
        if (file_exists($archivoAdjunto)) {
            unlink($archivoAdjunto);
        }

        // Eliminar el registro de pago
        $pago->delete();

        Alert::success('Eliminado', 'El pago ha sido borrado');
        return redirect()->route('pagos.index');
    }


    public function obtenerNombreCliente($proyectoId)
    {
        $proyecto = Proyecto::find($proyectoId);

        if ($proyecto) {
            $nombreCliente = $proyecto->cliente->nombrecliente;
            return response()->json(['nombreCliente' => $nombreCliente]);
        }

        return response()->json(['nombreCliente' => null]);
    }
}
