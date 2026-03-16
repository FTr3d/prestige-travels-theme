<?php
/**
 * Front Page Template
 */
get_header(); 
$quote_url = get_field('quote_form_url', 'option') ?: '/request-a-quote';
?>

<main id="primary" class="site-main">

    <!-- Hero -->
    <section class="hero-full">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/home-hero.jpg" alt="Luxury Travel" style="background:#111;">
        <div class="container">
            <span class="label-text" style="color:var(--color-gold);">PRESTIGE TRAVELS</span>
            <h1>Premium trips,<br>personal service,<br>zero stress.</h1>
            <p class="body-text" style="max-width:500px; font-size:20px;">We handle every detail. You just show up and experience the world.</p>
            <div class="cta-pair">
                <a href="<?php echo esc_url($quote_url); ?>" class="btn-primary">Request a Quote</a>
                <a href="<?php echo esc_url(get_field('whatsapp_url', 'option')?:'#'); ?>" class="btn-outline">Chat on WhatsApp</a>
            </div>
        </div>
    </section>

    <!-- Trust Strip -->
    <section class="section-offwhite" style="padding: 60px 0;">
        <div class="container grid-4">
            <div><strong>✦ Handpicked Destinations</strong></div>
            <div><strong>✦ Personal Travel Advisor</strong></div>
            <div><strong>✦ Flexible Payment Plans</strong></div>
            <div><strong>✦ WhatsApp Support 7 Days</strong></div>
        </div>
    </section>

    <!-- Featured Destinations -->
    <section class="section-dark">
        <div class="container">
            <h2>Where will you go?</h2>
            <p style="margin-bottom:60px;">Three iconic destinations. Each one curated with the level of detail you deserve.</p>
            <div class="grid-3">
                <?php
                $dest_args = array( 'post_type' => 'destination', 'posts_per_page' => 3, 'meta_key' => 'featured', 'meta_value' => '1' );
                $dest_query = new WP_Query($dest_args);
                if($dest_query->have_posts()) : while($dest_query->have_posts()) : $dest_query->the_post(); 
                ?>
                <a href="/itineraries" class="card card-destination">
                    <?php if(has_post_thumbnail()) the_post_thumbnail('large'); ?>
                    <div class="card-overlay">
                        <h3><?php the_title(); ?></h3>
                        <p><?php echo esc_html(get_field('tagline')); ?></p>
                    </div>
                </a>
                <?php endwhile; wp_reset_postdata(); endif; ?>
            </div>
        </div>
    </section>

    <!-- Featured Itineraries -->
    <section class="section-light">
        <div class="container">
            <h2>Curated Journeys</h2>
            <p style="margin-bottom:60px;">Curated. Premier. Prestige. Three tiers for every style and budget.</p>
            <div class="grid-3">
                <?php
                $itin_args = array( 'post_type' => 'itinerary', 'posts_per_page' => 3, 'meta_key' => 'featured', 'meta_value' => '1' );
                $itin_query = new WP_Query($itin_args);
                if($itin_query->have_posts()) : while($itin_query->have_posts()) : $itin_query->the_post(); 
                    $tier_info = prestige_get_tier_info(get_field('tier'));
                ?>
                <a href="<?php the_permalink(); ?>" class="card card-itinerary">
                    <span class="tier-badge <?php echo esc_attr($tier_info['class']); ?>"><?php echo esc_html($tier_info['label']); ?></span>
                    <?php if(has_post_thumbnail()) the_post_thumbnail('large'); ?>
                    <div class="card-overlay">
                        <h3><?php the_title(); ?></h3>
                        <p>From €<?php echo esc_html(get_field('price_from')); ?> pp</p>
                    </div>
                </a>
                <?php endwhile; wp_reset_postdata(); endif; ?>
            </div>
        </div>
    </section>

    <!-- Payment Plans Teaser -->
    <section class="section-dark">
        <div class="container">
            <h2>Travel Now. Pay Your Way.</h2>
            <p style="max-width:600px; margin-bottom:40px;">Structured payment plans so the trip of a lifetime fits your budget. No hidden fees. No interest. Subject to availability and approval.</p>
            <a href="/payment-plans" class="btn-primary">View Payment Plans</a>
        </div>
    </section>

</main>
<?php get_footer(); ?>
