<script>
    function goBack() {
        window.history.back();
    }
    
    $(function register() {

        $('form').on('submit', function(e) {

            e.preventDefault();

            var name = $('#name').val();
            var email = $('#email').val();
            var password = $('#password').val();
            $.ajax({
                type: "POST",
                url: "register.php",
                data: {

                    "name": name,
                    "email": email,
                    "password": password
                },
                success: function(data) {
                    $('.result').php(data);
                    $('#customer-signup')[0].reset();
                    alert("Account registered")
                }
            });


        });
    });
</script>