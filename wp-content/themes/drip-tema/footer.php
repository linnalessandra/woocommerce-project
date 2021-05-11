<footer class="footergrp3">
    <div style="font-size: 12px;" class="footerwidget">
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
<div class="finishingFooter">
<p style="font-size: 12px; padding-right: 100px; padding-left: 100px;">Here at YOULRY we love everything that has to do with jewelry and beauty, so we make sure we are always up to date with the season’s latest trends. We want to inspire you with new arrivals every day, so that you will easily be able to find a look that suits you perfectly. Here you will find everything from trendy watches to necklaces and bracelets for all sorts of occasions – always for a good price and with fast deliveries.</p>

<p style="font-size: 7px; padding: 10px;">
 -------------------------------------------------------------- YOULRY AB © --------------------------------------------------------------</p>
 <p style="font-size: 7px;"> Org-number: 009754280470987</p>
</div>

<?php 
    wp_footer(); 
?>
</body>
</html>