document.addEventListener('DOMContentLoaded', function () {
    // Функция для активации фильтров
    function initFilterItems(containerSelector = 'body') {
        // Находим все элементы фильтра в указанном контейнере
        const filterItems = document.querySelectorAll(`${containerSelector} .filter-item`);

        // Обработчик клика для каждого элемента фильтра
        filterItems.forEach(item => {
            item.addEventListener('click', function () {
                // Удаляем класс активности у всех элементов в том же контейнере
                const parentContainer = this.closest(containerSelector) || document.body;
                parentContainer.querySelectorAll('.filter-item').forEach(filter => {
                    filter.classList.remove('filter-item--active');
                });

                // Добавляем класс активности текущему элементу
                this.classList.add('filter-item--active');

                // Можно добавить здесь дополнительную логику фильтрации
                // Например: filterContent(this.dataset.filter);
            });
        });
    }

    // Инициализация для текущей страницы
    initFilterItems(); // Можно указать конкретный контейнер
    // или просто initFilterItems() для поиска по всей странице
});