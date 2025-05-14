<?php
    require_once './calendar.php';


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calendario multiple</title>
</head>

<body>
    <?php

    $calSheet = new Calendar();
    $calSheet->calendar($monthDays, $today, $firstDayMonth, $month, $year, $monthNames);

    ?>
</body>

</html>