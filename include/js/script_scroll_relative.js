/* anime_scroll_relative_davy */
function anime_scroll_relative_davy(block_anime_scroll_relative_davy, scroll_relative) {
    var block_anime_scroll_relative = document.getElementsByClassName(block_anime_scroll_relative_davy);
    var scroll_relative_davy = (window.pageYOffset - block_anime_scroll_relative[0].offsetTop + window.innerHeight) / (window.innerHeight + block_anime_scroll_relative[0].offsetHeight);

    if ((scroll_relative_davy >= 0) && (scroll_relative_davy <= 1)) {
        document.body.style.setProperty(scroll_relative, scroll_relative_davy);
    }
    if (scroll_relative_davy < 0) {
        document.body.style.setProperty(scroll_relative, 0);
    }
    if (scroll_relative_davy > 1) {
        document.body.style.setProperty(scroll_relative, 1);
    }
}