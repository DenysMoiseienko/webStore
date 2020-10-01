$('.delete').click(function () {
    var res = confirm('Confirm action');
    if (!res) return false;
});

$('#editor1').ckeditor();

$('#reset-filter').click(function() {
    $('#filter input[type=radio]').prop('checked', false);
    return false;
});

$(".select2").select2({
    placeholder: 'Enter product name',
    minimumInputLength: 2,
    cache: true,
    ajax: {
        url: adminPath + "/product/related-product",
        delay: 250,
        dataType: 'json',
        data: function (params) {
            return {
                q: params.term,
                page: params.page
            };
        },
        processResults: function (data, params) {
            return {
                results: data.items,
            }
        },
    },
});
