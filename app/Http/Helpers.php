<?php

if (!function_exists('formatearFecha')) {
    function formatearFecha($fechaISO)
    {
        $meses = array(
            "01" => "Enero", "02" => "Febrero", "03" => "Marzo", "04" => "Abril",
            "05" => "Mayo", "06" => "Junio", "07" => "Julio", "08" => "Agosto",
            "09" => "Septiembre", "10" => "Octubre", "11" => "Noviembre", "12" => "Diciembre"
        );

        // Convertir la fecha ISO 8601 a un objeto DateTime
        $fechaObj = new DateTime($fechaISO);

        // Obtener los componentes de la fecha
        $anio = $fechaObj->format('Y');
        $mes = $meses[$fechaObj->format('m')];
        $dia = str_pad($fechaObj->format('d'), 2, '0', STR_PAD_LEFT);

        return "$mes $dia, $anio";
    }
}

if (!function_exists('summaryNews')) {
    function summary($texto, $longitud = 100, $puntosSuspensivos = true)
    {
        // Eliminar etiquetas HTML del texto
        $textoLimpio = strip_tags($texto);

        // Si la longitud del texto es menor o igual a la longitud especificada
        if (strlen($textoLimpio) <= $longitud) {
            return $textoLimpio; // Devolver el texto original
        }

        // Dividir el texto en un arreglo de palabras
        $palabras = explode(' ', $textoLimpio);
        $textoRecortado = '';

        // Recorrer el arreglo de palabras
        foreach ($palabras as $palabra) {
            // Si la adición de la palabra actual supera la longitud especificada
            if (strlen($textoRecortado . ' ' . $palabra) > $longitud) {
                // Agregar puntos suspensivos si se especificó
                if ($puntosSuspensivos) {
                    $textoRecortado .= '...';
                }
                break;
            }
            $textoRecortado .= ' ' . $palabra;
        }

        // Eliminar el espacio en blanco al inicio
        return trim($textoRecortado);
    }
}
