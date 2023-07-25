<script>
    let form = document.querySelector('form');
    let usernameInput = document.querySelector('input[name="username"]');
    let phone = document.querySelector('input[name="phone"]');
    let email = document.getElementById('email');
    let btn = document.getElementById('btn-submit')
    let password = document.getElementById('password');
    let password_confirm = document.getElementById('password-confirm');
    let check = document.querySelector('input[type=checkbox]');

    let errorName = document.getElementById('errorName');
    let errorPhone = document.getElementById('errorPhone');
    let errorEmail = document.getElementById('errorEmail');
    let errorPassword = document.getElementById('errorPassword');
    let errorConfirm = document.getElementById('errorConfirm');

    console.log(check.checkbox)
    // Validate username
    usernameInput.addEventListener('input', (e) => {
        const usernameRegex = /^[a-zA-Z0-9]+$/;
        if (!usernameRegex.test(e.target.value)) {

            errorName.textContent = 'Tên người dùng chỉ có thể là chữ không dấu và số.';
        } else {
            errorName.textContent = '';
        }
    })

    // Validate email
    email.addEventListener('input', (e) => {
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!emailRegex.test(e.target.value)) {
            errorEmail.textContent = 'Email không hợp lệ.';
        } else {
            errorEmail.textContent = '';

        }
    })

    // Validate phone
    phone.addEventListener('input', (e) => {
        let phoneRegex = /^(0\d{1,3})[-. ]?(\d{3,4})[-. ]?(\d{4})$/;
        if (!phoneRegex.test(e.target.value)) {
            errorPhone.textContent = "Số điện thoại không hợp lệ."
        } else {
            errorPhone.textContent = '';
        }
    })

    // Validate password
    password.addEventListener('input', (e) => {
        let passwordRegex = /^(?=.*[a-zA-Z]).{8,}$/;
        if (!passwordRegex.test(e.target.value)) {
            errorPassword.textContent = 'Mật khẩu tối thiểu phải có 8 kí tự và ít nhất một chữ cái.';
        } else {
            errorPassword.textContent = '';
        }
    })

    // Validate confirm password

    // Validate confirm password
    password_confirm.addEventListener('input', (e) => {
        console.log(e);
        if (e.target.value === password.value) {
            console.log(password.value)
            errorConfirm.textContent = '';
        } else if (e.target.value == '') {
            errorConfirm.textContent = '';
        } else {
            errorConfirm.textContent = 'Mật khẩu chưa khớp với mật khẩu ở trên.';
        }
    })

    let isValid = false;

    // Validate form
    form.addEventListener('input', () => {
        // Check if all fields are valid
        if (errorPhone.textContent === '' && errorPassword.textContent === '' && errorPassword.textContent === '' &&
            errorName.textContent === '' && errorEmail.textContent === '') {
            check.addEventListener('change', (event) => {
                if (event.target.checked) {
                    isValid = true;
                } else {
                    isValid = false;
                }
                btn.disabled = !isValid;
            });
        }
    });
</script>