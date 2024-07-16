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
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
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
        .actm{ font-family: actm!important; }
        .actr{ font-family: actr!important; }
        .actb{ font-family: actb!important; }
        .trans{ font-family: trans!important; }

        .drop-zone {
            border: 2px dashed #b8b8b9;
            border-radius: 35px;
            padding: 25px;
            text-align: center;
            cursor: pointer;
        }
        .drop-zone:hover {
            background-color: #f8f9fa;
        }
        .file-preview {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(100px, 1fr));
            gap: 10px;
        }
        .file-item, .folder-item {
            position: relative;
            border: 1px solid #dee2e6;
            border-radius: 4px;
            padding: 10px;
            text-align: center;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: auto;
            min-height: 100px;
        }
        .file-item img, .file-item i {
            max-width: 100%;
            max-height: 60px;
            margin-bottom: 5px;
        }
        .file-name {
            font-size: 0.7em;
            word-break: break-word;
            overflow: hidden;
            text-overflow: ellipsis;
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
        }
        .folder-name {
            font-weight: bold;
            margin-bottom: 5px;
            font-family: actb;
            font-size: .7em;
        }
        .folder-info {
            font-size: 0.7em;
            color: #6c757d;
            font-family: actr;
        }
        .btn-folder-del {
            font-family: actb!important;
            position: absolute;
            top: 5px;
            right: 5px;
            width: 20px;
            height: 20px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 0;
        }
        .remove-file {
            position: absolute;
            top: 2px;
            right: 2px;
            cursor: pointer;
            background-color: white;
            border-radius: 50%;
            width: 20px;
            height: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 12px;
        }
        .tags-input {
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            padding: 0.375rem 0.75rem;
            border: 1px solid #ced4da;
            border-radius: 20px;
            min-height: 38px;
        }
        .tag {
            background-color: #e9ecef;
            padding: 0.25rem 0.5rem;
            margin: 0.25rem;
            border-radius: 15px;
            display: inline-flex;
            align-items: center;
            max-width: 100%;
        }
        .tag span {
            margin-right: 5px;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }
        .tag-remove {
            cursor: pointer;
            color: #6c757d;
        }
        .tags-input input {
            flex: 1;
            border: none;
            outline: none;
            padding: 0.25rem;
            min-width: 50px;
        }
        .content-div {
            border-radius: 30px;
            border: solid 0px;
        }
        .corners {
            border-radius: 20px;
        }
        .form-input-text {
            font-family: actr;
            font-size: 1em;
            border-radius: 20px!important;
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
        .color-gey{
            color: #cbcbcd;
        }
    </style>
</head>
<body>
    <div class="container py-5">
        <h1 class="text-center text-primary mb-4" style="font-family: trans;"><span style="color: #ffffff;">Gouv</span><span style="color:#0256d3">Transfer</span></h1>


    <!-- /Chargemet transfert -->

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
              <div class="transfer-text actb">Transfert en cours...</div>
              <div class="transfer-details actr">32.9 MB sur 111.0 MB envoyés</div>
              <div class="transfer-time actr">Il reste environ 1 minute</div>
              <button class="cancel-button actm" onclick="cancel()">Annuler</button>
            </div>
            <!-- /Le contenu du div pourcentage -->

        </div>

    <!-- /Chargemet transfert -->

        


        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="card p-3 content-div">
                    <div class="card-body">
                        <div class="drop-zone mb-3" id="dropZone">
                            <i class="fa-solid fa-circle-plus fa-3x mb-2 color-gey" onclick="document.getElementById('fileInput').click()"></i>
                            <p class="mb-2 actr">Glissez et déposez vos fichiers ou dossiers ici</p>
                            <p class="mb-2 actr">ou</p>
                            <button class="btn btn-primary me-2 corners actr" onclick="document.getElementById('fileInput').click()"> <i class="fa-solid fa-circle-plus"></i> Des fichiers</button>
                            <button class="btn btn-dark corners actr" onclick="document.getElementById('folderInput').click()"><i class="fa-solid fa-folder-plus"></i> Un dossier</button>
                            <input type="file" id="fileInput" multiple class="d-none">
                            <input type="file" id="folderInput" webkitdirectory directory multiple class="d-none">
                        </div>
                        <div id="filePreview" class="file-preview mb-3"></div>
                        <form id="transferForm">
                            <div class="mb-3">
                                <input type="email" class="form-control form-control-lg form-input-text" id="senderEmail" name="senderEmail" placeholder="Email expéditeur">
                            </div>
                            <div class="mb-3">
                                <input type="text" class="form-control form-control-lg form-input-text" id="senderName" placeholder="Nom de l'expéditeur (optionnel)" name="senderName">
                            </div>
                            <div class="mb-3">
                                <div class="tags-input" id="recipientEmailsContainer">
                                    <input type="text" id="recipientEmailsInput" placeholder="Ajoutez des emails" class="form-control-plaintext">
                                </div>
                            </div>
                            <div class="mb-3">
                                <textarea class="form-control form-control-lg form-input-text" id="message" name="message" rows="2" placeholder="Votre message (optionnel)"></textarea>
                            </div>
                            <div class=" mt-3 text-center">
                                <button type="submit" class="btn btn-primary btn-lg w-50 corners trans">
                                    Transférer
                                    <i class="fa-solid fa-paper-plane"></i>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        const dropZone = document.getElementById('dropZone');
        const fileInput = document.getElementById('fileInput');
        const folderInput = document.getElementById('folderInput');
        const filePreview = document.getElementById('filePreview');
        const transferForm = document.getElementById('transferForm');
        const recipientEmailsContainer = document.getElementById('recipientEmailsContainer');
        const recipientEmailsInput = document.getElementById('recipientEmailsInput');

        let files = [];
        let folders = [];
        let recipientEmails = [];

        dropZone.addEventListener('dragover', (e) => {
            e.preventDefault();
            dropZone.style.backgroundColor = '#f8f9fa';
        });

        dropZone.addEventListener('dragleave', () => {
            dropZone.style.backgroundColor = '';
        });

        dropZone.addEventListener('drop', (e) => {
            e.preventDefault();
            dropZone.style.backgroundColor = '';
            handleDroppedItems(e.dataTransfer.items);
        });

        fileInput.addEventListener('change', () => {
            handleFiles(fileInput.files);
        });

        folderInput.addEventListener('change', (e) => {
            const files = e.target.files;
            if (files.length > 0) {
                const folderName = files[0].webkitRelativePath.split('/')[0];
                const fileCount = files.length;
                const subFolderCount = new Set(Array.from(files).map(file => 
                    file.webkitRelativePath.split('/').slice(1, -1).join('/')
                )).size;
                const totalSize = Array.from(files).reduce((total, file) => total + file.size, 0);

                folders.push({
                    name: folderName,
                    fileCount: fileCount,
                    subFolderCount: subFolderCount,
                    size: totalSize,
                    files: files
                });
                updateFilePreview();
            }
        });

        function handleDroppedItems(items) {
            for (let item of items) {
                if (item.kind === 'file') {
                    const entry = item.webkitGetAsEntry();
                    if (entry) {
                        if (entry.isDirectory) {
                            processDirectory(entry);
                        } else {
                            addFile(item.getAsFile());
                        }
                    }
                }
            }
        }

        function processDirectory(directoryEntry) {
            let reader = directoryEntry.createReader();
            let filesAndFolders = [];

            function readEntries() {
                reader.readEntries((entries) => {
                    if (entries.length) {
                        entries.forEach((entry) => {
                            if (entry.isFile) {
                                entry.file((file) => {
                                    filesAndFolders.push(file);
                                });
                            } else if (entry.isDirectory) {
                                processDirectory(entry);
                            }
                        });
                        readEntries(); // Continue reading if there are more entries
                    } else {
                        // All entries have been read
                        addFolder({
                            name: directoryEntry.name,
                            fileCount: filesAndFolders.filter(item => item instanceof File).length,
                            subFolderCount: filesAndFolders.filter(item => !(item instanceof File)).length,
                            size: filesAndFolders.reduce((total, file) => total + (file.size || 0), 0),
                            files: filesAndFolders
                        });
                    }
                });
            }

            readEntries();
        }

        function addFolder(folderData) {
            folders.push(folderData);
            updateFilePreview();
        }

        function handleFiles(newFiles) {
            Array.from(newFiles).forEach(file => addFile(file));
        }

        function addFile(file) {
            if (!files.some(f => f.name === file.name && f.size === file.size)) {
                files.push({
                    file: file,
                    size: file.size
                });
                updateFilePreview();
            }
        }

        function updateFilePreview() {
            filePreview.innerHTML = '';
            
            folders.forEach((folder, index) => {
                const folderItem = document.createElement('div');
                folderItem.className = 'folder-item';
                folderItem.innerHTML = `
                    <div class="folder-name"><i class="fas fa-folder fa-2x text-info"></i><br> ${folder.name}</div>
                    <div class="folder-info">
                        ${folder.fileCount} fichier(s), ${folder.subFolderCount} sous-dossier(s)
                        <br>Taille : ${formatSize(folder.size)}
                    </div>
                    <button class="btn btn-sm btn-danger btn-folder-del" onclick="removeFolder(${index})"><i class="fa-solid fa-xmark"></i></button>
                `;
                filePreview.appendChild(folderItem);
            });

            files.forEach((fileObj, index) => {
                const fileItem = document.createElement('div');
                fileItem.className = 'file-item';
                
                let icon;
                if (fileObj.file.type.startsWith('image/')) {
                    icon = document.createElement('img');
                    icon.src = URL.createObjectURL(fileObj.file);
                } else {
                    icon = document.createElement('i');
                    icon.className = getFileIcon(fileObj.file.type);
                }
                
                const fileName = document.createElement('div');
                fileName.className = 'file-name';
                fileName.innerHTML = `${fileObj.file.name}<br><small>${formatSize(fileObj.size)}</small>`;

                const removeButton = document.createElement('span');
                removeButton.className = 'remove-file badge bg-danger';
                removeButton.innerHTML = '&times;';
                removeButton.onclick = () => removeFile(index);
                
                fileItem.appendChild(icon);
                fileItem.appendChild(fileName);
                fileItem.appendChild(removeButton);
                filePreview.appendChild(fileItem);
            });
        }

        function getFileIcon(mimeType) {
            switch (true) {
                case mimeType.startsWith('image/'): 
                    return 'fas fa-file-image fa-2x text-primary';
                case mimeType === 'application/pdf': 
                    return 'fas fa-file-pdf fa-2x text-danger';
                case mimeType === 'application/vnd.openxmlformats-officedocument.wordprocessingml.document': 
                    return 'fas fa-file-word fa-2x text-primary';
                case mimeType === 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet': 
                    return 'fas fa-file-excel fa-2x text-success';
                case mimeType === 'application/vnd.openxmlformats-officedocument.presentationml.presentation': 
                    return 'fas fa-file-powerpoint fa-2x text-warning';
                default: 
                    return 'fas fa-file fa-2x text-secondary';
            }
        }

        function formatSize(bytes) {
            if (bytes === 0) return '0 Bytes';
            const k = 1024;
            const sizes = ['Bytes', 'KB', 'MB', 'GB', 'TB'];
            const i = Math.floor(Math.log(bytes) / Math.log(k));
            return parseFloat((bytes / Math.pow(k, i)).toFixed(2)) + ' ' + sizes[i];
        }

        function removeFile(index) {
            files.splice(index, 1);
            updateFilePreview();
        }

        function removeFolder(index) {
            folders.splice(index, 1);
            updateFilePreview();
        }

        recipientEmailsInput.addEventListener('keydown', (e) => {
            if (e.key === 'Enter' || e.key === ',') {
                e.preventDefault();
                addRecipientEmail();
            }
        });

        recipientEmailsInput.addEventListener('blur', addRecipientEmail);

        function addRecipientEmail() {
            const email = recipientEmailsInput.value.trim();
            if (email && isValidEmail(email) && !recipientEmails.includes(email)) {
                recipientEmails.push(email);
                updateRecipientEmailTags();
                recipientEmailsInput.value = '';
            }
        }

        function updateRecipientEmailTags() {
            const tagsContainer = recipientEmailsContainer.querySelector('.tags') || document.createElement('div');
            tagsContainer.className = 'tags';
            tagsContainer.innerHTML = '';
            
            recipientEmails.forEach((email, index) => {
                const tag = document.createElement('span');
                tag.className = 'tag';
                tag.innerHTML = `
                    <span>${email}</span>
                    <span class="tag-remove" onclick="removeRecipientEmail(${index})">&times;</span>
                `;
                tagsContainer.appendChild(tag);
            });

            if (!recipientEmailsContainer.contains(tagsContainer)) {
                recipientEmailsContainer.insertBefore(tagsContainer, recipientEmailsInput);
            }
        }

        function removeRecipientEmail(index) {
            recipientEmails.splice(index, 1);
            updateRecipientEmailTags();
        }

        function isValidEmail(email) {
            return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email);
        }

        function cancel(){
            // Pour cacher le modal
            document.querySelector('.modal-overlay').style.display = 'none';
        }

        transferForm.addEventListener('submit', (e) => {
            e.preventDefault();
            
            // Ici, vous pouvez ajouter la logique pour envoyer les dossiers, les fichiers et les informations du formulaire\
            document.querySelector('.modal-overlay').style.display = 'flex';

            console.log('Dossiers à envoyer:', folders);
            console.log('Fichiers individuels à envoyer:', files);
            console.log('Emails des destinataires:', recipientEmails);
            console.log('Informations du formulaire:', new FormData(transferForm));
        });


    </script>
</body>
</html>