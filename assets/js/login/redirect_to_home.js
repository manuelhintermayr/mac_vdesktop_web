function confirmExit(event) {
    event.preventDefault();
    const confirmed = confirm("Do you really want to leave the site?\n\nYou will be redirected to the author's website.");
    if (confirmed) {
        window.location.href = "https://manuelhintermayr.com";
    }
}