let firstRow = document.querySelectorAll(".firstRow");
let secondRow = document.querySelectorAll(".secondRow");
let thirdRow = document.querySelectorAll(".thirdRow");
let fourthRow = document.querySelectorAll(".fourthRow");
let fifthRow = document.querySelectorAll(".fifthRow");

window.addEventListener("scroll", () => {
    Row1();
    Row2();
    Row3();
    Row4();
    Row5();
});

function Row1() {

    for (let i = 0; i < firstRow.length; i++) {

        let windowHeight = window.innerHeight;
        let revealTop = firstRow[i].getBoundingClientRect().top;
        let revealPoint = 150;

        if (revealTop < windowHeight - revealPoint) {
            firstRow[i].classList.add("active");
        }

    }

}

function Row2() {

    for (let i = 0; i < secondRow.length; i++) {

        let windowHeight = window.innerHeight;
        let revealTop = secondRow[i].getBoundingClientRect().top;
        let revealPoint = 150;

        if (revealTop < windowHeight - revealPoint) {
            secondRow[i].classList.add("active");
        }

    }

}

function Row3() {

    for (let i = 0; i < thirdRow.length; i++) {

        let windowHeight = window.innerHeight;
        let revealTop = thirdRow[i].getBoundingClientRect().top;
        let revealPoint = 150;

        if (revealTop < windowHeight - revealPoint) {
            thirdRow[i].classList.add("active");
        }

    }
    
}

function Row4() {

    for (let i = 0; i < fourthRow.length; i++) {

        let windowHeight = window.innerHeight;
        let revealTop = fourthRow[i].getBoundingClientRect().top;
        let revealPoint = 150;

        if (revealTop < windowHeight - revealPoint) {
            fourthRow[i].classList.add("active");
        }

    }
    
}

function Row5() {

    for (let i = 0; i < fifthRow.length; i++) {

        let windowHeight = window.innerHeight;
        let revealTop = fifthRow[i].getBoundingClientRect().top;
        let revealPoint = 150;

        if (revealTop < windowHeight - revealPoint) {
            fifthRow[i].classList.add("active");
        }

    }
    
}

// function slideRight() {

//     for (let i = 0; i < right.length; i++) {
        
//         let windowHeight = window.innerHeight;
//         let revealTop = right[i].getBoundingClientRect().top;
//         let revealPoint = 50;

//         if (revealTop < windowHeight - revealPoint) {
//             right[i].classList.add("active");
//         }
        
//     }
    
// }

// function slideLeft() {

//     for (let i = 0; i < left.length; i++) {
        
//         let windowHeight = window.innerHeight;
//         let revealTop = left[i].getBoundingClientRect().top;
//         let revealPoint = 50;

//         if (revealTop < windowHeight - revealPoint) {
//             left[i].classList.add("active");
//         }
        
//     }
    
// }