<?php

$defaultZone = 'Europe/Madrid'; // o la zona horaria que te corresponda

// Con GET se recoge el mes y el año o si no se usa los actuales.
$month = isset($_GET['month']) ? (int) $_GET['month'] : date('n');
$year = isset($_GET['year']) ? (int) $_GET['year'] : date('Y');

// Correccíones para el desborde de los meses.
if ($month < 1) {
    $month = 12;
    $year--;
} elseif ($month > 12) {
    $month = 1;
    $year++;
}

// Calendario
// Días del mes del calendario solicitado
$monthDays = cal_days_in_month(CAL_GREGORIAN, $month, $year);
// Día de la semana del primer día del mes solicitado (1=Lunes, ..., 7=Domingo)
$firstDayMonth = date('N', mktime(0, 0, 0, $month, 1, $year));
$today = date('j'); // Usa date('j') en lugar de date('d') para evitar comparaciones con cadenas tipo '09' vs 9.


// Array para traducír e incorporar el nombre de los meses.
$monthNames = [
    'Enero',
    'Febrero',
    'Marzo',
    'Abril',
    'Mayo',
    'Junio',
    'Julio',
    'Agosto',
    'Septiembre',
    'Octubre',
    'Noviembre',
    'Diciembre'
];
