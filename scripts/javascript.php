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
        // e.preventDefault();
        // return false;
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