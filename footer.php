<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package exp
 */
?>

			<footer class="l-footer">
				<div class="l-footer__banner"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/page/common/banner.png" alt="banner"></div>
				<div class="fb-area">
					<div class="fb-area__inner">
						<div class="fb-like-box" data-href="https://www.facebook.com/wp-e.org" data-colorscheme="light" data-show-faces="true" data-header="true" data-stream="false" data-show-border="true"></div>
					</div>
				</div>
				<div class="footer-bot">
					<div class="footer-bot__inner">
						<div class="footer-bot__logo"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/page/common/logo_exp.svg" alt="exp"></div>
						<ul class="footer-bot__list">
							<li class="footer-bot__item"><a href="https://twitter.com/WPE34" target="_blank"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/page/common/icon_tw.svg" alt="exp twitter"></a></li>
							<li class="footer-bot__item"><a href="https://www.facebook.com/wpe.org" target="_blank"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/page/common/icon_fb.svg" alt="exp facebook"></a></li>
							<li class="footer-bot__item"><a href="https://github.com/featherplain/exp" target="_blank"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/page/common/icon_gh.svg" alt="exp github"></a></li>
						</ul>
					</div>
				</div>
			</footer>

		</div><!-- /.l-container -->
	</div><!-- /.off-canvas-wrap -->

<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-48005287-1', 'auto');
  ga('send', 'pageview');

</script>
<?php wp_footer(); ?>
</body>
</html>
