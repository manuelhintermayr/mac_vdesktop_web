<?php
include('login_functions.php');

if ($_SESSION['loggedIn'] == false || empty($_SESSION['loggedIn'])) {
  echo "<div class='error-message'>Not logged in.</div>";
} else {
  if (!isValidUser($_SESSION['s_username'], $_SESSION['s_pw'])) {
    echo "<div class='error-message'>Invalid credentials.</div>";
  } else {
    // Dynamic semester calculation based on school year logic
    function calculateCurrentSemester()
    {
      $today = new DateTime();
      $currentYear = (int) $today->format('Y');
      $currentMonth = (int) $today->format('n'); // 1-12
      $currentDay = (int) $today->format('j');

      // School year constants (matching notificationCenter.js logic)
      $SCHOOL_YEAR_START_MONTH = 9; // September (1-based in PHP)
      $SCHOOL_YEAR_START_DAY = 7;
      $SCHOOL_YEAR_END_MONTH = 7; // July (1-based in PHP)
      $SCHOOL_YEAR_END_DAY = 1;

      // Determine school year start and end
      $schoolYearStartThisYear = new DateTime($currentYear . '-09-07');
      $schoolYearStartLastYear = new DateTime(($currentYear - 1) . '-09-07');

      if ($today >= $schoolYearStartThisYear) {
        // Current school year: Sept 2024 - July 2025
        $startYear = $currentYear;
        $endYear = $currentYear + 1;
      } else {
        // Previous school year: Sept 2023 - July 2024
        $startYear = $currentYear - 1;
        $endYear = $currentYear;
      }

      // Determine if it's Winter or Summer semester
      // Winter Semester: September - January
      // Summer Semester: February - July
      if (($currentMonth >= 9 && $currentMonth <= 12) || ($currentMonth >= 1 && $currentMonth <= 1)) {
        $semesterType = 'Winter';
      } else {
        $semesterType = 'Summer';
      }

      return $semesterType . ' Semester ' . $startYear . '/' . substr($endYear, 2);
    }

    // Advanced student data (in a real system, this would come from a database)
    $studentData = [
      'personal' => [
        'name' => 'Max Mustermann',
        'studentId' => 'SM2024001',
        'class' => '5AHIF',
        'type' => 'Student',
        'birthDate' => '15.03.2005',
        'email' => 'max.mustermann@uni.at',
        'phone' => '+43 660 1234567'
      ],
      'emergency' => [
        'contact1' => [
          'name' => 'Maria Mustermann',
          'relation' => 'Mother',
          'phone' => '+43 664 9876543',
          'email' => 'maria.mustermann@gmail.com'
        ],
        'contact2' => [
          'name' => 'Franz Mustermann',
          'relation' => 'Father',
          'phone' => '+43 676 5432109',
          'email' => 'franz.mustermann@company.at'
        ]
      ],
      'academic' => [
        'semester' => calculateCurrentSemester(),
        'gpa' => '2.1',
        'attendanceRate' => '94%',
        'openMails' => 7,
        'assignments' => [
          'pending' => 3,
          'overdue' => 1,
          'completed' => 42
        ]
      ],
      'subjects' => [
        ['name' => 'Mathematics', 'grade' => '2', 'teacher' => 'Prof. Schmidt', 'hours' => 4],
        ['name' => 'German', 'grade' => '1', 'teacher' => 'Prof. Wagner', 'hours' => 3],
        ['name' => 'English', 'grade' => '2', 'teacher' => 'Prof. Johnson', 'hours' => 3],
        ['name' => 'Programming', 'grade' => '1', 'teacher' => 'Prof. Müller', 'hours' => 6],
        ['name' => 'Operating Systems', 'grade' => '2', 'teacher' => 'Prof. Weber', 'hours' => 4],
        ['name' => 'Databases', 'grade' => '2', 'teacher' => 'Prof. Fischer', 'hours' => 3],
        ['name' => 'Network Technology', 'grade' => '3', 'teacher' => 'Prof. Bauer', 'hours' => 3]
      ],
      'schedule' => [
        'today' => [
          'date' => date('l, F j, Y'), // Current date
          'dayOfWeek' => date('l'), // Day name
          'classes' => [
            ['time' => '07:55 - 09:35', 'subject' => 'Mathematics', 'room' => 'A201', 'teacher' => 'Prof. Schmidt'],
            ['time' => '09:45 - 11:25', 'subject' => 'Programming', 'room' => 'C105', 'teacher' => 'Prof. Müller'],
            ['time' => '11:35 - 13:15', 'subject' => 'English', 'room' => 'B304', 'teacher' => 'Prof. Johnson'],
            ['time' => '14:15 - 15:55', 'subject' => 'Databases', 'room' => 'C107', 'teacher' => 'Prof. Fischer'],
            ['time' => '16:05 - 17:45', 'subject' => 'Operating Systems', 'room' => 'C109', 'teacher' => 'Prof. Weber']
          ],
          'totalHoursToday' => 10,
          'nextClass' => 'Mathematics at 07:55 in A201',
          'freePeriodsLeft' => 1
        ]
      ],
      'account' => [
        'libraryFees' => '€ 0,00',
        'canteenBalance' => '€ 47,50',
        'printingCredits' => '€ 12,30',
        'lockerNumber' => '247'
      ]
    ];
    ?>

    <style>
      .contact-container {
        font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif;
        padding: 20px;
        max-width: 900px;
        margin: 0 auto;
        color: #333;
        line-height: 1.6;
      }

      .header-section {
        text-align: center;
        margin-bottom: 30px;
        padding: 20px;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        border-radius: 12px;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
      }

      .student-avatar {
        width: 80px;
        height: 80px;
        border-radius: 50%;
        background: #fff;
        margin: 0 auto 15px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 32px;
        font-weight: bold;
        color: #667eea;
      }

      .header-section h1 {
        margin: 0 0 5px 0;
        font-size: 24px;
        font-weight: 600;
      }

      .header-section p {
        margin: 5px 0;
        opacity: 0.9;
      }

      .info-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 20px;
        margin-bottom: 20px;
      }

      .info-card {
        background: #fff;
        border-radius: 12px;
        padding: 20px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.08);
        border: 1px solid #e9ecef;
      }

      .card-header {
        display: flex;
        align-items: center;
        margin-bottom: 15px;
        padding-bottom: 10px;
        border-bottom: 2px solid #f8f9fa;
      }

      .card-icon {
        font-size: 20px;
        margin-right: 10px;
        width: 24px;
      }

      .card-title {
        font-size: 18px;
        font-weight: 600;
        color: #2c3e50;
        margin: 0;
      }

      .info-row {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 8px 0;
        border-bottom: 1px solid #f8f9fa;
      }

      .info-row:last-child {
        border-bottom: none;
      }

      .info-label {
        font-weight: 500;
        color: #6c757d;
      }

      .info-value {
        font-weight: 600;
        color: #2c3e50;
      }

      .subjects-table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 10px;
      }

      .subjects-table th,
      .subjects-table td {
        padding: 10px;
        text-align: left;
        border-bottom: 1px solid #e9ecef;
      }

      .subjects-table th {
        background-color: #f8f9fa;
        font-weight: 600;
        color: #495057;
      }

      .grade-badge {
        display: inline-block;
        padding: 4px 8px;
        border-radius: 20px;
        font-weight: bold;
        font-size: 12px;
        text-align: center;
        min-width: 24px;
      }

      .grade-1 {
        background-color: #d4edda;
        color: #155724;
      }

      .grade-2 {
        background-color: #d1ecf1;
        color: #0c5460;
      }

      .grade-3 {
        background-color: #fff3cd;
        color: #856404;
      }

      .grade-4 {
        background-color: #f8d7da;
        color: #721c24;
      }

      .grade-5 {
        background-color: #f5c6cb;
        color: #721c24;
      }

      .status-indicator {
        display: inline-block;
        padding: 4px 12px;
        border-radius: 20px;
        font-size: 12px;
        font-weight: 600;
      }

      .status-good {
        background-color: #d4edda;
        color: #155724;
      }

      .status-warning {
        background-color: #fff3cd;
        color: #856404;
      }

      .status-danger {
        background-color: #f8d7da;
        color: #721c24;
      }

      .emergency-contact {
        background-color: #f8f9fa;
        padding: 15px;
        border-radius: 8px;
        margin-bottom: 10px;
      }

      .emergency-contact h4 {
        margin: 0 0 8px 0;
        color: #2c3e50;
      }

      .contact-detail {
        margin: 4px 0;
        color: #6c757d;
      }

      .stats-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(120px, 1fr));
        gap: 15px;
        margin-top: 15px;
      }

      .stat-box {
        text-align: center;
        padding: 15px;
        background-color: #f8f9fa;
        border-radius: 8px;
      }

      .stat-number {
        font-size: 24px;
        font-weight: bold;
        color: #2c3e50;
        display: block;
      }

      .stat-label {
        font-size: 12px;
        color: #6c757d;
        margin-top: 5px;
      }

      .error-message {
        color: #721c24;
        background-color: #f8d7da;
        padding: 15px;
        border-radius: 8px;
        text-align: center;
        font-weight: 500;
      }
    </style>

    <div class="contact-container">
      <!-- Header Section -->
      <div class="header-section">
        <div class="student-avatar">MM</div>
        <h1><?php echo $studentData['personal']['name']; ?></h1>
        <p>Student ID: <?php echo $studentData['personal']['studentId']; ?></p>
        <p><?php echo $studentData['personal']['class']; ?> • <?php echo $studentData['academic']['semester']; ?></p>
      </div>

      <!-- Information Grid -->
      <div class="info-grid">
        <!-- Personal Information -->
        <div class="info-card">
          <div class="card-header">
            <span class="card-icon">👤</span>
            <h3 class="card-title">Personal Information</h3>
          </div>
          <div class="info-row">
            <span class="info-label">Birth Date</span>
            <span class="info-value"><?php echo $studentData['personal']['birthDate']; ?></span>
          </div>
          <div class="info-row">
            <span class="info-label">Email</span>
            <span class="info-value"><?php echo $studentData['personal']['email']; ?></span>
          </div>
          <div class="info-row">
            <span class="info-label">Phone</span>
            <span class="info-value"><?php echo $studentData['personal']['phone']; ?></span>
          </div>
          <div class="info-row">
            <span class="info-label">Type</span>
            <span class="info-value"><?php echo $studentData['personal']['type']; ?></span>
          </div>
        </div>

        <!-- Academic Status -->
        <div class="info-card">
          <div class="card-header">
            <span class="card-icon">📚</span>
            <h3 class="card-title">Academic Status</h3>
          </div>
          <div class="info-row">
            <span class="info-label">Grade Average</span>
            <span class="info-value"><?php echo $studentData['academic']['gpa']; ?></span>
          </div>
          <div class="info-row">
            <span class="info-label">Attendance</span>
            <span
              class="info-value status-indicator status-good"><?php echo $studentData['academic']['attendanceRate']; ?></span>
          </div>
          <div class="info-row">
            <span class="info-label">Open Emails</span>
            <span
              class="info-value status-indicator <?php echo $studentData['academic']['openMails'] > 5 ? 'status-warning' : 'status-good'; ?>">
              <?php echo $studentData['academic']['openMails']; ?>
            </span>
          </div>

          <div class="stats-grid">
            <div class="stat-box">
              <span class="stat-number"><?php echo $studentData['academic']['assignments']['pending']; ?></span>
              <span class="stat-label">Pending</span>
            </div>
            <div class="stat-box">
              <span class="stat-number"><?php echo $studentData['academic']['assignments']['overdue']; ?></span>
              <span class="stat-label">Overdue</span>
            </div>
            <div class="stat-box">
              <span class="stat-number"><?php echo $studentData['academic']['assignments']['completed']; ?></span>
              <span class="stat-label">Completed</span>
            </div>
          </div>
        </div>

        <!-- Account Information -->
        <div class="info-card">
          <div class="card-header">
            <span class="card-icon">💰</span>
            <h3 class="card-title">Account & Services</h3>
          </div>
          <div class="info-row">
            <span class="info-label">Library Fees</span>
            <span class="info-value"><?php echo $studentData['account']['libraryFees']; ?></span>
          </div>
          <div class="info-row">
            <span class="info-label">Cafeteria Balance</span>
            <span class="info-value"><?php echo $studentData['account']['canteenBalance']; ?></span>
          </div>
          <div class="info-row">
            <span class="info-label">Printing Credits</span>
            <span class="info-value"><?php echo $studentData['account']['printingCredits']; ?></span>
          </div>
          <div class="info-row">
            <span class="info-label">Locker Number</span>
            <span class="info-value"><?php echo $studentData['account']['lockerNumber']; ?></span>
          </div>
        </div> <!-- Schedule Information -->
        <div class="info-card">
          <div class="card-header">
            <span class="card-icon">📅</span>
            <h3 class="card-title">Today's Schedule - <?php echo $studentData['schedule']['today']['dayOfWeek']; ?></h3>
          </div>
          <div class="info-row">
            <span class="info-label">Date</span>
            <span class="info-value"><?php echo $studentData['schedule']['today']['date']; ?></span>
          </div>
          <div class="info-row">
            <span class="info-label">Total Hours Today</span>
            <span class="info-value"><?php echo $studentData['schedule']['today']['totalHoursToday']; ?> hours</span>
          </div>
          <div class="info-row">
            <span class="info-label">Next Class</span>
            <span class="info-value"><?php echo $studentData['schedule']['today']['nextClass']; ?></span>
          </div>
          <div class="info-row">
            <span class="info-label">Free Periods Left</span>
            <span class="info-value"><?php echo $studentData['schedule']['today']['freePeriodsLeft']; ?></span>
          </div>
        </div>
      </div>

      <!-- Class Schedule -->
      <div class="info-card" style="margin-bottom: 20px;">
        <div class="card-header">
          <span class="card-icon">⏰</span>
          <h3 class="card-title">Class Schedule</h3>
        </div>
        <table class="schedule-table" style="width: 100%; border-collapse: collapse;">
          <thead>
            <tr style="background-color: #f8f9fa;">
              <th style="padding: 8px; border: 1px solid #dee2e6; text-align: left; font-weight: 600;">Time</th>
              <th style="padding: 8px; border: 1px solid #dee2e6; text-align: left; font-weight: 600;">Subject</th>
              <th style="padding: 8px; border: 1px solid #dee2e6; text-align: left; font-weight: 600;">Room</th>
              <th style="padding: 8px; border: 1px solid #dee2e6; text-align: left; font-weight: 600;">Teacher</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($studentData['schedule']['today']['classes'] as $class): ?>
              <tr>
                <td style="padding: 8px; border: 1px solid #dee2e6; font-weight: 500;"><?php echo $class['time']; ?></td>
                <td style="padding: 8px; border: 1px solid #dee2e6;"><?php echo $class['subject']; ?></td>
                <td style="padding: 8px; border: 1px solid #dee2e6;"><?php echo $class['room']; ?></td>
                <td style="padding: 8px; border: 1px solid #dee2e6;"><?php echo $class['teacher']; ?></td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>

      <!-- Emergency Contacts -->
      <div class="info-card" style="margin-bottom: 20px;">
        <div class="card-header">
          <span class="card-icon">🚨</span>
          <h3 class="card-title">Emergency Contacts</h3>
        </div>
        <?php foreach ($studentData['emergency'] as $contact): ?>
          <div class="emergency-contact">
            <h4><?php echo $contact['name']; ?> (<?php echo $contact['relation']; ?>)</h4>
            <div class="contact-detail">📞 <?php echo $contact['phone']; ?></div>
            <div class="contact-detail">✉️ <?php echo $contact['email']; ?></div>
          </div>
        <?php endforeach; ?>
      </div>

      <!-- Current Subjects -->
      <div class="info-card">
        <div class="card-header">
          <span class="card-icon">📖</span>
          <h3 class="card-title">Current Subjects</h3>
        </div>
        <table class="subjects-table">
          <thead>
            <tr>
              <th>Subject</th>
              <th>Grade</th>
              <th>Teacher</th>
              <th>Hours/Week</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($studentData['subjects'] as $subject): ?>
              <tr>
                <td><?php echo $subject['name']; ?></td>
                <td><span class="grade-badge grade-<?php echo $subject['grade']; ?>"><?php echo $subject['grade']; ?></span>
                </td>
                <td><?php echo $subject['teacher']; ?></td>
                <td><?php echo $subject['hours']; ?>h</td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>

    <?php
  }
}
?>