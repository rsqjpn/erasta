import "./bootstrap";
import Swiper, { Navigation, Pagination } from "swiper";
import "flowbite";

// Inisialisasi Swiper
console.log("Swiper initialized");
Swiper.use([Navigation, Pagination]);

const swiper = new Swiper(".mySwiper", {
    slidesPerView: 1,
    spaceBetween: 10,
    loop: true,
    pagination: {
        el: ".swiper-pagination",
        clickable: true,
    },
    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
    },
    breakpoints: {
        // Atur jumlah slide per view untuk ukuran layar berbeda
        640: {
            slidesPerView: 1,
        },
        768: {
            slidesPerView: 2,
        },
        1024: {
            slidesPerView: 3,
        },
    },
});
