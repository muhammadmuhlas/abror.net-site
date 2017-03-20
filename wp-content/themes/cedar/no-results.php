<?php

	/**
	 * NO-RESULTS TEMPLATE
	 */

?>

	<?php if(is_search()){ ?>
		<section class="altpageheader">
			<div class="wrapper">
				<i class="fa fa-warning"></i><?php esc_html_e('No results found. Please try another search query.', 'cedar'); ?>
			</div>
		</section>
	<?php }elseif(is_404()){ ?>
	<?php }else{ ?>
		<section class="altpageheader">
			<div class="wrapper">
				<i class="fa fa-warning"></i><?php esc_html_e('No results found.', 'cedar'); ?>
			</div>
		</section>
	<?php } ?>
