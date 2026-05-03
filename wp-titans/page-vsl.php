<?php
/**
 * Template Name: VSL Landing Page
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
    <style>
        body { background: #000; color: #fff; text-align: center; overflow-x: hidden; }
        .vsl-header { padding: 3rem 10%; border-bottom: 1px solid rgba(255,255,255,0.05); }
        .vsl-content { max-width: 1000px; margin: 6rem auto; padding: 0 5%; }
        .vsl-video-wrap { position: relative; padding-bottom: 56.25%; height: 0; background: #111; border-radius: 12px; box-shadow: 0 30px 60px rgba(0,0,0,0.8); overflow: hidden; margin: 4rem 0; border: 1px solid rgba(255,255,255,0.1); }
        .vsl-video-wrap iframe { position: absolute; top: 0; left: 0; width: 100%; height: 100%; }
        .vsl-tagline { color: var(--primary); font-family: 'Syne'; font-weight: 800; text-transform: uppercase; letter-spacing: 4px; font-size: 0.8rem; margin-bottom: 2rem; display: block; }
        h1 { font-family: 'Syne'; font-size: clamp(2.5rem, 6vw, 4rem); line-height: 1.1; margin-bottom: 2rem; font-weight: 800; letter-spacing: -2px; }
        .vsl-btn { margin-top: 4rem; opacity: 0; transform: translateY(20px); transition: all 1s ease; }
        .vsl-btn.visible { opacity: 1; transform: translateY(0); }
    </style>
</head>
<body <?php body_class(); ?>>

<div class="vsl-header">
    <div class="logo">
        <i class="fas <?php echo esc_attr(wp_titans_get_mod("wp_titans_logo_icon")); ?>"></i>
        <?php echo esc_html(wp_titans_get_mod("wp_titans_logo_text")); ?>
    </div>
</div>

<div class="vsl-content">
    <span class="vsl-tagline">Strategic Protocol: 14-Day Velocity</span>
    <h1>The Authority Blueprint: How to Secure High-Ticket Clients Without the Technical Friction.</h1>

    <div class="vsl-video-wrap">
        <!-- Mock Video Placeholder -->
        <div style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); text-align: center;">
            <i class="fas fa-play-circle" style="font-size: 5rem; color: var(--primary); cursor: pointer;"></i>
            <p style="margin-top: 1rem; font-family: 'Syne'; text-transform: uppercase; letter-spacing: 2px;">Click to Initiate</p>
        </div>
    </div>

    <div id="vsl-cta" class="vsl-btn">
        <p style="font-size: 1.2rem; color: #888; margin-bottom: 2rem;">Ready to build your authority?</p>
        <a href="<?php echo esc_url(wp_titans_get_mod("wp_titans_hero_btn2_url")); ?>" class="btn btn-primary" style="padding: 1.5rem 4rem; font-size: 1.1rem;">Schedule Your Free Authority Audit</a>
        <div style="margin-top: 3rem; display: flex; justify-content: center; gap: 3rem; opacity: 0.5;">
             <div style="font-size: 0.8rem;"><i class="fas fa-check" style="color: var(--primary);"></i> Manual Review</div>
             <div style="font-size: 0.8rem;"><i class="fas fa-check" style="color: var(--primary);"></i> 24-Hour Delivery</div>
             <div style="font-size: 0.8rem;"><i class="fas fa-check" style="color: var(--primary);"></i> Zero Obligation</div>
        </div>
    </div>
</div>

<script>
    // Reveal CTA after 5 seconds (simulating watching a portion of the video)
    setTimeout(() => {
        document.getElementById('vsl-cta').classList.add('visible');
    }, 5000);
</script>

<?php wp_footer(); ?>
</body>
</html>
