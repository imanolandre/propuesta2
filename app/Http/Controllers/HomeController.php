<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Proyecto;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $totalProyectosPorTipo = Proyecto::where('fechafin', '<=', now())
        ->groupBy('tipo')
        ->selectRaw('tipo, count(*) as total')
        ->pluck('total', 'tipo');

        $serviciosProyectosStartup = Proyecto::where('tipo', 'Startup')
            ->groupBy('cotización') // Ajusta el nombre del campo según tu estructura de base de datos
            ->selectRaw('cotización as servicio, count(*) as count')
            ->pluck('count', 'servicio');

        // Obtener el total de proyectos con tipo "Empresarial"

        $serviciosProyectosEmpresarial = Proyecto::where('tipo', 'Empresarial')
            ->groupBy('cotización') // Ajusta el nombre del campo según tu estructura de base de datos
            ->selectRaw('cotización as servicio, count(*) as count')
            ->pluck('count', 'servicio');

        // Obtener el total de proyectos con tipo "Corporativo"

        $serviciosProyectosCorporativo = Proyecto::where('tipo', 'Corporativo')
            ->groupBy('cotización') // Ajusta el nombre del campo según tu estructura de base de datos
            ->selectRaw('cotización as servicio, count(*) as count')
            ->pluck('count', 'servicio');

        // Obtener el total de proyectos con tipo "Escalable"

        $serviciosProyectosEscalable = Proyecto::where('tipo', 'Escalable')
            ->groupBy('cotización') // Ajusta el nombre del campo según tu estructura de base de datos
            ->selectRaw('cotización as servicio, count(*) as count')
            ->pluck('count', 'servicio');



        // Pasar los datos a la vista
        return view('home', compact('totalProyectosPorTipo','serviciosProyectosStartup','serviciosProyectosEmpresarial','serviciosProyectosCorporativo','serviciosProyectosEscalable'));
    }
}
