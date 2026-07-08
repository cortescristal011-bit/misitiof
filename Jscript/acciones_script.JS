window.addEventListener("load", iniciarf);

function iniciarf() {

    vcosto = document.getElementById("costop");

    vporcentaje = document.getElementById("porcentajev");
    vimage = document.getElementById("simagen");

    vcosto.addEventListener("input", mostrarpventa);
    vporcentaje.addEventListener("input", mostrarpventa);
    vimage.addEventListener("input", mostrarImagen);
}

function calcularPorcentaje(costof, porcentajef) {

    let TantoTotal = costof * (porcentajef / 100);

    let PVenta = parseFloat(costof) + parseFloat(TantoTotal);

    return PVenta;
}

function mostrarpventa() {

    if (vcosto.value !== "" && vporcentaje.value !== "") {

        let costoNum = parseFloat(vcosto.value);
        let porcentajeNum = parseFloat(vporcentaje.value);


        if (!isNaN(costoNum) && !isNaN(porcentajeNum)) {

            let calculo = calcularPorcentaje(costoNum, porcentajeNum);

            document.getElementById("pventa").value = calculo;
        } else {

            document.getElementById("pventa").value = "";
        }
    } else {

        document.getElementById("pventa").value = "";
    }
}

function mostrarImagen() {
    var verimagen = document.querySelector('img');
    var archivof = document.querySelector('input[type=file]').files[0];
    var leerarchivo = new FileReader();
    leerarchivo.onload = function () {
        verimagen.src = leerarchivo.result;
    }
    if (archivof) {
        leerarchivo.readAsDataURL(archivof);
    } else {
        verimagen.src = "";
    }
}
