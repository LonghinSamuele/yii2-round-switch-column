'use strict';

$(document).ready(function () {
    $(document).on('click', '.yii2-round-switch', function (e) {
        e.preventDefault();
        e.stopPropagation();
        var $switch = $(this);
        if ($switch.hasClass('disabled')) {
            return;
        }
        var $checkbox = $switch.find('input');
        var $actionProvider = $('th[data-toggle-attribute="' + $checkbox.attr('name') + '"]');
        var action = $actionProvider.data('toggleAction');
        var attribute = $actionProvider.data('toggleAttribute');
        $switch.removeClass('error');
        $.post(
            action,
            {
                id: $checkbox.data('id'),
                attribute: attribute,
            },
        ).done(function (res) {
            if (res)
                $checkbox.prop('checked', !$checkbox.prop('checked'));
        }).fail(function () {
            $switch.addClass('error');
        });
    });
});
