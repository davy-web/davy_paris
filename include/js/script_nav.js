/* JS Davy */
console.log(`
888888b.
88'  '88
88    88 .d888.b8 88    88 88    88
88    88 88'  '88 88    88 88    88
88.  .88 88.  .88 '8.  .8' 88.  .88
888888P' '8888'P8  '888P'  '8888888
                                 88
                           .d8888P'

------- contact@davy-chen.fr -------
`);

/* nav_pc_davy */
function anime_scroll_nav_pc_davy(scroll_relative_content) {
    var scroll_relative_content_davy = window.pageYOffset / 300;

    if ((scroll_relative_content_davy >= 0) && (scroll_relative_content_davy <= 1)) {
        document.body.style.setProperty(scroll_relative_content, scroll_relative_content_davy);
    }
    if (scroll_relative_content_davy < 0) {
        document.body.style.setProperty(scroll_relative_content, 0);
    }
    if (scroll_relative_content_davy > 1) {
        document.body.style.setProperty(scroll_relative_content, 1);
    }
}

window.addEventListener("scroll", () => {
    anime_scroll_nav_pc_davy("--scroll_nav_pc");
}, false);

/* nav_mobile_davy */
function nav_mobile_davy() {
    var nav_mobile_davy = document.getElementsByClassName("nav_mobile_davy");
    var menu_mobile_davy = document.getElementsByClassName("menu_mobile_davy");
    var texte_menu_mobile_davy = document.getElementsByClassName("texte_menu_mobile_davy");
    
    if (window.pageYOffset > 600) {
        for (i = 0; i < texte_menu_mobile_davy.length; i++) {
            texte_menu_mobile_davy[i].style.opacity = "0";
            texte_menu_mobile_davy[i].style.transform = "translate(0px, -20px)";
            menu_mobile_davy[i].style.height = "48px";
        }
        nav_mobile_davy[0].style.height = "48px";
    }
    if (window.pageYOffset <= 600) {
        for (i = 0; i < texte_menu_mobile_davy.length; i++) {
            texte_menu_mobile_davy[i].style.opacity = "1";
            texte_menu_mobile_davy[i].style.transform = "translate(0px, -8px)";
            menu_mobile_davy[i].style.height = "60px";
        }
        nav_mobile_davy[0].style.height = "60px";
    }
}
function nav_mobile_lien_davy(id) {
    var menu_lien_pc_davy = document.getElementsByClassName("menu_lien_pc_davy");

    for (i = 0; i < menu_lien_pc_davy.length; i++) {
        if (menu_lien_pc_davy[i].className.indexOf("menu_lien_pc_active_davy") != -1) {
            menu_lien_pc_davy[i].className = menu_lien_pc_davy[i].className.replace(" menu_lien_pc_active_davy", "");
        }
    }
    if (id >= 0) {
        if (menu_lien_pc_davy[id].className.indexOf("menu_lien_pc_active_davy") == -1) {
            menu_lien_pc_davy[id].className += " menu_lien_pc_active_davy";
        }
    }
}