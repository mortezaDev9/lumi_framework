const form = document.querySelector('form');

form.addEventListener('submit', (event) => {
	event.preventDefault();

	const email = document.querySelector('#email').value;
	const password = document.querySelector('#password').value;

	// Validate email and password
	if (email === '' || password === '') {
		alert('Please fill in all fields');
	} else {
		// Submit form
		alert(`Email: ${email}\nPassword: ${password}`);
		form.submit();
	}
});
