<!DOCTYPE html>
<html>
<head>
    <title>Entrance Exam Notification</title>
</head>
<body>
    <h1>Welcome to Ramon Magsaysay Memorial Colleges</h1>
    <p>Dear {{ $student->username }},</p>

    <p>Congratulations! Your account has been confirmed, and you are now eligible to take the entrance exam at Ramon Magsaysay Memorial Colleges.</p>

    <p>Please log in to your account using the following credentials:</p>
    <ul>

        <li>Email: {{ $student->email }}</li>
        <li>Password: {{$password}}</li>
    </ul>


    <p>Best regards,</p>
    <p>Ramon Magsaysay Memorial Colleges</p>
</body>
</html>
