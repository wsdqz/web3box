document.addEventListener('DOMContentLoaded', function() {
    const faqItems = document.querySelectorAll('.faq-item');

    faqItems.forEach(item => {
        const question = item.querySelector('.faq-question');

        question.addEventListener('click', () => {
            const isActive = item.classList.contains('active');

            faqItems.forEach(faqItem => {
                faqItem.classList.remove('active');
            });

            if (!isActive) {
                item.classList.add('active');
            }
        });
    });

    const rewardCards = document.querySelectorAll('.reward-card');

    function checkScroll() {
        rewardCards.forEach(card => {
            const cardTop = card.getBoundingClientRect().top;
            const screenHeight = window.innerHeight;

            if (cardTop < screenHeight * 0.9) {
                card.style.opacity = '1';
                card.style.transform = 'translateY(0) scale(1)';
            }
        });
    }

    rewardCards.forEach(card => {
        card.style.opacity = '0';
        card.style.transform = 'translateY(20px) scale(0.95)';
        card.style.transition = 'opacity 0.5s ease, transform 0.5s ease';
    });

    window.addEventListener('scroll', checkScroll);
    window.addEventListener('load', checkScroll);
});