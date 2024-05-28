document.addEventListener('DOMContentLoaded', () => {
    const entries = document.querySelectorAll('.en-ma');
    entries.forEach(entry => {
        entry.addEventListener('click', () => {
            entry.querySelector('.issue').classList.toggle('hei-show');
            entry.querySelector('.link').classList.toggle('hei-show');
            entry.querySelector('.email').classList.toggle('hei-show');
            entry.querySelector('.number').classList.toggle('hei-show');
        });
    });

    document.querySelectorAll('.ch-st').forEach(button => {
        button.addEventListener('click', function (event) {
            event.preventDefault();

            const form = this.closest('form');
            const issueId = form.querySelector('input[name="issue_id"]').value;
            const currentStatus = form.querySelector('input[name="current_status"]').value;

            const xhr = new XMLHttpRequest();
            xhr.open('POST', 'toggle_status.php', true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

            xhr.onreadystatechange = function () {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    const response = JSON.parse(xhr.responseText);
                    if (response.success) {
                        const statusSpan = form.closest('.sta').querySelector('.status');
                        const newStatus = response.new_status == 1 ? 'Status: Resolved' : 'Status: Open';
                        const newButtonText = response.new_status == 1 ? 'Reopen' : 'Close';
                        statusSpan.textContent = newStatus;
                        button.textContent = newButtonText;
                        form.querySelector('input[name="current_status"]').value = response.new_status;
                    }
                }
            };

            xhr.send(`issue_id=${issueId}&current_status=${currentStatus}`);
        });
    });
});
