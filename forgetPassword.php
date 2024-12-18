<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Password</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h2>Recover Password</h2>
        <form id="recoverForm" method="post" action="send_recovery_code.php">
            <div class="mb-3">
                <label for="email" class="form-label">Enter your email address:</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <button type="submit" class="btn btn-primary">Send Recovery Code</button>
        </form>
        
        <div id="codeVerification" style="display: none;">
            <h3>Enter Recovery Code</h3>
            <form id="verifyCodeForm" method="post" action="verify_code.php">
                <div class="mb-3">
                    <label for="recoveryCode" class="form-label">Recovery Code:</label>
                    <input type="text" class="form-control" id="recoveryCode" name="recoveryCode" required>
                </div>
                <button type="submit" class="btn btn-primary">Verify Code</button>
            </form>
        </div>

        <div id="newPassword" style="display: none;">
            <h3>Enter New Password</h3>
            <form id="newPasswordForm" method="post" action="reset_password.php">
                <div class="mb-3">
                    <label for="newPassword" class="form-label">New Password:</label>
                    <input type="password" class="form-control" id="newPassword" name="newPassword" required>
                </div>
                <button type="submit" class="btn btn-primary">Reset Password</button>
            </form>
        </div>

        <p id="errorMessage" class="text-danger"></p>
    </div>
</body>
</html>
