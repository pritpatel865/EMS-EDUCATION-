const heroImages = [
    "img/hero.bg.webp",     
    "img/hero1.webp",       
    "img/hero2.webp",       
  ];
  
  let currentIndex = 0;
  
  function changeHeroImage() {
    const sliderImage = document.getElementById("Slider-image");
  
    // Increment the current index and wrap it around using modulo
    currentIndex = (currentIndex + 1) % heroImages.length;
  
    // Smoothly fade out the image
    sliderImage.style.opacity = 0;
  
    // After the fade-out effect (500ms), change the image and fade it back in
    setTimeout(() => {
      sliderImage.src = heroImages[currentIndex];
      sliderImage.style.opacity = 1;
    }, 500); // Match the CSS transition duration
  }
  
  // Change the hero image every 5 seconds
  setInterval(changeHeroImage, 5000);
  