
<?php
$taxonomy = get_post_type() == 'case-study' ? 'case-study_cat' : 'category';
$terms    = get_the_terms( get_the_ID(), $taxonomy );

if ( $terms && ! is_wp_error( $terms ) ) {
    ?>
<!--    <ul class="entry-feature__terms terms">-->
<!--        --><?php //foreach ( $terms as $term ) { ?>
<!--            <li class="terms__item term-badge----><?php //echo $term->term_id; ?><!--">-->
<!--                <span class="badge badge-secondary">--><?php //echo $term->name; ?><!--</span>-->
<!--            </li>-->
<!--        --><?php //} ?>
<!--    </ul>-->
    <?php
}
?>
<!--<div class="entry-feature__date term-badge----><?php //echo $term->term_id; ?><!--">-->
	<div class="entry-feature__date">
    <time datetime="<?php echo get_the_date('c'); ?>" itemprop="datePublished"><?php echo get_the_date(); ?></time>
</div>
