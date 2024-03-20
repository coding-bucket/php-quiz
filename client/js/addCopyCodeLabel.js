import $ from 'jquery';

export default function addCopyCodeLabel () {
    if (navigator.clipboard) {
        const blocks = $('pre[class*=allow_copy]');
        blocks.each(function () {
            const block = $(this);
            const button = $('<button class="clipboard"></button>');
            button.click(copyCode);
            button.click(function (event) {
                $(event.target).addClass('animate');
            });
            button.on('animationend', function (event) {
                $(event.target).removeClass('animate');
            });
            block.append(button);
        });
    }

    async function copyCode (event) {
        const parent = $(event.target).parent();
        const code = parent.find('code');
        const text = code.text();
        await navigator.clipboard.writeText(text);
    }
}
