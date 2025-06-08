/* Start - Diverse Variablen */

/* This should normally be loaded by the database */
localStorage.setItem("person_typ", "Administrator");
localStorage.setItem("person_name", "Max Mustermann");
localStorage.setItem("person_kuerzel", "MM");

/* Ende - Diverse Variablen */

$("#personName").html(localStorage.getItem("person_name"));