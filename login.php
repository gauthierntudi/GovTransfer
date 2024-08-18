<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GouvTransfer - Connexion</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome pour les icônes -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <style>
        /* Animation de changement de couleur en continu */
        @keyframes gradientBackground {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }

        body {
            margin: 0;
            height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            animation: gradientBackground 15s ease infinite;
            background: linear-gradient(45deg, #0b4eb3, #0649d3, #091f71, #162e5e, #111d4b, #2d4675, #0357c8);
            background-size: 400% 400%;
        }

        @font-face { font-family: trans; src: url('fonts/GT-Super-WT-Super.3397811e.woff');}
        @font-face { font-family: actb; src: url('fonts/ActiefGrotesque_W_Bd.6d0b90be.woff');}
        @font-face { font-family: actm; src: url('fonts/ActiefGrotesque_W_Medium.7e37a161.woff');}
        @font-face { font-family: actr; src: url('fonts/ActiefGrotesque_W_Regular.458577e8.woff');}
        .actm{ font-family: actm!important; }
        .actr{ font-family: actr!important; }
        .actb{ font-family: actb!important; }
        .trans{ font-family: trans!important; }

        .content-div {
            border-radius: 30px;
            border: solid 0px;
            padding: 30px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            background-color: white;
            max-width: 400px;
            width: 100%;
        }

        .form-input-text {
            font-family: actr;
            font-size: 1em;
            border-radius: 20px!important;
        }

        .btn-primary {
            font-family: actb;
            border-radius: 20px;
            padding: 10px 20px;
            width: 100%;
        }

        .centered-top {
            text-align: center;
            margin-bottom: 20px;
        }

        .centered-top img {
            width: 110px;
        }

        h1 {
            font-family: trans;
            color: #0256d3;
            text-align: center;
            margin-bottom: 30px;
        }

        .login-footer {
            text-align: center;
            margin-top: 20px;
            font-family: actr;
            color: #666;
        }

        .login-footer a{
            font-family: actr;
            color: #666;
            text-decoration: none;
        }

        .centered-bottom {
    
            position: relative;
            bottom: 0px;
            top: 30px;
            left: 50%;
            transform: translateX(-50%);
            margin: 0; 
            padding: 10px;
            background-color: rgba(0, 0, 0, 0.01);
            color: white; 
            text-align: center;
            z-index: 1000;
            width: 100%;
        }
    </style>
</head>
<body>
    <div class="centered-top">
        <h1 class="text-center text-primary mb-4" style="font-family: trans;">
            <img src="img/pr01.png" class="centered-top" style="width:110px;">
            <span style="color: #ffffff;">Gouv</span><span style="color:#0256d3">Transfer</span>
        </h1>
    </div>
    <div class="content-div">
        <h1>Connexion</h1>
        <form id="loginForm">
            <div class="mb-3">
                <input type="email" class="form-control form-control-lg form-input-text" id="email" name="email" placeholder="Adresse e-mail" required>
            </div>
            <div class="mb-3">
                <input type="password" class="form-control form-control-lg form-input-text" id="password" name="password" placeholder="Mot de passe" required>
            </div>
            <div class="mb-3 text-center">
                <button type="submit" class="btn btn-primary btn-lg">Se connecter</button>
            </div>
        </form>
        <div class="login-footer">
            <p>
                <a href="#" class="text-primary">
                Retour à la page envoi
                </a>
            </p>
        </div>


    </div>


    <h6 class="centered-bottom trans"><span class="actr" style="font-size:.9em;color: #fff;">Powered by</span> data<span style="color:#02c8fa">xell</span></h6>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.getElementById('loginForm').addEventListener('submit', function(event) {
            event.preventDefault();
            // Ici, vous pouvez ajouter la logique de connexion
            alert('Connexion réussie');
        });
    </script>
</body>
</html>
