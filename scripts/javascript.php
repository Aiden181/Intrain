<?php
if (!defined('IN_INTRAIN')) {
    exit("You're not supposed to be here!");
}
?>

<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
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
        var email_regex = /^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+([a-zA-Z0-9\._-]+)+$/;
        var phone_regex = /^\+?\d{0,13}/s;
        var password_regex = /^(?=.{4,20}$)(?:[a-zA-Z\d]+(?:(?:\.|-|_)[a-zA-Z\d])*)+$/;
        //validate name
        if (first_name == "" || last_name == "") {
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
        } else if (email_regex.test(email) == false) {
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
        } else if (phone_regex.test(phone) == false) {
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

    function UpdateCheckBox(tgl, start, stop) {
        for (var i = start; i <= stop; i++) {
            if (document.getElementById('p' + i)) {
                if (document.getElementById('p' + tgl).checked == true) {
                    document.getElementById('p' + i).checked = true;
                } else {
                    document.getElementById('p' + i).checked = false;
                }
            }
        }

        // Other Arguments is individual items not available in the range
        if (arguments.length > 3) {
            for (var lp = 4; lp <= arguments.length; lp++) {
                if ($('p' + arguments[lp - 1])) {
                    $('p' + arguments[lp - 1]).checked = $('p' + tgl).checked;
                }
            }
        }
    }

    function confirmDeleteUser(e) {
        if (confirm("Do you want to remove user?") == false) {
            e.preventDefault();
        } else {
            e.target.type = "submit";
            e.target.submit();
        }
    }

    // When admin clicks on 'Danger zone' bar,toggle between 
    // hiding and showing the delete button
    function showButton() {
        var delButtons = document.getElementsByClassName("delete-button");
        for (i = 0; i < delButtons.length; i++) {
            var delButtonOpen = delButtons[i];
            delButtonOpen.classList.toggle("show");
        }
    }

    // toggle search form in admin's admin and customer listing page
    function toggleSearchSection() {
        var formElms = document.getElementsByClassName("search-form");
        for (i = 0; i < formElms.length; i++) {
            var form = formElms[i];
            if (form.classList.contains("showform")) {
                form.classList.remove("showform");
                form.classList.add("hideform");
            } else {
                form.classList.remove("hideform");
                form.classList.add("showform");
            }
        }
    }

    // AJAX POST form processing
    $(document).ready(function() {
        // process admin updates own account details form
        $('#admin-editdetails').submit(function(event) {
            // get the form data
            // there are many ways to get this data using jQuery (you can use the class or id also)
            var formData = {
                'first_name'        : $('input[name=first_name]').val(),
                'last_name'         : $('input[name=last_name]').val(),
                'email'             : $('input[name=email]').val(),
                'phone'             : $('input[name=phone]').val(),
                'oldpassword'       : $('input[name=oldpassword]').val(),
                'newpassword'       : $('input[name=newpassword]').val(),
                'renewpassword'     : $('input[name=renewpassword]').val(),
                'update-admin'      : $('input[name=update-admin]').val()
            };

            // process the form
            $.ajax({
                type        : 'POST', // define the type of HTTP verb we want to use (POST for our form)
                url         : './scripts/ajax-form.php', // the url where we want to POST
                data        : formData, // our data object
                dataType    : 'json', // what type of data do we expect back from the server
                encode      : true
            })

            // using the done promise callback
            .done(function(data) {
                // log data to the console so we can see (for debug)
                console.log(data);

                // here we will handle errors and validation messages
                if (!data.success) {
                    if (data.errors.name) {
                        $('#first-name-success').html("");
                        $('#last-name-success').html("");
                        $('#name-error').html(data.errors.name);
                    }
                    if (data.errors.email) {
                        $('#email-success').html("");
                        $('#email-error').html(data.errors.email);
                    }
                    if (data.errors.phone) {
                        $('#phone-success').html("");
                        $('#phone-error').html(data.errors.phone);
                    }
                    if (data.errors.password) {
                        $('#password-success').html("");
                        $('#password-error').html(data.errors.password);
                    }
                } else {
                    // ALL GOOD! show successful messages
                    if (data.sucessMsg.first_name) {
                        $('#name-error').html("");
                        $('#first-name-success').html(data.sucessMsg.first_name);
                    }
                    if (data.sucessMsg.last_name) {
                        $('#name-error').html("");
                        $('#last-name-success').html(data.sucessMsg.last_name);
                    }
                    if (data.sucessMsg.email) {
                        $('#email-error').html("");
                        $('#email-success').html(data.sucessMsg.email);
                    }
                    if (data.sucessMsg.phone) {
                        $('#phone-error').html("");
                        $('#phone-success').html(data.sucessMsg.phone);
                    }
                    if (data.sucessMsg.password) {
                        $('#password-error').html("");
                        $('#password-success').html(data.sucessMsg.password);
                    }
                }
            })

            // error encountered
            .error(function(data, textStatus, errorThrown) {
                // print data
                console.warn(data.responseText)
                // print error
                console.warn('ERRORS: ' + textStatus, errorThrown);
            });

            // stop the form from submitting the normal way and refreshing the page
            event.preventDefault();
        });

        // process customer updates own account details form
        $('#customer-editdetails').submit(function(event) {
            // get the form data
            // there are many ways to get this data using jQuery (you can use the class or id also)
            var formData = {
                'email'             : $('input[name=email]').val(),
                'phone'             : $('input[name=phone]').val(),
                'oldpassword'       : $('input[name=oldpassword]').val(),
                'newpassword'       : $('input[name=newpassword]').val(),
                'renewpassword'     : $('input[name=renewpassword]').val(),
                'update-user'      : $('input[name=update-user]').val()
            };

            // process the form
            $.ajax({
                type        : 'POST', // define the type of HTTP verb we want to use (POST for our form)
                url         : './scripts/ajax-form.php', // the url where we want to POST
                data        : formData, // our data object
                dataType    : 'json', // what type of data do we expect back from the server
                encode      : true
            })

            // using the done promise callback
            .done(function(data) {
                // log data to the console so we can see (for debug)
                console.log(data);

                // here we will handle errors and validation messages
                if (!data.success) {
                    if (data.errors.name) {
                        $('#first-name-success').html("");
                        $('#last-name-success').html("");
                        $('#name-error').html(data.errors.name);
                    }
                    if (data.errors.email) {
                        $('#email-success').html("");
                        $('#email-error').html(data.errors.email);
                    }
                    if (data.errors.phone) {
                        $('#phone-success').html("");
                        $('#phone-error').html(data.errors.phone);
                    }
                    if (data.errors.password) {
                        $('#password-success').html("");
                        $('#password-error').html(data.errors.password);
                    }
                } else {
                    // ALL GOOD! show successful messages
                    if (data.sucessMsg.first_name) {
                        $('#name-error').html("");
                        $('#first-name-success').html(data.sucessMsg.first_name);
                    }
                    if (data.sucessMsg.last_name) {
                        $('#name-error').html("");
                        $('#last-name-success').html(data.sucessMsg.last_name);
                    }
                    if (data.sucessMsg.email) {
                        $('#email-error').html("");
                        $('#email-success').html(data.sucessMsg.email);
                    }
                    if (data.sucessMsg.phone) {
                        $('#phone-error').html("");
                        $('#phone-success').html(data.sucessMsg.phone);
                    }
                    if (data.sucessMsg.password) {
                        $('#password-error').html("");
                        $('#password-success').html(data.sucessMsg.password);
                    }
                }
            })

            // error encountered
            .error(function(data, textStatus, errorThrown) {
                // print data
                console.warn(data.responseText)
                // print error
                console.warn('ERRORS: ' + textStatus, errorThrown);
            });

            // stop the form from submitting the normal way and refreshing the page
            event.preventDefault();
        });

        // process admin updates admin account details form
        $('#admin-update-admin-details').submit(function(event) {
            // get the form data
            // there are many ways to get this data using jQuery (you can use the class or id also)
            var formData = {
                'first_name'        : $('input[name=first_name]').val(),
                'last_name'         : $('input[name=last_name]').val(),
                'email'             : $('input[name=email]').val(),
                'phone'             : $('input[name=phone]').val(),
                'newpassword'       : $('input[name=newpassword]').val(),
                'renewpassword'     : $('input[name=renewpassword]').val(),
                'flag'              : $('input:checkbox.flags').serializeArray(),
                'update-admin-details'      : $('input[name=update-admin-details]').attr('id')
            };

            // process the form
            $.ajax({
                type        : 'POST', // define the type of HTTP verb we want to use (POST for our form)
                url         : './scripts/ajax-form.php', // the url where we want to POST
                data        : formData, // our data object
                dataType    : 'json', // what type of data do we expect back from the server
                encode      : true
            })

            // using the done promise callback
            .done(function(data) {
                // log data to the console so we can see (for debug)
                console.log(data);

                // here we will handle errors and validation messages
                if (!data.success) {
                    if (data.errors.name) {
                        $('#first-name-success').html("");
                        $('#last-name-success').html("");
                        $('#name-error').html(data.errors.name);
                    }
                    if (data.errors.email) {
                        $('#email-success').html("");
                        $('#email-error').html(data.errors.email);
                    }
                    if (data.errors.phone) {
                        $('#phone-success').html("");
                        $('#phone-error').html(data.errors.phone);
                    }
                    if (data.errors.password) {
                        $('#password-success').html("");
                        $('#password-error').html(data.errors.password);
                    }
                    if (data.errors.flag) {
                        $('#flag-success').html("");
                        $('#flag-error').html(data.errors.flag);
                    }
                } else {
                    // ALL GOOD! show successful messages
                    if (data.sucessMsg.first_name) {
                        $('#name-error').html("");
                        $('#first-name-success').html(data.sucessMsg.first_name);
                    }
                    if (data.sucessMsg.last_name) {
                        $('#name-error').html("");
                        $('#last-name-success').html(data.sucessMsg.last_name);
                    }
                    if (data.sucessMsg.email) {
                        $('#email-error').html("");
                        $('#email-success').html(data.sucessMsg.email);
                    }
                    if (data.sucessMsg.phone) {
                        $('#phone-error').html("");
                        $('#phone-success').html(data.sucessMsg.phone);
                    }
                    if (data.sucessMsg.password) {
                        $('#password-error').html("");
                        $('#password-success').html(data.sucessMsg.password);
                    }
                    if (data.sucessMsg.flag) {
                        $('#flag-error').html("");
                        $('#flag-success').html(data.sucessMsg.flag);
                    }
                }
            })

            // error encountered
            .error(function(data, textStatus, errorThrown) {
                // print data
                // console.warn(data)
                console.warn(data.responseText)
                // print error
                console.warn('ERRORS: ' + textStatus, errorThrown);
            });

            // stop the form from submitting the normal way and refreshing the page
            event.preventDefault();
        });
        

        // process admin updates customer account details form
        $('#admin-update-customer-details').submit(function(event) {
            // get the form data
            // there are many ways to get this data using jQuery (you can use the class or id also)
            var formData = {
                'first_name'        : $('input[name=first_name]').val(),
                'last_name'         : $('input[name=last_name]').val(),
                'email'             : $('input[name=email]').val(),
                'phone'             : $('input[name=phone]').val(),
                'newpassword'       : $('input[name=newpassword]').val(),
                'renewpassword'     : $('input[name=renewpassword]').val(),
                'update-customer-details'      : $('input[name=update-customer-details]').attr('id')
            };

            // process the form
            $.ajax({
                type        : 'POST', // define the type of HTTP verb we want to use (POST for our form)
                url         : './scripts/ajax-form.php', // the url where we want to POST
                data        : formData, // our data object
                dataType    : 'json', // what type of data do we expect back from the server
                encode      : true
            })

            // using the done promise callback
            .done(function(data) {
                // log data to the console so we can see (for debug)
                console.log(data);

                // here we will handle errors and validation messages
                if (!data.success) {
                    if (data.errors.name) {
                        $('#first-name-success').html("");
                        $('#last-name-success').html("");
                        $('#name-error').html(data.errors.name);
                    }
                    if (data.errors.email) {
                        $('#email-success').html("");
                        $('#email-error').html(data.errors.email);
                    }
                    if (data.errors.phone) {
                        $('#phone-success').html("");
                        $('#phone-error').html(data.errors.phone);
                    }
                    if (data.errors.password) {
                        $('#password-success').html("");
                        $('#password-error').html(data.errors.password);
                    }
                    if (data.errors.flag) {
                        $('#flag-success').html("");
                        $('#flag-error').html(data.errors.flag);
                    }
                } else {
                    // ALL GOOD! show successful messages
                    if (data.sucessMsg.first_name) {
                        $('#name-error').html("");
                        $('#first-name-success').html(data.sucessMsg.first_name);
                    }
                    if (data.sucessMsg.last_name) {
                        $('#name-error').html("");
                        $('#last-name-success').html(data.sucessMsg.last_name);
                    }
                    if (data.sucessMsg.email) {
                        $('#email-error').html("");
                        $('#email-success').html(data.sucessMsg.email);
                    }
                    if (data.sucessMsg.phone) {
                        $('#phone-error').html("");
                        $('#phone-success').html(data.sucessMsg.phone);
                    }
                    if (data.sucessMsg.password) {
                        $('#password-error').html("");
                        $('#password-success').html(data.sucessMsg.password);
                    }
                    if (data.sucessMsg.flag) {
                        $('#flag-error').html("");
                        $('#flag-success').html(data.sucessMsg.flag);
                    }
                }
            })

            // error encountered
            .error(function(data, textStatus, errorThrown) {
                // print data
                // console.warn(data)
                console.warn(data.responseText)
                // print error
                console.warn('ERRORS: ' + textStatus, errorThrown);
            });

            // stop the form from submitting the normal way and refreshing the page
            event.preventDefault();
        });
    });
</script>