<!DOCTYPE html>
<html lang="en">
<head>
	<?php include_once 'common/header.php';	?>
</head>
<body>
	<div class="container">
		<div class="row">
			<!-- Sidebar -->
			<div class="span3">
				<?php include_once 'common/sidebar.php';	?>
			</div>
			<!-- Container -->
			<div class="span9">
				<?php
					if (isset($_GET['day'])) {
						$day = '/days/' . $_GET['day'] . '.php';
						include($day);
					} else {
						$day = '/days/01.php';
						include($day);
					}
				?>
				<hr />
				<?php include_once 'common/footer.php';	?>
			</div>
		</div>
	</div>
</body>
</html>
