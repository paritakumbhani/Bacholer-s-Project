var EOSearcher = Class.create({
    initialize: function(containerId, jsonDataUrl, dataSession) {

        this.container = jq("#" + containerId);
        this.jsonData = null;
        this.form = this.container.find("form");

        this.locationSelect = this.form.find("select[name=location]");
        this.citySelect = this.form.find("select[name=city]");
        this.serviceSelect = this.form.find("select[name=service]");
        this.submitButton = this.form.find(".searcher-submit-button");

        this.defaultLocationLabel = "Select the location";
        this.defaultCityLabel = "Select the city";
        this.defaultServiceLabel = "What service?";

        this.currentLocation = null;
        this.currentCity = null;
        this.currentService = null;
               
        this.loaded = false;
        this._getJsonData(jsonDataUrl);
        
        this.selectedLocation = dataSession[0];
        this.selectedCity = dataSession[1];
        this.selectedService = dataSession[2];
        
        
       /* if(dataSession.length){
            this.setDataSession(dataSession);           
        }*/
        

    },
    _onJsonDataLoaded: function(jsonData) {
        EOSearcher.jsonData = jsonData;
        this.jsonData = jsonData;

        this._populateSelects();
        this._bindEvents();

        this.loaded = true;
    },
    _getJsonData: function(jsonDataUrl) {
        if (typeof EOSearcher.jsonData !== 'object') {
            jq.getJSON(jsonDataUrl, function(jsonData) {
                this._onJsonDataLoaded(jsonData);
            }.bind(this));
        } else {
            this._onJsonDataLoaded(this.jsonData);
        }
    },
    _populateSelects: function() {
        var locations = this.jsonData.locations;
        var cities = this.jsonData.cities;
        var services = this.jsonData.services;

        this._populateSelect(locations, this.locationSelect, this.defaultLocationLabel);
        this._populateSelect(cities, this.citySelect, this.defaultCityLabel);
        this._populateSelect(services, this.serviceSelect, this.defaultServiceLabel);
        
        this.setDataSession();
        
    },
    _populateSelect: function(items, select, defaultValueLabel, visibleItems) {

        var selectedValue = select.val();

        select.get(0).options.length = 1;
        for (var i = 0; i < items.length; i++) {

            if (jq.isArray(visibleItems) && visibleItems.indexOf(items[i].id) == -1) {
                continue;
            } else {
                this._addOptionToSelect(items[i].id, items[i].name, select);
            }
        }
        select.val(selectedValue);
    },
    _addOptionToSelect: function(value, label, select) {
        select.append(jq("<option/>").attr("value", value).text(label));
    },
    _bindEvents: function() {
        var self = this;
        this.locationSelect.change(this.onLocationChange.bind(this));
        this.citySelect.change(this.onCityChange.bind(this));
        this.serviceSelect.change(this.onServiceChange.bind(this));
        this.submitButton.click(this.submit.bind(this));
    },
    onLocationChange: function() {
        this.currentLocation = null;
        if (this.locationSelect.val() != '') {
            this.currentLocation = this._getLocation(this.locationSelect.val());
        }

        this.update();
    },
    setDataSession:function(){           
        this.locationSelect.find("option[value='"+this.selectedLocation+"']").attr('selected', 'selected');
        this.onLocationChange();
        this.citySelect.find("option[value='"+this.selectedCity+"']").attr('selected', 'selected');
        this.onCityChange();
        this.serviceSelect.find("option[value='"+this.selectedService+"']").attr('selected', 'selected');
        this.onServiceChange();
    },
    
    onCityChange: function() {
        this.currentCity = null;

        if (this.citySelect.val() != '') {
            this.currentCity = this._getCity(this.citySelect.val());
        }

        this.update();
    },
    onServiceChange: function() {
        this.currentService = null;

        if (this.serviceSelect.val() != '') {
            this.currentService = this._getService(this.serviceSelect.val());
        }
    },
    update: function() {
        var visibleCityIds = null;
        var visibleServiceIds = null;

        var refreshCitySelect = false;
        var refreshServiceSelect = false;
        if (this.currentLocation != null) {
            //alert('aggiorno per location');
            visibleCityIds = this.currentLocation.cities;
            visibleServiceIds = this._getLocationServices(this.currentLocation.id);
            refreshCitySelect = true;
            refreshServiceSelect = true;
        }
        if (this.currentCity != null) {
            visibleServiceIds = this.currentCity.services;
            refreshCitySelect = false;
            refreshServiceSelect = true;
        }
        // this._populateSelect(this.jsonData.locations, this.locationSelect, this.defaultLocationLabel);
        this._populateSelect(this.jsonData.cities, this.citySelect, this.defaultCityLabel, visibleCityIds);

        this._populateSelect(this.jsonData.services, this.serviceSelect, this.defaultServiceLabel, visibleServiceIds);


    },
    _refreshCities: function() {


        if (this.currentLocation != null) {
            this.citySelect.find("option[value!='']").hide();

            //  this._enableSelect(this.citySelect);
            var cityIds = this.currentLocation.cities;

            for (var i = 0; i < cityIds.length; i++) {
                this.citySelect.find("option[value=" + cityIds[i] + "]").css('display', '');
            }

        } else {
            this.citySelect.find("option[value!='']").show();

            //this._disableSelect(this.citySelect);
            //this._disableSelect(this.serviceSelect);
        }

        this.citySelect.val('').change();
    },
    _refreshServices: function() {
        this.serviceSelect.val('');

        var serviceIds = new Array();
        if (this.currentCity != null) {
            serviceIds = this.currentCity.services;
            //this._enableSelect(this.serviceSelect);

        }
        else if (this.currentLocation != null) {
            serviceIds = this._getLocationServices(this.currentLocation.id);
        }
        if (serviceIds.length > 0) {
            this.serviceSelect.find("option[value!='']").hide();

            for (var i = 0; i < serviceIds.length; i++) {
                this.serviceSelect.find("option[value=" + serviceIds[i] + "]").show();
            }
        } else {
            this.serviceSelect.find("option[value!='']").show();
        }

    },
    _getLocation: function(id) {
        return this._getItemById(id, this.jsonData.locations);
    },
    _getCity: function(id) {
        return this._getItemById(id, this.jsonData.cities);
    },
    _getService: function(id) {
        return this._getItemById(id, this.jsonData.services);
    },
    _getItemById: function(id, items) {
        for (var i = 0; i < items.length; i++) {
            if (items[i].id == id) {
                return items[i];
            }
        }
        return null;
    },
    _getLocationServices: function(locationId) {
        var location = this._getLocation(locationId);
        var services = new Array();
        for (var i = 0; i < location.cities.length; i++) {
            var city = this._getCity(location.cities[i]);
            services = services.concat(city.services);
        }
        return services;
    },
    _disableSelect: function(select) {
        select.attr("disabled", "disabled").addClass("disabled");
    },
    _enableSelect: function(select) {
        select.removeAttr("disabled").removeClass("disabled");
    },
    validate: function() {
        if (this.currentCity != null) {
            //this.form.attr("action", this.currentCity.url);
        }
        else if (this.currentLocation != null) {
            // this.form.attr("action", this.currentLocation.url);
        } else {
            alert("Select at least the location");
            return false;
        }
        return true;
    },
    submit: function() {
        if (this.loaded && this.validate()) {
            this.form.submit();
        }
    }

});