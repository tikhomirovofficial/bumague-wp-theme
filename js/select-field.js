document.addEventListener('DOMContentLoaded', function () {
    // Находим все кастомные select-контейнеры (те, что содержат field--select)
    const customSelects = document.querySelectorAll('.field--select');

    customSelects.forEach(selectField => {
        const customInput = selectField.querySelector('.field__select-input');
        const customInputWrapper = selectField.querySelector('.field__select-wrapper');
        const customDropdown = selectField.querySelector('.field__select-dropdown');
        const customIndicator = selectField.querySelector('.field__select-indicator');
        const customOptions = selectField.querySelectorAll('.field__select-option');
        const realSelect = selectField.querySelector('.field__select-real');

        // Инициализация - скрываем dropdown при загрузке
        customDropdown.classList.remove('field__select-dropdown--visible');

        // Обработчик клика по полю ввода
        customInputWrapper.addEventListener('click', function (e) {
            e.stopPropagation();

            // Закрываем все другие открытые dropdown
            document.querySelectorAll('.field__select-dropdown').forEach(dropdown => {
                if (dropdown !== customDropdown) {
                    dropdown.classList.remove('field__select-dropdown--visible');
                }
            });

            document.querySelectorAll('.field__select-indicator').forEach(indicator => {
                if (indicator !== customIndicator) {
                    indicator.classList.remove('field__select-indicator--up');
                }
            });

            customIndicator.classList.toggle('field__select-indicator--up')

            // Открываем текущий dropdown
            customDropdown.classList.toggle('field__select-dropdown--visible');

        });

        // Обработчики для опций
        customOptions.forEach(option => {
            option.addEventListener('click', function () {
                const value = this.dataset.value;
                const text = this.textContent;

                // Обновляем кастомный input
                customInput.value = text.trim();

                // Обновляем реальный select
                realSelect.value = value.trim();

                // Помечаем выбранную опцию
                customOptions.forEach(opt => opt.classList.remove('selected'));
                this.classList.add('selected');

                // Закрываем dropdown
                closeDropdown();

                // Триггерим событие change
                realSelect.dispatchEvent(new Event('change'));
            });
        });

        // Инициализация выбранного значения
        function initSelectedValue() {
            const selectedOption = realSelect.options[realSelect.selectedIndex];
            if (selectedOption.value) {
                const customOption = selectField.querySelector(`.field__select-option[data-value="${selectedOption.value}"]`);
                if (customOption) {
                    customInput.value = selectedOption.text.trim();
                    customOption.classList.add('selected');
                }
            }
        }

        // Закрытие dropdown
        function closeDropdown() {
            customDropdown.classList.remove('field__select-dropdown--visible');
            customIndicator.classList.remove('field__select-indicator--up')
        }

        // Инициализация
        initSelectedValue();
    });

    // Глобальные обработчики
    document.addEventListener('click', function (e) {
        // Закрытие при клике вне элемента
        if (!e.target.closest('.field--select')) {
            document.querySelectorAll('.field__select-dropdown').forEach(dropdown => {
                dropdown.classList.remove('field__select-dropdown--visible');
            });
        }
    });

    // Обработчики для кнопок "Заказать" в списке услуг
    const orderButtons = document.querySelectorAll('.service-item__btn');
    orderButtons.forEach(button => {
        button.addEventListener('click', function () {
            // Находим название услуги в текущем блоке
            const serviceItem = this.closest('.service-item');
            const serviceTitle = serviceItem.querySelector('.service-item__title').textContent.trim();

            // Находим соответствующий select
            const selectField = document.querySelector('.field--select');
            if (selectField) {
                // Находим соответствующую опцию
                const customOptions = selectField.querySelectorAll('.field__select-option');
                const realSelect = selectField.querySelector('.field__select-real');

                // Ищем опцию, которая соответствует названию услуги
                let foundOption = null;
                customOptions.forEach(option => {
                    if (option.textContent.trim() === serviceTitle ||
                        option.dataset.value === serviceTitle) {
                        foundOption = option;
                    }
                });

                // Если нашли совпадение - выбираем эту опцию
                if (foundOption) {
                    const value = foundOption.dataset.value;
                    const text = foundOption.textContent;

                    // Обновляем кастомный input
                    const customInput = selectField.querySelector('.field__select-input');
                    customInput.value = text.trim();

                    // Обновляем реальный select
                    realSelect.value = value;

                    // Помечаем выбранную опцию
                    customOptions.forEach(opt => opt.classList.remove('selected'));
                    foundOption.classList.add('selected');

                    // Триггерим событие change
                    realSelect.dispatchEvent(new Event('change'));
                }
            }
        });
    });

});