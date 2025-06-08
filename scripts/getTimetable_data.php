<?php
// Mock data for timetable system

// Classes with IDs
$mockClasses = [
    '1AHIF' => '1AHIF - Higher Technical College for Computer Science',
    '1BHIF' => '1BHIF - Higher Technical College for Computer Science',
    '1CHIF' => '1CHIF - Higher Technical College for Computer Science',
    '1DHIF' => '1DHIF - Higher Technical College for Computer Science',
    '2AVIF' => '2AVIF - Higher Technical College for Computer Science',
    '2BVIF' => '2BVIF - Higher Technical College for Computer Science',
    '2CVIF' => '2CVIF - Higher Technical College for Computer Science',
    '4ABIF' => '4ABIF - Higher Technical College for Computer Science',
    '4BBIF' => '4BBIF - Higher Technical College for Computer Science',
    '5AHIF' => '5AHIF - Higher Technical College for Computer Science'
];

// Teachers with IDs - anonymized
$mockTeachers = [
    'ABC' => 'Aigner',
    'DEF' => 'Berger',
    'GHI' => 'Conrad',
    'JKL' => 'Dietrich',
    'MNO' => 'Eckhart',
    'PQR' => 'Fischer',
    'STU' => 'Gruber',
    'VWX' => 'Huber',
    'YZA' => 'Jäger',
    'SCH' => 'Schmidt',
    'MUL' => 'Müller',
    'JOH' => 'Johnson',
    'FIS' => 'Fischer',
    'WEB' => 'Weber'
];

// Rooms - anonymized
$mockRooms = [
    'A1.01' => 'A1.01',
    'A2.15' => 'A2.15',
    'B3.22' => 'B3.22',
    'C1.04' => 'C1.04',
    'D2.08' => 'D2.08',
    'A201' => 'A201',
    'C105' => 'C105',
    'B304' => 'B304',
    'C107' => 'C107',
    'C109' => 'C109'
];



// Import timetable data from separate files
require_once __DIR__ . '/getTimetable_data_classes.php';
require_once __DIR__ . '/getTimetable_data_teachers.php';
require_once __DIR__ . '/getTimetable_data_rooms.php';

// Merge all timetable arrays into one
$mockTimetables = array_merge(
    $mockTimetablesClasses,
    $mockTimetablesTeachers,
    $mockTimetablesRooms
);

// Function to get HTML representation of a timetable
function getTimetableHTML($id)
{
    global $mockTimetables, $mockClasses, $mockTeachers, $mockRooms;

    // Check if the ID exists in our mock data
    if (!isset($mockTimetables[$id])) {
        return '<div class="msg warn">
            <h4>No Timetable Found</h4>
            <p>No timetable was found for the selected ID.</p>
        </div>';
    }

    $timetable = $mockTimetables[$id];
    if (isset($mockClasses[$id])) {
        $title = $mockClasses[$id];
    } elseif (isset($mockTeachers[$id])) {
        $title = $mockTeachers[$id];
    } elseif (isset($mockRooms[$id])) {
        $title = $mockRooms[$id];
    } else {
        $title = $id;
    }

    // Build HTML for the timetable based on mock data
    $html = '<h2>' . htmlspecialchars($title) . '</h2>';
    $html .= '<table class="timetable">';
    $html .= '<tr><th>Time</th><th>Monday</th><th>Tuesday</th><th>Wednesday</th><th>Thursday</th><th>Friday</th></tr>';

    // Time slots
    $timeSlots = [
        '8:00-8:50',
        '8:50-9:40',
        '9:50-10:40',
        '10:40-11:30',
        '11:40-12:30',
        '12:30-13:20',
        '13:30-14:20',
        '14:20-15:10',
        '15:20-16:10',
        '16:05-16:55',
        '16:55-17:45',
        '17:00-17:50',
        '17:50-18:40',
        '18:10-19:00'
    ];

    foreach ($timeSlots as $timeSlot) {
        $html .= '<tr>';
        $html .= '<td>' . $timeSlot . '</td>';

        // Days of week
        foreach (['monday', 'tuesday', 'wednesday', 'thursday', 'friday'] as $day) {
            $html .= '<td>';

            // Find any lesson in this timeslot for this day
            foreach ($timetable[$day] ?? [] as $lesson) {
                if ($lesson['time'] == $timeSlot) {
                    if (isset($mockClasses[$id])) {
                        // Class view
                        $html .= '<div class="lesson">' . $lesson['subject'] . '<br>' .
                            $lesson['teacher'] . ' - ' . $lesson['room'] . '</div>';
                    } else {
                        // Teacher view
                        $html .= '<div class="lesson">' . $lesson['subject'] . '<br>' .
                            $lesson['class'] . ' - ' . $lesson['room'] . '</div>';
                    }
                }
            }

            $html .= '</td>';
        }

        $html .= '</tr>';
    }

    $html .= '</table>';
    return $html;
}
?>
