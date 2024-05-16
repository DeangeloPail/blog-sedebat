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