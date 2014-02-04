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

            // Enable jQuery UI radio buttons for post viewing format
            $( '#post-view-format' ).buttonset();

            $( '#post-view-grid').click(function(){
               $( 'article' ).addClass( 'grid-view' );
            });

            $( '#post-view-list' ).click(function(){
                $( 'article').removeClass( 'grid-view' );
            })

        }
    }

    $(document).ready(function(){
        sp_theme.main.init();
    });


})(jQuery);