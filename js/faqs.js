document.addEventListener('DOMContentLoaded', () => {

    // Accordion functionality
    const faqItems = document.querySelectorAll('.faq-item');
    faqItems.forEach(item => {
        const question = item.querySelector('.faq-question');
        question.addEventListener('click', () => {
            const currentlyActive = document.querySelector('.faq-item.active');
            if (currentlyActive && currentlyActive !== item) {
                currentlyActive.classList.remove('active');
            }
            item.classList.toggle('active');
        });
    });

    // Search functionality
    const searchInput = document.getElementById('faq-search');
    searchInput.addEventListener('keyup', (e) => {
        const searchTerm = e.target.value.toLowerCase();

        faqItems.forEach(item => {
            const questionText = item.querySelector('.faq-question span').textContent.toLowerCase();
            const answerText = item.querySelector('.faq-answer p').textContent.toLowerCase();

            if (questionText.includes(searchTerm) || answerText.includes(searchTerm)) {
                item.classList.remove('hidden');
            } else {
                item.classList.add('hidden');
            }
        });

        // Show/hide category titles based on visible items
        document.querySelectorAll('.faq-category').forEach(category => {
            const visibleItems = category.querySelectorAll('.faq-item:not(.hidden)');
            category.style.display = visibleItems.length > 0 ? 'block' : 'none';
        });
    });

    // Smooth scroll for nav links
    const navLinks = document.querySelectorAll('.faq-nav a');
    navLinks.forEach(link => {
        link.addEventListener('click', function(e) {
            e.preventDefault();
            
            // Update active state in nav
            navLinks.forEach(l => l.classList.remove('active'));
            this.classList.add('active');
            
            const targetId = this.getAttribute('href');
            const targetElement = document.querySelector(targetId);

            if (targetElement) {
                targetElement.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }
        });
    });
}); 