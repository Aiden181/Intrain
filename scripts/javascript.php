<script>
    function goBack() {
        window.history.back();
    }
    
    function checkLogin(e) {
        var username = password = "";
        var username = document.getElementById('username').value;
        var password = document.getElementById('password').value;
        //validate username
        if (username == "") {
            alert("Please fill in your username");
            e.preventDefault();
            return false;
        } else {
            return true;
        }

        //validate password
        if (password == "") {
            alert("Please fill in your password");
            e.preventDefault();
            return false;
        } else {
            return true;
        }
    }
    
    function checkSignup(e) {
        var last_name = first_name = email = phone = username = password = "";
        var last_name = document.getElementById('last_name').value;
        var first_name = document.getElementById('first_name').value;
        var email = document.getElementById('email').value;
        var phone = document.getElementById('phone').value;
        var username = document.getElementById('username').value;
        var password = document.getElementById('password').value;
        var name_regex = /^[A-Za-z]+$/;
        var email_regex =/^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+([a-zA-Z0-9\._-]+)+$/;
        var phone_regex =/^\+?\d{0,13}/s;
        var password_regex=/^(?=.{4,20}$)(?:[a-zA-Z\d]+(?:(?:\.|-|_)[a-zA-Z\d])*)+$/;
        //validate name
        if (first_name == ""  || last_name == "") {
            alert("Please fill in your name");
            e.preventDefault();
            return false;
        } else if (name_regex.test(first_name) == false || name_regex.test(last_name) == false) {
            alert("Invalid name!");
            e.preventDefault();
            return false;
        } else {
            return true;
        }

        //validate email
        if (email == "") {
            alert("Please fill in your email");
            e.preventDefault();
            return false;
        } else if (email_regex.test(email)== false ) {
            alert("Invalid email format!");
            e.preventDefault();
            return false;
        } else {
            return true;
        }

        //validate phone
        if (phone == "") {
            alert("Please fill in your phone number");
            e.preventDefault();
            return false;
        } else if (phone_regex.test(phone) == false ) {
            alert("Invalid phone number!");
            e.preventDefault();
            return false;
        } else {
            return true;
        }

        //validate username
        if (username == "") {
            alert("Please fill in your username");
            e.preventDefault();
            return false;
        } else {
            return true;
        }

        //validate password
        if (password == "") {
            alert("Please fill in your password");
            e.preventDefault();
            return false;
        // } else if (password_regex.test(password) == false ) {
        //     alert("Password should be atleast 4 characters and have atleast one capital letter");
        //     e.preventDefault();
        //     return false;
        } else {
            return true;
        }
    }

    function UpdateCheckBox(tgl, start, stop)
    {
        console.log("aaaaaaaaaaa");
        for(var i = start;i <= stop; i++)
        {
            if($('p' + i))
            {
                if($('p' + tgl).checked == true)
                    $('p' + i).checked = true;
                else
                    $('p' + i).checked = false;
            }
            console.log("bbbbbbbbbbbb");
        }

        // Other Arguments is individual items not available in the range
        if (arguments.length > 3)
        {
            for(var lp = 4; lp <= arguments.length; lp++)
            {
                if ($('p' + arguments[lp - 1]))
                {
                    $('p' + arguments[lp - 1]).checked = $('p' + tgl).checked;
                }
            }
        }
    }
</script>