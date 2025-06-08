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
<script src="assets/js/desktop/navigation.js"></script>
<script src="assets/js/desktop/notificationCenter.js"></script>
<script src="assets/js/desktop/errorEasterEgg.js"></script>
<script src="assets/js/desktop/dock.js"></script>
<script src="assets/js/desktop/window-operations.js"></script>
<script src="assets/js/desktop/timetableInfo.js"></script>
<!-- Stylesheets -->
<link rel="stylesheet" href="assets/style/desktop/main.css" type="text/css" />
<link rel="stylesheet" href="assets/style/desktop/navigation.css" type="text/css" />
<link rel="stylesheet" href="assets/style/desktop/notificationCenter.css" type="text/css" />
<link rel="stylesheet" href="assets/style/desktop/errorEasterEgg.css" type="text/css" />
<link rel="stylesheet" href="assets/style/desktop/dock.css" type="text/css" />
<link rel="stylesheet" href="assets/style/desktop/windows.css" type="text/css" />
</head>

<body>
    <!-- Start: Navigation Bar -->
    <menu>
        <div id="menu-bar"></div>
        <nav id="menu-left">
            <ul>
                <li><a class="apple-logo"></a>
                    <div>
                        <ul>
                            <li><a href="#" onclick="showAboutThisProject()">About this Webservice</a></li>
                            <li class="separator"></li>
                            <li><a href="#" onclick="showErrorEasterEgg()">Crash...</a></li>
                            <li><a href="#" class="disabled">Shutdown...</a></li>
                            <li class="separator"></li>
                            <li><a href="logout/index.php">Logout...<span>⇧⌘Q</span></a></li>
                        </ul>
                    </div>
                </li>
                <li><a><b>Programs</b></a>
                    <div>
                        <ul>
                            <li><a href="#" onclick="dockAuswahl(1)">Contact Info</a></li>
                            <li><a href="#" onclick="dockAuswahl(2)">Timetable</a></li>
                            <li><a href="#" class="disabled">Teacher List</a></li>
                            <li class="separator"></li>
                            <li><a href="#" onclick="dockAuswahl(4)">Calendar</a></li>
                        </ul>
                    </div>
                </li>
                <li class="navigation_contactInfo" style="display: none;">
                    <a href="#">Contact Info</a>
                    <div>
                        <ul>
                            <li><a href="#"
                                    onclick="closeApplicationWindow($('.window.contactInfo.ui-draggable'))">Close
                                    window.</a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="navigation_timetable" style="display: none;">
                    <a href="#">Timetable</a>
                    <div>
                        <ul>
                            <li><a href="#" onclick="closeApplicationWindow($('.window.timetable.ui-draggable'))">Close
                                    window.</a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="navigation_calendar" style="display: none;">
                    <a href="#">Calendar</a>
                    <div>
                        <ul>
                            <li><a href="#" onclick="closeApplicationWindow($('.window.calendar.ui-draggable'))">Close
                                    window.</a>
                            </li>
                        </ul>
                    </div>
                </li>
            </ul>
        </nav>
        <nav id="menu-right">
            <ul>
                <li>
                    <a href="#" onclick="toggleNotificationCenter()"><span id="notificationIcon"></span></a>
                </li>
                <li>
                    <a href="#"><b><span id="personName">Max Mustermann</span></b>
                    </a>
                <li>
                    <a href="#" id="clock">00:00:00</a>
                </li>
            </ul>
        </nav>
    </menu>
    <!-- End: Navigation Bar -->

    <!-- Start: Dock -->
    <div id="dock">
        <ul>
            <li id="dock_contactInfo">
                <a id="eins" class='osx-tooltip' href="#" data-text="Contact Info">
                    <span class="dock_dot dock_dotHidden"><img src="assets/images/dock/finder.png"
                            alt="Contact Info" /></span>
                </a>
            </li>
            <li id="dock_timetable">
                <a id="zwei" class='osx-tooltip' href="#" data-text="Timetable">
                    <span class="dock_dot dock_dotHidden"><img src="assets/images/dock/reminders.png"
                            alt="Timetable" /></span>
                </a>
            </li>
            <li id="dock_teacherList">
                <a id="drei" class='osx-tooltip' href="#" data-text="Teacher List">
                    <span class="dock_dot dock_dotHidden"><img src="assets/images/dock/contacts.png"
                            alt="Teacher List" /></span>
                </a>
            </li>
            <li id="dock_calendar">
                <a id="vier" class='osx-tooltip' href="#" data-text="Calendar">
                    <span class="dock_dot dock_dotHidden"><img src="assets/images/dock/calendar.png"
                            alt="Calendar" /></span>
                </a>
            </li>
        </ul>
    </div>
    <!-- End: Dock -->

    <!-- Start: Notification Center -->
    <div id="notificationCenter" style="display: none;">
        <div id="notification_content">
            <ul id="notification_HEADER">
                <li id="notification_todayHeading">
                    Today
                </li>
            </ul>
            <br />
            <div class="notification_seperator"></div>
            <br>
            <li class="notification_entry">
                <span class="notification_entryText">
                    <span class="notification_date_area">
                        <span id="notificationDate"></span>
                    </span>
                </span>
            </li>
            <ul id="notification_notifications">
                <li class="notification_heading">
                    <div class="notification_icon school_icon">
                    </div> School Year - Overview:
                </li>
                <li class="notification_entry">
                    <span class="notification_entryText">
                        Remaining School Year Duration:
                        <br>
                        <span class="chart" data-percent="0">
                            <span class="percent"></span>
                        </span>
                        <br>
                        <span class="notification_legendBar notification_legendBar--past"></span>&nbsp;&nbsp;&nbsp;= %
                        of the past school year
                        <br>
                        <span
                            class="notification_legendBar notification_legendBar--remaining"></span>&nbsp;&nbsp;&nbsp;=
                        % of the remaining school year
                    </span>
                </li>
                <li class="notification_heading">
                    <div class="notification_icon moodle_icon">
                    </div> Moodle - Submission Deadlines:
                    <div id="close">
                        <div id="left-half" class="bevel-box"></div>
                        <div id="centre"></div>
                        <div id="right-half" onclick="clearNotificationCenter()" class="bevel-box text-shadow">Clear
                        </div>
                        <div id="x" class="text-shadow" onclick="clearNotificationCenter()">×</div>
                    </div>
                </li>
                <li class="notification_entry notification_entry--task">
                    <span class="notification_entryHeading">GIS</span>
                    <span class="notification_entryText notification_entryDate">Tuesday, 21 April,
                        10:00</span>
                    <br>
                    <span class="notification_entryText">
                        LE19 - Digitizing Areas
                    </span>
                </li>
                <li class="notification_entry notification_entry--task">
                    <span class="notification_entryHeading">PRE</span>
                    <span class="notification_entryText notification_entryDate">Wednesday, 22 April,
                        10:00</span>
                    <br>
                    <span class="notification_entryText">
                        Upload Status Report
                    </span>
                </li>
                <li class="notification_entry notification_entry--empty" style="display: none;">
                    <span class="notification_entryText">
                        <i>No new tasks found.</i>
                    </span>
                </li>
            </ul>
        </div>
    </div>
    <!-- End: Notification Center -->

    <!-- Easter Egg: Error -->
    <div class="errorEasterEgg" style="display: none">
        <div class="errorEasterEgg_titleError">
            Critical Error
            <button class="errorEasterEgg_closeButton">X</button>
        </div>
        <div class="errorEasterEgg_message">
            <img alt="error" src="assets/images/errorEasterEgg.png" />
            An error has occurred while trying to display an error message.
        </div>
        <button class="errorEasterEgg_ok">
            <span>OK</span>
        </button>
    </div>
    <!-- End: Easter Egg -->

    <!-- Start: Desktop Icons -->
    <div class="desktop">
        <div class="deskIcon" style="left: 280px; top: 120px;">
            <img src="assets/images/textedit.png" id="readmeRightClick" oncontextmenu="javascript:readMeRightClick()"
                ondblclick="showAboutThisProject()" alt="README.md" />
            <span>README.md</span>
        </div>
    </div>

    <!-- Start: Application Windows -->
    <div id="content">
        <!-- Window: ReadMe -->
        <div class="window" id="readMeInfoDiv" style="display: none;">
            <div class="head">
                <div class="ui-right">
                    <div class="exit"></div>
                </div>
                <div class="ui-center">
                    <p>README.md</p>
                </div>
                <div class="ui-left">
                </div>
            </div>
            <div class="body" style="overflow-y: scroll; position:relative;top: -18px; height:94%; width: 98.4%;">
                <div style="padding: 20px; text-align: center;">
                    <h3>Loading...</h3>
                    <p>Please wait while the content is loading.</p>
                </div>
            </div>
        </div>

        <!-- Window: Contact Info -->
        <div class="window contactInfo" id="contactInfo" style="display: none;">
            <div class="head">
                <div class="ui-right">
                    <div class="exit"></div>
                    <div class="minimize"></div>
                    <div class="expand"></div>
                </div>
                <div class="ui-center">
                    <p>Contact Info</p>
                </div>
                <div class="ui-left">
                </div>
            </div>
            <div class="body scrollableWindowBody" id="contactInfoBody" style="overflow-y: scroll; position:relative;top: -18px; height:94%; width: 98.4%;">
                <h3>Loading...</h3>
                <p>Please wait while the content is loading.</p>
            </div>
        </div>

        <!-- Window: Timetable -->
        <div class="window timetable" id="timetable" style="display: none;">
            <div class="head">
                <div class="ui-right">
                    <div class="exit"></div>
                    <div class="minimize"></div>
                    <div class="expand"></div>
                </div>
                <div class="ui-center">
                    <p>Timetable</p>
                </div>
                <div class="ui-left">
                </div>
            </div>
            <div class="body" id="timetableBody">
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
                <div class="center" id="timetableContent">
                    <!-- Standartmaessig wird immer ein Fehler hier angezeigt -->
                    <div class="msg warn noselect">
                        <h4>Der Stundenplan f&uuml;r deine Klasse wurde nicht gefunden.</h4>
                        <p>W&auml;hle links einen Stundenplan aus.
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Window: Calendar -->
        <div class="window calendar" id="calendar" style="display: none;">
            <div class="head">
                <div class="ui-right">
                    <div class="exit"></div>
                    <div class="minimize"></div>
                    <div class="expand"></div>
                </div>
                <div class="ui-center">
                    <p>Calendar</p>
                </div>
                <div class="ui-left">
                </div>
            </div>
            <div class="body" id="calendarBody">
                <h3>Loading...</h3>
                <p>Please wait while the content is loading.</p>
            </div>
        </div>
    </div>
    <!-- End: Application Windows -->

    <!-- Div existiert nur damit dort ein Javascript-durch Ajax ausgeführt werden kann -->
    <div id="tempDivForInfotimetable"></div>
</body>

</html>