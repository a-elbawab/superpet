const togglePassword1 = document.querySelector('#showpassword01');
const togglePassword2 = document.querySelector('#showpassword02');
const password1 = document.querySelector('.password1');
const password2 = document.querySelector('.password2');
if(togglePassword1){
	togglePassword1.addEventListener('click', function (e) {
		const type = password1.getAttribute('type') === 'password' ? 'text' : 'password';
		password1.setAttribute('type', type);
		this.classList.toggle('active');
	});
}
if(togglePassword2){
	togglePassword2.addEventListener('click', function (e) {
		const type = password2.getAttribute('type') === 'password' ? 'text' : 'password';
		password2.setAttribute('type', type);
		this.classList.toggle('active');
	});
}