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
    <style>
        .texto{
            font-family:sans-serif;
            font-weight:inherit;
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
            font-size: 50px;
            margin-top: -30px;
        }
        .borde{
            border: 2px solid #000000;
            padding: 5px;
            font-size: 13px;
        }
        ul.two-columns {
            padding: 20px;
            margin-left: 20px;
        }

        ul.two-columns li {
            margin-bottom: 10px;
        }
        .lista2{
            position: absolute;
            right: 8%;
            margin-top: -337px;
        }
        .certi{
            width: 210px;
            padding: 10px;
            margin-left: 50px;
            margin-top: 25px;
        }
        .google{
            position: absolute;
            right: 5%;
            margin-top: -100px;
            width: 260px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        td, th {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }
    </style>
</head>
<body>
    <div class="page-body texto">
        <div class="card-header">
            <h2 class="card-title" style="font-size: 28px;">{{ $cotizacione->servicio }} {{ $cotizacione->planes }}</h2>
        </div>
        <img class="pdf-logo" src="assets/logo-nuevo.png">
        <div class="texto-blo1">
            <strong>Desarrollalab - Soluciones Tecnológicas</strong>
            <div>Web: www.desarrollalab.com</div>
            <div>Tel: +52 777 259 03 65</div>
            <div>CEO | Sinai Esmeralda García Marín</div>
            <div>CEO | Demetrio Del Carmen Gómez</div>
        </div>
        <div class="texto-blo2">
            <div class="form-group">
                <strong>Folio:{{ $folio }}-{{ str_pad($cotizacione->id, 3, '0', STR_PAD_LEFT) }}</strong>
            </div>
            <div class="form-group">
                <strong>Fecha:</strong>
                {{ now()->format('d/m/Y') }}
            </div>
            <div class="form-group">
                <strong>Cliente:</strong>
                {{ $cotizacione->cliente }}
            </div>
        </div>
        <div class="separador">——————————————</div>
        <h3 style="text-align: center; margin-top: -10px;">Cotización | Desarrollo de {{ $cotizacione->servicio }}</h3>
        <div class="form-group borde" style="margin-top:-10px; height: 3em; overflow: hidden;">
            <strong>DESCRIPCIÓN DEL PROYECTO:</strong>
            {{ $cotizacione->descripcion }}
        </div>
        <div class="form-group borde" style="margin-top:-2px;">
            <div class="form-group">
                <strong>Servicio: {{ $cotizacione->servicio }}</strong>
            </div>
            <div class="form-group" style="margin-top:2px;">
                <strong>Plan:</strong>
                {{ $cotizacione->planes }}
            </div>
            <div class="form-group" style="margin-top:15px;">
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
            <div class="form-group" style="margin-top:2px;">
                <strong>Optimización web:</strong>
                Optimización web se desarrollará el proyecto utilizando las mejores prácticas del mercado en
                materia de diseño, seguridad y rendimiento.
            </div>
            <div class="form-group" style="margin-top:2px;">
                <strong>Garantía Desarrollalab</strong>
                <ul class="two-columns" style="margin-top: -15px;">
                    <li>Performance optimization</li>
                    <li>Best Practices</li>
                    <li>SEO ({{ $cotizacione->planes }} plan)</li>
                </ul>
            </div>
            <div class="form-group" style="margin-top:-30px;">
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
            <strong>Desarrollalab - Soluciones Tecnológicas</strong>
            <div>Web: www.desarrollalab.com</div>
            <div>Tel: +52 777 259 03 65</div>
            <div>CEO | Sinai Esmeralda García Marín</div>
            <div>CEO | Demetrio Del Carmen Gómez</div>
        </div>
        <div class="texto-blo2">
            <div class="form-group">
                <strong>Folio:</strong>
            </div>
            <div class="form-group">
                <strong>Fecha:</strong>
                {{ now()->format('d/m/Y') }}
            </div>
            <div class="form-group">
                <strong>Cliente:</strong>
                {{ $cotizacione->cliente }}
            </div>
        </div>
        <div class="separador">——————————————</div>
        <h4 style="text-align: center; margin-top: 10px;">Detalles de pago</h4>
        <table>
            <tr>
                <th style="text-align: center; font-size:14px; font-weight:bold;"><strong>Servicio</strong></th>
                <th style="text-align: center; font-size:14px; font-weight:bold;"><strong>Importe</strong></th>
                <th style="text-align: center; font-size:14px; font-weight:bold; background:#9cf85096;"><strong>Descuento</strong></th>
                <th style="text-align: center; font-size:14px; font-weight:bold;"><strong>Anticipo 50%</strong></th>
            </tr>
            <tr>
                <td style="font-size:13px; background:#f5f5f2;">{{ $cotizacione->servicio }} {{ $cotizacione->planes }}</td>
                <td style="text-align: center; font-size:13px; background:#f5f5f2;">${{ $cotizacione->importe }} MXN</td>
                <td style="text-align: center; font-size:13px; background:#9cf85096;">${{ $cotizacione->descuento }} MXN</td>
                <td style="text-align: center; font-size:13px; background:#f5f5f2;">${{ $anticipopr }} MXN</td>
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
                    <td style="text-align: center; font-size:13px; background:#9cf85096;">$0 MXN</td>
                    <td style="text-align: center; font-size:13px; background:#f5f5f2;">${{ number_format($cotizacione->$importeKey / 2, 2, '.', '') }} MXN</td>
                </tr>
                @endif
            @endfor
            <tr>
                <td style="font-size:14px;font-style: italic;text-align:center; border: none;" colspan="3"><strong>Total: </strong>{{ $textoTotal }} pesos MXN</td>
                <td style="text-align: center; font-size:13px; background:#9cf85096;">${{ $cotizacione->total }} MXN</td>
            </tr>
        </table>
        <h4 style="text-align: center; margin-top: 40px;">Información de pago</h4>
        <div class="form-group borde" style="margin-top: 2px;">
            <div class="form-group" style="margin-top:10px;">
                <strong>Datos bancarios para transferencia</strong>
            </div>
            <div class="form-group" style="margin-top: 20px;">
                <strong>Cuenta CLABE:</strong>
                012546004779716801
            </div>
            <div class="form-group" >
                <strong>Beneficiario:</strong>
                Demetrio Del Carmen Gómez
            </div>
            <div class="form-group" >
                <strong>Banco:</strong>
                BBVA BANCOMER
            </div>
            <div class="form-group" style="margin-top: 20px;">
                <strong>Transferencias Internacionales:</strong>
            </div>
            <div class="form-group" style="margin-top: 20px;">
                <strong>Código Swift:</strong>
                BCMRMXMMPYM
            </div>
            <div class="form-group" style="margin-top: 25px; margin-bottom:15px;">
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
