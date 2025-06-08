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
        
        echo '<div class="calendar-container">';
        echo '<div class="calendar-header">';
        echo '<div class="calendar-nav">';
        echo '<button class="nav-btn prev-btn" onclick="loadCalendar(' . $prevMonth . ', ' . $prevYear . ')">&#8249;</button>';
        echo '<div class="month-year">' . $monthName . ' ' . $displayYear . '</div>';
        echo '<button class="nav-btn next-btn" onclick="loadCalendar(' . $nextMonth . ', ' . $nextYear . ')">&#8250;</button>';
        echo '</div>';
        echo '</div>';
        
        echo '<div class="calendar-grid">';
        
        // Day headers
        $dayHeaders = ['SUN', 'MON', 'TUE', 'WED', 'THU', 'FRI', 'SAT'];
        foreach ($dayHeaders as $day) {
            echo '<div class="day-header">' . $day . '</div>';
        }
        
        // Empty cells for days before the first day of the month
        for ($i = 0; $i < $dayOfWeek; $i++) {
            echo '<div class="day-cell empty"></div>';
        }
        
        // Days of the month
        for ($day = 1; $day <= $daysInMonth; $day++) {
            $isToday = ($day == $currentDay && $displayMonth == $currentMonth && $displayYear == $currentYear);
            $todayClass = $isToday ? ' today' : '';
            
            echo '<div class="day-cell' . $todayClass . '">';
            echo '<div class="day-number">' . $day . '</div>';
            echo '</div>';
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
            font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
            max-width: 100%;
            margin: 0 auto;
            background: #fff;
            border-radius: 8px;
            overflow: hidden;
        }
        
        .calendar-header {
            background: linear-gradient(#f5f5f5, #e8e8e8);
            border-bottom: 1px solid #ccc;
            padding: 12px 20px;
        }
        
        .calendar-nav {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
        .nav-btn {
            background: #fff;
            border: 1px solid #ccc;
            border-radius: 4px;
            width: 32px;
            height: 28px;
            cursor: pointer;
            font-size: 16px;
            font-weight: bold;
            color: #666;
            transition: all 0.2s ease;
        }
        
        .nav-btn:hover {
            background: #f0f0f0;
            border-color: #999;
        }
        
        .nav-btn:active {
            background: #e0e0e0;
        }
        
        .month-year {
            font-size: 18px;
            font-weight: 300;
            color: #333;
            letter-spacing: 0.5px;
        }
        
        .calendar-grid {
            display: grid;
            grid-template-columns: repeat(7, 1fr);
            gap: 1px;
            background: #e0e0e0;
            padding: 1px;
        }
        
        .day-header {
            background: #f8f8f8;
            padding: 8px;
            text-align: center;
            font-size: 11px;
            font-weight: 600;
            color: #666;
            border-bottom: 1px solid #ddd;
        }
        
        .day-cell {
            background: #fff;
            min-height: 60px;
            position: relative;
            transition: background-color 0.2s ease;
        }
        
        .day-cell:hover:not(.empty) {
            background: #f9f9f9;
        }
        
        .day-cell.empty {
            background: #fafafa;
        }
        
        .day-cell.today {
            background: #e3f2fd;
            border: 2px solid #2196F3;
        }
        
        .day-cell.today:hover {
            background: #bbdefb;
        }
        
        .day-number {
            position: absolute;
            top: 4px;
            left: 6px;
            font-size: 13px;
            font-weight: 500;
            color: #333;
        }
        
        .day-cell.today .day-number {
            color: #1976D2;
            font-weight: 600;
        }
        
        .day-cell.empty .day-number {
            color: #ccc;
        }
        </style>';
    }
}
?>