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
function newErrorPopUp(title, errorMessage, errorContent) {
    var newID = Math.floor(Math.random() * 1000000000);
    var popUp = '<div class=\"ErrorWindow\" id=\"ErrorWindow_' + newID + '\">\n  <div class=\"ErrorPopUp_titlebar\">\n    <div class=\"ErrorPopUp_buttons\">\n      <div class=\"ErrorPopUp_close\">\n        <a onclick=\"removeElement(\'#ErrorWindow_' + newID + '\')\" class=\"ErrorPopUp_closebutton\" href=\"#\"><span><strong>x<\/strong><\/span><\/a>\n      <\/div>\n    <\/div>\n    ' + title + '\n  <\/div>\n  <div class=\"ErrorPopUp_content\">\n        <div class=\"ErrorPopUp_container-alert\">\n        <img src=\"assets/images/Alert.png\" alt=\"Error\">\n        <div class=\"ErrorPopUp_about-alert\">\n        <p><b>' + errorMessage + '<\/b>\n        <p>' + errorContent + '<\/p>\n        <a href=\"#\" onclick=\"removeElement(\'#ErrorWindow_' + newID + '\')\" class=\"button\" data-rel=\"close\">Close<\/a>\n        <\/div>\n        <\/div>\n    \n  <\/div>\n<\/div>';
    $('<div/>', {
        'class': 'ErrorWindow_' + newID,
        'id': 'ErrorWindow',
        'html': popUp
    }).appendTo('body');
    $('.ErrorWindow_' + newID).draggable({
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
function runPageConfiguration() {
    // Show loading screen message updates
    updateLoadingMessage("Configuring application windows...");
    configureApplicationWindows();
    
    updateLoadingMessage("Starting clock...");
    startClock();
    
    updateLoadingMessage("Preparing dock...");
    prepareDock();
    
    updateLoadingMessage("Configuring easter eggs...");
    configureErrorEasterEgg();
    
    updateLoadingMessage("Positioning dock...");
    positionDock();
    
    updateLoadingMessage("Loading charts...");
    loadChart();
    
    updateLoadingMessage("Loading contact information...");
    $("#contactInfoBody").load("scripts/contactInfo.php");
    
    updateLoadingMessage("Loading timetable...");
    $("#timetableBody").load("scripts/timetable.php");
    
    updateLoadingMessage("Loading calendar...");
    $("#calendarBody").load("scripts/calendar.php");

    updateLoadingMessage("Loading README.md content...");
    // Load README.md content into the readMe window
    $("#readMeInfoDiv .body").load("scripts/readmeContent.php");
    
    updateLoadingMessage("Loading timetable for 5AHIF...");
    // Load the timetable for the own class
    loadTimetable("5AHIF", "class");

    // Configure event handlers
    $(document).bind("contextmenu", function (event) {
        event.preventDefault(); // Prevent the default right click menu from appearing
    });
    $(document).bind("click", function (event) {
        removeElement("menu.rightClickMenu"); // Remove any right click menu when clicking anywhere else
    });
    if (isFirefox()) {
        $("#clearNotificationCenter").hide(); // Hide the clear notifications button in Firefox
    }
    
    // Final step: Hide loading screen and show content
    setTimeout(function() {
        updateLoadingMessage("Finalizing...");
        setTimeout(function() {
            hideLoadingScreen();
        }, 500);
    }, 1000);
}

// Function to update loading message
function updateLoadingMessage(message) {
    $('#loadingScreen p').html(message + '<span class="loading-dots">...</span>');
}

// Function to hide loading screen and show content
function hideLoadingScreen() {
    // Remove loading class from body to show content
    $('body').removeClass('loading');
    
    // Fade out loading screen
    $('#loadingScreen').fadeOut(800, function() {
        $(this).remove();
    });
    
    // Fade in main content
    $('menu, #dock, .desktop, #content').hide().fadeIn(1000);
    positionDock();
}
