<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Reporte de Pagos {{ $fechaEmision }}</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600&display=swap" rel="stylesheet">
    <style>
        * {
            font-family: 'Poppins', sans-serif;
        }
        .fuente {
            font-family: 'Poppins', sans-serif;
            font-weight: 600;
        }
        .texto{
            margin-bottom: -10px;
        }
        .texto1{
            margin-bottom: -8px;
        }

        .texto-titulo{
            font-size: 24px;
            margin-top: -5px;
            background-color: rgb(230, 227, 227);
        }
        .texto-blo1{
            font-size: 12px;
            margin-top: 20px;
        }
        .texto-blo2{
            position: absolute;
            font-size: 12px;
            right: 0;
            top: 8%;
        }
        .texto-blo3{
            width: 240px;
            background-color: #ebeaea77;
            margin-top: 10px;
            font-size: 12px;
        }
        .texto-tabla{
            margin-top: 10px;
            font-size: 12px;
        }
        .separador{
            font-family: none;
            font-size: 52px;
            margin-top: -35px;
        }
        .separadores{
            font-family: none;
            font-size: 10px;
            margin-top: -4px;
            color: #757575;
        }
        .pdf-logo{
            width: 220px;
            margin-top: -10px;
        }
        .ingreso{
            text-align: center;
            position: absolute;
            font-size: 12px;
            background-color: #000;
            color: #fff;
            padding-bottom: 5px;
            width: 200px;
            right: 0;
        }
        .valores{
            font-family: none;
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
            font-family: none;
            position: absolute;
            font-size: 8px;
            margin-top: -6px;
            left: 0;
            color: #757575;
        }
    </style>
</head>
<body>
    <h1 class=" texto-titulo">Informe de ingresos</h1>
    <img class="pdf-logo" src="assets/logo-nuevo.png">
    <div>
        <div class="texto-blo1">
            <div class="texto">Desarrollalab - Soluciones Tecnológicas</div>
            <div class="texto">Web: www.desarrollalab.com</div>
            <div class="texto">Tel: +52 777 259 03 65</div>
            <div class="texto">CEO | Sinai Esmeralda García Marín</div>
            <div class="texto">CEO | Demetrio Del Carmen Gómez</div>
        </div>
        <div class="texto-blo2">
            <div class="texto">Folio: RE-PA-{{now()->format('h') }}</div>
            <div class="texto">Fecha de emisión: {{ $fechaEmision }}</div>
        </div>
        <div class="separador">___________________________</div>
        <div class="texto1 texto-blo3">
            <div class="texto1 texto-ss">De: {{ \Carbon\Carbon::parse($fechaInicio)->format('d-m-Y') }} a {{ \Carbon\Carbon::parse($fechaFin)->format('d-m-Y') }}</div>
            <div class="texto1 separadores">————————————————————————</div>
            <div class="texto1 texto-ss">Ingreso bruto: ${{ number_format($ingresoBruto, 2) }}</div>
            <div class="texto1 separadores">————————————————————————</div>
            <div class="texto1 texto-ss">Gastos: ${{ number_format($gastototal, 2) }}</div>
            <div class="texto1 separadores">————————————————————————</div>
            <div class="texto1 texto-ss">Diezmo pendiente: ${{ number_format($diezmototal, 2) }}</div>
            <div class="separadores">————————————————————————</div>
            <div class="ingreso">Ingreso libre ${{ number_format($libretotal, 2) }}</div>
        </div>
        <div style="margin-top: -10px;" class="separador">___________________________</div>
        <div style="margin-top: 10px;" class="valores">——————————————————————</div>
    </div>
    <table class="texto-tabla ">
        <thead class="fuente">
            <tr class="fuente">
                <th class="valores-tx"><div class="fuente">Cliente</div></th>
                <th class="valores-tx"><div class="fuente">Fecha</div></th>
                <th class="valores-tx"><div class="fuente">Gastos</div></th>
                <th class="valores-tx"><div class="fuente">Diezmo</div></th>
                <th class="valores-tx"><div class="fuente">Libre</div></th>
                <th class="valores-tx"><div class="fuente">Monto</div></th>
                <th class="valores-tx"><div class="fuente">Proyecto</div></th>
                <th class="valores-tx"><div class="fuente">ConceptoGasto</div></th>
                <th class="valores-tx"><div class="fuente">Metodopago</div></th>
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
