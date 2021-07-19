<?php include('js.php'); ?>
<script src="https://cdn.jsdelivr.net/npm/cookieconsent@3/build/cookieconsent.min.js" data-cfasync="false"></script>
<script>
    window.cookieconsent.initialise({
        "palette": {
            "popup": {
                "background": "#ffffff",
                "text": "#525252"
            },
            "button": {
                "background": "#ee2724",
                "text": "#ffffff"
            }
        },
        "position": "bottom-left",
        "content": {
            "message": "Este website utiliza cookies para melhorar a sua experiência como utilizador.",
            "dismiss": "Entendi!",
            "link": "Saber mais!",
            "href": "http://ilovedourotv.com/disclaimers/termos%20e%20condi%C3%A7oes%20ilovedourotv.pdf"
        }
    });
</script>
<script>
    var $hamburger = $(".hamburger");
    $hamburger.on("click", function(e) {
        $hamburger.toggleClass("is-active");
    });
    $('.scrolltop').hide();
    $(document).ready(function() {
        $('#ultimos-display').owlCarousel({
            loop: false,
            margin: 10,
            nav: true,
            dots: false,
            responsive: {
                0: {
                    items: 1
                },
                320: {
                    items: 1
                },
                375: {
                    items: 1
                },
                425: {
                    items: 1
                },
                768: {
                    items: 2
                },
                1024: {
                    items: 2
                },
                1440: {
                    items: 3
                },
                1920: {
                    items: 4
                },
                2560: {
                    items: 4
                }
            }
        });
    });
    $(document).ready(function() {
        $(".categorias").each(function() {
            $(this).owlCarousel({
                loop: false,
                margin: 10,
                nav: true,
                dots: false,
                responsive: {
                    0: {
                        items: 1
                    },
                    320: {
                        items: 1
                    },
                    375: {
                        items: 1
                    },
                    425: {
                        items: 1
                    },
                    768: {
                        items: 2
                    },
                    1024: {
                        items: 2
                    },
                    1440: {
                        items: 3
                    },
                    1920: {
                        items: 4
                    },
                    2560: {
                        items: 4
                    }
                }
            });
        });
    });
    $(document).ready(function() {
        $('#programas-carrosel').owlCarousel({
            loop: false,
            margin: 10,
            nav: true,
            dots: false,
            loop: false,
            responsive: {
                0: {
                    items: 2
                },
                320: {
                    items: 2
                },
                375: {
                    items: 2
                },
                425: {
                    items: 2
                },
                768: {
                    items: 4
                },
                1024: {
                    items: 6
                },
                1440: {
                    items: 6
                },
                1920: {
                    items: 8
                },
                2560: {
                    items: 8
                }
            }
        });
    });
    $(document).ready(function() {
        $('#programa-carrosel').owlCarousel({
            loop: false,
            margin: 10,
            nav: true,
            dots: false,
            center: false,
            maxheigth: "450px",
            responsive: {
                0: {
                    items: 1
                },
                320: {
                    items: 1
                },
                375: {
                    items: 1
                },
                425: {
                    items: 1
                },
                768: {
                    items: 2
                },
                1024: {
                    items: 2
                },
                1440: {
                    items: 2
                },
                1920: {
                    items: 3
                },
                2560: {
                    items: 3
                }
            }
        });
    });
    document.getElementById('vid-destaque').play();
    $(window).scroll(function() {
        var y_scroll_pos = window.pageYOffset;
        var width = Math.max(window.screen.width, window.innerWidth);
        if (width > 2559) {
            var scroll_pos_test = ($("#ultimos").offset().top) - 200;
        } else if (width > 1919) {
            var scroll_pos_test = ($("#ultimos").offset().top) - 80;
        } else if (width > 1439) {
            var scroll_pos_test = ($("#ultimos").offset().top) - 80;
        } else if (width > 1023) {
            var scroll_pos_test = ($("#ultimos").offset().top) - 80;
        } else if (width > 767) {
            var scroll_pos_test = ($("#ultimos").offset().top) - 80;
        } else if (width > 424) {
            var scroll_pos_test = ($("#ultimos").offset().top) - 50;
        } else if (width > 374) {
            var scroll_pos_test = ($("#ultimos").offset().top) - 50;
        } else if (width > 319) {
            var scroll_pos_test = ($("#ultimos").offset().top) - 50;
        } else if (width <= 319) {
            var scroll_pos_test = ($("#ultimos").offset().top) - 40;
        }

        if (y_scroll_pos >= scroll_pos_test) {
            $('.circulo').hide();
            $('.scrolltop').show();
        } else {
            $('.circulo').show();
            $('.scrolltop').hide();
        }
    });
    $(".circulo").click(function() {
        var width = Math.max(window.screen.width, window.innerWidth);
        if (width > 2559) {
            $('html,body').animate({
                    scrollTop: ($("#ultimos").offset().top) - 200
                },
                'slow')
        } else if (width > 1919) {
            $('html,body').animate({
                    scrollTop: ($("#ultimos").offset().top) - 80
                },
                'slow')
        } else if (width > 1439) {
            $('html,body').animate({
                    scrollTop: ($("#ultimos").offset().top) - 80
                },
                'slow')
        } else if (width > 1023) {
            $('html,body').animate({
                    scrollTop: ($("#ultimos").offset().top) - 80
                },
                'slow')
        } else if (width > 767) {
            $('html,body').animate({
                    scrollTop: ($("#ultimos").offset().top) - 80
                },
                'slow')
        } else if (width > 424) {
            $('html,body').animate({
                    scrollTop: ($("#ultimos").offset().top) - 50
                },
                'slow')
        } else if (width > 374) {
            $('html,body').animate({
                    scrollTop: ($("#ultimos").offset().top) - 50
                },
                'slow')
        } else if (width > 319) {
            $('html,body').animate({
                    scrollTop: ($("#ultimos").offset().top) - 50
                },
                'slow')
        } else if (width <= 319) {
            $('html,body').animate({
                    scrollTop: ($("#ultimos").offset().top) - 40
                },
                'slow')
        }
    });
    $(".scrolltop").click(function() {
        $('html,body').animate({
                scrollTop: 0
            },
            'slow')
    });
</script>