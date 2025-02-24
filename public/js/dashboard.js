function confirmDeletion() {
    const modal = document.createElement('div');
    modal.className = 'confirm-modal';
    modal.innerHTML = `
        <div class="modal-content">
            <h3>Delete Account</h3>
            <p>Are you sure you want to delete your account? This action cannot be undone!</p>
            <div class="modal-buttons">
                <button onclick="window.location.href='../functions/delete_account.php'" class="btn btn-danger">Delete</button>
                <button onclick="this.parentElement.parentElement.parentElement.remove()" class="btn btn-secondary">Cancel</button>
            </div>
        </div>
    `;
    document.body.appendChild(modal);
}

const editProfile = () => {
    try {
        window.location.href = 'edit_profile.php';
    } catch (error) {
        console.error('Navigation error:', error);
        showMessage('Error navigating to edit profile page', 'error');
    }
};

