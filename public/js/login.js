document.getElementById('loginForm')?.addEventListener('submit', async function(event) {
    event.preventDefault();

    const username = document.getElementById('username').value;
    const password = document.getElementById('password').value;

    if (username && password) {
        const credentials = {
            username: username,
            password: password
        };

        try {
            const response = await fetch('http://localhost/online-pet-shop-backend/index.php/api/login', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify(credentials)
            });

            if (response.ok) {
                const data = await response.json();
                alert('Login successful! Welcome ' + data.name);
                window.location.hash = '#dashboard-section';
            } else {
                alert('Invalid username or password!');
            }
        } catch (error) {
            console.error('Error during login:', error);
            alert('An error occurred!');
        }
    } else {
        alert('Please fill in both fields');
    }
});
