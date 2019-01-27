var modules = {};

$(document).ready(function() {

	modules.app.run();
});

modules.form = (() => {

	let avBox = document.getElementById("available-cr");

	let criterions = [];

	let newCriterion = (name, imgsrc) => {

		var c = document.createElement("a");
		c.className = "border job-item d-block d-md-flex align-items-center border-bottom freelance";
		c.setAttribute("id", "criterion-el-" + name.split(' ').join('-'))
		//c.setAttribute("draggable", "true");
		//c.setAttribute("ondragstart", "drag(event)");
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

	return {
		newCriterion
	}
})();

modules.map = (() => {

	let init = () => {

		// initialize the map
		var map = L.map('map-preview').setView([3.087025, 45.777222], 10);

		  // load a tile layer
		  L.tileLayer('http://tiles.mapc.org/basemap/{z}/{x}/{y}.png',
		    {
		      attribution: 'Tiles by <a href="http://mapc.org">MAPC</a>, Data by <a href="http://mass.gov/mgis">MassGIS</a>',
		      maxZoom: 17,
		      minZoom: 9
		    }).addTo(map);

		  // initialize the map
		  var map2 = L.map('map-result').setView([3.087025, 45.777222], 10);

		  // load a tile layer
		  L.tileLayer('http://tiles.mapc.org/basemap/{z}/{x}/{y}.png',
		    {
		      attribution: 'Tiles by <a href="http://mapc.org">MAPC</a>, Data by <a href="http://mass.gov/mgis">MassGIS</a>',
		      maxZoom: 17,
		      minZoom: 9
		    }).addTo(map2);
	}

	

	return {
		init
	}
})();

modules.app = (() => {

	let run = () => {

		modules.map.init();
		modules.form.newCriterion("Gares ferroviaires", "images/icons/pollution.png");
		modules.form.newCriterion("Autre critère", "images/icons/pollution.png");
		dragula([document.getElementById("list-criterions"), document.getElementById("available-cr")]);
	}

	return {
		run
	}
})();