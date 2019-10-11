$(function () {
    $('.js-calculator-form').on('beforeSubmit', function() {
        var $form = $(this);
        $.ajax({
            url: $form.attr('action'),
            type: 'POST',
            data: $form.serialize(),
            beforeSend: function () {
                $('.soap-error-alert').fadeOut(100);
                $('.soap-message-alert').fadeOut(100);
            }
        })
            .done(function(data) {
                if (data.soapError) {
                    $('.soap-error-alert .js-error-message').text(data.soapError);
                    $('.soap-error-alert').fadeIn('slow');
                }
                if (data.price && data.info) {
                    $('.soap-message-alert .js-price').text(data.price);
                    $('.soap-message-alert .js-info-message').text(data.info);
                    $('.soap-message-alert').fadeIn('slow');
                }
            })
            .fail(function (jqXHR, textStatus, errorThrown) {
                alert(jqXHR.responseText);
            });
        return false;
    });
});