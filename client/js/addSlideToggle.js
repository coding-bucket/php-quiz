import $ from 'jquery';
export default function addSlideToggle () {
    $(document).ready(function () {
        $('#open-drawer').click(function (e) {
            const open = e.target.dataset.opened;
            e.target.dataset.opened = ('1' - open).toString();
            $('.tags-wrap').slideToggle('fast');
            return false;
        });
        $('.open-submenu').click(function () {
            $(this).parent().find('ul').slideToggle('fast');
            return false;
        });
    });
}
