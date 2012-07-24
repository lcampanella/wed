var guestConfirmationController = (function (){
    "use strict";

    function _handleGuestConfirmationFormSubmission(){
        $('#button-confirm-guests').click(function(e){
            e.preventDefault();

            var button = $(this);
            button.attr('disabled', 'disabled');

            var url = $('#confirm-guests-form').attr("action");
            var data = $('#confirm-guests-form').serialize();
            $.post(url, data, function(data, textStatus) {
                if (textStatus == 'success') {
                    if (data.responseCode == 200) {
                        $('.notice-success').html(data.notice).slideDown('slow').delay(3000).slideUp('slow', function(){button.removeAttr('disabled');});
                    } else {
                        $('.notice-error').html(data.notice).slideDown('slow').delay(3000).slideUp('slow', function(){button.removeAttr('disabled');});
                    }
                }
            });
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

    function _handleGuestMenuFormSubmission(){
        $('#button-menu-guests').click(function(e){
            e.preventDefault();

            var button = $(this);
            button.attr('disabled', 'disabled');

            var url = $('#choosemenu-guests-form').attr("action");
            var data = $('#choosemenu-guests-form').serialize();
            $.post(url, data, function(data, textStatus) {
                if (textStatus == 'success') {
                    if (data.responseCode == 200) {
                        $('.notice-success').html(data.notice).slideDown('slow').delay(3000).slideUp('slow', function(){button.removeAttr('disabled');});
                    } else {
                        $('.notice-error').html(data.notice).slideDown('slow').delay(3000).slideUp('slow', function(){button.removeAttr('disabled')});
                    }
                }
            });
        });
    }

    function _init(){
        _handleGuestConfirmationFormSubmission();
        _handleCheckboxes();
        _handleGuestMenuFormSubmission();
    }

    return {
        init: _init
    };
})();

$(document).ready(function() {
    guestConfirmationController.init();
});