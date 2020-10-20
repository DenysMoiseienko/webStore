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
        size = $('.available select').val(),
        size_id = $('.available select').find('option').filter(':selected').data('id'),
        available_qty = $('.available select').find('option').filter(':selected').data('qty');
        //mod = $('.available select').val(),

    $.ajax({
        url: 'cart/add',
        //data: {id: id, qty: qty, mod: mod, size: size},
        data: {id: id, qty: qty, size: size, size_id: size_id, available_qty: available_qty},
        //data: {id: id, qty: qty},
        type: 'GET',
        success: function (res) {
            showCart(res);
        },
        error: function () {
            if (!isNumeric(size)) {
                alert('Choose size');
            }
            if (qty > available_qty) {
                alert('Error! invalid amount');
            }
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
        $('#cart .modal-footer a, #cart .modal-footer .btn-danger, #cart .modal-footer .btn-primary').css('display', 'none');
    } else {
        $('#cart .modal-footer a, #cart .modal-footer .btn-danger, #cart .modal-footer .btn-primary').css('display', 'inline-block');
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

function recalculate() {
    var qty = [],
        id = [];

    $('input.cart-quantity').each(function () {
        qty.push($(this).val());
        id.push($(this).data('id'));
    });

    $.ajax({
        url: 'cart/recalculate',
        data: {qty: qty, id: id},
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
        // size_id = $(this).find('option').filter(':selected').data('testId'),
        // available_qty = $(this).find('option').filter(':selected').data('testQty'),
        basePrice = $('#base-price').data('base');
    if (price) {
        $('#base-price').text(symbolLeft + price + symbolRight);
    } else {
        $('#base-price').text(symbolLeft + basePrice + symbolRight);
    }
});

function isNumeric(n) {
    return !isNaN(parseFloat(n)) && isFinite(n);
}