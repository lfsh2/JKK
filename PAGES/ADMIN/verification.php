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
        <div class="admin">
            <div class="img-block">
                <img src="../../ASSETS/logo.png" alt="">
            </div>

            <div class="verification">
            <form action="verify_code.php?email=<?php echo $_GET['email']; ?>" method="POST">
            <div class="text-block">
                        <h1>Verification Code</h1>
                        <p>Please check your email and enter the code we just sent you </p>
                    </div>

                    <div class="verification-block">
                        <input type="number" name="verify1" id="verify" oninput="limitToOneDigit()" required>
                        <input type="number" name="verify2" id="verify" oninput="limitToOneDigit()" required>
                        <input type="number" name="verify3" id="verify" oninput="limitToOneDigit()" required>
                        <input type="number" name="verify4" id="verify" oninput="limitToOneDigit()" required>
                        <input type="number" name="verify5" id="verify" oninput="limitToOneDigit()" required>
                    </div>

                    <button type="submit">Verify</button>

                    <p>Did not receive verification? <a href="resend_code.php">Resend</a></p>
                </form>
            </div>
        </div>

        <script>
            function limitToOneDigit() {
                let input = document.getElementById('verify');
                
                let value = input.value.trim();
                
                if (value === '' || isNaN(value) || value < 0 || value > 9 || value.length > 1) {
                    input.value = ''; 
                }
            }
        </script>
    </body>
</html>