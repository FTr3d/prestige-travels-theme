<?php
/**
 * The main template file (Fallback)
 * 
 * This is the most generic template file in a WordPress theme
 * and is strictly required by WordPress alongside style.css.
 */
get_header(); 
?>

<main class="site-main">
    
    <!-- Generic Hero -->
    <section class="hero-half" style="height: 40vh;">
        <div class="container">
            <?php if ( is_archive() ) : ?>
                <h1><?php the_archive_title(); ?></h1>
            <?php elseif ( is_search() ) : ?>
                <h1>Search Results for: <?php echo get_search_query(); ?></h1>
            <?php else : ?>
                <h1><?php single_post_title(); ?></h1>
            <?php endif; ?>
        </div>
    </section>

    <!-- Generic Content Loop -->
    <section class="section-light">
        <div class="container" style="max-width: 800px;">
            
            <?php if ( have_posts() ) : ?>
                
                <?php while ( have_posts() ) : the_post(); ?>
                    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?> style="margin-bottom: 60px; padding-bottom: 40px; border-bottom: 1px solid rgba(0,0,0,0.1);">
                        <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                        
                        <div class="body-text">
                            <?php 
                            if ( is_singular() ) {
                                the_content(); 
                            } else {
                                the_excerpt(); 
                                echo '<a href="' . get_permalink() . '" class="btn-outline" style="margin-top: 20px; color: var(--color-black); border-color: var(--color-black);">Read More</a>';
                            }
                            ?>
                        </div>
                    </article>
                <?php endwhile; ?>

                <!-- Pagination -->
                <div class="pagination" style="font-family: 'Carla Sans', sans-serif; text-transform: uppercase;">
                    <?php 
                    the_posts_pagination( array(
                        'mid_size'  => 2,
                        'prev_text' => '← Previous',
                        'next_text' => 'Next →',
                    ) ); 
                    ?>
                </div>

            <?php else : ?>
                
                <h2>Nothing Found</h2>
                <p class="body-text">It seems we can't find what you're looking for. Perhaps searching can help.</p>
                <?php get_search_form(); ?>
                
            <?php endif; ?>

        </div>
    </section>

</main>

<?php get_footer(); ?>
