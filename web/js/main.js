var guestController = (function (){
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

            fieldsetContainer = $('div#fieldset-container');
            // Append new guest fieldset at the bottom of container
            fieldsetContainer.append(fieldset);
        });
    }

    function _cloneFieldset(){
        var clonedFieldset = $('fieldset#base-guest-fieldset').clone().removeAttr('id').show();
        clonedFieldset.addClass('fieldset-guest');
        $('input', clonedFieldset).removeAttr('disabled');

        return clonedFieldset;
    }

    function _init(){
        _handleAddGuest();
    }

    return {
        init: _init
    };
})();

$(document).ready(function() {
    guestController.init();
});