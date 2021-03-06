/* Filters */
$("body").on('change', '.filter_bar input', function () {
    var checked = $('.filter_bar input:checked'),
        data = '';

    checked.each(function () {
        data += this.value + ',';
    });

    if (data) {
        $.ajax({
            url: location.href,
            data: {filter: data},
            type: 'GET',
            success: function (res) {
                $('.product-one').html(res);
                var url = location.search.replace(/filter(.+?)(&|$)/g, '');
                var newURL = location.pathname + url + (location.search ? "&" : "?") + "filter=" + data;
                newURL = newURL.replace('&&', '&');
                newURL = newURL.replace('?&', '?');
                history.pushState({}, '', newURL);
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
    source: products,
    templates: {
        suggestion: function(data) {
            return '<div class="d-flex search-item align-items-start"><img src="images/' + data.img + '" alt=""/><p>' + data.title + '<br>' + data.color + '</p></div>';
        }
    }
});

$('#typeahead').bind('typeahead:select', function (ev, suggestion) {
    //console.log(suggestion);
    window.location = path + 'search?s=' + encodeURIComponent(suggestion.title);
});

/* Cart */
$('body').on('click', '.add-to-cart-link', function(e) {

    var id = $(this).data('id'),
        qty = $('.quantity input').val() ? $('.quantity input').val() : 1,
        size = $('.available select').val(),
        size_id = $('.available select').find('option').filter(':selected').data('id'),
        available_qty = $('.available select').find('option').filter(':selected').data('qty');

    $.ajax({
        url: 'cart/add',
        data: {id: id, qty: qty, size: size, size_id: size_id, available_qty: available_qty},
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
        $('#cart .modal-footer .custom-btn-secondary, #cart .modal-footer .btn-danger, #cart .modal-footer .custom-btn').css('display', 'none');
    } else {
        $('#cart .modal-footer .custom-btn-secondary, #cart .modal-footer .btn-danger, #cart .modal-footer .custom-btn').css('display', 'inline-block');
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
    var price = $(this).find('option').filter(':selected').data('price'),
        available_qty = $(this).find('option').filter(':selected').data('qty'),
        basePrice = $('#base-price').data('base');

    $('.quantity input').val('1');
    if (available_qty) {
        $('.quantity input').attr('max', available_qty);
    }
    if (price) {
        $('#base-price').text(symbolLeft + price + symbolRight);
    } else {
        $('#base-price').text(symbolLeft + basePrice + symbolRight);
    }
});

function isNumeric(n) {
    return !isNaN(parseFloat(n)) && isFinite(n);
}

// sort by price
$('.sort select').on('change', function () {
    var sort = $(this).val();

    $.ajax({
        url: location.href,
        data: {sort: sort},
        type: 'GET',
        success: function (res) {
            $('.product-one').html(res);

            var url = location.search.replace(/sort(.+?)(&|$)/g, '');
            var newURL = location.pathname + url + (location.search ? "&" : "?") + "sort=" + sort;
            newURL = newURL.replace('&&', '&');
            newURL = newURL.replace('?&', '?');
            history.pushState({}, '', newURL);
            },
            error: function () {
                alert("Error!!!");
            }
        });
});

//select2
$(document).ready(function() {
    $('.custom-sort-select').select2({
        dropdownCssClass: 'custom-sort-select-dropdown',
        minimumResultsForSearch: Infinity
    });
    $('.custom-size-select').select2({
        dropdownCssClass: 'custom-size-select-dropdown',
        minimumResultsForSearch: Infinity
    });
});

//slider - product page
$('.slider-for').slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    arrows: false,
    fade: true,
    asNavFor: '.slider-nav',
    dots: false,
    responsive: [
        {
          breakpoint: 768,
          settings: {
            dots: true
          }
        }]
});
$('.slider-nav').slick({
    slidesToShow: 3,
    slidesToScroll: 1,
    asNavFor: '.slider-for',
    dots: false,
    focusOnSelect: true,
    vertical: true,
    arrows: true,
    centerMode: true,
    centerPadding: "15",
    prevArrow:"<button type='button' class='slick-prev'><i class='fa fa-angle-up' aria-hidden='true'></i></button>",
    nextArrow:"<button type='button' class='slick-next'><i class='fa fa-angle-down' aria-hidden='true'></i></button>"
        
});

//tools
$('.toggle-filtres').click(function(){
    $('.filters').toggleClass('show');
    $('.products-container').toggleClass('show-filters');
});
$('.filters-close-btn').click(function(){
    $('.filters').toggleClass('show');
    $('.products-container').toggleClass('show-filters');
});
