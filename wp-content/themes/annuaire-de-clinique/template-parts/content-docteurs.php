<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Annuaire_de_clinique
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">

		<?php
		
		
		if ( is_singular() ) :
				the_title( '<h1 class="entry-title" style="background-color: #2F6EE4; color: #FFFFFF; margin-left: 30px; width: 90%;">', '</h1>' );
		else :
			the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		endif;
		
		$docteur_id= get_the_ID();
		$adresse = get_post_meta($docteur_id,'Adresse',true);
		$tel = get_post_meta($docteur_id,'Tel',true);
		$fax = get_post_meta($docteur_id,'Fax',true);
		$site_internet = get_post_meta($docteur_id,'Site_internet',true);
		$specialite = get_post_meta($docteur_id,'Specialte',true);


		?>
		<table style="background-color: #D4F8FF; margin-left: 30px; width: 90%;">
			<tr>
				<td><?= "Adresse :" ?></td>
				<td><?= $adresse ?></td>
			</tr>
			<tr>
				<td><?= "Tel :" ?></td>
				<td><?= $tel ?></td>
			</tr>
			<tr>
				<td><?= "Fax :" ?></td>
				<td><?=  $fax ?></td>
			</tr>
			<tr>
				<td><?= "Site internet :" ?></td>
				<td><?= $site_internet ?></td>
			</tr>
		</table>
		<?

		
?>
	</header><!-- .entry-header -->

	<?php annuaire_de_clinique_post_thumbnail(); ?>

	<div class="entry-content">
		<?php
		the_content(
			sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'annuaire-de-clinique' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				wp_kses_post( get_the_title() )
			)
		);

		wp_link_pages(
			array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'annuaire-de-clinique' ),
				'after'  => '</div>',
			)
		);
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php annuaire_de_clinique_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->
