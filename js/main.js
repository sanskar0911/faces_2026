/* FACES 2026 - Main JavaScript */

$(document).ready(function() {
    
    // 1. Loading Spinner
    $(window).on('load', function() {
        $('#loader').fadeOut('slow');
    });

    // 2. Sticky Navbar
    $(window).scroll(function() {
        if ($(this).scrollTop() > 50) {
            $('#navbar').addClass('sticky');
        } else {
            $('#navbar').removeClass('sticky');
        }
    });

    // 3. Countdown Timer
    const targetDate = new Date("February 15, 2026 09:00:00").getTime();

    const countdownInterval = setInterval(function() {
        const now = new Date().getTime();
        const distance = targetDate - now;

        const days = Math.floor(distance / (1000 * 60 * 60 * 24));
        const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        const seconds = Math.floor((distance % (1000 * 60)) / 1000);

        $('#days').text(String(days).padStart(2, '0'));
        $('#hours').text(String(hours).padStart(2, '0'));
        $('#minutes').text(String(minutes).padStart(2, '0'));
        $('#seconds').text(String(seconds).padStart(2, '0'));

        if (distance < 0) {
            clearInterval(countdownInterval);
            $('.countdown').html("<h2 style='color:var(--primary-neon)'>EVENT STARTED!</h2>");
        }
    }, 1000);

    // 4. Smooth Scrolling for anchors
    $('a[href^="#"]').on('click', function(event) {
        const target = $(this.getAttribute('href'));
        if( target.length ) {
            event.preventDefault();
            $('html, body').stop().animate({
                scrollTop: target.offset().top - 80
            }, 1000);
        }
    });

    // 5. Scroll Reveal Animations (Simple implementation)
    const observerOptions = {
        threshold: 0.1
    };

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                $(entry.target).addClass('animate-up');
            }
        });
    }, observerOptions);

    $('.glass, .section-title').each(function() {
        observer.observe(this);
    });

});
