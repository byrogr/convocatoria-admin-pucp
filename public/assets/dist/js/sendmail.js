/**
 * Created by Roger on 19/02/2016.
 */
$(document).on('ready', function() {
    var $form = $('#frmSoporte');
    $form.submit(function(event) {
        event.preventDefault();
        var data = $(this).serialize();
        console.log(data);
        $.ajax({
            'url': ''

        });
    });
});