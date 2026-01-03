
function openHotelModal() {
    document.getElementById('hotelModal').classList.remove('hidden');
    document.body.style.overflow = 'hidden'; // Prevent background scrolling
}

function closeHotelModal() {
    document.getElementById('hotelModal').classList.add('hidden');
    document.body.style.overflow = 'auto'; // Restore scrolling

    // Reset form
    document.getElementById('createHotelForm').reset();
    document.getElementById('imagePreview').classList.add('hidden');
}

// Image Preview
function previewImage(event) {
    const input = event.target;
    const preview = document.getElementById('preview');
    const previewContainer = document.getElementById('imagePreview');

    if (input.files && input.files[0]) {
        const reader = new FileReader();

        reader.onload = function(e) {
            preview.src = e.target.result;
            previewContainer.classList.remove('hidden');
        }

        reader.readAsDataURL(input.files[0]);
    } else {
        previewContainer.classList.add('hidden');
    }
}

// Close modal when clicking outside
document.getElementById('hotelModal').addEventListener('click', function(e) {
    if (e.target.id === 'hotelModal') {
        closeHotelModal();
    }
});

// Close modal with Escape key
document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape') {
        closeHotelModal();
    }
});

document.getElementById('openBtn').addEventListener('click', openHotelModal);
document.getElementById('closeModal').addEventListener('click', closeHotelModal);
document.getElementById('closeModal2').addEventListener('click', closeHotelModal);

document.getElementById('image').addEventListener('change', function(event) {
    previewImage(event);
});
