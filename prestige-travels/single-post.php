<?php
/**
 * Single Blog Post Template
 */
get_header(); 
?>

<main class="site-main">
    <?php while(have_posts()) : the_post(); ?>
    
    <section class="hero-half" style="height: 50vh;">
        <div class="container">
            <span class="label-text" style="color:var(--color-gold);"><?php the_category(', '); ?></span>
            <h1><?php the_title(); ?></h1>
            <p><?php echo get_the_date(); ?></p>
        </div>
    </section>

    <section class="section-light">
        <div class="container" style="max-width: 800px;">
            <div class="post-content body-text">
                <?php the_content(); ?>
            </div>
        </div>
    </section>

    <?php endwhile; ?>
</main>

<?php get_footer(); ?>
