function loadTimetable(id, type) {
    // Show loading message
    $("#timetableContent").html('<center><h2>Loading page...</h2></center>');
    
    // Use the mock data system instead of the old API
    $.ajax({
        url: 'scripts/getTimetable.php',
        data: { id: id },
        method: 'GET',
        success: function(response) {
            // Display the timetable in the content area
            $('#timetableContent').html(response);
            
            // Highlight the selected item
            $('.timetable-link').removeClass('active');
            $('.timetable-link[data-id="' + id + '"]').addClass('active');
        },
        error: function() {
            $('#timetableContent').html('<div class="msg error"><h4>Error</h4><p>The timetable could not be loaded.</p></div>');
        }
    });
}
