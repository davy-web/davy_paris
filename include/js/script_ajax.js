/* Ajax */
function ajax_davy(id, url, variable) {
    if (variable.length == 0) {
        document.getElementById(id).innerHTML = "";
        return;
    }
    else {
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