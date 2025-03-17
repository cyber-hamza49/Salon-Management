<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Form Submission</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333333;
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
        }
        .header {
            background-color: #2d3748;
            color: white;
            padding: 20px;
            text-align: center;
            border-radius: 5px 5px 0 0;
        }
        .content {
            background-color: #ffffff;
            padding: 20px;
            border: 1px solid #e2e8f0;
            border-radius: 0 0 5px 5px;
        }
        .field {
            margin-bottom: 15px;
        }
        .label {
            font-weight: bold;
            color: #4a5568;
        }
        .message-box {
            background-color: #f7fafc;
            padding: 15px;
            border-radius: 5px;
            margin-top: 10px;
        }
        .footer {
            text-align: center;
            margin-top: 20px;
            font-size: 12px;
            color: #718096;
        }
    </style>
</head>
<body>
    <div class="header">
        <h2 style="margin: 0;">BarberX Contact Form</h2>
    </div>
    
    <div class="content">
        <div class="field">
            <span class="label">Name:</span>
            <span>{{ $details['name'] }}</span>
        </div>
        
        <div class="field">
            <span class="label">Email:</span>
            <span>{{ $details['email'] }}</span>
        </div>
        
        <div class="field">
            <span class="label">Subject:</span>
            <span>{{ $details['subject'] }}</span>
        </div>
        
        <div class="field">
            <span class="label">Message:</span>
            <div class="message-box">
                {{ $details['message'] }}
            </div>
        </div>
    </div>
    
    <div class="footer">
        <p>This is an automated message from BarberX Contact Form</p>
    </div>
</body>
</html>