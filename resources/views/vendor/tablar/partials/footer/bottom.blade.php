<footer class="footer footer-transparent d-print-none">
    <div class="container-xl">
        <div class="row text-center align-items-center flex-row-reverse">
            <div class="col-lg-auto ms-lg-auto">
            </div>
            <div class="col-12 col-lg-auto mt-3 mt-lg-0">
                <ul class="list-inline list-inline-dots mb-0">
                    <li class="list-inline-item">
                        <a id="copyright"></a>
                        <a href="https://desarrollalab.com/"
                           class="link-secondary">{{config('tablar.bottom_title', 'TabLar')}}</a>.
                           Todos los derechos reservados.
                    </li>
                </ul>
            </div>
        </div>
    </div>
</footer>
<script>
    // Obten la fecha actual
    const fechaActual = new Date();

    // Obten el año actual
    const añoActual = fechaActual.getFullYear();

    // Establece el texto de copyright
    const copyrightText = `Copyright © ${añoActual}`;

    // Encuentra el elemento HTML donde deseas mostrar el copyright
    const copyrightElement = document.getElementById("copyright");

    // Agrega el texto de copyright al elemento HTML
    copyrightElement.textContent = copyrightText;
  </script>
