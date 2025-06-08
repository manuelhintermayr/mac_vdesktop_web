<?php
include('login_functions.php');
include('getTimetable_data.php'); // Updated path

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
                            <span>Classes:</span>
                            <br>
                            <?php if (!empty($mockClasses)): ?>
                                <?php foreach ($mockClasses as $id => $name): ?>
                                <li onclick="loadTimetable('<?php echo htmlspecialchars($id); ?>', 'class')" class="timetable-link" data-type="class" data-id="<?php echo htmlspecialchars($id); ?>">
                                    <i></i><?php echo htmlspecialchars($id); ?>
                                </li>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <li><i></i>No entries available.</li>
                            <?php endif; ?>
                            <br>
                            <span>Teachers:</span>
                            <br>
                            <?php if (!empty($mockTeachers)): ?>
                                <?php foreach ($mockTeachers as $id => $name): ?>
                                <li onclick="loadTimetable('<?php echo htmlspecialchars($id); ?>', 'teacher')" class="timetable-link" data-type="teacher" data-id="<?php echo htmlspecialchars($id); ?>">
                                    <i></i><?php echo htmlspecialchars($name); ?>
                                </li>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <li><i></i>No entries available.</li>
                            <?php endif; ?>
                            <br>
                            <span>Rooms:</span>
                            <br>
                            <?php if (!empty($mockRooms)): ?>
                                <?php foreach ($mockRooms as $id => $name): ?>
                                <li onclick="loadTimetable('<?php echo htmlspecialchars($id); ?>', 'room')" class="timetable-link" data-type="room" data-id="<?php echo htmlspecialchars($id); ?>">
                                    <i></i><?php echo htmlspecialchars($id); ?>
                                </li>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <li><i></i>No entries available.</li>
                            <?php endif; ?>
                        </ul>
                    </div>
                </div>
                <div class="center" id="timetableContent">
                    <!-- Standardmässig wird immer ein Fehler hier angezeigt -->
                    <div class="msg warn noselect">
                        <h4>The timetable for your class was not found.</h4>
                        <p>Please select a timetable on the left.
                        </p>
                    </div>
                </div>
        <?php
    }
}
?>