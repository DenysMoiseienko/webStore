$('.delete').click(function () {
    var res = confirm('Confirm action');
    if (!res) return false;
});

$('#editor1').ckeditor();


