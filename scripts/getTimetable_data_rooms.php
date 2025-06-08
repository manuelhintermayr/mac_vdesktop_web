<?php
// Mock data for timetable system - Rooms

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

// Mock timetable data structure - simplified version with anonymized data
$mockTimetablesRooms = [
    // Room A201 timetable
    'A201' => [
        'monday' => [
            ['time' => '7:55-8:45', 'subject' => 'MAT', 'teacher' => 'SCH', 'class' => '5AHIF'],
            ['time' => '8:45-9:35', 'subject' => 'MAT', 'teacher' => 'SCH', 'class' => '5AHIF']
        ],
        'tuesday' => [
            ['time' => '9:50-10:40', 'subject' => 'WEB', 'teacher' => 'GHI', 'class' => '5AHIF'],
            ['time' => '10:40-11:30', 'subject' => 'WEB', 'teacher' => 'GHI', 'class' => '5AHIF']
        ],
        'thursday' => [
            ['time' => '8:00-8:50', 'subject' => 'MAT', 'teacher' => 'SCH', 'class' => '5AHIF'],
            ['time' => '8:50-9:40', 'subject' => 'MAT', 'teacher' => 'SCH', 'class' => '5AHIF']
        ],
        'friday' => [
            ['time' => '13:30-14:20', 'subject' => 'MAT', 'teacher' => 'SCH', 'class' => '5AHIF'],
            ['time' => '14:20-15:10', 'subject' => 'MAT', 'teacher' => 'SCH', 'class' => '5AHIF']
        ]
    ],
    
    // Room C105 timetable
    'C105' => [
        'monday' => [
            ['time' => '9:45-10:35', 'subject' => 'PRG', 'teacher' => 'MUL', 'class' => '5AHIF'],
            ['time' => '10:35-11:25', 'subject' => 'PRG', 'teacher' => 'MUL', 'class' => '5AHIF']
        ],
        'tuesday' => [
            ['time' => '8:00-8:50', 'subject' => 'PRG', 'teacher' => 'MUL', 'class' => '5AHIF'],
            ['time' => '8:50-9:40', 'subject' => 'PRG', 'teacher' => 'MUL', 'class' => '5AHIF']
        ],
        'friday' => [
            ['time' => '11:40-12:30', 'subject' => 'PRG', 'teacher' => 'MUL', 'class' => '5AHIF'],
            ['time' => '12:30-13:20', 'subject' => 'PRG', 'teacher' => 'MUL', 'class' => '5AHIF']
        ]
    ],
    
    // Room B304 timetable
    'B304' => [
        'monday' => [
            ['time' => '11:35-12:25', 'subject' => 'ENG', 'teacher' => 'JOH', 'class' => '5AHIF'],
            ['time' => '12:25-13:15', 'subject' => 'ENG', 'teacher' => 'JOH', 'class' => '5AHIF']
        ],
        'wednesday' => [
            ['time' => '11:40-12:30', 'subject' => 'ENG', 'teacher' => 'JOH', 'class' => '5AHIF'],
            ['time' => '12:30-13:20', 'subject' => 'ENG', 'teacher' => 'JOH', 'class' => '5AHIF']
        ]
    ],
    
    // Room C107 timetable
    'C107' => [
        'monday' => [
            ['time' => '14:15-15:05', 'subject' => 'DBI', 'teacher' => 'FIS', 'class' => '5AHIF'],
            ['time' => '15:05-15:55', 'subject' => 'DBI', 'teacher' => 'FIS', 'class' => '5AHIF']
        ],
        'wednesday' => [
            ['time' => '9:50-10:40', 'subject' => 'DBI', 'teacher' => 'FIS', 'class' => '5AHIF'],
            ['time' => '10:40-11:30', 'subject' => 'DBI', 'teacher' => 'FIS', 'class' => '5AHIF']
        ]
    ],
    
    // Room C109 timetable
    'C109' => [
        'monday' => [
            ['time' => '16:05-16:55', 'subject' => 'OS', 'teacher' => 'WEB', 'class' => '5AHIF'],
            ['time' => '16:55-17:45', 'subject' => 'OS', 'teacher' => 'WEB', 'class' => '5AHIF']
        ],
        'thursday' => [
            ['time' => '9:50-10:40', 'subject' => 'OS', 'teacher' => 'WEB', 'class' => '5AHIF'],
            ['time' => '10:40-11:30', 'subject' => 'OS', 'teacher' => 'WEB', 'class' => '5AHIF']
        ]
    ],
    
    // Weitere Räume analog extrahieren, falls vorhanden
    // ...existing code...
];
?>