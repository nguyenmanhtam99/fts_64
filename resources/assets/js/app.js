/**
 * Hide success
 */
$('.alert-success').hide(2000);

$(document).ready(function() {
    $('#addOption').click(function() {
        $('.option').append('<div class="allOption">' + $('.addRow').html() + '</div>');
    })
    ;
    $('#removeOption').click(function() {
        $('.option div.allOption:last-child').remove();
    });
});
