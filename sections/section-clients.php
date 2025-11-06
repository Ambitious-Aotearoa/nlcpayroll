<?php
global $section;

$title   = $section['title'];
$content = $section['content'];
$image   = $section['image'];
$clients = $section['clients'];

//get 3 first elements and remove 3 first elements from main array
$first_three = array_splice( $clients, 0, 3 );

//shuffle 3 elements
shuffle($clients);

//join everything back
$combined_clients = array_merge(array_values($first_three), array_values($clients));

//shuffle($combined_clients);

$combined_clients_first_six = array_splice( $combined_clients, 0, 6 );

?>

<section <?php acfactory_section(); ?>>
    <div class="section-clients__image section-clients__image--mobile">
        <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>">
    </div>
    <div class="container">
        <div class="section-clients__header">
            <div class="h2 text-secondary section-clients__title">
                <?php echo $title; ?>
            </div>
            <div class="section-clients__content">
                <?php echo $content; ?>
            </div>
        </div>
    </div>
    <div class="section-clients__wrapper">
        <div class="section-clients__image section-clients__image--desktop">
            <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>">
        </div>
        <div class="section-clients__grid">
            <?php foreach ( $combined_clients_first_six as $item ) { ?>
                <?php
                $logo    = $item['logo'];
                $content = $item['content'];
                $color   = $item['color'];
                ?>
                <div class="client__column">
                    <div class="client" data-bgcolor="<?php echo $color; ?>">
                        <div class="client__logo">
                            <img class="svg" src="<?php echo $logo['url']; ?>" alt="<?php echo $logo['alt']; ?>">
                        </div>
                        <div class="client__body">
                            <div class="client__content">
                                <?php echo $content; ?>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</section>
