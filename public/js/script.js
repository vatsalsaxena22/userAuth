document.addEventListener('DOMContentLoaded', function() {
    const form = document.querySelector('form');
    
    form.addEventListener('submit', function(e) {
        const button = this.querySelector('button');
        button.classList.add('submitting');
        button.textContent = 'Processing...';
    });

    // Handle URL parameters for messages
    const urlParams = new URLSearchParams(window.location.search);
    const error = urlParams.get('error');
    const success = urlParams.get('success');

    if (error) {
        showMessage(error, 'error');
    }
    if (success) {
        showMessage(success, 'success');
    }

    function showMessage(message, type) {
        const messageDiv = document.createElement('div');
        messageDiv.className = `form-message form-${type}`;
        messageDiv.textContent = message;
        form.insertBefore(messageDiv, form.firstChild);

        setTimeout(() => {
            messageDiv.remove();
        }, 5000);
    }
});

