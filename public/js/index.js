setTimeout(function () {
    var successMessage = document.getElementById('successMessage');
    if (successMessage) {
        successMessage.style.opacity = 0;
        setTimeout(function () {
            successMessage.style.display = 'none';
        }, 2500); // Optional: Add a delay before setting display to 'none' for a smooth transition
    }
}, 1000);

const successClose = document.querySelector('#close');

successClose.addEventListener('click', function () {
    successMessage.style.opacity = 0;
    setTimeout(function () {
        successMessage.style.display = 'none';
    }, 1500);
});