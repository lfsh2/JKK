<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>JJK Construction Services</title>
        <link rel="shortcut icon" href="../../ASSETS/logo.png" type="image/x-icon">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer"/>
        <link rel="stylesheet" href="../../CSS/admin.css">
        <style>
            @media screen and (max-width: 992px) {
                .admin {
                    height: 100vh;
                    
                    .img-block {
                        display: none;
                    }

                    .form, .verification {
                        width: 100%;
                    }
                }
                .signup {
                    height: auto;
                }
            }
        </style>
    </head>

    <body>
        <div class="admin signup">
            <div class="img-block">
                <img src="../../ASSETS/logo.png" alt="">
            </div>

            <div class="form">
                <form action="register.php" method="POST">
                    <h1>Create Account</h1>
                    
                    <div class="input-block">
                        <input type="text" name="fname" id="fname" placeholder=" " required>
                        <label for="fname">First Name</label>
                    </div>
                    <div class="input-block">
                        <input type="text" name="mname" id="mname" placeholder="" required>
                        <label for="mname">Middle Name</label>
                    </div>
                    <div class="input-block">
                        <input type="text" name="lname" id="lname" placeholder=" " required>
                        <label for="lname">Last Name</label>
                    </div>
                    <div class="input-block">
                        <input type="text" name="username" id="username" placeholder=" " required>
                        <label for="username">Username</label>
                    </div>
                    <div class="input-block">
                        <input type="email" name="email" id="email" placeholder=" " required>
                        <label for="email">Email</label>
                    </div>
                    <div class="input-block">
                        <input type="number" name="mobilenum" id="mobilenum" placeholder=" " required>
                        <label for="mobilenum">Mobile Number</label>
                    </div>
                    <div class="input-block">
                        <input type="password" name="password" id="password" placeholder=" " required>
                        <label for="password">Password</label>
                    </div>
                    <div class="input-block">
                        <input type="password" name="cpassword" id="cpassword" placeholder=" " required>
                        <label for="cpassword">Password Confirm</label>
                    </div>

                    <button type="submit">Submit</button>
                </form>
            </div>
        </div>
    </body>
</html>
