/* sidebar_davy */
var sidebar_admin_davy = document.getElementsByClassName("sidebar_admin_davy");
var main_admin_davy = document.getElementsByClassName("main_admin_davy");
var bouton_menu_davy = document.getElementsByClassName("bouton_menu_davy");
var lien_panel_davy = document.getElementsByClassName("lien_panel_davy");
var bouton_deconnecter_davy = document.getElementById("bouton_deconnecter_davy");
var admin_davy = 1;

bouton_menu_davy[0].addEventListener("click", function() {
    if (admin_davy == 1) {
        main_admin_davy[0].style.marginLeft = "200px";
        main_admin_davy[0].style.width = "calc(100% - 200px)";
        sidebar_admin_davy[0].style.width = "200px";
        for (var i = 0; i < lien_panel_davy.length; i++) {
            lien_panel_davy[i].style.display = "block";
        }
        bouton_deconnecter_davy.style.display = "block";
        admin_davy = 0;
    }
    else {
        main_admin_davy[0].style.marginLeft = "50px";
        main_admin_davy[0].style.width = "calc(100% - 50px)";
        sidebar_admin_davy[0].style.width = "50px";
        for (var i = 0; i < lien_panel_davy.length; i++) {
            lien_panel_davy[i].style.display = "none";
        }
        bouton_deconnecter_davy.style.display = "none";
        admin_davy = 1;
    }
});