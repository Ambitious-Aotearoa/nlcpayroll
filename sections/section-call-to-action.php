<?php
global $section;
$section['acf_fc_layout'] = 'call_to_action';

if ( is_singular( 'post' ) || is_singular( 'case-study' ) ) {
    if ( get_post_type() == 'case-study' ) {
        $call_to_actions = get_field( 'case_study_call_to_actions', 'option' )['call_to_actions'];
    } else {
        $call_to_actions = get_field( 'posts_call_to_actions', 'option' )['call_to_actions'];
    }
    $container = 'no-container';
    $overlay   = 'overlay';
    $size      = 'md';
} else {
    $call_to_actions = $section['call_to_actions'];
    $container       = $section['container'];
    $overlay         = $section['overlay'];
    $size            = $section['size'];
}

?>

<section <?php acfactory_section(); ?>>
    <?php echo $container == 'container' ? '<div class="container">' : ''; ?>

    <div class="row no-gutters">
        <?php foreach ( $call_to_actions as $item ) { ?>
            <?php
            $title            = $item['title'];
            $button           = $item['button'];
            $background_image = $item['background_image'];
            ?>
            <div class="col-lg-<?php echo 12 / count( $call_to_actions ); ?>">
                <div class="cta__column">
                    <div class="cta cta--<?php echo $overlay; ?> cta--<?php echo $size; ?>">
                        <div class="cta__body">
                            <div class="h2 cta__title"><?php echo $title; ?></div>
                            <?php if ( $button ) { ?>
                                <div class="cta__action">
                                    <?php acfactory_button( $button ); ?>
                                </div>
                            <?php } ?>
                        </div>
                        <div class="cta__image">
                            <img src="<?php echo $background_image['url']; ?>" alt="<?php echo $background_image['alt']; ?>">
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>

    <?php echo $container == 'container' ? '</div>' : ''; ?>
</section>
