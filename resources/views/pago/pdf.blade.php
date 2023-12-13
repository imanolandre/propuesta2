<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Reporte de Pagos {{ $fechaEmision->format('d-m-Y') }}</title>
    <style>
        .texto{
            font-family:sans-serif;
            font-weight:inherit;
        }
        .texto-titulo{
            font-size: 24px;
            margin-top: -5px;
            background-color: rgb(230, 227, 227);
        }
        .texto-blo1{
            font-size: 12px;
            margin-top: 35px;
        }
        .texto-blo2{
            position: absolute;
            font-size: 12px;
            right: 0;
            top: 8%;
        }
        .texto-blo3{
            font-size: 12px;
        }
        .texto-tabla{
            font-size: 12px;
        }
        .separador{
            font-size: 32px;
        }
        .separadores{
            font-size: 10px;
            margin-top: -4px;
            color: #757575;
        }
        .texto-ss{
            margin-top:-2px;
        }
        .pdf-logo{
            width: 200px;
            margin-top: -10px;
        }
        .ingreso{
            text-align: center;
            position: absolute;
            font-size: 12px;
            background-color: #000;
            color: #fff;
            padding-top: 5px;
            padding-bottom: 5px;
            width: 200px;
            right: 0;
        }
        .valores{
            position: absolute;
            color: #e4e4e4;
            font-size: 32px;
            height: 35px;
            background-color: #e4e4e4;
        }
        .valores-tx{
            text-align: left;
            height: 30px;
        }
        .datos{
            border-bottom: 1px solid #757575;
        }
        .separadores-datos{
            position: absolute;
            font-size: 8px;
            margin-top: -6px;
            left: 0;
            color: #757575;
        }
    </style>
</head>
<body>
    <h1 class="texto texto-titulo">Informe de ingresos</h1>
    <img class="pdf-logo" src="assets/logo-nuevo.png">
    <div class="texto">
        <div class="texto-blo1">
            <div>Desarrollalab - Soluciones Tecnológicas</div>
            <div>Web: www.desarrollalab.com</div>
            <div>Tel: +52 777 259 03 65</div>
            <div>CEO | Sinai Esmeralda García Marín</div>
            <div>CEO | Demetrio Del Carmen Gómez</div>
        </div>
        <div class="texto-blo2">
            <div>Folio: RE-PA{{now()->format('h') }}</div>
            <div>Fecha de emisión: {{ $fechaEmision->format('d/m/Y') }}</div>
        </div>
        <div class="separador">——————————————————————</div>
        <div class="texto-blo3">
            <div class="texto-ss">De: {{ \Carbon\Carbon::parse($fechaInicio)->format('d-m-Y') }} a {{ \Carbon\Carbon::parse($fechaFin)->format('d-m-Y') }}</div>
            <div class="separadores">—————————————————————</div>
            <div class="texto-ss">Ingreso bruto: ${{ number_format($ingresoBruto, 2) }}</div>
            <div class="separadores">—————————————————————</div>
            <div class="texto-ss">Gastos: ${{ number_format($gastototal, 2) }}</div>
            <div class="separadores">—————————————————————</div>
            <div class="texto-ss">Diezmo pendiente: ${{ number_format($diezmototal, 2) }}</div>
            <div class="separadores">—————————————————————</div>
            <div class="ingreso">Ingreso libre ${{ number_format($libretotal, 2) }}</div>
        </div>
        <div style="margin-top: 15px;" class="separador">——————————————————————</div>
        <div style="margin-top: 0px;" class="valores">——————————————————————</div>
    </div>
    <table class="texto texto-tabla">
        <thead>
            <tr>
                <th class="valores-tx">Cliente</th>
                <th class="valores-tx">Fecha</th>
                <th class="valores-tx">Gastos</th>
                <th class="valores-tx">Diezmo</th>
                <th class="valores-tx">Libre</th>
                <th class="valores-tx">Monto</th>
                <th class="valores-tx">Proyecto</th>
                <th class="valores-tx">ConceptoGasto</th>
                <th class="valores-tx">Metodopago</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pagos as $pago)
                <tr>
                    <td>{{ $pago->cliente }}</td>
                    <td>{{\Carbon\Carbon::parse($pago->fecha)->format('d-m-Y') }}</td>
                    <td>{{ $pago->gastosingreso }}</td>
                    <td>{{ $pago->diezmo }}</td>
                    <td>{{ $pago->libre }}</td>
                    <td>{{ $pago->monto }}</td>
                    <td>{{ $pago->proyecto->nombre }}</td>
                    <td>{{ $pago->conceptogasto }}</td>
                    <td>{{ $pago->metodopago }}</td>
                    <div class="separadores-datos">————————————————————————————————————————————————————————————————————————————————————————</div>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
