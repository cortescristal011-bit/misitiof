<?php
require_once __DIR__ . '/conexion.php';
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="./imgfares/facicon.png" type="image/png" sizes="16x16">
    <link rel="stylesheet" type="text/css" href="./EstiloCssF/dcoloresf.css">
    <script src="./Jscript/acciones_script.JS"></script>
    <link rel="stylesheet" type="text/css" href="./EstiloCssF/diseñocssf.css">
    <title>Inventario Fares</title>
    <script>
        function calcularPrecio() {
            const costo = parseFloat(document.getElementById('costop').value) || 0;
            const porcentaje = parseFloat(document.getElementById('porcentajev').value) || 0;
            const precioVenta = costo * (1 + porcentaje / 100);
            document.getElementById('pventa').value = precioVenta.toFixed(2);
        }

        function previewImage() {
            const file = document.getElementById('simagen').files[0];
            const img = document.querySelector('#csimagen img');
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    img.src = e.target.result;
                };
                reader.readAsDataURL(file);
            } else {
                img.src = '';
            }
        }

        document.addEventListener('DOMContentLoaded', function() {
            document.getElementById('costop').addEventListener('input', calcularPrecio);
            document.getElementById('porcentajev').addEventListener('input', calcularPrecio);
            document.getElementById('simagen').addEventListener('change', previewImage);
        });
    </script>
</head>

<body>
    <header id="titulo1" class="fcolor-d5">
        <h1>Ediciones Fares</h1>
    </header>

    <?php if (isset($_GET['ok']) && $_GET['ok'] == 1): ?>
        <div style="background-color: #d4edda; color: #155724; padding: 10px; margin: 10px; border: 1px solid #c3e6cb; border-radius: 4px;">
            Producto guardado exitosamente.
        </div>
    <?php endif; ?>

    <nav class="fcolor14">
        <ul>
            <li><a href="#">Principal</a></li>
            <li><a href="#">Libros</a></li>
            <li class="f-desplegable"><a href="#" class="btndespegable">Inventario</a>
                <div class="cont-desplegable">
                    <a href="cproductos.php">Crear producto</a>
                    <a href="#">Consultar producto</a>
                </div>
            </li>
            <li><a href="#">Contacto</a></li>
        </ul>
    </nav>

    <section class="fcolor-11 section-form">
        <div id="contenedor-formulario" class="s-encabezado">
            <h2>Inventario</h2>
            <form action="guardar.php" method="post" enctype="multipart/form-data" autocomplete="off" class="fcolor-15">

                <div id="codnom">
                    <label class="codnom1"> Codigo:
                        <input type="text" name="codigo" id="codigo" pattern="[0-9]{3,}" placeholder="Ingresar solo números" class="campof" autofocus required>
                    </label>

                    <label class="codnom1"> Producto:
                        <input type="text" name="nproducto" id="nproducto" pattern="[a-zA-Z\s]{3,100}" placeholder="Ingresar solo letras" class="campof" required>
                    </label>
                </div>

                <div id="cospor">
                    <label class="codnom1"> Costo:
                        <input type="text" name="costop" id="costop" pattern="[0-9]+(\.[0-9]+)?" class="campof">
                    </label>

                    <label class="codnom1">Porcentaje de venta:
                        <input type="text" name="porcentajev" id="porcentajev" maxlength="3" size="4" class="campof">
                    </label>
                </div>

                <div id="prefecha">
                    <label class="codnom1">Fecha:
                        <input type="date" name="fecha_creacion" id="fecha_creacion" class="campof">
                    </label>

                    <label class="codnom1"> Precio de Venta:
                        <input type="text" name="pventa" id="pventa" readonly class="campof">
                    </label>
                </div>

                <div id="csimagen">
                    <img src="" width="200px" alt="Imagen del producto...">
                </div>

                <div id="botonimg">
                    <input type="file" name="simagen" id="simagen" class="campof">
                </div>

                <div>
                    <input type="submit" value="Guardar">
                </div>

            </form>
        </div>
    </section>

    <footer>
        <p>Derechos Reservados &copy; 2004-2023</p>
    </footer>
</body>

</html>