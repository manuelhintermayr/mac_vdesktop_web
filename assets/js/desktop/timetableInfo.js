var schuelerKlasse = "";

/* Start - Calendar week calculation */
var KWDatum = new Date();
var DonnerstagDat = new Date(KWDatum.getTime() + (3 - ((KWDatum.getDay() + 6) % 7)) * 86400000);
KWJahr = DonnerstagDat.getFullYear();
var DonnerstagKW = new Date(new Date(KWJahr, 0, 4).getTime() + (3 - ((new Date(KWJahr, 0, 4).getDay() + 6) % 7)) * 86400000);
KW = Math.floor(1.5 + (DonnerstagDat.getTime() - DonnerstagKW.getTime()) / 86400000 / 7);
var KWstring;
if (KW < 10) {
    KWstring = "0" + KW;
}
else {
    KWstring = "" + KW;
} localStorage["KWstring"] = KWstring;
/* End - Calendar week calculation */

/* Start - Class calculation */
var classes = ["1AHIF", "1BHIF", "1CHIF", "1DHIF", "2AVIF", "2BVIF", "2CVIF", "4ABIF", "4BBIF", "5AHIF"];
var teachers = ["DX", "KNJ", "BS", "HAC", "RE", "TT", "KS"];
var rooms = ["B3.07MM", "B1.15HW", "C3.11", "AU.04", "CU.28"];

// Old function that uses the Spengergasse API (kept for reference)
function ladeInfoTimetableInPage() {
    var inhalt = "<div>"
        + "<ul><span>Klassen:<\/span><br>";
        alert("hey!");
    for (var idx = 0; idx < classes.length; idx++) {
        var aktueller_index_int = (idx + 1);
        var aktueller_index = aktueller_index_int + "";
        if (aktueller_index_int < 10) {
            aktueller_index = "0000" + aktueller_index;
        }
        else {
            if (aktueller_index_int < 100) {
                aktueller_index = "000" + aktueller_index;
            }
            else {
                if (aktueller_index_int < 1000) {
                    aktueller_index = "00" + aktueller_index;
                }
                else {
                    if (aktueller_index_int < 10000) {
                        aktueller_index = "0" + aktueller_index;
                    }
                }
            }
        }
        var hinzufuegen = "<li onclick=\"ladeStundenplan('https://intranet.spengergasse.at/infostundenplan/" + KW + "/c/c" + aktueller_index + ".htm')\"><i><\/i>" + classes[idx] + "<\/li>";
        inhalt = inhalt + hinzufuegen;
    }

    for (var idx = 0; idx < teachers.length; idx++) {
        var aktueller_index_int = (idx + 1);
        var aktueller_index = aktueller_index_int + "";
        if (aktueller_index_int < 10) {
            aktueller_index = "0000" + aktueller_index;
        }
        else {
            if (aktueller_index_int < 100) {
                aktueller_index = "000" + aktueller_index;
            }
            else {
                if (aktueller_index_int < 1000) {
                    aktueller_index = "00" + aktueller_index;
                }
                else {
                    if (aktueller_index_int < 10000) {
                        aktueller_index = "0" + aktueller_index;
                    }
                }
            }
        }
        var hinzufuegen = "<li onclick=\"ladeStundenplan('https://intranet.spengergasse.at/infostundenplan/" + KW + "/t/t" + aktueller_index + ".htm')\"><i><\/i>" + lehrer[idx] + "<\/li>";
        inhalt = inhalt + hinzufuegen;
    }

    inhalt = inhalt + "<br><span>R&auml;me:</span><br>";
    for (var idx = 0; idx < rooms.length; idx++) {
        var aktueller_index_int = (idx + 1);
        var aktueller_index = aktueller_index_int + "";
        if (aktueller_index_int < 10) {
            aktueller_index = "0000" + aktueller_index;
        }
        else {
            if (aktueller_index_int < 100) {
                aktueller_index = "000" + aktueller_index;
            }
            else {
                if (aktueller_index_int < 1000) {
                    aktueller_index = "00" + aktueller_index;
                }
                else {
                    if (aktueller_index_int < 10000) {
                        aktueller_index = "0" + aktueller_index;
                    }
                }
            }
        }
        var hinzufuegen = "<li onclick=\"ladeStundenplan('https://intranet.spengergasse.at/infostundenplan/" + KW + "/r/r" + aktueller_index + ".htm')\"><i><\/i>" + raume[idx] + "<\/li>";
        inhalt = inhalt + hinzufuegen;
    }
    inhalt = inhalt + "<\/ul><\/div>";
    $("#section_resize").html(inhalt);
}

function ladeStundenplan(link) {
    $("#timetableContent").html('<center><h2>Lade Seite...</h2><br> <div class="progress-bar progress-bar--yosemite"><span class="progress-bar__line" style="width: 30%;"></span></div></center>');
    $("#timetableContent").load("getContentFromPage.php?url=" + encodeURI(link) + "&var=null");
}

// New functionality for using mock data
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
