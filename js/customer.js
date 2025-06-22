document.addEventListener('DOMContentLoaded', function() {
    // FAQ Accordion
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

    // Form Validation
    const contactForm = document.getElementById('contactForm');
    if (contactForm) {
        contactForm.addEventListener('submit', function(e) {
            e.preventDefault();
            
            // Basic validation
            const name = document.getElementById('name').value;
            const email = document.getElementById('email').value;
            const inquiryType = document.getElementById('inquiry-type').value;
            const message = document.getElementById('message').value;
            
            if (name.trim() === '' || email.trim() === '' || inquiryType.trim() === '' || message.trim() === '') {
                alert('Please fill out all required fields.');
                return;
            }

            // Simulate form submission
            alert('Thank you for your inquiry! We will get back to you shortly.');
            contactForm.reset();
        });
    }

    // Scroll Animations
    const animatedElements = document.querySelectorAll('.hero-content, .option-card, .form-container, .faq-item');
    
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('animate-in');
            }
        });
    }, {
        threshold: 0.1,
    });

    animatedElements.forEach(element => {
        observer.observe(element);
    });
});

// Add CSS for animations
const style = document.createElement('style');
style.textContent = `
    .animate-in {
        animation: fadeInUp 0.8s ease forwards;
    }

    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
`;
document.head.appendChild(style);

var Name = document.getElementById("name");
var email = document.getElementById("email");
var phone = document.getElementById("phone");
var select = document.getElementById("select");
var text = document.getElementById("text");


function requirementSubmit()

{

    if(Name != "" && email !="" && phone != "" && select !="" && text !=""){
        alert('submit success full');

    }
    
}



    




