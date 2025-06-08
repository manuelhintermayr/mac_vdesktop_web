function startClock() {
    updateClock();
    setInterval(function () {
        updateClock();
    }, 1000);
}

function updateClock() {
    var clock = document.getElementById('clock');
    var d = new Date();
    var hour = "";
    var minutes = "";
    var seconds = "";
    if (d.getHours() < 10) {
        hour = "0" + d.getHours();
    }
    else {
        hour = d.getHours();
    }
    if (d.getMinutes() < 10) {
        minutes = "0" + d.getMinutes();
    }
    else {
        minutes = d.getMinutes();
    }
    if (d.getSeconds() < 10) {
        seconds = "0" + d.getSeconds();
    }
    else {
        seconds = d.getSeconds();
    }
    clock.innerHTML = hour + ':' + minutes + ':' + seconds;
}

function showErrorEasterEgg() {
    $('.errorEasterEgg').show();
}


function openAndCloseNotificationCenter() {
    $('#notificationCenter').toggle("slide", {
        direction: "right"
    }, 1000);

    var chart = window.chart = $('.chart').data('easyPieChart');

    //Wie viel vom Schuljahr vorbei ist.
    var today = new Date();
    var thisYear_schoolYear_start = new Date(today.getFullYear(), 8, 7); //Monat und Tag noch aendern
    var thisYear_schoolYear_end = new Date(today.getFullYear(), 6, 1); //Monat und Tag noch aendern
    var one_day = 1000 * 60 * 60 * 24; //Tag in Millisekunden
    var anzahlTageSchuljahr = 0;
    var anzahlTageSchuljahrVorbei = 0;
    if (today.getMonth() > 6 && today.getDate() > 1) //ob das Schuljahr schon vorbei ist
    {
        var nextYear_schoolYear_end = new Date(
            today.getFullYear() + 1,
            thisYear_schoolYear_end.getMonth(),
            thisYear_schoolYear_end.getDay()
        );

        anzahlTageSchuljahr = Math.ceil((nextYear_schoolYear_end - thisYear_schoolYear_start.getTime()) / (one_day));

        if (today.getMonth() <= nextYear_schoolYear_end() && today.getDay < nextYear_schoolYear_end()) {
            //dann sind noch Sommerferien
            anzahlTageSchuljahrVorbei = anzahlTageSchuljahr;
        }
        else {
            anzahlTageSchuljahrVorbei = Math.ceil((today.getTime() - nextYear_schoolYear_end.getTime()) / (one_day));
        }
    }
    else {
        //Es ist das Schuljahr von diesem Jahr noch nicht vorbei
        var oldYear_schoolYear_start = new Date(
            today.getFullYear() - 1,
            thisYear_schoolYear_start.getMonth(),
            thisYear_schoolYear_start.getDay());

        anzahlTageSchuljahr = Math.ceil((thisYear_schoolYear_end.getTime() - oldYear_schoolYear_start.getTime()) / (one_day));
        anzahlTageSchuljahrVorbei = anzahlTageSchuljahr - Math.ceil((thisYear_schoolYear_end.getTime() - today.getTime()) / (one_day));
    }
    chart.update((anzahlTageSchuljahrVorbei / anzahlTageSchuljahr) * 100);
}

var datum = new Date();
var tag = datum.getDay();
var tageArray = new Array("Sonntag", "Montag", "Dienstag", "Mittwoch", "Donnerstag", "Freitag", "Samstag");
var monatArray = new Array("J&aauml;nner", "Februar", "M&auml;rz", "April", "Mai", "Juni", "Juli", "August", "September", "Oktober", "November", "Dezember");
$("#datumSchrift").html(tageArray[tag] + ",<br>" + datum.getDate() + ". " + monatArray[datum.getMonth()] + " " + datum.getFullYear());