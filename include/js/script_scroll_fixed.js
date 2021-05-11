/* anime_scroll_fixed_davy */
function anime_scroll_fixed_davy(zone_anime_scroll_fixed_davy, block_anime_scroll_fixed_davy, scroll) {
    var zone_anime_scroll_fixed = document.getElementsByClassName(zone_anime_scroll_fixed_davy);
    var block_anime_scroll_fixed = document.getElementsByClassName(block_anime_scroll_fixed_davy);
    var scroll_davy = (window.pageYOffset - zone_anime_scroll_fixed[0].offsetTop) / (zone_anime_scroll_fixed[0].offsetHeight - window.innerHeight);

    if ((scroll_davy >= 0) && (scroll_davy <= 1)) {
        document.body.style.setProperty(scroll, scroll_davy);
        block_anime_scroll_fixed[0].style.position = "fixed";
        block_anime_scroll_fixed[0].style.top = "50%";
        block_anime_scroll_fixed[0].style.transform = "translate(-50%, -50%)";
    }
    if (scroll_davy < 0) {
        document.body.style.setProperty(scroll, 0);
        block_anime_scroll_fixed[0].style.position = "absolute";
        block_anime_scroll_fixed[0].style.top = "0%";
        block_anime_scroll_fixed[0].style.transform = "translate(-50%, 0%)";
    }
    if (scroll_davy > 1) {
        document.body.style.setProperty(scroll, 1);
        block_anime_scroll_fixed[0].style.position = "absolute";
        block_anime_scroll_fixed[0].style.top = (zone_anime_scroll_fixed[0].offsetHeight - window.innerHeight) + "px";
        block_anime_scroll_fixed[0].style.transform = "translate(-50%, 0%)";
    }
}