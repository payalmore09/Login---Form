<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <link rel="stylesheet" href="registerstyle.css">
</head>
<body>
    <div class="container">
        <div class="content-container">
            <h1>Register Now</h1>
            <p>Create your account to get started.</p>
        </div>
        <div class="form-container">
            <form name="frm1" action="registeradd.php" method="POST">
                <h2>Register</h2>
                <p>Fill in the form below to create an account.</p>
                <div class="form-group">
                    <label for="txtid">User ID:</label>
                    <input type="text" id="txtid" name="txtid" required>
                </div>
                <div class="form-group">
                    <label for="txtname">User Name:</label>
                    <input type="text" id="txtname" name="txtname" required>
                </div>
                <div class="form-group">
                    <label for="txtpass">Password:</label>
                    <input type="password" id="txtpass" name="txtpass" required>
                </div>
                <div class="form-group" style="text-align:center">
                    <input type="submit" value="Register">
                </div>
            </form>
		<a class="back-link" href="form.html">Back</a>
        </div>
    </div>
</body>
</html>
