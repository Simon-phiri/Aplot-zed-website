function handleLogin(event) {
    event.preventDefault(); // Prevent default form submission

    const email = document.getElementById('email').value;
    const password = document.getElementById('password').value;

    // Send the email and password to the server
    fetch('login.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({ email, password })
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            // Store the user's name in localStorage
            localStorage.setItem('userName', data.name);
            window.location.href = 'index.html'; // Redirect to homepage
        } else {
            // Handle login error and display a message
            alert(data.message); // Improve this to display in the UI
        }
    })
    .catch(error => {
        console.error('Error:', error);
    });
}
