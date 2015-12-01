<?php
/**
 * @package exp
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'post--single' ); ?>>

	<?php // Category label
	$cats = get_the_category();
	$catHtml = '';
	foreach ( $cats as $cat) {
		$catHtml .= '<a href="' . get_category_link( $cat->cat_ID ) . '" class="post__label catLabel catLabel--wordpress">' . $cat->name . '</a>';
	}
	?>

	<header class="post__header">
		<?php // post thumbnail
		$size = ( wp_is_mobile() ) ? 'thumb640x280' : 'thumb940x400';
		the_post_thumbnail( $size, array( 'class'	=> 'attachment-' . $size . ' post__image' ) );
		?>
		<div class="post__meta">
			<time><?php the_time( get_option( 'date_format' ) ); ?></time><?php echo get_avatar( get_the_author_meta( 'ID' ) ); ?><span><?php echo get_the_author_meta( 'display_name' ); ?></span><?php echo $catHtml; ?>
		</div>
		<h1 class="post__title"><?php the_title(); ?></h1>
		<?php // sns share buttons
		get_template_part( 'content', 'sns' );
		 ?>
	</header>

	<div id="stylePost" class="post__content stylePost">
		<!-- Google Adsense -->
		<div class="googleAd googleAd--top">
			<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
			<ins class="adsbygoogle"
			     style="display:block"
			     data-ad-client="ca-pub-9850593178268326"
			     data-ad-slot="7077393692"
			     data-ad-format="auto"></ins>
			<script>
			(adsbygoogle = window.adsbygoogle || []).push({});
			</script>
		</div>
		<!-- / Google Adsense -->
		<?php the_content(); ?>
		<!-- Google Adsense -->
		<div class="googleAd googleAd--bottom">
			<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
			<ins class="adsbygoogle"
			     style="display:block"
			     data-ad-client="ca-pub-9850593178268326"
			     data-ad-slot="7077393692"
			     data-ad-format="auto"></ins>
			<script>
			(adsbygoogle = window.adsbygoogle || []).push({});
			</script>
		</div>
		<!-- / Google Adsense -->
	</div>
	<?php // post author
	get_template_part( 'content', 'author' );
	?>
	<aside class="widget">
		<?php // sns share buttons
		get_template_part( 'content', 'sns' );
		 ?>
	</aside>

</article>
