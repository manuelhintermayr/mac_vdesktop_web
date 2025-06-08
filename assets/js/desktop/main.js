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