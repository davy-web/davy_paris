/* anime_scroll_relative_edge_davy */
function anime_scroll_relative_edge_davy(block_anime_scroll_relative_edge_davy, scroll_relative_edge, yt, yb) {
    var block_anime_scroll_relative_edge = document.getElementsByClassName(block_anime_scroll_relative_edge_davy);
    var scroll_relative_edge_davy = (window.pageYOffset - block_anime_scroll_relative_edge[0].offsetTop + window.innerHeight - block_anime_scroll_relative_edge[0].offsetHeight - yb) / (window.innerHeight - block_anime_scroll_relative_edge[0].offsetHeight - yt - yb);

    if ((scroll_relative_edge_davy >= 0) && (scroll_relative_edge_davy <= 1)) {
        document.body.style.setProperty(scroll_relative_edge, scroll_relative_edge_davy);
    }
    if (scroll_relative_edge_davy < 0) {
        document.body.style.setProperty(scroll_relative_edge, 0);
    }
    if (scroll_relative_edge_davy > 1) {
        document.body.style.setProperty(scroll_relative_edge, 1);
    }
}
/*
window.addEventListener("scroll", () => {
    if (page_id == "accueil") {
        anime_scroll_relative_edge_davy("block_anime_scroll_relative_edge_1_davy", "--scroll_relative_edge_1", 0, -150);
    }
}, false);
*/