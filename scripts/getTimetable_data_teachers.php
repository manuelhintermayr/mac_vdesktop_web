<?php
// Extracted teacher timetables from the main timetable data

$mockTimetablesTeachers = [
    'ABC' => [
        'monday' => [
            ['time' => '8:00-8:50', 'subject' => 'PHY', 'class' => '3BHIF', 'room' => 'B101'],
            ['time' => '8:50-9:40', 'subject' => 'PHY', 'class' => '3BHIF', 'room' => 'B101']
        ],
        'wednesday' => [
            ['time' => '10:40-11:30', 'subject' => 'PHY', 'class' => '3BHIF', 'room' => 'B101']
        ]
    ],
    'DEF' => [
        'tuesday' => [
            ['time' => '9:50-10:40', 'subject' => 'CHE', 'class' => '2AHIF', 'room' => 'C201'],
            ['time' => '10:40-11:30', 'subject' => 'CHE', 'class' => '2AHIF', 'room' => 'C201']
        ],
        'thursday' => [
            ['time' => '11:40-12:30', 'subject' => 'CHE', 'class' => '2AHIF', 'room' => 'C201']
        ]
    ],
    'FIS' => [
        'monday' => [
            ['time' => '14:15-15:05', 'subject' => 'DBI', 'class' => '5AHIF', 'room' => 'C107'],
            ['time' => '15:05-15:55', 'subject' => 'DBI', 'class' => '5AHIF', 'room' => 'C107']
        ],
        'wednesday' => [
            ['time' => '9:50-10:40', 'subject' => 'DBI', 'class' => '5AHIF', 'room' => 'C107'],
            ['time' => '10:40-11:30', 'subject' => 'DBI', 'class' => '5AHIF', 'room' => 'C107']
        ]
    ],
    'GHI' => [
        'monday' => [
            ['time' => '13:30-14:20', 'subject' => 'BIO', 'class' => '1AHIF', 'room' => 'A102']
        ],
        'friday' => [
            ['time' => '8:00-8:50', 'subject' => 'BIO', 'class' => '1AHIF', 'room' => 'A102']
        ]
    ],
    'JKL' => [
        'wednesday' => [
            ['time' => '9:50-10:40', 'subject' => 'GES', 'class' => '4BHIF', 'room' => 'B202']
        ],
        'thursday' => [
            ['time' => '8:00-8:50', 'subject' => 'GES', 'class' => '4BHIF', 'room' => 'B202']
        ]
    ],
    'JOH' => [
        'monday' => [
            ['time' => '11:35-12:25', 'subject' => 'ENG', 'class' => '5AHIF', 'room' => 'B304'],
            ['time' => '12:25-13:15', 'subject' => 'ENG', 'class' => '5AHIF', 'room' => 'B304']
        ],
        'wednesday' => [
            ['time' => '11:40-12:30', 'subject' => 'ENG', 'class' => '5AHIF', 'room' => 'B304'],
            ['time' => '12:30-13:20', 'subject' => 'ENG', 'class' => '5AHIF', 'room' => 'B304']
        ]
    ],
    'MNO' => [
        'tuesday' => [
            ['time' => '14:15-15:05', 'subject' => 'INF', 'class' => '2BHIF', 'room' => 'C301']
        ],
        'friday' => [
            ['time' => '10:35-11:25', 'subject' => 'INF', 'class' => '2BHIF', 'room' => 'C301']
        ]
    ],
    'MUL' => [
        'monday' => [
            ['time' => '9:45-10:35', 'subject' => 'PRG', 'class' => '5AHIF', 'room' => 'C105'],
            ['time' => '10:35-11:25', 'subject' => 'PRG', 'class' => '5AHIF', 'room' => 'C105']
        ],
        'tuesday' => [
            ['time' => '8:00-8:50', 'subject' => 'PRG', 'class' => '5AHIF', 'room' => 'C105'],
            ['time' => '8:50-9:40', 'subject' => 'PRG', 'class' => '5AHIF', 'room' => 'C105']
        ],
        'friday' => [
            ['time' => '11:40-12:30', 'subject' => 'PRG', 'class' => '5AHIF', 'room' => 'C105'],
            ['time' => '12:30-13:20', 'subject' => 'PRG', 'class' => '5AHIF', 'room' => 'C105']
        ]
    ],
    'PQR' => [
        'monday' => [
            ['time' => '11:35-12:25', 'subject' => 'GEO', 'class' => '3AHIF', 'room' => 'A203']
        ],
        'thursday' => [
            ['time' => '13:30-14:20', 'subject' => 'GEO', 'class' => '3AHIF', 'room' => 'A203']
        ]
    ],
    'SCH' => [
        'monday' => [
            ['time' => '7:55-8:45', 'subject' => 'MAT', 'class' => '5AHIF', 'room' => 'A201'],
            ['time' => '8:45-9:35', 'subject' => 'MAT', 'class' => '5AHIF', 'room' => 'A201']
        ],
        'thursday' => [
            ['time' => '8:00-8:50', 'subject' => 'MAT', 'class' => '5AHIF', 'room' => 'A201'],
            ['time' => '8:50-9:40', 'subject' => 'MAT', 'class' => '5AHIF', 'room' => 'A201']
        ],
        'friday' => [
            ['time' => '13:30-14:20', 'subject' => 'MAT', 'class' => '5AHIF', 'room' => 'A201'],
            ['time' => '14:20-15:10', 'subject' => 'MAT', 'class' => '5AHIF', 'room' => 'A201']
        ]
    ],
    'STU' => [
        'tuesday' => [
            ['time' => '8:00-8:50', 'subject' => 'REL', 'class' => '1BHIF', 'room' => 'B104']
        ],
        'friday' => [
            ['time' => '14:20-15:10', 'subject' => 'REL', 'class' => '1BHIF', 'room' => 'B104']
        ]
    ],
    'VWX' => [
        'wednesday' => [
            ['time' => '12:30-13:20', 'subject' => 'SP', 'class' => '2AHIF', 'room' => 'Turnsaal']
        ],
        'thursday' => [
            ['time' => '15:05-15:55', 'subject' => 'SP', 'class' => '2AHIF', 'room' => 'Turnsaal']
        ]
    ],
    'WEB' => [
        'monday' => [
            ['time' => '16:05-16:55', 'subject' => 'OS', 'class' => '5AHIF', 'room' => 'C109'],
            ['time' => '16:55-17:45', 'subject' => 'OS', 'class' => '5AHIF', 'room' => 'C109']
        ],
        'tuesday' => [
            ['time' => '9:50-10:40', 'subject' => 'WEB', 'class' => '5AHIF', 'room' => 'A201'],
            ['time' => '10:40-11:30', 'subject' => 'WEB', 'class' => '5AHIF', 'room' => 'A201']
        ],
        'thursday' => [
            ['time' => '9:50-10:40', 'subject' => 'OS', 'class' => '5AHIF', 'room' => 'C109'],
            ['time' => '10:40-11:30', 'subject' => 'OS', 'class' => '5AHIF', 'room' => 'C109']
        ]
    ],
    'YZA' => [
        'monday' => [
            ['time' => '16:05-16:55', 'subject' => 'MUS', 'class' => '1AHIF', 'room' => 'Musiksaal']
        ],
        'friday' => [
            ['time' => '9:45-10:35', 'subject' => 'MUS', 'class' => '1AHIF', 'room' => 'Musiksaal']
        ]
    ]
];
?>