<?php
/**
 * Template Name: template-cliniques 
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Annuaire_de_clinique
 */

get_header();
?>

<main id="primary" class="site-main">

	<?php
	$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1; // Obtient le numéro de page actuelle.

	$args = array(
		'post_type' => 'cliniques',
		'paged'     => $paged // Utilise le numéro de page actuelle dans la requête.
	);

	$my_query = new WP_Query($args);

	if ($my_query->have_posts()) :
		while ($my_query->have_posts()) :
			$my_query->the_post();
			get_template_part('template-parts/clinique');
		endwhile;

		// Ajout de la pagination
		$big = 999999999; // Besoin d'une valeur improbable et élevée pour éviter un bug

		echo '<div class="pagination">';
		echo paginate_links(array(
			'base'    => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
			'format'  => '?paged=%#%',
			'current' => max(1, get_query_var('paged')),
			'total'   => $my_query->max_num_pages
		));
		echo '</div>';

	else :
		get_template_part('template-parts/content', 'none');
	endif;
	?>
</main><!-- #main -->

<?php
//get_sidebar();
get_footer();
