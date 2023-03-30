var buttons = document.getElementsByClassName("footer-buttons");
var i;

for (i = 0; i < buttons.length; i++) {
    
    buttons[i].addEventListener("click", function() {
        
        this.classList.toggle("active");
        var panel = this.nextElementSibling;

        if (panel.style.maxHeight) {
            panel.style.maxHeight = null;
        } 
        else {
            panel.style.maxHeight = panel.scrollHeight + "px";
        } 

    });

}