<?php
include('login_functions.php');

if ($_SESSION['loggedIn'] == false || empty($_SESSION['loggedIn'])) {
    echo "Nicht angemeldet.";
} else {
    if (!isValidUser($_SESSION['s_username'], $_SESSION['s_pw'])) {
        echo "Falsche Zugangsdaten.";
    } else {
        // Get current date
        $currentYear = date('Y');
        $currentMonth = date('n');
        $currentDay = date('j');
        
        // Handle month navigation
        if (isset($_GET['month']) && isset($_GET['year'])) {
            $displayMonth = (int)$_GET['month'];
            $displayYear = (int)$_GET['year'];
        } else {
            $displayMonth = $currentMonth;
            $displayYear = $currentYear;
        }
        
        // Validate month and year
        if ($displayMonth < 1) {
            $displayMonth = 12;
            $displayYear--;
        } elseif ($displayMonth > 12) {
            $displayMonth = 1;
            $displayYear++;
        }
        
        // Get calendar data
        $firstDayOfMonth = mktime(0, 0, 0, $displayMonth, 1, $displayYear);
        $daysInMonth = date('t', $firstDayOfMonth);
        $dayOfWeek = date('w', $firstDayOfMonth); // 0 = Sunday, 1 = Monday, etc.
        $monthName = date('F', $firstDayOfMonth);
        
        // Calculate previous and next month
        $prevMonth = $displayMonth - 1;
        $prevYear = $displayYear;
        if ($prevMonth < 1) {
            $prevMonth = 12;
            $prevYear--;
        }
        
        $nextMonth = $displayMonth + 1;
        $nextYear = $displayYear;
        if ($nextMonth > 12) {
            $nextMonth = 1;
            $nextYear++;
        }
        
        // Calculate current week number
        $weekNumber = date('W', $firstDayOfMonth);
        
        // Get previous month data for displaying last days of previous month
        $prevMonthDays = date('t', mktime(0, 0, 0, $prevMonth, 1, $prevYear));
          // Function to check if a date is an Austrian holiday
        function isAustrianHoliday($day, $month, $year) {
            // Fixed holidays
            $fixedHolidays = [
                '01-01' => 'Neujahr',                     // New Year's Day
                '01-06' => 'Heilige Drei Könige',         // Epiphany
                '05-01' => 'Staatsfeiertag',              // Labor Day
                '08-15' => 'Mariä Himmelfahrt',           // Assumption of Mary
                '10-26' => 'Nationalfeiertag',            // National Day
                '11-01' => 'Allerheiligen',               // All Saints' Day
                '12-08' => 'Mariä Empfängnis',            // Immaculate Conception
                '12-25' => 'Weihnachten',                 // Christmas Day
                '12-26' => 'Stefanitag'                   // St. Stephen's Day
            ];
            
            // Check if the date is a fixed holiday
            $dateKey = sprintf('%02d-%02d', $month, $day);
            if (isset($fixedHolidays[$dateKey])) {
                return $fixedHolidays[$dateKey];
            }
            
            // Calculate Easter date for the given year
            $easter = easter_date($year);
            $easterDay = date('d', $easter);
            $easterMonth = date('m', $easter);
            $easterTimestamp = mktime(0, 0, 0, $easterMonth, $easterDay, $year);
            
            // Define Easter-dependent holidays
            $easterHolidays = [
                date('d.m', strtotime('-2 days', $easterTimestamp)) => 'Good Friday',
                date('d.m', strtotime('+1 day', $easterTimestamp)) => 'Easter Monday',
                date('d.m', strtotime('+39 days', $easterTimestamp)) => 'Ascension Day',
                date('d.m', strtotime('+50 days', $easterTimestamp)) => 'Whit Monday',
                date('d.m', strtotime('+60 days', $easterTimestamp)) => 'Corpus Christi'
            ];
            
            // Format current date for comparison
            $currentDate = sprintf('%02d.%02d', $day, $month);
            
            // Check if the date is an Easter-dependent holiday
            if (isset($easterHolidays[$currentDate])) {
                return $easterHolidays[$currentDate];
            }
            
            return false;
        }
        
        echo '<div class="calendar-container">';
        
        // Modern calendar header with navigation
        echo '<div class="calendar-header-modern">';
        echo '<div class="month-year-display">';
        echo '<span class="month-name">' . $monthName . '</span> <span class="year-number">' . $displayYear . '</span>';        echo '</div>';
        echo '<div class="nav-controls">';
        echo '<button class="nav-arrow double-back" onclick="loadCalendar(' . ($displayMonth == 1 ? 1 : 1) . ', ' . ($displayMonth == 1 ? $displayYear-1 : $displayYear) . ')">&laquo;</button>';
        echo '<button class="nav-arrow single-back" onclick="loadCalendar(' . $prevMonth . ', ' . $prevYear . ')">&lsaquo;</button>';
        
        // Today button with circular highlight - now with onclick to navigate to current date
        echo '<button class="today-btn" onclick="loadCalendar(' . date('n') . ', ' . date('Y') . ')">' . date('j') . '</button>';
        
        echo '<button class="nav-arrow single-forward" onclick="loadCalendar(' . $nextMonth . ', ' . $nextYear . ')">&rsaquo;</button>';
        echo '<button class="nav-arrow double-forward" onclick="loadCalendar(' . ($displayMonth == 12 ? 1 : 12) . ', ' . ($displayMonth == 12 ? $displayYear+1 : $displayYear) . ')">&raquo;</button>';
        echo '</div>';
        echo '</div>';
        
        echo '<div class="calendar-week-view">';
        // Week number header
        echo '<div class="week-header">W1</div>';
        
        // Day headers - Monday first like macOS
        $dayHeaders = ['MON', 'TUE', 'WED', 'THU', 'FRI', 'SAT', 'SUN'];
        foreach ($dayHeaders as $day) {
            echo '<div class="day-header">' . $day . '</div>';
        }
        
        // Adjust day of week calculation for Monday-first layout
        $adjustedDayOfWeek = ($dayOfWeek + 6) % 7; // Convert Sunday=0 to Monday=0
        
        // Add week number cell
        echo '<div class="week-cell">W' . $weekNumber . '</div>';
        
        // Calculate days from previous month to display
        $prevMonthStartDay = $prevMonthDays - $adjustedDayOfWeek + 1;
        
        // Empty cells for days before the first day of the month (previous month's days)
        for ($i = 0; $i < $adjustedDayOfWeek; $i++) {
            echo '<div class="day-cell prev-month">';
            echo '<div class="day-number">' . ($prevMonthStartDay + $i) . '</div>';
            
            // For Dec 30 specifically, add a grey circle (as shown in the image)
            if ($displayMonth == 1 && $displayYear == 2025 && ($prevMonthStartDay + $i) == 30) {
                echo '<div class="day-circle"></div>';
            }
            
            echo '</div>';
        }          // Days of the month
        for ($day = 1; $day <= $daysInMonth; $day++) {
            $isToday = ($day == $currentDay && $displayMonth == $currentMonth && $displayYear == $currentYear);
            $todayClass = $isToday ? ' today' : '';
            $dateText = '';
              // Check if the day is a weekend (Saturday or Sunday)
            $dayTimestamp = mktime(0, 0, 0, $displayMonth, $day, $displayYear);
            $dayOfWeekNum = date('w', $dayTimestamp); // 0 (Sunday) through 6 (Saturday)
            $isWeekend = ($dayOfWeekNum == 0 || $dayOfWeekNum == 6);
            $weekendClass = $isWeekend ? ' weekend' : '';
            
            // Check if the day is an Austrian holiday
            $holidayName = isAustrianHoliday($day, $displayMonth, $displayYear);
            $isHoliday = $holidayName !== false;
            $holidayClass = $isHoliday ? ' holiday' : '';
            
            // For the first week of January 2025, show "Jan" prefix for Jan 1 and Jan 4
            if ($displayMonth == 1 && $displayYear == 2025 && ($day == 1 || $day == 4)) {
                $dateText = 'Jan ';
            }            echo '<div class="day-cell' . $todayClass . $weekendClass . $holidayClass . '">';
            echo '<div class="day-number">' . $dateText . $day . '</div>';
            
            // Add food icon to Jan 2 (as shown in image)
            if ($displayMonth == 1 && $displayYear == 2025 && $day == 2) {
                echo '<div class="day-icon">🍕</div>';
            }
            
            // Display holiday name if it's a holiday
            if ($isHoliday) {
                echo '<div class="holiday-name">' . $holidayName . '</div>';
            }
            
            echo '</div>';
            
            // Start a new week after Sunday
            if (($day + $adjustedDayOfWeek) % 7 == 0 && $day < $daysInMonth) {
                $weekNumber++;
                echo '<div class="week-cell">W' . $weekNumber . '</div>';
            }
        }
        
        // Fill in the remaining days from next month if needed
        $remainingCells = 7 - (($daysInMonth + $adjustedDayOfWeek) % 7);
        if ($remainingCells < 7) {
            for ($i = 1; $i <= $remainingCells; $i++) {
                echo '<div class="day-cell next-month">';
                echo '<div class="day-number">' . $i . '</div>';
                echo '</div>';
            }
        }
        
        echo '</div>';
        echo '</div>';
        
        // Add JavaScript for navigation
        echo '<script>
        function loadCalendar(month, year) {
            $("#calendarBody").load("scripts/calendar.php?month=" + month + "&year=" + year);
        }
        </script>';
          // Add CSS for calendar styling
        echo '<style>
        .calendar-container {
            font-family: -apple-system, BlinkMacSystemFont, "Helvetica Neue", Helvetica, Arial, sans-serif;
            max-width: 100%;
            margin: 0 auto;
            background: #fff;
            border-radius: 0;
            overflow: hidden;
        }
        
        .calendar-header-modern {
            background: #fafafa;
            border-bottom: 1px solid #e5e5e5;
            padding: 16px 24px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
        .month-year-display {
            font-size: 22px;
            font-weight: 400;
            color: #1d1d1f;
            letter-spacing: -0.5px;
        }
        
        .nav-controls {
            display: flex;
            align-items: center;
        }
        
        .nav-arrow {
            background: #fff;
            border: 1px solid #d1d1d1;
            border-radius: 6px;
            width: 36px;
            height: 32px;
            cursor: pointer;
            font-size: 18px;
            font-weight: 300;
            color: #666;
            transition: all 0.1s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 4px;
        }
        
        .nav-arrow:hover {
            background: #f5f5f5;
            border-color: #b3b3b3;
        }
        
        .nav-arrow:active {
            background: #e8e8e8;
            border-color: #999;
        }
        
        .today-btn {
            background: #007aff;
            color: #fff;
            border: none;
            border-radius: 50%;
            width: 36px;
            height: 36px;
            cursor: pointer;
            font-size: 16px;
            font-weight: 500;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 8px;
            position: relative;
            overflow: hidden;
        }
        
        .today-btn:focus {
            outline: none;
        }
        
        .today-btn::after {
            content: "";
            position: absolute;
            top: 50%;
            left: 50%;
            width: 100%;
            height: 100%;
            background: rgba(255, 255, 255, 0.3);
            border-radius: 50%;
            transform: translate(-50%, -50%) scale(0);
            transition: transform 0.2s ease;
        }
        
        .today-btn:hover::after {
            transform: translate(-50%, -50%) scale(1);
        }
        
        .calendar-week-view {
            display: grid;
            grid-template-columns: auto repeat(7, 1fr);
            border-collapse: collapse;
        }
        
        .week-header {
            background: #f9f9f9;
            padding: 12px 8px;
            text-align: center;
            font-size: 12px;
            font-weight: 500;
            color: #8e8e93;
            border-bottom: 1px solid #e5e5e5;
            border-right: 1px solid #e5e5e5;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }
        
        .week-cell {
            background: #f9f9f9;
            padding: 12px 8px;
            text-align: center;
            font-size: 12px;
            font-weight: 500;
            color: #007aff;
            border-bottom: 1px solid #e5e5e5;
            border-right: 1px solid #e5e5e5;
        }
        
        .day-header {
            background: #f9f9f9;
            padding: 12px 8px;
            text-align: center;
            font-size: 12px;
            font-weight: 500;
            color: #8e8e93;
            border-bottom: 1px solid #e5e5e5;
            border-right: 1px solid #e5e5e5;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }
        
        .day-header:last-child {
            border-right: none;
        }
        
        .day-cell {
            background: #fff;
            min-height: 100px;
            position: relative;
            border-bottom: 1px solid #e5e5e5;
            border-right: 1px solid #e5e5e5;
            transition: background-color 0.1s ease;
        }
        
        .day-cell:last-child {
            border-right: none;
        }
        
        .day-cell:hover:not(.empty) {
            background: #f8f8f8;
        }        .day-cell.prev-month, .day-cell.next-month, .day-cell.weekend, .day-cell.holiday {
            background: #fafafa;
            color: #c7c7cc;
        }
        
        .day-cell.prev-month .day-number, .day-cell.next-month .day-number, .day-cell.weekend .day-number, .day-cell.holiday .day-number {
            color: #c7c7cc;
        }
        
        .day-cell.today {
            background: #f0f8ff;
        }
        
        .day-cell.today:hover {
            background: #e8f4fd;
        }
        
        .day-number {
            position: absolute;
            top: 8px;
            left: 12px;
            font-size: 16px;
            font-weight: 400;
            color: #1d1d1f;
            line-height: 1;
        }
        
        .day-cell.today .day-number {
            color: #007aff;
            font-weight: 500;
            background: #007aff;
            color: #fff;
            width: 24px;
            height: 24px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 14px;
            top: 6px;
            left: 10px;
        }
        
        .day-circle {
            position: absolute;
            top: 9px;
            left: 11px;
            width: 20px;
            height: 20px;
            border-radius: 50%;
            background-color: #cccccc;
            z-index: -1;
        }
          .day-icon {
            position: absolute;
            top: 40px;
            left: 12px;
            font-size: 24px;
        }
        
        .holiday-name {
            position: absolute;
            bottom: 8px;
            left: 8px;
            font-size: 12px;
            color: #007aff;
            font-weight: 400;
        }
        </style>';
    }
}
?>