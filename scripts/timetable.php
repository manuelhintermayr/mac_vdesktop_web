<?php
include('login_functions.php');

if ($_SESSION['loggedIn'] == false || empty($_SESSION['loggedIn'])) {
    echo "<div class='error-message'>Not logged in.</div>";
} else {
    if (!isValidUser($_SESSION['s_username'], $_SESSION['s_pw'])) {
        echo "<div class='error-message'>Invalid credentials.</div>";
    } else {
        ?>

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

        <!-- Div existiert nur damit dort ein Javascript-durch Ajax ausgeführt werden kann -->
        <div id="tempDivForInfotimetable"></div>

        <?php
    }
}
?>