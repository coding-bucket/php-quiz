import $ from 'jquery';

export default function addBurgerToggle () {
    const hamburger = $('#burger');

    hamburger.click(function (e) {
        if ($('#overlay').length === 0) {
            $('body').prepend('<div id="overlay"></div>');
        }
        const overlay = $('#overlay');
        const open = e.target.dataset.open;
        if (open == null || open === '' || open === '0') {
            e.target.dataset.open = '1';
            const menu = $('#menu_main');
            menu.attr('id', 'burger_menu');
            const content = $('.content_column');
            content.prepend(menu);
            overlay.addClass('visible');
        } else {
            this.dataset.open = '0';
            const menu = $('#burger_menu');
            menu.attr('id', 'menu_main');
            $('.menu_column').prepend(menu);
            overlay.removeClass('visible');
        }
    });
}
