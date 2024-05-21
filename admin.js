document.addEventListener('DOMContentLoaded', () => {
    const entries = document.querySelectorAll('.entry');
    entries.forEach(entry => {
        entry.addEventListener('click', () => {
            entry.querySelector('.issue').classList.toggle('hei-show');
        });
    });
});
