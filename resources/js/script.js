

let widthViewPort = window.innerWidth;

let swiper = new Swiper(".swiper", {
    
    
    

    slidesPerView: 1,
    
    breakpoints:{
        720:{
            slidesPerView: 3,
        }
    },

    spaceBetween: 30,
    pagination: {
        el: ".swiper-pagination",
        type: "fraction",
    },
    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
    },
});

let hearts = document.querySelectorAll('.bi-suit-heart');
hearts.forEach((el) => {
    el.addEventListener('click', () => {
     el.classList.toggle('bi-suit-heart');
     el.classList.toggle('bi-suit-heart-fill');
    })
})

