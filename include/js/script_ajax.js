/* Ajax */
function ajax_davy(id, url, variable) {
    if (id.length != 0 && url.length != 0 && variable.length != 0) {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById(id).innerHTML = this.responseText;
            }
        }
        xmlhttp.open("GET", url + variable, true);
        xmlhttp.send();
    }
}