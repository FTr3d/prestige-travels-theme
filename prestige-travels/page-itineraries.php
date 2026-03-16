<?php
/**
 * Template Name: Itineraries Listing
 */
get_header(); 
?>

<main class="site-main">
    <section class="hero-half">
        <div class="container">
            <h1>Find your journey</h1>
            <p style="font-size: 20px;">Every trip is a tier. Every tier is a promise.</p>
        </div>
    </section>

    <section class="section-light">
        <div class="container">
            <!-- FacetWP Filters Placeholder -->
            <div class="filters" style="margin-bottom:40px; border-bottom:1px solid #ccc; padding-bottom:20px;">
                <span class="label-text">Filters:</span> All | Amsterdam | Dubai | Hurghada &nbsp;&nbsp;&nbsp; 
                <span class="label-text">Tiers:</span> Curated | Premier | Prestige
            </div>

            <div class="grid-3">
                <?php
                $args = array( 'post_type' => 'itinerary', 'posts_per_page' => -1, 'orderby' => 'menu_order', 'order' => 'ASC' );
                $query = new WP_Query($args);
                if($query->have_posts()) : while($query->have_posts()) : $query->the_post(); 
                    $tier_info = prestige_get_tier_info(get_field('tier'));
                ?>
                <a href="<?php the_permalink(); ?>" class="card card-itinerary">
                    <span class="tier-badge <?php echo esc_attr($tier_info['class']); ?>"><?php echo esc_html($tier_info['label']); ?></span>
                    <?php if(has_post_thumbnail()) the_post_thumbnail('large'); ?>
                    <div class="card-overlay">
                        <h3><?php the_title(); ?></h3>
                        <p><?php echo esc_html(get_field('duration')); ?> | From €<?php echo esc_html(get_field('price_from')); ?> pp</p>
                    </div>
                </a>
                <?php endwhile; wp_reset_postdata(); else: ?>
                    <p>No itineraries found.</p>
                <?php endif; ?>
            </div>
        </div>
    </section>
</main>

<?php get_footer(); ?>
