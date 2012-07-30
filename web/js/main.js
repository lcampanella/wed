var mainController = (function (){
    "use strict";

    // Add guest behaviour
    function _handleAddGuest(){
        var fieldset = null;
        var fieldsetContainer = null;
        var count = 0;
        $('li.add-guest img', 'div.edit-guest-form').click(function(){
            // Clone fieldset for later append
            fieldset = _cloneFieldset();
            // Lets update guest number #
            count = $('fieldset.fieldset-guest').length;
            $('span.guest-number strong', fieldset).html('#'+(count+1));

            // Update index for lastname and firstname
            $('input[name^=lastname_]', fieldset).attr('name', 'lastname_'+(count+1));
            $('input[name^=firstname_]', fieldset).attr('name', 'firstname_'+(count+1));

            fieldsetContainer = $('div#fieldset-container');
            // Append new guest fieldset at the bottom of container
            fieldsetContainer.append(fieldset);
        });
    }

    // Remove guest behaviour
    function _handleRemoveGuest(){
        $('img.remove-guest', 'div#fieldset-container').live('click', function(){
            $(this).parents('fieldset.fieldset-guest').first().remove();

            // Get guests numbers (except the first one, we use it for cloning purposes only)
            var guestsNumbers = $('.guest-number strong').filter(function(index){return index!=0})
            // Update guest numbers, so they are in ascendant order and with no gaps
            $.each(guestsNumbers, function(i, strong){
                $(strong).html('#'+(i+1));
            });

            var lastnameInputs = $('input[name^=lastname_]:not([name=lastname_0])');
            var firstnameInputs = $('input[name^=firstname_]:not([name=firstname_0])');
            $.each(lastnameInputs, function(i, input){
                $(input).attr('name', 'lastname_'+(i+1));
            });
            $.each(firstnameInputs, function(i, input){
                $(input).attr('name', 'firstname_'+(i+1));
            });
        });
    }

    function _validateForm(){
        $('#edit-guest-form').validate();
        $('#edit-user-form').validate();
    }

    function _cloneFieldset(){
        var clonedFieldset = $('fieldset#base-guest-fieldset').clone().removeAttr('id').show();
        clonedFieldset.addClass('fieldset-guest');
        $('input', clonedFieldset).removeAttr('disabled');

        return clonedFieldset;
    }

    function _handleCancelButtons(){
        $('button#cancelButton').click(function(e){
            e.preventDefault();
            window.location.href = $(this).val();
        });
    }

    function _handleSpoolEmailButton(){
        $("#buttonSpoolEmails").click(function(e) {
            var button = $(this);
            button.attr('disabled', 'disabled');

            var url = $(this).val();
            $.post(url, {}, function(data, textStatus) {
                if (textStatus == 'success') {
                    if (data.responseCode == 200) {
                        $('.notice-success').html(data.notice).slideDown('slow').delay(4000).slideUp('slow', function(){button.removeAttr('disabled');});
                    } else {
                        $('.notice-error').html(data.notice).slideDown('slow').delay(4000).slideUp('slow', function(){button.removeAttr('disabled');});
                    }
                }
            });
        });
    }

    function _init(){
        // Confirm dialog
        $(".confirm").easyconfirm();

        _validateForm();
        _handleAddGuest();
        _handleRemoveGuest();
        _handleCancelButtons();
        _handleSpoolEmailButton();
    }

    return {
        init: _init
    };
})();

$(document).ready(function() {
    mainController.init();
});