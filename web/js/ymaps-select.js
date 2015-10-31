var ymapsSelect = (function() {

    var rect = [];
    var rectObj;

    var clickCallback = function(value) {
        var clickCoord = value.getSourceEvent().originalEvent.coords;
        if (rect.length <= 1)
        {
            rect.push(clickCoord);
        }
        if (rect.length == 2)
        {
            renderRect(rect);
            rect = [];
        }

    };

    var renderRect = function (rect) {
        if (rectObj) {
            $Maps['yandex_map'].geoObjects.remove(rectObj);
        }
        rectObj = new ymaps.Rectangle(
            rect,
            {},
            {
                fillColor: '#FFD3A5FF',
                fillOpacity: 0.5,
                strokeColor: '#FFD3A5FF',
                strokeOpacity: 0.5
            }
        );
        $Maps['yandex_map'].geoObjects.add(rectObj);
        $('input[name="PortalSearch[point1]"]').val(rect[0][0] + ', ' + rect[0][1]);
        $('input[name="PortalSearch[point2]"]').val(rect[1][0] + ', ' + rect[1][1]);
    };

    ymaps.ready(function() {
        var interval = setInterval(function () {
                if ($Maps['yandex_map'])
                {
                    $Maps['yandex_map'].events.add([
                        'click'
                    ], clickCallback);
                    $(document).trigger('ymaps-select:init', $Maps);
                    clearInterval(interval);
                }
            }
            , 200)
    });

    return {
        'renderRect': renderRect
    };

}());