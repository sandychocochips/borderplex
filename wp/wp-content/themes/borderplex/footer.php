</main>

<footer role="contentinfo" >
	<div class="blue_bar">
			<div class="info">
				<?php
				$phone = get_field("phone", 'option');
				if ( $phone ) { ?>
					<p><?php echo $phone; ?></p>
				<?php }
				?>
				<?php
				$mail = get_field("mail", 'option');
				if ( $mail ) { ?>
					<p><a href="mailto:<?php echo $mail; ?>"><?php echo $mail; ?></a></p>
				<?php }
				?>
				<?php
				$address = get_field("address", 'option');
				if ( $address ) { ?>
					<p><?php echo $address; ?></p>
				<?php }
				?>
			</div>
			<div class="redes_footer">
				<a href="#" class="twitter_footer"><img src="<?php ruta_imagenes(); ?>twitter_footer.svg" /></a>
				<a href="#" class="facebook_footer"><img src="<?php ruta_imagenes(); ?>facebook_footer.svg" /></a>
			</div>
	</div>
	<figure>
		<img src="<?php ruta_imagenes(); ?>logo_footer.png" />
	</figure>
</footer>

<?php wp_footer(); ?>

<!-- Sólo en desarrollo -->
<style type="text/css">
	html{margin-top:0 !important;}
	#wpadminbar{display: none;}
</style>

</body>
</html>