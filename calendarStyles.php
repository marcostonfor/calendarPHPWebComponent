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
    } elseif (((int) $actualDay === (int) $evaluatedDay) && ((int) $evaluatedDay === ((int) $indexWeekDay == 6))) {
        $style .= ' background-color: dodgerblue; color: cornsilk;';
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
        border-top: 0.2vw double dimgray;
        border-bottom: 0.2vw double dimgray;
        border-top-right-radius: 0.5vw;
        border-top-left-radius: 0.5vw;
        
    }

    table th {
        border-bottom: 0.2vw double black;
        font-size: 15pt;
    }

    table td {
        border: .1vw double steelblue;
        border-collapse: separate;
        text-align: center;
        text-shadow: -.1vw -.1vw 1px black, .1vw .1vw 1px black;
    }

    table th:nth-child(-n+5) {
        color: cornsilk;
        background-color: yellow;
        opacity: 0.7; 
        text-shadow: -.1vw -.1vw 1px black, .1vw .1vw 1px black;
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

    caption {
        caption-side: bottom;
    }

    caption .cal-nav {
        width: 100%;
        display: flex;
        justify-content: space-between;
        align-items: center;
        text-align: center;
        font-size: 1em;
        margin-bottom: 0.5em;
        background-color: goldenrod;
        color: darkslategray;
        padding: 0.3em 0;
    }

    caption .cal-nav a {
        margin: 0 1em;
        color: navy;
        text-decoration: none;
        font-weight: bold;
        font-size: 25pt;
    }

    caption .cal-nav strong {
        flex-grow: 1;
        text-align: center;
        margin: 0 1em;
    }
</style>