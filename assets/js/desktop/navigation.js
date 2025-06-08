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

function toggleNotificationCenter() {
    const SCHOOL_YEAR_START_MONTH = 8; // September
    const SCHOOL_YEAR_START_DAY = 7;
    const SCHOOL_YEAR_END_MONTH = 7; // July
    const SCHOOL_YEAR_END_DAY = 1;

    $('#notificationCenter').toggle("slide", { direction: "right" }, 1000);

    const chart = window.chart = $('.chart').data('easyPieChart');
    const today = new Date();

    const schoolYearStart = today >= new Date(today.getFullYear(), SCHOOL_YEAR_START_MONTH, SCHOOL_YEAR_START_DAY)
        ? new Date(today.getFullYear(), SCHOOL_YEAR_START_MONTH, SCHOOL_YEAR_START_DAY)
        : new Date(today.getFullYear() - 1, SCHOOL_YEAR_START_MONTH, SCHOOL_YEAR_START_DAY);
    const schoolYearEnd = new Date(schoolYearStart.getFullYear() + 1, SCHOOL_YEAR_END_MONTH, SCHOOL_YEAR_END_DAY);


    let totalSchoolYearDays, passedSchoolYearDays;

    if (today >= schoolYearEnd && today < schoolYearStart) {
        // Between July 1st and September 1st, progress is always 100%
        totalSchoolYearDays = 1; // Arbitrary value to avoid division by zero
        passedSchoolYearDays = 1; // Full progress
    } else {
        totalSchoolYearDays = calculateTotalDays(schoolYearStart, schoolYearEnd, today);
        passedSchoolYearDays = calculatePassedDays(schoolYearStart, schoolYearEnd, today);
    }

    chart.update((passedSchoolYearDays / totalSchoolYearDays) * 100);

    updateDateDisplay(today);
}

function calculateTotalDays(start, end, today) {
    const oneDay = 1000 * 60 * 60 * 24; // Day in milliseconds
    if (today > end) {
        const nextYearEnd = new Date(today.getFullYear() + 1, end.getMonth(), end.getDate());
        return Math.ceil((nextYearEnd - start) / oneDay);
    }
    const previousYearStart = new Date(today.getFullYear() - 1, start.getMonth(), start.getDate());
    return Math.ceil((end - previousYearStart) / oneDay);
}

function calculatePassedDays(start, end, today) {
    const oneDay = 1000 * 60 * 60 * 24; // Day in milliseconds

    if (today >= start && today <= end) {
        // Within the current school year
        return Math.ceil((today - start) / oneDay);
    } else if (today > end && today < new Date(today.getFullYear(), SCHOOL_YEAR_START_MONTH, SCHOOL_YEAR_START_DAY)) {
        // During summer vacation
        return calculateTotalDays(start, end, today);
    } else if (today >= new Date(today.getFullYear(), SCHOOL_YEAR_START_MONTH, SCHOOL_YEAR_START_DAY)) {
        // New school year started
        const nextYearStart = new Date(today.getFullYear(), SCHOOL_YEAR_START_MONTH, SCHOOL_YEAR_START_DAY);
        return Math.ceil((today - nextYearStart) / oneDay);
    }

    return 0; // Default case
}

function updateDateDisplay(date) {
    const dayName = new Intl.DateTimeFormat('en-US', { weekday: 'long' }).format(date);
    const monthName = new Intl.DateTimeFormat('en-US', { month: 'long' }).format(date);

    const formattedDate = `${dayName},<br>${date.getDate()}. ${monthName} ${date.getFullYear()}`;
    $("#datumSchrift").html(formattedDate);
}