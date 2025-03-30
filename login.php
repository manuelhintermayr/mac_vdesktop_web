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

<script type="text/javascript">
    function login() {
        $("#loginButtonIcon").hide();
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

    function loadAnfang() {
        $("#loginButton").click(function (event) {
            event.preventDefault();
            login();
        });
    }
</script>

<script>
    window.setTimeout('loadAnfang()', 3000);      
</script>

<link rel="stylesheet" href="assets/style/login.css" type="text/css" />
</head>

<body>
    <section>
        <span id="hintergrund"></span>
        <span id="cancelButton">
            <center><a href="javascript:window.close();"><img src="assets/images/login/cancelbutton.png"></a></center>
        </span>
        <form>
            <div id="pageWrapper">
                <div id="loginWindowWrapper">
                    <section id="loginMessageBox" style="display: none;">
                        <p id="loginHintPrimary">
                        The following error has occurred:
                        </p>
                        <p id="loginHintSecondary">
                            <b>
                                <div id='message'></div>
                            </b>
                        </p>
                        <a href="javascript:void(0)" id="messageBoxArrow"></a>
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
                                    <tr id="loginRowUsername">
                                        <td id="labelCellUsername">
                                            <label for="USERNAME" id="hiddenLabelUsername">
                                                Username
                                            </label>
                                        </td>
                                        <td id="inputCellUsername">
                                            <input type="text" id="inputUsername" name="user" placeholder="Enter Username"
                                                value="" size="40" maxlength="100" />
                                        </td>
                                    </tr>
                                    <tr id="loginRowPassword">
                                        <td id="labelCellPassword">
                                            <label for="PASSWORD" id="hiddenLabelPassword">
                                                Password
                                            </label>
                                        </td>
                                        <td id="inputCellPassword">
                                            <input type="password" name="pass" size="40" maxlength="100" id="inputPassword"
                                                placeholder="Enter Password" />
                                        </td>
                                        <td id="loginButtonCell">
                                            <span id="loginButton"><span id="loginButtonIcon" class="loginButton"></span>
                                                <img alt="loading" id="loadingSpinner" style="display: none;"
                                                    src="assets/images/spinner.gif" />
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