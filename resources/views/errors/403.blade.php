<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Error 403</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-color: #f0f2f5;
            font-family: 'Arial', sans-serif;
            color: #333;
        }
        .container {
            text-align: center;
            max-width: 600px;
            padding: 20px;
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .container h1 {
            font-size: 100px;
            margin: 0;
            color: #fc8919;
        }
        .container h2 {
            font-size: 24px;
            margin: 20px 0;
        }
        .container p {
            font-size: 18px;
            margin: 20px 0;
            color: #666;
        }
        .container a {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 20px;
            font-size: 18px;
            color: #fff;
            background-color: #fc8919;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s;
        }
        .container a:hover {
            background-color: #d43a65;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>403</h1>
        <h2>Prohibited</h2>
        <p>You do not have permission to access this page.</p>
        <a href="{{ url('/') }}">Back to main page</a>
    </div>
</body>
</html>