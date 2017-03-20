<?php

	/**
	 * FOOTER TEMPLATE
	 */

?>

	</main>

	<?php if(is_single()){ get_template_part('layouts/footer_post'); }  ?>
	<?php if(is_page()){ get_template_part('layouts/footer_main'); } ?>
	<?php if(is_single() && get_theme_mod('footermain_show_post_Pages', false)){ get_template_part('layouts/footer_main'); } ?>

	<?php wp_footer(); ?>
</body>
</html>
