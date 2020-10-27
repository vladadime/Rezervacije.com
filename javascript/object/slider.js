var slider_content = document.getElementById('box');
var prew = document.getElementById('prew');
var next = document.getElementById('next');

    var image = ['1','2', '3', '4','2'];

    var i = image.length;


    // function for next slide 

    function nextImage(){
    	if (i < image.length)
    		i++;
    	else
    		i = 1;
    	slider_content.innerHTML = "<img src=images/object/" + image[i - 1] + ".jpg>";
    }


    // function for prew slide

    function prewImage(){

    	if (i < image.length + 1 && i > 1) 
    		i--;
    	else
    		i = image.length;
    	slider_content.innerHTML = "<img src=images/object/" + image[i - 1] + ".jpg>";
    }

next.addEventListener('click', nextImage);
prew.addEventListener('click', prewImage);
