<?php
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

function stylesCalendar($indexWeekDay, $actualDay, $evaluatedDay)
{
    $style = '';

    if ($indexWeekDay <= 4) {
        $style .= 'color: blanchedalmond;';
    } elseif ($indexWeekDay == 5) {
        $style .= 'color: cornflowerblue;';
    } else {
        $style .= 'color: red; text-shadow: -.1vw -.1vw 1px gray, .1vw .1vw 1px gray;';
    }

    if ((int) $actualDay === (int) $evaluatedDay) {
        $style .= ' background-color: dimgray; color: aliceblue; font-weight: bold;';
        $style .= ' text-shadow: 0vw 0vw 1px black;';
    }

    return $style;
}
function calendar($monthDays, $today, $firstDayMonth, $month, $year, $monthNames)
{

    $prevMonth = $month - 1;
    $nextMonth = $month + 1;
    $prevYear = $year;
    $nextYear = $year;

    if ($prevMonth < 1) {
        $prevMonth = 12;
        $prevYear--;
    }
    if ($nextMonth > 12) {
        $nextMonth = 1;
        $nextYear++;
    }

    $currentName = $monthNames[$month - 1] . " $year";
    $prevLink = "?month=$prevMonth&year=$prevYear";
    $nextLink = "?month=$nextMonth&year=$nextYear";

    ?>
    <style>
        @import url('https://fonts.cdnfonts.com/css/frijole');

        table {
            /* transform: scale(0.5, 0.5); */
            background-color: goldenrod;
            opacity: 0.7;
            font-family: 'Frijole', sans-serif;
            empty-cells: hide;
        }

        td {
            border: .1vw double steelblue;
            border-collapse: separate;
            text-align: center;
        }

        td {
            text-shadow: -.1vw -.1vw 1px black, .1vw .1vw 1px black;
        }

        table th:nth-child(-n+5) {
            color: dimgray;
            text-shadow: -.1vw -.1vw 1px gray, .1vw .1vw 1px gray;
            background-color: yellow;
        }

        table th:nth-child(n+6) {
            color: dodgerblue;
            background-color: navy;
        }

        table th:nth-child(n+7) {
            text-shadow: -.1vw -.1vw 1px yellow, .1vw .1vw 1px yellow;
            color: firebrick;
            background-color: crimson;
        }


        caption .cal-nav {
            width: 100%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            text-align: center;
            font-size: 1em;
            margin-bottom: 0.5em;
            background-color: lightsteelblue;
            color: darkslategray;
            padding: 0.3em 0;
        }

        caption .cal-nav a {
            margin: 0 1em;
            color: navy;
            text-decoration: none;
            font-weight: bold;
            font-size: 21pt;
            background-color: cadetblue;
        }

        caption .cal-nav strong {
            flex-grow: 1;
            text-align: center;
            margin: 0 1em;
        }
    </style>
    <table>
        <caption>
            <small class="cal-nav">
                <a href="<?php echo $prevLink; ?>">&laquo;</a>
                <strong><?php echo $currentName; ?></strong>
                <a href="<?php echo $nextLink; ?>">&raquo;</a>
            </small>
        </caption>
        <tr>
            <th><small>LUN</small></th>
            <th><small>MAR</small></th>
            <th><small>MIE</small></th>
            <th><small>JUE</small></th>
            <th><small>VIE</small></th>
            <th><small class="saturday">SA</small></th>
            <th><small class="sunday">DO</small></th>
        </tr>
        <?php for ($beginWeekDay = 2 - $firstDayMonth; $beginWeekDay <= $monthDays; $beginWeekDay += 7) { ?>
            <tr>
                <?php $weekDay = 0; ?>
                <?php for ($actualDay = $beginWeekDay; $actualDay <= $beginWeekDay + 6; $actualDay++) { ?>
                    <td
                        style="<?php echo stylesCalendar($weekDay, $today, $actualDay); ?><?php ($actualDay <= 0 || $actualDay > $monthDays) ? 'background-color: #e6e6e6;' : '' ?>">
                        <?php echo $actualDay > 0 ? ($actualDay > $monthDays ? '' : $actualDay) : ''; ?>

                    </td>
                    <?php $weekDay++;
                } ?>
            </tr>
        <?php } ?>
    </table>
    <?php
}

function obtenerFechaActualEnEspanol(): string
{
    $dias = ['domingo', 'lunes', 'martes', 'miércoles', 'jueves', 'viernes', 'sábado'];
    $meses = ['enero', 'febrero', 'marzo', 'abril', 'mayo', 'junio',
              'julio', 'agosto', 'septiembre', 'octubre', 'noviembre', 'diciembre'];

    $fecha = new DateTime();

    $diaSemana = $dias[$fecha->format('w')];
    $dia = $fecha->format('j');
    $mes = $meses[$fecha->format('n') - 1];
    $anio = $fecha->format('Y');

    return ucfirst("$diaSemana, $dia de $mes de $anio");
}


?>
<!DOCTYPE html>
<html lang=" en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calendario con php. 01</title>
    <style>
         .tooltip {
            position: relative;
            display: inline-block;
            border-bottom: 1px dotted black;
        }

        .tooltip .tooltiptext {
            visibility: hidden;
            width: fit-content;
            background-color: #555;
            color: #fff;
            text-align: center;
            border-radius: 6px;
            padding: 5px 0;
            position: absolute;
            z-index: 1;
            top: 100%;
            left: 50%;
            margin-left: -60px;
            opacity: 0;
            transition: opacity 0.3s;
        }

        .tooltip .tooltiptext::after {
            content: "";
            position: absolute;
            bottom: 100%;
            left: 50%;
            margin-left: -5px;
            border-width: 5px;
            border-style: solid;
            border-color: #555 transparent transparent transparent;
        }

        .tooltip:hover .tooltiptext {
            visibility: visible;
            opacity: 1;
        } 
    </style>
</head>

<body>
<p></p>
    <div class="tooltip"><?php echo obtenerFechaActualEnEspanol();  ?>
        <span class="tooltiptext">
            <?php
            calendar($monthDays, $today, $firstDayMonth, $month, $year, $monthNames);
            ?>
        </span>
    </div>


</body>

</html>
