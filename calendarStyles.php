<?php



function stylesCalendar($indexWeekDay, $actualDay, $evaluatedDay)
{
    $style = '';

    if ($indexWeekDay <= 4) {
        $style .= 'color: azure;';
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


?>

<style>
    @import url('https://fonts.cdnfonts.com/css/frijole');

    table {
        margin: 3vh auto;
        background-color: goldenrod;
        opacity: 0.7;
        font-family: 'Frijole', sans-serif;
        empty-cells: hide;
    }

    td {
        border: .1vw double steelblue;
        border-collapse: separate;
        text-align: center;
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

    table td:nth-child(-n+5) {
        background-color: lightslategray;
        opacity: 0.7;
    }

    table td:nth-child(n+6) {
        background-color: cadetblue;
    }

    table td:nth-child(n+7) {
        background-color: lightpink;
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
        font-size: 25pt;
        background-color: cadetblue;
    }

    caption .cal-nav strong {
        flex-grow: 1;
        text-align: center;
        margin: 0 1em;
    }
</style>