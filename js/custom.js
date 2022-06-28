(function($) {
	
    "use strict";

    $(window).on("load", function() {

        /* ----------------------------------------------------------- */
        /* PRELOADER
        /* ----------------------------------------------------------- */

        var d = new Date();
        var n = d.getTime();;
        (function($, window, document, undefined) {
            var s = document.body || document.documentElement,
                s = s.style,
                prefixTransition = "";

            if (s.WebkitTransition === "") prefixTransition = "-webkit-";
            if (s.MozTransition === "") prefixTransition = "-moz-";
            if (s.OTransition === "") prefixTransition = "-o-";

            $.fn.extend({
                onCSSTransitionEnd: function(callback) {
                    var $this = $(this).eq(0);
                    $this.one("webkitTransitionEnd mozTransitionEnd oTransitionEnd otransitionend transitionend", callback);
                    if ((prefixTransition == "" && !("transition" in s)) || $this.css(prefixTransition + "transition-duration") == "0s") {
                        callback();
                    } else {
                        var arr_1 = $this.css(prefixTransition + "transition-duration").split(", ");
                        var arr_2 = $this.css(prefixTransition + "transition-delay").split(", ");
                        length = 0;
                        for (var i = 0; i < arr_1.length; i++) {
                            length = parseFloat(arr_1[i]) + parseFloat(arr_2[i]) > length ? parseFloat(arr_1[i]) + parseFloat(arr_2[i]) : length;
                        };
                        var d = new Date();
                        var l = d.getTime();
                        if ((l - n) > length * 1000) {
                            callback();
                        }
                    }
                    return this;
                }
            });
        })(jQuery, window, document);
        $("#preloader").addClass("loading");
        $("#preloader #loader").onCSSTransitionEnd(function() {
            $("#preloader").addClass("ended");
        });

        /* ----------------------------------------------------------- */
        /*  FILTERABLE PORTFOLIO
        /* ----------------------------------------------------------- */

        $(".simplefilter li").on("click", function() {
            $(".simplefilter li").removeClass("active");
            $(this).addClass("active");
        });
        var options = {
            animationDuration: 0.6,
            filter: "all",
            callbacks: {
                onFilteringStart: function() {},
                onFilteringEnd: function() {}
            },
            delay: 0,
            delayMode: "alternate",
            easing: "ease-out",
            layout: "sameSize",
            selector: ".filtr-container",
            setupControls: true
        }
        var filterizr_container = $('.filtr-container');
        if (filterizr_container.length) {
            var filterizd = $(".filtr-container").filterizr(options);
            filterizd.filterizr("setOptions", options);
        }

    });

    $(document).ready(function() {

        /* ----------------------------------------------------------- */
        /*  REMOVE # FROM URL
        /* ----------------------------------------------------------- */

        $("a[href='#']").on("click", (function(e) {
            e.preventDefault();
        }));

        /* ----------------------------------------------------------- */
        /*  LOGOS SLIDER
        /* ----------------------------------------------------------- */
        var logosslider = $("#bxslider");
        if (logosslider.length) {
            $("#bxslider").bxSlider({
                minSlides: 1,
                maxSlides: 6,
                slideWidth: 200,
                slideMargin: 30,
                ticker: true,
                speed: 30000
            });
        }

        /* ----------------------------------------------------------- */
        /*  PROJECT SLIDER
        /* ----------------------------------------------------------- */
        var projectslider = $(".slider-inner");
        if (projectslider.length) {
            $(".slider-inner").bxSlider({
                mode: "horizontal",
                captions: false,
                pager: false,
                nextText: "<i class='fa fa-angle-right'></i>",
                prevText: "<i class='fa fa-angle-left'></i>"
            });
        }

        /* ----------------------------------------------------------- */
        /*  CAROUSEL TESTIMONIALS
        /* ----------------------------------------------------------- */

        $("#carousel-testimonials").carousel({
            wrap: true,
            pause: true,
            interval: 20000
        });

        /* ----------------------------------------------------------- */
        /*  CAROUSEL TESTIMONIAL TOUCH OPTIMIZED [ CAROUSEL TESTIMONIALS ]
        /* ----------------------------------------------------------- */

        var ct = $("#carousel-testimonials");
        ct.on("touchstart", function(event) {
            var xClick = event.originalEvent.touches[0].pageX;
            $(this).one("touchmove", function(event) {
                var xMove = event.originalEvent.touches[0].pageX;
                if (Math.floor(xClick - xMove) > 5) {
                    ct.carousel("next");
                } else if (Math.floor(xClick - xMove) < -5) {
                    ct.carousel("prev");
                }
            });
            ct.on("touchend", function() {
                $(this).off("touchmove");
            });
        });

        /* ----------------------------------------------------------- */
        /*  INITIALIZING MAGNIFIC POPUP
        /* ----------------------------------------------------------- */

        jQuery(".magnific-popup-gallery").parent().each(function() {
            magnific_popup_init(jQuery(this))
        });
        var youtubevideo = $('.mfp-youtube');
        if (youtubevideo.length) {
            jQuery(".mfp-youtube").magnificPopup({
                type: "iframe",
                mainClass: "mfp-fade",
                removalDelay: 0,
                preloader: false,
                fixedContentPos: false,
                iframe: {
                    patterns: {
                        youtube: {
                            src: "https://youtube.com/embed/%id%?autoplay=1&rel=0"
                        },
                    }
                }
            });
        }
        var vimeovideo = $('.mfp-vimeo');
        if (vimeovideo.length) {
            jQuery(".mfp-vimeo").magnificPopup({
                type: "iframe",
                mainClass: "mfp-fade",
                removalDelay: 0,
                preloader: false,
                fixedContentPos: false,
                iframe: {
                    patterns: {
                        vimeo: {
                            src: "https://player.vimeo.com/video/%id%?autoplay=1"
                        }
                    }
                }
            });
        }

        function magnific_popup_init(item) {
            item.magnificPopup({
                delegate: "a[data-gal^='magnific-pop-up']",
                type: "image",
                removalDelay: 500,
                mainClass: "mfp-zoom-in",
                fixedContentPos: false,
                callbacks: {
                    beforeOpen: function() {
                        // just a hack that adds mfp-anim class to markup 
                        this.st.image.markup = this.st.image.markup.replace("mfp-figure", "mfp-figure mfp-with-anim");
                    }
                },
                gallery: {
                    enabled: true
                }
            });
        }

        /* ----------------------------------------------------------- */
        /*  BACK TO TOP
        /* ----------------------------------------------------------- */

        $("#back-top a").on("click", function() {
            $("body,html").stop(false, false).animate({
                scrollTop: 0
            }, 800);
            return false;
        });

        /* ----------------------------------------------------------- */
        /*  TESTIMONIAL CAROUSEL
        /* ----------------------------------------------------------- */

        $("#quote-carousel").carousel({
            wrap: true,
            interval: 6000
        });

        /* ----------------------------------------------------------- */
        /*  TESTIMONIAL CAROUSEL TOUCH OPTIMIZED
        /* ----------------------------------------------------------- */

        var cr = $("#quote-carousel");
        cr.on("touchstart", function(event) {
            var xClick = event.originalEvent.touches[0].pageX;
            $(this).one("touchmove", function(event) {
                var xMove = event.originalEvent.touches[0].pageX;
                if (Math.floor(xClick - xMove) > 5) {
                    cr.carousel('next');
                } else if (Math.floor(xClick - xMove) < -5) {
                    cr.carousel('prev');
                }
            });
            cr.on("touchend", function() {
                $(this).off("touchmove");
            });
        });

        /* ----------------------------------------------------------- */
        /*  BUTTON HOVER ANIMATION
        /* ----------------------------------------------------------- */

        var btn_hover = "";
        $(".custom-button").each(function() {
            var btn_text = $(this).text();
            $(this).addClass(btn_hover).empty().append("<span data-hover='" + btn_text + "'>" + btn_text + "</span>");
        });

        /* ----------------------------------------------------------- */
        /*  LOCAL SCROLL
        /* ----------------------------------------------------------- */

        $(".scroll-to-target[href^='#']").on("click", function(scroll_to_target) {
            scroll_to_target.preventDefault();
            var a = this.hash,
                i = $(a);
            $("html, body").stop().animate({
                scrollTop: i.offset().top
            }, 900, "swing", function() {})
        })

        /* ----------------------------------------------------------- */
        /*  MENU DROPDOWN EFFECT
        /* ----------------------------------------------------------- */

        if ($(window).width() > 992) {
            $("#main-navigation").on({
                mouseenter: function() {
                    $(this).addClass("open");
                },
                mouseleave: function() {
                    $(this).removeClass("open");
                }
            }, 'li.dropdown');
        }

        /* ----------------------------------------------------------- */
        /*  ADD HEIGHT TO MOBILE MENU
        /* ----------------------------------------------------------- */

        $(".navbar-collapse").css({
            maxHeight: $(window).height() - $(".navbar-header").height() + "px"
        });

        /* ----------------------------------------------------------- */
        /*  HAMBURGER ICON ANIMATION
        /* ----------------------------------------------------------- */

        $("#icon-toggler").on("click", function() {
            $(this).toggleClass("open");
        });

        /* ----------------------------------------------------------- */
        /*  PRICING TABLES SWITCH ANIMATION
        /* ----------------------------------------------------------- */

        checkScrolling($(".pricing-body"));
        $(window).on("resize", function() {
            window.requestAnimationFrame(function() {
                checkScrolling($(".pricing-body"))
            });
        });
        $(".pricing-body").on("scroll", function() {
            var selected = $(this);
            window.requestAnimationFrame(function() {
                checkScrolling(selected)
            });
        });

        function checkScrolling(tables) {
            tables.each(function() {
                var table = $(this),
                    totalTableWidth = parseInt(table.children(".pricing-features").width(), 10),
                    tableViewport = parseInt(table.width(), 10);
                if (table.scrollLeft() >= totalTableWidth - tableViewport - 1) {
                    table.parent("li").addClass("is-ended");
                } else {
                    table.parent("li").removeClass("is-ended");
                }
            });
        }

        bouncy_filter($(".pricing-container"));

        function bouncy_filter(container) {
            container.each(function() {
                var pricing_table = $(this);
                var filter_list_container = pricing_table.children(".pricing-switcher"),
                    filter_radios = filter_list_container.find("input[type='radio']"),
                    pricing_table_wrapper = pricing_table.find(".pricing-wrapper");

                var table_elements = {};
                filter_radios.each(function() {
                    var filter_type = $(this).val();
                    table_elements[filter_type] = pricing_table_wrapper.find("li[data-type='" + filter_type + "']");
                });

                //detect input change event
                filter_radios.on("change", function(event) {
                    event.preventDefault();
                    //detect which radio input item was checked
                    var selected_filter = $(event.target).val();

                    //give higher z-index to the pricing table items selected by the radio input
                    show_selected_items(table_elements[selected_filter]);

                    //rotate each pricing-wrapper 
                    //at the end of the animation hide the not-selected pricing tables and rotate back the .pricing-wrapper

                    if (!Modernizr.cssanimations) {
                        hide_not_selected_items(table_elements, selected_filter);
                        pricing_table_wrapper.removeClass("is-switched");
                    } else {
                        pricing_table_wrapper.addClass("is-switched").eq(0).one("webkitAnimationEnd oanimationend msAnimationEnd animationend", function() {
                            hide_not_selected_items(table_elements, selected_filter);
                            pricing_table_wrapper.removeClass("is-switched");
                            //change rotation direction if .pricing-list has the .bounce-invert class
                            if (pricing_table.find(".pricing-list").hasClass("bounce-invert")) pricing_table_wrapper.toggleClass("reverse-animation");
                        });
                    }
                });
            });
        }

        function show_selected_items(selected_elements) {
            selected_elements.addClass("is-selected");
        }

        function hide_not_selected_items(table_containers, filter) {
            $.each(table_containers, function(key, value) {
                if (key != filter) {
                    $(this).removeClass("is-visible is-selected").addClass("is-hidden");

                } else {
                    $(this).addClass("is-visible").removeClass("is-hidden is-selected");
                }
            });
        }

        /* ----------------------------------------------------------- */
        /*  SITE SEARCH
        /* ----------------------------------------------------------- */

        $(".navbar-nav .fa-search").on("click", function() {
            $(".site-search .search-container").toggleClass("open");
        })

        $(".site-search .close").on("click", function() {
            $(".site-search .search-container").removeClass("open");;
        })

        /* ----------------------------------------------------------- */
        /*  AJAX CONTACT FORM
        /* ----------------------------------------------------------- */

        $(".formcontact").on("submit", function() {
            $(".output_message").text("Loading...");

            var form = $(this);
            $.ajax({
                url: form.attr("action"),
                method: form.attr("method"),
                data: form.serialize(),
                success: function(result) {
                    if (result == "success") {
                        $(".formcontact").find(".output_message_holder").css("display", "block");
                        $(".formcontact").find(".output_message").addClass("success");
                        $(".output_message").text("Message Sent!");
                    } else {
                        $(".formcontact").find(".output_message_holder").css("display", "block");
                        $(".formcontact").find(".output_message").addClass("error");
                        $(".output_message").text("Error Sending email!");
                    }
                }
            });

            return false;
        });

        /* ----------------------------------------------------------- */
        /*  NUMBER SPINNER HORIZONTAL [ QUANTITY IN SHOPPING CART PAGE ]
        /* ----------------------------------------------------------- */

        var fieldName;
        // This button will increment the value
        $(".qtyplus").on("click", function(e) {
            // Stop acting like a button
            e.preventDefault();
            // Get the field name
            fieldName = $(this).attr("data-field");
            // Get its current value
            var currentVal = parseInt($("input[name=" + fieldName + "]").val(), 10);
            // If is not undefined
            if (!isNaN(currentVal)) {
                // Increment
                $("input[name=" + fieldName + "]").val(currentVal + 1);
            } else {
                // Otherwise put a 0 there
                $("input[name=" + fieldName + "]").val(0);
            }
        });
        // This button will decrement the value till 0
        $(".qtyminus").on("click", function(e) {
            // Stop acting like a button
            e.preventDefault();
            // Get the field name
            fieldName = $(this).attr("data-field");
            // Get its current value
            var currentVal = parseInt($("input[name=" + fieldName + "]").val(), 10);
            // If it isn't undefined or its greater than 0
            if (!isNaN(currentVal) && currentVal > 1) {
                // Decrement one
                $("input[name=" + fieldName + "]").val(currentVal - 1);
            } else if (currentVal == 0) {
                $("input[name=" + fieldName + "]").val(1);
            } else {
                // Otherwise put a 1 there
                $("input[name=" + fieldName + "]").val(1);
            }
        });

        /* ----------------------------------------------------------- */
        /*  REFRESH 503 PAGE
        /* ----------------------------------------------------------- */

        $("#refresh").on("click", function() {
            location.reload();
        });

        /* ----------------------------------------------------------- */
        /*  SEARCH FIELD FOCUS
        /* ----------------------------------------------------------- */

        $("#search-button").on("click", function() {
            $("#search-input").focus();
        });

        /* ----------------------------------------------------------- */
        /*  TOOLTIP
        /* ----------------------------------------------------------- */

        $("[data-toggle='tooltip']").tooltip()

        /* ----------------------------------------------------------- */
        /*  REVOLUTION SLIDER
        /* ----------------------------------------------------------- */

        // INDEX-PRODUCT

        var tpj = jQuery;
        var rev_product;
        var rev_slider_product = $('#rev_slider_product');
        if (rev_slider_product.length > 0) {
            tpj(document).ready(function() {
                if (tpj("#rev_slider_product").revolution == undefined) {
                    revslider_showDoubleJqueryError("#rev_slider_product");
                } else {
                    rev_product = tpj("#rev_slider_product").show().revolution({
                        sliderType: "hero",
                        jsFileLocation: "js/plugins/revolution/js/",
                        sliderLayout: "fullwidth",
                        dottedOverlay: "none",
                        delay: 9000,
                        navigation: {},
                        responsiveLevels: [1240, 1024, 778, 480],
                        gridwidth: [1400, 1240, 778, 480],
                        gridheight: [768, 768, 960, 720],
                        lazyType: "none",
                        parallax: {
                            type: "mouse+scroll",
                            origo: "slidercenter",
                            speed: 2000,
                            levels: [1, 2, 3, 20, 25, 30, 35, 40, 45, 50],
                            disable_onmobile: "on"
                        },
                        shadow: 0,
                        spinner: "off",
                        autoHeight: "off",
                        disableProgressBar: "on",
                        hideThumbsOnMobile: "off",
                        hideSliderAtLimit: 0,
                        hideCaptionAtLimit: 0,
                        hideAllCaptionAtLilmit: 0,
                        debugMode: false,
                        fallbacks: {
                            simplifyAll: "off",
                            disableFocusListener: false,
                        }
                    });
                }
            });
        }

        // INDEX-KENBURNS

        var rev_kenburns;
        var rev_slider_kenburns = $('#rev_slider_kenburns');
        if (rev_slider_kenburns.length > 0) {
            tpj(document).ready(function() {
                if (tpj("#rev_slider_kenburns").revolution == undefined) {
                    revslider_showDoubleJqueryError("#rev_slider_kenburns");
                } else {
                    rev_kenburns = tpj("#rev_slider_kenburns").show().revolution({
                        sliderType: "standard",
                        jsFileLocation: "js/plugins/revolution/js/",
                        dottedOverlay: "none",
                        sliderLayout: "fullscreen",
                        delay: 9000,
                        navigation: {
                            keyboardNavigation: "off",
                            keyboard_direction: "horizontal",
                            mouseScrollNavigation: "off",
                            onHoverStop: "off",
                            touch: {
                                touchenabled: "on",
                                swipe_threshold: 75,
                                swipe_min_touches: 1,
                                swipe_direction: "horizontal",
                                drag_block_vertical: false
                            },
                            arrows: {
                                style: "zeus",
                                enable: true,
                                hide_onmobile: true,
                                hide_under: 600,
                                hide_onleave: true,
                                hide_delay: 200,
                                hide_delay_mobile: 1200,
                                tmp: '<div class="tp-title-wrap">  	<div class="tp-arr-imgholder"></div> </div>',
                                left: {
                                    h_align: "left",
                                    v_align: "center",
                                    h_offset: 90,
                                    v_offset: 0
                                },
                                right: {
                                    h_align: "right",
                                    v_align: "center",
                                    h_offset: 90,
                                    v_offset: 0
                                }
                            },
                            bullets: {
                                enable: false,
                                hide_onmobile: true,
                                hide_under: 600,
                                style: "metis",
                                hide_onleave: true,
                                hide_delay: 200,
                                hide_delay_mobile: 1200,
                                direction: "horizontal",
                                h_align: "center",
                                v_align: "bottom",
                                h_offset: 0,
                                v_offset: 30,
                                space: 5,
                                tmp: '<span class="tp-bullet-img-wrap">  <span class="tp-bullet-image"></span></span>'
                            }
                        },
                        viewPort: {
                            enable: true,
                            outof: "pause",
                            visible_area: "80%"
                        },
                        responsiveLevels: [1240, 1024, 778, 480],
                        gridwidth: [1240, 1024, 778, 480],
                        gridheight: [600, 600, 500, 400],
                        lazyType: "none",
                        parallax: {
                            type: "mouse",
                            origo: "slidercenter",
                            speed: 2000,
                            levels: [2, 3, 4, 5, 6, 7, 12, 16, 10, 50],
                        },
                        shadow: 0,
                        spinner: "off",
                        stopLoop: "off",
                        stopAfterLoops: -1,
                        stopAtSlide: -1,
                        shuffle: "off",
                        hideThumbsOnMobile: "off",
                        autoHeight: "off",
                        hideSliderAtLimit: 0,
                        hideCaptionAtLimit: 0,
                        hideAllCaptionAtLilmit: 0,
                        debugMode: false,
                        fallbacks: {
                            simplifyAll: "off",
                            nextSlideOnWindowFocus: "off",
                            disableFocusListener: false,
                        }
                    });
                }
            });
        }

        // INDEX-ROTATING-WORDS

        var rev_rotating_words;
        var rev_slider_rotating_words = $('#rev_slider_rotating_words');
        if (rev_slider_rotating_words.length > 0) {
            tpj(document).ready(function() {
                if (tpj("#rev_slider_rotating_words").revolution == undefined) {
                    revslider_showDoubleJqueryError("#rev_slider_rotating_words");
                } else {
                    rev_rotating_words = tpj("#rev_slider_rotating_words").show().revolution({
                        sliderType: "hero",
                        jsFileLocation: "js/plugins/revolution/js/",
                        sliderLayout: "fullscreen",
                        dottedOverlay: "none",
                        delay: 20000,
                        navigation: {},
                        responsiveLevels: [1240, 1024, 778, 778],
                        gridwidth: [1240, 1024, 778, 480],
                        gridheight: [600, 500, 400, 300],
                        lazyType: "none",
                        parallax: {
                            type: "mouse",
                            origo: "slidercenter",
                            speed: 2000,
                            levels: [2, 3, 4, 5, 6, 7, 12, 16, 10, 50],
                        },
                        shadow: 0,
                        spinner: "off",
                        autoHeight: "off",
                        fullScreenAlignForce: "off",
                        fullScreenOffsetContainer: "",
                        fullScreenOffset: "60px",
                        disableProgressBar: "on",
                        hideThumbsOnMobile: "off",
                        hideSliderAtLimit: 0,
                        hideCaptionAtLimit: 0,
                        hideAllCaptionAtLilmit: 0,
                        debugMode: false,
                        fallbacks: {
                            simplifyAll: "off",
                            disableFocusListener: false,
                        }
                    });
                }
            });
        }

        // INDEX-CREATIVE-FRONTPAGE

        var rev_creative_frontpage;
        var rev_slider_creative_frontpage = $('#rev_slider_creative_frontpage');
        if (rev_slider_creative_frontpage.length > 0) {
            tpj(document).ready(function() {
                if (tpj("#rev_slider_creative_frontpage").revolution == undefined) {
                    revslider_showDoubleJqueryError("#rev_slider_creative_frontpage");
                } else {
                    rev_creative_frontpage = tpj("#rev_slider_creative_frontpage").show().revolution({
                        sliderType: "standard",
                        dottedOverlay: "none",
                        delay: 9000,
                        navigation: {
                            keyboardNavigation: "off",
                            keyboard_direction: "horizontal",
                            mouseScrollNavigation: "off",
                            mouseScrollReverse: "default",
                            onHoverStop: "off",
                            bullets: {
                                enable: true,
                                hide_onmobile: true,
                                hide_under: 1024,
                                style: "hermes",
                                hide_onleave: false,
                                direction: "vertical",
                                container: "layergrid",
                                h_align: "right",
                                v_align: "center",
                                h_offset: 10,
                                v_offset: 0,
                                space: 5,
                                tmp: ''
                            }
                        },
                        responsiveLevels: [1240, 1024, 778, 480],
                        visibilityLevels: [1240, 1024, 778, 480],
                        gridwidth: [1240, 1024, 778, 480],
                        gridheight: [610, 620, 960, 720],
                        lazyType: "smart",
                        parallax: {
                            type: "scroll",
                            origo: "slidercenter",
                            speed: 400,
                            levels: [5, 10, 15, 20, 25, 30, 35, 40, 45, 46, 47, 48, 49, 50, 51, 55],
                            type: "scroll",
                        },
                        shadow: 0,
                        spinner: "off",
                        stopLoop: "on",
                        stopAfterLoops: 0,
                        stopAtSlide: 1,
                        shuffle: "off",
                        autoHeight: "off",
                        fullScreenAutoWidth: "off",
                        fullScreenAlignForce: "off",
                        fullScreenOffsetContainer: "",
                        fullScreenOffset: "",
                        disableProgressBar: "on",
                        hideThumbsOnMobile: "off",
                        hideSliderAtLimit: 0,
                        hideCaptionAtLimit: 0,
                        hideAllCaptionAtLilmit: 0,
                        debugMode: false,
                        fallbacks: {
                            simplifyAll: "off",
                            nextSlideOnWindowFocus: "off",
                            disableFocusListener: false,
                        }
                    });
                }
            });
        }

        // INDEX-CONTENT-TABS

        var rev_content_tabs;
        var rev_slider_content_tabs = $('#rev_slider_content_tabs');
        if (rev_slider_content_tabs.length > 0) {
            tpj(document).ready(function() {
                if (tpj("#rev_slider_content_tabs").revolution == undefined) {
                    revslider_showDoubleJqueryError("#rev_slider_content_tabs");
                } else {
                    rev_content_tabs = tpj("#rev_slider_content_tabs").show().revolution({
                        sliderType: "standard",
                        jsFileLocation: "../../revolution/js/",
                        sliderLayout: "fullscreen",
                        dottedOverlay: "none",
                        delay: 9000,
                        navigation: {
                            keyboardNavigation: "off",
                            keyboard_direction: "horizontal",
                            mouseScrollNavigation: "off",
                            onHoverStop: "off",
                            touch: {
                                touchenabled: "on",
                                swipe_threshold: 75,
                                swipe_min_touches: 1,
                                swipe_direction: "horizontal",
                                drag_block_vertical: false
                            },
                            bullets: {
                                enable: true,
                                hide_onmobile: false,
                                style: "hermes",
                                hide_onleave: false,
                                direction: "vertical",
                                h_align: "right",
                                v_align: "center",
                                h_offset: 30,
                                v_offset: 0,
                                space: 10,
                                tmp: ''
                            }
                        },
                        responsiveLevels: [1240, 1024, 778, 480],
                        gridwidth: [1024, 850, 778, 480],
                        gridheight: [600, 500, 450, 400],
                        lazyType: "none",
                        shadow: 0,
                        spinner: "off",
                        stopLoop: "on",
                        stopAfterLoops: 0,
                        stopAtSlide: 1,
                        shuffle: "off",
                        autoHeight: "off",
                        disableProgressBar: "on",
                        hideThumbsOnMobile: "off",
                        hideSliderAtLimit: 0,
                        hideCaptionAtLimit: 0,
                        hideAllCaptionAtLilmit: 0,
                        debugMode: false,
                        fallbacks: {
                            simplifyAll: "off",
                            nextSlideOnWindowFocus: "off",
                            disableFocusListener: false,
                        }
                    });
                }
            });
        }

        // INDEX-CAROUSEL-CLASSIC

        var rev_carousel_classic;
        var rev_slider_carousel_classic = $('#rev_slider_carousel_classic');
        if (rev_slider_carousel_classic.length > 0) {
            tpj(document).ready(function() {
                if (tpj("#rev_slider_carousel_classic").revolution == undefined) {
                    revslider_showDoubleJqueryError("#rev_slider_carousel_classic");
                } else {
                    rev_carousel_classic = tpj("#rev_slider_carousel_classic").show().revolution({
                        sliderType: "carousel",
                        jsFileLocation: "js/plugins/revolution/js/",
                        sliderLayout: "fullscreen",
                        dottedOverlay: "none",
                        delay: 9000,
                        navigation: {
                            keyboardNavigation: "off",
                            keyboard_direction: "horizontal",
                            mouseScrollNavigation: "off",
                            onHoverStop: "off",
                            arrows: {
                                style: "erinyen",
                                enable: true,
                                hide_onmobile: true,
                                hide_under: 600,
                                hide_onleave: true,
                                hide_delay: 200,
                                hide_delay_mobile: 1200,
                                tmp: '<div class="tp-title-wrap">  	<div class="tp-arr-imgholder"></div>    <div class="tp-arr-img-over"></div>	<span class="tp-arr-titleholder">{{title}}</span> </div>',
                                left: {
                                    h_align: "left",
                                    v_align: "center",
                                    h_offset: 30,
                                    v_offset: 0
                                },
                                right: {
                                    h_align: "right",
                                    v_align: "center",
                                    h_offset: 30,
                                    v_offset: 0
                                }
                            },
                            bullets: {
                                enable: true,
                                hide_onmobile: true,
                                hide_under: 600,
                                style: "metis",
                                hide_onleave: true,
                                hide_delay: 200,
                                hide_delay_mobile: 1200,
                                direction: "horizontal",
                                h_align: "center",
                                v_align: "bottom",
                                h_offset: 0,
                                v_offset: 30,
                                space: 5,
                                tmp: '<span class="tp-bullet-img-wrap">  <span class="tp-bullet-image"></span></span><span class="tp-bullet-title">{{title}}</span>'
                            }
                        },
                        carousel: {
                            horizontal_align: "center",
                            vertical_align: "center",
                            fadeout: "off",
                            maxVisibleItems: 3,
                            infinity: "on",
                            space: 0,
                            stretch: "off"
                        },
                        viewPort: {
                            enable: true,
                            outof: "pause",
                            visible_area: "80%"
                        },
                        responsiveLevels: [1240, 1024, 778, 480],
                        gridwidth: [1240, 1024, 778, 480],
                        gridheight: [600, 600, 500, 400],
                        lazyType: "none",
                        parallax: {
                            type: "mouse",
                            origo: "slidercenter",
                            speed: 2000,
                            levels: [2, 3, 4, 5, 6, 7, 12, 16, 10, 50],
                        },
                        spinner: "off",
                        stopLoop: "off",
                        stopAfterLoops: -1,
                        stopAtSlide: -1,
                        shuffle: "off",
                        autoHeight: "off",
                        hideThumbsOnMobile: "on",
                        hideSliderAtLimit: 0,
                        hideCaptionAtLimit: 0,
                        hideAllCaptionAtLilmit: 0,
                        debugMode: false,
                        fallbacks: {
                            simplifyAll: "off",
                            nextSlideOnWindowFocus: "off",
                            disableFocusListener: false,
                        }
                    });
                }
            });
        }

        // INDEX-VIMEO

        var rev_vimeo;
        var rev_slider_vimeo = $('#rev_slider_vimeo');
        if (rev_slider_vimeo.length > 0) {
            tpj(document).ready(function() {
                if (tpj("#rev_slider_vimeo").revolution == undefined) {
                    revslider_showDoubleJqueryError("#rev_slider_vimeo");
                } else {
                    rev_vimeo = tpj("#rev_slider_vimeo").show().revolution({
                        sliderType: "standard",
                        jsFileLocation: "js/plugins/revolution/js/",
                        sliderLayout: "fullwidth",
                        dottedOverlay: "none",
                        sliderLayout: "fullscreen",
                        delay: 9000,
                        navigation: {
                            onHoverStop: "off",
                        },
                        responsiveLevels: [1240, 1024, 778, 480],
                        gridwidth: [1240, 1024, 778, 480],
                        gridheight: [600, 500, 400, 270],
                        lazyType: "none",
                        parallax: {
                            type: "scroll",
                            origo: "slidercenter",
                            speed: 2000,
                            levels: [2, 3, 4, 5, 6, 7, 12, 16, 10, 50],
                        },
                        shadow: 0,
                        spinner: "off",
                        stopLoop: "on",
                        stopAfterLoops: 0,
                        stopAtSlide: 1,
                        shuffle: "off",
                        autoHeight: "off",
                        disableProgressBar: "on",
                        hideThumbsOnMobile: "off",
                        hideSliderAtLimit: 0,
                        hideCaptionAtLimit: 0,
                        hideAllCaptionAtLilmit: 0,
                        debugMode: false,
                        fallbacks: {
                            simplifyAll: "off",
                            nextSlideOnWindowFocus: "off",
                            disableFocusListener: false,
                        }
                    });
                }
            });
        }

        // INDEX-VIDEO-SLIDER

        var rev_video_slider;
        var rev_slider_video_slider = $('#rev_slider_video_slider');
        if (rev_slider_video_slider.length > 0) {
            tpj(document).ready(function() {
                if (tpj("#rev_slider_video_slider").revolution == undefined) {
                    revslider_showDoubleJqueryError("#rev_slider_video_slider");
                } else {
                    rev_video_slider = tpj("#rev_slider_video_slider").show().revolution({
                        sliderType: "standard",
                        jsFileLocation: "js/plugins/revolution/js/",
                        dottedOverlay: "none",
                        sliderLayout: "fullscreen",
                        navigation: {
                            keyboardNavigation: "off",
                            keyboard_direction: "horizontal",
                            mouseScrollNavigation: "off",
                            onHoverStop: "off",
                            touch: {
                                touchenabled: "on",
                                swipe_threshold: 75,
                                swipe_min_touches: 1,
                                swipe_direction: "horizontal",
                                drag_block_vertical: false
                            },
                            arrows: {
                                style: "zeus",
                                enable: false,
                                hide_onmobile: true,
                                hide_under: 600,
                                hide_onleave: true,
                                hide_delay: 200,
                                hide_delay_mobile: 1200,
                                tmp: '<div class="tp-title-wrap">  	<div class="tp-arr-imgholder"></div> </div>',
                                left: {
                                    h_align: "left",
                                    v_align: "center",
                                    h_offset: 90,
                                    v_offset: 0
                                },
                                right: {
                                    h_align: "right",
                                    v_align: "center",
                                    h_offset: 90,
                                    v_offset: 0
                                }
                            },
                            bullets: {
                                enable: false,
                                hide_onmobile: true,
                                hide_under: 600,
                                style: "metis",
                                hide_onleave: true,
                                hide_delay: 200,
                                hide_delay_mobile: 1200,
                                direction: "horizontal",
                                h_align: "center",
                                v_align: "bottom",
                                h_offset: 0,
                                v_offset: 30,
                                space: 5,
                                tmp: '<span class="tp-bullet-img-wrap">  <span class="tp-bullet-image"></span></span>'
                            }
                        },
                        viewPort: {
                            enable: true,
                            outof: "pause",
                            visible_area: "80%"
                        },
                        responsiveLevels: [1240, 1024, 778, 480],
                        gridwidth: [1240, 1024, 778, 480],
                        gridheight: [600, 600, 500, 400],
                        lazyType: "none",
                        parallax: {
                            type: "mouse",
                            origo: "slidercenter",
                            speed: 2000,
                            levels: [2, 3, 4, 5, 6, 7, 12, 16, 10, 50],
                        },
                        shadow: 0,
                        spinner: "off",
                        stopLoop: "off",
                        stopAfterLoops: -1,
                        stopAtSlide: -1,
                        shuffle: "off",
                        hideThumbsOnMobile: "off",
                        autoHeight: "off",
                        hideSliderAtLimit: 0,
                        hideCaptionAtLimit: 0,
                        hideAllCaptionAtLilmit: 0,
                        debugMode: false,
                        fallbacks: {
                            simplifyAll: "off",
                            nextSlideOnWindowFocus: "off",
                            disableFocusListener: false,
                        }
                    });
                }
            });
        }

        // INDEX-TRAVEL

        var rev_travel;
        var rev_slider_travel = $('#rev_slider_travel');
        if (rev_slider_travel.length > 0) {
            tpj(document).ready(function() {
                if (tpj("#rev_slider_travel").revolution == undefined) {
                    revslider_showDoubleJqueryError("#rev_slider_travel");
                } else {
                    rev_travel = tpj("#rev_slider_travel").show().revolution({
                        sliderType: "standard",
                        sliderLayout: "fullscreen",
                        dottedOverlay: "none",
                        delay: 6000,
                        navigation: {
                            keyboardNavigation: "off",
                            keyboard_direction: "horizontal",
                            mouseScrollNavigation: "off",
                            onHoverStop: "off",
                            touch: {
                                touchenabled: "on",
                                swipe_threshold: 75,
                                swipe_min_touches: 1,
                                swipe_direction: "horizontal",
                                drag_block_vertical: false
                            },
                            bullets: {
                                enable: true,
                                hide_onmobile: true,
                                hide_under: 600,
                                style: "hermes",
                                hide_onleave: true,
                                hide_delay: 200,
                                hide_delay_mobile: 1200,
                                direction: "vertical",
                                h_align: "right",
                                v_align: "center",
                                h_offset: 30,
                                v_offset: 0,
                                space: 5,
                                tmp: ''
                            }
                        },
                        viewPort: {
                            enable: true,
                            outof: "pause",
                            visible_area: "80%"
                        },
                        responsiveLevels: [1240, 1024, 778, 480],
                        gridwidth: [1240, 1024, 778, 480],
                        gridheight: [700, 600, 500, 400],
                        lazyType: "none",
                        parallax: {
                            type: "mouse",
                            origo: "slidercenter",
                            speed: 2000,
                            levels: [2, 3, 4, 5, 6, 7, 12, 16, 10, 50],
                        },
                        shadow: 0,
                        spinner: "off",
                        stopLoop: "off",
                        stopAfterLoops: -1,
                        stopAtSlide: -1,
                        shuffle: "off",
                        autoHeight: "off",
                        hideThumbsOnMobile: "off",
                        hideSliderAtLimit: 0,
                        hideCaptionAtLimit: 0,
                        hideAllCaptionAtLilmit: 0,
                        debugMode: false,
                        fallbacks: {
                            simplifyAll: "off",
                            nextSlideOnWindowFocus: "off",
                            disableFocusListener: false,
                        }
                    });
                }
            });
        }

        // INDEX-STATIC

        var rev_static;
        var rev_slider_static = $('#rev_slider_static');
        if (rev_slider_static.length > 0) {
            tpj(document).ready(function() {
                if (tpj("#rev_slider_static").revolution == undefined) {
                    revslider_showDoubleJqueryError("#rev_slider_static");
                } else {
                    rev_static = tpj("#rev_slider_static").show().revolution({
                        sliderType: "standard",
                        jsFileLocation: "js/plugins/revolution/js/",
                        dottedOverlay: "none",
                        sliderLayout: "fullscreen",
                        navigation: {
                            keyboardNavigation: "off",
                            keyboard_direction: "horizontal",
                            mouseScrollNavigation: "off",
                            onHoverStop: "off",
                            touch: {
                                touchenabled: "on",
                                swipe_threshold: 75,
                                swipe_min_touches: 1,
                                swipe_direction: "horizontal",
                                drag_block_vertical: false
                            },
                            arrows: {
                                style: "zeus",
                                enable: false,
                                hide_onmobile: true,
                                hide_under: 600,
                                hide_onleave: true,
                                hide_delay: 200,
                                hide_delay_mobile: 1200,
                                tmp: '<div class="tp-title-wrap">  	<div class="tp-arr-imgholder"></div> </div>',
                                left: {
                                    h_align: "left",
                                    v_align: "center",
                                    h_offset: 90,
                                    v_offset: 0
                                },
                                right: {
                                    h_align: "right",
                                    v_align: "center",
                                    h_offset: 90,
                                    v_offset: 0
                                }
                            },
                            bullets: {
                                enable: false,
                                hide_onmobile: true,
                                hide_under: 600,
                                style: "metis",
                                hide_onleave: true,
                                hide_delay: 200,
                                hide_delay_mobile: 1200,
                                direction: "horizontal",
                                h_align: "center",
                                v_align: "bottom",
                                h_offset: 0,
                                v_offset: 30,
                                space: 5,
                                tmp: '<span class="tp-bullet-img-wrap">  <span class="tp-bullet-image"></span></span>'
                            }
                        },
                        viewPort: {
                            enable: true,
                            outof: "pause",
                            visible_area: "80%"
                        },
                        responsiveLevels: [1240, 1024, 778, 480],
                        gridwidth: [1240, 1024, 778, 480],
                        gridheight: [600, 600, 500, 400],
                        lazyType: "none",
                        parallax: {
                            type: "mouse",
                            origo: "slidercenter",
                            speed: 2000,
                            levels: [2, 3, 4, 5, 6, 7, 12, 16, 10, 50],
                        },
                        shadow: 0,
                        spinner: "off",
                        stopLoop: "off",
                        stopAfterLoops: -1,
                        stopAtSlide: -1,
                        shuffle: "off",
                        hideThumbsOnMobile: "off",
                        autoHeight: "off",
                        hideSliderAtLimit: 0,
                        hideCaptionAtLimit: 0,
                        hideAllCaptionAtLilmit: 0,
                        debugMode: false,
                        fallbacks: {
                            simplifyAll: "off",
                            nextSlideOnWindowFocus: "off",
                            disableFocusListener: false,
                        }
                    });
                }
            });
        }
		
        // INDEX-SLIDESHOW

        var rev_slideshow;
        var rev_slider_slideshow = $('#rev_slider_slideshow');
        if (rev_slider_slideshow.length > 0) {
            tpj(document).ready(function() {
                if (tpj("#rev_slider_slideshow").revolution == undefined) {
                    revslider_showDoubleJqueryError("#rev_slider_slideshow");
                } else {
                    rev_slideshow = tpj("#rev_slider_slideshow").show().revolution({
                        sliderType: "standard",
                        jsFileLocation: "js/plugins/revolution/js/",
                        dottedOverlay: "none",
                        sliderLayout: "fullscreen",
                        delay: 9000,
                        navigation: {
                            keyboardNavigation: "off",
                            keyboard_direction: "horizontal",
                            mouseScrollNavigation: "off",
                            onHoverStop: "off",
                            touch: {
                                touchenabled: "on",
                                swipe_threshold: 75,
                                swipe_min_touches: 1,
                                swipe_direction: "horizontal",
                                drag_block_vertical: false
                            },
                            arrows: {
                                style: "zeus",
                                enable: true,
                                hide_onmobile: true,
                                hide_under: 600,
                                hide_onleave: true,
                                hide_delay: 200,
                                hide_delay_mobile: 1200,
                                tmp: '<div class="tp-title-wrap">  	<div class="tp-arr-imgholder"></div> </div>',
                                left: {
                                    h_align: "left",
                                    v_align: "center",
                                    h_offset: 90,
                                    v_offset: 0
                                },
                                right: {
                                    h_align: "right",
                                    v_align: "center",
                                    h_offset: 90,
                                    v_offset: 0
                                }
                            },
                            bullets: {
                                enable: false,
                                hide_onmobile: true,
                                hide_under: 600,
                                style: "metis",
                                hide_onleave: true,
                                hide_delay: 200,
                                hide_delay_mobile: 1200,
                                direction: "horizontal",
                                h_align: "center",
                                v_align: "bottom",
                                h_offset: 0,
                                v_offset: 30,
                                space: 5,
                                tmp: '<span class="tp-bullet-img-wrap">  <span class="tp-bullet-image"></span></span>'
                            }
                        },
                        viewPort: {
                            enable: true,
                            outof: "pause",
                            visible_area: "80%"
                        },
                        responsiveLevels: [1240, 1024, 778, 480],
                        gridwidth: [1240, 1024, 778, 480],
                        gridheight: [600, 600, 500, 400],
                        lazyType: "none",
                        parallax: {
                            type: "mouse",
                            origo: "slidercenter",
                            speed: 2000,
                            levels: [2, 3, 4, 5, 6, 7, 12, 16, 10, 50],
                        },
                        shadow: 0,
                        spinner: "off",
                        stopLoop: "off",
                        stopAfterLoops: -1,
                        stopAtSlide: -1,
                        shuffle: "off",
                        hideThumbsOnMobile: "off",
                        autoHeight: "off",
                        hideSliderAtLimit: 0,
                        hideCaptionAtLimit: 0,
                        hideAllCaptionAtLilmit: 0,
                        debugMode: false,
                        fallbacks: {
                            simplifyAll: "off",
                            nextSlideOnWindowFocus: "off",
                            disableFocusListener: false,
                        }
                    });
                }
            });
        }
		
        // INDEX-SCROLL-EFFECTS

        var rev_scroll_effects;
        var rev_slider_scroll_effects = $('#rev_slider_scroll_effects');
        if (rev_slider_scroll_effects.length > 0) {
            tpj(document).ready(function() {
                if (tpj("#rev_slider_scroll_effects").revolution == undefined) {
                    revslider_showDoubleJqueryError("#rev_slider_scroll_effects");
                } else {
                    rev_scroll_effects = tpj("#rev_slider_scroll_effects").show().revolution({
                        sliderType: "standard",
                        sliderLayout: "fullscreen",
                        dottedOverlay: "none",
                        delay: 9000,
                        navigation: {
                            keyboardNavigation: "off",
                            keyboard_direction: "horizontal",
                            mouseScrollNavigation: "off",
                            onHoverStop: "off",
                            touch: {
                                touchenabled: "on",
                                swipe_threshold: 75,
                                swipe_min_touches: 1,
                                swipe_direction: "horizontal",
                                drag_block_vertical: false
                            },
                            bullets: {
                                enable: true,
                                hide_onmobile: true,
                                hide_under: 960,
                                style: "zeus",
                                hide_onleave: false,
                                direction: "horizontal",
                                h_align: "right",
                                v_align: "bottom",
                                h_offset: 80,
                                v_offset: 50,
                                space: 5,
                                tmp: '<span class="tp-bullet-image"></span><span class="tp-bullet-imageoverlay"></span><span class="tp-bullet-title">{{title}}</span>'
                            }
                        },
                        responsiveLevels: [1240, 1024, 778, 480],
                        gridwidth: [1240, 1024, 778, 480],
                        gridheight: [868, 768, 960, 720],
                        lazyType: "none",
                        parallax: {
                            type: "mouse",
                            origo: "slidercenter",
                            speed: 2000,
                            levels: [2, 3, 4, 5, 6, 7, 12, 16, 10, 50],
                            disable_onmobile: "on"
                        },
                        shadow: 0,
                        spinner: "off",
                        stopLoop: "on",
                        stopAfterLoops: 0,
                        stopAtSlide: 1,
                        shuffle: "off",
                        autoHeight: "off",
                        fullScreenAlignForce: "off",
                        fullScreenOffsetContainer: "",
                        disableProgressBar: "on",
                        hideThumbsOnMobile: "off",
                        hideSliderAtLimit: 0,
                        hideCaptionAtLimit: 0,
                        hideAllCaptionAtLilmit: 0,
                        debugMode: false,
                        fallbacks: {
                            simplifyAll: "off",
                            nextSlideOnWindowFocus: "off",
                            disableFocusListener: false,
                        }
                    });
                    var newCall = new Object(),
                        cslide;

                    newCall.callback = function() {
                        var proc = rev_scroll_effects.revgetparallaxproc(),
                            fade = 1 + proc,
                            scale = 1 + (Math.abs(proc) / 10);

                        punchgs.TweenLite.set(rev_scroll_effects.find('.slotholder, .rs-background-video-layer'), {
                            opacity: fade,
                            scale: scale
                        });
                    }
                    newCall.inmodule = "parallax";
                    newCall.atposition = "start";

                    rev_scroll_effects.bind("revolution.slide.onloaded", function(e) {
                        rev_scroll_effects.revaddcallback(newCall);
                    });
                }
            });
        }
		
		/* ----------------------------------------------------------- */
        /*  GOOGLE MAP
        /* ----------------------------------------------------------- */
		
		function init_map() {
			
			var myOptions = {
				scrollwheel: false,
				zoom: 12,
				center: new google.maps.LatLng(40.7127837, -74.00594130000002),
				mapTypeId: google.maps.MapTypeId.ROADMAP
			};
			var map = new google.maps.Map(document.getElementById("gmap_canvas"), myOptions);
			var marker = new google.maps.Marker({
				map: map,
				icon: "img/markers/yellow.png",
				position: new google.maps.LatLng(40.7127837, -74.00594130000002)
			});
			var infowindow = new google.maps.InfoWindow({
				content: "<div class='map-info-window'><strong class='text-uppercase'></strong>1234 Disney Street, New York City<br></div>"
			});
			google.maps.event.addListener(marker, "click", function() {
				infowindow.open(map, marker);
			});
		}
		var gm = $('#gmap_canvas');
        if (gm.length > 0) {
			google.maps.event.addDomListener(window, "load", init_map);
		}
		
		/* ----------------------------------------------------------- */
        /*  COMING SOON COUNTDOWN
        /* ----------------------------------------------------------- */
		
		var comingsoon = $("#countdown");
        if (comingsoon.length) {
			$('#countdown').countdown({until: new Date(2019, 6-1, 9)}); 
		}
		
    });

    $(window).on("scroll", function() {

        /* ----------------------------------------------------------- */
        /*  FIX HEADER ON SCROLL
        /* ----------------------------------------------------------- */

        var e = $(window).scrollTop();
        $(window).height();
        e > 1 ? $(".header").addClass("header-fixed") : $(".header").removeClass("header-fixed");

        /* ----------------------------------------------------------- */
        /*  BACK TO TOP
        /* ----------------------------------------------------------- */

        if ($(this).scrollTop() > 100) {
            $("#back-top").fadeIn();
        } else {
            $("#back-top").fadeOut();
        }

    });


})(jQuery);