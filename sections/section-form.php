<?php
global $section;

$title          = $section['title'];
$content        = $section['content'];
$form_shortcode = $section['form_shortcode'];

?>

<section <?php acfactory_section(); ?>>
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="section-form__column section-form__column--left">
                    <div class="section-form__header">
                        <div class="section-form__title h1 text-secondary font-weight:500">
                            <?php echo $title; ?>
                        </div>
                        <div class="section-form__content">
                            <?php echo $content; ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="section-form__column section-form__column--right">
                    <div class="section-form__form">
                        <?php echo do_shortcode( $form_shortcode ); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
