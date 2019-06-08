<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <meta name="_token" content="{{csrf_token()}}"/>
    <title>Registration</title>
    <link rel="stylesheet" type="text/css" href="{{ url('/css/custom.css') }}"/>

</head>
<body>
<h1 style="text-align:center;">Registration Form</h1>


<div class="container">
    <div class="alert" ></div>
    <form id="registrationForm" name="registrationForm" action="" method="post">


        <label for="firstName">First Name:</label>
        <input type="text" id="firstName" name="firstName" required>

        <label type="lastName"> Last Name:</label>
        <input type="text" id="lastName" name="lastName" required>


        <label type="email"> Email: </label>
        <input type="email" id="email" name="email" minlength="3" required>


        <button type="submit" id="ajaxSubmit" class="submit">Register</button>


    </form>
</div>

<script
        src="https://code.jquery.com/jquery-3.4.1.min.js"
        integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
        crossorigin="anonymous">

</script>

<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>

<script src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-2.1.3.min.js"></script>
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.13.0/jquery.validate.min.js"></script>
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.13.0/additional-methods.min.js"></script>
<script type="text/javascript">
    jQuery(document).ready(function () {



        $('#registrationForm').validate({
            rules: {

                firstName : {
                    required :true,
                },
                lastName : {
                    required: true,
                },
                email: {
                    required: true,
                    email: true,

                },
            }
        });



        jQuery('#registrationForm').submit(function (e) {
            e.preventDefault();



            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                }
            });

            jQuery.ajax({
                url: "{{ url('/user/post') }}",
                method: 'post',
                data: {
                    firstName: jQuery('#firstName').val(),
                    lastName: jQuery('#lastName').val(),
                    email: jQuery('#email').val()
                },
                success: function (result) {

                    jQuery('.alert').show();
                    jQuery('.alert').html(result.success);
                }
            });

            jQuery.ajax({
                url: "{{ url('/name/email') }}",
                method: 'post',
                data: {
                    firstName: jQuery('#firstName').val(),
                    lastName: jQuery('#lastName').val(),
                    email: jQuery('#email').val()
                },
                success: function (result) {

                    jQuery('.alert').html(result.success);
                }
            });

        });
    });


</script>


</body>
</html>