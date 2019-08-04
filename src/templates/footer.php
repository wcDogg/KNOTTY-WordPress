<?php

	echo '</main><!-- #main -->';

	echo '<footer id="footer" class="site__footer">';

		get_search_form();

		get_template_part('parts/nav/nav', 'follow');

		?>
			<div class="site__copyright">
				<span class="meta">&copy; <?php echo date("Y"); echo " "; echo bloginfo('name'); ?></span>
				<a class="meta" title="Privacy" href="<?php echo esc_url( home_url( '/privacy' ) ); ?>">Privacy</a>
				<a class="meta" title="Contact" href="<?php echo esc_url( home_url( '/contact' ) ); ?>">Contact</a>
				<a class="meta" title="Mission" href="<?php echo esc_url( home_url( '/about' ) ); ?>">About</a>
			</div>

			<div class="site__disclaimers ">
				KNOTTY.EARTH is protected by reCAPTCHA V3. The Google <a class="primary" rel="nofollow noopener" href="https://policies.google.com/privacy">Privacy Policy</a> and <a class="primary" rel="nofollow noopener" href="https://policies.google.com/terms">Terms of Service</a> apply.
			</div>

			<div class="site__disclaimers">
				KNOTTY.EARTH is a participant in the Amazon Services LLC Associates Program, an affiliate advertising program designed to provide a means for sites to earn advertising fees by advertising and linking to amazon.com.
			</div>

		<?
				
	echo '</footer><!-- #footer -->';

echo '</div><!-- #site -->';

wp_footer(); 


// StickyHeader.js
// #id of header, #id of container to pad
echo '<script>StickyHeader.init("header", "main"); </script>';


echo '</body>';
echo '</html>';