<?php
include('getTimeTable_data.php'); // Updated path

// Check if we have an ID parameter
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Get the HTML for the requested timetable
    echo getTimetableHTML($id);
} else {
    echo '<div class="msg error">
        <h4>Error</h4>
        <p>No ID was provided.</p>
    </div>';
}
?>
