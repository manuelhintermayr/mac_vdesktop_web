/* Start - General JavaScripts */
/* Removes an element */
function removeElement(target) {
    $(target).remove();
}
/* Adds a class to an element with the identifier given in the "id" string. */
function addClass(id, className) {
    $(id).addClass(className);
}
/* Removes a class from an element with the identifier given in the "id" string.*/
function removeClass(id, className) {
    $(id).removeClass(className);
}
/* Adds a class to an element with the identifier given in the "id" string and removes it again after one second (= 1 second). Good for CSS animations.*/
function addClassForShortTime(id, className) {
    addClass(id, className);
    window.setTimeout('removeClass("' + id + '","' + className + '")', 3000);
}
/* Shows an element */
function showElement(target) {
    $(target).show("slow");
}
/* End - General JavaScripts */

/* Start - Various variables */

/* This should normally be loaded by the database */
localStorage.setItem("person_typ", "Administrator");
localStorage.setItem("person_name", "Max Mustermann");
localStorage.setItem("person_kuerzel", "MM");

/* End - Various variables */

$("#personName").html(localStorage.getItem("person_name"));

/* Start - General methods for this page */
/* This method starts all other methods that need to be called for the class to work */
function starteCode() {
    startClock(); /* To start the clock */
    prepareEventHandlers(); /* To activate the dock */
    configureErrorEasterEgg(); /* Start - Activation of the ErrorEasterEgg */
    dockPosition(); /* To set the position of the dock */
    $('.chart').easyPieChart({
        easing: 'easeOutBounce',
        onStep: function (from, to, percent) {
            $(this.el).find('.percent').text(Math.round(percent));
        }
    });

    $("#kontaktinfo").load("scripts/kontaktinfo.php");
    $("#lehrerliste").load("scripts/lehrerliste.php");
}
/* Calculates where the dock should be positioned */
function dockPosition() {
    var erg = (document.getElementById("dock").offsetWidth / 2);
    document.getElementById("dock").style.left = "calc(50% - " + erg + "px)";
}

/* Defines which functions should be called when an item on the dock is selected. */
function prepareEventHandlers() {
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

/* Start - Code for the right-click menu */
$(document).bind("contextmenu", function (event) {
    event.preventDefault();
});

function readMeRightClick() {
    removeElement("menu.rightClickMenu"); // First remove the old ones
    $('<menu type="context" class="rightClickMenu" id="menu_readme">\n  <menuitem label="Open" onclick="showAboutThisProject()"></menuitem>\n  <hr>\n  <menuitem label="Reload Page" onclick="location.reload();"></menuitem>\n  <hr>\n  <menuitem label="Properties" onclick="newErrorPopUp(\'Error\', \'Not available\', \'This option is currently not available.\');"></menuitem>\n</menu>')
        .appendTo("body")
        .css({ top: event.pageY + "px", left: event.pageX + "px" });
}

$(document).bind("click", function (event) {
    removeElement("menu.rightClickMenu");
});
/* End - Code for the right-click menu */


/* Start - Code for ErrorPopUps */
/* Creates a new ErrorPopUp */
function newErrorPopUp(titel, fehlermeldung, fehlerinhalt) {
    var neueID = Math.floor(Math.random() * 1000000000);
    var popUp = '<div class=\"ErrorWindow\" id=\"ErrorWindow_' + neueID + '\">\n  <div class=\"ErrorPopUp_titlebar\">\n    <div class=\"ErrorPopUp_buttons\">\n      <div class=\"ErrorPopUp_close\">\n        <a onclick=\"removeElement(\'#ErrorWindow_' + neueID + '\')\" class=\"ErrorPopUp_closebutton\" href=\"#\"><span><strong>x<\/strong><\/span><\/a>\n      <\/div>\n    <\/div>\n    ' + titel + '\n  <\/div>\n  <div class=\"ErrorPopUp_content\">\n        <div class=\"ErrorPopUp_container-alert\">\n        <img src=\"assets/images/Alert.png\" alt=\"Fehler\">\n        <div class=\"ErrorPopUp_about-alert\">\n        <p><b>' + fehlermeldung + '<\/b>\n        <p>' + fehlerinhalt + '<\/p>\n        <a href=\"#\" onclick=\"removeElement(\'#ErrorWindow_' + neueID + '\')\" class=\"button\" data-rel=\"close\">Close<\/a>\n        <\/div>\n        <\/div>\n    \n  <\/div>\n<\/div>';
    $('<div/>', {
        'class': 'ErrorWindow_' + neueID,
        'id': 'ErrorWindow',
        'html': popUp
    }).appendTo('body');
    $('.ErrorWindow_' + neueID).draggable({
        revert: "invalid",
        scroll: false
    });
}
/* End - Code for ErrorPopUps */

function showAboutThisProject() {
    showElement("#readMeInfoDiv");
}

function showErrorEasterEgg() {
    $('.errorEasterEgg').show();
}

function isFirefox() {
    if (navigator.userAgent.indexOf("Firefox") != -1) {
        return true;
    }
    return false;
}