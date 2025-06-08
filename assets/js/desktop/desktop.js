 /* Start - Allgemeine Methoden fuer diese Seite */
    /* Diese Methode startet alle anderen Methoden die aufgerufen werden muessen damit die Klasse funktioniert */
    function starteCode() {
        starteUhr(); /* Zum starten der Uhr */
        prepareEventHandlers(); /* Zum aktivieren der Dock */
        configureErrorEasterEgg(); /* Start - Aktivierung des ErrorEasterEggs */
        dockPosition(); /* Zum festlegen wo die Dock ist */
        $('.chart').easyPieChart({
            easing: 'easeOutBounce',
            onStep: function (from, to, percent) {
                $(this.el).find('.percent').text(Math.round(percent));
            }
        });

        $('.menuPunktitem1').hide();
        $('.menuPunktitem2').hide();
        $('.menuPunktitem3').hide();
        $('.menuPunktKalender').hide();
        $('.menuPunktEmails').hide();

        $("#kontaktinfo").load("scripts/kontaktinfo.php");
        $("#lehrerliste").load("scripts/lehrerliste.php");
    }
    /* Berechnet wo sich die Dock befinden soll */
    function dockPosition() {
        var erg = (document.getElementById("dock").offsetWidth / 2);
        document.getElementById("dock").style.left = "calc(50% - " + erg + "px)";
    }

    /* Legt fest, welche Funktionen aufgerufen werden sollen wenn ein Item auf der Dock aufgerufen wird. */
    function prepareEventHandlers() {
        $("#dock_item1").bind('click', { item: 1 }, function (event) {
            dockAuswahl(event.data.item);
        });
        $("#dock_item2").bind('click', { item: 2 }, function (event) {
            dockAuswahl(event.data.item);
        });
        $("#dock_item3").bind('click', { item: 3 }, function (event) {
            dockAuswahl(event.data.item);
        });
        $("#dock_item4").bind('click', { item: 4 }, function (event) {
            dockAuswahl(event.data.item);
        });
    }


    /* Ein MenuPunkt der Dock wurde gewaehlt 
    @item = Das wievielte Item
    */
    function dockAuswahl(item) {
        addClassForShortTime("#dock_item" + item, "bounce");
        setTimeout(function () { }, 3000); //Warten damit die Animation zu Ende ist
        if (item == 1) {
            window.setTimeout('openEINS()', 2500);
        }
        else {
            if (item == 2) {
                window.setTimeout('openZWEI()', 2500);
            }
            else {
                if (item == 3) {
                    if (localStorage.getItem("person_typ") == "schueler") {
                        window.setTimeout('openDREI()', 2500);
                    }
                    else {
                        window.setTimeout("newErrorPopUp('Fehler', 'Starten der Anwendung fehlgeschlagen', 'Die Anwendung die versucht wurde zu starten, darf nur von einem Sch&uuml;ler gestartet werden.');", 2500);
                    }

                }
                else {
                    window.setTimeout("newErrorPopUp('Fehler', 'Unbekannte Anwendung gestartet', 'Die Anwendung die versucht wurde zu starten gibt es nicht.');", 2500);
                }
            }
        }

    }
    function openEINS() {
        openUserInfo();
    }

    function openZWEI() {
        removeClass("#dock_item2 > a > span", "deaktiviert");
        openStundenPlan();
    }

    function openDREI() {
        removeClass("#dock_item3 > a > span", "deaktiviert");
        openTeacherInfo();
    }

    function openCalendar() {
        if ($("#calendarWindow").length) {
            $("#calendarWindow").show();
        }
        else {
            $("body").append('<div class="fenster" id="calendarWindow"><div class="top"><div class="panel"><span class="first"></span><span class="second"></span><span class="third"></span></div></div><div class="inside"><iframe src="calender.html"></iframe></div></div>');
        }
    }

    /* Start - Code fuer das Rechte-Maustaste-Menue */
    $(document).bind("contextmenu", function (event) {
        event.preventDefault();
    });

    function readMeRightClick() {
        removeElement("menu.rightClickMenu"); // Zuerst die alten Loeschen
        $('<menu type=\"context\" class=\"rightClickMenu\" id=\"menu_readme\">\n  <menuitem label=\"&Ouml;ffnen\" onclick=\"zeigeUeberDiesesProejkt()\"><\/menuitem>\n  <hr>\n  <menuitem label=\"Seite neu laden\" onclick=\"location.reload();\"><\/menuitem>\n  <hr>\n  <menuitem label=\"Eigenschaften\" onclick=\"newErrorPopUp(\'Fehler\', \'Nicht verf&uuml;gbar\', \'Diese Option ist momentan noch nicht verf&uuml;gbar.\');\"><\/menuitem>\n<\/menu>')
            .appendTo("body")
            .css({ top: event.pageY + "px", left: event.pageX + "px" });
    }

    $(document).bind("click", function (event) {
        removeElement("menu.rightClickMenu");
    });
    /* Ende - Code fuer das Rechte-Maustaste-Menue */


    /* Start - Code fuer FehlerPopUps */
    /* Erzeugt ein neuer ErrorPopUp */
    function newErrorPopUp(titel, fehlermeldung, fehlerinhalt) {
        var neueID = Math.floor(Math.random() * 1000000000);
        var popUp = '<div class=\"ErrorWindow\" id=\"ErrorWindow_' + neueID + '\">\n  <div class=\"ErrorPopUp_titlebar\">\n    <div class=\"ErrorPopUp_buttons\">\n      <div class=\"ErrorPopUp_close\">\n        <a onclick=\"removeElement(\'#ErrorWindow_' + neueID + '\')\" class=\"ErrorPopUp_closebutton\" href=\"#\"><span><strong>x<\/strong><\/span><\/a>\n      <\/div>\n    <\/div>\n    ' + titel + '\n  <\/div>\n  <div class=\"ErrorPopUp_content\">\n        <div class=\"ErrorPopUp_container-alert\">\n        <img src=\"Alert.png\" alt=\"Fehler\">\n        <div class=\"ErrorPopUp_about-alert\">\n        <p><b>' + fehlermeldung + '<\/b>\n        <p>' + fehlerinhalt + '<\/p>\n        <a href=\"#\" onclick=\"removeElement(\'#ErrorWindow_' + neueID + '\')\" class=\"button\" data-rel=\"close\">Close<\/a>\n        <\/div>\n        <\/div>\n    \n  <\/div>\n<\/div>';
        $('<div/>', {
            'class': 'ErrorWindow_' + neueID,
            'id': 'ErrorWindow',
            'html': popUp
        }).appendTo('body');
        $('.ErrorWindow_' + neueID).draggable({
            revert: "invalid",
            scroll: false
        });
    }
    /* Ende - Code fuer FehlerPopUps */

    /* Start - Code fuer die Uhr */
    function starteUhr() {
        stelleUhr();
        setInterval(function () {
            stelleUhr();
        }, 1000);
    }

    function stelleUhr() {
        var clock = document.getElementById('clock');
        var d = new Date();
        var stunde = "";
        var minutes = "";
        var seconds = "";
        if (d.getHours() < 10) {
            stunde = "0" + d.getHours();
        }
        else {
            stunde = d.getHours();
        }
        if (d.getMinutes() < 10) {
            minutes = "0" + d.getMinutes();
        }
        else {
            minutes = d.getMinutes();
        }
        if (d.getSeconds() < 10) {
            seconds = "0" + d.getSeconds();
        }
        else {
            seconds = d.getSeconds();
        }
        clock.innerHTML = stunde + ':' + minutes + ':' + seconds;
    }
    /* Ende - Code fuer die Uhr */

    /* Start - Codes fuer das Navigation Center */
    function openAndCloseNotificationCenter() {
        $('#notificationCenter').toggle("slide", {
            direction: "right"
        }, 1000);

        var chart = window.chart = $('.chart').data('easyPieChart');

        //Wie viel vom Schuljahr vorbei ist.
        var today = new Date();
        var thisYear_schoolYear_start = new Date(today.getFullYear(), 8, 7); //Monat und Tag noch aendern
        var thisYear_schoolYear_end = new Date(today.getFullYear(), 6, 1); //Monat und Tag noch aendern
        var one_day = 1000 * 60 * 60 * 24; //Tag in Millisekunden
        var anzahlTageSchuljahr = 0;
        var anzahlTageSchuljahrVorbei = 0;
        if (today.getMonth() > 6 && today.getDate() > 1) //ob das Schuljahr schon vorbei ist
        {
            var nextYear_schoolYear_end = new Date(
                today.getFullYear() + 1,
                thisYear_schoolYear_end.getMonth(),
                thisYear_schoolYear_end.getDay()
            );

            anzahlTageSchuljahr = Math.ceil((nextYear_schoolYear_end - thisYear_schoolYear_start.getTime()) / (one_day));

            if (today.getMonth() <= nextYear_schoolYear_end() && today.getDay < nextYear_schoolYear_end()) {
                //dann sind noch Sommerferien
                anzahlTageSchuljahrVorbei = anzahlTageSchuljahr;
            }
            else {
                anzahlTageSchuljahrVorbei = Math.ceil((today.getTime() - nextYear_schoolYear_end.getTime()) / (one_day));
            }
        }
        else {
            //Es ist das Schuljahr von diesem Jahr noch nicht vorbei
            var oldYear_schoolYear_start = new Date(
                today.getFullYear() - 1,
                thisYear_schoolYear_start.getMonth(),
                thisYear_schoolYear_start.getDay());

            anzahlTageSchuljahr = Math.ceil((thisYear_schoolYear_end.getTime() - oldYear_schoolYear_start.getTime()) / (one_day));
            anzahlTageSchuljahrVorbei = anzahlTageSchuljahr - Math.ceil((thisYear_schoolYear_end.getTime() - today.getTime()) / (one_day));
        }
        chart.update((anzahlTageSchuljahrVorbei / anzahlTageSchuljahr) * 100);
    }

    function zeigeUeberDiesesProejkt() {
        showElement("#readMeInfoDiv");
    }

    function isFirefox() {
        if (navigator.userAgent.indexOf("Firefox") != -1) {
            return true;
        }
        return false;
    }