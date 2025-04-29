document.getElementById('registerForm')?.addEventListener('submit', async function(event) {
    event.preventDefault();

    const name = document.getElementById('name').value;
    const username = document.getElementById('usernameRegister').value;
    const email = document.getElementById('email').value;
    const password = document.getElementById('passwordRegister').value;

    if (name && username && email && password) {
        const user = {
            name: name,
            username: username,
            email: email,
            password: password
        };

        try {
            const response = await fetch('http://localhost/online-pet-shop-backend/index.php/api/users', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify(user)
            });

            if (response.ok) {
                alert('Registration successful!');
                window.location.hash = '#login-section';
            } else {
                alert('Registration failed!');
            }
        } catch (error) {
            console.error('Error during registration:', error);
            alert('An error occurred!');
        }
    } else {
        alert('Please fill out all fields');
    }
});
