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
