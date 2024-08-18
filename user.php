<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajout Utilisateur - GouvTransfer</title>
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
            height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            animation: gradientBackground 15s ease infinite;
            background: linear-gradient(45deg, #0b4eb3, #0649d3, #091f71, #162e5e, #111d4b, #2d4675, #0357c8);
            background-size: 400% 400%;
        }
        .content-div {
            position: relative;
            border-radius: 30px;
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
        .suggestions {
            position: absolute;
            background-color: white;
            border: 1px solid #ced4da;
            border-radius: 5px;
            max-height: 150px;
            overflow-y: auto;
            z-index: 1001;
            width: calc(100% - 30px); /* Adjust width to avoid overflow */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin-top: 5px; /* Space between input and suggestions */
        }
        .suggestion-item {
            padding: 5px 10px;
            cursor: pointer;
        }
        .suggestion-item:hover {
            background-color: #f8f9fa;
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
    </style>
</head>
<body>

    <h1 class="text-center text-primary mb-4" style="font-family: trans;">
        <img src="img/pr01.png" class="centered-top" style="width:110px;">
        <span style="color: #ffffff;">Gouv</span><span style="color:#0256d3">Transfer</span>
    </h1>

    <div class="content-div">
        <h1 class="text-center trans" style="font-size: 2em;">Ajout Utilisateur</h1>
        <form>
            <div class="mb-3">
                <input type="text" class="form-control form-control-lg form-input-text" id="userName" name="userName" placeholder="Nom de l'utilisateur" required>
            </div>
            <div class="mb-3" style="position: relative;">
                <input type="email" class="form-control form-control-lg form-input-text" id="userEmail" name="userEmail" placeholder="Adresse e-mail" required>
                <div class="suggestions" id="emailSuggestionsContainer" style="display: none;"></div>
            </div>
            <div class="mb-3" style="position: relative;">
                <input type="text" class="form-control form-control-lg form-input-text" id="userGroup" name="userGroup" placeholder="Groupe" required>
                <div class="suggestions" id="groupSuggestionsContainer" style="display: none;"></div>
            </div>
            <div class="mb-3 text-center">
                <button type="submit" class="btn btn-primary btn-lg">Ajouter l'utilisateur</button>
            </div>
        </form>
    </div>

    <h6 class="centered-bottom trans"><span class="actr" style="font-size:.9em;color: #fff;">Powered by</span> data<span style="color:#02c8fa">xell</span></h6>

    <!-- Bouton flottant pour la navigation -->
    <div class="floating-btn" onclick="navigateTo('groupe.php')">
        <i class="fas fa-user-group"></i>
    </div>

    <script>
        const userGroupInput = document.getElementById('userGroup');
        const groupSuggestionsContainer = document.getElementById('groupSuggestionsContainer');
        const userEmailInput = document.getElementById('userEmail');
        const emailSuggestionsContainer = document.getElementById('emailSuggestionsContainer');

        const availableGroups = ['Groupe 1', 'Groupe 2', 'Groupe 3', 'Groupe 4'];
        const availableEmails = ['example1@example.com', 'user2@example.com', 'test3@example.com', 'sample4@example.com'];

        userGroupInput.addEventListener('input', function() {
            const inputValue = userGroupInput.value.toLowerCase().trim();
            groupSuggestionsContainer.innerHTML = '';
            groupSuggestionsContainer.style.display = 'none';

            if (inputValue.length > 0) {
                const filteredSuggestions = availableGroups.filter(group =>
                    group.toLowerCase().includes(inputValue)
                );

                if (filteredSuggestions.length > 0) {
                    filteredSuggestions.forEach(group => {
                        const suggestionItem = document.createElement('div');
                        suggestionItem.className = 'suggestion-item';
                        suggestionItem.textContent = group;
                        suggestionItem.onclick = () => {
                            userGroupInput.value = group;
                            groupSuggestionsContainer.style.display = 'none';
                        };
                        groupSuggestionsContainer.appendChild(suggestionItem);
                    });

                    groupSuggestionsContainer.style.display = 'block';
                }
            }
        });

        userGroupInput.addEventListener('blur', function() {
            setTimeout(() => groupSuggestionsContainer.style.display = 'none', 200);
        });

        userEmailInput.addEventListener('input', function() {
            const emailValue = userEmailInput.value.toLowerCase().trim();
            emailSuggestionsContainer.innerHTML = '';
            emailSuggestionsContainer.style.display = 'none';

            if (emailValue.length > 0) {
                const filteredEmailSuggestions = availableEmails.filter(email =>
                    email.toLowerCase().includes(emailValue)
                );

                if (filteredEmailSuggestions.length > 0) {
                    filteredEmailSuggestions.forEach(email => {
                        const suggestionItem = document.createElement('div');
                        suggestionItem.className = 'suggestion-item';
                        suggestionItem.textContent = email;
                        suggestionItem.onclick = () => {
                            userEmailInput.value = email;
                            emailSuggestionsContainer.style.display = 'none';
                        };
                        emailSuggestionsContainer.appendChild(suggestionItem);
                    });

                    emailSuggestionsContainer.style.display = 'block';
                } else {
                    // If no suggestions match, show the entered email as the only suggestion
                    const suggestionItem = document.createElement('div');
                    suggestionItem.className = 'suggestion-item';
                    suggestionItem.textContent = emailValue;
                    suggestionItem.onclick = () => {
                        userEmailInput.value = emailValue;
                        emailSuggestionsContainer.style.display = 'none';
                    };
                    emailSuggestionsContainer.appendChild(suggestionItem);
                    emailSuggestionsContainer.style.display = 'block';
                }
            }
        });

        userEmailInput.addEventListener('blur', function() {
            setTimeout(() => emailSuggestionsContainer.style.display = 'none', 200);
        });

        function navigateTo(page) {
            window.location.href = page;
        }
    </script>
</body>
</html>
