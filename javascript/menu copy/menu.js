var navButton = document.querySelector('.navigation-button');
var btn = document.querySelector('.fa');
var navMenu = document.querySelector('.navigation-menu');

function changeColor(){
	if(btn.style.color == "white")
		btn.style.color = "black";
	else
		btn.style.color = "white";
}

function openMenu(event) {
	
    navMenu.classList.toggle('active');
	if(btn.style.color == "black")
		btn.style.color = "white";
	else
		btn.style.color = "black";
	
	
    event.stopImmediatePropagation();
	
}

navButton.addEventListener('click', openMenu, false);
