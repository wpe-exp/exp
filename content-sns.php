<div class="snsShare">
	<ul class="snsShare__list">
		<li class="snsShare__item">
			<a class="btnShare btnShare--fb" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo urlencode(get_permalink()); ?>">
				<span class="count count--fb"></span>
				<svg viewBox="0 0 9 18" role="img" area-labelledby="title desc" width="7px" height="16px">
					<use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/sprite-global.symbol.svg#icon_shareFb"></use>
				</svg>
				<span class="btnShare__text">Share</span>
			</a>
		</li>
		<li class="snsShare__item">
			<a class="btnShare btnShare--ha" href="http://b.hatena.ne.jp/add?mode=confirm&amp;url=<?php echo urlencode(get_permalink()); ?>&amp;title=<?php echo urlencode(get_the_title()); ?>">
				<span class="count count--ha"></span>
				<svg viewBox="0 0 19 17" role="img" area-labelledby="title desc" width="14px" height="12px">
					<use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/sprite-global.symbol.svg#icon_shareHa"></use>
				</svg>
				<span class="btnShare__text">Bookmark</span>
			</a>
		</li>
		<li class="snsShare__item">
			<a class="btnShare btnShare--tw" href="https://twitter.com/share?&amp;text=<?php echo urlencode(get_the_title()); ?>&amp;via=WPE34">
				<svg viewBox="0 0 20 17" role="img" area-labelledby="title desc" width="17px" height="13px">
					<use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/sprite-global.symbol.svg#icon_shareTw"></use>
				</svg>
				<span class="btnShare__text">Tweet</span>
			</a>
		</li>
		<li class="snsShare__item">
			<?php if ( wp_is_mobile() ): ?>
				<div class="btnShare btnShare--po">
					<a href="https://getpocket.com/save" data-lang="ja" data-pocket-count="none" data-pocket-label="pocket" class="pocket-btn"></a>
				</div>
			<?php else: ?>
				<div class="btnShare btnShare--po">
					<a href="https://getpocket.com/save" data-lang="ja" data-pocket-count="horizontal" data-pocket-label="pocket" class="pocket-btn"></a>
				</div>
			<?php endif; ?>
		</li>
	</ul>
</div>
