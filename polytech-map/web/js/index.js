var modules = {};

$(document).ready(function() {

	modules.app.run();
});

modules.form = (() => {

	let avBox = document.getElementById("available-cr");

	let criterions = [];
	let applied = [];

	let newCriterion = (name, imgsrc) => {

		var c = document.createElement("a");
		c.className = "border job-item d-block d-md-flex align-items-center border-bottom freelance";
		c.setAttribute("id", "criterion-el-" + name.split(' ').join('-'));
		c.setAttribute("criterion-name", name);
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

	return {
		newCriterion,
		apply,
		applied: () => applied.slice()
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
		      attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, <a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
		      maxZoom:109,
		      minZoom: 5,
    		  id: 'mapbox.streets',
		      token: "pk.eyJ1IjoiZmx5bm5zcCIsImEiOiJjamZ1eDMzeWcwdWNsMzRxcW13emE0eDV4In0.ISjzHgiemEAyrgxIlqFRfw"
		    }).addTo(map);

		  // initialize the map
		  var map2 = L.map('map-result').setView([46.8000, 2.3522], 5);

		  // load a tile layer
		  L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token={token}',
		    {
		      attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, <a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
		      maxZoom: 10,
		      minZoom: 5,
    		  id: 'mapbox.streets',
		      token: "pk.eyJ1IjoiZmx5bm5zcCIsImEiOiJjamZ1eDMzeWcwdWNsMzRxcW13emE0eDV4In0.ISjzHgiemEAyrgxIlqFRfw"
		    }).addTo(map2);

		    //'https://tiles.mapc.org/basemap/{z}/{x}/{y}.png'
		    //maxZoom: 17
		    //minZoom: 9
	}

	let focus = (latlng) => {

		map.setView(latlng, 8);
	}

	let compute = (latlng, geojson) => {

		map.setView(latlng, 8);
		L.geoJSON(geojson).addTo(map2);
	}

	

	return {
		init,
		focus,
		compute
	}
})();

modules.app = (() => {

	let run = () => {

		modules.map.init();
		modules.form.newCriterion("Gares ferroviaires", "images/icons/pollution.png");
		modules.form.newCriterion("Autre critère", "images/icons/pollution.png");
		//dragula([document.getElementById("list-criterions"), document.getElementById("available-cr")]);
	}

	return {
		run
	}
})();