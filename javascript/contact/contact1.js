var btn = document.querySelector('.fa');
var panel = document.querySelector('.hero');

function openMenu(event) {
  	if (panel.style.display == "none")
    	panel.style.display = "block"; 
  	else
    	panel.style.display = "none";
}

btn.addEventListener('click', openMenu, false);