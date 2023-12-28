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
    $numeroTotal = $cotizacione->total;

    // Convierte el número a texto utilizando la función numeroATexto.
    $textoTotal = numeroATexto($numeroTotal);
    $textoTotal = ucfirst($textoTotal);
@endphp
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $nombreArchivo }}</title>
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
            top: 42.8%;
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
            <h2 class="card-title" style="font-size: 28px;">{{ $cotizacione->servicio }} {{ $cotizacione->planes }}</h2>
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
                {{ $folio }}-{{ str_pad($cotizacione->id, 3, '0', STR_PAD_LEFT) }}
            </div>
            <div class="form-group texto">
                <strong class="fuente">Fecha:</strong>
                {{ now()->format('d/m/Y') }}
            </div>
            <div class="form-group texto">
                <strong class="fuente">Cliente:</strong>
                {{ $cotizacione->cliente }}
            </div>
        </div>
        <div class="separador">___________________________</div>
        <h3 class="fuente" style="text-align: center; margin-top: -3px;">Cotización | Desarrollo de {{ $cotizacione->servicio }}</h3>
        <div class="form-group borde" style="margin-top:-10px; min-height: 4em; overflow: hidden; line-height: 1;">
            <strong class="fuente">DESCRIPCIÓN DEL PROYECTO:</strong>
            {{ $cotizacione->descripcion }}
        </div>
        <div class="form-group borde" style="margin-top:-2px;">
            <div class="texto form-group">
                <strong>Servicio: {{ $cotizacione->servicio }}</strong>
            </div>
            <div class="form-group" style="margin-top:2px;">
                <strong>Plan:</strong>
                {{ $cotizacione->planes }}
            </div>
            <div class="form-group" style="margin-top:10px;">
                <strong>Características y beneficios del plan Empresarial</strong>
            </div>
            <div class="form-group">
                @if ($cotizacione->servicio == "E-commerce" && $cotizacione->planes == "Básico")
                    <ul class="two-columns">
                        <li>Dominio Gratis .com</li>
                        <li>Hospedaje en Google Cloud por 12 meses</li>
                        <li>Diseño profesional</li>
                        <li>Certificado SSL</li>
                        <li>Diseño web adaptable a los dispositivos</li>
                        <li>1 sección</li>
                        <li>Carrito de compras</li>
                        <li>Datos de contacto en el pie de página</li>
                        <li>Pasarela de pagos</li>
                        <li>Inventario</li>
                        <li>Panel de administración</li>
                    </ul>
                @elseif ($cotizacione->servicio == "E-commerce" && $cotizacione->planes == "Prémium")
                    <ul class="two-columns">
                        <li>Dominio Gratis .com, .com.mx</li>
                        <li>Hospedaje en Google Cloud por 12 meses</li>
                        <li>Diseño profesional</li>
                        <li>Certificado SSL</li>
                        <li>Diseño web adaptable a los dispositivos</li>
                        <li>3 secciones</li>
                        <li>Datos de contacto en el pie de página</li>
                        <li>Formulario de Contacto</li>
                        <li>Integración con redes sociales</li>
                        <li>Carrito de compras</li>
                        <li>Pasarela de pagos</li>
                    </ul>
                    <ul class="two-columns lista2">
                        <li>Inventario</li>
                        <li>Panel de administración</li>
                    </ul>
                @elseif ($cotizacione->servicio == "E-commerce" && $cotizacione->planes == "Empresarial")
                    <ul class="two-columns">
                        <li>SEO Especializado y Optimizado</li>
                        <li>Carrito de compras</li>
                        <li>Pasarela de pagos</li>
                        <li>Inventario</li>
                        <li>Panel de administración</li>
                        <li>Pagos con PayPal</li>
                        <li>Pagos con Mercado Pago</li>
                        <li>Pagos con Google Pay y Apple Pay</li>
                        <li>Integración con plataformas de envios</li>
                        <li>Integración con WhatsApp Business</li>
                        <li>Dominio Gratis .com, .com.mx o .mx</li>
                    </ul>
                    <ul class="two-columns lista2">
                        <li>Hospedaje en Google Cloud por 12 meses</li>
                        <li>7 secciones</li>
                        <li>Formulario de Contacto</li>
                        <li>Integración con redes sociales</li>
                        <li>Diseño corporativo</li>
                        <li>Certificado SSL</li>
                        <li>Redacción corporativa</li>
                        <li>Diseño web adaptable a los dispositivos</li>
                        <li>Datos de contacto en el pie de página</li>
                    </ul>
                @elseif ($cotizacione->servicio == "Desarrollo de Páginas web" && $cotizacione->planes == "Básico")
                    <ul class="two-columns">
                        <li>Dominio Gratis .com</li>
                        <li>Hosting gratis por 12 meses</li>
                        <li>Diseño profesional</li>
                        <li>Certificado SSL</li>
                        <li>Diseño web adaptable a los dispositivos</li>
                        <li>1 sección</li>
                        <li>Galería con 7 imágenes y descripción</li>
                        <li>Datos de contacto en el pie de página</li>
                        <li style="padding-bottom: 51.5px;">Mapa de ubicación de Google con botón de redirección a la navegación</li>
                    </ul>
                @elseif ($cotizacione->servicio == "Desarrollo de Páginas web" && $cotizacione->planes == "Prémium")
                    <ul class="two-columns">
                        <li>Dominio Gratis .com, .com.mx</li>
                        <li>Hosting gratis por 12 meses</li>
                        <li>Diseño profesional</li>
                        <li>Certificado SSL</li>
                        <li>Diseño web adaptable a los dispositivos</li>
                        <li>3 secciones</li>
                        <li>Galería con 15 imágenes y descripción</li>
                        <li>Datos de contacto en el pie de página</li>
                        <li>Formulario de Contacto</li>
                        <li style="padding-bottom: 25.5px;">Integración con redes sociales</li>
                    </ul>
                @elseif ($cotizacione->servicio == "Desarrollo de Páginas web" && $cotizacione->planes == "Empresarial")
                    <ul class="two-columns">
                        <li>Dominio Gratis .com, .com.mx o .mx</li>
                        <li>Hosting gratis por 12 meses</li>
                        <li>Diseño corporativo</li>
                        <li>Certificado SSL</li>
                        <li>Redacción corporativa</li>
                        <li>Diseño web adaptable a los dispositivos</li>
                        <li>7 secciones</li>
                        <li>Galería con 30 imágenes y descripción</li>
                        <li>Datos de contacto en el pie de página</li>
                        <li>SEO Especializado y Optimizado</li>
                        <li>Formulario de Contacto</li>
                    </ul>
                    <ul class="two-columns lista2">
                        <li>Integración con redes sociales</li>
                        <li>Integración con WhatsApp Business</li>
                        <li>Mapa de ubicación de Google con</li>
                        <li style="list-style: none; margin-top:-5px;">botón de redirección a la navegación</li>
                    </ul>
                @endif
            </div>
        </div>
        <div class="form-group borde" style="margin-top:-2px;">
            <div class="texto form-group" style="margin-top:2px;line-height: 1;">
                <strong>Optimización web:</strong>
                Optimización web se desarrollará el proyecto utilizando las mejores prácticas del mercado en
                materia de diseño, seguridad y rendimiento.
            </div>
            <div class="form-group" style="margin-top:5px;">
                <strong class="texto">Garantía Desarrollalab</strong>
                <ul class="two-columns" style="margin-top: -15px;">
                    <li>Performance optimization</li>
                    <li>Accessibility</li>
                    <li>Best Practices</li>
                    <li>SEO ({{ $cotizacione->planes }} plan)</li>
                </ul>
            </div>
            <div class="form-group" style="margin-top:-23px;">
                <strong>Página 100% profesional que cumple los requisitos de Google</strong>
            </div>
            <img class="certi" src="assets/certi.png">
            <img class="google" src="assets/google.png">
        </div>
        <div class="card-header">
            <h2 class="card-title" style="font-size: 28px;">{{ $cotizacione->servicio }} {{ $cotizacione->planes }}</h2>
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
                {{ $folio }}-{{ str_pad($cotizacione->id, 3, '0', STR_PAD_LEFT) }}
            </div>
            <div class="form-group texto">
                <strong class="fuente">Fecha:</strong>
                {{ now()->format('d/m/Y') }}
            </div>
            <div class="form-group texto">
                <strong class="fuente">Cliente:</strong>
                {{ $cotizacione->cliente }}
            </div>
        </div>
        <div class="separador">___________________________</div>
        <h4 style="text-align: center; margin-top: 10px;">Detalles de pago</h4>
        <table>
            <tr>
                @if($cotizacione->descuento !== null && $cotizacione->descuento != 0.00)
                    <th style="text-align: center; font-size:14px; font-weight:bold;"><strong>Servicio</strong></th>
                    <th style="text-align: center; font-size:14px; font-weight:bold;"><strong>Importe</strong></th>
                    <th style="text-align: center; font-size:14px; font-weight:bold; background:#9cf85096;"><strong>Descuento</strong></th>
                    <th style="text-align: center; font-size:14px; font-weight:bold;"><strong>Anticipo 50%</strong></th>
                @else
                    <th style="text-align: center; font-size:14px; font-weight:bold;" colspan="2"><strong>Servicio</strong></th>
                    <th style="text-align: center; font-size:14px; font-weight:bold;"><strong>Importe</strong></th>
                    <th style="text-align: center; font-size:14px; font-weight:bold;"><strong>Anticipo 50%</strong></th>
                @endif
            </tr>
            <tr>
                @if($cotizacione->descuento !== null && $cotizacione->descuento != 0.00)
                    <td style="font-size:13px; background:#f5f5f2;">{{ $cotizacione->servicio }} {{ $cotizacione->planes }}</td>
                    <td style="text-align: center; font-size:13px; background:#f5f5f2;">${{ $cotizacione->importe }} MXN</td>
                    <td style="text-align: center; font-size:13px; background:#9cf85096;">${{ $cotizacione->descuento }} MXN</td>
                    <td style="text-align: center; font-size:13px; background:#f5f5f2;">${{ $anticipopr }} MXN</td>
                @else
                    <td style="font-size:13px; background:#f5f5f2;" colspan="2">{{ $cotizacione->servicio }} {{ $cotizacione->planes }}</td>
                    <td style="text-align: center; font-size:13px; background:#f5f5f2;">${{ $cotizacione->importe }} MXN</td>
                    <td style="text-align: center; font-size:13px; background:#f5f5f2;">${{ $anticipopr }} MXN</td>
                @endif
            </tr>
            @for($i = 1; $i <= 8; $i++)
                @php
                    $servicioKey = "servicioadicional{$i}";
                    $importeKey = "importeadicional{$i}";
                @endphp

                @if(!empty($cotizacione->$servicioKey) && !empty($cotizacione->$importeKey))
                <tr>
                    @if($cotizacione->descuento !== null && $cotizacione->descuento != 0.00)
                        <td style="font-size:13px; background:#f5f5f2;">{{ $cotizacione->$servicioKey }}</td>
                        <td style="text-align: center; font-size:13px; background:#f5f5f2;">${{ $cotizacione->$importeKey }} MXN</td>
                        <td style="text-align: center; font-size:13px; background:#9cf85096;"></td>
                        <td style="text-align: center; font-size:13px; background:#f5f5f2;">${{ number_format($cotizacione->$importeKey / 2, 2, '.', '') }} MXN</td>
                    @else
                        <td style="font-size:13px; background:#f5f5f2;" colspan="2">{{ $cotizacione->$servicioKey }}</td>
                        <td style="text-align: center; font-size:13px; background:#f5f5f2;">${{ $cotizacione->$importeKey }} MXN</td>
                        <td style="text-align: center; font-size:13px; background:#f5f5f2;">${{ number_format($cotizacione->$importeKey / 2, 2, '.', '') }} MXN</td>
                    @endif
                </tr>
                @endif
            @endfor
            <tr>
                <td style="font-size:14px;font-style: italic;text-align:center; border: none;" colspan="3"><strong class="fuente">Total: </strong>{{ $textoTotal }} pesos MXN</td>
                <td style="text-align: center; font-size:13px; background:#9cf85096;">${{ $cotizacione->total }} MXN</td>
            </tr>
        </table>
        <h4 style="text-align: center; margin-top: 15px;">Información de pago</h4>
        <div class="form-group borde" style="margin-top: 2px;">
            <div class="form-group" style="margin-top:5px;">
                <strong>Datos bancarios para transferencia</strong>
            </div>
            <div class="texto form-group" style="margin-top: 20px;">
                <strong>Cuenta CLABE:</strong>
                012546004779716801
            </div>
            <div class="texto form-group" >
                <strong>Beneficiario:</strong>
                Demetrio Del Carmen Gómez
            </div>
            <div class="form-group" >
                <strong>Banco:</strong>
                BBVA BANCOMER
            </div>
            <div class="form-group" style="margin-top: 15px;">
                <strong>Transferencias Internacionales:</strong>
            </div>
            <div class="form-group" style="margin-top: 15px;">
                <strong>Código Swift:</strong>
                BCMRMXMMPYM
            </div>
            <div class="form-group" style="margin-top: 20px; margin-bottom:5px; font-size:12px;">
                <strong>Agradecemos el envío de su comprobante de pago al por alguno de nuestros medios de contacto oficial</strong>
            </div>
        </div>
        <img class="pdf-logo2" src="assets/logo-nuevo.png">
        <div style="text-align: center; font-size: 15px;">
            Desarrollalab - Soluciones Tecnológicas, <strong>agradece su preferencia</strong>
        </div>
        <img class="tech" src="assets/tech.png">

</div>
</body>
</html>
