

var GoogleMapHandler = function(container, mapOptions) {

    if (typeof google != 'object' && typeof google.maps != 'object') {
        throw new Exception("Google Maps API is not properly loaded");
    }


    var defaultMapOptions = {
        mapTypeId: google.maps.MapTypeId.HYBRID,
        //Controls
        panControl: true,
        zoomControl: true,
        mapTypeControl: true,
        scaleControl: false,
        streetViewControl: true,
        overviewMapControl: false
    }

    if (typeof container == 'string') {
        container = jq("#" + container);
    }
    mapOptions = mapOptions || {};

    this.mapOptions = jq.extend({}, defaultMapOptions, mapOptions);
    this.container = container;
    this.gMap = new google.maps.Map(this.container.get(0), this.mapOptions);
    this.geocoder = new google.maps.Geocoder();
    this.infoWindow = new google.maps.InfoWindow();
    this.bounds = new google.maps.LatLngBounds();
    this.markerSemaphore = 0;
    
    this.icons = {
        'default': {
            url: "http://maps.google.com/mapfiles/marker.png",
            size: new google.maps.Size(20, 34),
            anchor: new google.maps.Point(9, 34)
        },
        'lettered': {
            url: "http://www.google.com/mapfiles/marker#letter#.png",
            size: new google.maps.Size(20, 34),
            anchor: new google.maps.Point(9, 34)
        },
        'infarm': {
            url: "https://chart.googleapis.com/chart?chst=d_map_spin&chld=0.6|0|1FBCFF|16|b|",
            size: new google.maps.Size(23, 41),
            anchor: new google.maps.Point(9, 41)
        },
        'lettered-infarm': {
            url: "https://chart.googleapis.com/chart?chst=d_map_spin&chld=0.6|0|1FBCFF|16|b|#letter#",
            size: new google.maps.Size(23, 41),
            anchor: new google.maps.Point(9, 34)
        }
    };

};

GoogleMapHandler.EVENT_GEOCODER_SEARCH_COMPLETE = "google-geocoder-search-complete";

GoogleMapHandler.isGoogleMapAvailable = function() {
    return (typeof google.maps == "object");
};


GoogleMapHandler.prototype = {
    refreshMap: function() {
        this.gMap = new google.maps.Map(this.container.get(0), this.mapOptions);
    },
    geocode: function(address, callback) {
        address = address || this.getFullAddress();

        var geocodeRequest = {
            address: this._normalizeAddressForGeocoder(address)
//            latLng: LatLng,
//            bounds: LatLngBounds,
//            region: string
        };

        callback = callback || this._geocoderResponseCallback.bind(this);


        this.geocoder.geocode(geocodeRequest, callback);
    },
    getGMap: function() {
        return this.gMap;
    },
    getGeocoder: function() {
        return this.geocoder;
    },
    getInfoWindow : function(){
        return this.infoWindow;
    },
    setCenter: function(point){
        this.gMap.setCenter(point);
        this.gMap.setZoom(17);
    },            
    setCenterAndPlaceMarker: function(point, marker) {
        this.gMap.setCenter(point);
        this.gMap.setZoom(17);
        this.placeMarker(point,marker);

    },
    placeMarker : function(point,marker){
        marker.setPosition(point);
        marker.setMap(this.gMap);
    },
    geocodeAndSetCenter : function(address , zoom){
        var self=this;
        this.geocode(address , function(results,status){
           if(status == google.maps.GeocoderStatus.OK){
               var bestResult = results[0];
               self.gMap.setCenter(bestResult.geometry.location);
               self.gMap.setZoom(zoom);
           } 
        });
    },
    geocodeAndSetMarkerOnCenter: function(address, marker) {
        var self = this;
        this.geocode(address, function(results, status) {

            if (status == google.maps.GeocoderStatus.OK) {
                var result = results[0];
                self.gMap.setCenter(result.geometry.location);
                self.gMap.setZoom(17);
                marker.setPosition(result.geometry.location);
                marker.setMap(self.gMap);
            }
        });
    },
    geocodeAndSetMarkerOnCenterZoom: function(address, marker, zoom) {
        var self = this;
        this.geocode(address, function(results, status) {

            if (status == google.maps.GeocoderStatus.OK) {
                var result = results[0];
                self.gMap.setCenter(result.geometry.location);
                self.gMap.setZoom(zoom);
                marker.setPosition(result.geometry.location);
                marker.setMap(self.gMap);
            }
        });
    },
    
    geocodeAndPlaceMarker: function(address, marker) {
        this.markerSemaphore++;
        var self = this;
        this.geocode(address, function(results, status) {

            if (status == google.maps.GeocoderStatus.OK) {
                var result = results[0];
                
                self.bounds.extend(result.geometry.location);
                
                marker.setPosition(result.geometry.location);
                marker.setMap(self.gMap);
                
                self.markerSemaphore--;
                
                if(self.markerSemaphore == 0){
                    self.fitBounds();
                }
                
            }
        });
    },
    createMarker: function(message, icon) {



        if (!(typeof icon == "object")) {
            icon = this.getDefaultIcon();
        }

        // Set up our GMarkerOptions object
        var markerOptions = {
            icon: icon,
            shadow: {
                url: "http://www.google.com/mapfiles/shadow50.png",
                size: new google.maps.Size(37, 34),
                anchor: icon.anchor
            }
        };

        var marker = new google.maps.Marker(markerOptions);
        var self = this;
        marker.addListener("click", function(ev, target) {

            self.infoWindow.setContent(message);
            self.infoWindow.open(marker.getMap(), marker);
        });
        return marker;

    },
    getIcon: function(iconCode, params) {
        if (iconCode in this.icons) {
            return jq.extend({}, this.icons[iconCode]);
        }
    },
    getDefaultIcon: function() {
        return this.getIcon('default');
    },
    getInfarmIcon: function() {
        return this.getIcon('infarm');
    },
    getLetteredIcon: function(letterIndex) {
        var icon;
        
        if (letterIndex > 26){
            icon=this.getDefaultIcon();
        }else{
            var chara = String.fromCharCode("A".charCodeAt(0) + letterIndex - 1);
            icon=this.getIcon('lettered');
            icon.url = icon.url.replace("#letter#", chara);
        }
        
        return icon;
    },
    getInfarmLetteredIcon: function(letterIndex) {
        var icon;
        var chara;
        if (letterIndex <= 26){
            chara = String.fromCharCode("A".charCodeAt(0) + letterIndex - 1);
        }else{
            chara = letterIndex;
        }
        
        icon=this.getIcon('lettered-infarm');
        icon.url = icon.url.replace("#letter#", chara);
            
        return icon;
    },
    getBounds: function(){
        return this.bounds;
    },
    fitBounds: function(){
        this.gMap.fitBounds(this.bounds);
    },
    _normalizeAddressForGeocoder: function(address) {
        return address.replace(/\r|\n|\r\n/g, "");
    },
    _geocoderResponseCallback: function(geocoderResults, status) {
        if (status == google.maps.GeocoderStatus.OK) {
            for (var i in geocoderResults) {
                var result = geocoderResults[i];

                var geometry = result.geometry;

                this.refreshMap();

                this.gMap.setCenter(geometry.location);

                this.gMap.setZoom(15);
                this.gMap.fitBounds(geometry.viewport);

                var marker = new google.maps.Marker({
                    map: this.gMap,
                    position: geometry.location
                });

                break;
            }
        }

        jq.event.trigger({
            type: GoogleMapHandler.EVENT_GEOCODER_SEARCH_COMPLETE,
            geocoderResults: geocoderResults,
            status: status
        });
    }
};