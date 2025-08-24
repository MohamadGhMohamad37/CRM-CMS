<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Email Verification</title>
</head>
<body style="font-family: Arial, sans-serif; background: #f4f4f4; padding: 20px;">

    <table width="100%" cellpadding="0" cellspacing="0">
        <tr>
            <td align="center">
                <table width="500" cellpadding="20" cellspacing="0" style="background: #ffffff; border-radius: 8px; box-shadow: 0px 2px 6px rgba(0,0,0,0.1);">
                    <tr>
                        <td align="center">
                            <h2 style="color:#333;">Hello {{ $name }},</h2>
                            <p style="font-size:16px; color:#555;">
                                Thank you for registering with us. To complete your registration, please use the following verification code:
                            </p>
                            <h1 style="color:#2c7be5; letter-spacing: 4px; margin:20px 0;">{{ $code }}</h1>
                            <p style="font-size:14px; color:#777;">
                                This code will expire in 10 minutes. If you did not create an account, please ignore this email.
                            </p>
                            <p style="margin-top: 30px; font-size: 14px; color:#555;">
                                Best regards,<br>
                                <strong>YourApp Team</strong>
                            </p>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>

</body>
</html>
