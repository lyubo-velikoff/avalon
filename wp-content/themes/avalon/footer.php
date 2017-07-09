		</div> <!-- end body-content -->
		
		<div class="footer">
			<div class="container">
				<div class="email"><?php echo Info::$email; ?></div>
				<div class="tel"><?php echo Info::$mainTel; ?></div>
				<div class="copyright">&copy;<?php echo date('Y', strtotime('now')); ?></div>
			</div>
		</div>
			
		<script type="text/javascript">
			var themePath = "<?php path(); ?>";
			var wpPath = '<?php echo bloginfo('wpurl') ?>';

			/* Load Scripts */
			function downloadJSAtOnload() {
				var script = document.createElement("script");
				script.src = themePath + "/assets/js/app.js";
				document.body.appendChild(script);
			}
			if (window.addEventListener) window.addEventListener("load", downloadJSAtOnload, false);
			else if (window.attachEvent) window.attachEvent("onload", downloadJSAtOnload);
			else window.onload = downloadJSAtOnload;
		</script>

		<?php include('includes/analytics.php'); ?>
	</body>
</html>