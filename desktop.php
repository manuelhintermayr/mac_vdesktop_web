<?php
include('scripts/login_functions.php');
include('scripts/functions.inc.php');

if ($_SESSION['loggedIn'] == false || empty($_SESSION['loggedIn'])) {
    // Dann wurde noch nicht eingeloggt ==> Weiterleitung auf Login
    echo "Not logged in... Forwarding to loggin...";
    header("location: login.php");
    exit;
} else {
    if (!isValidUser($_SESSION['s_username'], $_SESSION['s_pw'])) {
        // Das Loggin stimmt nicht mehr ==> Weiterleitung auf Login
        echo "Login is no longer correct... Redirection to logout...";
        $_SESSION['loggedIn'] = "";
        header("location: logout/index.php");
        exit;
    }
}

do_header_start("VDesktop - Home");
do_header_jquery();
?>
<script src="assets/js/jquery.easing.min.js"></script>
<script src="assets/js/jquery.easypiechart.min.js"></script>
<script src="assets/js/desktop/main.js"></script>
<script src="assets/js/desktop/data.js"></script>
<script src="assets/js/desktop/error_easter_egg.js"></script>
<script src="assets/js/desktop/desktop.js"></script>
<script src="assets/js/desktop/stundenplanInfo.js"></script>
<script src="assets/js/desktop/window-operations.js"></script>
<link rel="stylesheet" href="assets/style/desktop.css" type="text/css" />
<style>
    /*Jener Style von: http://codepen.io/Irina_Tsareva/pen/eEncK */
    .progress-bar {
        margin-bottom: 10px;
    }

    .progress-bar__line {
        display: block;
    }

    .progress-bar--yosemite {
        background: #d7d7d7;
        height: 6px;
        box-sizing: border-box;
        border-radius: 4px;
        overflow: hidden;
        box-shadow: inset 0 0 0 1px #cecece;
        width: 400px;
    }

    .progress-bar--yosemite .progress-bar__line {
        display: block;
        background: #3375fa;
        height: 6px;
        box-shadow: inset 0 0 0 1px #6595e0;
    }
</style>
<!-- Ende - Code für den StundenplanInfo -->
<style>
    #dock {
        left: 50%;
        /*Berechnung: 50% - (WIDTH-PX/2)*/
        left: calc(50% - 78px);
        /*Bei Lehrer*/
        left: calc(50% - 115px);
        /*Bei Schueler*/
    }
</style>
<!-- Code fuer die Fenster -->
<style>
    /* Start - Code fuer den Dekstop */
    .desktop {
        position: absolute;
        top: 96px;
        left: 32px;
    }

    .desktop .deskIcon {
        position: relative;
        text-align: center;
        display: inline-block;
        padding: 12px 12px;
    }

    .desktop .deskIcon span {
        position: absolute;
        top: 84px;
        left: 13px;
        font-family: soleil, sans-serif;
        font-weight: 100;
        color: #fff;
        text-shadow: 0px 1px 3px rgba(0, 0, 0, 0.4);
    }

    .desktop .deskIcon img {
        width: 64px;
        border-radius: 5px;
        padding: 0px 2px;
        border: 2px solid rgba(255, 255, 255, 0);
        transition: background 0.1s, border-color 0.1s, -webkit-transform 0.2s;
    }

    .desktop .deskIcon img:hover {
        -webkit-transform: scale(1.08);
    }

    /* Ende - Code fuer den Dekstop */

    /* Start - Code fuer die Fenster */
    .window .body {
        width: 100%;
        height: 100%;
        padding: 4px 6px;
        font-family: "Source Code Pro", sans-serif;
        font-weight: 100;
    }

    .window {
        position: absolute;
        width: 768px;
        height: auto;
        left: 384px;
        top: 128px;
        background: rgba(245, 245, 245, 1);
        background-size: cover;
        background-repeat: no-repeat;
        background-attachment: fixed;
        padding-top: 12px;
        border-bottom-left-radius: 10px;
        border-bottom-right-radius: 10px;
        border-top-left-radius: 4px;
        border-top-right-radius: 4px;
        overflow-y: hidden;
        overflow-x: hidden;
        transition: box-shadow 0.4s, -webkit-transform 0.3s;
        -webkit-box-shadow: 0px 0px 10px 0px rgba(0, 0, 0, 0.65);
        -moz-box-shadow: 0px 0px 10px 0px rgba(0, 0, 0, 0.65);
        box-shadow: 0px 0px 10px 0px rgba(0, 0, 0, 0.65);
        z-index: 900;
    }

    .head {
        position: relative;
        top: -12px;
        left: -12px;
        width: 101.8%;
        height: 18px;
        padding: 6px 6px;
        background: linear-gradient(#ddd, #ccc);
        border-bottom: 1px solid #898989;
        z-index: 1000;
    }

    div.active {
        z-index: 9999 !important;
        -webkit-box-shadow: 0px 0px 16px 0px rgba(0, 0, 0, 0.75) !important;
        -moz-box-shadow: 0px 0px 16px 0px rgba(0, 0, 0, 0.75) !important;
        box-shadow: 0px 0px 16px 0px rgba(0, 0, 0, 0.75) !important;
    }

    .body {
        width: 99%;
        margin-left: auto;
        margin-right: auto;
        text-align: justify;
    }

    .ui-right {
        margin-top: 1px;
        padding-left: 12px;
        cursor: default;
    }

    .exit {
        display: inline-block;
        border-radius: 50%;
        width: 14px;
        height: 14px;
        background: #FF4344;
        border: 1px solid #CC3738;
        transition: background 0.1s;
    }

    .exit:hover {
        background: #FF6A6B;
    }

    .exit:active {
        background: #CC3738;
    }

    .minimize {
        display: inline-block;
        border-radius: 50%;
        width: 14px;
        height: 14px;
        background: #FFBA36;
        border: 1px solid #CC952B;
        transition: background 0.15s;
    }

    .minimize:hover {
        background: #FFC85E;
    }

    .minimize:active {
        background: #CC952B;
    }

    .exit {
        display: inline-block;
        border-radius: 50%;
        width: 14px;
        height: 14px;
        background: #FF4546;
        border: 1px solid #CC3738;
        transition: background 0.1s;
    }

    .exit:hover {
        background: #FF6A6B;
    }

    .exit:active {
        background: #CC3738;
    }

    .expand {
        display: inline-block;
        border-radius: 50%;
        width: 14px;
        height: 14px;
        background: #00D147;
        border: 1px solid #00A739;
        transition: background 0.1s;
    }

    .expand:hover {
        background: #33DA6C;
    }

    .expand:active {
        background: #00A739;
    }

    .ui-center {
        font-family: soleil, sans-serif;
        font-weight: 100;
        text-align: center;
        margin-top: -36px;
        margin-right: 20px;
        cursor: default;
    }

    /* Ende - Code fuer die Fenster */

    /* Start - Code fuer die Kontaktinfos */
    .contactInfo {
        max-width: 1920px !important;
        height: 296px;
        overflow: hidden;
    }

    /* Ende - Code fuer die Kontaktinfos */

    /* Start - Code fuer den Stundenplan */
    .lehrerLisste .body {}

    /* Ende - Code fuer den Stundenplan */

    /* Start - Code fuer die Lehrer-Liste */
    .stundenPlan .body .left {
        position: relative;
        width: 22.5%;
        background-image: url('assets/images/bluredBackground.jpg');
        background-size: cover;
        background-repeat: no-repeat;
        background-attachment: fixed;
        height: 97.1%;
        height: calc(100% - 19px);
        top: -16px;
        left: -7px;
        z-index: 100;
        overflow-x: hidden;
        overflow-y: scroll;
        border-right: 1px solid rgba(0, 0, 0, 0.3);
        border-bottom-left-radius: 5px;
    }

    .stundenPlan .body .left::-webkit-scrollbar,
    .stundenPlan .body .center::-webkit-scrollbar,
    #readMeInfoDiv>div.body::-webkit-scrollbar {
        width: 8px;
        height: 8px;
    }

    .stundenPlan .body .left.thin::-webkit-scrollbar,
    .stundenPlan .body .center.thin::-webkit-scrollbar {
        width: 2px;
    }

    .stundenPlan .body .left::-webkit-scrollbar-track,
    .stundenPlan .body .center::-webkit-scrollbar-track,
    .stundenPlan .body .left::-webkit-scrollbar-track-piece,
    .stundenPlan .body .center::-webkit-scrollbar-track-piece,
    #readMeInfoDiv>div.body::-webkit-scrollbar-track,
    #readMeInfoDiv>div.body::-webkit-scrollbar-track-piece {
        border-radius: 10px;
        background: #eee;
    }

    .stundenPlan .body .left::-webkit-scrollbar-thumb,
    .stundenPlan .body .center::-webkit-scrollbar-thumb,
    #readMeInfoDiv>div.body::-webkit-scrollbar-thumb {
        border-radius: 10px;
        background: #888;
    }

    .stundenPlan .body .left::-webkit-scrollbar-thumb:window-inactive,
    .stundenPlan .body .center::-webkit-scrollbar-thumb:window-inactive,
    #readMeInfoDiv>div.body ::-webkit-scrollbar-thumb:window-inactive {
        background: rgba(100, 100, 100, 0.4);
    }

    .stundenPlan .body .center {
        position: absolute;
        top: 0;
        padding-top: 38px;
        left: 22.5%;
        z-index: 80;
        width: 77.5%;
        height: 88%;
        height: calc(100% - 38px);
        overflow-y: scroll;
        overflow-x: scroll;
    }

    .stundenPlan .body .left div {
        background: rgba(255, 255, 255, 0.26);
        position: absolute;
        margin-top: -12px;
        width: 100%;
    }

    .stundenPlan .body .left ul {
        padding-left: 0px;
        list-style: none;
        height: 100%;
    }

    .stundenPlan .body .left ul span {
        padding: 4px 4px;
        color: #000;
        font-family: soleil, sans-serif;
        font-weight: bold;
        font-size: 18px;
    }

    .stundenPlan .body .left ul li i {
        padding-right: 4px;
    }

    .stundenPlan .body .left ul li {
        width: 100%;
        padding: 6px 12px;
        color: #000;
        font-family: soleil, sans-serif;
        font-weight: 100;
        transition: background 0.2s;
        letter-spacing: 0.12em;
    }

    .stundenPlan .body .left ul li:hover {
        background: rgba(255, 255, 255, 0.45) !important;
    }

    /* Ende - Code fuer die Lehrer-Liste */
</style>
<style>
    #close {
        position: relative;
        left: 77.5%;
        margin-top: -83px;
        width: 200px;
        margin-left: -100px;
        opacity: 1;
        transition: opacity 0.2s linear;
        overflow: hidden;
        height: 82px;
        zoom: 22%;
        -moz-zoom: 22%;
        -webkit-zoom: 22%;
        -o-zoom: 22%;
    }

    #x {
        position: absolute;
        font-size: 100px;
        color: #444;
        line-height: 80px;
        right: 0;
        cursor: pointer;
        width: 80px;
        height: 80px;
        border-radius: 40px;
        text-align: center;
        transition: transform 0.2s linear, opacity 0.2s ease-in;
        transform: translateX(0px) rotate(0deg);
        opacity: 1;
    }

    #left-half {
        position: absolute;
        clip: rect(0px, 40px, 90px, 0px);
        left: 120px;
        width: 200px;
        transform: translateX(0px);
        transition: transform 0.2s linear;
    }

    #right-half {
        position: absolute;
        clip: rect(0px, 200px, 90px, 160px);
        right: 0;
        transition: clip 0.2s linear;
        width: 200px;
        text-align: center;
        padding-top: 10px;
        color: #999;
    }

    .closing #left-half {
        transform: translateX(-120px);
        clip: rect(0px, 60px, 90px, 0px);
    }

    .closing #right-half {
        clip: rect(0px, 200px, 90px, 40px);
    }

    .closing #x {
        transform: translateX(-120px) rotate(-90deg);
        opacity: 0;
    }

    #close.invisible {
        opacity: 0;
    }

    .hidden {
        display: none;
    }

    .bevel-box {
        box-sizing: border-box;
        -moz-box-sizing: border-box;
        background-color: #222;
        height: 80px;
        border-radius: 40px;
        box-shadow: 0 1px 1px #777, inset 0 1px 1px #111;
        cursor: pointer;
    }

    .text-shadow {
        text-shadow: 0 1px 1px #111, 0 -1px 1px #777;
        font-size: 50px;
    }
</style>
<style>
    .percent {
        display: inline-block;
        z-index: 2;
        left: 70px;
        top: -48px;
        position: relative;
    }

    .percent:after {
        content: '%';
        margin-left: 0.1em;
        font-size: .8em;
    }
</style>
<style>
    .msg {
        margin: 0 0 1em;
        padding: 1.6em 18px 1px;
        border: 1px solid #F1F2F6;
        border-radius: 5px;
        -webkit-border-radius: 5px;
        -moz-border-radius: 5px;
        -o-border-radius: 5px;
        -kthml-border-radius: 5px;
        margin: 1%;
    }

    .noselect {
        -webkit-touch-callout: none;
        -webkit-user-select: none;
        -khtml-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
    }

    .msg.error,
    .msg.confirm,
    .msg.warn,
    .msg.announce {
        padding: 25px 25px 19px 80px;
        min-height: 48px;
    }

    .msg.warn,
    .msg.announce {
        border-color: #EBE9C5;
        background: #FDFDEF url("../assets/images/alert_warning.png") no-repeat 20px 1.6em;
    }
</style>
</head>

<body>
    <!-- Div existiert nur damit dort ein Javascript-durch Ajax ausgeführt werden kann -->
    <div id="tempDivForInfostundenplan"></div>

    <menu>
        <div id="div1"></div>
        <nav id="menu-links">
            <ul>
                <li><a style="font-size: 20px; text-shadow: 0px 1px 0px white;"></a>
                    <div>
                        <ul>
                            <li><a href="#" onclick="zeigeUeberDiesesProejkt()">&Uuml;ber diesen Webservice</a></li>
                            <li class="separator"></li>
                            <li><a href="#" onclick="$('.errorEasterEgg').show();">Abstr&uuml;rzen...</a></li>
                            <li><a href="#" class="disabled">Herunterfahren...</a></li>
                            <li class="separator"></li>
                            <li><a href="logout/index.php">Ausloggen...<span>⇧⌘Q</span></a></li>
                        </ul>
                    </div>
                </li>
                <li><a><b>Programme</b></a>
                    <div>
                        <ul>
                            <li><a href="#" class="disabled">Kontaktinfo</a></li>
                            <li><a href="#" class="disabled">Stundenplan<!--<span>▶︎</span>--></a></li>
                            <li><a href="#" class="disabled">Lehrerliste</a></li>
                            <li class="separator"></li>
                            <li><a href="#" class="disabled">Kalender</a></li>
                            <li><a href="#" class="disabled">E-Mails</a></li>
                        </ul>
                    </div>
                </li>
                <li class="menuPunktitem1">
                    <a href="#">Kontaktinfo</a>
                    <div>
                        <ul>
                            <li><a href="#" class="disabled">Momentan nicht verf&uuml;gbar.</a></li>
                        </ul>
                    </div>
                </li>
                <li class="menuPunktitem2">
                    <a href="#">Stundenplan</a>
                    <div>
                        <ul>
                            <li><a href="#" class="disabled">Momentan nicht verf&uuml;gbar.</a></li>
                        </ul>
                    </div>
                </li>
                <li class="menuPunktitem3">
                    <a href="#">Lehrerliste</a>
                    <div>
                        <ul>
                            <li><a href="#" class="disabled">Momentan nicht verf&uuml;gbar.</a></li>
                        </ul>
                    </div>
                </li>
                <li class="menuPunktKalender">
                    <a href="#">Kalender</a>
                    <div>
                        <ul>
                            <li><a href="#" class="disabled">Momentan nicht verf&uuml;gbar.</a></li>
                        </ul>
                    </div>
                </li>
                <li class="menuPunktEmails">
                    <a href="#">E-Mails</a>
                    <div>
                        <ul>
                            <li><a href="#" class="disabled">Momentan nicht verf&uuml;gbar.</a></li>
                        </ul>
                    </div>
                </li>
            </ul>
        </nav>
        <nav id="menu-rechts">
            <ul>
                <li>
                    <a href="#" onclick="openAndCloseNotificationCenter()"><span
                            id="notificationIcon">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></a>
                </li>
                <li>
                    <a href="#"><b><span id="personName"></span></b>
                    </a>
                <li>
                    <a href="#" id="clock">00:00:00</a>
                </li>
            </ul>
        </nav>
    </menu>
    <div id="dock">
        <ul>
            <li id="dock_item1">
                <a id="eins" class='osx-tooltip' href="#eins" data-text="Kontaktinfo">
                    <span class="bluePoint deaktiviert"><img src="assets/images/finder.png" alt="Kontaktinfo" /></span>
                </a>
            </li>
            <li id="dock_item2">
                <a id="zwei" class='osx-tooltip' href="#zwei" data-text="Stundeplan">
                    <span class="bluePoint deaktiviert"><img src="assets/images/calendar.png" alt="Stundeplan" /></span>
                </a>
            </li>
            <li id="dock_item3">
                <a id="drei" class='osx-tooltip' href="#drei" data-text="Lehrerliste">
                    <span class="bluePoint deaktiviert"><img src="assets/images/contacts.png"
                            alt="Lehrerliste" /></span>
                </a>
            </li>
        </ul>
    </div>

    <div id="notificationCenter" style="display: none;">
        <div id="notification_inhalt">
            <ul id="notification_HEADER">
                <li id="notification_heutigeUeberschrift">
                    Heute
                </li>
            </ul>
            <br>
            <div style="border-bottom: 2px solid rgba(178,178,178,0.5);display: block;"></div>
            <br>
            <li class="notification_neuerEintrag">
                <span class="notification_neuerEintragText">
                    <span class="notification_datum">
                        <span id="datumSchrift"></span>
                    </span>
                </span>
            </li>
            <ul id="notification_benarichtigunen">
                <li class="notification_neueUeberschrift">
                    <div class="notification_icon spengergasse_icon">
                    </div> Schuljahr - &Uuml;bersicht:
                </li>
                <li class="notification_neuerEintrag">
                    <span class="notification_neuerEintragText">
                        Restliche Schuljahr-Dauer:
                        <br>
                        <span class="chart" data-percent="0">
                            <span class="percent"></span>
                        </span>
                        <br>
                        <span style="background-color: rgba(255, 255, 255, .8);
height: 7px;
width: 6px;
background-color: rgba(240, 3, 3, 0.8);
-moz-border-radius: 5px;
-webkit-border-radius: 5px;
-o-border-radius: 5px;
border-radius: 5px;
-webkit-box-shadow: inset 0 1px 3px rgba(215, 74, 90, 0.4), 0 0 4px rgba(232, 10, 36, 0.5), 0 -1px 7px rgb(250, 6, 34);
-moz-box-shadow: inset 0 1px 3px rgba(215, 74, 90, 0.4), 0 0 4px rgba(232, 10, 36, 0.5), 0 -1px 7px rgb(250, 6, 34);
box-shadow: inset 0 1px 3px rgba(215, 74, 90, 0.4), 0 0 4px rgba(232, 10, 36, 0.5), 0 -1px 7px rgb(250, 6, 34);
-webkit-transition: opacity .5s;
-moz-transition: opacity .5s;
-o-transition: opacity .5s;
position: absolute;
margin-top: 5px;">&nbsp;</span>&nbsp;&nbsp;&nbsp;= % des vergangenen Schuljahres
                        <br>
                        <span style="background-color: rgba(255, 255, 255, .8);
height: 7px;
width: 6px;
background-color: rgba(255, 251, 251, 0.8);
-moz-border-radius: 5px;
-webkit-border-radius: 5px;
-o-border-radius: 5px;
border-radius: 5px;
-webkit-box-shadow: inset 0 1px 3px rgba(244, 237, 238, 0.4), 0 0 4px rgba(247, 241, 241, 0.5), 0 -1px 7px rgb(228, 179, 184);
-moz-box-shadow: inset 0 1px 3px rgba(244, 237, 238, 0.4), 0 0 4px rgba(247, 241, 241, 0.5), 0 -1px 7px rgb(228, 179, 184);
box-shadow: inset 0 1px 3px rgba(244, 237, 238, 0.4), 0 0 4px rgba(247, 241, 241, 0.5), 0 -1px 7px rgb(228, 179, 184);
-webkit-transition: opacity .5s;
-moz-transition: opacity .5s;
-o-transition: opacity .5s;
position: absolute;
margin-top: 5px;
">&nbsp;</span>&nbsp;&nbsp;&nbsp;= % des verbleibenden Schuljahres
                    </span>
                </li>
                <li class="notification_neueUeberschrift">
                    <div class="notification_icon moodle_icon">
                    </div> Moodle - Abgabe Termine:
                    <div id="close" class="hidden invisible">
                        <div id="left-half" class="bevel-box"></div>
                        <div id="centre"></div>
                        <div id="right-half" class="bevel-box text-shadow">Clear</div>
                        <div id="x" class="text-shadow">×</div>
                    </div>
                </li>
                <li class="notification_neuerEintrag">
                    <span class="notification_neuerEintragUeberschrift">GIS</span>
                    <span class="notification_neuerEintragText notification_neuerEintragDatum">Dienstag, 21. April,
                        10:00</span>
                    <br>
                    <span class="notification_neuerEintragText">
                        LE19 - Digitalisieren von Fl&auml;chen
                    </span>
                </li>
                <li class="notification_neuerEintrag">
                    <span class="notification_neuerEintragUeberschrift">PRE</span>
                    <span class="notification_neuerEintragText notification_neuerEintragDatum">Mittwoch, 22. April,
                        10:00</span>
                    <br>
                    <span class="notification_neuerEintragText">
                        Upload StatusBERICHT
                    </span>
                </li>
                <li class="notification_neuerEintrag">
                    <span class="notification_neuerEintragText">
                        <i>Keine Aufgaben gefunden.</i>
                    </span>
                </li>
            </ul>
        </div>
    </div>

    <div class="errorEasterEgg" style="display: none">
        <div class="errorEasterEgg_titleError">
            Critical Error
            <button class="errorEasterEgg_closeButton">X</button>
        </div>
        <div class="errorEasterEgg_message">
            <img alt="error" src="assets/images/errorEasterEgg.png" />
            An error has occurred while trying to display an error message.
        </div>
        <button class="errorEasterEgg_ok"> <span>OK</span></button>
    </div>

    <div id="body">
        <div class="window contactInfo" id="item1">
            <div class="head">
                <div class="ui-right">
                    <div class="exit"></div>
                    <div class="minimize"></div>
                    <div class="expand"></div>
                </div>
                <div class="ui-center">
                    <p>Kontaktinfo</p>
                </div>
                <div class="ui-left">
                </div>
            </div>
            <div class="body" id="kontaktinfo">
                Lade...
            </div>
        </div>

        <div class="window" id="readMeInfoDiv" style="visibility: visible">
            <div class="head">
                <div class="ui-right">
                    <div class="exit"></div>
                </div>
                <div class="ui-center">
                    <p>readme.txt</p>
                </div>
                <div class="ui-left">
                </div>
            </div>
            <div class="body" style=" overflow-y: scroll; position:relative;top: -18px; height:94%; width: 98.4%;">
                <center>
                    <h2>VDesktop</h2>
                    <img src="assets/images/preview_pic.jpg" alt="preview" style="height:50%;" />
                    <br>
                    Der praktische virtuelle Computer. Im Browser. Einfach und Zuverl&auml;ssig.<br>
                    <br>
                    VDesktop startete als ein Schulprojekt der 4AHIF im Schuljahr 2014/2015 der HTL Spengergasse.
                    <br>
                    Das Ziel war, Schülern sowie Lehrern mit kleinen n&auml;tzlichen Tools zu unterst&auml;zen, die
                    schnell und einfach f&uuml;r beide zu bedienen sind.
                </center>
            </div>
        </div>

        <div class="window stundenPlan" id="item2">
            <div class="head">
                <div class="ui-right">
                    <div class="exit"></div>
                    <div class="minimize"></div>
                    <div class="expand"></div>
                </div>
                <div class="ui-center">
                    <p>Stundenplan</p>
                </div>
                <div class="ui-left">
                </div>
            </div>
            <div class="body">
                <div class="left" id="section_resize">
                    <div>
                        <ul>
                            <span>Klassen:</span>
                            <br>
                            <li><i></i>Keine Eintr&auml;ge vorhanden.</li>
                            <br>
                            <span>Lehrer:</span>
                            <br>
                            <li><i></i>Keine Eintr&auml;ge vorhanden.</li>
                        </ul>
                    </div>
                </div>
                <div class="center" id="stundenplanMain">
                    <!-- Standartmaessig wird immer ein Fehler hier angezeigt -->
                    <div class="msg warn noselect">
                        <h4>Der Stundenplan f&uuml;r deine Klasse wurde nicht gefunden.</h4>
                        <p>W&auml;hle links einen Stundenplan aus.
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <div class="window lehrerListe" id="item3">
            <div class="head">
                <div class="ui-right">
                    <div class="exit"></div>
                    <div class="minimize"></div>
                    <div class="expand"></div>
                </div>
                <div class="ui-center">
                    <p>Lehrerliste</p>
                </div>
                <div class="ui-left">
                </div>
            </div>
            <div class="body" id="lehrerliste">
                Lade...
            </div>
        </div>

        <div class="desktop">
            <div class="deskIcon" style="left: 1279px; top: 121px;">
                <img src="assets/images/textedit.png" id="readmeRightClick"
                    oncontextmenu="javascript:readMeRightClick()" ondblclick="zeigeUeberDiesesProejkt()"
                    alt="readme.txt" />
                <span>readme.txt</span>
            </div>
        </div>
    </div>
</body>

</html>