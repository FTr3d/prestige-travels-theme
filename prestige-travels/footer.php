<?php
/**
 * Footer Template
 */
$kvk = get_field('kvk_number', 'option') ?: '97890677';
$address = get_field('address', 'option') ?: 'Langswater 198, 1069 TS Amsterdam, NL';
$email = get_field('email', 'option') ?: 'info@prestigetravels.nl';
$whatsapp = get_field('whatsapp_number', 'option') ?: '+31 6 57196097';
?>

<footer class="site-footer">
    <div class="container">
        <div class="footer-logo">
            <!-- Circular logo placeholder -->
            <h2 style="color:var(--color-gold);">PRESTIGE TRAVELS</h2>
            <p style="font-family:'Carla Sans', sans-serif; letter-spacing:0.1em; font-size:12px;">GLOBAL JOURNEYS. PERSONAL TOUCH.</p>
        </div>

        <div class="grid-3">
            <div>
                <h4 style="color:var(--color-gold);">Contact</h4>
                <p><?php echo esc_html($address); ?><br>
                Email: <a href="mailto:<?php echo esc_attr($email); ?>"><?php echo esc_html($email); ?></a><br>
                WhatsApp: <?php echo esc_html($whatsapp); ?></p>
            </div>
            
            <div>
                <h4 style="color:var(--color-gold);">Navigation</h4>
                <p>
                    <a href="/itineraries">Itineraries</a><br>
                    <a href="/how-it-works">How It Works</a><br>
                    <a href="/payment-plans">Payment Plans</a><br>
                    <a href="/about">About</a><br>
                    <a href="/blog">Blog</a>
                </p>
            </div>

            <div>
                <h4 style="color:var(--color-gold);">Legal</h4>
                <p>
                    <a href="/terms">Terms & Conditions</a><br>
                    <a href="/privacy">Privacy Policy</a><br>
                    <a href="/cookies">Cookie Policy</a>
                </p>
            </div>
        </div>

        <div class="footer-bottom">
            <div>&copy; <?php echo date('Y'); ?> Prestige Travels. All rights reserved.</div>
            <div>KvK: <?php echo esc_html($kvk); ?></div>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
