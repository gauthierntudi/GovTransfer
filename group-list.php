<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Groupes - GouvTransfer</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <style>
        @font-face { font-family: trans; src: url('fonts/GT-Super-WT-Super.3397811e.woff');}
        @font-face { font-family: actb; src: url('fonts/ActiefGrotesque_W_Bd.6d0b90be.woff');}
        @font-face { font-family: actm; src: url('fonts/ActiefGrotesque_W_Medium.7e37a161.woff');}
        @font-face { font-family: actr; src: url('fonts/ActiefGrotesque_W_Regular.458577e8.woff');}
        .actm{ font-family: actm!important; }
        .actr{ font-family: actr!important; }
        .actb{ font-family: actb!important; }
        .trans{ font-family: trans!important; }
        @keyframes gradientBackground {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }
        body {
            margin: 0;
            height: auto;
            padding-top: 90px;
            padding-bottom: 50px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            animation: gradientBackground 15s ease infinite;
            background: linear-gradient(45deg, #0b4eb3, #0649d3, #091f71, #162e5e, #111d4b, #2d4675, #0357c8);
            background-size: 400% 400%;
        }
        .content-div {
            border-radius: 30px;
            padding: 30px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            background-color: white;
            max-width: 450px;
            width: 100%;
        }
        .table {
            font-family: actr;
            border-radius: 10px;
            overflow: hidden;
        }
        .btn-primary {
            font-family: actb;
            border-radius: 20px;
            padding: 10px 20px;
            width: 100%;
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
        }
        .btn-circle {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 16px;
            color: white;
            border: none;
            margin-right: 5px;
        }
        .btn-edit {
            background-color: #033190;
        }
        .btn-delete {
            background-color: #dc3545;
        }
        .btn-circle i {
            font-size: 13px;
        }
        .action-buttons {
            display: flex;
            justify-content: flex-start;
            align-items: center;
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

        .centered-top {
            position: relative;
            bottom: 0px;
            top: 0px;
            color: white; 
        }

        .table-darkness {
            background: #021e57!important;
            color: #ffffff;
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
            bottom: 45px;
            right: 37px;
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

    <h1 class="text-center text-primary mb-4" style="font-family: trans;">
            <img src="img/pr01.png" class="centered-top" style="width:110px;">
            <span style="color: #ffffff;">Gouv</span><span style="color:#0256d3">Transfer</span>
        </h1>

    <div class="content-div">
        <h1 class="text-center trans" style="font-size: 2em;">Liste des Groupes</h1>
        <table class="table table-striped table-hover">
            <thead class="table-darkness">
                <tr>
                    <th>#</th>
                    <th>Nom du Groupe</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>Groupe 1</td>
                    <td class="action-buttons">
                        <button class="btn-circle btn-edit" onclick="editGroup(1)">
                            <i class="fas fa-pen"></i>
                        </button>
                        <button class="btn-circle btn-delete" onclick="deleteGroup(1)">
                            <i class="fas fa-trash"></i>
                        </button>
                    </td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Groupe 2</td>
                    <td class="action-buttons">
                        <button class="btn-circle btn-edit" onclick="editGroup(2)">
                            <i class="fas fa-pen"></i>
                        </button>
                        <button class="btn-circle btn-delete" onclick="deleteGroup(2)">
                            <i class="fas fa-trash"></i>
                        </button>
                    </td>
                </tr>

                <tr>
                    <td>2</td>
                    <td>Groupe 2</td>
                    <td class="action-buttons">
                        <button class="btn-circle btn-edit" onclick="editGroup(2)">
                            <i class="fas fa-pen"></i>
                        </button>
                        <button class="btn-circle btn-delete" onclick="deleteGroup(2)">
                            <i class="fas fa-trash"></i>
                        </button>
                    </td>
                </tr><tr>
                    <td>2</td>
                    <td>Groupe 2</td>
                    <td class="action-buttons">
                        <button class="btn-circle btn-edit" onclick="editGroup(2)">
                            <i class="fas fa-pen"></i>
                        </button>
                        <button class="btn-circle btn-delete" onclick="deleteGroup(2)">
                            <i class="fas fa-trash"></i>
                        </button>
                    </td>
                </tr><tr>
                    <td>2</td>
                    <td>Groupe 2</td>
                    <td class="action-buttons">
                        <button class="btn-circle btn-edit" onclick="editGroup(2)">
                            <i class="fas fa-pen"></i>
                        </button>
                        <button class="btn-circle btn-delete" onclick="deleteGroup(2)">
                            <i class="fas fa-trash"></i>
                        </button>
                    </td>
                </tr><tr>
                    <td>2</td>
                    <td>Groupe 2</td>
                    <td class="action-buttons">
                        <button class="btn-circle btn-edit" onclick="editGroup(2)">
                            <i class="fas fa-pen"></i>
                        </button>
                        <button class="btn-circle btn-delete" onclick="deleteGroup(2)">
                            <i class="fas fa-trash"></i>
                        </button>
                    </td>
                </tr><tr>
                    <td>2</td>
                    <td>Groupe 2</td>
                    <td class="action-buttons">
                        <button class="btn-circle btn-edit" onclick="editGroup(2)">
                            <i class="fas fa-pen"></i>
                        </button>
                        <button class="btn-circle btn-delete" onclick="deleteGroup(2)">
                            <i class="fas fa-trash"></i>
                        </button>
                    </td>
                </tr><tr>
                    <td>2</td>
                    <td>Groupe 2</td>
                    <td class="action-buttons">
                        <button class="btn-circle btn-edit" onclick="editGroup(2)">
                            <i class="fas fa-pen"></i>
                        </button>
                        <button class="btn-circle btn-delete" onclick="deleteGroup(2)">
                            <i class="fas fa-trash"></i>
                        </button>
                    </td>
                </tr><tr>
                    <td>2</td>
                    <td>Groupe 2</td>
                    <td class="action-buttons">
                        <button class="btn-circle btn-edit" onclick="editGroup(2)">
                            <i class="fas fa-pen"></i>
                        </button>
                        <button class="btn-circle btn-delete" onclick="deleteGroup(2)">
                            <i class="fas fa-trash"></i>
                        </button>
                    </td>
                </tr><tr>
                    <td>2</td>
                    <td>Groupe 2</td>
                    <td class="action-buttons">
                        <button class="btn-circle btn-edit" onclick="editGroup(2)">
                            <i class="fas fa-pen"></i>
                        </button>
                        <button class="btn-circle btn-delete" onclick="deleteGroup(2)">
                            <i class="fas fa-trash"></i>
                        </button>
                    </td>
                </tr><tr>
                    <td>2</td>
                    <td>Groupe 2</td>
                    <td class="action-buttons">
                        <button class="btn-circle btn-edit" onclick="editGroup(2)">
                            <i class="fas fa-pen"></i>
                        </button>
                        <button class="btn-circle btn-delete" onclick="deleteGroup(2)">
                            <i class="fas fa-trash"></i>
                        </button>
                    </td>
                </tr><tr>
                    <td>2</td>
                    <td>Groupe 2</td>
                    <td class="action-buttons">
                        <button class="btn-circle btn-edit" onclick="editGroup(2)">
                            <i class="fas fa-pen"></i>
                        </button>
                        <button class="btn-circle btn-delete" onclick="deleteGroup(2)">
                            <i class="fas fa-trash"></i>
                        </button>
                    </td>
                </tr><tr>
                    <td>2</td>
                    <td>Groupe 2</td>
                    <td class="action-buttons">
                        <button class="btn-circle btn-edit" onclick="editGroup(2)">
                            <i class="fas fa-pen"></i>
                        </button>
                        <button class="btn-circle btn-delete" onclick="deleteGroup(2)">
                            <i class="fas fa-trash"></i>
                        </button>
                    </td>
                </tr><tr>
                    <td>2</td>
                    <td>Groupe 2</td>
                    <td class="action-buttons">
                        <button class="btn-circle btn-edit" onclick="editGroup(2)">
                            <i class="fas fa-pen"></i>
                        </button>
                        <button class="btn-circle btn-delete" onclick="deleteGroup(2)">
                            <i class="fas fa-trash"></i>
                        </button>
                    </td>
                </tr><tr>
                    <td>2</td>
                    <td>Groupe 2</td>
                    <td class="action-buttons">
                        <button class="btn-circle btn-edit" onclick="editGroup(2)">
                            <i class="fas fa-pen"></i>
                        </button>
                        <button class="btn-circle btn-delete" onclick="deleteGroup(2)">
                            <i class="fas fa-trash"></i>
                        </button>
                    </td>
                </tr><tr>
                    <td>2</td>
                    <td>Groupe 2</td>
                    <td class="action-buttons">
                        <button class="btn-circle btn-edit" onclick="editGroup(2)">
                            <i class="fas fa-pen"></i>
                        </button>
                        <button class="btn-circle btn-delete" onclick="deleteGroup(2)">
                            <i class="fas fa-trash"></i>
                        </button>
                    </td>
                </tr><tr>
                    <td>2</td>
                    <td>Groupe 2</td>
                    <td class="action-buttons">
                        <button class="btn-circle btn-edit" onclick="editGroup(2)">
                            <i class="fas fa-pen"></i>
                        </button>
                        <button class="btn-circle btn-delete" onclick="deleteGroup(2)">
                            <i class="fas fa-trash"></i>
                        </button>
                    </td>
                </tr><tr>
                    <td>2</td>
                    <td>Groupe 2</td>
                    <td class="action-buttons">
                        <button class="btn-circle btn-edit" onclick="editGroup(2)">
                            <i class="fas fa-pen"></i>
                        </button>
                        <button class="btn-circle btn-delete" onclick="deleteGroup(2)">
                            <i class="fas fa-trash"></i>
                        </button>
                    </td>
                </tr><tr>
                    <td>2</td>
                    <td>Groupe 2</td>
                    <td class="action-buttons">
                        <button class="btn-circle btn-edit" onclick="editGroup(2)">
                            <i class="fas fa-pen"></i>
                        </button>
                        <button class="btn-circle btn-delete" onclick="deleteGroup(2)">
                            <i class="fas fa-trash"></i>
                        </button>
                    </td>
                </tr><tr>
                    <td>2</td>
                    <td>Groupe 2</td>
                    <td class="action-buttons">
                        <button class="btn-circle btn-edit" onclick="editGroup(2)">
                            <i class="fas fa-pen"></i>
                        </button>
                        <button class="btn-circle btn-delete" onclick="deleteGroup(2)">
                            <i class="fas fa-trash"></i>
                        </button>
                    </td>
                </tr><tr>
                    <td>2</td>
                    <td>Groupe 2</td>
                    <td class="action-buttons">
                        <button class="btn-circle btn-edit" onclick="editGroup(2)">
                            <i class="fas fa-pen"></i>
                        </button>
                        <button class="btn-circle btn-delete" onclick="deleteGroup(2)">
                            <i class="fas fa-trash"></i>
                        </button>
                    </td>
                </tr><tr>
                    <td>2</td>
                    <td>Groupe 2</td>
                    <td class="action-buttons">
                        <button class="btn-circle btn-edit" onclick="editGroup(2)">
                            <i class="fas fa-pen"></i>
                        </button>
                        <button class="btn-circle btn-delete" onclick="deleteGroup(2)">
                            <i class="fas fa-trash"></i>
                        </button>
                    </td>
                </tr><tr>
                    <td>2</td>
                    <td>Groupe 2</td>
                    <td class="action-buttons">
                        <button class="btn-circle btn-edit" onclick="editGroup(2)">
                            <i class="fas fa-pen"></i>
                        </button>
                        <button class="btn-circle btn-delete" onclick="deleteGroup(2)">
                            <i class="fas fa-trash"></i>
                        </button>
                    </td>
                </tr><tr>
                    <td>2</td>
                    <td>Groupe 2</td>
                    <td class="action-buttons">
                        <button class="btn-circle btn-edit" onclick="editGroup(2)">
                            <i class="fas fa-pen"></i>
                        </button>
                        <button class="btn-circle btn-delete" onclick="deleteGroup(2)">
                            <i class="fas fa-trash"></i>
                        </button>
                    </td>
                </tr><tr>
                    <td>2</td>
                    <td>Groupe 2</td>
                    <td class="action-buttons">
                        <button class="btn-circle btn-edit" onclick="editGroup(2)">
                            <i class="fas fa-pen"></i>
                        </button>
                        <button class="btn-circle btn-delete" onclick="deleteGroup(2)">
                            <i class="fas fa-trash"></i>
                        </button>
                    </td>
                </tr><tr>
                    <td>2</td>
                    <td>Groupe 2</td>
                    <td class="action-buttons">
                        <button class="btn-circle btn-edit" onclick="editGroup(2)">
                            <i class="fas fa-pen"></i>
                        </button>
                        <button class="btn-circle btn-delete" onclick="deleteGroup(2)">
                            <i class="fas fa-trash"></i>
                        </button>
                    </td>
                </tr><tr>
                    <td>2</td>
                    <td>Groupe 2</td>
                    <td class="action-buttons">
                        <button class="btn-circle btn-edit" onclick="editGroup(2)">
                            <i class="fas fa-pen"></i>
                        </button>
                        <button class="btn-circle btn-delete" onclick="deleteGroup(2)">
                            <i class="fas fa-trash"></i>
                        </button>
                    </td>
                </tr><tr>
                    <td>2</td>
                    <td>Groupe 2</td>
                    <td class="action-buttons">
                        <button class="btn-circle btn-edit" onclick="editGroup(2)">
                            <i class="fas fa-pen"></i>
                        </button>
                        <button class="btn-circle btn-delete" onclick="deleteGroup(2)">
                            <i class="fas fa-trash"></i>
                        </button>
                    </td>
                </tr>
                
                <tr>
                    <td>3</td>
                    <td>Groupe 3</td>
                    <td class="action-buttons">
                        <button class="btn-circle btn-edit" onclick="editGroup(3)">
                            <i class="fas fa-pen"></i>
                        </button>
                        <button class="btn-circle btn-delete" onclick="deleteGroup(3)">
                            <i class="fas fa-trash"></i>
                        </button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    <!-- bouton de navigations -->

        <!-- Floating Button -->
        <div class="floating-btn" id="mainBtn">
            <i class="fas fa-plus"></i>
        </div>

        <!-- Round Buttons -->
        <a href="index.php" class="btn-round btn-1" data-text="Transfert">
            <i class="fas fa-bolt"></i>
        </a>
        <a href="user.php" class="btn-round btn-2" data-text="Add User">
            <i class="fas fa-user-plus"></i>
        </a>
        <a href="groupe.php" class="btn-round btn-3" data-text="Add Group">
            <i class="fas fa-user-group"></i>
        </a>
        <a href="user-list.php" class="btn-round btn-4" data-text="Afficher">
            <i class="far fa-user"></i>
        </a>
        <a href="#!" class="btn-round btn-5" data-text="Groupes">
            <i class="fa-solid fa-layer-group"></i>
        </a>
<!-- bouton de navigations -->

        <h6 class="centered-bottom trans" style="font-size:.7em"><span class="actr" style="font-size:.9em;color: #fff;">Powered by</span> data<span style="color:#02c8fa">xell</span></h6>

    <script>

        function editGroup(groupId) {
            alert('Modifier le groupe ID: ' + groupId);
            // Ajoutez ici la logique pour modifier le groupe
        }

        function deleteGroup(groupId) {
            if (confirm('Êtes-vous sûr de vouloir supprimer ce groupe?')) {
                alert('Supprimer le groupe ID: ' + groupId);
                // Ajoutez ici la logique pour supprimer le groupe
            }
        }
    </script>
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