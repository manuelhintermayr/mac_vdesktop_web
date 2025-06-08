/* Start: General JavaScripts */
function removeElement(target) {
    $(target).remove();
}
function addClass(id, className) {
    $(id).addClass(className);
}
function removeClass(id, className) {
    $(id).removeClass(className);
}
function addClassForShortTime(id, className) {
    addClass(id, className);
    window.setTimeout('removeClass("' + id + '","' + className + '")', 3000);
}
function showElement(target) {
    $(target).show("slow");
}
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
function isFirefox() {
    if (navigator.userAgent.indexOf("Firefox") != -1) {
        return true;
    }
    return false;
}
/* End: General JavaScripts */

/* Start: Specific functionality */
function readMeRightClick() {
    removeElement("menu.rightClickMenu"); // First remove the old ones
    $('<menu type="context" class="rightClickMenu" id="menu_readme">\n  <menuitem label="Open" onclick="showAboutThisProject()"></menuitem>\n  <hr>\n  <menuitem label="Reload Page" onclick="location.reload();"></menuitem>\n  <hr>\n  <menuitem label="Properties" onclick="newErrorPopUp(\'Error\', \'Not available\', \'This option is currently not available.\');"></menuitem>\n</menu>')
        .appendTo("body")
        .css({ top: event.pageY + "px", left: event.pageX + "px" });
}
function showAboutThisProject() {
    showElement("#readMeInfoDiv");
}

function showErrorEasterEgg() {
    $('.errorEasterEgg').show();
}
/* End: Specific functionality */

/* This method starts all other methods that need to be called for the class to work */
function starteCode() {
    startClock();
    prepareDock();
    configureErrorEasterEgg();
    positionDock();
    loadChart();

    $("#contactInfo").load("scripts/contactInfo.php");
    $("timeTable").load("scripts/timeTable.php");
    $("#calendar").load("scripts/calendar.php");

    $(document).bind("contextmenu", function (event) {
        event.preventDefault(); // Prevent the default right click menu from appearing
    });
    $(document).bind("click", function (event) {
        removeElement("menu.rightClickMenu"); // Remove any right click menu when clicking anywhere else
    });
    if (isFirefox()) {
        $("#clearNotificationCenter").hide(); // Hide the clear notifications button in Firefox
    }
}
