$('.delete').click(function () {
    var res = confirm('Confirm action');
    if (!res) return false;
});

$('.del-item').on('click', function () {
    var res = confirm('Confirm action');
    if (!res) return false;
    var $this = $(this),
        id = $this.data('id'),
        src = $this.data('src');
    $.ajax({
        url: adminPath + '/product/delete-gallery',
        data: {id: id, src: src},
        type: 'POST',
        beforeSend: function () {
            $this.closest('.file-upload').find('.overlay').css({'display':'block'});
        },
        success: function (res) {
            setTimeout(function () {
                $this.closest('.file-upload').find('.overlay').css({'display':'none'});
                if (res == 1) {
                    $this.fadeOut();
                }
            }, 1000);
        },
        error: function () {
            setTimeout(function () {
                $this.closest('.file-upload').find('.overlay').css({'display':'none'});
                alert("Error!");
            }, 1000);
        }
    })
});


// CKEditor
// $('#editor1').ckeditor();

// SummerNote editor
$(function () {
    // SummerNote
    $('.textarea').summernote()
})

// Reset filters
$('#reset-filter').click(function() {
    $('#filter input[type=radio]').prop('checked', false);
    return false;
});

// Select2
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
        }
    }
});

// Upload images
if ($('div').is('#single')) {
    var buttonSingle = $('#single'),
        buttonMulti = $('#multi'),
        file;
}

var uploadImage = function (button) {
    new AjaxUpload(button, {
        action: adminPath + button.data('url') + '?upload=1',
        data: {name: button.data('name')},
        name: button.data('name'),
        onSubmit: function (file, ext) {
            if (!(ext && /^(jpg|png|jpeg|gif)$/i.test(ext))) {
                alert('Error!');
                return false;
            }
            button.closest('.file-upload').find('.overlay').css({'display': 'block'});
        },
        onComplete: function(file, response) {
            setTimeout(function () {
                button.closest('.file-upload').find('.overlay').css({'display':'none'});

                response = JSON.parse(response);
                $('.' + button.data('name')).html(
                    '<img src="images/' + response.file + '" style="max-height: 150px;">');
            }, 1000);
        }
    });
}

if (buttonSingle){
    uploadImage(buttonSingle);
}

if (buttonMulti) {
    uploadImage(buttonMulti);
}


