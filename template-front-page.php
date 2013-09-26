<?php
/**
 * Template Name: Front Page
 * Description: Site's front page
 */

get_header() ?>

	<?php get_template_part('partial', 'kb-search'); ?>

	<hr>

	<section class="article-categories-list grids">
		<?php

			$terms = get_terms( 'article_cat', array(
				'orderby' => 'name',
				'order'   => 'ASC'
			) );

			if ( $terms ) {
				foreach ( $terms as $term ) {
					$args = array(
						'post_type'   => 'article',
						'post_status' => 'publish',
						'tax_query'   => array(
							array(
								'taxonomy' => 'article_cat',
								'field'    => 'term_id',
								'terms'    => $term->term_id
							)
						)
					);

					$query = new WP_Query($args);

					if ( $query->have_posts() ) :

						echo "<ul class='grid-4'>";

						echo "<h4 class='article-category'>{$term->name}</h4>";

						while( $query->have_posts() ) : $query->the_post();
						?>

						<li><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></li>

						<?php
						endwhile;

						echo "</ul>";

					endif;

				}
			}

			wp_reset_query();

		?>
	</section>

<?php get_footer(); ?>
