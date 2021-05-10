/* anime_scroll_davy */
function anime_scroll_davy(scroll_hauteur) {
    var anime_scroll_davy = document.getElementsByClassName("anime_scroll_davy");

    for (i = 0; i < anime_scroll_davy.length; i++) {
        var scroll_position = anime_scroll_davy[i].getBoundingClientRect().top - window.innerHeight + scroll_hauteur;
        var scroll_position2 = anime_scroll_davy[i].getBoundingClientRect().top + anime_scroll_davy[i].offsetHeight;
        
        if (scroll_position < 0 && scroll_position2 > 0) {
            if (anime_scroll_davy[i].className.indexOf("show") == -1) {
                anime_scroll_davy[i].className += " show";
            }
        }
        else {
            if (anime_scroll_davy[i].className.indexOf("show") != -1) {
                anime_scroll_davy[i].className = anime_scroll_davy[i].className.replace(" show", "");
            }
        }
    }
}

window.addEventListener("scroll", () => {
    anime_scroll_davy(30);
}, false);