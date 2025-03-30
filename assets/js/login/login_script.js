function login() {
    $("#loginButtonIcon").hide();
    $("#loginMessageBox").hide();
    $("#loadingSpinner").show();
    $.ajax({
        type: "POST",
        url: 'login/index.php',
        data: $('form').serialize(),
        dataType: 'json',
        success: function (data) {
            $('section').fadeOut('slow', function () {
                $('body').css({ 'background-image': "url('assets/images/yosemite.jpg')" });
                $('section').html('<span style="border-color: rgba(255, 255, 255, 0.498039); padding:2px; background: rgba(255, 255, 255, 0.4);">Lade Hauptseite... </span>').fadeIn('fast', function () {
                    window.history.pushState("", "", 'desktop.php');
                });
            });
            location.reload();
            $("body").load("desktop.php");
        },
        statusCode: {
            403: function (e) {
                $("#loadingSpinner").hide();
                $("#loginButtonIcon").show();
                $("#message").text(e.responseText);
                fehlAnmeldung();
            },
            500: function (e) {
                $("#loadingSpinner").hide();
                $("#loginButtonIcon").show();
                $("#message").html("Anmelde-Server funktioniert momentan nicht. <br><u>(500 Error Response)</u>");
                fehlAnmeldung();
            }
        }
    });
    return false;
}

function fehlAnmeldung() {
    $("#loginMessageBox").show("slow");
    $("#loginPanel").addClass("error");
    window.setTimeout('removeClass("#loginPanel","error")', 1000);
}

function removeClass(id, className) {
    $(id).removeClass(className);
}