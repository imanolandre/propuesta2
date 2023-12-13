<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

use App\Models\Proyecto;

class ProyectosExport implements FromCollection, WithHeadings, ShouldAutoSize
{
    use Exportable;

    public function collection()
    {
        $proyectos = Proyecto::orderBy('nombre', 'asc')->get(); // Obtén todos los proyectos

        // Crear una colección personalizada con todos los datos
        $data = collect([]);

        $i = 1; // Inicializa el contador
        foreach ($proyectos as $proyecto) {
            $data->push([
                'No.' => $i,
                'Nombre' => $proyecto->nombre,
                'Cliente' => $proyecto->cliente->nombrecliente,
                'Tipo' => $proyecto->tipo,
                'Cotización' => $proyecto->cotización,
                'Fecha Inicio' => $proyecto->fechainicio,
                'Fecha Fin' => $proyecto->fechafin,
                'Prototipo' => $proyecto->prototipo,
                'Requerimientos' => $proyecto->requerimientos,
                'Descripción' => $proyecto->descripción,
            ]);

            $i++; // Incrementa el contador
        }

        return $data;
    }

    public function headings(): array
    {
        return [
            'No',
            'Nombre del Proyecto',
            'Nombre del Cliente',
            'Tipo de  Proyecto',
            'Servicio',
            'Fecha de Inicio',
            'Fecha de Fin',
            'Prototipo',
            'Requerimientos',
            'Descripción'
        ];
    }

    public function columnWidths(): array
    {

        return [

            'A' => ['autoSize' => true], // Ancho de la columna No.
            'B' => ['autoSize' => true], // Ancho de la columna Nombre
            'C' => ['autoSize' => true], // Ancho de la columna Tipo
            'D' => ['autoSize' => true], // Ancho de la columna Cotización
            'E' => ['autoSize' => true], // Ancho de la columna Cliente
            'F' => ['autoSize' => true], // Ancho de la columna Fecha Inicio
            'G' => ['autoSize' => true], // Ancho de la columna Fecha Fin
            'H' => ['autoSize' => true], // Ancho de la columna Prototipo
            'I' => ['autoSize' => true], // Ancho de la columna Requerimientos
            'J' => ['autoSize' => false],
        ];
    }

}
