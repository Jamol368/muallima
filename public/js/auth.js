$(document).ready(function () {
    $(document).on('click', '.toggle-password', function () {
        const input = $($(this).data('target'));

        input.attr(
            'type',
            input.attr('type') === 'password' ? 'text' : 'password'
        );

        $(this).toggleClass('fa-eye fa-eye-slash');
    });
});
