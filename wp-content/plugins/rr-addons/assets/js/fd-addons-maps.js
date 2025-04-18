jQuery(window).on("elementor/frontend/init", function () {

    elementorFrontend.hooks.addAction(
        "frontend/element_ready/rr-addons-maps.default",
        function ($scope, $) {

            var mapElement = $scope.find(".rr_addons_map_height");

            var mapSettings = mapElement.data("settings");

            var mapStyle = mapElement.data("style");

            var rr_addonsMapMarkers = [];

            rr_addonsMap = newMap(mapElement, mapSettings, mapStyle);

            var markerCluster = JSON.parse(mapSettings["cluster"]);

            function newMap(map, settings, mapStyle) {
                var scrollwheel = JSON.parse(settings["scrollwheel"]);
                var streetViewControl = JSON.parse(settings["streetViewControl"]);
                var fullscreenControl = JSON.parse(settings["fullScreen"]);
                var zoomControl = JSON.parse(settings["zoomControl"]);
                var mapTypeControl = JSON.parse(settings["typeControl"]);
                var centerLat = JSON.parse(settings["centerlat"]);
                var centerLong = JSON.parse(settings["centerlong"]);
                var autoOpen = JSON.parse(settings["automaticOpen"]);
                var hoverOpen = JSON.parse(settings["hoverOpen"]);
                var hoverClose = JSON.parse(settings["hoverClose"]);
                var args = {
                    zoom: settings["zoom"],
                    mapTypeId: settings["maptype"],
                    center: { lat: centerLat, lng: centerLong },
                    scrollwheel: scrollwheel,
                    streetViewControl: streetViewControl,
                    fullscreenControl: fullscreenControl,
                    zoomControl: zoomControl,
                    mapTypeControl: mapTypeControl,
                    styles: mapStyle
                };

                if ("yes" === mapSettings.drag)
                    args.gestureHandling = "none";

                var markers = map.find(".rr-addons-pin");

                var map = new google.maps.Map(map[0], args);

                map.markers = [];
                // add markers
                markers.each(function () {
                    add_marker(jQuery(this), map, autoOpen, hoverOpen, hoverClose);
                });

                return map;
            }

            function add_marker(pin, map, autoOpen, hoverOpen, hoverClose) {
                var latlng = new google.maps.LatLng(
                    pin.attr("data-lat"),
                    pin.attr("data-lng")
                ),
                    icon_img = pin.attr("data-icon"),
                    maxWidth = pin.attr("data-max-width"),
                    customID = pin.attr("data-id"),
                    iconSize = parseInt(pin.attr("data-icon-size"));

                if (icon_img != "") {
                    var icon = {
                        url: pin.attr("data-icon")
                    };

                    if (iconSize) {

                        icon.scaledSize = new google.maps.Size(iconSize, iconSize);
                        icon.origin = new google.maps.Point(0, 0);
                        icon.anchor = new google.maps.Point(iconSize / 2, iconSize);
                    }
                }



                // create marker
                var marker = new google.maps.Marker({
                    position: latlng,
                    map: map,
                    icon: icon
                });


                // add to array
                map.markers.push(marker);

                rr_addonsMapMarkers.push(marker);

                //Used with Carousel Custom Navigation option
                if (customID) {
                    google.maps.event.addListener(marker, "click", function () {
                        console.log(customID);
                        var $carouselWidget = $(".rr-addons-carousel-wrapper");

                        if ($carouselWidget.length) {
                            $carouselWidget.map(function (index, item) {
                                var carouselSettings = $(item).data("settings");

                                if (carouselSettings.navigation) {
                                    if (-1 != carouselSettings.navigation.indexOf("#" + customID)) {
                                        var slideIndex = carouselSettings.navigation.indexOf("#" + customID);
                                        $(item).find(".rr-addons-carousel-inner").slick("slickGoTo", slideIndex);
                                    }
                                }
                            })

                        }

                    });
                }

                // if marker contains HTML, add it to an infoWindow
                if (
                    pin.find(".rr-addons-maps-info-title").html() ||
                    pin.find(".rr-addons-maps-info-desc").html()
                ) {
                    // create info window
                    var infowindow = new google.maps.InfoWindow({
                        maxWidth: maxWidth,
                        content: pin.html()
                    });
                    if (autoOpen) {
                        infowindow.open(map, marker);
                    }
                    if (hoverOpen) {
                        google.maps.event.addListener(marker, "mouseover", function () {
                            infowindow.open(map, marker);
                        });
                        if (hoverClose) {
                            google.maps.event.addListener(marker, "mouseout", function () {
                                infowindow.close(map, marker);
                            });
                        }
                    }
                    // show info window when marker is clicked
                    google.maps.event.addListener(marker, "click", function () {

                        //Used with Carousel Custom Navigation option
                        if (customID) {

                            var $carouselWidget = $(".rr-addons-carousel-wrapper");

                            if ($carouselWidget.length) {
                                $carouselWidget.map(function (index, item) {
                                    var carouselSettings = $(item).data("settings");

                                    if (carouselSettings.navigation) {
                                        if (-1 != carouselSettings.navigation.indexOf("#" + customID)) {
                                            var slideIndex = carouselSettings.navigation.indexOf("#" + customID);
                                            $carouselWidget.find(".rr-addons-carousel-inner").slick("slickGoTo", slideIndex);
                                        }
                                    }
                                })

                            }

                        }
                        infowindow.open(map, marker);
                    });
                }
            }

            if (markerCluster) {
                var markerCluster = new MarkerClusterer(rr_addonsMap, rr_addonsMapMarkers, {
                    imagePath:
                        "https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/m"
                });
            }
        }
    );
});
