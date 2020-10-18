/* Filters */
$("body").on('change', '.w_sidebar input', function () {
    var checked = $('.w_sidebar input:checked'),
        data = '';

    checked.each(function () {
        data += this.value + ',';
    });

    if (data) {
        $.ajax({
            url: location.href,
            data: {filter: data},
            type: 'GET',
            beforeSend: function () {
                $('.preloader').fadeIn(300, function () {
                    $('.product-one').hide();
                });
            },
            success: function (res) {
                $('.preloader').delay(500).fadeOut('slow', function () {
                    $('.product-one').html(res).fadeIn();
                    var url = location.search.replace(/filter(.+?)(&|$)/g, '');
                    var newURL = location.pathname + url + (location.search ? "&" : "?") + "filter=" + data;
                    newURL = newURL.replace('&&', '&');
                    newURL = newURL.replace('?&', '?');
                    history.pushState({}, '', newURL);
                });
            },
            error: function () {
                alert('Error!');
            }
        });
    }else {
        window.location = location.pathname;
    }
});

/* Search */
var products = new Bloodhound({
    datumTokenizer: Bloodhound.tokenizers.whitespace,
    queryTokenizer: Bloodhound.tokenizers.whitespace,
    remote: {
        wildcard: '%QUERY',
        url: path + '/search/typeahead?query=%QUERY'
    }
});

products.initialize();

$("#typeahead").typeahead({
    //hint: false,
    highlight: true
},{
    name: 'products',
    display: 'title',
    limit: 9,
    source: products
});

$('#typeahead').bind('typeahead:select', function (ev, suggestion) {
    //console.log(suggestion);
    window.location = path + '/search/?s=' + encodeURIComponent(suggestion.title);
});

/* Cart */
$('body').on('click', '.add-to-cart-link', function(e) {

    var id = $(this).data('id'),
        qty = $('.quantity input').val() ? $('.quantity input').val() : 1,
        mod = $('.available select').val();

    $.ajax({
        url: 'cart/add',
        data: {id: id, qty: qty, mod: mod},
        type: 'GET',
        success: function (res) {
            showCart(res);
        },
        error: function () {
            alert('Error! Try again later')
        }
    });

    e.preventDefault();
});

$('#cart .modal-body').on('click', '.del-item', function () {
    var id = $(this).data('id');
    $.ajax({
        url: 'cart/delete',
        data: {id: id},
        type: 'GET',
        success: function (res) {
            showCart(res);
        },
        error: function () {
            alert('Error!');
        }
    });
});

function showCart(cart){
    if($.trim(cart) == '<h3>Cart is Empty</h3>') {
        $('#cart .modal-footer a, #cart .modal-footer .btn-danger').css('display', 'none');
    } else {
        $('#cart .modal-footer a, #cart .modal-footer .btn-danger').css('display', 'inline-block');
    }
    $('#cart .modal-body').html(cart);
    $('#cart').modal();

    if ($('.cart-qty').text()) {
        $('.simpleCart_total').html($('#cart .cart-qty').text());
    } else {
        $('.simpleCart_total').text('');
    }
}

function getCart() {
    $.ajax({
        url: 'cart/show',
        type: 'GET',
        success: function (res) {
            showCart(res);
        },
        error: function () {
            alert('Error! Try again later')
        }
    });
}

function clearCart() {
    $.ajax({
        url: 'cart/clear',
        type: 'GET',
        success: function (res) {
            showCart(res);
        },
        error: function () {
            alert('Error! Try again later')
        }
    });
}

/* Currency */
$('#currency'). change(function() {
    window.location = 'currency/change?curr=' + $(this).val();
});

$('.available select').on('change', function () {
    var modId = $(this).val(),
        color = $(this).find('option').filter(':selected').data('title'),
        price = $(this).find('option').filter(':selected').data('price'),
        basePrice = $('#base-price').data('base');
    if (price) {
        $('#base-price').text(symbolLeft + price + symbolRight);
    } else {
        $('#base-price').text(symbolLeft + basePrice + symbolRight);
    }
});

/* open/close main sidebar menu */
function openNav() {
    document.getElementById("sidebar-nav").style.width = "300px";
}

function closeNav() {
    document.getElementById("sidebar-nav").style.width = "0";
}

/*global $ */


    $('.sidebar-nav > ul > li:has( > ul)').addClass('menu-dropdown-icon');
    //Checks if li has sub (ul) and adds class for toggle icon - just an UI
  
    //Checks if drodown menu's li elements have anothere level (ul), if not the dropdown is shown as regular dropdown, not a mega menu (thanks Luka Kladaric)
  
    // $(".sidebar-nav > ul").before("<a href=\"#\" class=\"menu-mobile\">Navigation</a>");
  
    //Adds menu-mobile class (for mobile toggle menu) before the normal menu
    //Mobile menu is hidden if width is more then 959px, but normal menu is displayed
    //Normal menu is hidden if width is below 959px, and jquery adds mobile menu
    //Done this way so it can be used with wordpress without any trouble
  
    //  
    //If width is more than 943px dropdowns are displayed on hover
  
    $(".sidebar-nav > ul > li .menu-has-items-toggle").click(function() {
        $(this).siblings("ul").fadeToggle(150);
        $(this).parent("li").toggleClass('active');
        $(this).toggleClass('active');
    });
    //If width is less or equal to 943px dropdowns are displayed on click (thanks Aman Jain from stackoverflow)
  
    $(".sidebar-nav-mobile").click(function(e) {
      $(".sidebar-nav > ul").toggleClass('show-on-mobile');
      e.preventDefault();
    });
    //when clicked on mobile-menu, normal menu is shown as a list, classic rwd menu story (thanks mwl from stackoverflow)
  
