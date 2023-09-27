<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        @font-face {
            font-family: "PPFragment-SerifExtraBold";
            src: url('/public/fonts/PPFragment-SerifExtraBold.ttf');
        }

        @font-face {
            font-family: "PPMori-Regular";
            src: url("/public/fonts/PPMori-Regular.ttf");
        }

        h1, h2, h3, h4, h5, h6{
            font-family: "PPFragment-SerifExtraBold";
        }

        li, a {
            font-family: "PPMori-Regular";
        }

        .container {
            width: 400px;
            text-align: center;
            box-shadow: 10px 10px 15px rgba(0, 0, 0, 0.7);
            border: 2px solid black;
            border-radius: 25px;
            padding: 20px;
            display: flex;
            flex-direction: column;
            margin: auto;
        }

        .btn-login {
            text-align: center;
            background-color: #13c1ac;
            border: 2px solid #13c1ac;
            border-radius: 25px;
            padding: 0.5rem 0.8rem;
            transition: all ease-in-out 0.2s;
            font-size: 15px;
            display: flex;
            justify-content: center;
            align-items: center;
            color: #e5ebea;
            font-weight: 600;
            width: 120px;
            margin-top: 30px;
            text-decoration: none;
        }

        .lista {
            list-style: none;
            text-align: left;
            padding: 0;
        }

        @media(max-width:767px) {
            .container {
                width: 200px;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>NUOVA RICHIESTA</h1>
        <h2>Dati dell'utente</h2>
        <ul class="lista">
            <li>Nome: {{$user->name}}</li>
            <li>email: {{$user->email}}</li>
            <li>cover letter: {{$coverLetter}}</li>
            <a href="{{ route('make.revisor', Auth::user()) }}" class="btn-login">Rendi revisore</a>
        </ul>
    </div>
</body>

</html>