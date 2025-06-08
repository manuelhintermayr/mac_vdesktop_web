<?php
// Mock data for timetable system

// Classes with IDs
$mockClasses = [
    '1AHIF' => '1AHIF - Höhere Lehranstalt für Informatik',
    '1BHIF' => '1BHIF - Höhere Lehranstalt für Informatik',
    '1CHIF' => '1CHIF - Höhere Lehranstalt für Informatik',
    '2AHIF' => '2AHIF - Höhere Lehranstalt für Informatik',
    '2BHIF' => '2BHIF - Höhere Lehranstalt für Informatik'
];

// Teachers with IDs
$mockTeachers = [
    'KNJ' => 'Knezevic',
    'SAM' => 'Samek',
    'POS' => 'Poszvek',
    'RE' => 'Redl',
    'TT' => 'Taubner'
];

// Mock timetable data structure - simplified version of what was shown in the image
$mockTimetables = [
    // Class timetables
    '1AHIF' => [
        'monday' => [
            ['time' => '8:00-8:50', 'subject' => 'DX', 'teacher' => 'KY', 'room' => 'C3.11'],
            ['time' => '8:50-9:40', 'subject' => 'SAM', 'teacher' => 'SAM', 'room' => 'C3.08']
        ],
        'tuesday' => [
            ['time' => '8:00-8:50', 'subject' => 'BSPM', 'teacher' => 'KNJ', 'room' => 'AU.04'],
            ['time' => '8:50-9:40', 'subject' => 'HAC', 'teacher' => 'BSP', 'room' => 'CU.28']
        ],
        'wednesday' => [
            ['time' => '8:00-8:50', 'subject' => 'POS', 'teacher' => 'TT', 'room' => 'B3.07MM'],
            ['time' => '8:50-9:40', 'subject' => 'KS', 'teacher' => 'POS', 'room' => 'B3.08MF']
        ]
    ],
    
    // Teacher timetables (simplified)
    'KNJ' => [
        'monday' => [
            ['time' => '8:00-8:50', 'subject' => 'BSPM', 'class' => '1AHIF', 'room' => 'AU.04'],
            ['time' => '9:50-10:40', 'subject' => 'BSPM', 'class' => '2AHIF', 'room' => 'AU.05']
        ]
    ],
    'SAM' => [
        'monday' => [
            ['time' => '8:50-9:40', 'subject' => 'SAM', 'class' => '1AHIF', 'room' => 'C3.08'],
            ['time' => '10:40-11:30', 'subject' => 'SAM', 'class' => '2BHIF', 'room' => 'C3.09']
        ]
    ]
];

// Function to get HTML representation of a timetable
function getTimetableHTML($id) {
    global $mockTimetables, $mockClasses, $mockTeachers;
    
    // Check if the ID exists in our mock data
    if (!isset($mockTimetables[$id])) {
        return '<div class="msg warn">
            <h4>Kein Stundenplan gefunden</h4>
            <p>Für die ausgewählte ID wurde kein Stundenplan gefunden.</p>
        </div>';
    }
    
    $timetable = $mockTimetables[$id];
    $title = isset($mockClasses[$id]) ? $mockClasses[$id] : $mockTeachers[$id];
    
    // Build HTML for the timetable based on mock data
    $html = '<h2>' . htmlspecialchars($title) . '</h2>';
    $html .= '<table class="timetable">';
    $html .= '<tr><th>Zeit</th><th>Montag</th><th>Dienstag</th><th>Mittwoch</th><th>Donnerstag</th><th>Freitag</th></tr>';
    
    // Time slots
    $timeSlots = ['8:00-8:50', '8:50-9:40', '9:50-10:40', '10:40-11:30', '11:40-12:30', '12:30-13:20'];
    
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
