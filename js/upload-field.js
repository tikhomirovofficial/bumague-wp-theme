document.addEventListener('DOMContentLoaded', function () {
    const uploadFields = document.querySelectorAll('.field--upload');
    const maxFiles = 5;
    const maxSize = 10 * 1024 * 1024; // 10MB

    uploadFields.forEach(uploadField => {
        const fileInput = uploadField.querySelector('.field__upload-input');
        const previewBlock = uploadField.querySelector('.field__upload-preview');
        const filesBlock = uploadField.querySelector('.field__upload-files');
        const filesList = uploadField.querySelector('.field__upload-list');
        const addBtn = uploadField.querySelector('.field__upload-files-btn');
        let uploadedFiles = [];

        // Инициализация - скрываем список файлов если нет загруженных
        updateVisibility();

        // Обработчик клика по кнопке добавления
        addBtn.addEventListener('click', function (e) {
            e.preventDefault();
            fileInput.click();
        });

        // Обработчик клика по превью
        previewBlock.addEventListener('click', function (e) {
            e.preventDefault();
            fileInput.click();
        });

        // Обработчик изменения файлов
        fileInput.addEventListener('change', function () {
            handleFiles(this.files);
            this.value = ''; // Сброс для повторной загрузки тех же файлов
        });

        // Drag and drop
        uploadField.addEventListener('dragover', function (e) {
            e.preventDefault();
            e.stopPropagation();
            this.classList.add('dragover');
        });

        uploadField.addEventListener('dragleave', function (e) {
            e.preventDefault();
            e.stopPropagation();
            this.classList.remove('dragover');
        });

        uploadField.addEventListener('drop', function (e) {
            e.preventDefault();
            e.stopPropagation();
            this.classList.remove('dragover');

            if (e.dataTransfer.files.length) {
                handleFiles(e.dataTransfer.files);
            }
        });

        // Обработка файлов
        function handleFiles(newFiles) {
            const validFiles = Array.from(newFiles).filter(file => {
                const isValidType = ['image/jpeg', 'image/png', 'application/pdf'].includes(file.type);
                const isValidSize = file.size <= maxSize;

                if (!isValidType) {
                    alert(`Файл ${file.name} не поддерживается. Разрешены только JPG, PNG, PDF.`);
                    return false;
                }

                if (!isValidSize) {
                    alert(`Файл ${file.name} слишком большой. Максимальный размер 10MB.`);
                    return false;
                }

                return true;
            });

            if (uploadedFiles.length + validFiles.length > maxFiles) {
                alert(`Можно загрузить максимум ${maxFiles} файлов.`);
                return;
            }

            uploadedFiles = [...uploadedFiles, ...validFiles.slice(0, maxFiles - uploadedFiles.length)];
            renderFiles();
            updateVisibility();
        }

        // Рендер списка файлов
        function renderFiles() {
            filesList.innerHTML = '';

            uploadedFiles.forEach((file, index) => {
                const listItem = document.createElement('li');
                listItem.className = 'field__upload-item';

                const fileName = document.createElement('span');
                fileName.className = 'field__upload-item-text';
                fileName.textContent = file.name.length > 25
                    ? file.name.substring(0, 22) + '...'
                    : file.name;

                const deleteBtn = document.createElement('button');
                deleteBtn.className = 'field__upload-delete';
                deleteBtn.innerHTML = '<img src="<?php echo get_template_directory_uri(); ?>/images/icons/delete-upload.svg" alt="Удалить">';
                deleteBtn.addEventListener('click', (e) => {
                    e.preventDefault();
                    uploadedFiles.splice(index, 1);
                    renderFiles();
                    updateVisibility();
                });

                listItem.appendChild(fileName);
                listItem.appendChild(deleteBtn);
                filesList.appendChild(listItem);
            });
        }

        // Обновление видимости блоков
        function updateVisibility() {
            if (uploadedFiles.length > 0) {
                previewBlock.style.display = 'none';
                filesBlock.style.display = 'flex';
            } else {
                previewBlock.style.display = 'flex';
                filesBlock.style.display = 'none';
            }
        }
    });
});