<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Form</title>
</head>
<body>
    <h1>Contact Message</h1>
    <p>Nome: {{$details['name']}}</p>
    <p>Email: {{$details['email']}}</p>
    <p>Tel: {{$details['phone']}}</p>
    <p>Assunto: {{$details['subject']}}</p>
    <p>Mensagem: {{$details['message']}}</p>
    
</body>
</html>