document.addEventListener('DOMContentLoaded', function () {
    // Инициализация всех модальных окон
    const modals = document.querySelectorAll('.window');

    modals.forEach(modal => {
        const modalId = modal.id;
        const modalBody = modal.querySelector('.window__inner');
        const openButtons = document.querySelectorAll(`[data-modal="${modalId}"]`);
        const closeButton = modal.querySelector('.window__close-btn');
        const form = modal.querySelector('.window__form');

        // Обработчики открытия модалки
        openButtons.forEach(button => {
            button.addEventListener('click', function (e) {
                e.preventDefault();
                openModal(modal, modalBody);
            });
        });

        // Обработчик закрытия через крестик
        if (closeButton) {
            closeButton.addEventListener('click', () => closeModal(modal, modalBody));
        }

        // Закрытие при клике вне модалки
        modal.addEventListener('click', function (e) {
            if (e.target === modal) {
                closeModal(modal, modalBody);
            }
        });

        // Обработчик отправки формы (если есть форма)
        if (form) {
            form.addEventListener('submit', function (e) {
                e.preventDefault();
                console.log(`Форма в модалке ${modalId} отправлена`);
                closeModal(modal, modalBody);
            });
        }
    });

    // Глобальный обработчик Esc для всех модалок
    document.addEventListener('keydown', function (e) {
        if (e.key === 'Escape') {
            const openModals = document.querySelectorAll('.window.is-open');
            openModals.forEach(modal => {
                const modalBody = modal.querySelector('.window__inner');
                closeModal(modal, modalBody);
            });
        }
    });

    // Функция открытия модалки
    function openModal(modal, modalBody) {
        // Сначала закрываем все открытые модалки
        document.querySelectorAll('.window.is-open').forEach(openModal => {
            const openModalBody = openModal.querySelector('.window__inner');
            closeModal(openModal, openModalBody, false);
        });

        // Открываем нужную модалку
        modal.showModal();
        document.body.style.overflow = 'hidden';

    }

    // Функция закрытия модалки
    function closeModal(modal, modalBody, restoreScroll = true) {
        // Анимация закрытия
        modal.close();
        modal.classList.remove('is-open');
        document.body.style.overflow = '';
    }
});