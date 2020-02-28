/**
 * url is the URL of NextGenAPI Address URL taken from plgin configuration
 * street_field_id, plz_field_id, city_field_id, country_field_id field ids for street, postal code, city, country Fields 
 * 
 * This uses Easy Autocomplete JS. Please check: http://easyautocomplete.com/guide#sec-include to modify this script as per your needs if needed
 * 
 */

var apiurl = url;

var plzoptions = {
	url: function (phrase) {
		if(phrase.length>0){
			var street_value = (typeof jQuery(street_field_id).val() == 'undefined') ? '': jQuery(street_field_id).val();
			var plz_value = (typeof jQuery(plz_field_id).val() == 'undefined') ? '': jQuery(plz_field_id).val();
			var city_value = (typeof jQuery(city_field_id).val() == 'undefined') ? '': jQuery(city_field_id).val();
			var country_value = (typeof jQuery(country_field_id).val() == 'undefined') ? 'DE': jQuery(country_field_id).val();
			return apiurl +  '?street=' + street_value+ '&plz=' +  plz_value +'&city=' + city_value + "&country" +country_value; 
		}

	}, getValue: function(element){
		return element.plz;	
	},
	requestDelay: 300,
	list: {
		showAnimation: {
			type: "fade", //normal|slide|fade
			time: 400,
			callback: function() {}
		},

		hideAnimation: {
			type: "slide", //normal|slide|fade
			time: 400,
			callback: function() {}
		},
		onClickEvent: function() {
			var sel = jQuery(plz_field_id).getSelectedItemData();

			jQuery(street_field_id).val(sel.street).trigger("change");
			jQuery(plz_field_id).val(sel.plz).trigger("change");
			jQuery(city_field_id).val(sel.city).trigger("change");
		}	
	}
};

var streetoptions = {
	url: function (phrase) {
		if(phrase.length>0){
			var street_value = (typeof jQuery(street_field_id).val() == 'undefined') ? '': jQuery(street_field_id).val();
			var plz_value = (typeof jQuery(plz_field_id).val() == 'undefined') ? '': jQuery(plz_field_id).val();
			var city_value = (typeof jQuery(city_field_id).val() == 'undefined') ? '': jQuery(city_field_id).val();
			var country_value = (typeof jQuery(country_field_id).val() == 'undefined') ? 'DE': jQuery(country_field_id).val();
			return apiurl +  '?street=' + street_value+ '&plz=' +  plz_value +'&city=' + city_value + "&country" +country_value; 
		}

	}, getValue: function(element){
		return element.street + ' ' + element.plz + ' ' + element.city;	
	},
	requestDelay: 300,
	list: {
		showAnimation: {
			type: "fade", //normal|slide|fade
			time: 400,
			callback: function() {}
		},

		hideAnimation: {
			type: "slide", //normal|slide|fade
			time: 400,
			callback: function() {}
		},
		onClickEvent: function() {
			var sel = jQuery(street_field_id).getSelectedItemData();

			jQuery(street_field_id).val(sel.street).trigger("change");
			jQuery(plz_field_id).val(sel.plz).trigger("change");
			jQuery(city_field_id).val(sel.city).trigger("change");
		}	
	}
};


var cityoptions = {
		url: function (phrase) {
			if(phrase.length>0){
				var street_value = (typeof jQuery(street_field_id).val() == 'undefined') ? '': jQuery(street_field_id).val();
				var plz_value = (typeof jQuery(plz_field_id).val() == 'undefined') ? '': jQuery(plz_field_id).val();
				var city_value = (typeof jQuery(city_field_id).val() == 'undefined') ? '': jQuery(city_field_id).val();
				var country_value = (typeof jQuery(country_field_id).val() == 'undefined') ? 'DE': jQuery(country_field_id).val();
				return apiurl +  '?street=' + street_value+ '&plz=' +  plz_value +'&city=' + city_value + "&country" +country_value; 
			}
	
		}, getValue: function(element){
			return element.city;	
		},
		requestDelay: 300,
		list: {
			showAnimation: {
				type: "fade", //normal|slide|fade
				time: 400,
				callback: function() {}
			},

			hideAnimation: {
				type: "slide", //normal|slide|fade
				time: 400,
				callback: function() {}
			}	
		}
	};

jQuery(street_field_id).easyAutocomplete(streetoptions);
jQuery(plz_field_id).easyAutocomplete(plzoptions);
jQuery(city_field_id).easyAutocomplete(cityoptions);

