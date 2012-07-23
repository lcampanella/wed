var guestConfirmationController = (function (){
    "use strict";

    function _handleGuestConfirmationFormSubmission(){
        $('#button-confirm-guests').click(function(e){
            e.preventDefault();

            var url = $('#confirm-guests-form').attr("action");
            var data = $('#confirm-guests-form').serialize();
            console.log(data);
            $.post(url, data, function(data, textStatus) {
                $('.notice-success').html(data.notice).slideDown('slow').delay(3000).slideUp('slow');
            });

//            $('#confirm-guests-form').submit();
        });
    }

    function _handleCheckboxes(){
        $('input:checkbox').click(function(e) {
            var parts = $(this).attr('name').split('_');
            var name = parts[0];
            var id = parts[1];
            if ($(this).attr('checked')) {
                console.log($('input[name=checkbox_'+id+']'));
                $('input[name=checkbox_'+id+']').val('1');
            } else {
                console.log($('input[name=checkbox_'+id+']'));
                $('input[name=checkbox_'+id+']').val('0');
            }
        });
    }

    function _init(){
        _handleGuestConfirmationFormSubmission();
        _handleCheckboxes();
    }

    return {
        init: _init
    };
})();

$(document).ready(function() {
    guestConfirmationController.init();
});