function openAppWindow(windowClass, navigationClass, dockId) {
    $(navigationClass).show();
    removeClass(dockId + " > a > span", "dock_dotHidden");
    if (minimize == 0) {
        $(windowClass).animate({
            width: windowWidth2,
            height: windowHeight2,
            top: "106px",
            left: "30.5%",
            opacity: 1,
            transform: "scale(1)"
        }, 0, function () {
            windowWidth = $(".window").width();
            $(windowClass).fadeIn(75);
        });
    } else {
        minimize = -1;
        $(windowClass).animate({
            width: windowWidth,
            height: windowHeight,
            top: windowY,
            bottom: windowY2,
            left: windowX,
            right: windowX2,
            opacity: 1
        }, 175);
    }
}

function openUserInfo() {
    openAppWindow(".contactInfo", ".navigation_contactInfo", "#dock_contactInfo");
}
function openTimetable() {
    openAppWindow(".timetable", ".navigation_timetable", "#dock_timetable");
}
function openCalendar() {
    openAppWindow(".calendar", ".navigation_calendar", "#dock_calendar");
}

setTimeout(function () {
    /* Start - Script for Scrollbar */
    $(".timetable .body .left").addClass("thin");
    // If user has Javascript disabled, the thick scrollbar is shown
    $(".timetable .body .left").mouseover(function () {
        $(this).removeClass("thin");
    });
    $(".timetable .body .left").mouseout(function () {
        $(this).addClass("thin");
    });
    /* End - Script for Scrollbar */    
    $("#dock_contactInfo").mouseover(function () {
    });

    $(".deskIcon").draggable({
        scroll: false
    });

    $(".window").draggable({
        handle: ".head",
        scroll: false,
        opacity: 0.8
    });

    $(".window").fadeOut(0, function () {
    });

    $(document).ready(function () {
        width = $(window).width();
        height = $(document).height();
        windowWidth = $(".window").width();
        windowHeight = $(".window").height();

        windowWidth2 = $(".window").width();
        windowHeight2 = $(".window").height();
        windowX = $(".window").css("left");
        windowX2 = $(".window").css("right");
        windowY = $(".window").css("top");
        windowY2 = $(".window").css("bottom");

        currentApp = $(".currentApp").text();
        minimize = 0;

        intWidth = $(window).innerWidth();
        intHeight = $(window).innerHeight();

        xCenter = intWidth / 2;
        yCenter = intHeight / 2;

        $(".window").animate({
            width: windowWidth2,
            height: windowHeight2,
            top: windowY,
            bottom: windowY2,
            left: windowX,
            right: windowX2
        }, 125, function () {
            windowWidth = $(".window").width();
        });
    });

    /* Make the window bigger */
    $(".expand").click(function () {
        $(this).css("z-index", "9999");
        if (windowWidth != width) {
            windowX = $(".window").css("left");
            windowX2 = $(".window").css("right");
            windowY = $(".window").css("top");
            windowY2 = $(".window").css("bottom");
            $(".window").animate({
                width: width,
                height: height - 120,
                top: 9,
                left: 0
            }, 125, function () {
                windowWidth = $(".window").width();
            });
        } else if (windowWidth = width) {
            $(".window").animate({
                width: windowWidth2,
                height: windowHeight2,
                top: windowY,
                bottom: windowY2,
                left: windowX,
                right: windowX2
            }, 125, function () {
                windowWidth = $(".window").width();
                windowHeight = $(".window").height();
            });
        }
    });

    $(".head").dblclick(function () {
        if (windowWidth != width) {
            windowX = $(this).parent().css("left");
            windowX2 = $(this).parent().css("right");
            windowY = $(this).parent().css("top");
            windowY2 = $(this).parent().css("bottom");
            $(this).parent().animate({
                width: width,
                height: height,
                top: 0,
                left: 0
            }, 125, function () {
                windowWidth = $(".window").width();
            });
        } else if (windowWidth = width) {
            $(".window").animate({
                width: windowWidth2,
                height: windowHeight2,
                top: windowY,
                bottom: windowY2,
                left: windowX,
                right: windowX2
            }, 125, function () {
                windowWidth = $(".window").width();
                windowHeight = $(".window").height();
            });
        }
    });

    $(".minimize").click(function () {
        minimize = +1;
        windowX = $(".window").css("left");
        windowX2 = $(".window").css("right");
        windowY = $(".window").css("top");
        windowY2 = $(".window").css("bottom");
        $(this).parent().parent().parent().animate({
            width: 0,
            height: 0,
            left: 100,
            bottom: 1,
            opacity: 0
        }, 225, function () {
        });
    });

    $(".exit").click(function () {
        var $window = $(this).parent().parent().parent();
        closeApplicationWindow($window);
    });

    $(".window").click(function (e) {
        currentApp = $(this).find(".ui-center").find("p"),
            $(this, ".ui-center").find("p", function () {
                $(".currentApp").text(this);
            });
        $(".window").css("z-index", "100"),
            $(this).css("z-index", "9999"),
            $(this).css("-webkit-box-shadow", "0px 0px 10px 0px rgba(0, 0, 0, 0.65)", "!important"),
            $(this).css("-moz-box-shadow", "0px 0px 10px 0px rgba(0, 0, 0, 0.65)", "!important"),
            $(this).css("box-shadow", "0px 0px 10px 0px rgba(0, 0, 0, 0.65)", "!important");
        e.stopPropagation();
    });
    $(document).click(function () {
        $(".window").css("z-index", "100"),
            $(this).css("-webkit-box-shadow", "0px 0px 10px 0px rgba(0, 0, 0, 0.65)", "!important"),
            $(this).css("-moz-box-shadow", "0px 0px 10px 0px rgba(0, 0, 0, 0.65)", "!important"),
            $(this).css("box-shadow", "0px 0px 10px 0px rgba(0, 0, 0, 0.65)", "!important");
    });

    /* So that the Desktop Icon works */
    $(".deskIcon img").click(function (e) {
        $(".deskIcon img").css("background", "rgba(255,255,255,0)"),
            $(".deskIcon img").css("border-color", "rgba(255,255,255,0)"),
            $(this).css("border-color", "rgba(255,255,255,0.5)")
        $(this).css("background", "rgba(255,255,255,0.4)")
        e.stopPropagation();
    });

}, 1000);

window.setTimeout('starteCode()', 100); //So that the entire Javascript part is executed


function closeApplicationWindow($window) {    if ($window.hasClass("contactInfo")) {
        $('.navigation_contactInfo').hide();
    }
    if ($window.hasClass("timetable")) {
        $('.navigation_timetable').hide();
    }
    if ($window.hasClass("calendar")) {
        $('.navigation_calendar').hide();
    }

    $window.fadeOut(150, function () {
        $(this).hide();
        windowX = $(".window").css("left");
        windowX2 = $(".window").css("right");
        windowY = $(".window").css("top");
        windowY2 = $(".window").css("bottom");
    });
    $window.css("-webkit-transform", "scale(0.9)");
    addClass("#dock_" + $window.attr('id') + " > a > span", "dock_dotHidden");
    $(".menuPunkt" + $window.attr('id')).hide();
}