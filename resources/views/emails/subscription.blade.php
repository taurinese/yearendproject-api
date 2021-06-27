<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nouvel abonnement {{ $plan->name }}</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
</head>

<body>
    <div class="container">
        <div style="padding:12px; width:100%; display:flex;justify-content:center;align-items:center;">
            <img style="width:50%; margin:auto;" src="https://res.cloudinary.com/hyi9bajzn/image/upload/v1624444639/spotifree_osu0dq.png" alt="">
        </div>
        <h2>{{ $user['name'] }} s'est abonné au plan suivant: <i>{{ $plan->name }}</i></h2>
        <div class="content">
            <p>Montant de l'abonnement: {{ $plan->price / 100}}€</p>
            <p>Date de l'abonnement: {{ $user['created_at'] }}</p>
            <p>4 dernier chiffres: {{ $user['last_four'] }}</p>
            <p>Date du renouvellement: </p>
        </div>
    </div>
</body>

</html>
<style>
    body {
        background-color: #ecf0f1;
        font-family: 'Roboto';
    }

    .container {
        width: 80%;
        margin: 10% auto;
        background-color: white;
        padding: 20px;
    }

    .content {
        font-size: 14px;
        color: #c3c3c3;
    }
</style>