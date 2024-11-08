document.getElementById('login-form').addEventListener('submit', function(event) {
    event.preventDefault(); 

    const email = document.getElementById('email').value;
    const password = document.getElementById('password').value;

    if (email === "" || password === "") {
        alert("Please fill in all fields");
        return;
    }

    console.log(`Email: ${email}, Password: ${password}`);

    alert("Login successful!");
});
