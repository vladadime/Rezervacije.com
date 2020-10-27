var img = $('img');
var holder = $('#holder');
var info = $('#info');
var br = 0;

img.on('click', function(){
	br++;
	info.html('');
	holder.html('');
	var self = $(this);
	var copy = self.clone();

	let id = self.attr("object-id");
	$.ajax({
		url: 'http://localhost:8080/Projekat/Functional/object-data.php',
		type: "POST",
		data: {
			id: id
		},
		success: (result) => {
			printText = result;
		},
		error: (error) => {
		}
	})

	copy.css({
		position: 'absolute',
		width: '20%',
		height: '10%',
		top: '0%',
		left: '0%'
	});
	copy.animate({
		top: '0%',
		left: '0%',
		width: '100%',
		height: '100%'
	}, 1000, function(){
		if(br > 1)
			info.html('');
		
        info.append(printText);
	});
	$('#holder').append(copy);
});