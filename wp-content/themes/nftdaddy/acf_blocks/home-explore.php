<?php

// Create id attribute allowing for custom "anchor" value.
$id = 'home-explore-' . $block['id'];
if (!empty($block['anchor'])) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'home-explore';
if (!empty($block['className'])) {
    $className .= ' ' . $block['className'];
}
if (!empty($block['align'])) {
    $className .= ' align' . $block['align'];
}
global $devFunction;
// Load values and assign defaults.

$exploreList = $devFunction->get_field('block_home_explore_select_item');
if (!empty($exploreList)) :
?>
    <section class="card-product-area">
        <div class="container ">
            <div class="explore-container gap-6 grid sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
                <?php foreach ($exploreList as $key => $value) : ?>
                    <div data-aos="fade-in" data-aos-duration="500" class="explore-box transition duration-500 border rounded-md style-3 hover:shadow-lg">
                        <div class="mb-2 card-images">
                            <a href="<?php echo get_the_post_thumbnail_url($value, 'full') ?>" title="" data-lightbox="lightbox[rel--<?php echo $value->ID ?>]" data-vc-gitem-zone="prettyphotoLink" class="vc_gitem-link prettyphoto vc-zone-link vc-prettyphoto-link"><img class="w-full md:h-53  object-cover" src="<?php echo get_the_post_thumbnail_url($value, [300, 300]) ?>" alt="<?php echo $value->post_title; ?>">
                            </a>
                        </div>
                        <div class="p-4 card-wrapper">
                            <div class="card-meta-info">
                                <div class="flex justify-between items-center">
                                    <div class="flex-col">
                                        <p class="title-text font-bold item-title">"<?php echo $value->post_title; ?>"</p>
                                    </div>
                                    <div class="items-center like">
                                        <div class="flex items-center">
                                            <p class="text-base item-title font-normal text-coolGray-600 ">[1/1]</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-2 title-text">
                                <span class="item-description"><?php echo $devFunction->get_excerpt_post($value, 4); ?></span>
                            </div>
                            
                        </div>
                        <?php
                            $likeData = get_post_meta($value->ID, 'like_product', true);
                        ?>
                        <div class="p-2 flex border-top-shadow items-center justify-between btn-footer-icon relative">
                                <div class="inline-block">
                                    @teyetete
                                </div>
                                <div class="flex like-nft" data-id="<?php echo $value->ID?>">
                                    <span class="flex items-center justify-center  mr-1 rounded-full h-7 w-7">
                                        <p class="flex items-center">
                                            <span class="inline-block mr-1">
                                                <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M11.7097 2.75423C11.5235 2.3131 11.255 1.91336 10.9193 1.57737C10.5833 1.24039 10.1872 0.972587 9.75251 0.788539C9.30173 0.596935 8.81824 0.49886 8.33012 0.50001C7.64532 0.50001 6.97719 0.691889 6.39657 1.05433C6.25766 1.14103 6.1257 1.23626 6.00069 1.34001C5.87567 1.23626 5.74371 1.14103 5.60481 1.05433C5.02419 0.691889 4.35605 0.50001 3.67125 0.50001C3.17814 0.50001 2.70031 0.59666 2.24887 0.788539C1.81271 0.973311 1.41961 1.2391 1.08207 1.57737C0.745914 1.91298 0.477385 2.31282 0.2917 2.75423C0.0986224 3.21332 0 3.70083 0 4.20256C0 4.67586 0.0944553 5.16906 0.281977 5.67079C0.438939 6.09008 0.663965 6.52501 0.951498 6.9642C1.40711 7.65922 2.03357 8.3841 2.81143 9.11893C4.10047 10.337 5.377 11.1784 5.43118 11.2125L5.76038 11.4286C5.90623 11.5238 6.09375 11.5238 6.2396 11.4286L6.56881 11.2125C6.62298 11.177 7.89813 10.337 9.18855 9.11893C9.96642 8.3841 10.5929 7.65922 11.0485 6.9642C11.336 6.52501 11.5624 6.09008 11.718 5.67079C11.9055 5.16906 12 4.67586 12 4.20256C12.0014 3.70083 11.9028 3.21332 11.7097 2.75423ZM6.00069 10.3043C6.00069 10.3043 1.05568 7.06227 1.05568 4.20256C1.05568 2.75423 2.22664 1.58022 3.67125 1.58022C4.68665 1.58022 5.5673 2.16012 6.00069 3.00723C6.43407 2.16012 7.31473 1.58022 8.33012 1.58022C9.77473 1.58022 10.9457 2.75423 10.9457 4.20256C10.9457 7.06227 6.00069 10.3043 6.00069 10.3043Z" fill="#6366F1"></path>
                                                </svg>
                                            </span>
                                            <span class="text-xs font-normal text-indigo-500 like-number"><?php echo $likeData > 0 ? $likeData :  0; ?></span>
                                        </p>
                                    </span>
                                </div>
                            </div>

                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
<?php
else :
    echo "Home Explore List";
endif;
?>