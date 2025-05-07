document.addEventListener('DOMContentLoaded', function() {
    const supportButton = document.getElementById('supportButton');
    const supportModal = document.getElementById('supportModal');
    const closeModal = document.getElementById('closeModal');
    const supportForm = document.getElementById('supportForm');
    const formContainer = document.getElementById('supportFormContainer');
    const formSuccess = document.getElementById('formSuccess');
    const closeSuccess = document.getElementById('closeSuccess');

    const nameInput = document.getElementById('name');
    const telegramInput = document.getElementById('telegram');
    const messageInput = document.getElementById('message');

    supportButton.addEventListener('click', function() {
        supportModal.classList.add('active');
    });

    closeModal.addEventListener('click', function() {
        supportModal.classList.remove('active');
    });

    supportModal.addEventListener('click', function(e) {
        if (e.target === supportModal) {
            supportModal.classList.remove('active');
        }
    });

    closeSuccess.addEventListener('click', function() {
        supportModal.classList.remove('active');
        setTimeout(() => {
            formSuccess.style.display = 'none';
            formContainer.style.display = 'block';
            supportForm.reset();
        }, 300);
    });

    function validateForm() {
        let isValid = true;

        if (!nameInput.value.trim()) {
            nameInput.parentElement.classList.add('error');
            isValid = false;
        } else {
            nameInput.parentElement.classList.remove('error');
        }

        const telegramValue = telegramInput.value.trim();
        if (!telegramValue) {
            telegramInput.parentElement.classList.add('error');
            isValid = false;
        } else {
            telegramInput.parentElement.classList.remove('error');
        }

        if (!messageInput.value.trim()) {
            messageInput.parentElement.classList.add('error');
            isValid = false;
        } else {
            messageInput.parentElement.classList.remove('error');
        }

        return isValid;
    }

    supportForm.addEventListener('submit', function(e) {
        e.preventDefault();

        if (!validateForm()) {
            return;
        }

        const formData = {
            name: nameInput.value.trim(),
            telegram: telegramInput.value.trim(),
            message: messageInput.value.trim()
        };

        sendToServer(formData);
    });

    function sendToServer(data) {
        // URL вашего PHP-скрипта
        const url = './send_to_telegram.php';

        supportForm.querySelector('button').textContent = 'Sending...';
        supportForm.querySelector('button').disabled = true;

        // Отправляем запрос
        fetch(url, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify(data)
        })
            .then(response => response.json())
            .then(result => {
                console.log('Success:', result);

                supportForm.querySelector('button').textContent = 'Send Message';
                supportForm.querySelector('button').disabled = false;

                formContainer.style.display = 'none';
                formSuccess.style.display = 'block';
            })
            .catch(error => {
                console.error('Error:', error);

                supportForm.querySelector('button').textContent = 'Send Message';
                supportForm.querySelector('button').disabled = false;

                alert('An error occurred while sending your message. Please try again later.');
            });
    }
});