var form = (function() {

    var presets = [[53,41], [58,48]];

    jQuery(document).ready(function($) {

        var $point1 = $('input[name="PortalSearch[point1]"]');
        var $point2 = $('input[name="PortalSearch[point2]"]');

        $(document).on( "ymaps-select:init", function( event ) {
            if ($point1.val() && $point2.val())
            {
                var point1 = $point1.val().split(',');
                var point2 = $point2.val().split(',');
                ymapsSelect.renderRect([point1, point2]);
            }
        });


        $('.portal-grid-geo').click(function() {
            $point1.val(presets[0][0] + ', ' + presets[0][1]);
            $point2.val(presets[1][0] + ', ' + presets[1][1]);
            ymapsSelect.renderRect(presets);
        });

        $('.button-kml').click(function() {
            var $form = $('.portal-search > form');
            var action = $(this).data('formaction');
            $form.attr('action', action);
            $form.submit();
        });

    });

}());