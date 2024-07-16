<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GouvTransfer</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome pour les icônes -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <style>
         /* Animation de changement de couleur en continu */
        @keyframes gradientBackground {
            0% {
                background-position: 0% 50%;
            }
            50% {
                background-position: 100% 50%;
            }
            100% {
                background-position: 0% 50%;
            }
        }

        body {
            margin: 0;
            height: 100vh;
            display: flex;
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
        .actm{
            font-family: actm!important;
        }

        .actr{
            font-family: actr!important;
        }

        .actb{
            font-family: actb!important;
        }

        .trans{
            font-family: trans!important;
        }
        
        .content-div{
            border-radius: 30px;
            border: solid 0px;
        }

        .corners{
            border-radius: 20px;
        }
        .form-input-text{
            font-family: actr;
            font-size: 1em;
            border-radius: 20px!important;
        }

        .otp-input {
            width: 50px;
            height: 50px;
            text-align: center;
            font-size: 24px;
            border-radius: 15px;
            border: 1px solid #ced4da;
            margin: 5px;
            font-family: actb;
        }

        .otp-input:focus {
            border-color: #007bff;
            outline: none;
        }

        .otp-container {
            display: flex;
            justify-content: center;
            margin-bottom: 15px;
        }

        .btn-circle {
            position: absolute;
            bottom: 20px;
            left: 50%;
            transform: translateX(-50%);
            width: 60px;
            height: 60px;
            border-radius: 50%;
            background-color: #007bff;
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            border: none;
            cursor: pointer;
            z-index: 1000;
        }

        .btn-circle:hover {
            background-color: #0056b3;
        }



        .modal-overlay {
          position: fixed;
          top: 0;
          left: 0;
          width: 100%;
          height: 100%;
          background-color: rgba(0, 0, 0, 0.5);
          display: none;
          justify-content: center;
          align-items: center;
          z-index: 1000;
        }

        .transfer-container {
          width: 250px;
          background-color: white;
          border-radius: 30px;
          padding: 20px;
          box-shadow: 0 2px 10px rgba(0,0,0,0.1);
          text-align: center;
        }

        

        .progress-circle {
          position: relative;
          width: 100px;
          height: 100px;
          margin: 0 auto 15px;
        }

        .circular-chart {
          display: block;
          margin: 0 auto;
          max-width: 100%;
          max-height: 100%;
        }

        .circle-bg {
          fill: none;
          stroke: #eee;
          stroke-width: 3.8;
        }

        .circle {
          fill: none;
          stroke: #3498db;
          stroke-width: 3.8;
          stroke-linecap: round;
          transition: stroke-dasharray 0.3s ease;
        }

        .percentage {
          position: absolute;
          top: 50%;
          left: 50%;
          transform: translate(-50%, -50%);
          font-size: 18px;
          font-weight: bold;
        }

        .transfer-text {
          font-size: 16px;
          margin-bottom: 10px;
        }

        .transfer-details, .transfer-time {
          font-size: 14px;
          color: #666;
          margin-bottom: 5px;
        }

        .cancel-button {
          margin-top: 15px;
          padding: 8px 20px;
          background-color: white;
          border: 1px solid #3498db;
          color: #3498db;
          border-radius: 20px;
          cursor: pointer;
          transition: background-color 0.3s, color 0.3s;
        }

        .cancel-button:hover {
          background-color: #3498db;
          color: white;
        }


        .background {
          background-image: url('img/background.jpg');
          background-size: cover;
          background-position: center;
          height: 100vh;
          display: flex;
          justify-content: space-between;
          align-items: flex-start;
          padding: 40px;
          box-sizing: border-box;
          position: relative;
        }

        .transfer-card {
          background-color: white;
          padding: 30px;
          border-radius: 40px;
          box-shadow: 0 4px 6px rgba(0,0,0,0.1);
          width: 100%;
          margin-top: 10px;
        }

        .icon-container {
          background-color: #f0f0f0;
          width: 70px;
          height: 70px;
          border-radius: 50%;
          display: flex;
          justify-content: center;
          align-items: center;
          margin-bottom: 20px;
        }

        .icon-container i {
          color: #666;
          font-size: 34px;
        }

        h2 {
          margin: 0 0 10px 0;
          font-size: 18px;
        }

        p {
          margin: 0 0 5px 0;
          color: #666;
          font-size: 14px;
        }

        .subtitle {
          margin-bottom: 20px;
        }

        .file-info {
          background-color: #f0f0f0;
          padding: 10px;
          border-radius: 5px;
          display: flex;
          align-items: center;
          margin-bottom: 20px;
        }

        .file-info i {
          margin-right: 10px;
          color: #666;
        }

        .file-info span:last-child {
          margin-left: auto;
          color: #666;
        }

        .download-btn {
          background-color: #040e8a;
          color: white;
          border: none;
          padding: 10px 20px;
          border-radius: 5px;
          cursor: pointer;
          width: 100%;
        }

        .text-overlay {
          color: white;
          font-size: 24px;
          max-width: 50%;
        }

        .text-overlay h1 {
          font-size: 2.5em;
          line-height: 1.2;
        }

        .logo {
          position: ;
          bottom: 40px;
          left: 40px;
          color: white;
          font-size: 18px;
          font-weight: bold;
          margin-top: 40px;
        }
    </style>
</head>
<body>

<div class="container py-5">
        
        <h1 class="text-center text-primary mb-4" style="font-family: trans;">
            <span style="color: #ffffff;">Gouv</span>
            <span style="color:#0256d3">Transfer</span>
        </h1>

    <!-- /Chargemet loader -->

        <div class="modal-overlay">
            
            <!-- Le contenu du div pourcentage -->
            <div class="transfer-container">
              <div class="progress-circle">
                <svg viewBox="0 0 36 36" class="circular-chart">
                  <path class="circle-bg"
                    d="M18 2.0845
                      a 15.9155 15.9155 0 0 1 0 31.831
                      a 15.9155 15.9155 0 0 1 0 -31.831"
                  />
                  <path class="circle"
                    stroke-dasharray="30, 100"
                    d="M18 2.0845
                      a 15.9155 15.9155 0 0 1 0 31.831
                      a 15.9155 15.9155 0 0 1 0 -31.831"
                  />
                </svg>
                <div class="percentage trans">35%</div>
              </div>
              <div class="transfer-text actb">Vérification en cours...</div>

              <button class="cancel-button actm" onclick="cancel()">Annuler</button>
            </div>
            <!-- /Le contenu du div pourcentage -->

        </div>

    <!-- /Chargemet loader -->

        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="transfer-card">
                    <div class="icon-container">
                      <i class="fas fa-arrow-down fa-2x"></i>
                    </div>
                    <h2 class="actb">Je suis prêt dès que tu l'es</h2>
                    <p class="actr">Le transfert expire dans 30 jours</p>
                    <p class="subtitle actr">Tests, tests :)</p>
                    <div class="file-info" style="border-radius: 30px;">
                      
                      <i class="fas fa-file-archive"></i>
                      <span class="actr">TEST.rar</span>
                      <span class="actr">894 MB · rar</span>

                    </div>
                    <button class="download-btn actb" style="border-radius: 30px;">
                        Télécharger
                        <i class="fa-solid fa-circle-arrow-down"></i>
                    </button>
                  </div>
                  <!-- <div class="text-overlay">
                    <h1>This is for all you<br>pixel pushing<br>control freaks out there</h1>
                  </div> -->
                <div class="logo text-center trans">
                    GouvTransfer Pro
                </div>
            </div>
        </div>
    </div>


    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.querySelectorAll('.otp-input').forEach((input, index, inputs) => {
            input.addEventListener('input', (e) => {
                if (input.value.length === 1 && index < inputs.length - 1) {
                    inputs[index + 1].focus();
                }
            });

            input.addEventListener('keydown', (e) => {
                if (e.key === 'Backspace' && input.value.length === 0 && index > 0) {
                    inputs[index - 1].focus();
                }
            });

            input.addEventListener('paste', (e) => {
                const paste = (e.clipboardData || window.clipboardData).getData('text');
                const digits = paste.split('');
                inputs.forEach((input, i) => {
                    input.value = digits[i] || '';
                });
            });
        });

        function verify(){
            // Pour afficher le modal
            document.querySelector('.modal-overlay').style.display = 'flex';
        }


        function cancel(){
            // Pour cacher le modal
            document.querySelector('.modal-overlay').style.display = 'none';
        }
    </script>
</body>
</html>