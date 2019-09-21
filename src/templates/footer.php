 <?php
/**
 * footer.php
 * Displays the site footer
 * 
 * @package knotty
 * @since Knotty 1.0
 */
?>   
    
    </main><!-- #main -->

	<footer id="footer" class="site__footer">

		<?php get_search_form(); ?>
		<?php get_template_part('parts/nav/nav', 'follow'); ?>

        <div class="site__copyright">
            <span class="meta">&copy; <?php echo date("Y"); echo " "; echo bloginfo('name'); ?></span>
        </div>		

		<?php get_template_part('parts/nav/nav', 'footer');?>	
		
        <div class="site__legal ">
            <?php bloginfo( 'name' ); ?> is protected by reCAPTCHA V3. The Google <a rel="nofollow noopener" href="https://policies.google.com/privacy">Privacy Policy</a> and <a rel="nofollow noopener" href="https://policies.google.com/terms">Terms of Service</a> apply.
        </div>

        <div class="site__legal">
            <?php bloginfo( 'name' ); ?> is a participant in the Amazon Services LLC Associates Program, an affiliate advertising program designed to provide a means for sites to earn advertising fees by advertising and linking to amazon.com.
        </div>
			
	</footer><!-- #footer -->

</div><!-- #site -->

<?php wp_footer(); ?>

<script>MobileMenu.init(); </script>

</body>
</html>