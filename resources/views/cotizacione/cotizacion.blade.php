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
                <th style="text-align: center; font-size:13px;"><strong>Servicio</strong></th>
                <th style="text-align: center; font-size:13px;"><strong>Importe</strong></th>
                <th style="text-align: center; font-size:13px;"><strong>Descuento</strong></th>
                <th style="text-align: center; font-size:13px;"><strong>Anticipo 50%</strong></th>
            </tr>
            <tr>
                <td style="font-size:13px;">{{ $cotizacione->servicio }} {{ $cotizacione->planes }}</td>
                <td style="text-align: center; font-size:13px;">${{ $cotizacione->importe }} MXN</td>
                <td style="text-align: center; font-size:13px;">${{ $cotizacione->descuento }} MXN</td>
                <td style="text-align: center; font-size:13px;">${{ $cotizacione->anticipo }} MXN</td>
            </tr>
            @if(!empty($cotizacione->servicioadicional) && !empty($cotizacione->importeadicional))
                <tr>
                    <td style="font-size:13px;">{{ $cotizacione->servicioadicional }}</td>
                    <td style="text-align: center; font-size:13px;">${{ $cotizacione->importeadicional }} MXN</td>
                    <td style="text-align: center; font-size:13px;">$0 MXN</td>
                    <td style="text-align: center; font-size:13px;">${{ $cotizacione->anticipoadi }} MXN</td>
                </tr>
            @endif
            <tr>
                <td style="font-size:13px;" colspan="3" id="montoEnTexto"></td>
                <td style="text-align: center; font-size:13px;">${{ $cotizacione->total }} MXN</td>
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
<script>
    function convertirMontoATexto(monto) {
        // Array de nombres para los números en letras
        var nombres = [
            '', 'Uno', 'Dos', 'Tres', 'Cuatro', 'Cinco', 'Seis', 'Siete', 'Ocho', 'Nueve',
            'Diez', 'Once', 'Doce', 'Trece', 'Catorce', 'Quince', 'Dieciséis', 'Diecisiete', 'Dieciocho', 'Diecinueve',
        ];

        // Array de nombres para las decenas en letras
        var decenas = [
            '', '', 'Veinte', 'Treinta', 'Cuarenta', 'Cincuenta', 'Sesenta', 'Setenta', 'Ochenta', 'Noventa',
        ];

        // Array de nombres para las unidades de cien a diez mil
        var unidadesCientosDiezMiles = [
            '', 'Ciento', 'Doscientos', 'Trescientos', 'Cuatrocientos', 'Quinientos', 'Seiscientos', 'Setecientos', 'Ochocientos', 'Novecientos',
            'Mil', 'Dos Mil', 'Tres Mil', 'Cuatro Mil', 'Cinco Mil', 'Seis Mil', 'Siete Mil', 'Ocho Mil', 'Nueve Mil',
            'Diez Mil'
            // Puedes agregar más escalas según tus necesidades
        ];

        // Convertir el monto a formato de número con palabras
        var montoEnPalabras = '';

        // Función para convertir un número en cien a diez mil a palabras
        function convertirCientosADiezMil(numero) {
            var resultado = '';

            if (numero >= 100) {
                resultado += unidadesCientosDiezMiles[Math.floor(numero / 100)];
                numero %= 100;
            }

            if (numero >= 20) {
                resultado += (resultado === '' ? '' : ' y ') + decenas[Math.floor(numero / 10)];
                numero %= 10;
            }

            if (numero > 0) {
                resultado += (resultado === '' ? '' : ' y ') + nombres[numero];
            }

            return resultado;
        }

        // Convertir el monto en palabras
        montoEnPalabras = convertirCientosADiezMil(Math.floor(monto));

        return montoEnPalabras + ' MXN';
    }

    // Obtener el valor del monto en el segundo campo
    var monto = parseInt("{{ $cotizacione->total }}");

    // Convertir el monto a texto y mostrarlo en el primer campo
    document.getElementById('montoEnTexto').innerText = convertirMontoATexto(monto);
</script>

</body>
</html>
