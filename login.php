<?php
session_start();

if(isset($_SESSION["user_id"]))
{
  header('location:index.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Document</title>
    <link rel="stylesheet" href="./style.css">
</head>

<body>

    <div class="center-box">
        <div class="row" style="height:100%">
            <div class="col-6 left-img">
                <img src="./Images/left_img.png" alt="" width="100%" height="100%">
            </div>
            <div class="col-6">
                <div class="container">
                    <div class="sl-btn">
                        <button class="top-signup">Sign Up</button>
                        <button class="top-signin">Sign In</button>
                    </div>
                    <div class="signup-container" hidden>
                        <div class="form-item-username">
                            <input type="text" name="firstName" id="firstName" placeholder="First Name">
                            <input type="text" name="lastName" id="lastName" placeholder="Last Name">
                        </div>

                        <div class="form-item">
                            <input type="email" name="email" id="email" placeholder="Email">
                            <br><span class="error-email text-danger" style="margin:5px" hidden></span>
                            <!-- <input type="text" name="username-signup" id="username-signup" placeholder="User Name">
                            <br><span class="error-username-signup text-danger" style="margin:5px">Username is
                                unavailable</span> -->
                            <!-- <input type="tel" name="phone" id="phone" placeholder="Phone"> -->
                            <!-- <input type="date" name="dob" id="dob"> -->
                        </div>

                        <div class="form-item">
                            <input type="password" name="password" id="password" placeholder="Enter password">
                            <input type="password" name="confirmPassword" id="confirmPassword"
                                placeholder="Confirm password">
                            <br>
                            <span class="error-password text-danger" style="margin:5px" hidden></span>
                        </div>

                        <div class="form-btns">
                            <button class="signup" type="submit">Sign Up</button>
                        </div>
                    </div>
                    <div class="signin-container">
                        <div class="form-item-pass">
                            <input type="text" name="username-signin" id="username-signin" placeholder="Email">
                            <br><span class="error_username_signin text-danger" style="margin:5px" hidden></span>
                            <br><input type="password" name="password" id="password-signin"
                                placeholder="Enter password">
                            <br><span class="error_password_signin text-danger" style="margin:5px" hidden></span>
                        </div>
                        <div class="form-btns">
                            <button class="signin" type="submit">Sign In</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
        integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        $(".top-signup").click(function () {
            $(".signin-container").attr("hidden", true);
            $(".signup-container").removeAttr("hidden");
        });
        $(".top-signin").click(function () {
            $(".signup-container").attr("hidden", true);
            $(".signin-container").removeAttr("hidden");
        });
        $(".signup").click(function () {
            reload();
            var first = $("#firstName").val();
            var last = $("#lastName").val();
            var email = $("#email").val();
            var pass = $("#password").val();
            var cpass = $("#confirmPassword").val();
            if(first == ""){
                alert("First Name Required");
            }
            else if(last == ""){
                alert("Last Name Required");
            }
            else if(email == ""){
                alert("Email is Required");
            }
            else if(pass == ""){
                alert("Password is Required");
            }
            else if(cpass==""){
                alert("Confirm password is Required");
            }
            else if (pass != cpass) {
                $(".error-password").removeAttr("hidden");
                $(".error-password").text("Password Didn't Match");
            }
            else {
                $.ajax({
                    url: "submit.php",
                    type: "POST",
                    data: {
                        action: "signup",
                        first: first,
                        last: last,
                        email: email,
                        pass: pass
                    },
                    success: function (data) {
                        data = JSON.parse(data);
                        console.log(data);
                        console.log(typeof (data));
                        console.log(data.error);
                        if (data.success) {
                            alert("Account Created Sucessfully");
                            location.reload();
                        }
                        if (data.error) {
                            if (data.error_email_available != '') {
                                $(".error-email").removeAttr("hidden");
                                $(".error-email").text("Email already available");
                            }
                        }
                    }
                })
            }
        });
        $(".signin").click(function () {
            var uname = $("#username-signin").val();
            var password = $("#password-signin").val();
            reload();
            $.ajax({
                url: "submit.php",
                type: "POST",
                data: {
                    action: "signin",
                    uname: uname,
                    password: password
                },
                success: function (data) {
                    data = JSON.parse(data);
                    if (data.success) {
                        location.reload();
                    }
                    if (data.error) {
                        if (data.error_username_signin != "") {
                            $(".error_username_signin").removeAttr("hidden");
                            $(".error_username_signin").text("Check the Username");
                        }
                        if (data.error_password_signin != "") {
                            $(".error_password_signin").removeAttr("hidden");
                            $(".error_password_signin").text("Check Your Password");
                        }
                    }
                }
            })
        })
        function reload() {
            $(".error_password_signin").text("");
            $(".error_username_signin").text("");
            $(".error-email").text("");
        }
    </script>
</body>

</html>