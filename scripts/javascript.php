<script>
    function goBack() {
        window.history.back();
    }

    function checkLogin() {
        // var username = password = "";
        // e.preventDefault();
        // return false;
    }

    function checkSignup() {
        // var last_name = first_name = email = phone = username = password = "";
        var last_name = document.getElementById('last_name').value;
        var first_name = document.getElementById('first_name').value;
        var email = document.getElementById('email').value;
        var phone = document.getElementById('phone').value;
        var username = document.getElementById('username').value;
        var password = document.getElementById('password').value;
        var name_regex = /^[A-Za-z][A-Za-z\'\-]+([\ A-Za-z][A-Za-z\'\-]+)*/;
        var email_regex =/^(([a-zA-Z0-9_\-\.]+)@([a-zA-Z0-9_\-\.]+)\.([a-zA-Z]{2,5}){1,25})+([;.](([a-zA-Z0-9_\-\.]+)@{[a-zA-Z0-9_\-\.]+0\.([a-zA-Z]{2,5}){1,25})+)*$/;
        var phone_regex =/^\+?\d{0,13}/s;
        var username_regex =/^(?=.{4,20}$)(?:[a-zA-Z\d]+(?:(?:\.|-|_)[a-zA-Z\d])*)+$/;
        var password_regex=/(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}/;
        //validate name
        if (first_name == "" || first_name == null || last_name == "" || last_name == null     ) {
            alert("Please fill in your name");
            return false;
        } else {
            if (name_regex.test(first_name)== false || name_regex.test(last_name)== false){
                alert("your name should be in alphabet")
                return false;
            }
        }

         //validate email
        if (email == "" || email == null) {
            alert("Please fill in your email");
            return false;
        } else {
            if (email_regex.test(email)== false ){
                alert("Invalid email format!")
                return false;
            }           
        }

         //validate phone
        if (phone == "" || phone == null) {
            alert("Please fill in your phone number");
            return false;
        } else {
            if (phone_regex.test(phone)== false ){
                alert("Invalid phone number")
                return false;
            }
        }

         //validate username
        if (username == "" || username == null) {
            alert("Please fill in your username");
            return false;
        } else {
            if (username_regex.test(username)== false ){
                alert("Invalid username!")
                return false;
            }           
        } 

         //validate password
        if (password == "" || password == null) {
            alert("Please fill in your password");
            return false;
        } else {
            if (password_regex.test(password)== false ){
                alert("Password should be atleast 8 characters and have atleast one capital letter")
                return false;
            } 
            alert("account registered")
            return true;          
        }


    }

    // $(function register() {
    //     $('form').on('submit', function(e) {
    //         // e.preventDefault();

    //         // var name = $('#name').val();
    //         // var email = $('#email').val();
    //         // var password = $('#password').val();
    //         // $.ajax({
    //         //     type: "POST",
    //         //     url: "register.php",
    //         //     data: {

    //         //         "name": name,
    //         //         "email": email,
    //         //         "password": password
    //         //     },
    //         //     success: function(data) {
    //         //         $('.result').php(data);
    //         //         $('#customer-signup')[0].reset();
    //         //         alert("Account registered")
    //         //     }
    //         // });
    //     });
    // });
</script>