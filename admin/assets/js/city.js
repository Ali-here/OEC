/**
* Pakistan Provinces & Cities/Municipalities on HTML Dropdown
*
* @ version 1.0.0
* @ author Marvic R. Macalintal
*/
var cities = {
	'Khyber Pukhtoon Khwa': [
		'Abbottabad', "Adezai", 'Alpuri', 'Akora Khattak', 'Ayubia', 'Banda Daud Shah',
		'Bannu', 'Batkhela', 'Battagram', 'Birote', 'Chakdara', 'Charsadda', 'Chitral', 'Daggar', 'Dargai',
		'Darya Khan', 'Dera Ismail Khan', 'Doaba', 'Dir', 'Drosh', 'Hangu', 'Haripur', 'Karak', 'Kohat',
		'Kulachi', 'Lakki Marwat', 'Latamber', 'Madyan', 'Mansehra', 'Mardan', 'Mastuj', 'Mingora', 'Nowshera',
		'Paharpur', 'Pabbi', 'Peshawar', 'Saidu Sharif', 'Shorkot', 'Shewa Adda', 'Swabi', 'Swat', 'Tangi', 'Tank',
		'Thall', 'Timergara', 'Tordher'

	],

	'Punjab': [
		'Bahawalpur', 'Bahawalnagar', 'Rahim Yar Khan', 'Gujranwala', 'Gujrat', 'Hafizabad', 'Mandi Bahauddin', 'Narowal', 'Sialkot',
		'Rawalpindi', 'Jhelum', 'Chakwal', 'Attock', , 'Dera Ghazi Khan', 'Layyah,', 'Muzaffargarh', 'Rajanpur',
		'Lahore', 'Kasur', 'Nankana Sahib', 'Sheikhupura', 'Sahiwal', 'Pakpattan', 'Okara', 'Faisalabad', 'Chiniot', 'Toba Tek Singh',
		'Jhang', 'Multan', 'Lodhran', 'Khanewal', 'Vehari', 'Sargodha', 'Khushab', 'Mianwali', 'Bhakkar'

	],



	'Balochistan': [
		'Awaran', 'Barkhan', 'Bolan', 'Chagai', 'Dera Bugti', 'Gwadar', 'Jafarabad', 'Jhal Magsi', 'Kalat',
		'Kharan', 'Kohlu', 'Khuzdar', 'Qilla Abdullah', 'Qilla Saifullah', 'Lasbela', 'Loralai', 'Mastung',
		'Musakhel', 'Nasirabad', 'Panjgur', 'Pishin', 'Quetta', 'Sibi', 'Turbat or Kech', 'Zhob', 'Ziarat'
	],

	'Sindh': [
		'Badin', 'Benazeerabad', 'Nawabshah', 'Dadu', 'Jacobabad', 'Jamshoro', 'Karachi', 'Kashmor', 'Khairpur',
		'Larkana', 'Mirpur Khas', 'Tharparkar', 'Noshahro Feroz', 'Qambar Shahdadkot', 'Sanghar', 'Shikarpur',
		'Sukkur', 'Tando Muhammad Khan', 'Tando Allah Yaar', 'Thatta', 'Hyderabad'
	],

}


var City = function () {

	this.p = [], this.c = [], this.a = [], this.e = {};
	window.onerror = function () { return true; }

	this.getProvinces = function () {
		for (let province in cities) {
			this.p.push(province);
		}
		return this.p;
	}
	this.getCities = function (province) {
		if (province.length == 0) {
			console.error('Please input province name');
			return;
		}
		for (let i = 0; i <= cities[province].length - 1; i++) {
			this.c.push(cities[province][i]);
		}
		return this.c;
	}
	this.getAllCities = function () {
		for (let i in cities) {
			for (let j = 0; j <= cities[i].length - 1; j++) {
				this.a.push(cities[i][j]);
			}
		}
		this.a.sort();
		return this.a;
	}
	this.showProvinces = function (element) {
		var str = '<option selected disabled>Select Province</option>';
		for (let i in this.getProvinces()) {
			str += '<option>' + this.p[i] + '</option>';
		}
		this.p = [];
		document.querySelector(element).innerHTML = '';
		document.querySelector(element).innerHTML = str;
		this.e = element;
		return this;
	}
	this.showCities = function (province, element) {
		var str = '<option selected disabled>Select City / Municipality</option>';
		var elem = '';
		if ((province.indexOf(".") !== -1 || province.indexOf("#") !== -1)) {
			elem = province;
		}
		else {
			for (let i in this.getCities(province)) {
				str += '<option>' + this.c[i] + '</option>';
			}
			elem = element;
		}
		this.c = [];
		document.querySelector(elem).innerHTML = '';
		document.querySelector(elem).innerHTML = str;
		document.querySelector(this.e).onchange = function () {
			var Obj = new City();
			Obj.showCities(this.value, elem);
		}
		return this;
	}
}
