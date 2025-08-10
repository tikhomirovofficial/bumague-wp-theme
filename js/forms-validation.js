document.addEventListener('DOMContentLoaded', function() {
    // Функция проверки заполненности всех обязательных полей формы
    function checkFormValidity(form, submitButton) {
        let isFormValid = true;
        const requiredInputs = form.querySelectorAll('[required]');
        
        requiredInputs.forEach(input => {
            // Для radio-кнопок проверяем, что хотя бы одна в группе выбрана
            if (input.type === 'radio') {
                const radioGroupName = input.name;
                const isRadioChecked = form.querySelector(`input[type="radio"][name="${radioGroupName}"]:checked`);
                if (!isRadioChecked) isFormValid = false;
            } 
            // Для стандартных полей и select
            else {
                const value = input.value.trim();
                
                // Проверка поля имени
                if (input.name === 'name') {
                    if (value.length < 3 || value.length > 32) {
                        isFormValid = false;
                    }
                }
                
                // Проверка поля телефона
                if (input.name === 'phone' && input.classList.contains('phone-mask')) {
                    // Проверяем, что телефон заполнен полностью (предполагаем, что маска добавляет символы)
                    // Например, проверяем, что в поле больше 10 цифр (можно настроить под вашу маску)
                    const phoneDigits = value.replace(/\D/g, '');
                    if (phoneDigits.length < 11) { // Пример для российских номеров
                        isFormValid = false;
                    }
                }
                
                // Общая проверка для остальных обязательных полей
                if (value === '' && input.name !== 'name' && input.name !== 'phone') {
                    isFormValid = false;
                }
            }
            
            // Для кастомных select проверяем видимое поле ввода
            if (input.classList.contains('field__select-real')) {
                const customSelectInput = input.closest('.field--select')?.querySelector('.field__select-input');
                if (customSelectInput && customSelectInput.value.trim() === '') {
                    isFormValid = false;
                }
            }
        });
        
        // Обновляем состояние кнопки отправки
        if (submitButton) {
            submitButton.disabled = !isFormValid;
        }
    }

    // Инициализация обработчиков для формы
    function initForm(form) {
        const submitButton = form.querySelector('button[type="submit"]');
        const requiredInputs = form.querySelectorAll('[required]');
        
        // Первоначальная проверка
        checkFormValidity(form, submitButton);
        
        // Обработчики для всех обязательных полей
        requiredInputs.forEach(input => {
            // Для radio-кнопок вешаем на всю группу
            if (input.type === 'radio') {
                const radioGroup = form.querySelectorAll(`input[type="radio"][name="${input.name}"]`);
                radioGroup.forEach(radio => {
                    radio.addEventListener('change', () => checkFormValidity(form, submitButton));
                });
            } 
            // Для остальных полей
            else {
                input.addEventListener('input', () => checkFormValidity(form, submitButton));
                input.addEventListener('change', () => checkFormValidity(form, submitButton));
                
                // Добавляем валидацию при потере фокуса для имени и телефона
                if (input.name === 'name' || (input.name === 'phone' && input.classList.contains('phone-mask'))) {
                    input.addEventListener('blur', () => checkFormValidity(form, submitButton));
                }
            }
            
            // Для кастомных select дополнительный обработчик
            if (input.classList.contains('field__select-real')) {
                const customSelectInput = input.closest('.field--select')?.querySelector('.field__select-input');
                if (customSelectInput) {
                    customSelectInput.addEventListener('click', () => {
                        setTimeout(() => checkFormValidity(form, submitButton), 0);
                    });
                }
            }
        });
        
        // Дополнительно для кастомных select
        const customSelects = form.querySelectorAll('.field--select .field__select-real[required]');
        customSelects.forEach(select => {
            select.addEventListener('change', () => checkFormValidity(form, submitButton));
        });
    }

    // Инициализируем все формы на странице
    const forms = document.querySelectorAll('form');
    forms.forEach(initForm);
});