let reveals = document.querySelectorAll(".reveal");
let PPN = document.querySelectorAll(".PPN");
let skills = document.querySelectorAll(".skills");
let levels1 = document.querySelectorAll(".levels-1");
let levels2 = document.querySelectorAll(".levels-2");
let levels3 = document.querySelectorAll(".levels-3");

window.addEventListener("scroll", () => {
    reveal();
    revealPPN();
});

function reveal() {

    for (let i = 0; i < reveals.length; i++) {
        
        let windowHeight = window.innerHeight;
        let revealTop = reveals[i].getBoundingClientRect().top;
        let revealPoint = 150;

        if (revealTop < windowHeight - revealPoint) {
            reveals[i].classList.add("active");
        } 
    } 
}

function revealPPN() {

    for (let i = 0; i < PPN.length; i++) {
        
        let windowHeight = window.innerHeight;
        let revealTop = PPN[i].getBoundingClientRect().top;
        let revealPoint = 150;

        if (revealTop < windowHeight - revealPoint) {
            // PPN[i].classList.add("active");
            for (let i = 0; i < skills.length; i++) {
                skills[i].classList.add("active");
                levels1[i].classList.add("active");
                levels2[i].classList.add("active");
                levels3[i].classList.add("active");
            }
        } 
    } 
}