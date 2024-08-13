<!DOCTYPE html>
<html>
<head>
    <title>New Job Application</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 8px;
        }
        .header {
            text-align: center;
            margin-bottom: 20px;
        }
        .header img {
            width: 150px;
            height: auto;
            max-width: 100%;
            border: none;
            outline: none;
        }
        .content {
            font-size: 16px;
            color: #666;
            line-height: 1.5;
        }
        .content ul {
            list-style-type: none;
            padding: 0;
        }
        .content ul li {
            margin-bottom: 10px;
        }
        .content a {
            color: #1a73e8;
            text-decoration: none;
        }
        .cover-letter {
            border: 1px solid #ddd;
            border-radius: 4px;
            padding: 10px;
            background-color: #f9f9f9;
            margin-top: 20px;
            white-space: pre-wrap; /* Preserve whitespace and line breaks */
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <a href="https://www.isteducation.com/" target="_blank">
                <img src="https://www.isteducation.com/wp-content/uploads/2022/02/cropped-IST-logo-01-2048x2048-1-2.png" alt="IST Logo">
            </a>
        </div>
        <h1 style="font-size: 24px; text-align: center; color: #333;">New Job Application Received</h1>
        <p class="content">A new job application has been submitted. Here are the details:</p>
        <ul class="content">
            <li><strong>Name:</strong> {{ $applicationData['name'] }}</li>
            <li><strong>Email:</strong> {{ $applicationData['email'] }}</li>
            <li><strong>Phone:</strong> {{ $applicationData['phone'] }}</li>
            <li><strong>Cover Letter:</strong></li>
            <li class="cover-letter">{{ $applicationData['cover_letter'] }}</li>
            <li><strong>CV:</strong> <a href="{{ $applicationData['cv_url'] }}">View CV</a></li>
        </ul>
    </div>
</body>
</html>
