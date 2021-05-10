/* anime_scroll_relative_content_davy */
function anime_scroll_relative_content_davy(block_anime_scroll_relative_content_davy, scroll_relative_content) {
    var block_anime_scroll_relative_content = document.getElementsByClassName(block_anime_scroll_relative_content_davy);
    var scroll_relative_content_davy = (window.pageYOffset - block_anime_scroll_relative_content[0].offsetTop) / (block_anime_scroll_relative_content[0].offsetHeight);

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
    anime_scroll_relative_content_davy("block_anime_scroll_relative_content_1_davy", "--scroll_relative_content_1");
}, false);
