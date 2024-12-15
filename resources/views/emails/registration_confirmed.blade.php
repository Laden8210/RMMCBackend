<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Confirmation</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        .container {
            padding: 20px;
            border: 1px solid #ccc;
            max-width: 600px;
            margin: 0 auto;
        }
        h1 {
            color: #2c3e50;
        }
        .button {
            background-color: #4CAF50;
            color: white;
            padding: 10px 15px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            border-radius: 5px;
        }
    </style>
</head>
<body>

    <div class="container">
        <h1>Welcome to Ramon Magsaysay Memorial Colleges</h1>
        <p>Dear {{ $name }},</p>
        <p>Thank you for registering for the entrance exam at Ramon Magsaysay Memorial Colleges. We have received your registration, and we will notify you once your account has been confirmed.</p>

        <p>If you have any questions, please feel free to contact us.</p>

        <p>Best regards,</p>
        <p>The Ramon Magsaysay Memorial Colleges Team</p>

    </div>

</body>
</html>
