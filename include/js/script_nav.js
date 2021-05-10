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
/*
window.addEventListener("scroll", () => {
    nav_mobile_davy();
}, false);
*/
/* Ajax */
/*
var page_accueil_davy = document.getElementById("page_accueil_davy");
var page_realisations_davy = document.getElementById("page_realisations_davy");
var page_profil_davy = document.getElementById("page_profil_davy");
var page_contact_davy = document.getElementById("page_contact_davy");
var page_accueil = document.getElementById("page_accueil");
var page_realisations = document.getElementById("page_realisations");
var page_profil = document.getElementById("page_profil");
var page_contact = document.getElementById("page_contact");
var balise_title_davy = document.getElementsByTagName("title");
var xhttp;

if (window.XMLHttpRequest) {
    xhttp = new XMLHttpRequest();
}
else {
    xhttp = new ActiveXObject("Microsoft.XMLHTTP");
}
xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
        document.getElementById("content_davy").innerHTML = this.responseText;
    }
};
page_accueil_davy.addEventListener('click', function_page_accueil_davy);
page_accueil.addEventListener('click', function_page_accueil_davy);
function function_page_accueil_davy() {
    history.pushState('', '', 'https://davy-chen.fr');
    xhttp.open("GET", "https://davy-chen.fr/content-index.html", true);
    xhttp.send();
    balise_title_davy[0].innerHTML = "Davy Chen - Développeur Web";
    page_id = "accueil";
    nav_mobile_lien_davy(-1);
    setTimeout(() => {
        document.body.scrollTop = 0;
        document.documentElement.scrollTop = 0;
    }, 300);
}
page_realisations_davy.addEventListener('click', function_page_realisations_davy);
page_realisations.addEventListener('click', function_page_realisations_davy);
function function_page_realisations_davy() {
    history.pushState('', '', 'https://davy-chen.fr/realisations');
    xhttp.open("GET", "https://davy-chen.fr/content-realisations.html", true);
    xhttp.send();
    balise_title_davy[0].innerHTML = "Réalisations - Davy Chen";
    page_id = "realisations";
    nav_mobile_lien_davy(0);
    setTimeout(() => {
        document.body.scrollTop = 0;
        document.documentElement.scrollTop = 0;
    }, 300);
}
page_profil_davy.addEventListener('click', function_page_profil_davy);
page_profil.addEventListener('click', function_page_profil_davy);
function function_page_profil_davy() {
    history.pushState('', '', 'https://davy-chen.fr/profil');
    xhttp.open("GET", "https://davy-chen.fr/content-profil.html", true);
    xhttp.send();
    balise_title_davy[0].innerHTML = "Profil - Davy Chen";
    page_id = "profil";
    nav_mobile_lien_davy(1);
    setTimeout(() => {
        document.body.scrollTop = 0;
        document.documentElement.scrollTop = 0;
    }, 300);
}
page_contact.addEventListener('click', function_page_contact_davy);
function function_page_contact_davy() {
    history.pushState('', '', 'https://davy-chen.fr/contact');
    xhttp.open("GET", "https://davy-chen.fr/content-contact.html", true);
    xhttp.send();
    balise_title_davy[0].innerHTML = "Contact - Davy Chen";
    page_id = "contact";
    nav_mobile_lien_davy(2);
    setTimeout(() => {
        document.body.scrollTop = 0;
        document.documentElement.scrollTop = 0;
    }, 300);
    setTimeout(() => {
        document.location.href = 'https://davy-chen.fr/contact';
    }, 600);
}
*/