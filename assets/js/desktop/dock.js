/* Calculates where the dock should be positioned */
function positionDock() {
    var erg = (document.getElementById("dock").offsetWidth / 2);
    document.getElementById("dock").style.left = "calc(50% - " + erg + "px)";
}

/* Defines which functions should be called when an item on the dock is selected. */
function prepareDock() {
    $("#dock_item1").bind('click', { item: 1 }, function (event) {
        dockAuswahl(event.data.item);
    });
    $("#dock_item2").bind('click', { item: 2 }, function (event) {
        dockAuswahl(event.data.item);
    });
    $("#dock_item3").bind('click', { item: 3 }, function (event) {
        dockAuswahl(event.data.item);
    });
    $("#dock_item4").bind('click', { item: 4 }, function (event) {
        dockAuswahl(event.data.item);
    });
}

function dockAuswahl(item) {
    addClassForShortTime("#dock_item" + item, "bounce");
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
function openEINS() {
    openUserInfo();
}

function openZWEI() {
    removeClass("#dock_item2 > a > span", "deaktiviert");
    openStundenPlan();
}

function openDREI() {
    removeClass("#dock_item3 > a > span", "deaktiviert");
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
