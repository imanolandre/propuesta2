<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use App\Models\Cliente;

class ClientesExport implements FromCollection, WithHeadings, ShouldAutoSize
{
    use Exportable;
    public function collection()
    {
        $clientes = Cliente::orderBy('nombrecliente', 'asc')->get();

        // Crear una colección personalizada con la numeración
        $data = collect([]);

        $i = 1; // Inicializa el contador

        foreach ($clientes as $cliente) {
            $data->push([
                'No.' => $i,
                'Nombre' => $cliente->nombrecliente,
                'Correo Electronico' => $cliente->correo,
                'Teléfono' => $cliente->teléfono,
                'Empresa' => $cliente->empresa,
                'Sitioweb' => $cliente->sitioweb,
                'Dirección' => $cliente->dirección,
                'Razónsocial' => $cliente->razónsocial,
                'Rfc' => $cliente->rfc,
                'Direcciónfiscal' => $cliente->direcciónfiscal,
                'Codigopostal' => $cliente->codigopostal,
                'Regimenincorporación' => $cliente->regimenincorporación,
                'constanciasituaciónFiscal' => $cliente->constanciasituaciónFiscal,
            ]);

            $i++; // Incrementa el contador
        }

        return $data;
    }
        public function headings(): array
        {
            return [
                'No.',
                'Nombre de Cliente',
                'Correo Electrónico',
                'Teléfono',
                'Empresa',
                'Sitioweb',
                'Dirección',
                'Razónsocial',
                'RFC',
                'Direcciónfiscal',
                'Codigopostal',
                'Regimenincorporación',
                'constanciasituaciónFiscal',

            ];
        }
        public function registerEvents(): array
        {
            return [
                // Estilo para las cabeceras
                1 => ['font' => ['bold' => true,'background' => '#5f0134', 'color' => ['rgb' => '95, 1, 52']], 'alignment' => ['horizontal' => 'start']],

                // Ajustar automáticamente el ancho de las columnas
                'A' => ['autoSize' => true],
                'B' => ['autoSize' => true],
                'C' => ['autoSize' => true],
                'D' => ['autoSize' => true],
                'E' => ['autoSize' => true],
                'F' => ['autoSize' => true],
                'G' => ['autoSize' => true],
                'H' => ['autoSize' => true],
                'I' => ['autoSize' => true],
                'J' => ['autoSize' => true],
                'K' => ['autoSize' => true],
                'L' => ['autoSize' => true],
            ];
        }
}
