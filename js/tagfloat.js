window.onload = function () {
		try {
			// var i, et = document.getElementById('tags').childNodes;
			// for (i in et) {
			// 	et[i].nodeName == 'A' && et[i].addEventListener('click', function (e) {
			// 		e.preventDefault();
			// 	});
			// }
			
			TagCanvas.Start('myCanvas', 'tags', {
				textColour: '#222',
				outlineColour: '#787878',
				reverse: true,
				depth: 0.8,
				dragControl: true,
				decel:0.95,
				maxSpeed: 0.05,
				initial: [-0.2, 0]
			});


		} catch (e) {
			// something went wrong, hide the canvas container
			document.getElementById('myCanvasContainer').style.display = 'none';
		}
	};
