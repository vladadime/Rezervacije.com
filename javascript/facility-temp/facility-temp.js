var btn = document.querySelector('.fa');
var panel = document.querySelector('.wrapp');
var nav = document.querySelector('.nav');

function openMenu(event) {
	
  	if (panel.style.display == "block"){
    	panel.style.display = "block";
    	nav.style.display = "block"; 
  	}
  	else{
    	panel.style.display = "none";
    	nav.style.display = "none";
  	}
}

btn.addEventListener('click', openMenu, false);


