/* nav_lien_active */
function nav_lien_active(class_lien_active) {
    let nav_lien_active = document.getElementsByClassName(class_lien_active);

    for (i = 0; i < nav_lien_active.length; i++) {
        if (nav_lien_active[i].className.indexOf("lien_active_davy") == -1) {
            nav_lien_active[i].className += " lien_active_davy";
        }
    }
}