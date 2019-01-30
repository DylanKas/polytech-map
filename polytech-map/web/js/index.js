var modules = {};

$(document).ready(function() {

	modules.app.run();
});

modules.form = (() => {

	let library = {};

	let avBox = document.getElementById("available-cr");

	let criterions = [];
	let applied = [];

	let init = (lib) => {

		library = lib;
		Object.keys(lib).forEach(key => newCriterion(key, lib[key].name, lib[key].img));
	}

	let newCriterion = (id, name, imgsrc) => {

		var c = document.createElement("a");
		c.className = "border job-item d-block d-md-flex align-items-center border-bottom freelance";
		c.setAttribute("id", "criterion-el-" + name.split(' ').join('-'));
		c.setAttribute("criterion-id", id);
		c.setAttribute("draggable", "true");
		c.setAttribute("ondragstart", "drag(event)");
		//c.setAttribute("onmousedown", "select(event)");
		//c.setAttribute("onmousemove", "move(event)");
		var imgwrap = document.createElement("div");
		imgwrap.className = "company-logo blank-logo text-center text-md-left pl-3";
		var cimg = document.createElement("img");
		cimg.className = "img-fluid mx-auto";
		cimg.src = imgsrc;
		cimg.alt = "Image";
		imgwrap.append(cimg);
		c.append(imgwrap);
		var cmain = document.createElement("div");
		cmain.className = "job-details h-100";
		var namewrap = document.createElement("div");
		namewrap.className = "p-3 align-self-center";
		var cname = document.createElement("h3");
		cname.textContent = name;
		namewrap.append(cname);
		c.append(namewrap);
		avBox.append(c);
		criterions.push(c);
	}

	let apply = (name) => {

		applied.push(name);
	}

	let unapply = (name) => {

		var index = applied.indexOf(name);
		if (index !== -1) {
		    applied.splice(index, 1);
		}
	}

	let getCriterion = (id) => library[id];

	return {
		init,
		apply,
		unapply,
		getCriterion,
		applied: () => applied.slice()
	}
})();

modules.score = (() => {

	let scoreMain = document.getElementById("score-main");
	let scoreData = document.getElementById("score-data");

	compute = (data) => {

		scoreData.innerHTML = "";
		scoreMain.innerHTML = data.scoretotal;
		Object.keys(data.criteres).forEach(key => {
			let crit = modules.form.getCriterion(key);
			addScoreData(key, crit.name, crit.img, data.criteres[key].score);
		});
	}

	addScoreData = (id, name, imgsrc, result) => {

		var c = document.createElement("a");
		c.className = "border job-item d-block d-md-flex align-items-center border-bottom freelance";
		c.setAttribute("id", "criterion-result-el-" + name.split(' ').join('-'));
		var imgwrap = document.createElement("div");
		imgwrap.className = "company-logo blank-logo text-center text-md-left pl-3";
		var cimg = document.createElement("img");
		cimg.className = "img-fluid mx-auto";
		cimg.src = imgsrc;
		cimg.alt = "Image";
		imgwrap.append(cimg);
		c.append(imgwrap);
		var cmain = document.createElement("div");
		cmain.className = "job-details h-100";
		var namewrap = document.createElement("div");
		namewrap.className = "p-3 align-self-center";
		var cname = document.createElement("h3");
		cmain.className = "score-main";
		cname.textContent = result;
		namewrap.append(cname);
		c.append(namewrap);
		scoreData.append(c);
	}

	return {

		compute
	}
})();

modules.map = (() => {

	var map, map2;

	let init = () => {

		// initialize the map
		map = L.map('map-preview').setView([46.8000, 2.3522], 5);

		  // load a tile layer
		  L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token={token}',
		    {
		      attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors',
		      maxZoom: 13,
		      minZoom: 5,
    		  id: 'mapbox.streets',
		      token: "pk.eyJ1IjoiZmx5bm5zcCIsImEiOiJjamZ1eDMzeWcwdWNsMzRxcW13emE0eDV4In0.ISjzHgiemEAyrgxIlqFRfw"
		    }).addTo(map);

		  // initialize the map
		  map2 = L.map('map-result').setView([46.8000, 2.3522], 5);

		  // load a tile layer
		  L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token={token}',
		    {
		      attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, <a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
		      maxZoom: 17,
		      minZoom: 5,
    		  id: 'mapbox.streets',
		      token: "pk.eyJ1IjoiZmx5bm5zcCIsImEiOiJjamZ1eDMzeWcwdWNsMzRxcW13emE0eDV4In0.ISjzHgiemEAyrgxIlqFRfw"
		    }).addTo(map2);

		    //'https://tiles.mapc.org/basemap/{z}/{x}/{y}.png'
		    //maxZoom: 17
		    //minZoom: 9
	}

	let focus = (latlng) => {

		map.setView(latlng, 13);
	}

	let compute = (latlng, data) => {

		/*map2.eachLayer(function (layer) {
		    map2.removeLayer(layer);
		});*/

		map2.setView(latlng, 14);

      	Object.keys(data).forEach(key => {
      		var geojson = L.geoJSON(data[key], idToStyle(key));
			geojson.addTo(map2);
      	});
	}

	let idToStyle = (id) => {

		switch (id) {
		case "gare":
		case "pharmacy":
		case "library":
			return drawIcon(id, 27);
		case "post_office":
		case "ecole":
		case "bank":
		case "restaurant":
		case "cafe":
		case "fuel":
		case "parking":
		case "atm":
			return drawIcon(id, 18);
        default: return {}
		}
	}

	let drawIcon = (name, size) => {

		return {
	            pointToLayer: function(feature, coords) {
	                var smallIcon = new L.Icon({
					     iconSize: [size, size],
					     iconAnchor: [Math.floor(size/2), size],
					     popupAnchor:  [1, Math.floor(size*0.9)],
					     iconUrl: 'images/map/' + name + '.png'
					 });
	                return L.marker(coords, {icon: smallIcon});
	            }
	        }
	}

	

	return {
		init,
		focus,
		compute
	}
})();

modules.app = (() => {

	let run = () => {

		let library = {
			gare: { name: "Gares ferroviaires", img: "images/icons/station.png" },
			pharmacy: { name: "Pharmacies", img: "images/icons/pharmacy.png" },
			library: { name: "Bibliothèques", img: "images/icons/library.png" },
			post_office: { name: "Bureaux de poste", img: "images/icons/post_office.png" },
			ecole: { name: "Ecoles", img: "images/icons/school.png" },
			bank: { name: "Banques", img: "images/icons/bank.png" },
			restaurant: { name: "Restaurants", img: "images/icons/restaurant.png" },
			cafe: { name: "Cafés", img: "images/icons/cafe.png" },
			fuel: { name: "Stations d'essence", img: "images/icons/fuel.png" },
			parking: { name: "Parkings", img: "images/icons/parking.png" },
			atm: { name: "Distributeurs automatiques", img: "images/icons/atm.png" }
		}

		modules.map.init();
		modules.form.init(library);
		/*modules.form.newCriterion("gare", "Gares ferroviaires", "images/icons/station.png");
		modules.form.newCriterion("pharmacy", "Pharmacies", "images/icons/pharmacy.png");
		modules.form.newCriterion("library", "Bibliothèques", "images/icons/library.png");
		modules.form.newCriterion("post_office", "Bureaux de poste", "images/icons/post_office.png");
		modules.form.newCriterion("ecole", "Ecoles", "images/icons/school.png");
		modules.form.newCriterion("bank", "Banques", "images/icons/bank.png");
		modules.form.newCriterion("restaurant", "Restaurants", "images/icons/restaurant.png");
		modules.form.newCriterion("cafe", "Cafés", "images/icons/cafe.png");
		modules.form.newCriterion("fuel", "Stations d'essence", "images/icons/fuel.png");
		modules.form.newCriterion("parking", "Parkings", "images/icons/parking.png");
		modules.form.newCriterion("atm", "Distributeurs automatiques", "images/icons/atm.png");*/
		//modules.form.newCriterion("pollution", "Pollution", "images/icons/pollution.png");
	}

	return {
		run
	}
})();