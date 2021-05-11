<footer class="footergrp3">
    <div class="footerwidget">
    <?php dynamic_sidebar('footerwidget'); ?>
    </div>
    <div class="footermenu">
    <?php    
		$footerMenuArray = [
			'theme_location' => 'footermenu'
			];
							
		wp_nav_menu($footerMenuArray);
		?>
    </div>

</footer>

<?php 
    wp_footer(); 
?>
</body>
</html>