$(document).ready(function() {
    // Click handler for timetable links
    $(document).on('click', '.timetable-link', function(e) {
        e.preventDefault();
        
        // Get the ID of the selected class or teacher
        const id = $(this).data('id');
        const type = $(this).data('type');
        
        // Highlight the selected item
        $('.timetable-link').removeClass('active');
        $(this).addClass('active');
        
        // Show loading message
        $('#timetableContent').html('<div class="loading">Stundenplan wird geladen...</div>');
        
        // Fetch the timetable from our mock data PHP script
        $.ajax({
            url: 'scripts/getTimetable.php',
            data: { id: id },
            method: 'GET',
            success: function(response) {
                // Display the timetable in the content area
                $('#timetableContent').html(response);
                
                // Optionally load additional information if needed
                if (type === 'class') {
                    loadClassInfo(id);
                } else if (type === 'teacher') {
                    loadTeacherInfo(id);
                }
            },
            error: function() {
                $('#timetableContent').html('<div class="msg error"><h4>Fehler</h4><p>Der Stundenplan konnte nicht geladen werden.</p></div>');
            }
        });
    });
    
    // Example function to load additional class information
    function loadClassInfo(classId) {
        // This could fetch additional info about the class
        $('#tempDivForInfotimetable').load('scripts/getClassInfo.php?id=' + classId);
    }
    
    // Example function to load additional teacher information
    function loadTeacherInfo(teacherId) {
        // This could fetch additional info about the teacher
        $('#tempDivForInfotimetable').load('scripts/getTeacherInfo.php?id=' + teacherId);
    }
});
