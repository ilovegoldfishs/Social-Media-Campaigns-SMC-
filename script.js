// Smooth scrolling for anchor links
document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
        e.preventDefault();
        document.querySelector(this.getAttribute('href')).scrollIntoView({
            behavior: 'smooth'
        });
    });
});

// Full-page image slider
const slides = document.querySelectorAll('.slide');
const sliderNav = document.querySelector('.slider-nav');
let currentSlide = 0;
let slideInterval;

function showSlide(index) {
    slides.forEach((slide, i) => {
        slide.classList.toggle('active', i === index);
    });
    document.querySelectorAll('.slider-nav-item').forEach((item, i) => {
        item.classList.toggle('active', i === index);
    });
}

function nextSlide() {
    currentSlide = (currentSlide + 1) % slides.length;
    showSlide(currentSlide);
}

function startSlideshow() {
    slideInterval = setInterval(nextSlide, 5000);
}

function stopSlideshow() {
    clearInterval(slideInterval);
}

slides.forEach((_, i) => {
    const navItem = document.createElement('div');
    navItem.classList.add('slider-nav-item');
    navItem.addEventListener('click', () => {
        currentSlide = i;
        showSlide(currentSlide);
        stopSlideshow();
        startSlideshow();
    });
    sliderNav.appendChild(navItem);
});

showSlide(0);
startSlideshow();

// Pause slideshow on hover
const slider = document.querySelector('.full-page-slider');
slider.addEventListener('mouseenter', stopSlideshow);
slider.addEventListener('mouseleave', startSlideshow);