let upButton = document.querySelector('.up-button');
let menu = document.querySelector('.header__menu--mobile');
let menuButton = document.querySelector('.menu__icon');
let menuList = document.querySelector('.menu__list--mobile');

let clouseMenu = function() {
    menuButton.classList.remove('menu__icon--open');
    menuList.classList.remove('menu__list--open');
}

window.addEventListener('scroll', function() {
    if (window.pageYOffset > 80) {
        clouseMenu();
    }

    if (window.pageYOffset > 200) {
      upButton.classList.add('shown');
    } else {
        upButton.classList.remove('shown');
    }
});

upButton.addEventListener('click', function() {
    window.scrollTo(0, 0);
});

menuButton.onclick = function() {
    menuButton.classList.toggle('menu__icon--open');
    menuList.classList.toggle('menu__list--open');
}

document.addEventListener('click', function(event) {
    if (!menu.contains(event.target)) {
        clouseMenu();
    }
});

// card photo changes

let activeImgItem = document.querySelector('.card__image');
let cardImgList = document.querySelectorAll('.card__thumbnail img');


for (let cardImg of cardImgList) {
    cardImg.onclick = function(evt) {
        evt.preventDefault();
        activeImgItem.src = cardImg.src;

        let currentActiveItem = document.querySelector('.card__thumbnail--active');
        currentActiveItem.classList.remove('card__thumbnail--active');

        cardImg.parentElement.classList.add('card__thumbnail--active');
    }
}