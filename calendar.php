<?php
require_once './makeTime.php';
require_once './calendarStyles.php';


class Calendar
{
    public function __construct()
    {
        global $defaultZone, $monthDays, $today, $firstDayMonth, $month, $year, $monthNames;
        date_default_timezone_set($defaultZone);
    }

    public function navigation($month, $year, $monthNames)
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
        <a href="<?php echo $prevLink; ?>">&laquo;</a>
        <strong><?php echo $currentName; ?></strong>
        <a href="<?php echo $nextLink; ?>">&raquo;</a>

        <?php
    }

    public function calendar($monthDays, $today, $firstDayMonth, $month, $year, $monthNames)
    {
        ?>
        <table>
            <caption>
                <small class="cal-nav">
                    <?php echo $this->navigation($month, $year, $monthNames); ?>
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
                        <td style="<?php echo stylesCalendar($weekDay, $today, $actualDay); ?><?php ($actualDay <= 0 || $actualDay > $monthDays) ? 'background-color: #e6e6e6;' : '' ?>"">
                        <?php echo $actualDay > 0 ? ($actualDay > $monthDays ? '' : $actualDay) : ''; ?>

                    </td>
                    <?php $weekDay++;
                    } ?>
            </tr>
        <?php } ?>
    </table>
<?php

    }
}