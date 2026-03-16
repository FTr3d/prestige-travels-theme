<?php
/**
 * Header Template
 */
$quote_url = get_field('quote_form_url', 'option') ?: '/request-a-quote';
$whatsapp_url = get_field('whatsapp_url', 'option') ?: 'https://wa.me/31657196097';
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<header class="site-header">
    <div class="container header-inner">
        <div class="header-logo">
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
                <span class="label-text" style="color:var(--color-gold); font-size:18px;">PRESTIGE TRAVELS</span>
            </a>
        </div>
        
        <nav class="header-nav">
            <a href="<?php echo esc_url(home_url('/')); ?>">Home</a>
            <a href="<?php echo esc_url(home_url('/itineraries')); ?>">Itineraries</a>
            <a href="<?php echo esc_url(home_url('/how-it-works')); ?>">How It Works</a>
            <a href="<?php echo esc_url(home_url('/payment-plans')); ?>">Payment Plans</a>
            <a href="<?php echo esc_url(home_url('/about')); ?>">About</a>
        </nav>

        <div class="header-actions">
            <a href="<?php echo esc_url($whatsapp_url); ?>" target="_blank" class="btn-outline" style="padding: 12px 16px;">WhatsApp</a>
            <a href="<?php echo esc_url($quote_url); ?>" class="btn-primary" style="padding: 12px 24px;">Request Quote</a>
        </div>
    </div>
</header>
