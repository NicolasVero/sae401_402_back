const body = document.getElementsByTagName("body");

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