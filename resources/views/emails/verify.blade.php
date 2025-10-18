<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Verify Email</title>
</head>

<body>
    <h1>Verify Your Email</h1>

    <p>Please click the button below to verify your email address.</p>

    <p>
        <a href="{{ $verifyUrl }}"
            style="display:inline-block;padding:10px 20px;color:#fff;background:#3869D4;border-radius:4px;text-decoration:none;">
            Verify Email
        </a>
    </p>

    <p>Thanks,<br>{{ config('app.name') }}</p>
</body>

</html>