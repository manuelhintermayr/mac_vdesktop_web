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

do_header_start("VDesktop - Home"); ?>
<!-- Javascript -->
<?php
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
<!-- Stylesheets -->
<link rel="stylesheet" href="assets/style/desktop/main.css" type="text/css" />
<link rel="stylesheet" href="assets/style/desktop/navigation.css" type="text/css" />
<link rel="stylesheet" href="assets/style/desktop/windows.css" type="text/css" />
</head>

<body>
    <menu>
        <div id="menu-bar"></div>
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

    <!-- Div existiert nur damit dort ein Javascript-durch Ajax ausgeführt werden kann -->
    <div id="tempDivForInfostundenplan"></div>
</body>

</html>