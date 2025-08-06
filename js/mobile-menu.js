document.addEventListener('DOMContentLoaded', function () {
    const burgerBtn = document.querySelector('.header__burger-btn');
    const mobileMenu = document.getElementById('mobile-menu');
    const headerMain = document.getElementById('header-main');
    //const mobileMenuInner = document.querySelector('.mobile-menu__inner');

    // Функция для открытия/закрытия меню
    function toggleMobileMenu() {
        const isOpen = mobileMenu.classList.contains("mobile-menu--opened")

        if (!isOpen) {
            document.body.style.overflow = 'hidden';
            headerMain.classList.add("header__main--menu-opened")
            mobileMenu.classList.add('mobile-menu--opened');

            return
        }
        document.body.style.overflow = 'visible';
        mobileMenu.classList.remove('mobile-menu--opened');
        headerMain.classList.remove("header__main--menu-opened")
    }

    burgerBtn.addEventListener('click', toggleMobileMenu);

    // close on Esc
    document.addEventListener('keydown', function (e) {
        if (e.key === 'Escape' && mobileMenu.classList.contains("mobile-menu__inner--opened")) {
            toggleMobileMenu();
        }
    });
});