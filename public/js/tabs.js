(function ($) {
    "use strict";

    openQuestion(1);

    $('.tablinks').click(function (){
        openQuestion($(this).html());
    })

    $('.next').click(function () {
        direction($('.tabcontent.show input').attr('name'), 1)
    })

    $('.previous').click(function () {
        direction($('.tabcontent.show input').attr('name'), -1)
    })

    function direction(key, dir) {
        let current_tablink = $('.tablinks.active')
        if (dir === 1 && current_tablink.next()) {
            current_tablink.next().trigger('click');
        } else if (dir === -1 && current_tablink.prev()) {
            current_tablink.prev().trigger('click');
        }
    }

    function openQuestion(key) {
        let current_tablink = $('.tablinks.active');
        if ($('.tabcontent.show input').is(':checked')) {
            current_tablink.addClass('checked')
        }

        current_tablink.removeClass('active');
        $('#tablinks-'+key).addClass('active');

        $('.tabcontent.show').removeClass('show');
        $('#tabcontent-'+key).addClass('show');

    }

    var secondsLeft = $('#time').val() * 60;

    function updateTimer() {
        var minutes = Math.floor(secondsLeft / 60);
        var seconds = secondsLeft % 60;

        minutes = minutes>9?minutes:'0'+minutes;
        seconds = seconds>9?seconds:'0'+seconds;

        var timerDisplay = minutes + ":" + seconds;
        $('#timer').text(timerDisplay);

        secondsLeft--;

        if (secondsLeft < 0) {
            clearInterval(timerInterval);
            $('#submit').click();
        }
    }

    // Initial call to updateTimer
    updateTimer();

    // Call updateTimer every second
    var timerInterval = setInterval(updateTimer, 1000);

    $('#test').submit(function(event) {
        // Show a confirmation dialog
        var confirmation = secondsLeft>0?confirm("Testni yakunlamoqchimisiz?"):true;

        // If user confirms, proceed with form submission
        if (confirmation) {
            return true // Submit the form
        }

        return false
    });

    window.history.pushState(null, "", window.location.href);
    window.onpopstate = function() {
        window.history.pushState(null, "", window.location.href);
    };

    $("body").on("contextmenu", function(e) {
        return false;
    });

})(jQuery);
