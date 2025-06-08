<?php
// Disable error display for security
error_reporting(0);
ini_set('display_errors', 0);

// Include required file with error handling
try {
    $dataFile = __DIR__ . '/getTimetable_data.php';
    if (!file_exists($dataFile)) {
        throw new Exception('Required data file not found');
    }
    include($dataFile);
} catch (Exception $e) {
    echo '<div class="msg error">
        <h4>Service Unavailable</h4>
        <p>The timetable service is currently unavailable. Please try again later.</p>
    </div>';
    exit;
}

// Check if we have an ID parameter
if (!isset($_GET['id']) || empty($_GET['id'])) {
    echo '<div class="msg error">
        <h4>Invalid Request</h4>
        <p>No valid ID was provided.</p>
    </div>';
    exit;
}

try {
    $id = htmlspecialchars($_GET['id'], ENT_QUOTES, 'UTF-8');

    // Check if function exists
    if (!function_exists('getTimetableHTML')) {
        throw new Exception('Service function not available');
    }

    // Get the HTML for the requested timetable
    $result = getTimetableHTML($id);

    if ($result === false || empty($result)) {
        echo '<div class="msg info">
            <h4>No Data Found</h4>
            <p>No timetable data is available for the requested ID.</p>
        </div>';
    } else {
        echo $result;
    }
} catch (Exception $e) {
    echo '<div class="msg error">
        <h4>Service Error</h4>
        <p>Unable to retrieve timetable data. Please try again later.</p>
    </div>';
}
?>
