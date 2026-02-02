(function ($) {
    "use strict";

    // Spinner
    var spinner = function () {
        setTimeout(function () {
            if ($('#spinner').length > 0) {
                $('#spinner').removeClass('show');
            }
        }, 1);
    };
    spinner();


    // Initiate the wowjs
    new WOW().init();


    // Sticky Navbar
    $(window).scroll(function () {
        if ($(this).scrollTop() > 45) {
            $('.navbar').addClass('sticky-top shadow-sm');
        } else {
            $('.navbar').removeClass('sticky-top shadow-sm');
        }
    });

    // Dropdown on mouse hover
    const $dropdown = $(".dropdown");
    const $dropdownToggle = $(".dropdown-toggle");
    const $dropdownMenu = $(".dropdown-menu");
    const showClass = "show";

    $(window).on("load resize", function() {
        if (this.matchMedia("(min-width: 992px)").matches) {
            $dropdown.hover(
            function() {
                const $this = $(this);
                $this.addClass(showClass);
                $this.find($dropdownToggle).attr("aria-expanded", "true");
                $this.find($dropdownMenu).addClass(showClass);
            },
            function() {
                const $this = $(this);
                $this.removeClass(showClass);
                $this.find($dropdownToggle).attr("aria-expanded", "false");
                $this.find($dropdownMenu).removeClass(showClass);
            }
            );
        } else {
            $dropdown.off("mouseenter mouseleave");
        }
    });


    // Facts counter
    $('[data-toggle="counter-up"]').counterUp({
        delay: 10,
        time: 2000
    });


    // Back to top button
    $(window).scroll(function () {
        if ($(this).scrollTop() > 100) {
            $('.back-to-top').fadeIn('slow');
        } else {
            $('.back-to-top').fadeOut('slow');
        }
    });
    $('.back-to-top').click(function () {
        $('html, body').animate({scrollTop: 0}, 1500, 'easeInOutExpo');
        return false;
    });


    // Testimonials carousel
    $(".testimonial-carousel").owlCarousel({
        autoplay: true,
        smartSpeed: 1500,
        dots: true,
        loop: true,
        center: true,
        responsive: {
            0:{
                items:1
            },
            576:{
                items:1
            },
            768:{
                items:2
            },
            992:{
                items:3
            }
        }
    });


    // Vendor carousel
    $('.vendor-carousel').owlCarousel({
        loop: true,
        margin: 45,
        dots: false,
        autoplay: true,
        smartSpeed: 1000,
        responsive: {
            0:{
                items:2
            },
            576:{
                items:4
            },
            768:{
                items:6
            },
            992:{
                items:8
            }
        }
    });

    $('.start-test').on('click', function(event) {
        var userConfirmed = confirm('Testni boshlamoqchimisiz? Buning uchun hisobingizdan pul mablag\'i qirqiladi!');

        if (!userConfirmed) {
            event.preventDefault();
        }
    });

    $('input[type=radio][name=type]').on('change', function (){
        $('.depending-section').hide();

        var type = $(this).val();

        if (type == 1) {
            $('#teacher-section').show();
        } else if (type == 2) {
            $('#pupil-section').show();
        }
    });

    $('#province').on('change', function (){
        $('#school option:not(:first)').hide();
        $('#school').val('');

        $('#town option:not(:first)').hide();
        $('#town').val('');

        var province_id = $(this).val();

        $('#town option').filter( function () {
            return $(this).attr('data-province') === province_id;
        }).show();
    });

    $('#town').on('change', function (){
        $('#school option:not(:first)').hide();
        $('#school').val('');

        var town_id = $(this).val();

        $('#school option').filter( function () {
            return $(this).attr('data-town') === town_id;
        }).show();
    });

    $('#toggle_password').on('click', function () {
        const passwordInput = $('#password');
        const type = passwordInput.attr('type') === 'password' ? 'text' : 'password';
        passwordInput.attr('type', type);

        // Toggle the eye icon between eye and eye-slash
        $(this).toggleClass('fa-eye fa-eye-slash');
    });
    $('#toggle_password_confirmation').on('click', function () {
        const passwordInput = $('#password_confirmation');
        const type = passwordInput.attr('type') === 'password' ? 'text' : 'password';
        passwordInput.attr('type', type);

        // Toggle the eye icon between eye and eye-slash
        $(this).toggleClass('fa-eye fa-eye-slash');
    });

    $('#profile_btn_mobile').on('click', function(e) {
        e.stopPropagation();
        $('.dropdown-content-mobile').toggle();
    });
    $(document).on('click', function() {
        $('.dropdown-content-mobile').hide();
    });
    $(document).on('keydown', function(e) {
        if (e.key === "Escape") {
            $('.dropdown-content-mobile').hide();
        }
    });
    $('.dropdown-content-mobile').on('click', function(e) {
        e.stopPropagation();
    });

    $('#profile_btn').on('click', function(e) {
        e.stopPropagation();
        $('.dropdown-content').toggle();
    });
    $(document).on('click', function() {
        $('.dropdown-content').hide();
    });
    $(document).on('keydown', function(e) {
        if (e.key === "Escape") {
            $('.dropdown-content').hide();
        }
    });
    $('.dropdown-content').on('click', function(e) {
        e.stopPropagation();
    });

    $('.navbar-toggler').on('click', function () {
        $('.mobile-sidebar').addClass('active');
        $('.overlay').addClass('active');
        $('body').css('overflow', 'hidden');
    });

    $('.overlay, .close-btn, .mobile-sidebar-link').on('click', function () {
        closeSidebar();
    });

    $(document).on('keydown', function (e) {
        if (e.key === 'Escape') {
            closeSidebar();
        }
    });

    function closeSidebar() {
        $('.mobile-sidebar').removeClass('active');
        $('.overlay').removeClass('active');
        $('body').css('overflow', '');
    }

})(jQuery);

