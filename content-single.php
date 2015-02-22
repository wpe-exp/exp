<?php
/**
 * @package exp
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'post--single' ); ?>>

<?php
$cats = get_the_category();
$catHtml = '';
foreach ( $cats as $cat) {
	$catHtml .= '<a href="' . get_category_link( $cat->cat_ID ) . '" class="post__label catLabel catLabel--wordpress">' . $cat->name . '</a>';
}
?>

	<header class="post__header">
		<?php the_post_thumbnail( '' ); ?>
		<div class="post__meta">
			<time><?php the_time( get_option( 'date_format' ) ); ?></time><?php echo get_avatar( get_the_author_meta( 'ID' ) ); ?><span><?php echo get_the_author_meta( 'display_name' ); ?></span><?php echo $catHtml; ?>
		</div>
		<h1 class="post__title"><?php the_title(); ?></h1>
		<div class="snsShare">
			<ul class="snsShare__list">
				<li class="snsShare__item"><a href="" class="btnTw">twitter</a>
				</li>
				<li class="snsShare__item"><a href="" class="btnFb">facebook</a>
				</li>
				<li class="snsShare__item"><a href="" class="btnPocket">pocket</a>
				</li>
				<li class="snsShare__item"><a href="" class="btnHatena">Hatena</a>
				</li>
			</ul>
		</div>
	</header>

	<div class="post__content stylePost">
		<?php the_content(); ?>
	</div>

</article>

