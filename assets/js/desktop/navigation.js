    /* Start - Code fuer die Uhr */
    function starteUhr() {
        stelleUhr();
        setInterval(function () {
            stelleUhr();
        }, 1000);
    }

    function stelleUhr() {
        var clock = document.getElementById('clock');
        var d = new Date();
        var stunde = "";
        var minutes = "";
        var seconds = "";
        if (d.getHours() < 10) {
            stunde = "0" + d.getHours();
        }
        else {
            stunde = d.getHours();
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
        clock.innerHTML = stunde + ':' + minutes + ':' + seconds;
    }
    /* Ende - Code fuer die Uhr */