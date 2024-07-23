<!DOCTYPE html>
<html>
<head>
    <title>Verify Your Email Address</title>
</head>
<body style="font-family: Arial, sans-serif; background-color: #f4f4f4; margin: 0; padding: 0;">
    <div style="max-width: 600px; margin: 0 auto; padding: 20px; background-color: #ffffff; border-radius: 8px;">
        <div style="text-align: center; margin-bottom: 20px;">
            <!-- IST Logo with Clickable Link -->
            <a href="https://www.isteducation.com/" target="_blank" style="display: inline-block; margin: 0 auto;">
                <img src="https://www.isteducation.com/wp-content/uploads/2022/02/cropped-IST-logo-01-2048x2048-1-2.png" alt="IST Logo" style="width: 150px; height: auto; display: block; margin: 0 auto; max-width: 100%; border: none; outline: none;">
            </a>
        </div>
        <h1 style="font-size: 24px; text-align: center; color: #333;">Hello, {{ $user->name }}</h1>
        <p style="font-size: 16px; color: #666; text-align: center;">Thank you for registering with us. Please click the button below to verify your email address:</p>
        <div style="text-align: center; margin: 20px 0;">
            <!-- Verify Email Button -->
            <a href="{{ $verificationUrl }}" style="display: inline-block; background-color: #ff0000; color: #ffffff; padding: 10px 20px; text-align: center; text-decoration: none; border-radius: 8px;">Verify Email Address</a>
        </div>
        <p style="font-size: 16px; color: #666; text-align: center;">If the button above does not work, copy and paste the following link into your browser:</p>
        <p style="font-size: 16px; color: #666; text-align: center;"><a href="{{ $verificationUrl }}" style="color: #1a73e8;">{{ $verificationUrl }}</a></p>
        <p style="font-size: 16px; color: #666; text-align: center;">If you did not create an account, no further action is required.</p>
    </div>
</body>
</html>
