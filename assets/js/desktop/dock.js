function prepareDock() {
    const dockItems = [
        { id: "#dock_contactInfo", item: 1 },
        { id: "#dock_timetable", item: 2 },
        { id: "#dock_teacherList", item: 3 },
        { id: "#dock_calendar", item: 4 }
    ];
    dockItems.forEach(({ id, item }) => {
        $(id).bind('click', { item }, function (event) {
            dockAuswahl(event.data.item);
        });
    });
}

function positionDock() {
    var erg = (document.getElementById("dock").offsetWidth / 2);
    document.getElementById("dock").style.left = "calc(50% - " + erg + "px)";
}

function dockAuswahl(item) {
    addClassForShortTime("#dock_" + getItemName(item), "bounce");
    setTimeout(function () { }, 3000); //Wait so the animation can finish
    switch (item) {
        case 1:
            window.setTimeout('openEINS()', 2500);
            break;
        case 2:
            window.setTimeout('openZWEI()', 2500);
            break;
        case 3:
            window.setTimeout("newErrorPopUp('Error', 'Failed to start application', 'The application you tried to start may only be started by a student.');", 2500);
            break;
        case 4:
            window.setTimeout('openCalendar()', 2500);
            break;
        default:
            window.setTimeout("newErrorPopUp('Error', 'Unknown application started', 'The application you tried to start does not exist.');", 2500);
    }

}

function getItemName(item) {
    switch (item) {
        case 1: return "contactInfo";
        case 2: return "timetable";
        case 3: return "teacherList";
        case 4: return "calendar";
        default: return "item" + item;
    }
}
function openEINS() {
    openUserInfo();
}

function openZWEI() {
    removeClass("#dock_timetable > a > span", "dock_dotHidden");
    openStundenPlan();
}

function openDREI() {
    removeClass("#dock_teacherList > a > span", "dock_dotHidden");
    openTeacherInfo();
}

function openCalendar() {
    if ($("#calendarWindow").length) {
        $("#calendarWindow").show();
    }
    else {
        $("body").append('<div class="fenster" id="calendarWindow"><div class="top"><div class="panel"><span class="first"></span><span class="second"></span><span class="third"></span></div></div><div class="inside"><iframe src="calender.html"></iframe></div></div>');
    }
}
