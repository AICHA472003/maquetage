document.addEventListener("DOMContentLoaded", function() {
    
    // 1. Khidmat l-boutonat d "suivie" (Scroll to next recipe)
    const buttons = document.querySelectorAll('.btn-next');
    buttons.forEach(button => {
        button.addEventListener('click', function() {
            const nextSectionId = this.getAttribute('data-next');
            const nextSection = document.getElementById(nextSectionId);
            
            if (nextSection) {
                nextSection.scrollIntoView({ 
                    behavior: 'smooth', 
                    block: 'start' 
                });
            }
        });
    });

    // 2. Action dyal l-clik 3la WhatsApp (y-ftah chat direct m3a l-raqm)
    const whatsappBtn = document.querySelector('.click-wa');
    if (whatsappBtn) {
        whatsappBtn.addEventListener('click', function() {
            window.open('https://wa.me/212777522707', '_blank');
        });
    }

    // 3. Action dyal l-clik 3la Facebook (y-bhet direct 3la l-compte)
    const facebookBtn = document.querySelector('.click-fb');
    if (facebookBtn) {
        facebookBtn.addEventListener('click', function() {
            window.open('https://www.facebook.com/search/top?q=dhimin%20aicha', '_blank');
        });
    }
    
});