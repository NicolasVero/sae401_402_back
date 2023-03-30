const body = document.getElementsByTagName("body");
const nav = document.querySelector("nav");
const logo = document.querySelector(".nav-img");
const navLinks = document.querySelector(".nav-links");
const navBurger = document.querySelector(".nav-burger");

let width = document.body.offsetWidth;

window.onscroll = function() {
    var top = window.scrollY;
    // console.log(top);

    if (top >= 100) {
        nav.classList.add("active");
        logo.classList.add("active");
        navLinks.classList.add("active");
        navBurger.classList.add("active");
    }
    else {
        nav.classList.remove("active");
        logo.classList.remove("active");
        navLinks.classList.remove("active");
        navBurger.classList.remove("active");
    }
}

navBurger.addEventListener("click", () => {
    for (let i = 0; i < body.length; i++) {
        body[i].classList.toggle("active");
    }
    navBurger.classList.toggle("open");
    navLinks.classList.toggle("open");
});

if (width > 768) {
    navBurger.addEventListener("click", () => {
        navBurger.classList.toggle("open");
        navLinks.classList.toggle("open");
    });
} else if (width <= 768) {
    document.querySelectorAll(".links").forEach(item => {
        item.addEventListener("click", event => {
            for (let i = 0; i < body.length; i++) {
                body[i].classList.toggle("active");
            }
            navBurger.classList.toggle("open");
            navLinks.classList.toggle("open");
        });
    });
}