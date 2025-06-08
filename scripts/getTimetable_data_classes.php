<?php
// Extracted class timetables from the main timetable data

$mockTimetablesClasses = [
    // 1AHIF timetable
    '1AHIF' => [
        'monday' => [
            ['time' => '8:00-8:50', 'subject' => 'PRG', 'teacher' => 'ABC', 'room' => 'A1.01'],
            ['time' => '8:50-9:40', 'subject' => 'DBS', 'teacher' => 'DEF', 'room' => 'A2.15'],
            ['time' => '9:50-10:40', 'subject' => 'NWT', 'teacher' => 'GHI', 'room' => 'B3.22'],
            ['time' => '10:40-11:30', 'subject' => 'SYP', 'teacher' => 'JKL', 'room' => 'C1.04'],
            ['time' => '11:40-12:30', 'subject' => 'ENG', 'teacher' => 'MNO', 'room' => 'D2.08'],
            ['time' => '12:30-13:20', 'subject' => 'DEU', 'teacher' => 'PQR', 'room' => 'A1.01']
        ],
        'tuesday' => [
            ['time' => '9:50-10:40', 'subject' => 'MAT', 'teacher' => 'STU', 'room' => 'A2.15'],
            ['time' => '10:40-11:30', 'subject' => 'MAT', 'teacher' => 'STU', 'room' => 'A2.15'],
            ['time' => '11:40-12:30', 'subject' => 'BWM', 'teacher' => 'VWX', 'room' => 'D2.08'],
            ['time' => '12:30-13:20', 'subject' => 'BWM', 'teacher' => 'VWX', 'room' => 'D2.08'],
            ['time' => '13:30-14:20', 'subject' => 'PRG', 'teacher' => 'ABC', 'room' => 'B3.22'],
            ['time' => '14:20-15:10', 'subject' => 'PRG', 'teacher' => 'ABC', 'room' => 'B3.22']
        ],
        'wednesday' => [
            ['time' => '8:00-8:50', 'subject' => 'DBS', 'teacher' => 'DEF', 'room' => 'C1.04'],
            ['time' => '8:50-9:40', 'subject' => 'DBS', 'teacher' => 'DEF', 'room' => 'C1.04'],
            ['time' => '9:50-10:40', 'subject' => 'ENG', 'teacher' => 'MNO', 'room' => 'D2.08'],
            ['time' => '10:40-11:30', 'subject' => 'ENG', 'teacher' => 'MNO', 'room' => 'D2.08']
        ],
        'thursday' => [
            ['time' => '10:40-11:30', 'subject' => 'SYP', 'teacher' => 'JKL', 'room' => 'A1.01'],
            ['time' => '11:40-12:30', 'subject' => 'SYP', 'teacher' => 'JKL', 'room' => 'A1.01'],
            ['time' => '12:30-13:20', 'subject' => 'NWT', 'teacher' => 'GHI', 'room' => 'B3.22'],
            ['time' => '13:30-14:20', 'subject' => 'NWT', 'teacher' => 'GHI', 'room' => 'B3.22'],
            ['time' => '14:20-15:10', 'subject' => 'DEU', 'teacher' => 'PQR', 'room' => 'A2.15']
        ],
        'friday' => [
            ['time' => '8:00-8:50', 'subject' => 'MAT', 'teacher' => 'STU', 'room' => 'C1.04'],
            ['time' => '8:50-9:40', 'subject' => 'MAT', 'teacher' => 'STU', 'room' => 'C1.04'],
            ['time' => '9:50-10:40', 'subject' => 'BWM', 'teacher' => 'VWX', 'room' => 'D2.08'],
            ['time' => '10:40-11:30', 'subject' => 'BWM', 'teacher' => 'VWX', 'room' => 'D2.08']
        ]
    ],
    
    // 1BHIF timetable
    '1BHIF' => [
        'monday' => [
            ['time' => '8:50-9:40', 'subject' => 'DBS', 'teacher' => 'DEF', 'room' => 'B3.22'],
            ['time' => '9:50-10:40', 'subject' => 'DBS', 'teacher' => 'DEF', 'room' => 'B3.22'],
            ['time' => '10:40-11:30', 'subject' => 'NWT', 'teacher' => 'GHI', 'room' => 'A1.01'],
            ['time' => '11:40-12:30', 'subject' => 'NWT', 'teacher' => 'GHI', 'room' => 'A1.01']
        ],
        'tuesday' => [
            ['time' => '8:00-8:50', 'subject' => 'PRG', 'teacher' => 'ABC', 'room' => 'C1.04'],
            ['time' => '8:50-9:40', 'subject' => 'PRG', 'teacher' => 'ABC', 'room' => 'C1.04'],
            ['time' => '9:50-10:40', 'subject' => 'ENG', 'teacher' => 'MNO', 'room' => 'A2.15'],
            ['time' => '10:40-11:30', 'subject' => 'ENG', 'teacher' => 'MNO', 'room' => 'A2.15'],
            ['time' => '11:40-12:30', 'subject' => 'DEU', 'teacher' => 'PQR', 'room' => 'D2.08']
        ],
        'wednesday' => [
            ['time' => '10:40-11:30', 'subject' => 'MAT', 'teacher' => 'STU', 'room' => 'A1.01'],
            ['time' => '11:40-12:30', 'subject' => 'MAT', 'teacher' => 'STU', 'room' => 'A1.01'],
            ['time' => '12:30-13:20', 'subject' => 'SYP', 'teacher' => 'JKL', 'room' => 'C1.04'],
            ['time' => '13:30-14:20', 'subject' => 'SYP', 'teacher' => 'JKL', 'room' => 'C1.04'],
            ['time' => '14:20-15:10', 'subject' => 'SYP', 'teacher' => 'JKL', 'room' => 'C1.04']
        ],
        'thursday' => [
            ['time' => '8:00-8:50', 'subject' => 'BWM', 'teacher' => 'YZA', 'room' => 'B3.22'],
            ['time' => '8:50-9:40', 'subject' => 'BWM', 'teacher' => 'YZA', 'room' => 'B3.22'],
            ['time' => '9:50-10:40', 'subject' => 'DEU', 'teacher' => 'PQR', 'room' => 'A2.15'],
            ['time' => '10:40-11:30', 'subject' => 'DEU', 'teacher' => 'PQR', 'room' => 'A2.15'],
            ['time' => '11:40-12:30', 'subject' => 'PRG', 'teacher' => 'ABC', 'room' => 'D2.08']
        ],
        'friday' => [
            ['time' => '11:40-12:30', 'subject' => 'ENG', 'teacher' => 'MNO', 'room' => 'C1.04'],
            ['time' => '12:30-13:20', 'subject' => 'ENG', 'teacher' => 'MNO', 'room' => 'C1.04'],
            ['time' => '13:30-14:20', 'subject' => 'MAT', 'teacher' => 'STU', 'room' => 'A2.15'],
            ['time' => '14:20-15:10', 'subject' => 'MAT', 'teacher' => 'STU', 'room' => 'A2.15']
        ]
    ],
    
    // 1CHIF timetable
    '1CHIF' => [
        'monday' => [
            ['time' => '9:50-10:40', 'subject' => 'ENG', 'teacher' => 'MNO', 'room' => 'A1.01'],
            ['time' => '10:40-11:30', 'subject' => 'ENG', 'teacher' => 'MNO', 'room' => 'A1.01'],
            ['time' => '11:40-12:30', 'subject' => 'MAT', 'teacher' => 'STU', 'room' => 'B3.22'],
            ['time' => '12:30-13:20', 'subject' => 'MAT', 'teacher' => 'STU', 'room' => 'B3.22']
        ],
        'tuesday' => [
            ['time' => '10:40-11:30', 'subject' => 'BWM', 'teacher' => 'YZA', 'room' => 'C1.04'],
            ['time' => '11:40-12:30', 'subject' => 'BWM', 'teacher' => 'YZA', 'room' => 'C1.04'],
            ['time' => '12:30-13:20', 'subject' => 'DBS', 'teacher' => 'DEF', 'room' => 'A2.15'],
            ['time' => '13:30-14:20', 'subject' => 'DBS', 'teacher' => 'DEF', 'room' => 'A2.15']
        ],
        'wednesday' => [
            ['time' => '8:00-8:50', 'subject' => 'PRG', 'teacher' => 'ABC', 'room' => 'D2.08'],
            ['time' => '8:50-9:40', 'subject' => 'PRG', 'teacher' => 'ABC', 'room' => 'D2.08'],
            ['time' => '9:50-10:40', 'subject' => 'SYP', 'teacher' => 'JKL', 'room' => 'A1.01'],
            ['time' => '10:40-11:30', 'subject' => 'SYP', 'teacher' => 'JKL', 'room' => 'A1.01'],
            ['time' => '11:40-12:30', 'subject' => 'DEU', 'teacher' => 'PQR', 'room' => 'B3.22']
        ],
        'thursday' => [
            ['time' => '12:30-13:20', 'subject' => 'NWT', 'teacher' => 'GHI', 'room' => 'C1.04'],
            ['time' => '13:30-14:20', 'subject' => 'NWT', 'teacher' => 'GHI', 'room' => 'C1.04'],
            ['time' => '14:20-15:10', 'subject' => 'PRG', 'teacher' => 'ABC', 'room' => 'A2.15'],
            ['time' => '15:20-16:10', 'subject' => 'PRG', 'teacher' => 'ABC', 'room' => 'A2.15']
        ],
        'friday' => [
            ['time' => '8:00-8:50', 'subject' => 'DBS', 'teacher' => 'DEF', 'room' => 'D2.08'],
            ['time' => '8:50-9:40', 'subject' => 'NWT', 'teacher' => 'GHI', 'room' => 'D2.08'],
            ['time' => '9:50-10:40', 'subject' => 'DEU', 'teacher' => 'PQR', 'room' => 'A1.01'],
            ['time' => '10:40-11:30', 'subject' => 'ENG', 'teacher' => 'MNO', 'room' => 'B3.22']
        ]
    ],
    
    // 1DHIF timetable
    '1DHIF' => [
        'monday' => [
            ['time' => '8:00-8:50', 'subject' => 'MAT', 'teacher' => 'STU', 'room' => 'A2.15'],
            ['time' => '8:50-9:40', 'subject' => 'MAT', 'teacher' => 'STU', 'room' => 'A2.15'],
            ['time' => '9:50-10:40', 'subject' => 'DEU', 'teacher' => 'PQR', 'room' => 'C1.04'],
            ['time' => '10:40-11:30', 'subject' => 'DEU', 'teacher' => 'PQR', 'room' => 'C1.04']
        ],
        'tuesday' => [
            ['time' => '12:30-13:20', 'subject' => 'PRG', 'teacher' => 'ABC', 'room' => 'D2.08'],
            ['time' => '13:30-14:20', 'subject' => 'PRG', 'teacher' => 'ABC', 'room' => 'D2.08'],
            ['time' => '14:20-15:10', 'subject' => 'PRG', 'teacher' => 'ABC', 'room' => 'D2.08'],
            ['time' => '15:20-16:10', 'subject' => 'SYP', 'teacher' => 'JKL', 'room' => 'A1.01']
        ],
        'wednesday' => [
            ['time' => '8:50-9:40', 'subject' => 'BWM', 'teacher' => 'YZA', 'room' => 'B3.22'],
            ['time' => '9:50-10:40', 'subject' => 'BWM', 'teacher' => 'YZA', 'room' => 'B3.22'],
            ['time' => '10:40-11:30', 'subject' => 'BWM', 'teacher' => 'YZA', 'room' => 'B3.22'],
            ['time' => '11:40-12:30', 'subject' => 'DBS', 'teacher' => 'DEF', 'room' => 'A2.15'],
            ['time' => '12:30-13:20', 'subject' => 'DBS', 'teacher' => 'DEF', 'room' => 'A2.15']
        ],
        'thursday' => [
            ['time' => '9:50-10:40', 'subject' => 'ENG', 'teacher' => 'MNO', 'room' => 'C1.04'],
            ['time' => '10:40-11:30', 'subject' => 'ENG', 'teacher' => 'MNO', 'room' => 'C1.04'],
            ['time' => '11:40-12:30', 'subject' => 'NWT', 'teacher' => 'GHI', 'room' => 'D2.08'],
            ['time' => '12:30-13:20', 'subject' => 'NWT', 'teacher' => 'GHI', 'room' => 'D2.08']
        ],
        'friday' => [
            ['time' => '11:40-12:30', 'subject' => 'SYP', 'teacher' => 'JKL', 'room' => 'A1.01'],
            ['time' => '12:30-13:20', 'subject' => 'SYP', 'teacher' => 'JKL', 'room' => 'A1.01'],
            ['time' => '13:30-14:20', 'subject' => 'DEU', 'teacher' => 'PQR', 'room' => 'B3.22'],
            ['time' => '14:20-15:10', 'subject' => 'MAT', 'teacher' => 'STU', 'room' => 'C1.04']
        ]
    ],
    
    // Adding entries for the higher grades with more specialized subjects
    '2AVIF' => [
        'monday' => [
            ['time' => '8:00-8:50', 'subject' => 'OOP', 'teacher' => 'ABC', 'room' => 'A1.01'],
            ['time' => '8:50-9:40', 'subject' => 'OOP', 'teacher' => 'ABC', 'room' => 'A1.01'],
            ['time' => '9:50-10:40', 'subject' => 'DBI', 'teacher' => 'DEF', 'room' => 'A2.15'],
            ['time' => '10:40-11:30', 'subject' => 'DBI', 'teacher' => 'DEF', 'room' => 'A2.15'],
            ['time' => '11:40-12:30', 'subject' => 'ENG', 'teacher' => 'MNO', 'room' => 'B3.22']
        ],
        'tuesday' => [
            ['time' => '9:50-10:40', 'subject' => 'MAT', 'teacher' => 'STU', 'room' => 'C1.04'],
            ['time' => '10:40-11:30', 'subject' => 'MAT', 'teacher' => 'STU', 'room' => 'C1.04'],
            ['time' => '11:40-12:30', 'subject' => 'DEU', 'teacher' => 'PQR', 'room' => 'D2.08'],
            ['time' => '12:30-13:20', 'subject' => 'DEU', 'teacher' => 'PQR', 'room' => 'D2.08'],
            ['time' => '13:30-14:20', 'subject' => 'WEB', 'teacher' => 'GHI', 'room' => 'A1.01'],
            ['time' => '14:20-15:10', 'subject' => 'WEB', 'teacher' => 'GHI', 'room' => 'A1.01']
        ],
        'wednesday' => [
            ['time' => '8:00-8:50', 'subject' => 'OOP', 'teacher' => 'ABC', 'room' => 'A2.15'],
            ['time' => '8:50-9:40', 'subject' => 'OOP', 'teacher' => 'ABC', 'room' => 'A2.15'],
            ['time' => '9:50-10:40', 'subject' => 'PRJ', 'teacher' => 'JKL', 'room' => 'B3.22'],
            ['time' => '10:40-11:30', 'subject' => 'PRJ', 'teacher' => 'JKL', 'room' => 'B3.22'],
            ['time' => '11:40-12:30', 'subject' => 'PRJ', 'teacher' => 'JKL', 'room' => 'B3.22']
        ],
        'thursday' => [
            ['time' => '11:40-12:30', 'subject' => 'WEB', 'teacher' => 'GHI', 'room' => 'C1.04'],
            ['time' => '12:30-13:20', 'subject' => 'WEB', 'teacher' => 'GHI', 'room' => 'C1.04'],
            ['time' => '13:30-14:20', 'subject' => 'BWM', 'teacher' => 'YZA', 'room' => 'D2.08'],
            ['time' => '14:20-15:10', 'subject' => 'BWM', 'teacher' => 'YZA', 'room' => 'D2.08'],
            ['time' => '15:20-16:10', 'subject' => 'BWM', 'teacher' => 'YZA', 'room' => 'D2.08']
        ],
        'friday' => [
            ['time' => '8:50-9:40', 'subject' => 'DBI', 'teacher' => 'DEF', 'room' => 'A1.01'],
            ['time' => '9:50-10:40', 'subject' => 'DBI', 'teacher' => 'DEF', 'room' => 'A1.01'],
            ['time' => '10:40-11:30', 'subject' => 'ENG', 'teacher' => 'MNO', 'room' => 'A2.15'],
            ['time' => '11:40-12:30', 'subject' => 'ENG', 'teacher' => 'MNO', 'room' => 'A2.15']
        ]
    ],
    
    '2BVIF' => [
        'monday' => [
            ['time' => '8:00-8:50', 'subject' => 'PRG', 'teacher' => 'ABC', 'room' => 'A1.01'],
            ['time' => '8:50-9:40', 'subject' => 'PRG', 'teacher' => 'ABC', 'room' => 'A1.01'],
            ['time' => '9:50-10:40', 'subject' => 'DBS', 'teacher' => 'DEF', 'room' => 'A2.15'],
            ['time' => '10:40-11:30', 'subject' => 'DBS', 'teacher' => 'DEF', 'room' => 'A2.15'],
            // Lunch break
            ['time' => '12:30-13:20', 'subject' => 'MAT', 'teacher' => 'STU', 'room' => 'B3.22'],
            ['time' => '13:30-14:20', 'subject' => 'MAT', 'teacher' => 'STU', 'room' => 'B3.22'],
            ['time' => '14:20-15:10', 'subject' => 'ENG', 'teacher' => 'MNO', 'room' => 'C1.04']
        ],
        'tuesday' => [
            ['time' => '9:50-10:40', 'subject' => 'NWT', 'teacher' => 'GHI', 'room' => 'D2.08'],
            ['time' => '10:40-11:30', 'subject' => 'NWT', 'teacher' => 'GHI', 'room' => 'D2.08'],
            ['time' => '11:40-12:30', 'subject' => 'BWM', 'teacher' => 'VWX', 'room' => 'A1.01'],
            // Lunch break
            ['time' => '13:30-14:20', 'subject' => 'SYP', 'teacher' => 'JKL', 'room' => 'A2.15'],
            ['time' => '14:20-15:10', 'subject' => 'SYP', 'teacher' => 'JKL', 'room' => 'A2.15']
        ],
        'wednesday' => [
            ['time' => '8:00-8:50', 'subject' => 'DEU', 'teacher' => 'PQR', 'room' => 'B3.22'],
            ['time' => '8:50-9:40', 'subject' => 'DEU', 'teacher' => 'PQR', 'room' => 'B3.22'],
            ['time' => '9:50-10:40', 'subject' => 'MAT', 'teacher' => 'STU', 'room' => 'C1.04'],
            // Lunch break
            ['time' => '12:30-13:20', 'subject' => 'PRG', 'teacher' => 'ABC', 'room' => 'A1.01'],
            ['time' => '13:30-14:20', 'subject' => 'PRG', 'teacher' => 'ABC', 'room' => 'A1.01']
        ],
        'thursday' => [
            ['time' => '10:40-11:30', 'subject' => 'DBS', 'teacher' => 'DEF', 'room' => 'A2.15'],
            ['time' => '11:40-12:30', 'subject' => 'DBS', 'teacher' => 'DEF', 'room' => 'A2.15'],
            // Lunch break
            ['time' => '13:30-14:20', 'subject' => 'NWT', 'teacher' => 'GHI', 'room' => 'D2.08'],
            ['time' => '14:20-15:10', 'subject' => 'NWT', 'teacher' => 'GHI', 'room' => 'D2.08'],
            ['time' => '15:20-16:10', 'subject' => 'ENG', 'teacher' => 'MNO', 'room' => 'C1.04']
        ],
        'friday' => [
            ['time' => '9:50-10:40', 'subject' => 'BWM', 'teacher' => 'VWX', 'room' => 'A1.01'],
            ['time' => '10:40-11:30', 'subject' => 'BWM', 'teacher' => 'VWX', 'room' => 'A1.01'],
            // Lunch break
            ['time' => '12:30-13:20', 'subject' => 'SYP', 'teacher' => 'JKL', 'room' => 'A2.15'],
            ['time' => '13:30-14:20', 'subject' => 'SYP', 'teacher' => 'JKL', 'room' => 'A2.15'],
            ['time' => '14:20-15:10', 'subject' => 'MAT', 'teacher' => 'STU', 'room' => 'B3.22']
        ]
    ],
    '2CVIF' => [
        'monday' => [
            ['time' => '8:50-9:40', 'subject' => 'DBS', 'teacher' => 'DEF', 'room' => 'A2.15'],
            ['time' => '9:50-10:40', 'subject' => 'DBS', 'teacher' => 'DEF', 'room' => 'A2.15'],
            ['time' => '10:40-11:30', 'subject' => 'PRG', 'teacher' => 'ABC', 'room' => 'C1.04'],
            // Lunch break
            ['time' => '12:30-13:20', 'subject' => 'MAT', 'teacher' => 'STU', 'room' => 'B3.22'],
            ['time' => '13:30-14:20', 'subject' => 'MAT', 'teacher' => 'STU', 'room' => 'B3.22']
        ],
        'tuesday' => [
            ['time' => '8:00-8:50', 'subject' => 'ENG', 'teacher' => 'MNO', 'room' => 'D2.08'],
            ['time' => '8:50-9:40', 'subject' => 'ENG', 'teacher' => 'MNO', 'room' => 'D2.08'],
            ['time' => '9:50-10:40', 'subject' => 'SYP', 'teacher' => 'JKL', 'room' => 'A1.01'],
            // Lunch break
            ['time' => '12:30-13:20', 'subject' => 'NWT', 'teacher' => 'GHI', 'room' => 'C1.04']
        ],
        'wednesday' => [
            ['time' => '10:40-11:30', 'subject' => 'DEU', 'teacher' => 'PQR', 'room' => 'B3.22'],
            ['time' => '11:40-12:30', 'subject' => 'DEU', 'teacher' => 'PQR', 'room' => 'B3.22'],
            // Lunch break
            ['time' => '13:30-14:20', 'subject' => 'BWM', 'teacher' => 'YZA', 'room' => 'A2.15'],
            ['time' => '14:20-15:10', 'subject' => 'BWM', 'teacher' => 'YZA', 'room' => 'A2.15']
        ],
        'thursday' => [
            ['time' => '8:00-8:50', 'subject' => 'PRG', 'teacher' => 'ABC', 'room' => 'A1.01'],
            ['time' => '8:50-9:40', 'subject' => 'PRG', 'teacher' => 'ABC', 'room' => 'A1.01'],
            // Lunch break
            ['time' => '10:40-11:30', 'subject' => 'MAT', 'teacher' => 'STU', 'room' => 'B3.22'],
            ['time' => '11:40-12:30', 'subject' => 'MAT', 'teacher' => 'STU', 'room' => 'B3.22']
        ],
        'friday' => [
            ['time' => '9:50-10:40', 'subject' => 'ENG', 'teacher' => 'MNO', 'room' => 'C1.04'],
            ['time' => '10:40-11:30', 'subject' => 'ENG', 'teacher' => 'MNO', 'room' => 'C1.04'],
            // Lunch break
            ['time' => '12:30-13:20', 'subject' => 'SYP', 'teacher' => 'JKL', 'room' => 'A1.01'],
            ['time' => '13:30-14:20', 'subject' => 'SYP', 'teacher' => 'JKL', 'room' => 'A1.01']
        ]
    ],
    '4ABIF' => [
        'monday' => [
            ['time' => '8:00-8:50', 'subject' => 'SYP', 'teacher' => 'JKL', 'room' => 'C1.04'],
            ['time' => '8:50-9:40', 'subject' => 'SYP', 'teacher' => 'JKL', 'room' => 'C1.04'],
            ['time' => '9:50-10:40', 'subject' => 'NWT', 'teacher' => 'GHI', 'room' => 'B3.22'],
            // Lunch break
            ['time' => '11:40-12:30', 'subject' => 'DBS', 'teacher' => 'DEF', 'room' => 'A2.15'],
            ['time' => '12:30-13:20', 'subject' => 'DBS', 'teacher' => 'DEF', 'room' => 'A2.15']
        ],
        'tuesday' => [
            ['time' => '10:40-11:30', 'subject' => 'PRG', 'teacher' => 'ABC', 'room' => 'A1.01'],
            ['time' => '11:40-12:30', 'subject' => 'PRG', 'teacher' => 'ABC', 'room' => 'A1.01'],
            // Lunch break
            ['time' => '13:30-14:20', 'subject' => 'MAT', 'teacher' => 'STU', 'room' => 'C1.04'],
            ['time' => '14:20-15:10', 'subject' => 'MAT', 'teacher' => 'STU', 'room' => 'C1.04']
        ],
        'wednesday' => [
            ['time' => '8:00-8:50', 'subject' => 'ENG', 'teacher' => 'MNO', 'room' => 'D2.08'],
            ['time' => '8:50-9:40', 'subject' => 'ENG', 'teacher' => 'MNO', 'room' => 'D2.08'],
            // Lunch break
            ['time' => '10:40-11:30', 'subject' => 'BWM', 'teacher' => 'YZA', 'room' => 'B3.22'],
            ['time' => '11:40-12:30', 'subject' => 'BWM', 'teacher' => 'YZA', 'room' => 'B3.22']
        ],
        'thursday' => [
            ['time' => '9:50-10:40', 'subject' => 'DEU', 'teacher' => 'PQR', 'room' => 'A2.15'],
            ['time' => '10:40-11:30', 'subject' => 'DEU', 'teacher' => 'PQR', 'room' => 'A2.15'],
            // Lunch break
            ['time' => '12:30-13:20', 'subject' => 'SYP', 'teacher' => 'JKL', 'room' => 'C1.04'],
            ['time' => '13:30-14:20', 'subject' => 'SYP', 'teacher' => 'JKL', 'room' => 'C1.04']
        ],
        'friday' => [
            ['time' => '8:00-8:50', 'subject' => 'MAT', 'teacher' => 'STU', 'room' => 'C1.04'],
            ['time' => '8:50-9:40', 'subject' => 'MAT', 'teacher' => 'STU', 'room' => 'C1.04'],
            // Lunch break
            ['time' => '10:40-11:30', 'subject' => 'PRG', 'teacher' => 'ABC', 'room' => 'A1.01'],
            ['time' => '11:40-12:30', 'subject' => 'PRG', 'teacher' => 'ABC', 'room' => 'A1.01']
        ]
    ],
    '4BBIF' => [
        'monday' => [
            ['time' => '9:50-10:40', 'subject' => 'NWT', 'teacher' => 'GHI', 'room' => 'B3.22'],
            ['time' => '10:40-11:30', 'subject' => 'NWT', 'teacher' => 'GHI', 'room' => 'B3.22'],
            // Lunch break
            ['time' => '12:30-13:20', 'subject' => 'BWM', 'teacher' => 'YZA', 'room' => 'C1.04'],
            ['time' => '13:30-14:20', 'subject' => 'BWM', 'teacher' => 'YZA', 'room' => 'C1.04']
        ],
        'tuesday' => [
            ['time' => '8:00-8:50', 'subject' => 'SYP', 'teacher' => 'JKL', 'room' => 'C1.04'],
            ['time' => '8:50-9:40', 'subject' => 'SYP', 'teacher' => 'JKL', 'room' => 'C1.04'],
            // Lunch break
            ['time' => '10:40-11:30', 'subject' => 'ENG', 'teacher' => 'MNO', 'room' => 'D2.08'],
            ['time' => '11:40-12:30', 'subject' => 'ENG', 'teacher' => 'MNO', 'room' => 'D2.08']
        ],
        'wednesday' => [
            ['time' => '9:50-10:40', 'subject' => 'DEU', 'teacher' => 'PQR', 'room' => 'A2.15'],
            ['time' => '10:40-11:30', 'subject' => 'DEU', 'teacher' => 'PQR', 'room' => 'A2.15'],
            // Lunch break
            ['time' => '12:30-13:20', 'subject' => 'PRG', 'teacher' => 'ABC', 'room' => 'A1.01'],
            ['time' => '13:30-14:20', 'subject' => 'PRG', 'teacher' => 'ABC', 'room' => 'A1.01']
        ],
        'thursday' => [
            ['time' => '8:00-8:50', 'subject' => 'ENG', 'teacher' => 'MNO', 'room' => 'D2.08'],
            ['time' => '8:50-9:40', 'subject' => 'ENG', 'teacher' => 'MNO', 'room' => 'D2.08'],
            // Lunch break
            ['time' => '10:40-11:30', 'subject' => 'BWM', 'teacher' => 'YZA', 'room' => 'C1.04'],
            ['time' => '11:40-12:30', 'subject' => 'BWM', 'teacher' => 'YZA', 'room' => 'C1.04']
        ],
        'friday' => [
            ['time' => '9:50-10:40', 'subject' => 'SYP', 'teacher' => 'JKL', 'room' => 'A1.01'],
            ['time' => '10:40-11:30', 'subject' => 'SYP', 'teacher' => 'JKL', 'room' => 'A1.01'],
            // Lunch break
            ['time' => '12:30-13:20', 'subject' => 'MAT', 'teacher' => 'STU', 'room' => 'B3.22'],
            ['time' => '13:30-14:20', 'subject' => 'MAT', 'teacher' => 'STU', 'room' => 'B3.22']
        ]
    ],
    // 5AHIF timetable with the provided Monday schedule
    '5AHIF' => [
        'monday' => [
            // 07:55-08:45 → 8:00-8:50 (Mathematics)
            ['time' => '8:00-8:50', 'subject' => 'MAT', 'teacher' => 'SCH', 'room' => 'A201'],
            // 08:45-09:35 → 8:50-9:40 (Mathematics)
            ['time' => '8:50-9:40', 'subject' => 'MAT', 'teacher' => 'SCH', 'room' => 'A201'],
            // 09:45-10:35 → 9:50-10:40 (Programming)
            ['time' => '9:50-10:40', 'subject' => 'PRG', 'teacher' => 'MUL', 'room' => 'C105'],
            // 10:35-11:25 → 10:40-11:30 (Programming)
            ['time' => '10:40-11:30', 'subject' => 'PRG', 'teacher' => 'MUL', 'room' => 'C105'],
            // 11:35-12:25 → 11:40-12:30 (English)
            ['time' => '11:40-12:30', 'subject' => 'ENG', 'teacher' => 'JOH', 'room' => 'B304'],
            // 12:25-13:15 → 12:30-13:20 (English)
            ['time' => '12:30-13:20', 'subject' => 'ENG', 'teacher' => 'JOH', 'room' => 'B304'],
            // 14:15-15:05 → 14:20-15:10 (Databases)
            ['time' => '14:20-15:10', 'subject' => 'DBS', 'teacher' => 'FIS', 'room' => 'C107'],
            // 15:05-15:55 → 15:20-16:10 (Databases)
            ['time' => '15:20-16:10', 'subject' => 'DBS', 'teacher' => 'FIS', 'room' => 'C107'],
            // 16:05-16:55 → 16:05-16:55 (Operating Systems)
            ['time' => '16:05-16:55', 'subject' => 'OSY', 'teacher' => 'WEB', 'room' => 'C109'],
            // 16:55-17:45 → 16:55-17:45 (Operating Systems)
            ['time' => '16:55-17:45', 'subject' => 'OSY', 'teacher' => 'WEB', 'room' => 'C109']
        ],
        'tuesday' => [
            // Add some placeholder data for other days
            ['time' => '8:00-8:50', 'subject' => 'PRG', 'teacher' => 'MUL', 'room' => 'C105'],
            ['time' => '8:50-9:40', 'subject' => 'PRG', 'teacher' => 'MUL', 'room' => 'C105'],
            ['time' => '9:50-10:40', 'subject' => 'WEB', 'teacher' => 'GHI', 'room' => 'A201'],
            ['time' => '10:40-11:30', 'subject' => 'WEB', 'teacher' => 'GHI', 'room' => 'A201']
        ],
        'wednesday' => [
            ['time' => '9:50-10:40', 'subject' => 'DBI', 'teacher' => 'FIS', 'room' => 'C107'],
            ['time' => '10:40-11:30', 'subject' => 'DBI', 'teacher' => 'FIS', 'room' => 'C107'],
            ['time' => '11:40-12:30', 'subject' => 'ENG', 'teacher' => 'JOH', 'room' => 'B304'],
            ['time' => '12:30-13:20', 'subject' => 'ENG', 'teacher' => 'JOH', 'room' => 'B304']
        ],
        'thursday' => [
            ['time' => '8:00-8:50', 'subject' => 'MAT', 'teacher' => 'SCH', 'room' => 'A201'],
            ['time' => '8:50-9:40', 'subject' => 'MAT', 'teacher' => 'SCH', 'room' => 'A201'],
            ['time' => '9:50-10:40', 'subject' => 'OSY', 'teacher' => 'WEB', 'room' => 'C109'],
            ['time' => '10:40-11:30', 'subject' => 'OSY', 'teacher' => 'WEB', 'room' => 'C109']
        ],
        'friday' => [
            ['time' => '11:40-12:30', 'subject' => 'PRG', 'teacher' => 'MUL', 'room' => 'C105'],
            ['time' => '12:30-13:20', 'subject' => 'PRG', 'teacher' => 'MUL', 'room' => 'C105'],
            ['time' => '13:30-14:20', 'subject' => 'MAT', 'teacher' => 'SCH', 'room' => 'A201'],
            ['time' => '14:20-15:10', 'subject' => 'MAT', 'teacher' => 'SCH', 'room' => 'A201']
        ]
    ],
];