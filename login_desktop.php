
<?php
     // ini_set('display_errors',1);
session_start();
include('functions.inc.php');
do_header_start("Login");
if($_SESSION['loggedIn'] == false || empty($_SESSION['loggedIn']))
{	
	//Dann ist noch nicht angemeldet worden    
}
else
{
    echo "Bereits angemeldet. Weiterleitung zur index.php-Seite. <a href='logout.php'>Logout</a>";
    header("Location: index.php");
    echo '<meta http-equiv="refresh" content="0; url=index.php" />';
}
?>
        <script src="jquery.min_v1.11.0.js"></script>
        <script src="jquery-ui.min_v1.11.2.js"></script>
<script type="text/javascript">



    function login() {
        $("#SPAN_29").hide();
        $("#loadingSpinner").show();
        $.ajax({
            type: "POST",
            url: 'login_ajax.php',
            data: $('form').serialize(),
            dataType: 'json',
            success: function (data) {
                $('section').fadeOut('slow', function () {
                    $('body').css({ 'background-image': "url(yosemite.jpg)" });
                    $('section').html('<span style="border-color: rgba(255, 255, 255, 0.498039); padding:2px; background: rgba(255, 255, 255, 0.4);">Lade Hauptseite... </span>').fadeIn('fast', function () {
                        
                        window.history.pushState("", "", '/test/projects/mac/index.php');
                    });
                });
                location.reload();
                $("body").load("index_old.php");
            },
            statusCode: {
                403: function (e) {
                    $("#loadingSpinner").hide();
                    $("#SPAN_29").show();
                    $("#message").html(e.responseText);
                    fehlAnmeldung();
                },
                500: function (e) {
                    $("#loadingSpinner").hide();
                    $("#SPAN_29").show();
                    $("#message").html("Anmelde-Server funktioniert momentan nicht. <br><u>(500 Error Response)</u>");
                    fehlAnmeldung();
                }
            }
        });
        return false;
    }


    function fehlAnmeldung() {
        $("#SECTION_4").show("slow");
        $("#SECTION_8").addClass("error");
        window.setTimeout('removeClass("#SECTION_8","error")', 1000);
    }

    function removeClass(id, className) {
        $(id).removeClass(className);
    }

    function loadAnfang() {
        $("#A_28").click(function (event) {
            event.preventDefault();
            login();
        });

    }

</script>

<script>
    window.setTimeout('loadAnfang()', 3000);      
</script>

<link rel="stylesheet" href="login.css" type="text/css" />
<?php 
do_header_end();
?>




<section>
    <span id="hintergrund"></span> 
    <span id="cancelButton">
        <center><a href="javascript:window.close();"><img src="cancelbutton.png"></a></center>
    </span>
    <form>
        <div id="DIV_1">
	        <div id="DIV_3">
			    <section id="SECTION_4" style="display: none;">
				    <p id="P_5">
					    Folgender Fehler aufgetreten:
				    </p>
				    <p id="P_6">
                        <b>
                            <div id='message'></div>
                        </b>
				    </p>
                    <a href="javascript:void(0)" id="A_7"></a>
			</section>
			<section id="SECTION_8">
				<div id="DIV_9">
					<h1 id="H1_10">
						Login
					</h1><span id="SPAN_11"></span>
				</div>
				<div id="DIV_12">
					<table id="TABLE_13">
						<tbody id="TBODY_14">
							<tr id="TR_15">
								<td id="TD_16">
									<label for="USERNAME" id="LABEL_17">
										Username
									</label>
								</td>
								<td id="TD_18">
                                    <input type="text" id="INPUT_20" name="user" placeholder="Enter Username" value="" size="40" maxlength="100" />
								</td>
							</tr>
							<tr id="TR_21">
								<td id="TD_22">
									<label for="PASSWORD" id="LABEL_23">
										Password
									</label>
								</td>
								<td id="TD_24">
									<input type="password" name="pass" size="40" maxlength="100" id="INPUT_26" placeholder="Enter Password" />
								</td>
								<td id="TD_27">
									<span id="A_28"><span id="SPAN_29" class="loginButton"></span>
                                    <img alt="loading" id="loadingSpinner" style="display: none;"src="images/spinner.gif" />
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

<style>

</style>



<?php
do_html_end();
?>