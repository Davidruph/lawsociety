let images = document.querySelectorAll('.slide');
let start = 0;
images[start].style.display = 'block';

document.querySelectorAll('.dot').forEach((elem, index) => {
    elem.addEventListener('click', () => {
        for (let i = 0; i < images.length; i++) {
            images[i].style.display = 'none';
        }
        images[index].style.display = 'block';
    })
})

/*  Scroll */
const toTop = document.querySelector(".to-top");

window.addEventListener("scroll", () => {
    if (window.pageYOffset > 100) {
        toTop.classList.add("active");
    } else {
        toTop.classList.remove("active");
    }
})


$(document).ready(function() {
    $('.impact__count ').counterUp({
        delay: 10,
        time: 1200
    });
});

let actions = document.querySelectorAll('.gllry__part')
let index = 0

function next() {
    actions[index].classList.remove('active');
    index = (index + 1) % actions.length;
    actions[index].classList.add('active');
}

function prev() {
    actions[index].classList.remove('active');
    index = (index - 1 + actions.length) % actions.length;
    actions[index].classList.add('active');
}
