/* accordion_davy */
var block_accordion_davy = document.getElementsByClassName("block_accordion_davy");
var fleche_accordion_davy = document.getElementsByClassName("fleche_accordion_davy");

for (var i = 0; i < block_accordion_davy.length; i++) {
    block_accordion_davy[i].addEventListener("click", function() {
        this.nextElementSibling.classList.toggle("desactive_accordion");
    });
}
for (var j = 0; j < fleche_accordion_davy.length; j++) {
    fleche_accordion_davy[j].addEventListener("click", function() {
        this.classList.toggle("fleche_accordion");
    });
}