<?php
include('scripts/functions.inc.php');
session_start();
if ($_SESSION['loggedIn'] && $_SESSION['loggedIn'] !== false) {
    echo "Already logged in. Forwarding to the <a href='desktop.php'>desktop</a> page.";
    header("Location: desktop.php");
    exit;
}
do_header_start("VDesktop - Login");
do_header_jquery();
?>

<script name="redirect_to_home" type="text/javascript">
    function confirmExit(event) {
        event.preventDefault();
        const confirmed = confirm("Do you really want to leave the site?\n\nYou will be redirected to the author's website.");
        if (confirmed) {
            window.location.href = "https://manuelhintermayr.com";
        }
    }
</script>
<script name="login_script" type="text/javascript">
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
</script>
<script name="info_popup" type="text/javascript">
    setTimeout(function () {
        $("#infoPopup").draggable({
            handle: ".mac-titlebar",
            scroll: false,
            opacity: 0.8
        });
        $("#closePopup, .mac-close").on("click", function () {
            $("#infoPopup").fadeOut(300);
        });
        $("#infoPopup").fadeIn(400);
    }, 3000);
</script>
<script name="page_start" type="text/javascript">
    function loadAnfang() {
        $("#loginButton").click(function (event) {
            event.preventDefault();
            login();
        });
        $(".login-input").on("keydown", function (event) {
            if (event.key === "Enter") {
                event.preventDefault();
                login();
            }
        });
    }
    window.addEventListener('DOMContentLoaded', loadAnfang);
</script>
<link rel="stylesheet" href="assets/style/login.css" type="text/css" />
</head>

<body>
    <div id="infoPopup" class="mac-window" style="display: none;">
        <div class="mac-titlebar">
            <span class="mac-buttons">
                <span class="mac-close"></span>
            </span>
            <span class="mac-title">General Info</span>
        </div>
        <div class="mac-content">
            <p>
                Welcome to <strong>VDesktop</strong> – a virtual desktop environment built entirely in the browser.
                You can log in to the demo using the default credentials: <b>admin</b> / <b>admin</b>.
            </p>
            <img src="assets/images/preview_pic.jpg" alt="preview" height="170px" />
            <p>
                This project was originally created as a uni project during the academic year
                <strong>2014/2015</strong> at <b>HTL Spengergasse</b>. <br /><br />
                Please note: it is a product of its time and is not actively maintained.
            </p>
            <p>
                You can find the full source code here:
                <a href="https://github.com/manuelhintermayr/mac_vdesktop_web"
                    target="_blank">github.com/manuelhintermayr/mac_vdesktop_web</a>
            </p>

            <button id="closePopup" class="mac-close-btn">Close</button>
        </div>
    </div>

    <section>
        <span id="hintergrund"></span>
        <span id="cancelButton">
            <center>
                <a href="#" onclick="confirmExit(event)">
                    <img src="assets/images/login/cancelbutton.png" alt="Cancel">
                </a>
            </center>
        </span>
        <form>
            <div id="pageWrapper">
                <div id="loginWindowWrapper">
                    <section id="loginMessageBox">
                        <p id="loginHintPrimary" class="login-hint">
                            The following error has occurred:
                        </p>
                        <p id="loginHintSecondary" class="login-hint">
                            <b>
                                <div id='message'></div>
                            </b>
                        </p>
                        <a href="#" id="messageBoxArrow"></a>
                    </section>
                    <section id="loginPanel">
                        <div id="loginImageContainer">
                            <h1 id="loginTitle">
                                Login
                            </h1><span id="loginImageOverlay"></span>
                        </div>
                        <div id="loginFieldsWrapper">
                            <table id="loginFieldsTable">
                                <tbody id="loginFieldsBody">
                                    <tr class="login-row">
                                        <td class="login-label-cell">
                                            <label for="USERNAME" class="hidden-label">
                                                Username
                                            </label>
                                        </td>
                                        <td class="input-cell">
                                            <input type="text" class="login-input" name="user"
                                                placeholder="Enter Username" value="" size="40" maxlength="100" />
                                        </td>
                                    </tr>
                                    <tr class="login-row">
                                        <td class="login-label-cell">
                                            <label for="PASSWORD" class="hidden-label">
                                                Password
                                            </label>
                                        </td>
                                        <td class="input-cell">
                                            <input type="password" class="login-input" name="pass" size="40"
                                                maxlength="100" placeholder="Enter Password" />
                                        </td>
                                        <td id="loginButtonCell">
                                            <span id="loginButton"><span id="loginButtonIcon"
                                                    class="loginButton"></span>
                                                <img alt="loading" id="loadingSpinner" style="display: none;"
                                                    src="assets/images/login/spinner.gif" />
                                            </span>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </section>
                </div>
            </div>
        </form>
    </section>
</body>

</html>