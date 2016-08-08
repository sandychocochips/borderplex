</main>

<footer role="contentinfo" class="piePagina">
	<div class="blue_bar">
		<div class="wrap">
			<div class="info">
				<?php
				$phone = get_field("phone", 'option');
				if ( $phone ) { ?>
					<p class="piePagina__telefono"><?php echo $phone; ?></p>
				<?php }
				?>
				<?php
				$mail = get_field("mail", 'option');
				if ( $mail ) { ?>
					<p class="piePagina__mail"><a href="mailto:<?php echo $mail; ?>"><?php echo $mail; ?></a></p>
				<?php }
				?>
				<?php
				$address = get_field("address", 'option');
				if ( $address ) { ?>
					<p class="piePagina__direccion"><?php echo $address; ?></p>
				<?php }
				?>
			</div>
			<div class="redes_footer">
				<a href="https://twitter.com/TheBorderplex" target="_blank" class="twitter_footer"><img src="<?php ruta_imagenes(); ?>twitter_footer.svg" /></a>
				<a href="https://www.facebook.com/The-Borderplex-Alliance-1376203062616133/" target="_blank" class="facebook_footer"><img src="<?php ruta_imagenes(); ?>facebook_footer.svg" /></a>
			</div>
		</div>
	</div>
	<figure class="footer__logo">
		<?php
		$logo = get_field("logo", 'option');
		if ( $logo ) { ?>
			<img src="<?php echo $logo; ?>" />
		<?php }
		?>
	</figure>
</footer>

<?php wp_footer(); ?>

</body>
</html>