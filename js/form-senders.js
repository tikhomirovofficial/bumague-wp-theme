document.addEventListener('DOMContentLoaded', function() {
    // Функция для получения информации о файлах
    function getFilesInfo(fileInput) {
        const files = [];
        for (let i = 0; i < fileInput.files.length; i++) {
            files.push({
                name: fileInput.files[i].name,
                size: fileInput.files[i].size,
                type: fileInput.files[i].type,
                lastModified: fileInput.files[i].lastModified
            });
        }
        return files;
    }

    // Обработчик для формы в request-window
    const requestForm = document.querySelector('#request-window .window__form');
    if (requestForm) {
        requestForm.addEventListener('submit', function(e) {
            e.preventDefault();
            const formData = new FormData(requestForm);
            const formDataObject = Object.fromEntries(formData.entries());
            
            // Добавляем информацию о файлах
            const fileInput = requestForm.querySelector('#request-files');
            if (fileInput && fileInput.files.length > 0) {
                formDataObject.files = getFilesInfo(fileInput);
            }
            
            console.log('Данные формы "Заявка на полиграфию":', formDataObject);
        });
    }

    // Обработчик для формы в quick-request-window
    const quickRequestForm = document.querySelector('#quick-request-window .window__form');
    if (quickRequestForm) {
        quickRequestForm.addEventListener('submit', function(e) {
            e.preventDefault();
            const formData = new FormData(quickRequestForm);
            const formDataObject = Object.fromEntries(formData.entries());
            console.log('Данные формы "Быстрый заказ полиграфии":', formDataObject);
        });
    }

    // Обработчик для калькулятора (calculatorForm)
    const calculatorForm = document.querySelector('#calculatorForm');
    if (calculatorForm) {
        calculatorForm.addEventListener('submit', function(e) {
            e.preventDefault();
            const formData = new FormData(calculatorForm);
            
            // Собираем данные из radio-групп
            const radioGroups = ['size', 'quantity', 'material', 'colors', 'lamination', 'deadline'];
            radioGroups.forEach(group => {
                const selected = calculatorForm.querySelector(`input[name="${group}"]:checked`);
                if (selected) {
                    formData.set(group, selected.value);
                }
            });
            
            const formDataObject = Object.fromEntries(formData.entries());
            
            // Добавляем информацию о файлах для калькулятора
            const calcFileInput = calculatorForm.querySelector('#request-files');
            if (calcFileInput && calcFileInput.files.length > 0) {
                formDataObject.files = getFilesInfo(calcFileInput);
            }
            
            console.log('Данные формы калькулятора:', formDataObject);
        });
    }
});