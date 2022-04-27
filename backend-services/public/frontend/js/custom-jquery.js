//*************mobile menu**************//
function openNav() {
    document.getElementById("mySidenav").style.left = "0";
}
function closeNav() {
    document.getElementById("mySidenav").style.left = "-100%";
}

//*************************Checkout ******************************//
/*
$('button.edit').click(function(){
    $('#checkout_stap_one').addClass('current');
});

$('.checkout_btn').click(function(){
    $('#checkout_stap_one').removeClass('current');
    $('#checkout_stap_two').addClass('current');
});

$('.credit_card').click(function(){
    $('#checkout_stap_two').removeClass('current');
    $('#checkout_stap_three').addClass('current');
});

$('.continue_button ').click(function(){
    $('#checkout_stap_three').removeClass('current');
    $('#checkout_stap_four').addClass('current');
});

$('button.edit').click(function(){
    $('#checkout_stap_two').addClass('current_none');
});*/



$('button.edit').click(function(){
    $('#checkout_stap_one').addClass('current');
});

$('.continue_checkout').click(function(){
    $('#checkout_stap_one').removeClass('current');
    $('#checkout_stap_three').addClass('current');
});

$('.checkout_btn').click(function(){
    $('#checkout_stap_one').removeClass('current');
    $('#checkout_stap_three').addClass('current');
});

$('.continue_button').click(function(){
    $('#checkout_stap_three').removeClass('current');
    $('#checkout_stap_four').addClass('current');
});


$('button.edit').click(function(){
    $('#checkout_stap_two').addClass('current_none');
});



//********************header sticky***********************//
$(window).scroll(function () {
    var sticky = $("header"),
        scroll = $(window).scrollTop();

    if (scroll >= 100) sticky.addClass("fixed");
    else sticky.removeClass("fixed");
});



//***********arrow_down click*******//
jQuery(".arrow_down").click(function () {
    jQuery("ul.submenu").not(jQuery(this).siblings()).slideUp();
    jQuery(this).siblings("ul.submenu").slideToggle();
});

//***********************Account Profile***************************//
jQuery(".account_profile").click(function () {
    jQuery(".account_category").not(jQuery(this).siblings()).slideUp();
    jQuery(this).siblings(".account_category").slideToggle();
});


//********************add navigation li active class************************//
$(document).on("click", ".navigation ul li", function () {
    $(this).addClass("active").siblings().removeClass("active");
});



//************************search form***************************//
$(document).ready(function () {
    $(document).on("click", ".search_design_form input", function () {
        $("body").addClass("show");
    });
    $(document).on("click", "body", function (e) {
        if ($(e.target).is(".searching_result_sec") || $(e.target).is(".header_top_section")) $("body").removeClass("show");
    });
});

$('a.closebutton').on('click', function(){
    $('body.show').removeClass('show');
});

//***Mobile search bar***//
$(document).ready(function () {
    $(document).on("click", ".mobile_serch_icon", function () {
        $("body").addClass("show");
    });
    $(document).on("click", "body", function (e) {
        if ($(e.target).is(".searching_result_sec") || $(e.target).is(".header_top_section")) $("body").removeClass("show");
    });
});



//*********************category accordion******************************//
jQuery(function ($) {
    $(".js-accordion-title").on("click", function () {
        $(this).next().slideToggle(200);
        $(this).toggleClass("open", 200);
    });
});



//********************slider************************//
$("#top_artists").owlCarousel({
    loop: true,
    margin: 10,
    nav: true,
    responsive: {
        0: {
            items: 2,
            nav: false,
        },
        600: {
            items: 3,
            nav: false,
        },
        1000: {
            items: 4,
        },
    },
});

$("#product_range").owlCarousel({
    loop: true,
    margin: 15,
    nav: true,
    responsive: {
        0: {
            items: 1,
            nav: false,
        },
        600: {
            items: 2,
            nav: false,
        },
        1000: {
            items: 3,
        },
    },
});

$("#our_product").owlCarousel({
    loop: true,
    margin: 15,
    nav: true,
    responsive: {
        0: {
            items: 1,
            nav: false,
        },
        600: {
            items: 2,
            nav: false,
        },
        1000: {
            items: 3,
        },
    },
});

$("#featured_products").owlCarousel({
    loop: true,
    margin: 15,
    nav: true,
    responsive: {
        0: {
            items: 1,
            nav: false,
        },
        600: {
            items: 2,
            nav: false,
        },
        1000: {
            items: 3,
        },
    },
});

$("#explore_designs").owlCarousel({
    loop: true,
    margin: 15,
    nav: true,
    responsive: {
        0: {
            items: 1,
            nav: false,
        },
        600: {
            items: 2,
            nav: false,
        },
        1000: {
            items: 3,
        },
    },
});

$("#artists_tab1").owlCarousel({
    loop: true,
    margin: 15,
    nav: true,
    responsive: {
        0: {
            items: 1,
            nav: false,
        },
        600: {
            items: 2,
            nav: false,
        },
        1000: {
            items: 5,
        },
    },
});

$("#artists_tab2").owlCarousel({
    loop: true,
    margin: 15,
    nav: true,
    responsive: {
        0: {
            items: 1,
            nav: false,
        },
        600: {
            items: 2,
            nav: false,
        },
        1000: {
            items: 5,
        },
    },
});

$("#artists_tab3").owlCarousel({
    loop: true,
    margin: 15,
    nav: true,
    responsive: {
        0: {
            items: 1,
            nav: false,
        },
        600: {
            items: 2,
            nav: false,
        },
        1000: {
            items: 5,
        },
    },
});

$("#artists_tab4").owlCarousel({
    loop: true,
    margin: 15,
    nav: true,
    responsive: {
        0: {
            items: 1,
            nav: false,
        },
        600: {
            items: 2,
            nav: false,
        },
        1000: {
            items: 5,
        },
    },
});

$("#artists_tab5").owlCarousel({
    loop: true,
    margin: 15,
    nav: true,
    responsive: {
        0: {
            items: 1,
            nav: false,
        },
        600: {
            items: 2,
            nav: false,
        },
        1000: {
            items: 5,
        },
    },
});

$("#similar_designs").owlCarousel({
    loop: true,
    margin: 15,
    nav: true,
    responsive: {
        0: {
            items: 1,
            nav: false,
        },
        600: {
            items: 3,
            nav: false,
        },
        1000: {
            items: 4,
        },
    },
});

$("#uellaaa").owlCarousel({
    loop: true,
    margin: 15,
    nav: true,
    responsive: {
        0: {
            items: 1,
            nav: false,
        },
        600: {
            items: 3,
            nav: false,
        },
        1000: {
            items: 4,
        },
    },
});

$("#also_available").owlCarousel({
    loop: true,
    margin: 15,
    nav: true,
    responsive: {
        0: {
            items: 1,
            nav: false,
        },
        600: {
            items: 2,
            nav: false,
        },
        1000: {
            items: 4,
        },
    },
});

$("#successful_artists").owlCarousel({
    loop: true,
    margin: 15,
    nav: true,
    responsive: {
        0: {
            items: 1,
            nav: false,
        },
        600: {
            items: 2,
            nav: false,
        },
        1000: {
            items: 4,
        },
    },
});

$("#related_category").owlCarousel({
    loop: true,
    margin: 15,
    nav: true,
    responsive: {
        0: {
            items: 1,
            nav: false,
        },
        600: {
            items: 2,
            nav: false,
        },
        1000: {
            items: 4,
        },
    },
});

$("#range_slider").owlCarousel({
    loop: true,
    margin: 15,
    nav: true,
    responsive: {
        0: {
            items: 2,
            nav: false,
        },
        600: {
            items: 3,
            nav: false,
        },
        1000: {
            items: 5,
        },
    },
});

$("#TopicsCarousel").owlCarousel({
    loop: true,
    margin: 15,
    nav: true,
    responsive: {
        0: {
            items: 2,
            nav: false,
        },
        600: {
            items: 4,
            nav: false,
        },
        1000: {
            items: 5,
			nav: false,
        },
		1200: {
            items: 7,
        },
    },
});



//**************************custom check radiobtn******************************//
jQuery(".custom_check .radiobtn").click(function () {
    jQuery(".custom_check").removeClass("active");
    jQuery(this).parents(".custom_check").addClass("active");
});



//*********************language*********************//
function Util() {}
Util.hasClass = function (el, className) {
    if (el.classList) return el.classList.contains(className);
    else return !!el.className.match(new RegExp("(\\s|^)" + className + "(\\s|$)"));
};
Util.addClass = function (el, className) {
    var classList = className.split(" ");
    if (el.classList) el.classList.add(classList[0]);
    else if (!Util.hasClass(el, classList[0])) el.className += " " + classList[0];
    if (classList.length > 1) Util.addClass(el, classList.slice(1).join(" "));
};
Util.removeClass = function (el, className) {
    var classList = className.split(" ");
    if (el.classList) el.classList.remove(classList[0]);
    else if (Util.hasClass(el, classList[0])) {
        var reg = new RegExp("(\\s|^)" + classList[0] + "(\\s|$)");
        el.className = el.className.replace(reg, " ");
    }
    if (classList.length > 1) Util.removeClass(el, classList.slice(1).join(" "));
};
Util.toggleClass = function (el, className, bool) {
    if (bool) Util.addClass(el, className);
    else Util.removeClass(el, className);
};
Util.setAttributes = function (el, attrs) {
    for (var key in attrs) {
        el.setAttribute(key, attrs[key]);
    }
};
Util.getChildrenByClassName = function (el, className) {
    var children = el.children,
        childrenByClass = [];
    for (var i = 0; i < el.children.length; i++) {
        if (Util.hasClass(el.children[i], className)) childrenByClass.push(el.children[i]);
    }
    return childrenByClass;
};
Util.is = function (elem, selector) {
    if (selector.nodeType) {
        return elem === selector;
    }
    var qa = typeof selector === "string" ? document.querySelectorAll(selector) : selector,
        length = qa.length,
        returnArr = [];
    while (length--) {
        if (qa[length] === elem) {
            return true;
        }
    }
    return false;
};
Util.setHeight = function (start, to, element, duration, cb) {
    var change = to - start,
        currentTime = null;
    var animateHeight = function (timestamp) {
        if (!currentTime) currentTime = timestamp;
        var progress = timestamp - currentTime;
        var val = parseInt((progress / duration) * change + start);
        element.style.height = val + "px";
        if (progress < duration) {
            window.requestAnimationFrame(animateHeight);
        } else {
            cb();
        }
    };
    element.style.height = start + "px";
    window.requestAnimationFrame(animateHeight);
};
Util.scrollTo = function (final, duration, cb) {
    var start = window.scrollY || document.documentElement.scrollTop,
        currentTime = null;
    var animateScroll = function (timestamp) {
        if (!currentTime) currentTime = timestamp;
        var progress = timestamp - currentTime;
        if (progress > duration) progress = duration;
        var val = Math.easeInOutQuad(progress, start, final - start, duration);
        window.scrollTo(0, val);
        if (progress < duration) {
            window.requestAnimationFrame(animateScroll);
        } else {
            cb && cb();
        }
    };
    window.requestAnimationFrame(animateScroll);
};
Util.moveFocus = function (element) {
    if (!element) element = document.getElementsByTagName("body")[0];
    element.focus();
    if (document.activeElement !== element) {
        element.setAttribute("tabindex", "-1");
        element.focus();
    }
};
Util.getIndexInArray = function (array, el) {
    return Array.prototype.indexOf.call(array, el);
};
Util.cssSupports = function (property, value) {
    if ("CSS" in window) {
        return CSS.supports(property, value);
    } else {
        var jsProperty = property.replace(/-([a-z])/g, function (g) {
            return g[1].toUpperCase();
        });
        return jsProperty in document.body.style;
    }
};
Util.extend = function () {
    var extended = {};
    var deep = false;
    var i = 0;
    var length = arguments.length;
    if (Object.prototype.toString.call(arguments[0]) === "[object Boolean]") {
        deep = arguments[0];
        i++;
    }
    var merge = function (obj) {
        for (var prop in obj) {
            if (Object.prototype.hasOwnProperty.call(obj, prop)) {
                if (deep && Object.prototype.toString.call(obj[prop]) === "[object Object]") {
                    extended[prop] = extend(true, extended[prop], obj[prop]);
                } else {
                    extended[prop] = obj[prop];
                }
            }
        }
    };
    for (; i < length; i++) {
        var obj = arguments[i];
        merge(obj);
    }
    return extended;
};
if (!Element.prototype.matches) {
    Element.prototype.matches = Element.prototype.msMatchesSelector || Element.prototype.webkitMatchesSelector;
}
if (!Element.prototype.closest) {
    Element.prototype.closest = function (s) {
        var el = this;
        if (!document.documentElement.contains(el)) return null;
        do {
            if (el.matches(s)) return el;
            el = el.parentElement || el.parentNode;
        } while (el !== null && el.nodeType === 1);
        return null;
    };
}
if (typeof window.CustomEvent !== "function") {
    function CustomEvent(event, params) {
        params = params || {
            bubbles: false,
            cancelable: false,
            detail: undefined,
        };
        var evt = document.createEvent("CustomEvent");
        evt.initCustomEvent(event, params.bubbles, params.cancelable, params.detail);
        return evt;
    }
    CustomEvent.prototype = window.Event.prototype;
    window.CustomEvent = CustomEvent;
}
Math.easeInOutQuad = function (t, b, c, d) {
    t /= d / 2;
    if (t < 1) return (c / 2) * t * t + b;
    t--;
    return (-c / 2) * (t * (t - 2) - 1) + b;
};
/**/
(function () {
    var LanguagePicker = function (element) {
        this.element = element;
        this.select = this.element.getElementsByTagName("select")[0];
        this.options = this.select.getElementsByTagName("option");
        this.selectedOption = getSelectedOptionText(this);
        this.pickerId = this.select.getAttribute("id");
        this.trigger = false;
        this.dropdown = false;
        this.firstLanguage = false;
        // dropdown arrow inside the button element
        this.svgPath = '<svg viewBox="0 0 16 16"><polygon points="3,5 8,11 13,5 "></polygon></svg>';
        initLanguagePicker(this);
        initLanguagePickerEvents(this);
    };

    function initLanguagePicker(picker) {
        // create the HTML for the custom dropdown element
        picker.element.insertAdjacentHTML("beforeend", initButtonPicker(picker) + initListPicker(picker));

        // save picker elements
        picker.dropdown = picker.element.getElementsByClassName("language-picker__dropdown")[0];
        picker.firstLanguage = picker.dropdown.getElementsByClassName("language-picker__item")[0];
        picker.trigger = picker.element.getElementsByClassName("language-picker__button")[0];
    }

    function initLanguagePickerEvents(picker) {
        // make sure to add the icon class to the arrow dropdown inside the button element
        Util.addClass(picker.trigger.getElementsByTagName("svg")[0], "icon");
        // language selection in dropdown
        // ⚠️ Important: you need to modify this function in production
        initLanguageSelection(picker);

        // click events
        picker.trigger.addEventListener("click", function () {
            toggleLanguagePicker(picker, false);
        });
    }

    function toggleLanguagePicker(picker, bool) {
        var ariaExpanded;
        if (bool) {
            ariaExpanded = bool;
        } else {
            ariaExpanded = picker.trigger.getAttribute("aria-expanded") == "true" ? "false" : "true";
        }
        picker.trigger.setAttribute("aria-expanded", ariaExpanded);
        if (ariaExpanded == "true") {
            picker.firstLanguage.focus(); // fallback if transition is not supported
            picker.dropdown.addEventListener("transitionend", function cb() {
                picker.firstLanguage.focus();
                picker.dropdown.removeEventListener("transitionend", cb);
            });
        }
    }

    function checkLanguagePickerClick(picker, target) {
        // if user clicks outside the language picker -> close it
        if (!picker.element.contains(target)) toggleLanguagePicker(picker, "false");
    }

    function moveFocusToPickerTrigger(picker) {
        if (picker.trigger.getAttribute("aria-expanded") == "false") return;
        if (document.activeElement.closest(".language-picker__dropdown") == picker.dropdown) picker.trigger.focus();
    }

    function initButtonPicker(picker) {
        // create the button element -> picker trigger
        // check if we need to add custom classes to the button trigger
        var customClasses = picker.element.getAttribute("data-trigger-class") ? " " + picker.element.getAttribute("data-trigger-class") : "";

        var button =
            '<button class="language-picker__button' +
            customClasses +
            '" aria-label="' +
            picker.select.value +
            " " +
            picker.element.getElementsByTagName("label")[0].innerText +
            '" aria-expanded="false" aria-contols="' +
            picker.pickerId +
            '-dropdown">';
        button = button + '<span aria-hidden="true" class="language-picker__label language-picker__flag language-picker__flag--' + picker.select.value + '"><em>' + picker.selectedOption + "</em>";
        button = button + picker.svgPath + "</span>";
        return button + "</button>";
    }

    function initListPicker(picker) {
        // create language picker dropdown
        var list = '<div class="language-picker__dropdown" aria-describedby="' + picker.pickerId + '-description" id="' + picker.pickerId + '-dropdown">';
        list = list + '<p class="sr-only" id="' + picker.pickerId + '-description">' + picker.element.getElementsByTagName("label")[0].innerText + "</p>";
        list = list + '<ul class="language-picker__list" role="listbox">';
        for (var i = 0; i < picker.options.length; i++) {
            var selected = picker.options[i].hasAttribute("selected") ? ' aria-selected="true"' : "",
                language = picker.options[i].getAttribute("lang");
            list =
                list +
                '<li><a lang="' +
                language +
                '" hreflang="' +
                language +
                '" href="' +
                getLanguageUrl(picker.options[i]) +
                '"' +
                selected +
                ' role="option" data-value="' +
                picker.options[i].value +
                '" class="language-picker__item language-picker__flag language-picker__flag--' +
                picker.options[i].value +
                '"><span>' +
                picker.options[i].text +
                "</span></a></li>";
        }
        return list;
    }

    function getSelectedOptionText(picker) {
        // used to initialize the label of the picker trigger button
        var label = "";
        if ("selectedIndex" in picker.select) {
            label = picker.options[picker.select.selectedIndex].text;
        } else {
            label = picker.select.querySelector("option[selected]").text;
        }
        return label;
    }

    function getLanguageUrl(option) {
        // ⚠️ Important: You should replace this return value with the real link to your website in the selected language
        // option.value gives you the value of the language that you can use to create your real url (e.g, 'english' or 'italiano')
        return "#";
    }

    function initLanguageSelection(picker) {
        picker.element.getElementsByClassName("language-picker__list")[0].addEventListener("click", function (event) {
            var language = event.target.closest(".language-picker__item");
            if (!language) return;

            if (language.hasAttribute("aria-selected") && language.getAttribute("aria-selected") == "true") {
                // selecting the same language
                event.preventDefault();
                picker.trigger.setAttribute("aria-expanded", "false"); // hide dropdown
            } else {
                // ⚠️ Important: this 'else' code needs to be removed in production.
                // The user has to be redirected to the new url -> nothing to do here
                event.preventDefault();
                picker.element.getElementsByClassName("language-picker__list")[0].querySelector('[aria-selected="true"]').removeAttribute("aria-selected");
                language.setAttribute("aria-selected", "true");
                picker.trigger.getElementsByClassName("language-picker__label")[0].setAttribute("class", "language-picker__label language-picker__flag language-picker__flag--" + language.getAttribute("data-value"));
                picker.trigger.getElementsByClassName("language-picker__label")[0].getElementsByTagName("em")[0].innerText = language.innerText;
                picker.trigger.setAttribute("aria-expanded", "false");
            }
        });
    }

    //initialize the LanguagePicker objects
    var languagePicker = document.getElementsByClassName("js-language-picker");
    if (languagePicker.length > 0) {
        var pickerArray = [];
        for (var i = 0; i < languagePicker.length; i++) {
            (function (i) {
                pickerArray.push(new LanguagePicker(languagePicker[i]));
            })(i);
        }

        // listen for key events
        window.addEventListener("keyup", function (event) {
            if ((event.keyCode && event.keyCode == 27) || (event.key && event.key.toLowerCase() == "escape")) {
                // close language picker on 'Esc'
                pickerArray.forEach(function (element) {
                    moveFocusToPickerTrigger(element); // if focus is within dropdown, move it to dropdown trigger
                    toggleLanguagePicker(element, "false"); // close dropdown
                });
            }
        });
        // close language picker when clicking outside it
        window.addEventListener("click", function (event) {
            pickerArray.forEach(function (element) {
                checkLanguagePickerClick(element, event.target);
            });
        });
    }
})();



//******************************quantity***********************************//
function wcqib_refresh_quantity_increments() {
    jQuery("div.quantity:not(.buttons_added), td.quantity:not(.buttons_added)").each(function (a, b) {
        var c = jQuery(b);
        c.addClass("buttons_added"), c.children().first().before('<input type="button" value="-" class="minus" />'), c.children().last().after('<input type="button" value="+" class="plus" />');
    });
}
String.prototype.getDecimals ||
    (String.prototype.getDecimals = function () {
        var a = this,
            b = ("" + a).match(/(?:\.(\d+))?(?:[eE]([+-]?\d+))?$/);
        return b ? Math.max(0, (b[1] ? b[1].length : 0) - (b[2] ? +b[2] : 0)) : 0;
    }),
    jQuery(document).ready(function () {
        wcqib_refresh_quantity_increments();
    }),
    jQuery(document).on("updated_wc_div", function () {
        wcqib_refresh_quantity_increments();
    }),
    jQuery(document).on("click", ".plus, .minus", function () {
        var a = jQuery(this).closest(".quantity").find(".qty"),
            b = parseFloat(a.val()),
            c = parseFloat(a.attr("max")),
            d = parseFloat(a.attr("min")),
            e = a.attr("step");
        (b && "" !== b && "NaN" !== b) || (b = 0),
            ("" !== c && "NaN" !== c) || (c = ""),
            ("" !== d && "NaN" !== d) || (d = 0),
            ("any" !== e && "" !== e && void 0 !== e && "NaN" !== parseFloat(e)) || (e = 1),
            jQuery(this).is(".plus") ? (c && b >= c ? a.val(c) : a.val((b + parseFloat(e)).toFixed(e.getDecimals()))) : d && b <= d ? a.val(d) : b > 0 && a.val((b - parseFloat(e)).toFixed(e.getDecimals())),
            a.trigger("change");
    });



//***********************Range Slider******************************//
var rangeSlider = function () {
    var slider = $(".range-slider"),
        range = $(".range-slider__range"),
        value = $(".range-slider__value");

    slider.each(function () {
        value.each(function () {
            var value = $(this).prev().attr("value");
            $(this).html(value);
        });

        range.on("input", function () {
            $(this).next(value).html(this.value);
        });
    });
};

rangeSlider();



//****************************Singel Product image slider************************************//
$(".singel_product_imagess").magnificPopup({
    delegate: "a",
    type: "image",
    gallery: {
        enabled: true,
        navigateByImgClick: true,
        preload: [0, 1], // Will preload 0 - before current, and 1 after the current image
    },
    callbacks: {
        elementParse: function (item) {
            console.log(item.el[0].className);
            if (item.el[0].className == "video") {
                (item.type = "iframe"),
                    (item.iframe = {
                        patterns: {
                            youtube: {
                                index: "youtube.com/", // String that detects type of video (in this case YouTube). Simply via url.indexOf(index).

                                id: "v=", // String that splits URL in a two parts, second part should be %id%
                                // Or null - full URL will be returned
                                // Or a function that should return %id%, for example:
                                // id: function(url) { return 'parsed id'; }

                                src: "//www.youtube.com/embed/%id%?autoplay=1", // URL that will be set as a source for iframe.
                            },
                            vimeo: {
                                index: "vimeo.com/",
                                id: "/",
                                src: "//player.vimeo.com/video/%id%?autoplay=1",
                            },
                            gmaps: {
                                index: "//maps.google.",
                                src: "%id%&output=embed",
                            },
                        },
                    });
            } else {
                (item.type = "image"),
                    (item.tLoading = "Loading image #%curr%..."),
                    (item.mainClass = "mfp-img-mobile"),
                    (item.image = {
                        tError: '<a href="%url%">The image #%curr%</a> could not be loaded.',
                    });
            }
        },
    },
});
