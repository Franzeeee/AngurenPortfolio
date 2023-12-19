const profileInput = document.querySelector('#profileInput');
const aboutInput = document.querySelector('#aboutInput');

profileInput.addEventListener('change', function () { 
    const fileInput = event.target;
    const previewImage = document.getElementById('previewProfileImage');

      if (fileInput.files && fileInput.files[0]) {
            const reader = new FileReader();

            reader.onload = function(e) {
            previewImage.src = e.target.result;
        };

        reader.readAsDataURL(fileInput.files[0]);
      }
 });

aboutInput.addEventListener('change', function () { 
const fileInput = event.target;
const previewImage = document.getElementById('previewAboutImage');

    if (fileInput.files && fileInput.files[0]) {
        const reader = new FileReader();

        reader.onload = function(e) {
        previewImage.src = e.target.result;
    };

    reader.readAsDataURL(fileInput.files[0]);
    }
});


setTimeout(function () {
    var successMessage = document.querySelector('.success');
    if (successMessage) {
        successMessage.style.opacity = 0;
        setTimeout(function () {
            successMessage.style.display = 'none';
        }, 1000); // Optional: Add a delay before setting display to 'none' for a smooth transition
    }
}, 1500);