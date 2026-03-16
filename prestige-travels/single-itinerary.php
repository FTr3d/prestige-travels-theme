<?php
/**
 * Single Itinerary Template
 */
get_header(); 
$quote_url = get_field('quote_form_url', 'option') ?: '/request-a-quote';
?>

<?php while(have_posts()) : the_post(); 
    $tier_info = prestige_get_tier_info(get_field('tier'));
?>
<main class="itinerary-detail">

    <!-- Hero -->
    <section class="hero-full">
        <?php if(has_post_thumbnail()) the_post_thumbnail('full'); else echo '<div style="position:absolute;inset:0;background:#111;z-index:-2;"></div>'; ?>
        <div class="container">
            <span class="tier-badge <?php echo esc_attr($tier_info['class']); ?>" style="position:relative; top:0; right:0; margin-bottom:20px; display:inline-block;"><?php echo esc_html($tier_info['label']); ?></span>
            <h1><?php the_title(); ?></h1>
        </div>
    </section>

    <!-- Overview Bar -->
    <section class="bg-black text-white" style="padding:40px 0; border-top:1px solid rgba(255,255,255,0.2); background:var(--color-black); color:var(--color-white);">
        <div class="container grid-4">
            <div><span class="label-text" style="color:var(--color-gold);">Duration</span><br><?php echo esc_html(get_field('duration')); ?></div>
            <div><span class="label-text" style="color:var(--color-gold);">From Price</span><br>€<?php echo esc_html(get_field('price_from')); ?> pp</div>
            <div><span class="label-text" style="color:var(--color-gold);">Board Basis</span><br><?php echo esc_html(get_field('board_basis')); ?></div>
            <div><span class="label-text" style="color:var(--color-gold);">Hotel</span><br><?php echo esc_html(get_field('resort_hotel')); ?></div>
        </div>
    </section>

    <!-- Flights Note -->
    <section class="section-offwhite" style="padding: 24px 0;">
        <div class="container text-center">
            <span class="label-text">✦ <?php echo esc_html(get_field('flights_note')); ?></span>
        </div>
    </section>

    <!-- Content Sections -->
    <section class="section-light">
        <div class="container grid-2">
            <div>
                <h2>Where you'll stay</h2>
                <div class="body-text"><?php echo wp_kses_post(get_field('resort_description')); ?></div>
            </div>
            <div>
                <h2>Included in your package</h2>
                <div class="body-text"><?php echo wp_kses_post(get_field('highlights')); ?></div>
            </div>
        </div>
    </section>

    <!-- Excursions -->
    <?php if(get_field('excursions')): ?>
    <section class="section-dark">
        <div class="container">
            <h2>Your Experiences</h2>
            <div class="body-text"><?php echo wp_kses_post(get_field('excursions')); ?></div>
        </div>
    </section>
    <?php endif; ?>

    <!-- Final CTA -->
    <section class="section-light text-center">
        <div class="container">
            <h2>Ready to request a quote?</h2>
            <p>Your personal travel advisor will build a tailored plan within 24 hours.</p>
            <div class="cta-pair" style="justify-content:center;">
                <a href="<?php echo esc_url($quote_url); ?>?itinerary=<?php echo urlencode(get_the_title()); ?>" class="btn-primary">Request a Quote</a>
            </div>
        </div>
    </section>

</main>
<?php endwhile; ?>

<?php get_footer(); ?>
