<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bouton Flottant avec Animation</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <style>
        body {
            margin: 0;
            padding: 0;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: #f7f7f7;
        }

        .floating-btn {
            position: fixed;
            bottom: 30px;
            right: 30px;
            width: 60px;
            height: 60px;
            background-color: #0256d3;
            color: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.3);
            cursor: pointer;
            z-index: 1000;
            transition: transform 0.3s ease-in-out;
        }

        .floating-btn.active {
            transform: rotate(45deg);
        }

        .btn-round {
            position: fixed;
            bottom: 30px;
            right: 30px;
            width: 50px;
            height: 50px;
            background-color: #3498db;
            color: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 20px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.3);
            cursor: pointer;
            opacity: 0;
            visibility: hidden;
            transition: all 0.3s ease-in-out;
            text-decoration: none;
        }

        .btn-round.show {
            opacity: 1;
            visibility: visible;
        }

        /* Animation for vertical buttons */
        .btn-1.show {
            transform: translateY(-70px);
        }

        .btn-2.show {
            transform: translateY(-140px);
        }

        .btn-3.show {
            transform: translateY(-210px);
        }

        .btn-4.show {
            transform: translateY(-280px);
        }

        .btn-5.show {
            transform: translateY(-350px);
        }

        /* Text when hovering buttons */
        .btn-round::before {
            content: attr(data-text); /* Use the data-text attribute for the label */
            position: absolute;
            right: 60px; /* Position to the left of the button */
            background-color: rgba(0, 0, 0, 0.7);
            color: white;
            padding: 5px 10px;
            border-radius: 5px;
            opacity: 0;
            transform: translateX(-10px);
            transition: opacity 0.3s ease, transform 0.3s ease;
            white-space: nowrap;
            pointer-events: none; /* Ensure the text doesn't interfere with clicking the button */
            font-size: 14px;
        }

        .btn-round:hover::before {
            opacity: 1;
            transform: translateX(0);
        }
    </style>
</head>
<body>

    <!-- Floating Button -->
    <div class="floating-btn" id="mainBtn">
        <i class="fas fa-plus"></i>
    </div>

    <!-- Round Buttons -->
    <a href="#" class="btn-round btn-1" data-text="Home"><i class="fas fa-home"></i></a>
    <a href="#" class="btn-round btn-2" data-text="User"><i class="fas fa-user"></i></a>
    <a href="#" class="btn-round btn-3" data-text="Settings"><i class="fas fa-cog"></i></a>
    <a href="#" class="btn-round btn-4" data-text="Messages"><i class="fas fa-envelope"></i></a>
    <a href="#" class="btn-round btn-5" data-text="Info"><i class="fas fa-info"></i></a>

    <script>
        const mainBtn = document.getElementById('mainBtn');
        const btns = document.querySelectorAll('.btn-round');

        mainBtn.addEventListener('click', () => {
            mainBtn.classList.toggle('active');
            btns.forEach((btn, index) => {
                setTimeout(() => {
                    btn.classList.toggle('show');
                }, index * 50); // Delay each button's appearance slightly
            });
        });
    </script>

</body>
</html>