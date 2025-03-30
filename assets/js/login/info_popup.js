setTimeout(function () {
    $("#infoPopup").draggable({
        handle: ".mac-titlebar",
        scroll: false,
        opacity: 0.8
    });
    $("#closePopup, .mac-close").on("click", function () {
        $("#infoPopup").fadeOut(300);
    });
    $("#infoPopup").fadeIn(400);
}, 3000);