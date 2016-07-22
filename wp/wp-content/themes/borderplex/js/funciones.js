// @codekit-prepend "libs/jquery.js", "libs/jquery.bxslider.js", "libs/picturefill.js", "libs/lazysizes.min.js"

// Codigo js para página Borderplex

/*

var	body = document.body,
	html = document.documentElement;
var alto_ventana = Math.max( body.scrollHeight, body.offsetHeight, html.clientHeight, html.scrollHeight, html.offsetHeight );
var alto = isNaN(window.innerHeight) ? window.clientHeight : window.innerHeight;
var top = (window.pageYOffset || doc.scrollTop)  - (doc.clientTop || 0);

Array.prototype.forEach.call(links, function(el, i)
{
	el.classList.add("someClass");
	el.classList.remove("someClass");
});

elem.onclick = function()
{ };

setInterval(function()
{ },3000);

variable = (condition) ? true-value : false-value;

function getOffsetTop( obj )
{
	var curtop = 0;
	if (obj.offsetParent) {
		do {
			curtop += obj.offsetTop;
		} while (obj = obj.offsetParent);
		return curtop;
	}
}

function insertAfter(newNode, referenceNode)
{
	referenceNode.parentNode.insertBefore(newNode, referenceNode.nextSibling);
}

function hasClass(el, cls)
{
	return el.className && new RegExp("(\\s|^)" + cls + "(\\s|$)").test(el.className);
}
*/

document.createElement( "picture" );

function carruseles(){
	$(".js--home--carrusel").bxSlider({
		auto: true,
		controls: false
	});
}

function links_map() {
	var map = {};

	map.cruces = document.querySelectorAll(".js--map");

	Array.prototype.forEach.call(map.cruces, function(el) {

		var link = {};
		link.href = el.getAttribute('data-link');
		
		el.addEventListener('click', function(){
			console.log(link.href);
		});

	});

}

document.addEventListener('DOMContentLoaded', function(){
	carruseles();
	links_map();
});