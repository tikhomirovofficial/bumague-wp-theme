document.addEventListener('DOMContentLoaded', function () {
    const burgerBtn = document.querySelector('.header__burger-btn');
    const mobileMenu = document.getElementById('mobile-menu');
    const headerMain = document.getElementById('header-main');
    const mobileMenuLinks = document.querySelectorAll('.mobile-menu__link'); // Все ссылки в меню

    // Функция для открытия/закрытия меню
    function toggleMobileMenu() {
        const isOpen = mobileMenu.classList.contains("mobile-menu--opened")

        if (!isOpen) {
            document.body.style.overflow = 'hidden';
            headerMain.classList.add("header__main--menu-opened")
            mobileMenu.classList.add('mobile-menu--opened');
            return;
        }
        
        document.body.style.overflow = 'visible';
        mobileMenu.classList.remove('mobile-menu--opened');
        headerMain.classList.remove("header__main--menu-opened")
    }

    burgerBtn.addEventListener('click', toggleMobileMenu);

    // Закрытие при клике на ссылки в меню
    mobileMenuLinks.forEach(link => {
        link.addEventListener('click', function(e) {
            // Проверяем, что меню открыто
            if (mobileMenu.classList.contains("mobile-menu--opened")) {
                toggleMobileMenu();
            }
        });
    });

    // close on Esc
    document.addEventListener('keydown', function (e) {
        if (e.key === 'Escape' && mobileMenu.classList.contains("mobile-menu--opened")) {
            toggleMobileMenu();
        }
    });

    // Закрытие при клике вне меню (опционально)
    document.addEventListener('click', function(e) {
        if (mobileMenu.classList.contains("mobile-menu--opened") && 
            !e.target.closest('#mobile-menu') && 
            !e.target.closest('.header__burger-btn')) {
            toggleMobileMenu();
        }
    });
});