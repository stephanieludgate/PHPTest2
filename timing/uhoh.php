<?php
require "inc/function.inc.php"; // configuration

// initial values
$pageTitle = "UhOh";

logMsg("warning", "UhOh");

include "inc/header.inc.php"; 
?>
			<div class="card-header">
				<h3>You broke the internet</h3>
			</div>
			<img src="https://blog.hubspot.com/hs-fs/hubfs/css-tricks-404-page.png?width=477&height=383&name=css-tricks-404-page.png" alt="Page not found" class="img-fluid" />
			<!-- https://css-tricks.com/ -->
<?php include "inc/footer.inc.php"; ?>