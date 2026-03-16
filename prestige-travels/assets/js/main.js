/**
 * Prestige Travels Main Scripts
 */
document.addEventListener('DOMContentLoaded', () => {
    
    // 1. Sticky Header Scroll Effect
    const header = document.querySelector('.site-header');
    if (header) {
        window.addEventListener('scroll', () => {
            if (window.scrollY > 50) {
                header.classList.add('scrolled');
            } else {
                header.classList.remove('scrolled');
            }
        });
    }

    // 2. Accordion Logic (Payment Plans & FAQs)
    const accordions = document.querySelectorAll('.accordion-header');
    accordions.forEach(btn => {
        btn.addEventListener('click', function() {
            const content = this.nextElementSibling;
            const icon = this.querySelector('.icon');
            
            // Toggle expanded class
            content.classList.toggle('expanded');
            
            // Toggle Icon (+/-)
            if (icon) {
                if (content.classList.contains('expanded')) {
                    icon.textContent = '−'; // minus symbol
                } else {
                    icon.textContent = '+'; // plus symbol
                }
            }
        });
    });

});
