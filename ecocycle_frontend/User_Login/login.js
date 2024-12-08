$(document).ready(function() {
    $('#loginForm').submit(function(event) {
        event.preventDefault(); // Prevent the form from submitting normally

        $.ajax({
            type: 'POST',
            url: '../../ecocycle_backend/User_Login/login.php',
            data: $(this).serialize(), // Serialize form data
            dataType: 'xml', // Expect XML response
            success: function(response) {
                var status = $(response).find('status').text();
                if (status === 'success') {
                    // Redirect to the dashboard on successful login
                    window.location.href = '../../ecocycle_frontend/User_dashboard/dashboard.php';
                } else {
                    // Show error message
                    var message = $(response).find('message').text();
                    alert(message);
                }
            },
            error: function() {
                alert('An error occurred while processing your request.');
            }
        });
    });
});