function validoDatoVacio(el) {
    var result = true;
    valor = el.val();
    if ( valor == "" || valor.length == 0 || !valor.trim() ) {
        result = false;
        $("#err_" + el.attr("id")).html("El dato no puede ser vacío");
        $("#err_" + el.attr("id")).show();
    } else {
        $("#err_" + el.attr("id")).hide();
        $("#err_" + $(this).attr("id")).html("");
    }
    return result;
}


function isAlphabetic(cadena) {
    if (cadena.match(/^[a-z A-Z\ \'\u00e1\u00e9\u00ed\u00f3\u00fa\u00c1\u00c9\u00cd\u00d3\u00da\u00f1\u00d1\u00FC\u00DC]+$/) && cadena.trim() != "") {
        return true;
    }
    else {
        return false;
    }
}


function validoDatoAlfabetico(el) {
    var result = true;
    valor = el.val();
    if (!valor || valor.length < 2 || (!isAlphabetic(valor))) {
        result = false;
        $("#err_" + el.attr("id")).html("El dato no puede ser vacío");
        $("#err_" + el.attr("id")).show();
    } else {
        $("#err_" + el.attr("id")).hide();
        $("#err_" + $(this).attr("id")).html("");
    }
    return result;
}

function validarCedula(ci) {
    //Inicializo los coefcientes en el orden correcto
    var arrCoefs = new Array(2, 9, 8, 7, 6, 3, 4, 1);
    var suma = 0;
    //Para el caso en el que la CI tiene menos de 8 digitos
    //calculo cuantos coeficientes no voy a usar
    var difCoef = parseInt(arrCoefs.length - ci.length);
    //recorro cada digito empezando por el de más a la derecha
    //o sea, el digito verificador, el que tiene indice mayor en el array
    for (var i = ci.length - 1; i > -1; i--) {
        //Obtengo el digito correspondiente de la ci recibida
        var dig = ci.substring(i, i + 1);
        //Lo tenía como caracter, lo transformo a int para poder operar
        var digInt = parseInt(dig);
        //Obtengo el coeficiente correspondiente al ésta posición del digito
        var coef = arrCoefs[i + difCoef];
        //Multiplico dígito por coeficiente y lo acumulo a la suma total
        suma = suma + digInt * coef;
    }
    var result = false;
    // si la suma es múltiplo de 10 es una ci válida
    if ((suma % 10) === 0) {
        result = true;
    }
    return result;
}


function validoEdad(dd, mm, aa) {
    var result = false;

    var myDate = new Date(aa, mm, dd);
    var dateNow = new Date()
    var ddNow = dateNow.getDate();
    var mmNow = dateNow.getMonth() + 1;
    var aaNow = dateNow.getFullYear() - 18;
    var aaNow1 = dateNow.getFullYear();
    var dateNowComp = new Date(aaNow, mmNow, ddNow);

    if (myDate <= dateNowComp) {
        result = true;
    }

    if (dd > 31 || dd < 0) {
        result = false;
    }
    if (mm > 12 || mm < 0) {
        result = false;
    }
    if (aa > aaNow1 || aa < 1850) {
        result = false;
    }

    return result;
}

function validoRangoFecha(anio, mes, dia) {
    var retorno = true;
    var tmpFecha = new Date(anio, mes, dia);
    var tmpHoy = new Date();
    edad = Math.floor((tmpHoy - tmpFecha) / 1000 / 60 / 60 / 24 / 365);
    //máximo de años 114
    if (edad >= 114) {
        retorno = false;
    }
    return retorno;
}

function validarMail(mail) {
    var retorno = false;
    var rang = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    if (mail.match(rang)) {
        retorno = true;
    }
    return retorno;
}



function validarFecha(fecha) {
    //Obtenemos los valores dia, mes y año:
    //-------------------------------------
    var arrayFecha = fecha.split("/");

    //Comprobamos que se tengan 3 datos (dia, mes y año) no vacios
    if (arrayFecha.length != 3 || arrayFecha[0] == "" || arrayFecha[1] == "" || arrayFecha[2] == "" || arrayFecha[2].length < 4)
        return false;

    var anyo = parseInt(quitaCeros(arrayFecha[2]));
    //Devuelve el mes numérico o null
    var mes = devuelveMes(quitaCeros(arrayFecha[1]));
    var dia = parseInt(quitaCeros(arrayFecha[0]));

    var hoy = new Date();
    var fechaIngresada = new Date(anyo, mes - 1, dia);
    //-------------------------------------

    //Comprobamos que los valores son numéricos
    if (isNaN(anyo) || isNaN(mes) || isNaN(dia))
        return false;

    //Comprobamos valores correctos de dia mes y anyo
    if (dia < 1 || dia > 31 || mes < 1 || mes > 12 || anyo < 0)
        return false;

    //Comprobamos meses de 30 dias
    if ((mes == 4 || mes == 6 || mes == 9 || mes == 11) && dia > 30)
        return false;

    //Comprobamos mes febrero & bisiestos
    if (mes == 2 && (dia > 29 || (dia == 29 && ((anyo % 400 != 0) && ((anyo % 4 != 0) || (anyo % 100 == 0))))))
        return false;

    //Comprobamos que no se inscriba nadie con fecha posterior a la del dia de la fecha
    if (hoy <= fechaIngresada)
        return false;

    return true;
}



function validoTelefono(tel) {
    var retorno = false;
    if (tel.length == 8 && (tel.charAt(0) == "2" || tel.charAt(0) == "4")) {
        retorno = true;
    }
    else {
        if (tel.length == 9 && tel.charAt(0) == "0" && tel.charAt(1) == "9" && tel.charAt(2) != "0") {
            retorno = true;
        }
    }
    return retorno;
}





//HELPERS

/* Quita los ceros del principio de una cadena si tiene (01)->(1) */

function quitaCeros(cad) {
    var enc = false;
    var i = 0;
    while (i < cad.length && !enc) {
        if (cad.charAt(i) == '0') {
            i++;
        } else {
            enc = true;
        }
    }
    return (cad.substring(i, cad.length));
}



/* Recibe una cadena con un mes (número o cadena)
 y devuelve el número de mes.
 */

function devuelveMes(mes) {
    var numMes = null;
    var meses = new Array("jan", "feb", "mar", "apr", "may", "jun", "jul", "aug", "sep", "oct", "nov", "dec");

    if (!isNaN(parseInt(mes))) //Es un número
        numMes = parseInt(mes);
    else {
        var encontrado = false;
        var i = 0;
        while (i < meses.length && !encontrado) {
            //Comparamos el mes en minúsculas
            if (mes.toLowerCase() == meses[i]) {
                encontrado = true;
                numMes = i + 1;
            }
            i++;
        }
    }
    return numMes;
}

function validateUrl(value) {
  return /^(?:(?:(?:https?|ftp):)?\/\/)(?:\S+(?::\S*)?@)?(?:(?!(?:10|127)(?:\.\d{1,3}){3})(?!(?:169\.254|192\.168)(?:\.\d{1,3}){2})(?!172\.(?:1[6-9]|2\d|3[0-1])(?:\.\d{1,3}){2})(?:[1-9]\d?|1\d\d|2[01]\d|22[0-3])(?:\.(?:1?\d{1,2}|2[0-4]\d|25[0-5])){2}(?:\.(?:[1-9]\d?|1\d\d|2[0-4]\d|25[0-4]))|(?:(?:[a-z\u00a1-\uffff0-9]-*)*[a-z\u00a1-\uffff0-9]+)(?:\.(?:[a-z\u00a1-\uffff0-9]-*)*[a-z\u00a1-\uffff0-9]+)*(?:\.(?:[a-z\u00a1-\uffff]{2,})))(?::\d{2,5})?(?:[/?#]\S*)?$/i.test(value);
}