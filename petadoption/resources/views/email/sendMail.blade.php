<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Send Mail</title>
</head>

<body>
    <p>寄件人：{{ $details['from'] }}</p>
    <p>主題：{{ $details['title'] }}</p>
    <p>想說的話：{{ $details['body'] }}</p>
    
</body>
