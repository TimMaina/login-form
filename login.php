<?php
session_start();

//if user is logged in
if (isset($_SESSION['loggedIN'])) {
    header('Location: hidden.php');
    exit();
}

if (isset($_POST ['login'])) {
    $connection = new mysqli("localhost", "root", "", "login");

    $email = $connection->real_escape_string($_POST ['emailPHP']);
    $password = md5($connection->real_escape_string($_POST ['passwordPHP']));

    $data = $connection->query("SELECT id FROM users WHERE email = '$email' AND password='$password'");
    if ($data->num_rows > 0) { //everything is OK, lets login
        $_SESSION['loggedIN'] = '1';
        $_SESSION['email'] = $email;

        exit('<font color="green">Login success...</font>');
    } else {
        exit('<font color="red">Please check your email or password!</font>');
    }

}
?>

<html>

<head>
    <title>jQuery Login Form</title>
</head>

<body>
    <form method="post" action="login.php">
        <input type="text" id="email" placeholder="Enter....">
        <input type="password" id="password" placeholder="Password....">
        <input type="button" value="Log In" id="login">
    </form>

    <p id="response"></p>


    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script type="text/javascript">
    $(document).ready(function() {
        $("#login").on('click', function() {
            var email = $("#email").val();
            var password = $("#password").val();

            if (email == "" || password == "")
                alert("please check your input");
            else {

                $.ajax({
                    url: "login.php",
                    method: "POST",
                    data: {
                        login: 1,
                        emailPHP: email,
                        passwordPHP: password
                    },
                    success: function(response) {
                        $("#response").html(response);

                        if (response.indexOf("Login success") >= 0) {
                            window.location.href = "hidden.php";
                        }
                    },
                    dataType: "text"
                });
            }



        });
    });
    </script>
</body>

</html>