<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,700">
<title>Welcome to Finance Portal</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="assests/css/style.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

<style>
        body {

            background: grey;

            display: flex;

            justify-content: center;

            align-items: center;

            height: 100vh;

            flex-direction: column;

        }

        * {

            font-family: cursive;

            box-sizing: padding-box;

        }

        form {

            width: 800px;

            border: 3px solid rgb(46, 142, 155);

            padding: 20px;

            background: rgba(13, 102, 129, 0.986);

            border-radius: 20px;

        }

        h2 {

            text-align: center;

            margin-bottom: 40px;

        }

        input {

            display: block;

            border: 2px solid #ccc;

            width: 95%;

            padding: 10px;

            margin: 10px auto;

            border-radius: 5px;

        }

        label {

            color: white;

            font-size: 18px;

            padding: 10px;

        }

        button {

            /* float: right; */

            background: rgb(35, 174, 202);

            padding: 10px 15px;

            color: #fff;

            border-radius: 5px;

            margin-left: 20px;

            border: none;
            
            cursor: pointer;

        }

        button:hover {

            opacity: .6;

        }

        .error {

            background: #F2DEDE;

            color: #0c0101;

            padding: 10px;

            width: 95%;

            border-radius: 5px;

            margin: 20px auto;

        }

        h1 {

            text-align: center;

            color: rgb(134, 3, 3);

        }

        a {


            padding: 10px 15px;

            color: black;

            border-radius: 10px;

            margin: 10px;

            border: none;

            text-decoration: none;

        }

        a:hover {
            color : black ;
            opacity: .7;

        }

        .register {
            text-align: start;
            color: #fff;
        }
    </style>

</head>
<body>

        <form action="logprocess.php" method="post" >

            <h2>LOGIN</h2>

            <label>Email Address</label>
                <input type="email"  name="email" placeholder="Email" required="required"><br>

                <label>Password</label>

                <input type="password" name="password" placeholder="Password"><br>

                <button type="submit">Login</button><br><br>

                <div class="text-center">Don't have an account? <a href="register.php">Register Here</a></div>

        </form>

</body>
</html>