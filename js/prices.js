document.addEventListener('DOMContentLoaded', function() {
    const tabs = document.querySelectorAll('.prices__tabs-item');
    const contentTabs = document.querySelectorAll('.prices__tab');
    
    // Функция переключения табов
    function switchTab(index) {
        // Убираем активные классы у всех табов и контента
        tabs.forEach(tab => tab.classList.remove('prices__tabs-item--active'));
        contentTabs.forEach(tab => tab.classList.remove('prices__tab--active'));
        
        // Добавляем активные классы выбранному табу и соответствующему контенту
        tabs[index].classList.add('prices__tabs-item--active');
        contentTabs[index].classList.add('prices__tab--active');
    }
    
    // Назначаем обработчики клика на табы
    tabs.forEach((tab, index) => {
        tab.addEventListener('click', () => switchTab(index));
    });
    
    // По умолчанию активируем первую вкладку
    if (tabs.length > 0 && contentTabs.length > 0) {
        switchTab(0);
    }
});