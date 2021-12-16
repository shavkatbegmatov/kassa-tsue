$(function() {
    $('#lang').change(function() {
        window.location = '/kassa/language/change?lang=' + $(this).val();
    });
});