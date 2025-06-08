    var schuelerKlasse = "";

    /* Start - Calendar week calculation */
    var KWDatum = new Date();
    var DonnerstagDat = new Date(KWDatum.getTime() + (3 - ((KWDatum.getDay() + 6) % 7)) * 86400000);
    KWJahr = DonnerstagDat.getFullYear();
    var DonnerstagKW = new Date(new Date(KWJahr, 0, 4).getTime() + (3 - ((new Date(KWJahr, 0, 4).getDay() + 6) % 7)) * 86400000);
    KW = Math.floor(1.5 + (DonnerstagDat.getTime() - DonnerstagKW.getTime()) / 86400000 / 7);
    var KWstring;
    if (KW < 10) {
        KWstring = "0" + KW;
    }
    else {
        KWstring = "" + KW;
    }    localStorage["KWstring"] = KWstring;
    /* End - Calendar week calculation */

    /* Start - Class calculation */
    $(function () {
        $.get('scripts/getContentFromPage.php?url=https%3A%2F%2Fintranet.spengergasse.at%2Finfostundenplan%2Fframes%2Fnavbar.htm&var=null', function (result) {
            var startIndex = result.indexOf("var classes");
            var endIndex = result.indexOf('var flcl');

            if (startIndex !== -1 && endIndex !== -1) {
                var result_1 = result.substring(startIndex); // Extract substring starting from "var classes"
                var result_2 = result_1.substr(0, endIndex); // Extract substring up to "var flcl"

                $("#tempDivForInfostundenplan").html('<script>' + result_2 + '\nlocalStorage["classes"] = JSON.stringify(classes);\nlocalStorage["teachers"] = JSON.stringify(teachers);\nlocalStorage["rooms"] = JSON.stringify(rooms);\n<\/script>');
                ladeInfostundenplanInPage();
            } else {
                console.error("Expected substrings not found in the result.");
            }
        });
    });

    function ladeInfostundenplanInPage() {
        var inhalt = "<div>"
            + "<ul><span>Klassen:<\/span><br>";
        var klassen = JSON.parse(localStorage["classes"]);
        for (var idx = 0; idx < klassen.length; idx++) {
            var aktueller_index_int = (idx + 1);
            var aktueller_index = aktueller_index_int + "";
            if (aktueller_index_int < 10) {
                aktueller_index = "0000" + aktueller_index;
            }
            else {
                if (aktueller_index_int < 100) {
                    aktueller_index = "000" + aktueller_index;
                }
                else {
                    if (aktueller_index_int < 1000) {
                        aktueller_index = "00" + aktueller_index;
                    }
                    else {
                        if (aktueller_index_int < 10000) {
                            aktueller_index = "0" + aktueller_index;
                        }
                    }
                }
            }
            var hinzufuegen = "<li onclick=\"ladeStundenplan('https://intranet.spengergasse.at/infostundenplan/" + KW + "/c/c" + aktueller_index + ".htm')\"><i><\/i>" + klassen[idx] + "<\/li>";
            inhalt = inhalt + hinzufuegen;
        }

        inhalt = inhalt + "<br><span>Lehrer:</span><br>";
        var lehrer = JSON.parse(localStorage["teachers"]);
        for (var idx = 0; idx < lehrer.length; idx++) {
            var aktueller_index_int = (idx + 1);
            var aktueller_index = aktueller_index_int + "";
            if (aktueller_index_int < 10) {
                aktueller_index = "0000" + aktueller_index;
            }
            else {
                if (aktueller_index_int < 100) {
                    aktueller_index = "000" + aktueller_index;
                }
                else {
                    if (aktueller_index_int < 1000) {
                        aktueller_index = "00" + aktueller_index;
                    }
                    else {
                        if (aktueller_index_int < 10000) {
                            aktueller_index = "0" + aktueller_index;
                        }
                    }
                }
            }
            var hinzufuegen = "<li onclick=\"ladeStundenplan('https://intranet.spengergasse.at/infostundenplan/" + KW + "/t/t" + aktueller_index + ".htm')\"><i><\/i>" + lehrer[idx] + "<\/li>";
            inhalt = inhalt + hinzufuegen;
        }

        inhalt = inhalt + "<br><span>R&auml;me:</span><br>";
        var raume = JSON.parse(localStorage["rooms"]);
        for (var idx = 0; idx < raume.length; idx++) {
            var aktueller_index_int = (idx + 1);
            var aktueller_index = aktueller_index_int + "";
            if (aktueller_index_int < 10) {
                aktueller_index = "0000" + aktueller_index;
            }
            else {
                if (aktueller_index_int < 100) {
                    aktueller_index = "000" + aktueller_index;
                }
                else {
                    if (aktueller_index_int < 1000) {
                        aktueller_index = "00" + aktueller_index;
                    }
                    else {
                        if (aktueller_index_int < 10000) {
                            aktueller_index = "0" + aktueller_index;
                        }
                    }
                }
            }
            var hinzufuegen = "<li onclick=\"ladeStundenplan('https://intranet.spengergasse.at/infostundenplan/" + KW + "/r/r" + aktueller_index + ".htm')\"><i><\/i>" + raume[idx] + "<\/li>";
            inhalt = inhalt + hinzufuegen;
        }
        inhalt = inhalt + "<\/ul><\/div>";
        $("#section_resize").html(inhalt);
    }

    function ladeStundenplan(link) {
        $("#stundenplanMain").html('<center><h2>Lade Seite...</h2><br> <div class="progress-bar progress-bar--yosemite"><span class="progress-bar__line" style="width: 30%;"></span></div></center>');
        $("#stundenplanMain").load("getContentFromPage.php?url=" + encodeURI(link) + "&var=null");
    }