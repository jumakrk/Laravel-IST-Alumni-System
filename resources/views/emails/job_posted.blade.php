<!DOCTYPE html>
<html>
<head>
    <title>Job Matching Your Major</title>
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
        <p style="font-size: 16px; color: #666; text-align: center;">A job matching your major has been posted. Would you like to view it?</p>
        <div style="text-align: center; margin: 20px 0;">
            <!-- View Job Button -->
            <a href="{{ url('/jobs/' . $job->id) }}" style="display: inline-block; background-color: #ff0000; color: #ffffff; padding: 10px 20px; text-align: center; text-decoration: none; border-radius: 8px;">View Job</a>
        </div>
        <p style="font-size: 16px; color: #666; text-align: center;">If the button above does not work, copy and paste the following link into your browser:</p>
        <p style="font-size: 16px; color: #666; text-align: center;"><a href="{{ url('/jobs/' . $job->id) }}" style="color: #1a73e8;">{{ url('/jobs/' . $job->id) }}</a></p>
        <p style="font-size: 16px; color: #666; text-align: center;">If you did not create an account, no further action is required.</p>
    </div>
</body>
</html>
