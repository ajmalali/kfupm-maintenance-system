const init = () => {
    let signin = document.getElementById('signin-card');
    let signup = document.getElementById('signup-card');
    let signinForm = document.getElementById('signin-form');
    let signupForm = document.getElementById('signup-form');

    // Disable the signin form
    signin.style.display = 'none';
    signinForm.disabled = true;

    // Event handler for signup radio
    document.getElementById('tab-1').addEventListener('click', function () {
        signin.style.display = 'none';
        signinForm.disabled = true;
        signup.style.display = 'block';
        signupForm.disabled = false;
    });

    // Event handler for signin radio
    document.getElementById('tab-2').addEventListener('click', function () {
        signup.style.display = 'none';
        signupForm.disabled = true;
        signin.style.display = 'block';
        signinForm.disabled = false;
    });
};

init();