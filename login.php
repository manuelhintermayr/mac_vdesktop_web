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

<script src='assets/js/login/redirect_to_home.js'></script>
<script src='assets/js/login/login_script.js'></script>
<script src='assets/js/login/info_popup.js'></script>
<script src='assets/js/login/page_start.js'></script>
<link rel="stylesheet" href="assets/style/login.css" type="text/css" />
</head>

<body>
    <!-- Info Modal -->
    <div id="infoPopup" class="mac-window">
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
            <img src="assets/images/preview_pic.jpg" alt="preview" width="100%" />
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

    <!-- Login Form -->
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