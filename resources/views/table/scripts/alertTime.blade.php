<script>
    function showAlert() {
        const alert = document.getElementById('alert');
        alert.classList.remove('hidden');

        setTimeout(function() {
            alert.classList.add('hidden');
        }, 5000); // 5000 milliseconds (5 seconds) - adjust as needed
    }

    // Call the function to show the alert when needed
    showAlert();
</script>
