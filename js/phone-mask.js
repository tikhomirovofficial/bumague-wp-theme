function applyPhoneMask() {
    // Находим все поля с классом phone-mask
    const phoneInputs = document.querySelectorAll('.phone-mask');

    phoneInputs.forEach(input => {
        // Добавляем обработчик ввода
        input.addEventListener('input', function (e) {
            // Получаем значение input и удаляем все нецифровые символы
            let value = this.value.replace(/\D/g, '');

            // Если номер начинается с 7 или 8 (российские номера)
            if (value.startsWith('7') || value.startsWith('8')) {
                value = value.substring(1); // Удаляем первую цифру (7 или 8)
            }

            // Форматируем номер
            let formattedValue = '+7 (';

            if (value.length > 0) {
                formattedValue += value.substring(0, 3);
            }
            if (value.length > 3) {
                formattedValue += ') ' + value.substring(3, 6);
            }
            if (value.length > 6) {
                formattedValue += '-' + value.substring(6, 8);
            }
            if (value.length > 8) {
                formattedValue += '-' + value.substring(8, 10);
            }

            // Устанавливаем отформатированное значение
            this.value = formattedValue;
        });

        // Обработка удаления символов (для корректной работы Backspace)
        input.addEventListener('keydown', function (e) {
            if (e.key === 'Backspace' && this.value.replace(/\D/g, '').length <= 1) {
                this.value = '';
            }
        });

        // Автоматическое добавление +7 при фокусе, если поле пустое
        input.addEventListener('focus', function () {
            if (!this.value) {
                this.value = '+7 (';
            }
        });

        // Валидация при потере фокуса
        input.addEventListener('blur', function () {
            if (this.value.replace(/\D/g, '').length < 11) {
                // Можно добавить подсветку ошибки
                console.log('Номер телефона неполный');
            }
        });
    });
}

// Инициализация при загрузке страницы
document.addEventListener('DOMContentLoaded', function () {
    applyPhoneMask();
});

// Для динамически добавленных элементов можно вызвать функцию повторно
// applyPhoneMask();