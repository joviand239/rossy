$(document).ready(function () {

    $('[name=hasVarian]').change(function() {
        var hasVarian = $(this).val();

        if (hasVarian == 1) {
            $('.priceSection').addClass('hidden');
            $('.varianSection').removeClass('hidden');
        } else {
            $('.varianSection').addClass('hidden');
            $('.priceSection').removeClass('hidden');
        }
    });

});