		document.querySelector("#Bouton").onclick = function() {
		document.querySelector("#tonDiv").style.display=(window.getComputedStyle(document.querySelector('#tonDiv')).display=='none') ? "block" : "none";
		}

		document.querySelector("#Bouton2").onclick = function() {
		document.querySelector("#tonDiv2").style.display=(window.getComputedStyle(document.querySelector('#tonDiv2')).display=='none') ? "block" : "none";
		}

		document.querySelector("#ecn").onclick = function() {
		document.querySelector("#container").style.display=(window.getComputedStyle(document.querySelector('#container')).display=='none') ? "block" : "none";
		}

		document.querySelector("#ecnmed").onclick = function() {
		document.querySelector("#container2").style.display=(window.getComputedStyle(document.querySelector('#container2')).display=='none') ? "block" : "none";
		}
