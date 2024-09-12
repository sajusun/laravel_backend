<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>email</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>
<body style="padding: 30px;">
<div class="container">
    <div class="mail-logo" style="
        font-size: 20px;
        font-weight: 500;
        font-family: monospace;">
        <img style="height: 40px;" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTPpEJF5DDj_yV4IUO8EcNh2wMTDoTbYLBBtQ&s" alt="mail Logo">
        <span>Company name</span>
    </div>
    <div class="text-content" style="font-size: 18px;font-family: 'Times New Roman', Times, serif;">
        <p>Hi {{$name}},</p>

        <p>If you don't make the request, just ignore this message. Otherwise, <br>you can reset your password - by clicking <u style="color: burlywood">Reset Password</u> button below.</p>

        <a style="padding: 15px;margin:10px 0;
            width: 200px;
            font-size: large;" href="http://localhost:8000/expenses-app/reset/{{$token}}" type="button" class="btn btn-danger">Reset Password</a>

        <p>Thanks,</p>
        <p>Dear User</p>
    </div>
</div>
</body>
</html>
<!-- email template -->
