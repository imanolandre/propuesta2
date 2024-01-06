@php
    function numeroATexto($numero)
    {
        $conversion = [
            '0' => 'cero',
            '1' => 'uno',
            '2' => 'dos',
            '3' => 'tres',
            '4' => 'cuatro',
            '5' => 'cinco',
            '6' => 'seis',
            '7' => 'siete',
            '8' => 'ocho',
            '9' => 'nueve',
            '10' => 'diez',
            '11' => 'once',
            '12' => 'doce',
            '13' => 'trece',
            '14' => 'catorce',
            '15' => 'quince',
            '16' => 'dieciséis',
            '17' => 'diecisiete',
            '18' => 'dieciocho',
            '19' => 'diecinueve',
            '20' => 'veinte',
            '30' => 'treinta',
            '40' => 'cuarenta',
            '50' => 'cincuenta',
            '60' => 'sesenta',
            '70' => 'setenta',
            '80' => 'ochenta',
            '90' => 'noventa',
            '100' => 'cien',
            '200' => 'doscientos',
            '300' => 'trescientos',
            '400' => 'cuatrocientos',
            '500' => 'quinientos',
            '600' => 'seiscientos',
            '700' => 'setecientos',
            '800' => 'ochocientos',
            '900' => 'novecientos'
        ];

        if (isset($conversion[$numero])) {
            return $conversion[$numero];
        } elseif ($numero < 100) {
            $tens = floor($numero / 10) * 10;
            $units = $numero % 10;
            return $conversion[$tens] . (($units > 0) ? ' y ' . $conversion[$units] : '');
        } elseif ($numero < 1000) {
            $hundreds = floor($numero / 100) * 100;
            $remainder = $numero % 100;
            return $conversion[$hundreds] . (($remainder > 0) ? ' ' . numeroATexto($remainder) : '');
        } elseif ($numero < 10000) {
            $thousands = floor($numero / 1000);
            $remainder = $numero % 1000;
            return numeroATexto($thousands) . ' mil' . (($remainder > 0) ? ' ' . numeroATexto($remainder) : '');
        } elseif ($numero < 100000) {
            $thousands = floor($numero / 1000);
            $remainder = $numero % 1000;
            return numeroATexto($thousands) . ' mil' . (($remainder > 0) ? ' ' . numeroATexto($remainder) : '');
        }

        return 'Número fuera de rango';
    }

    // Supongamos que $cotizacione->total contiene el valor numérico.
    $numeroTotal = $comprobante->anticipo;

    // Convierte el número a texto utilizando la función numeroATexto.
    $textoTotal = numeroATexto($numeroTotal);
    $textoTotal = ucfirst($textoTotal);
@endphp
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600&display=swap" rel="stylesheet">
    <style>
        *{
            font-family: 'Poppins', sans-serif;
        }
        .fuente{
            font-family: 'Poppins', sans-serif;
            font-weight: 600;
        }
        .texto{
            margin-bottom: -10px;
        }
        .pdf-logo{
            width: 220px;
            margin-top: -15px;
        }
        .pdf-logo2{
            width: 300px;
            margin-top: 15px;
            margin-left: 28%;
        }
        .tech{
            width: 240px;
            margin-top: 15px;
            margin-left: 33%;
        }
        .texto-blo1{
            font-size: 13px;
        }
        .texto-blo2{
            position: absolute;
            font-size: 13px;
            right: 10%;
            top: 8%;
        }
        .separador{
            font-family: none;
            font-size: 52px;
            margin-top: -40px;
        }
        .borde{
            border: 2px solid #000000;
            padding: 5px;
            font-size: 13px;
        }
        ul.two-columns {
            padding: 20px;
            margin-left: 20px;
            margin-top: -10px;
        }

        ul.two-columns li {
            margin-bottom: -6px;
        }
        .lista2{
            position: absolute;
            left: 51%;
            top: 44.2%;
        }
        .certi{
            width: 210px;
            padding: 10px;
            margin-left: 50px;
            margin-top: 30px;
            margin-bottom: -15px;
        }
        .google{
            position: absolute;
            right: 4%;
            margin-top: -95px;
            width: 255px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        td, th {
            border: 1px solid black;
            padding: 5px;
            padding-top: 2px;
            text-align: left;
        }
    </style>
</head>
<body>
    <div class="page-body">
        <div class="card-header">
            <h2 class="card-title" style="font-size: 28px;">{{ $nombreDocumento }}</h2>
        </div>
        <img class="pdf-logo" src="assets/logo-nuevo.png">
        <div class="texto-blo1">
            <div class="texto fuente">Desarrollalab - Soluciones Tecnológicas</div>
            <div class="texto">Web: www.desarrollalab.com</div>
            <div class="texto">Tel: +52 777 259 03 65</div>
            <div class="texto">CEO | Sinai Esmeralda García Marín</div>
            <div class="texto">CEO | Demetrio Del Carmen Gómez</div>
        </div>
        <div class="texto-blo2">
            <div class="form-group texto">
                <label class="fuente">Folio:</label>
                {{ $foliocom }}-{{ str_pad($comprobante->id, 3, '0', STR_PAD_LEFT) }}
            </div>
            <div class="form-group texto">
                <strong class="fuente">Fecha:</strong>
                {{ now()->format('d/m/Y') }}
            </div>
            <div class="form-group texto">
                <strong class="fuente">Cliente:</strong>
                {{ $comprobante->documento }}
            </div>
        </div>
        <div class="separador">___________________________</div>
        <h3 class="fuente" style="text-align: center; margin-top: -3px;">COMPROBANTE DE PAGO | {{ $nombreDocumento }}</h3>
        <div class="form-group borde" style="margin-top:-10px; min-height: 4em; overflow: hidden; line-height: 1;">
            <strong>DESCRIPCIÓN DEL PROYECTO:</strong>
            {{ $comprobante->descripcion }}
            <div class="form-group" style="margin-top:15px;">
                <strong>FOLIO DE COTIZACIÓN:</strong>
                {{$foliocot}}
            </div>
            <div class="form-group" style="margin-top: 15px;">
                <strong>DATOS DEL MOVIMIENTO</strong>
            </div>
            <div class="form-group" style="margin-top: 15px;">
                <strong>CUENTA DE ORIGEN:</strong>
                {{ $comprobante->cuentaorigen }}
            </div>
            <div class="form-group">
                <strong>CONCEPTO:</strong>
                {{ $comprobante->conceptopago }}
            </div>
            <div class="form-group" style="margin-top: 15px;">
                <strong>MÉTODO DE PAGO:</strong>
                {{ $comprobante->metodopago }}
            </div>
            <div class="form-group">
                <strong>FOLIO DE OPERACIÓN:</strong>
                {{ $comprobante->foliooperacion }}
            </div>
            <div class="form-group">
                <strong>FECHA DE LA OPERACIÓN:</strong>
                {{ $comprobante->fechaoperacion }}
            </div>
            <div class="form-group">
                <strong>FECHA DE LA APLICACIÓN:</strong>
                {{ $comprobante->fechaaplicacion }}
            </div>
        </div>
        <h4 style="text-align: center; margin-top: 10px;">Detalles de pago</h4>
        <table>
            <tr>
                <th style="text-align: center; font-size:14px; font-weight:bold;"><strong>Servicio</strong></th>
                <th style="text-align: center; font-size:14px; font-weight:bold;"><strong>Importe</strong></th>
                <th style="text-align: center; font-size:14px; font-weight:bold;"><strong>Pagado</strong></th>
                <th style="text-align: center; font-size:14px; font-weight:bold;"><strong>TOTAL RESTANTE</strong></th>
            </tr>
            <tr>
                <td style="font-size:13px; background:#f5f5f2;">{{ $cotizacione->servicio }} {{ $cotizacione->planes }}</td>
                <td style="text-align: center; font-size:13px; background:#f5f5f2;">${{ number_format($cotizacione->importe - $cotizacione->descuento, 2, '.', ',') }} MXN</td>
                <td style="text-align: center; font-size:13px; background:#f5f5f2;">${{ $comprobante->anticipo }} MXN</td>
                <td style="text-align: center; font-size:13px; background:#f5f5f2;">${{ number_format($comprobante->total - $comprobante->anticipo, 2, '.', ',') }} MXN</td>
            </tr>
            @for($i = 1; $i <= 8; $i++)
                @php
                    $servicioKey = "servicioadicional{$i}";
                    $importeKey = "importeadicional{$i}";
                @endphp

                @if(!empty($cotizacione->$servicioKey) && !empty($cotizacione->$importeKey))
                <tr>
                    <td style="font-size:13px; background:#f5f5f2;">{{ $cotizacione->$servicioKey }}</td>
                    <td style="text-align: center; font-size:13px; background:#f5f5f2;">${{ $cotizacione->$importeKey }} MXN</td>
                    <td style="text-align: center; font-size:13px; background:#f5f5f2;"></td>
                    <td style="text-align: center; font-size:13px; background:#f5f5f2;"></td>
                </tr>
                @endif
            @endfor
            <tr>
                <td style="font-size:14px;font-style: italic;text-align:center; border: none;" colspan="3"><strong class="fuente">Total: </strong>{{ $textoTotal }} pesos MXN</td>
                <td class="fuente" style="text-align: center; font-size:13px; background:#9cf85096;">${{ $comprobante->anticipo }} MXN</td>
            </tr>
        </table>
        <img class="pdf-logo2" src="assets/logo-nuevo.png">
        <div style="text-align: center; font-size: 15px;">
            Desarrollalab - Soluciones Tecnológicas, <strong>agradece su preferencia</strong>
        </div>
        <img class="tech" src="assets/tech.png">
    </div>
</body>
</html>
