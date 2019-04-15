const init = () => {

    document.getElementById('auth-form').addEventListener('submit', function () {
       let formData = new FormData(this);
        let userID = formData.get('id');
       if (formData.get('id') === "admin") {
           this.action = 'admin/requests.html';
       } else if (formData.get('id') === "user") {
           sessionStorage.setItem('id', '3');
           this.action = 'requester/user-dashboard.php';
       } else if (formData.get('id') === "staff") {
           this.action = 'staff-dashboard.html';
       }
    });
};

init();