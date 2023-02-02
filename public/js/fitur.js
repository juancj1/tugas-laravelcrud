const buttonMobile = document.querySelector('.mobile-btn');
const navigation = document.querySelector("nav");

buttonMobile.addEventListener("click", function(event) {
    this.classList.toggle('active');
    navigation.classList.toggle('active');
})

document.querySelectorAll("a[href*='get-started']").forEach(function(anchor) {
    anchor.classList.add('button-primary');
    anchor.addEventListener("click",(event)=> {
        alert("Membuka popup");
    });
});

document.querySelectorAll("li.has-child").forEach(function(anchor) {
    anchor.querySelector(".caret").addEventListener("click",(event)=> {
        anchor.classList.toggle('active');
    });
});