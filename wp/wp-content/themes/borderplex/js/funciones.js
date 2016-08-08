// @codekit-prepend "libs/jquery.js", "libs/jquery.bxslider.js", "libs/picturefill.js", "libs/lazysizes.min.js"// Codigo js para página Borderplex

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

function insertAfter(newNode, referenceNode)
{
	referenceNode.parentNode.insertBefore(newNode, referenceNode.nextSibling);
}
*/

function has_Class(el, cls) {
	return el.className && new RegExp("(\\s|^)" + cls + "(\\s|$)").test(el.className);
}

function getOffsetTop( obj ) {
	var curtop = 0;
	if (obj.offsetParent) {
		do {
			curtop += obj.offsetTop;
		} while (obj = obj.offsetParent);
		return curtop;
	}
}

document.createElement( "picture" );

function acordeones() {
	var acordeones = document.querySelectorAll(".js--acordeon");

	Array.prototype.forEach.call( acordeones , function( acord ) {

		acord.addEventListener('click', function() {

			if ( has_Class(acord, 'activo') ) {
				acord.classList.remove("activo");
			} else {

				Array.prototype.filter.call( acord.parentNode.children, function( otro ){
					if ( otro !== acord && has_Class(otro, 'activo')) {
						otro.classList.remove("activo");
					}
				});

				acord.classList.add("activo");

				setTimeout(function () {
					$("html, body").animate({
						scrollTop: getOffsetTop(acord)
					}, 600);
				}, 200);
			}

		});

	});
}

function biographies() {
	var bios = document.querySelectorAll(".js--bio__moreBtn");

	Array.prototype.forEach.call( bios , function( bio ) {

		bio.addEventListener('click', function() {
			var estado = bio.getAttribute("data-estado");
			var texto = bio.querySelector("span");
			bio.nextElementSibling.classList.toggle("visible");

			if ( estado === "oculto" ) {
				bio.setAttribute("data-estado", 'visible');
				texto.innerText = 'Read Less';
			} else if ( estado === 'visible' ) {
				bio.setAttribute("data-estado", 'oculto');
				texto.innerText = 'Read More';
			}
		});

	});
}

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

function responsive() {
	var resp = {};

	resp.logo = document.querySelector(".js--header_logo");
	resp.menu = document.querySelector(".js--nav--top");
	resp.menuWrap = resp.menu.querySelector(".wrap");
	resp.checkbox = document.querySelector(".js--checkbox-hack__label");
	resp.navList = document.querySelector(".js--nav--top__list");

	if ( (screen.width <= 640 ) && ( resp.menu ) ) {
		resp.alto = resp.logo.clientHeight;
		resp.menu.style.height = resp.alto + 'px';
		resp.checkbox.style.height = resp.alto + 'px';
		resp.navList.style.top = resp.alto + 'px';
		resp.menuWrap.style.marginBottom = resp.alto + 'px';
	}
}

document.addEventListener('DOMContentLoaded', function(){
	acordeones();
	biographies();
	carruseles();
	links_map();
	responsive();
});