<?php 
/**
 * Template Name: Payment Plans
 */
get_header(); 
$quote_url = get_field('quote_form_url', 'option') ?: '/request-a-quote';
?>

<main class="payment-plans site-main">
    <section class="hero-half">
        <div class="container">
            <h1>Travel now. Pay your way.</h1>
            <p style="font-size:20px; max-width:700px;">Flexible payment schedules built around your plans, not a bank's timeline. Offered at our discretion.</p>
        </div>
    </section>

    <section class="section-light">
        <div class="container">
            <h2>A plan as flexible as your schedule</h2>
            <p style="margin-bottom: 40px;">After confirming your itinerary, your advisor will issue a personal payment schedule based on your travel dates. Deposit starts at 25%, with the final balance due 28 days before departure.</p>
            
            <div class="accordion-item" style="border: 1px solid var(--color-gold); padding: 0 24px;">
                <button class="accordion-header">View full payment schedule <span class="icon">+</span></button>
                <div class="accordion-content">
                    <table>
                        <thead>
                            <tr>
                                <th>Booking lead time</th>
                                <th>Deposit</th>
                                <th>Milestones</th>
                                <th>Final balance</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>More than 12 months</td>
                                <td>25% within 5 days</td>
                                <td>50% at 9 months; 75% at 3 months</td>
                                <td>100% at 28 days</td>
                            </tr>
                            <tr>
                                <td>6–12 months</td>
                                <td>25% within 5 days</td>
                                <td>50% at 3 months</td>
                                <td>100% at 28 days</td>
                            </tr>
                            <tr>
                                <td>3–6 months</td>
                                <td>25% within 5 days</td>
                                <td>75% at 6 weeks</td>
                                <td>100% at 28 days</td>
                            </tr>
                            <tr>
                                <td>Under 3 months</td>
                                <td>50% within 5 days</td>
                                <td>—</td>
                                <td>100% at 28 days</td>
                            </tr>
                            <tr>
                                <td>Under 28 days</td>
                                <td>100% at booking</td>
                                <td>—</td>
                                <td>—</td>
                            </tr>
                        </tbody>
                    </table>
                    <p style="margin-top:20px;"><strong>Important:</strong> All cancellation charges are calculated on the full Travel Sum, not just the amount paid so far.</p>
                </div>
            </div>
        </div>
    </section>

    <section class="section-dark">
        <div class="container grid-2">
            <div>
                <h2>Availability & Right to Refuse</h2>
                <p>Payment plans are offered at our <strong>discretion</strong>, and are not automatic. Availability depends on destination, supplier terms, booking lead time, and total Travel Sum.</p>
                <p>We reserve the right to decline a request or withdraw an agreed plan and require full payment if supplier terms change, or if payments are repeatedly late.</p>
            </div>
            <div>
                <h2>Missed Payments</h2>
                <p>We <strong>do not charge interest</strong> on overdue amounts. If a milestone is missed, we will send a written reminder.</p>
                <p>You have 14 calendar days to catch up. If you still fall short, we may treat it as a cancellation by the client and apply cancellation charges on the full Travel Sum as per our Terms & Conditions.</p>
            </div>
        </div>
    </section>

    <section class="section-light text-center">
        <div class="container">
            <h2>Ready to plan?</h2>
            <div class="cta-pair" style="justify-content:center;">
                <a href="<?php echo esc_url($quote_url); ?>" class="btn-primary">Request a Quote</a>
            </div>
        </div>
    </section>
</main>

<?php get_footer(); ?>
