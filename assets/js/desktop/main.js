/* Start - Allgemeine Javascripts */
/* Entfernt ein Element */
function removeElement(target) {
    $(target).remove();
}
/* Fuegt eine Class zu einem Element mit den im "id"-String genannten Identifikator hinzu. */
function addClass(id, className) {
    $(id).addClass(className);
}
/* Entfernt eine Class zu einem Element mit den im "id"-String genannten Identifikator.*/
function removeClass(id, className) {
    $(id).removeClass(className);
}
/*Fuegt eine Class zu einem Element mit den im "id"-String genannten Identifikator hinzu und entfernt diesen
anschliessend nach einer Sekunde wieder (= 1 Sekunde). Gut fuer CSS-Animationen.*/
function addClassForShortTime(id, className) {
    addClass(id, className);
    window.setTimeout('removeClass("' + id + '","' + className + '")', 3000);
}
/* Zeigt ein Element an */
function showElement(target) {
    $(target).show("slow");
}
/* Ende - Allgemeine Javascripts */