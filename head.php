<html>
	<head>
		<link rel="icon" href="assets/images/iconsweet.png" type="image/x-icon">
		<title>Sweet Home</title>
		<meta charset="utf-8">		
		<meta content="width=device-width, initia-scale=1.0, user-scalabre=0" name="viewport">
		<link rel="stylesheet" type="text/css" href="style.css">
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
	</head>
	<header>

		<div class="circle-container" id="circlesContainer"></div>
		<script>
			const circleContainer = document.getElementById('circlesContainer');
			const circleWidth = 20;
			const spacing = 10;
			const screenWidth = window.innerWidth;
			const numCirculos = Math.floor(screenWidth / (circleWidth + spacing));

			for (let i = 0; i < numCirculos; i++) {
				const circleDiv = document.createElement('div');
				circleDiv.className = 'image-div';
				circleContainer.appendChild(circleDiv);
			}
		</script>
	</header>
	
</html>