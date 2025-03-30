function loadAnfang() {
    $("#loginButton").click(function (event) {
        event.preventDefault();
        login();
    });
    $(".login-input").on("keydown", function (event) {
        if (event.key === "Enter") {
            event.preventDefault();
            login();
        }
    });
}
window.addEventListener('DOMContentLoaded', loadAnfang);