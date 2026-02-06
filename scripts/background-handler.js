/**
 * Handle setBackground attribute and data-background for dynamic background images
 */
document.addEventListener('DOMContentLoaded', function() {
    
    // Handle elements with setBackground attribute
    const elementsWithSetBg = document.querySelectorAll('[setBackground]');
    elementsWithSetBg.forEach(function(element) {
        const bgUrl = element.getAttribute('setBackground');
        if (bgUrl) {
            element.style.backgroundImage = `url(${bgUrl})`;
            element.style.backgroundSize = 'cover';
            element.style.backgroundPosition = 'center';
            element.style.backgroundRepeat = 'no-repeat';
        }
    });
    
    // Handle elements with data-background attribute (for swiper slides and dynamic elements)
    const elementsWithDataBg = document.querySelectorAll('[data-background]');
    elementsWithDataBg.forEach(function(element) {
        const bgUrl = element.getAttribute('data-background');
        if (bgUrl) {
            element.style.backgroundImage = `url(${bgUrl})`;
            element.style.backgroundSize = 'cover';
            element.style.backgroundPosition = 'center';
            element.style.backgroundRepeat = 'no-repeat';
        }
    });
    
    // Also handle when Swiper is initialized (in case slides are created dynamically)
    // This will run after a short delay to ensure Swiper is ready
    setTimeout(function() {
        const swiperSlides = document.querySelectorAll('.swiper-slide[data-background]');
        swiperSlides.forEach(function(slide) {
            const bgUrl = slide.getAttribute('data-background');
            if (bgUrl && !slide.style.backgroundImage) {
                slide.style.backgroundImage = `url(${bgUrl})`;
                slide.style.backgroundSize = 'cover';
                slide.style.backgroundPosition = 'center';
                slide.style.backgroundRepeat = 'no-repeat';
            }
        });
    }, 500);
});
