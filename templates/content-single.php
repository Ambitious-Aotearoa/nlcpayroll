<?php
/**
 * The template part for a single content
 *
 * @package acfactory
 * @since acfactory 1.0
 */

?>
<div class="article__section">
	<div class="container">
		<article id="post-<?php the_ID(); ?>" <?php post_class('article'); ?>>
			<div class="row">
				<div class="col-lg-4">
					<div class="article__column article__column--left">
						<div class="article__header">
							<div class="article__body">
								<div class="article__meta">
									<?php get_template_part( 'templates/post-meta' ); ?>
								</div>
								<h2 class="article__title">
									<?php the_title(); ?>
								</h2>

								<div class="article__author">
									<?php if( get_field( 'show_author' ) == 'yes' ) { ?>
											<?php echo get_avatar( get_the_author_meta( 'ID' ), 54 ); ?>
											<div>Written by <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ); ?>"><?php echo get_the_author(); ?></a></div>
									<?php } ?>
								</div>

								<div class="article__share share">
									<div class="share__title">Share</div>
									<ul class="share__list">
										<li class="share__item">
											<a class="share__link" aria-label="Facebook" href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>">
												<svg aria-hidden="true" focusable="false" data-prefix="fab" data-icon="facebook-f" class="svg-inline--fa fa-facebook-f fa-w-10" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"><path fill="currentColor" d="M279.14 288l14.22-92.66h-88.91v-60.13c0-25.35 12.42-50.06 52.24-50.06h40.42V6.26S260.43 0 225.36 0c-73.22 0-121.08 44.38-121.08 124.72v70.62H22.89V288h81.39v224h100.17V288z"></path></svg>
											</a>
										</li>
										<li class="share__item">
											<a class="share__link" aria-label="Twitter" href="https://twitter.com/home?status=<?php the_title(); ?>%20-%20<?php the_permalink(); ?>">
												<svg aria-hidden="true" focusable="false" data-prefix="fab" data-icon="twitter" class="svg-inline--fa fa-twitter fa-w-16" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M459.37 151.716c.325 4.548.325 9.097.325 13.645 0 138.72-105.583 298.558-298.558 298.558-59.452 0-114.68-17.219-161.137-47.106 8.447.974 16.568 1.299 25.34 1.299 49.055 0 94.213-16.568 130.274-44.832-46.132-.975-84.792-31.188-98.112-72.772 6.498.974 12.995 1.624 19.818 1.624 9.421 0 18.843-1.3 27.614-3.573-48.081-9.747-84.143-51.98-84.143-102.985v-1.299c13.969 7.797 30.214 12.67 47.431 13.319-28.264-18.843-46.781-51.005-46.781-87.391 0-19.492 5.197-37.36 14.294-52.954 51.655 63.675 129.3 105.258 216.365 109.807-1.624-7.797-2.599-15.918-2.599-24.04 0-57.828 46.782-104.934 104.934-104.934 30.213 0 57.502 12.67 76.67 33.137 23.715-4.548 46.456-13.32 66.599-25.34-7.798 24.366-24.366 44.833-46.132 57.827 21.117-2.273 41.584-8.122 60.426-16.243-14.292 20.791-32.161 39.308-52.628 54.253z"></path></svg>
											</a>
										</li>
										<li class="share__item">
											<a class="share__link" aria-label="LinkedIn" href="https://www.linkedin.com/shareArticle?mini=true&title=<?php the_title(); ?>&url=<?php the_permalink(); ?>">
												<svg aria-hidden="true" focusable="false" data-prefix="fab" data-icon="linkedin-in" class="svg-inline--fa fa-linkedin-in fa-w-14" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M100.28 448H7.4V148.9h92.88zM53.79 108.1C24.09 108.1 0 83.5 0 53.8a53.79 53.79 0 0 1 107.58 0c0 29.7-24.1 54.3-53.79 54.3zM447.9 448h-92.68V302.4c0-34.7-.7-79.2-48.29-79.2-48.29 0-55.69 37.7-55.69 76.7V448h-92.78V148.9h89.08v40.8h1.3c12.4-23.5 42.69-48.3 87.88-48.3 94 0 111.28 61.9 111.28 142.3V448z"></path></svg>
											</a>
										</li>
										<li class="share__item">
											<a class="share__link" aria-label="Share via Email" href="mailto:?subject=<?php the_title(); ?>&body=<?php the_permalink(); ?>">
												<svg aria-hidden="true" focusable="false" data-prefix="far" data-icon="envelope" class="svg-inline--fa fa-envelope fa-w-16" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M464 64H48C21.49 64 0 85.49 0 112v288c0 26.51 21.49 48 48 48h416c26.51 0 48-21.49 48-48V112c0-26.51-21.49-48-48-48zm0 48v40.805c-22.422 18.259-58.168 46.651-134.587 106.49-16.841 13.247-50.201 45.072-73.413 44.701-23.208.375-56.579-31.459-73.413-44.701C106.18 199.465 70.425 171.067 48 152.805V112h416zM48 400V214.398c22.914 18.251 55.409 43.862 104.938 82.646 21.857 17.205 60.134 55.186 103.062 54.955 42.717.231 80.509-37.199 103.053-54.947 49.528-38.783 82.032-64.401 104.947-82.653V400H48z"></path></svg>
											</a>
										</li>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-7 ml-auto">
					<div class="article__column article__column--right">
						<div class="article__content">
							<?php the_content(); ?>
						</div>
						<footer class="article__footer">
							<?php
							wp_link_pages(
								[
									'before' => '<nav class ="page-nav"><p>' . __( 'Pages:', 'acfactory' ),
									'after'  => '</p></nav>',
								]
							);
							?>

							<div class="article__share share">
								<div class="share__title">Share</div>
								<ul class="share__list">
									<li class="share__item">
										<a class="share__link" href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>">
											<svg aria-hidden="true" focusable="false" data-prefix="fab" data-icon="facebook-f" class="svg-inline--fa fa-facebook-f fa-w-10" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"><path fill="currentColor" d="M279.14 288l14.22-92.66h-88.91v-60.13c0-25.35 12.42-50.06 52.24-50.06h40.42V6.26S260.43 0 225.36 0c-73.22 0-121.08 44.38-121.08 124.72v70.62H22.89V288h81.39v224h100.17V288z"></path></svg>
										</a>
									</li>
									<li class="share__item">
										<a class="share__link" href="https://twitter.com/home?status=<?php the_title(); ?>%20-%20<?php the_permalink(); ?>">
											<svg aria-hidden="true" focusable="false" data-prefix="fab" data-icon="twitter" class="svg-inline--fa fa-twitter fa-w-16" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M459.37 151.716c.325 4.548.325 9.097.325 13.645 0 138.72-105.583 298.558-298.558 298.558-59.452 0-114.68-17.219-161.137-47.106 8.447.974 16.568 1.299 25.34 1.299 49.055 0 94.213-16.568 130.274-44.832-46.132-.975-84.792-31.188-98.112-72.772 6.498.974 12.995 1.624 19.818 1.624 9.421 0 18.843-1.3 27.614-3.573-48.081-9.747-84.143-51.98-84.143-102.985v-1.299c13.969 7.797 30.214 12.67 47.431 13.319-28.264-18.843-46.781-51.005-46.781-87.391 0-19.492 5.197-37.36 14.294-52.954 51.655 63.675 129.3 105.258 216.365 109.807-1.624-7.797-2.599-15.918-2.599-24.04 0-57.828 46.782-104.934 104.934-104.934 30.213 0 57.502 12.67 76.67 33.137 23.715-4.548 46.456-13.32 66.599-25.34-7.798 24.366-24.366 44.833-46.132 57.827 21.117-2.273 41.584-8.122 60.426-16.243-14.292 20.791-32.161 39.308-52.628 54.253z"></path></svg>
										</a>
									</li>
									<li class="share__item">
										<a class="share__link" href="mailto:?subject=<?php the_title(); ?>&body=<?php the_permalink(); ?>">
											<svg aria-hidden="true" focusable="false" data-prefix="far" data-icon="ellipsis-h" class="svg-inline--fa fa-ellipsis-h fa-w-16" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M304 256c0 26.5-21.5 48-48 48s-48-21.5-48-48 21.5-48 48-48 48 21.5 48 48zm120-48c-26.5 0-48 21.5-48 48s21.5 48 48 48 48-21.5 48-48-21.5-48-48-48zm-336 0c-26.5 0-48 21.5-48 48s21.5 48 48 48 48-21.5 48-48-21.5-48-48-48z"></path></svg>
										</a>
									</li>
								</ul>
							</div>
						</footer>
					</div>
				</div>
			</div>
		</article>
	</div>
</div>

<div class="related">
	<div class="container">
		<div class="row">
			<div class="col-lg-4">
				<div class="related__column related__column--left">
					<div class="related__title">
						Related articles
					</div>
					<div class="related__links">
						<div><a href="<?php echo get_post_type_archive_link( 'post' ); ?>" class="btn btn-arrow">see all news</a></div>
						<div><a href="<?php echo get_post_type_archive_link( 'case-study' ); ?>" class="btn btn-arrow">see all case studies</a></div>
					</div>
				</div>
			</div>
			<div class="col-lg-7 ml-auto">
				<div class="related__column related__column--right">
					<?php
					$args = array(
						'post_type' => get_post_type(),
						'posts_per_page' => 2
					);
					$query = new WP_Query( $args );
					if ( $query->have_posts() ) {
						?>
						<div class="related__posts">
							<?php while ( $query->have_posts() ) { ?>
								<?php $query->the_post(); ?>
								<?php get_template_part( 'templates/content', 'simple' ); ?>
							<?php } ?>
						</div>
						<?php
					}
					wp_reset_query();
					?>
				</div>
			</div>
		</div>
	</div>
</div>

<?php get_template_part( 'sections/section-call-to-action' ); ?>
