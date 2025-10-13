<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Reset Password</title>
</head>
<body style="font-family: Arial, sans-serif; background-color: #f9f9f9; padding: 20px;">
    <div style="max-width: 600px; margin: 0 auto; background-color: white; padding: 20px; border-radius: 8px;">
        <h2 style="color: #198754; text-align: center;">Password Reset Request</h2>
        <p>Hello,</p>
        <p>You are receiving this email because we received a password reset request for your account.</p>
        <p style="text-align: center; margin: 30px 0;">
            <a href="{{ url('reset-password/'.$token) }}"
               style="background-color: #198754; color: white; padding: 10px 20px; text-decoration: none; border-radius: 5px;">
                Reset Password
            </a>
        </p>
        <p>If you did not request a password reset, no further action is required.</p>
        <p style="color: #555;">Thanks,<br>The MiniHotel Team</p>
    </div>
</body>
</html>
