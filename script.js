// Toggle mobile navigation
document.addEventListener('DOMContentLoaded', function() {
    const navLinks = document.querySelector('.nav-links');
    const ctaButton = document.querySelector('.cta-button');

    document.querySelector('.navbar .logo').addEventListener('click', function() {
        navLinks.classList.toggle('show');
    });

    navLinks.addEventListener('click', function() {
        navLinks.classList.remove('show'); // Close menu on link click (for mobile)
    });
});

// Smooth Scrolling for Internal Links
document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function(event) {
        event.preventDefault();
        document.querySelector(this.getAttribute('href')).scrollIntoView({
            behavior: 'smooth'
        });
    });
});

// Show Scroll-to-Top Button on Scroll
window.addEventListener('scroll', function() {
    const scrollButton = document.querySelector('.scroll-to-top');
    if (window.scrollY > 300) {
        scrollButton.classList.add('visible');
    } else {
        scrollButton.classList.remove('visible');
    }
});

// Chatbot Icon Toggle
let isChatbotVisible = false;
document.addEventListener('scroll', () => {
    const chatbotIcon = document.querySelector('.chatbot-placeholder img');
    if (window.scrollY > 500 && !isChatbotVisible) {
        chatbotIcon.style.display = 'block';
        isChatbotVisible = true;
    } else if (window.scrollY <= 500 && isChatbotVisible) {
        chatbotIcon.style.display = 'none';
        isChatbotVisible = false;
    }
});
