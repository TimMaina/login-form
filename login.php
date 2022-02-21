<html>

<head>
    <title>jQuery Login Form</title>
</head>

<body>
    <form method="post" action="login.php">
        <input type="text" id="email" placeholder="Enter....">
        <input type="password" id="password" placeholder="Password....">
        <input type="submit" value="Log In" id="login">
    </form>



    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script type="text/javascript">
    $(document).ready(function() {
        console.log("page ready")

    });
    </script>
</body>

</html>