let reveals = document.querySelectorAll(".reveal");
let numbers = document.querySelectorAll(".numbers");
let div = document.querySelector(".revealContainer");
let tens = document.querySelectorAll(".tens");
let units = document.querySelectorAll(".units");
let icon = document.querySelectorAll(".icon");
let test = document.querySelector(".test");
let buildingValuesUnits = document.querySelectorAll(".building-values-units");
let buildingValuesTen = document.querySelectorAll(".building-values-ten");

let spanContainers = document.querySelectorAll(".spanContainer");

window.addEventListener("scroll", () => {
    reveal();
    opacity();
    slideUp();
});

// Reveal Animation

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

function opacity() {

    for (let i = 0; i < numbers.length; i++) {
        
        let windowHeight = window.innerHeight;
        let revealTop = numbers[i].getBoundingClientRect().top;
        let revealPoint = 150;

        if (revealTop < windowHeight - revealPoint) {
            numbers[i].classList.add("active");
        }
    }
}

function slideUp() {

    for (let i = 0; i < icon.length; i++) {
        
        let windowHeight = window.innerHeight;
        let revealTop = icon[i].getBoundingClientRect().top;
        let revealPoint = 150;

        if (revealTop < windowHeight - revealPoint) {
            icon[i].classList.add("active");
        }
    }
}

// Counter Animation

let CounterObserver = new IntersectionObserver((entries, observer) => {
    let [entry] = entries;
    if (!entry.isIntersecting) return;
    let speed = 900;

    tens.forEach((span, index) => {
        function UpdateCounter() {
            const targetNumber = +span.dataset.target;
            const initialNumber = +span.innerText;
            const incPerCount = targetNumber / speed;
            if (initialNumber < targetNumber) {
                span.innerText = Math.ceil(initialNumber + incPerCount);
                setTimeout(UpdateCounter, 50);
            }
        }
        UpdateCounter();
    });
}, {
    root:null,
    threshold:0.4,
});

CounterObserver.observe(div);

let CounterObserver2 = new IntersectionObserver((entries, observer) => {
    let [entry] = entries;
    if (!entry.isIntersecting) return;
    let speed = 700;

    units.forEach((span, index) => {
        function UpdateCounter() {
            const targetNumber = +span.dataset.target;
            const initialNumber = +span.innerText;
            const incPerCount = targetNumber / speed;
            if (initialNumber < targetNumber) {
                span.innerText = Math.ceil(initialNumber + incPerCount);
                setTimeout(UpdateCounter, 1000);
            }
        }
        UpdateCounter();
    });
}, {
    root:null,
    threshold:0.4,
});

CounterObserver2.observe(div);

let CounterObserver3 = new IntersectionObserver((entries, observer) => {
    let [entry] = entries;
    if (!entry.isIntersecting) return;
    let speed = 900;

    buildingValuesTen.forEach((span, index) => {
        function UpdateCounter() {
            const targetNumber = +span.dataset.target;
            const initialNumber = +span.innerText;
            const incPerCount = targetNumber / speed;
            if (initialNumber < targetNumber) {
                span.innerText = Math.ceil(initialNumber + incPerCount);
                setTimeout(UpdateCounter, 150);
            }
        }
        UpdateCounter();
    });
}, {
    root:null,
    threshold:0.4,
});

CounterObserver3.observe(test);

let CounterObserver4 = new IntersectionObserver((entries, observer) => {
    let [entry] = entries;
    if (!entry.isIntersecting) return;
    let speed = 900;

    buildingValuesUnits.forEach((span, index) => {
        function UpdateCounter() {
            const targetNumber = +span.dataset.target;
            const initialNumber = +span.innerText;
            const incPerCount = targetNumber / speed;
            if (initialNumber < targetNumber) {
                span.innerText = Math.ceil(initialNumber + incPerCount);
                setTimeout(UpdateCounter, 1000);
            }
        }
        UpdateCounter();
    });
}, {
    root:null,
    threshold:0.4,
});

CounterObserver4.observe(test);

// GALLERIE DEPARTEMENT //

document.querySelectorAll(".gallery-images").forEach(item => {
   item.addEventListener("click", event => {
       for (let i = 0; i < body.length; i++) {
           body[i].classList.add("active");
       }
   });
});

document.querySelectorAll(".gallery img").forEach(image => {
    image.onclick = () => {
        document.querySelector(".popup-image").style.display = "block";
        document.querySelector(".popup-image img").src = image.getAttribute('src');
    }
});

document.querySelector('.popup-image span').onclick = () => {
    document.querySelector(".popup-image").style.display = "none";
    for (let i = 0; i < body.length; i++) {
        body[i].classList.remove("active");
    }
}

// GALLERIE REALISATIONS //

document.querySelectorAll(".realizations-images").forEach(item => {
    item.addEventListener("click", event => {
        for (let i = 0; i < body.length; i++) {
            body[i].classList.add("active");
        }
    });
});

document.querySelectorAll(".galleryContainer img").forEach(image => {
    image.onclick = () => {
        document.querySelector(".gallery-popup-image").style.display = "block";
        document.querySelector(".gallery-popup-image img").src = image.getAttribute('src');
    }
});

document.querySelector('.gallery-popup-image span').onclick = () => {
    document.querySelector(".gallery-popup-image").style.display = "none";
    for (let i = 0; i < body.length; i++) {
        body[i].classList.remove("active");
    }
}