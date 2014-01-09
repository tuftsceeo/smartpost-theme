/**
 * Created by ryagudin on 1/8/14.
 * @author Rafi Yagudin
 * @project SmartPost Twenty Twelve theme
 * @version 1.0
 */
var sp_theme = sp_theme || {};
(function($){

    sp_theme.main = {
        init: function(){
            $( '#site-title-editable' ).editable(
                function(value, settings){
                    return value;
                },
                {
                    placeholder: 'Click to add a title',
                    onblur     : 'submit',
                    cssclass   : 'sp_compTitleEditable',
                    maxlength  : 65
                }
            );
        }
    }

    $(document).ready(function(){
        sp_theme.main.init();
    });


})(jQuery);