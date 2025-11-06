<?php
global $section;

$before_title     = $section['before_title'];
$title            = $section['title'];
$content          = $section['content'];
$button           = $section['button'];
$overlay          = $section['overlay'];
$size             = $section['size'];
$background_images= $section['background_images'];
$background_video = $section['background_video'] ?? '';
$background_image = $section['appearance']['background_image'];

$add_classes = 'section-hero--' . $size;
$add_classes .= ' section-hero--' . $overlay;

?>

  <!-- Swiper -->
<div class="hero-section-slider">
    <div class="swiper myhero-slider">
        <div class="swiper-wrapper">
            <?php if( $background_images ): ?>
                <?php foreach( $background_images as $img_gallery ): ?>
                    <div class="swiper-slide slide-one">
                        <div class="swiper-img">
                            <img
                                src="<?php echo esc_url($img_gallery['url']); ?>"
                                width="<?php echo esc_attr($img_gallery['width']); ?>"
                                height="<?php echo esc_attr($img_gallery['height']); ?>"
                                alt="<?php echo esc_attr($img_gallery['alt']); ?>">
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
    </div>
    <div class="section-hero__inner">
        <?php if ( $before_title ) { ?>
                <h4 class="section-hero__before-title">
                    <?php echo $before_title; ?>
                </h4>
            <?php } ?>
        <?php if ( $title ) { ?>
                <h2 class="h2 section-hero__title">
                    <?php echo $title; ?>
                </h2>
        <?php } ?>
    </div>
</div>
