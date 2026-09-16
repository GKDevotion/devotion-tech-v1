<?php
// ---- Load services from JSON ----
$servicesPath = __DIR__ . '/data/services.json';
$services = [];
if (file_exists($servicesPath)) {
    $json = file_get_contents($servicesPath);
    $decoded = json_decode($json, true);
    if (is_array($decoded)) {
        $services = $decoded;
    }
}

// ---- Resolve the requested service by slug ----
$slug = isset($_GET['slug']) ? preg_replace('/[^a-z0-9\-]/', '', strtolower($_GET['slug'])) : '';
$service = null;
foreach ($services as $s) {
    if ($s['slug'] === $slug) {
        $service = $s;
        break;
    }
}
// Fallback to the first service so the page never renders empty during development
if (!$service && count($services) > 0) {
    $service = $services[0];
}

$seo = [
    'title' => ($service ? $service['title'] : 'Service') . ' | Devotion Technologies - Technology Experts & Innovators',
    'description' => $service ? $service['tagline'] : 'Explore our services at Devotion Technologies.',
    'keywords' => 'Devotion Technologies ' . ($service ? strtolower($service['title']) : 'services') . ', IT services, technology solutions',
    'author' => 'Devotion Technologies'
];
include_once('elements/header.php');

// ---- Inline icon library, keyed by the "icon" field in services.json ----
$icons = [
    'globe'     => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><circle cx="12" cy="12" r="9" /><path d="M3 12h18M12 3c2.5 2.6 3.8 5.7 3.8 9s-1.3 6.4-3.8 9c-2.5-2.6-3.8-5.7-3.8-9S9.5 5.6 12 3z" /></svg>',
    'device'    => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><rect x="7" y="2" width="10" height="20" rx="2" /><path d="M11 18h2" /></svg>',
    'palette'   => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M12 2a10 10 0 100 20c1.5 0 2-1 2-2s-.5-1.5-.5-2.5 1-2 2-2H17a3 3 0 003-3c0-5.5-4-10.5-8-10.5z" /><circle cx="7.5" cy="10.5" r="1" /><circle cx="10.5" cy="7" r="1" /><circle cx="15" cy="8" r="1" /></svg>',
    'edit'      => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M12 20h9" /><path d="M16.5 3.5a2.1 2.1 0 013 3L7 19l-4 1 1-4z" /></svg>',
    'code'      => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M9 18l-6-6 6-6M15 6l6 6-6 6" /></svg>',
    'wrench'    => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M14.7 6.3a4 4 0 00-5.4 5.4L2 19l3 3 7.3-7.3a4 4 0 005.4-5.4l-2.6 2.6-2-2z" /></svg>',
    'pen-ruler' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M12 19l7-7 3 3-7 7-3-3z" /><path d="M18 13l-1.5-7.5L2 2l3.5 14.5L13 18" /><path d="M2 2l7.5 7.5" /></svg>',
    'cart'      => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><circle cx="9" cy="21" r="1" /><circle cx="19" cy="21" r="1" /><path d="M2.5 2.5h3l2.7 12.4a2 2 0 002 1.6h8.3a2 2 0 002-1.6l1.5-7.4H6" /></svg>',
    'megaphone' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M3 11v3a1 1 0 001 1h2l4 5V6l-4 5H4a1 1 0 00-1 1z" /><path d="M15 8a4 4 0 010 8M18 5a8 8 0 010 14" /></svg>',
];
function svc_icon($icons, $key)
{
    return isset($icons[$key]) ? $icons[$key] : $icons['code'];
}

// Other services for the sidebar nav + related strip (everything except the current one)
$otherServices = array_values(array_filter($services, function ($s) use ($service) {
    return !$service || $s['slug'] !== $service['slug'];
}));
?>

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">

<style>
    a {
        text-decoration: none;
        color: inherit;
    }

    ul,
    ol {
        margin: 0;
        padding: 0;
        list-style: none;
    }

    img {
        max-width: 100%;
        display: block;
    }

    .btn {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
        padding: 13px 26px;
        border-radius: 999px;
        font-weight: 600;
        font-size: .92rem;
        cursor: pointer;
        border: 1.5px solid transparent;
        transition: all .25s ease;
        white-space: nowrap;
    }

    .btn-gold {
        background: #b38f51;
        color: #fff;
    }

    .btn-gold:hover {
        background: #8f7040;
        transform: translateY(-2px);
        color: #fff;
    }

    .btn-outline-light {
        border-color: rgba(255, 255, 255, .35);
        color: #fff;
    }

    .btn-outline-light:hover {
        border-color: #fff;
        background: rgba(255, 255, 255, .08);
        color: #fff;
    }

    section {
        padding: 80px 0;
    }

    .section-head {
        margin-bottom: 36px;
    }

    .section-head h2 {
        font-size: clamp(1.5rem, 2.2vw, 1.9rem);
        font-weight: 700;
        margin: 12px 0 10px;
        color: #070d24;
    }

    .section-head p {
        color: #6c7280;
        font-size: 1rem;
    }

    /* ---------- BREADCRUMB ---------- */
    .breadcrumb-bar {
        background: #fff;
        border-bottom: 1px solid #e8e3d6;
        padding: 16px 0;
    }

    .breadcrumb-bar ul {
        display: flex;
        flex-wrap: wrap;
        align-items: center;
        gap: 8px;
        font-size: 1.2rem;
        color: #6c7280;
    }

    .breadcrumb-bar a:hover {
        color: #8f7040;
    }

    .breadcrumb-bar li.current {
        color: #070d24;
        font-weight: 600;
    }

    .breadcrumb-bar .sep {
        color: #c7cbd3;
    }


    /* =========================================
   SERVICE HERO SECTION
========================================= */

    .svc-hero {
        position: relative;
        isolation: isolate;
        overflow: hidden;

        min-height: 280px;

        display: flex;
        align-items: center;

        background-color: #08132f;
        color: #ffffff;
    }

    /* Background Image */

    .svc-hero-bg {
        position: absolute;
        inset: 0;
        z-index: -2;

        background-image: url('../d-tech/assets/images/service-hero-bg.jpg');
        background-size: cover;
        background-position: center center;
        background-repeat: no-repeat;

        transform: scale(1.02);
    }

    /* Dark Navy Overlay */

    .svc-hero-overlay {
        position: absolute;
        inset: 0;
        z-index: -1;

    }

    /* Inner Layout */

    .svc-hero-inner {
        min-height: 280px;
        display: grid;
        grid-template-columns: 670px minmax(0, 1fr) auto;
        align-items: center;
        gap: 24px;
        padding: 42px 0;
    }

    /* Service Icon */

    .svc-hero-icon {
        width: 64px;
        height: 64px;

        display: flex;
        align-items: center;
        justify-content: center;

        border: 1px solid rgba(255, 255, 255, 0.20);
        border-radius: 16px;

        background: rgba(255, 255, 255, 0.07);

        color: #b38f51;
        font-size: 29px;

        flex-shrink: 0;

        backdrop-filter: blur(8px);
    }

    .svc-hero-icon svg {
        width: 30px;
        height: 30px;
    }

    /* Content */

    .svc-hero-content {
        min-width: 0;
    }

    .svc-hero .eyebrow {
        display: block;
        margin-bottom: 10px;
        color: #b38f51;
        font-size: 1.5rem;
        font-weight: 500;
        letter-spacing: 0.5px;
    }

    .svc-hero h1 {
        margin: 0 0 8px;

        color: #ffffff;

        font-size: clamp(30px, 3vw, 40px);
        font-weight: 700;

        line-height: 1.2;
        letter-spacing: -0.7px;
    }

    .svc-hero .tagline {
        margin: 0;
        color: rgba(255, 255, 255, 0.78);
        font-size: 1.2rem;
        font-weight: 400;
        line-height: 1.7;
    }

    /* Right Statistic */

    .svc-hero-stat {
        min-width: 190px;

        padding-left: 26px;

        border-left: 1px solid rgba(255, 255, 255, 0.18);

        display: flex;
        flex-direction: column;
        justify-content: center;
    }

    .svc-hero-stat strong {
        display: block;

        margin-bottom: 5px;

        color: #b38f51;

        font-size: 32px;
        font-weight: 700;

        line-height: 1.2;
        letter-spacing: -0.5px;
    }

    .svc-hero-stat span {
        display: block;
        color: rgba(255, 255, 255, 0.70);
        font-size: 1rem;
        font-weight: 400;
        line-height: 1.5;
    }


    /* =========================================
   TABLET
========================================= */

    @media (max-width: 991.98px) {

        .svc-hero-inner {
            grid-template-columns: 58px minmax(0, 1fr) auto;
            gap: 18px;

            padding: 36px 0;
        }

        .svc-hero-icon {
            width: 58px;
            height: 58px;
        }

        .svc-hero-stat {
            min-width: 145px;
            padding-left: 20px;
        }

        .svc-hero-stat strong {
            font-size: 28px;
        }

    }


    /* =========================================
   MOBILE
========================================= */

    @media (max-width: 767.98px) {

        .svc-hero {
            min-height: auto;
        }

        .svc-hero-inner {
            min-height: auto;

            display: grid;
            grid-template-columns: 54px minmax(0, 1fr);

            gap: 16px;

            padding: 38px 0;
        }

        .svc-hero-icon {
            width: 54px;
            height: 54px;

            border-radius: 14px;

            font-size: 25px;
        }

        .svc-hero-icon svg {
            width: 26px;
            height: 26px;
        }

        .svc-hero .eyebrow {
            font-size: 12px;
            margin-bottom: 7px;
        }

        .svc-hero h1 {
            font-size: 29px;
            line-height: 1.25;
            letter-spacing: -0.4px;
        }

        .svc-hero .tagline {
            font-size: 14px;
            line-height: 1.6;
        }

        .svc-hero-stat {
            grid-column: 1 / -1;

            min-width: 0;

            margin-top: 8px;
            padding: 20px 0 0;

            border-left: 0;
            border-top: 1px solid rgba(255, 255, 255, 0.18);

            display: flex;
            flex-direction: row;
            align-items: center;
            gap: 14px;
        }

        .svc-hero-stat strong {
            margin: 0;
            font-size: 28px;
        }

        .svc-hero-stat span {
            font-size: 12px;
        }

    }


    /* =========================================
   SMALL MOBILE
========================================= */

    @media (max-width: 400px) {

        .svc-hero-inner {
            grid-template-columns: 48px minmax(0, 1fr);
            gap: 13px;
        }

        .svc-hero-icon {
            width: 48px;
            height: 48px;
        }

        .svc-hero h1 {
            font-size: 25px;
        }

    }


    /* =========================================
    SERVICE DETAILS SECTION
    Premium Navy + Gold Design
    ========================================= */

    :root {
        --svc-navy: #070D24;
        --svc-navy-light: #101B3D;
        --svc-gold: #B38F51;
        --svc-gold-light: #F7F2E8;
        --svc-cream: #FCFAF6;
        --svc-border: #E8E0D4;
        --svc-text: #0B1735;
        --svc-muted: #697286;
    }

    /* =========================================
    MAIN SECTION
    ========================================= */
    .svc-details-section {
        position: relative;
        padding: 95px 0 110px;
        background: #ffffff;
    }

    /* =========================================
    TWO COLUMN LAYOUT
    ========================================= */
    .body-layout {
        display: grid;
        grid-template-columns: minmax(0, 1fr) 380px;
        align-items: start;
        gap: 44px;
    }

    .main-copy {
        min-width: 0;
    }


    /* =========================================
   OVERVIEW
========================================= */

    .svc-overview-block {
        margin-bottom: 38px;
    }

    .svc-content-label {
        display: inline-flex;
        align-items: center;
        gap: 9px;
        margin-bottom: 20px;
        color: var(--svc-gold);
        font-size: 1rem;
        font-weight: 700;
        letter-spacing: 1.4px;
        text-transform: uppercase;
    }

    .svc-label-dot {
        width: 7px;
        height: 7px;

        border-radius: 50%;

        background: var(--svc-gold);
    }

    .svc-details-section .lede {
        max-width: 780px;
        margin: 0;
        color: #1C2B4B;
        font-size: 1.2rem;
        line-height: 1.95;
        font-weight: 400;
    }


    /* =========================================
    FEATURES HEADING
    ========================================= */

    .svc-features-head {
        margin-bottom: 28px;
    }

    .svc-features-head .badge-pill {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        padding: 8px 15px;
        border: 1px solid #E4DCCF;
        border-radius: 50px;
        background: #FFFEFC;
        color: #263653;
        font-size: 1.2rem;
        font-weight: 600;
    }

    .svc-features-head .dot {
        width: 7px;
        height: 7px;

        border-radius: 50%;

        background: var(--svc-gold);
    }

    .svc-features-head h2 {
        max-width: 600px;

        margin: 18px 0 12px;

        color: var(--svc-navy);

        font-size: clamp(27px, 3vw, 36px);
        font-weight: 700;

        line-height: 1.25;
        letter-spacing: -0.7px;
    }

    .svc-section-description {
        margin: 0;
        color: var(--svc-muted);
        font-size: 14px;
        line-height: 1.8;
    }


    /* =========================================
    FEATURE LIST
    ========================================= */

    .feature-list {
        display: flex;

        flex-direction: column;

        gap: 13px;

        margin: 0;
        padding: 0;

        list-style: none;
    }

    .feature-item {
        position: relative;
        display: flex;
        align-items: center;
        gap: 17px;
        min-height: 86px;
        padding: 19px 22px;
        border: 1px solid var(--svc-border);
        border-radius: 13px;
        transition:border-color 0.25s ease, background 0.25s ease, transform 0.25s ease, box-shadow 0.25s ease;
    }

    .feature-number {
        min-width: 25px;
        color: #B8A991;
        font-size: 1.2rem;
        font-weight: 600;
        letter-spacing: 0.5px;
    }

    .feature-icon {
        width: 43px;
        height: 43px;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
        border-radius: 12px;
        background: var(--svc-gold-light);
        color: var(--svc-gold);
    }

    .feature-icon svg {
        width: 21px;
        height: 21px;
    }

    .feature-content {
        flex: 1;
        min-width: 0;
    }

    .feature-content p {
        margin: 0;
        color: #152546;
        font-size: 1rem;
        font-weight: 500;
        line-height: 1.65;
    }

    .feature-arrow {
        width: 28px;
        height: 28px;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
        border-radius: 50%;
        background: #F6F3ED;
        color: #A08B68;
        opacity: 0;
        transform: translateX(-5px);
        transition: opacity 0.25s ease, transform 0.25s ease;
    }

    .feature-arrow svg {
        width: 15px;
        height: 15px;
    }


    /* Hover */
    .feature-item:hover {
        border-color: #D5C4A7;
        background: #FFFDF9;
        transform: translateY(-2px);
        box-shadow: 0 10px 30px rgba(7, 13, 36, 0.045);
    }

    .feature-item:hover .feature-arrow {
        opacity: 1;
        transform: translateX(0);
    }


    /* =========================================
    BOTTOM HIGHLIGHT
    ========================================= */

    .svc-bottom-highlight {
        display: flex;
        align-items: center;
        gap: 18px;
        margin-top: 30px;
        padding: 25px 27px;
        border: 1px solid #E6DDCF;
        border-radius: 14px;
        background:linear-gradient(135deg, #FCF9F2 0%,#F6F0E5 100%);
    }

    .highlight-icon {
        width: 45px;
        height: 45px;

        display: flex;
        align-items: center;
        justify-content: center;

        flex-shrink: 0;

        border-radius: 12px;

        background: #FFFFFF;

        color: var(--svc-gold);

        box-shadow: 0 3px 12px rgba(7, 13, 36, 0.04);
    }

    .highlight-icon svg {
        width: 23px;
        height: 23px;
    }

    .svc-bottom-highlight h4 {
        margin: 0 0 5px;
        color: var(--svc-navy);
        font-size: 1rem;
        font-weight: 700;
    }

    .svc-bottom-highlight p {
        margin: 0;
        color: #6C6B67;
        font-size: 1rem;
        line-height: 1.7;
    }


    /* =========================================
    SIDEBAR
    ========================================= */

    .svc-sidebar {
        position: sticky;
        top: 30px;
        display: flex;
        flex-direction: column;
        gap: 18px;
        min-width: 0;
    }

    .sidebar-card {
        overflow: hidden;

        border: 1px solid #E6DFD4;
        border-radius: 17px;

        background: #FFFFFF;
    }


    /* =========================================
    SERVICES CARD
    ========================================= */

    .services-card {
        padding: 21px 13px 13px;
    }

    .sidebar-card-header {
        display: flex;

        flex-direction: column;

        gap: 7px;

        padding: 0 8px 15px;
    }

    .sc-label {
        color: #A78C5D;
        font-size: 1.5rem;
        font-weight: 600;
        letter-spacing: 1.2px;
    }

    .sidebar-count {
        color: #9A9CA5;
        font-size: 1.2rem;
    }

    .sidebar-nav {
        display: flex;

        flex-direction: column;

        gap: 3px;

        margin: 0;
        padding: 0;

        list-style: none;
    }

    .sidebar-nav li {
        margin: 0;
        padding: 0;
    }

    .sidebar-nav a {
        display: flex;
        align-items: center;
        gap: 10px;
        min-height: 47px;
        padding: 10px 11px;
        border-radius: 10px;
        color: #747B8E;
        font-size: 12px;
        font-weight: 500;
        line-height: 1.45;
        text-decoration: none;
        transition:color 0.2s ease, background 0.2s ease;
    }

    .service-nav-icon {
        width: 25px;
        height: 25px;

        display: flex;
        align-items: center;
        justify-content: center;

        flex-shrink: 0;

        color: #B6A17C;
    }

    .service-nav-icon svg {
        width: 17px;
        height: 17px;
    }

    .service-nav-title {
        flex: 1;
        min-width: 0;
        font-size: 1rem;
    }

    .service-nav-arrow {
        color: #B9AA93;

        font-size: 15px;

        opacity: 0;

        transition: opacity 0.2s ease;
    }


    /* Active service */
    .sidebar-nav a.active {
        background: #F5F1EA;

        color: var(--svc-navy);

        font-weight: 700;
    }

    .sidebar-nav a.active .service-nav-icon {
        color: var(--svc-gold);
    }

    .sidebar-nav a.active .service-nav-arrow {
        opacity: 1;
        color: var(--svc-gold);
    }

    /* Hover */
    .sidebar-nav a:hover:not(.active) {
        background: #FBF9F5;
        color: var(--svc-navy);
    }

    .sidebar-nav a:hover .service-nav-arrow {
        opacity: 1;
    }


    /* =========================================
    CTA SIDEBAR
    ========================================= */

    .sidebar-cta {
        position: relative;
        padding: 25px 20px 21px;
        border-color: #202A48;
        background: black;
        color: #FFFFFF;
    }

    .cta-top {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 12px;
        margin-bottom: 20px;
    }

    .cta-eyebrow {
        color: #C5A66F;
        font-size: 1rem;
        font-weight: 700;
        letter-spacing: 1.2px;
    }

    .cta-icon {
        width: 34px;
        height: 34px;
        display: flex;
        align-items: center;
        justify-content: center;
        border: 1px solid rgba(255, 255, 255, 0.16);
        border-radius: 50%;
        background: rgba(255, 255, 255, 0.07);
        color: #D7B778;
    }

    .cta-icon svg {
        width: 17px;
        height: 17px;
    }

    .sidebar-cta h4 {
        margin: 0 0 12px;
        color: #FFFFFF;
        font-size: 1.2rem;
        font-weight: 700;
        line-height: 1.4;
        letter-spacing: -0.3px;
    }

    .sidebar-cta p {
        margin: 0 0 22px;
        color: rgba(255, 255, 255, 0.64);
        font-size: 1rem;
        line-height: 1.8;
    }

    .sidebar-cta .btn-gold {
        width: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 10px;
        padding: 14px 15px;
        border: 0;
        border-radius: 50px;
        background: var(--svc-gold);
        color: #FFFFFF;
        font-size: 1rem;
        font-weight: 700;
        text-decoration: none;
        transition: background 0.2s ease, transform 0.2s ease;
    }

    .sidebar-cta .btn-gold span {
        font-size: 16px;
    }

    .sidebar-cta .btn-gold:hover {
        background: #C4A46B;
        color: #FFFFFF;
        transform: translateY(-2px);
    }

    .cta-bottom {
        display: flex;
        align-items: center;
        gap: 8px;
        margin-top: 18px;
        color: rgba(255, 255, 255, 0.42);
        font-size: 1rem;
    }

    .cta-bottom-dot {
        width: 5px;
        height: 5px;
        border-radius: 50%;
        background: #B38F51;
    }


    /* =========================================
    RESPONSIVE TABLET
    ========================================= */

    @media (max-width: 991.98px) {

        .svc-details-section {
            padding: 70px 0 80px;
        }

        .body-layout {
            grid-template-columns: minmax(0, 1fr) 245px;

            gap: 28px;
        }

        .feature-item {
            padding: 17px 18px;
        }

        .feature-number {
            display: none;
        }

        .sidebar-cta {
            padding: 22px 17px;
        }

        .sidebar-cta h4 {
            font-size: 18px;
        }

    }


    /* =========================================
    RESPONSIVE MOBILE
    ========================================= */

    @media (max-width: 767.98px) {

        .svc-details-section {
            padding: 55px 0 65px;
        }

        .body-layout {
            display: flex;

            flex-direction: column;

            gap: 42px;
        }

        .main-copy {
            width: 100%;
        }

        .svc-details-section .lede {
            font-size: 14px;
            line-height: 1.85;
        }

        .svc-features-head h2 {
            font-size: 28px;
            line-height: 1.3;
        }

        .svc-section-description {
            font-size: 13px;
        }

        .feature-item {
            min-height: 78px;

            gap: 13px;

            padding: 16px;
        }

        .feature-icon {
            width: 39px;
            height: 39px;

            border-radius: 10px;
        }

        .feature-icon svg {
            width: 19px;
            height: 19px;
        }

        .feature-content p {
            font-size: 13px;
        }

        .feature-arrow {
            display: none;
        }

        .svc-bottom-highlight {
            align-items: flex-start;

            padding: 20px;

            gap: 13px;
        }

        .highlight-icon {
            width: 40px;
            height: 40px;
        }

        .svc-bottom-highlight h4 {
            font-size: 14px;
        }

        .svc-bottom-highlight p {
            font-size: 12px;
        }

        .svc-sidebar {
            position: static;

            width: 100%;
        }

        .services-card {
            padding: 20px 12px 12px;
        }

        .sidebar-nav a {
            min-height: 48px;

            padding: 11px 12px;

            font-size: 13px;
        }

        .sidebar-cta {
            padding: 26px 22px;
        }

        .sidebar-cta h4 {
            font-size: 22px;
        }

        .sidebar-cta p {
            font-size: 13px;
        }

    }


    /* =========================================
    PROCESS TIMELINE
    Premium Navy + Gold + Colorful Cards
    ========================================= */

    .process-section {
        position: relative;
        padding: 100px 0 115px;
        overflow: hidden;
        background: linear-gradient(135deg,#FCFAF6 0%,#F8F5EF 52%,#F1F4F8 100%);
    }

    /* Decorative background shapes */

    .process-section::before {
        content: "";
        position: absolute;
        top: -180px;
        right: -160px;
        width: 460px;
        height: 460px;
        border-radius: 50%;
        background: rgba(179, 143, 81, 0.055);
        pointer-events: none;
    }

    .process-section::after {
        content: "";
        position: absolute;
        bottom: -220px;
        left: -180px;
        width: 430px;
        height: 430px;
        border-radius: 50%;
        background: rgba(30, 55, 110, 0.035);
        pointer-events: none;
    }


    /* =========================================
    SECTION HEADING
    ========================================= */

    .process-heading {
        position: relative;
        z-index: 1;
        margin: 0 auto 52px;
        text-align: center;
    }

    .process-heading .badge-pill {
        display: inline-flex;
        align-items: center;
        gap: 9px;
        padding: 9px 16px;
        border: 1px solid #E1D9CB;
        border-radius: 50px;
        background: rgba(255, 255, 255, 0.85);
        color: #35435E;
        font-size: 1rem;
        font-weight: 600;
    }

    .process-heading .dot {
        width: 7px;
        height: 7px;
        border-radius: 50%;
        background: #B38F51;
    }

    .process-heading h2 {
        margin: 10px 0 13px;
        color: #070D24;
        font-size: clamp(28px, 3.4vw, 40px);
        font-weight: 700;
        line-height: 1.25;
        letter-spacing: -0.8px;
    }

    .process-heading p {
        margin: 0 auto;
        color: #71798A;
        font-size: 1.2rem;
        line-height: 1.8;
    }


    /* =========================================
    TIMELINE WRAPPER
    ========================================= */

    .process-timeline {
        position: relative;
        z-index: 1;
        margin: 0 auto;
    }


    /* Vertical line */
    .process-timeline::before {
        content: "";
        position: absolute;
        top: 42px;
        bottom: 42px;
        left: 31px;
        width: 1px;
        background: linear-gradient(to bottom, rgba(179, 143, 81, 0.15), #D9C6A4 15%, #D9C6A4 85%, rgba(179, 143, 81, 0.15));
    }


    /* =========================================
    TIMELINE ITEM
    ========================================= */
    .process-item {
        position: relative;
        display: grid;
        grid-template-columns: 64px minmax(0, 1fr);
        gap: 22px;
        align-items: start;
        margin-bottom: 28px;
    }

    .process-item:last-child {
        margin-bottom: 0;
    }


    /* =========================================
    NUMBER MARKER
    ========================================= */
    .process-marker {
        position: relative;
        z-index: 2;
        width: 64px;
        height: 64px;
        display: flex;
        align-items: center;
        justify-content: center;
        border: 1px solid #D9B978;
        border-radius: 50%;
        background: #FFFFFF;
        box-shadow:
            0 0 0 7px rgba(252, 250, 246, 0.95),
            0 7px 20px rgba(7, 13, 36, 0.04);
    }

    .process-marker span {
        color: #A47C39;
        font-size: 14px;
        font-weight: 700;
        letter-spacing: 0.3px;
    }

    /* =========================================
    PROCESS CARD
    ========================================= */
    .process-card {
        position: relative;
        min-height: 145px;
        padding: 28px 31px;
        border: 1px solid #E6DED1;
        border-radius: 16px;
        background: rgba(255, 255, 255, 0.94);
        box-shadow: 0 5px 20px rgba(7, 13, 36, 0.025);
        transition:
            transform 0.25s ease,
            box-shadow 0.25s ease,
            border-color 0.25s ease;
    }

    .process-card::before {
        content: "";
        position: absolute;
        top: 20px;
        left: 0;
        width: 4px;
        height: 75%;
        border-radius: 16px 0 0 16px;
        background: #B38F51;
        opacity: 0;
        transition: opacity 0.25s ease;
    }

    /* Card top */

    .process-card-top {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 15px;
        margin-bottom: 12px;
    }

    .process-step-label {
        color: #B38F51;
        font-size: 1rem;
        font-weight: 700;
        letter-spacing: 1.4px;
    }

    .process-card-arrow {
        width: 50px;
        height: 50px;
        display: flex;
        align-items: center;
        justify-content: center;
        border: 1px solid #ECE5D9;
        border-radius: 50%;
        background: #FCFAF6;
        color: #B38F51;
        font-size: 1.5rem;
        transition: background 0.25s ease, color 0.25s ease;
    }


    /* Card typography */

    .process-card h4 {
        margin: 0 0 9px;

        color: #07112E;

        font-size: 18px;
        font-weight: 700;

        line-height: 1.4;
    }

    .process-card p {
        margin: 0;
        color: #71798A;
        font-size: 1.2rem;
        font-weight: 400;
        line-height: 1.8;
    }


    /* =========================================
    COLORFUL CARD VARIATIONS
    ========================================= */

    .process-item:nth-child(2) .process-marker {
        border-color: #9DB8D6;
    }

    .process-item:nth-child(2) .process-marker span {
        color: #527DAE;
    }

    .process-item:nth-child(2) .process-card::before {
        background: #527DAE;
    }

    .process-item:nth-child(3) .process-marker {
        border-color: #A9C8B7;
    }

    .process-item:nth-child(3) .process-marker span {
        color: #4D8B70;
    }

    .process-item:nth-child(3) .process-card::before {
        background: #4D8B70;
    }

    .process-item:nth-child(4) .process-marker {
        border-color: #C5B2D8;
    }

    .process-item:nth-child(4) .process-marker span {
        color: #8060A4;
    }

    .process-item:nth-child(4) .process-card::before {
        background: #8060A4;
    }


    /* =========================================
   HOVER EFFECT
========================================= */

    .process-card:hover {
        transform: translateY(-4px);

        border-color: #D7C6AB;

        box-shadow:
            0 14px 35px rgba(7, 13, 36, 0.07);
    }

    .process-card:hover::before {
        opacity: 1;
    }

    .process-card:hover .process-card-arrow {
        background: #B38F51;

        border-color: #B38F51;

        color: #FFFFFF;
    }


    /* =========================================
    TABLET
    ========================================= */

    @media (max-width: 991.98px) {

        .process-section {
            padding: 75px 0 90px;
        }

        .process-heading {
            margin-bottom: 40px;
        }

        .process-timeline {
            max-width: 720px;
        }

        .process-item {
            gap: 18px;

            grid-template-columns: 58px minmax(0, 1fr);
        }

        .process-marker {
            width: 58px;
            height: 58px;
        }

        .process-timeline::before {
            left: 28px;
        }

        .process-card {
            padding: 24px 25px;
        }

    }


    /* =========================================
    MOBILE
    ========================================= */

    @media (max-width: 767.98px) {

        .process-section {
            padding: 60px 0 70px;
        }

        .process-heading {
            margin-bottom: 34px;

            text-align: left;
        }

        .process-heading h2 {
            font-size: 29px;

            letter-spacing: -0.5px;
        }

        .process-heading p {
            font-size: 13px;
        }

        .process-timeline::before {
            top: 29px;
            bottom: 29px;
            left: 23px;
        }

        .process-item {
            grid-template-columns: 48px minmax(0, 1fr);

            gap: 14px;

            margin-bottom: 20px;
        }

        .process-marker {
            width: 48px;
            height: 48px;

            box-shadow:
                0 0 0 5px rgba(252, 250, 246, 0.95),
                0 5px 14px rgba(7, 13, 36, 0.04);
        }

        .process-marker span {
            font-size: 12px;
        }

        .process-card {
            min-height: 0;

            padding: 20px 18px;

            border-radius: 13px;
        }

        .process-card-top {
            margin-bottom: 9px;
        }

        .process-step-label {
            font-size: 9px;
        }

        .process-card-arrow {
            width: 25px;
            height: 25px;

            font-size: 14px;
        }

        .process-card h4 {
            font-size: 15px;
            line-height: 1.45;
        }

        .process-card p {
            font-size: 12px;
            line-height: 1.75;
        }

    }


    /* =========================================
    EXTRA SMALL MOBILE
    ========================================= */

    @media (max-width: 380px) {

        .process-item {
            grid-template-columns: 42px minmax(0, 1fr);

            gap: 12px;
        }

        .process-marker {
            width: 42px;
            height: 42px;
        }

        .process-timeline::before {
            left: 20px;
        }

        .process-card {
            padding: 17px 15px;
        }

        .process-card h4 {
            font-size: 14px;
        }

    }


    /* =========================================
    TOOLS & TECHNOLOGY SECTION
    Premium Colorful Technology Showcase
    ========================================= */

    .tools-section {
        position: relative;

        padding: 100px 0 110px;

        overflow: hidden;

    }

    /* Decorative background elements */

    .tools-section::before {
        content: "";
        position: absolute;
        top: -180px;
        right: -130px;
        width: 420px;
        height: 420px;
        border-radius: 50%;
        background: rgba(179, 143, 81, 0.06);
        pointer-events: none;
    }

    .tools-section::after {
        content: "";
        position: absolute;
        bottom: -200px;
        left: -150px;
        width: 400px;
        height: 400px;
        border-radius: 50%;
        background: rgba(30, 55, 110, 0.035);
        pointer-events: none;
    }

    /* =========================================
    MAIN LAYOUT
    ========================================= */

    .tools-layout {
        position: relative;
        z-index: 1;
        display: grid;
        grid-template-columns: minmax(0, 0.9fr) minmax(0, 1.1fr);
        align-items: center;
        gap: 70px;
    }


    /* =========================================
    LEFT CONTENT
    ========================================= */

    .tools-content {
        max-width: 440px;
    }

    .tools-badge {
        display: inline-flex;
        align-items: center;
        gap: 9px;
        padding: 9px 16px;
        border: 1px solid #E1D9CB;
        border-radius: 50px;
        background: rgba(255, 255, 255, 0.85);
        color: #35435E;
        font-size: 1rem;
        font-weight: 600;
    }

    .tools-badge .dot {
        width: 7px;
        height: 7px;
        border-radius: 50%;
        background: #B38F51;
    }

    .tools-content h2 {
        margin: 20px 0 17px;
        color: #070D24;
        font-size: clamp(30px, 3.3vw, 43px);
        font-weight: 700;
        line-height: 1.2;
        letter-spacing: -1px;
    }

    .tools-description {
        margin: 0;
        color: #71798A;
        font-size: 1rem;
        line-height: 1.9;
    }

    .tools-divider {
        width: 58px;
        height: 3px;
        margin: 28px 0 22px;
        border-radius: 20px;
        background: #B38F51;
    }

    .tools-trust {
        display: flex;
        align-items: center;
        gap: 10px;
        color: #4C5870;
        font-size: 1rem;
        font-weight: 600;
    }

    .trust-icon {
        width: 40px;
        height: 40px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 50%;
        background: #E7EFE9;
        color: #4D8B70;
        font-size: 1.5rem;
        font-weight: 700;
    }


    /* =========================================
    TECHNOLOGY GRID
    ========================================= */

    .tools-grid {
        display: grid;
        grid-template-columns: repeat(3, minmax(0, 1fr));
        gap: 15px;
    }


    /* =========================================
    TECHNOLOGY CARD
    ========================================= */

    .technology-card {
        position: relative;
        min-height: 178px;
        display: flex;
        flex-direction: column;
        padding: 22px 20px;
        border: 1px solid #E5DED2;
        border-radius: 15px;
        background: rgba(255, 255, 255, 0.94);
        box-shadow: 0 6px 22px rgba(7, 13, 36, 0.025);
        overflow: hidden;
        transition:
            transform 0.25s ease,
            box-shadow 0.25s ease,
            border-color 0.25s ease;
    }


    /* Subtle color line */

    .technology-card::before {
        content: "";
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 3px;
        background: #B38F51;
        opacity: 0;
        transition: opacity 0.25s ease;
    }


    /* Card top */
    .technology-card-top {
        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    .technology-number {
        color: #B38F51;
        font-size: 1.2rem;
        font-weight: 700;
        letter-spacing: 1px;
    }

    .technology-arrow {
        width: 32px;
        height: 32px;
        display: flex;
        align-items: center;
        justify-content: center;
        border: 1px solid #ECE5D9;
        border-radius: 50%;
        background: #FCFAF6;
        color: #B38F51;
        font-size: 1.2rem;
        transition:
            background 0.25s ease,
            color 0.25s ease;
    }

    /* Technology name */

    .technology-card h4 {
        margin: 50px 0 0 0px;
        color: #07112E;
        font-size: 15px;
        font-weight: 700;
        line-height: 1.4;
        overflow-wrap: anywhere;
    }

    .technology-label {
        color: #9298A5;
        font-size: 1rem;
        font-weight: 500;
        letter-spacing: 0.3px;
    }


    /* =========================================
    COLORFUL CARD VARIATIONS
    ========================================= */

    /* Gold */

    .technology-card:nth-child(1)::before {
        background: #B38F51;
    }

    .technology-card:nth-child(1) .technology-icon {
        background: #F5F0E7;
    }

    .technology-card:nth-child(1) .technology-icon .dotchip {
        background: #B38F51;
    }


    /* Blue */

    .technology-card:nth-child(2)::before {
        background: #527DAE;
    }

    .technology-card:nth-child(2) .technology-icon {
        background: #EAF1F8;
    }

    .technology-card:nth-child(2) .technology-icon .dotchip {
        background: #527DAE;
    }

    .technology-card:nth-child(2) .technology-number {
        color: #527DAE;
    }


    /* Purple */

    .technology-card:nth-child(3)::before {
        background: #8060A4;
    }

    .technology-card:nth-child(3) .technology-icon {
        background: #F0EAF7;
    }

    .technology-card:nth-child(3) .technology-icon .dotchip {
        background: #8060A4;
    }

    .technology-card:nth-child(3) .technology-number {
        color: #8060A4;
    }


    /* Green */

    .technology-card:nth-child(4)::before {
        background: #4D8B70;
    }

    .technology-card:nth-child(4) .technology-icon {
        background: #E8F2EC;
    }

    .technology-card:nth-child(4) .technology-icon .dotchip {
        background: #4D8B70;
    }

    .technology-card:nth-child(4) .technology-number {
        color: #4D8B70;
    }


    /* Coral */

    .technology-card:nth-child(5)::before {
        background: #C77B63;
    }

    .technology-card:nth-child(5) .technology-icon {
        background: #F9ECE8;
    }

    .technology-card:nth-child(5) .technology-icon .dotchip {
        background: #C77B63;
    }

    .technology-card:nth-child(5) .technology-number {
        color: #C77B63;
    }


    /* =========================================
    HOVER
    ========================================= */

    .technology-card:hover {
        transform: translateY(-5px);

        border-color: #D9C7AA;

        box-shadow:
            0 15px 35px rgba(7, 13, 36, 0.08);
    }

    .technology-card:hover::before {
        opacity: 1;
    }

    .technology-card:hover .technology-arrow {
        background: #B38F51;
        border-color: #B38F51;
        color: #FFFFFF;
    }


    /* =========================================
   TABLET
========================================= */

    @media (max-width: 991.98px) {

        .tools-section {
            padding: 75px 0 90px;
        }

        .tools-layout {
            grid-template-columns: 1fr;

            gap: 45px;
        }

        .tools-content {
            max-width: 650px;
        }

        .tools-content h2 {
            font-size: 36px;
        }

        .tools-description {
            max-width: 580px;
        }

        .tools-grid {
            max-width: 700px;
        }

    }


    /* =========================================
   MOBILE
========================================= */

    @media (max-width: 575.98px) {

        .tools-section {
            padding: 60px 0 70px;
        }

        .tools-content h2 {
            font-size: 30px;

            letter-spacing: -0.5px;
        }

        .tools-description {
            font-size: 13px;
        }

        .tools-layout {
            gap: 35px;
        }

        .tools-grid {
            grid-template-columns: repeat(2, minmax(0, 1fr));

            gap: 12px;
        }

        .technology-card {
            min-height: 160px;

            padding: 18px 16px;

            border-radius: 13px;
        }

        .technology-icon {
            width: 38px;
            height: 38px;

            margin-top: 18px;
            margin-bottom: 14px;
        }

        .technology-card h4 {
            font-size: 14px;
        }

        .technology-label {
            font-size: 9px;
        }

    }


    /* =========================================
   EXTRA SMALL DEVICES
========================================= */

    @media (max-width: 360px) {

        .tools-grid {
            grid-template-columns: 1fr;
        }

        .technology-card {
            min-height: 130px;
        }

        .technology-icon {
            margin-top: 15px;
            margin-bottom: 12px;
        }

    }

   
/* =========================================
   TESTIMONIAL SECTION
   Premium Navy + Muted Gold
========================================= */

.testimonial-section {
    position: relative;

    padding: 70px 0 100px;

    overflow: hidden;

    background: #FFFFFF;
}


/* =========================================
   TESTIMONIAL CARD
========================================= */

.testimonial-card {
    position: relative;

    display: flex;
    align-items: flex-start;

    gap: 30px;

    padding: 38px 42px;

    border: 1px solid #E5DED2;
    border-radius: 18px;

    background:
        linear-gradient(
            135deg,
            #FCFAF6 0%,
            #FFFFFF 100%
        );

    box-shadow:
        0 8px 30px rgba(7, 13, 36, 0.035);

    overflow: hidden;
}


/* Decorative gold line */

.testimonial-card::before {
    content: "";

    position: absolute;

    top: 0;
    left: 0;

    width: 5px;
    height: 100%;

    background: #B38F51;
}


/* Soft decorative circle */

.testimonial-card::after {
    content: "";

    position: absolute;

    right: -100px;
    bottom: -140px;

    width: 300px;
    height: 300px;

    border-radius: 50%;

    background: rgba(179, 143, 81, 0.045);

    pointer-events: none;
}


/* =========================================
   QUOTE ICON
========================================= */

.testimonial-quote-icon {
    position: relative;
    z-index: 1;

    flex: 0 0 auto;

    width: 48px;
    height: 48px;

    display: flex;
    align-items: center;
    justify-content: center;

    border-radius: 14px;

    background: #F5F0E7;

    color: #B38F51;
}

.testimonial-quote-icon svg {
    width: 27px;
    height: 27px;
}


/* =========================================
   CONTENT
========================================= */

.testimonial-content {
    position: relative;
    z-index: 1;
    flex: 1;
    min-width: 0;
}


/* Small label */

.testimonial-label {
    display: flex;
    align-items: center;
    gap: 10px;
    margin-bottom: 15px;
    color: #A47C39;
    font-size: 1rem;
    font-weight: 700;
    letter-spacing: 1.4px;
    text-transform: uppercase;
}

.testimonial-label-line {
    width: 25px;
    height: 2px;
    border-radius: 20px;
    background: #B38F51;
}


/* =========================================
   QUOTE
========================================= */

.testimonial-quote {
    max-width: 950px;

    margin: 0 0 27px;

    color: #07112E;

    font-size: 20px;
    font-weight: 600;

    line-height: 1.65;
    letter-spacing: -0.25px;
}


/* =========================================
   AUTHOR
========================================= */

.testimonial-author {
    display: flex;

    align-items: center;
    gap: 13px;

    flex-wrap: wrap;
}


/* Avatar */

.author-avatar {
    width: 42px;
    height: 42px;

    display: flex;
    align-items: center;
    justify-content: center;

    flex: 0 0 auto;

    border-radius: 50%;

    background:
        linear-gradient(
            135deg,
            #070D24,
            #253B6B
        );

    color: #FFFFFF;

    font-size: 15px;
    font-weight: 700;
}


/* Author details */

.author-details {
    display: flex;
    flex-direction: column;

    gap: 4px;
}

.author-details strong {
    color: #07112E;

    font-size: 1rem;
    font-weight: 700;
}

.author-details span {
    color: #71798A;
    font-size: 1rem;
    line-height: 1.5;
}


/* Verified badge */

.author-verified {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    margin-left: auto;
    padding: 7px 11px;
    border: 1px solid #E5DED2;
    border-radius: 50px;
    background: #FFFFFF;
    color: #4D8B70;
    font-size: 1rem;
    font-weight: 600;
}

.author-verified svg {
    width: 14px;
    height: 14px;
}


/* =========================================
   HOVER
========================================= */

.testimonial-card {
    transition:
        transform 0.25s ease,
        box-shadow 0.25s ease;
}

.testimonial-card:hover {
    transform: translateY(-3px);

    box-shadow:
        0 15px 40px rgba(7, 13, 36, 0.07);
}


/* =========================================
   TABLET
========================================= */

@media (max-width: 991.98px) {

    .testimonial-section {
        padding: 60px 0 80px;
    }

    .testimonial-card {
        padding: 32px;
        gap: 25px;
    }

    .testimonial-quote {
        font-size: 18px;
    }

}


/* =========================================
   MOBILE
========================================= */

@media (max-width: 767.98px) {

    .testimonial-section {
        padding: 45px 0 65px;
    }

    .testimonial-card {
        flex-direction: column;

        gap: 20px;

        padding: 26px 22px;

        border-radius: 15px;
    }

    .testimonial-quote-icon {
        width: 43px;
        height: 43px;

        border-radius: 12px;
    }

    .testimonial-quote-icon svg {
        width: 24px;
        height: 24px;
    }

    .testimonial-label {
        font-size: 9px;
    }

    .testimonial-quote {
        margin-bottom: 24px;

        font-size: 16px;
        line-height: 1.7;
    }

    .testimonial-author {
        align-items: flex-start;
    }

    .author-verified {
        margin-left: 0;
    }

}


/* =========================================
   SMALL MOBILE
========================================= */

@media (max-width: 380px) {

    .testimonial-card {
        padding: 22px 18px;
    }

    .testimonial-quote {
        font-size: 15px;
    }

    .author-details strong {
        font-size: 12px;
    }

    .author-details span {
        font-size: 11px;
    }

}

    /* ---------- FAQ ACCORDION ---------- */
    .faq-item {
        background: #fff;
        border: 1px solid #e8e3d6;
        border-radius: 14px;
        overflow: hidden;
        margin-bottom: 12px;
    }

    .faq-q {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 16px;
        padding: 18px 22px;
        cursor: pointer;
        font-size: 1rem;
        font-weight: 600;
        color: #070d24;
    }

    .faq-q .plus {
        width: 24px;
        height: 24px;
        border-radius: 50%;
        background: #f7f4ee;
        color: #8f7040;
        display: flex;
        align-items: center;
        justify-content: center;
        flex: none;
        transition: transform .25s ease, background .25s ease;
    }

    .faq-q .plus svg {
        width: 13px;
        height: 13px;
    }

    .faq-item.open .faq-q .plus {
        background: #b38f51;
        color: #fff;
        transform: rotate(45deg);
    }

    .faq-a {
        max-height: 0;
        overflow: hidden;
        transition: max-height .3s ease;
    }

    .faq-a p {
        padding: 0 22px 20px;
        color: #6c7280;
        font-size: 1.1rem;
        line-height: 1.7;
    }

    /* ---------- RELATED SERVICES ---------- */
    .related-services {
        background: #f7f4ee;
    }

    .related-grid {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 20px;
    }

    .related-card {
        background: #fff;
        border: 1px solid #e8e3d6;
        border-radius: 14px;
        padding: 22px;
        transition: transform .25s ease, box-shadow .25s ease, border-color .25s ease;
    }

    .related-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 18px 40px -20px rgba(10, 19, 48, .25);
        border-color: #b38f51;
    }

    .related-card .r-icon {
        width: 40px;
        height: 40px;
        border-radius: 10px;
        background: #f2e8d3;
        color: #8f7040;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-bottom: 14px;
    }

    .related-card .r-icon svg {
        width: 19px;
        height: 19px;
    }

    .related-card h4 {
        font-size: 1rem;
        font-weight: 700;
        color: #070d24;
        margin-bottom: 6px;
    }

    .related-card span {
        font-size: 1.2rem;
        color: #6c7280;
    }

    /* ---------- CTA ---------- */
    .careers {
        background: linear-gradient(135deg, #070d24, #152a58);
        border-radius: 26px;
        padding: 52px 48px;
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 32px;
        flex-wrap: wrap;
        position: relative;
        overflow: hidden;
    }

    .careers::after {
        content: "";
        position: absolute;
        right: -60px;
        top: -60px;
        width: 260px;
        height: 260px;
        border-radius: 50%;
        background: radial-gradient(circle, rgba(179, 143, 81, .35), transparent 70%);
    }

    .careers-copy {
        position: relative;
        z-index: 2;
        max-width: 560px;
    }

    .careers-copy h2 {
        color: #fff;
        font-size: clamp(1.4rem, 2.2vw, 1.85rem);
        margin: 12px 0 10px;
        font-weight: 700;
    }

    .careers-copy p {
        color: rgba(255, 255, 255, .7);
        font-size: 1rem;
    }

    .careers-actions {
        position: relative;
        z-index: 2;
        display: flex;
        gap: 14px;
        flex-wrap: wrap;
    }

    /* ---------- RESPONSIVE ---------- */
    @media (max-width: 980px) {
        .svc-hero-inner {
            grid-template-columns: 1fr;
            text-align: left;
        }

        .svc-hero-stat {
            border-left: none;
            border-top: 1px solid rgba(255, 255, 255, .15);
            padding-left: 0;
            padding-top: 18px;
            text-align: left;
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .body-layout {
            grid-template-columns: 1fr;
        }

        .svc-sidebar {
            position: static;
            flex-direction: row;
            flex-wrap: wrap;
        }

        .sidebar-card {
            flex: 1 1 240px;
        }

        .price-grid {
            grid-template-columns: 1fr;
        }

        .related-grid {
            grid-template-columns: repeat(2, 1fr);
        }
    }

    @media (max-width: 680px) {
        section {
            padding: 56px 0;
        }

        .svc-sidebar {
            flex-direction: column;
        }

        .testimonial-card {
            flex-direction: column;
            align-items: flex-start;
        }

        .related-grid {
            grid-template-columns: 1fr;
        }

        .careers {
            flex-direction: column;
            align-items: flex-start;
            padding: 32px 26px;
        }
    }
</style>

<?php if ($service): ?>

    <!-- BREADCRUMB -->
    <div class="breadcrumb-bar">
        <div class="container">
            <ul>
                <li><a href="index.php">Home</a></li>
                <li class="sep">/</li>
                <li><a href="services.php">Services</a></li>
                <li class="sep">/</li>
                <li class="current"><?php echo htmlspecialchars($service['title']); ?></li>
            </ul>
        </div>
    </div>


    <!-- SERVICE HERO -->
    <section class="svc-hero">
        <!-- Background image -->
        <div class="svc-hero-bg"></div>

        <!-- Dark overlay -->
        <div class="svc-hero-overlay"></div>

        <div class="container position-relative">
            <div class="svc-hero-inner">

                <!-- Service Icon -->
                <div class="svc-hero-icon">
                    <?php echo svc_icon($icons, $service['icon']); ?>
                </div>

                <!-- Service Content -->
                <div class="svc-hero-content">

                    <span class="eyebrow">
                        <?php echo htmlspecialchars($service['category_label']); ?>
                    </span>

                    <h1>
                        <?php echo htmlspecialchars($service['title']); ?>
                    </h1>

                    <p class="tagline">
                        <?php echo htmlspecialchars($service['tagline']); ?>
                    </p>

                </div>

                <!-- Hero Statistic -->
                <div class="svc-hero-stat">

                    <strong>
                        <?php echo htmlspecialchars($service['cover_stat']['value']); ?>
                    </strong>

                    <span>
                        <?php echo htmlspecialchars($service['cover_stat']['label']); ?>
                    </span>

                </div>

            </div>
        </div>
    </section>

    <!-- =========================================
     SERVICE OVERVIEW + FEATURES + SIDEBAR
    ========================================= -->
    <section class="svc-details-section">

        <div class="container">

            <div class="body-layout">

                <!-- =================================
                 MAIN CONTENT
            ================================== -->

                <div class="main-copy">

                    <!-- Overview -->
                    <div class="svc-overview-block">

                        <span class="svc-content-label">
                            <span class="svc-label-dot"></span>About This Service
                        </span>

                        <p class="lede">
                            <?php echo htmlspecialchars($service['overview']); ?>
                        </p>

                    </div>

                    <!-- Features Heading -->
                    <div class="section-head svc-features-head">

                        <div class="badge-pill">
                            <span class="dot"></span> What's Included
                        </div>
                        <h2>What you get with this service</h2>
                        <p class="svc-section-description">
                            Everything you need to launch, grow, and manage
                            your digital presence with confidence.
                        </p>

                    </div>

                    <!-- Feature Cards -->
                    <div class="feature-list">

                        <?php foreach ($service['features'] as $index => $feature): ?>

                            <div class="feature-item">

                                <div class="feature-number">
                                    <?php echo str_pad($index + 1, 2, '0', STR_PAD_LEFT); ?>
                                </div>

                                <div class="feature-icon">

                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M20 6L9 17l-5-5" />
                                    </svg>

                                </div>

                                <div class="feature-content">
                                    <p><?php echo htmlspecialchars($feature); ?></p>
                                </div>

                                <div class="feature-arrow">

                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M5 12h14" />
                                        <path d="m13 6 6 6-6 6" />
                                    </svg>

                                </div>

                            </div>

                        <?php endforeach; ?>

                    </div>


                    <!-- Bottom Highlight -->
                    <div class="svc-bottom-highlight">

                        <div class="highlight-icon">

                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M12 3v18" />
                                <path d="M3 12h18" />
                                <circle cx="12" cy="12" r="9" />
                            </svg>

                        </div>

                        <div>
                            <h4>Built around your business goals</h4>
                            <p>Practical solutions, thoughtful design, and a foundation built for long-term growth.</p>
                        </div>

                    </div>

                </div>


                <!-- =================================
                 SIDEBAR
            ================================== -->

                <aside class="svc-sidebar">

                    <!-- All Services -->
                    <div class="sidebar-card services-card">

                        <div class="sidebar-card-header">
                            <span class="sc-label">Explore Services</span>
                            <span class="sidebar-count"><?php echo count($services); ?> Services</span>
                        </div>

                        <ul class="sidebar-nav">

                            <?php foreach ($services as $s): ?>

                                <li>

                                    <a href="service-detail.php?slug=<?php echo urlencode($s['slug']); ?>" class="<?php echo $s['slug'] === $service['slug'] ? 'active' : ''; ?>">
                                        <span class="service-nav-icon">
                                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round">
                                                <circle cx="12" cy="12" r="8" />
                                            </svg>
                                        </span>

                                        <span class="service-nav-title">
                                            <?php echo htmlspecialchars($s['title']); ?>
                                        </span>

                                        <span class="service-nav-arrow">
                                            →
                                        </span>

                                    </a>

                                </li>

                            <?php endforeach; ?>

                        </ul>

                    </div>


                    <!-- CTA Card -->
                    <div class="sidebar-card sidebar-cta">

                        <div class="cta-top">

                            <span class="cta-eyebrow">LET'S WORK TOGETHER</span>

                            <span class="cta-icon">

                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M5 12h14" />
                                    <path d="m13 6 6 6-6 6" />
                                </svg>

                            </span>

                        </div>

                        <h4>Ready to bring your idea to life?</h4>
                        <p>Tell us about your project and we'll follow upwith next steps within one business day.</p>
                        <a href="#contact" class="btn btn-gold">

                            Book A Discovery Call
                            <span>↗</span>

                        </a>

                        <div class="cta-bottom">
                            <span class="cta-bottom-dot"></span>
                            No pressure. Just a conversation.

                        </div>

                    </div>

                </aside>

            </div>

        </div>

    </section>

    <!-- =========================================
        PROCESS TIMELINE SECTION
    ========================================= -->
    <section class="process-section">

        <div class="container">

            <!-- Section Heading -->
            <div class="process-heading">

                <div class="badge-pill">
                    <span class="dot"></span>
                    How We Deliver This
                </div>

                <h2>
                    Our process for
                    <?php echo htmlspecialchars(strtolower($service['title'])); ?>
                </h2>

                <p>
                    The same structure applies whether this is a standalone
                    engagement or part of a larger build.
                </p>

            </div>


            <!-- Process Timeline -->
            <div class="process-timeline">

                <?php foreach ($service['process'] as $i => $step): ?>

                    <div class="process-item">

                        <!-- Step Number -->
                        <div class="process-marker">

                            <span>
                                <?php echo str_pad($i + 1, 2, '0', STR_PAD_LEFT); ?>
                            </span>

                        </div>


                        <!-- Process Card -->
                        <div class="process-card">

                            <div class="process-card-top">

                                <span class="process-step-label">
                                    STEP <?php echo str_pad($i + 1, 2, '0', STR_PAD_LEFT); ?>
                                </span>

                                <span class="process-card-arrow">
                                    ↗
                                </span>

                            </div>

                            <h4>
                                <?php echo htmlspecialchars($step['title']); ?>
                            </h4>

                            <p>
                                <?php echo htmlspecialchars($step['desc']); ?>
                            </p>

                        </div>

                    </div>

                <?php endforeach; ?>

            </div>

        </div>

    </section>


    <!-- =========================================
     TOOLS & TECHNOLOGY SECTION
    ========================================= -->
    <section class="tools-section">

        <div class="container">

            <div class="tools-layout">

                <!-- LEFT CONTENT -->
                <div class="tools-content">

                    <div class="badge-pill tools-badge">
                        <span class="dot"></span>
                        Tools &amp; Technology
                    </div>

                    <h2>What we build this with</h2>

                    <p class="tools-description">
                        We use reliable, modern technologies to build fast,
                        scalable and maintainable digital solutions.
                    </p>

                    <div class="tools-divider"></div>

                    <div class="tools-trust">
                        <span class="trust-icon">✓</span>
                        <span>Modern technology stack</span>
                    </div>

                </div>


                <!-- RIGHT TECHNOLOGY CARDS -->
                <div class="tools-grid">

                    <?php foreach ($service['tools'] as $i => $tool): ?>

                        <div class="technology-card">

                            <div class="technology-card-top">

                                <span class="technology-number">
                                    <?php echo str_pad($i + 1, 2, '0', STR_PAD_LEFT); ?>
                                </span>

                                <span class="technology-arrow">↗</span>

                            </div>

                            <div class="technology-icon">
                                <span class="dotchip"></span>
                            </div>

                            <h4>
                                <?php echo htmlspecialchars($tool); ?>
                            </h4>

                            <span class="technology-label">
                                Technology
                            </span>

                        </div>

                    <?php endforeach; ?>

                </div>

            </div>

        </div>

    </section>

    <!-- TESTIMONIAL -->

    <!-- =========================================
        TESTIMONIAL SECTION
    ========================================= -->
    <section class="testimonial-section">

        <div class="container">

            <div class="testimonial-card">

                <!-- Decorative Quote Icon -->
                <div class="testimonial-quote-icon">
                    <svg viewBox="0 0 24 24" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path d="M10 11H5.5C4.67 11 4 10.33 4 9.5V6.5C4 5.67 4.67 5 5.5 5H9C9.55 5 10 5.45 10 6V11ZM10 11C10 15.42 7.67 18.08 4 19"
                            stroke="currentColor"
                            stroke-width="1.8"
                            stroke-linecap="round"
                            stroke-linejoin="round" />
                        <path d="M20 11H15.5C14.67 11 14 10.33 14 9.5V6.5C14 5.67 14.67 5 15.5 5H19C19.55 5 20 5.45 20 6V11ZM20 11C20 15.42 17.67 18.08 14 19"
                            stroke="currentColor"
                            stroke-width="1.8"
                            stroke-linecap="round"
                            stroke-linejoin="round" />
                    </svg>
                </div>


                <!-- Testimonial Content -->
                <div class="testimonial-content">

                    <div class="testimonial-label">
                        <span class="testimonial-label-line"></span>
                        Client Success Story
                    </div>

                    <p class="testimonial-quote">
                        <?php echo htmlspecialchars($service['testimonial']['quote']); ?>
                    </p>


                    <!-- Client Information -->
                    <div class="testimonial-author">

                        <div class="author-avatar">
                            <?php
                            echo htmlspecialchars(
                                strtoupper(
                                    substr($service['testimonial']['author'], 0, 1)
                                )
                            );
                            ?>
                        </div>

                        <div class="author-details">

                            <strong>
                                <?php echo htmlspecialchars($service['testimonial']['author']); ?>
                            </strong>

                            <span>
                                <?php echo htmlspecialchars($service['testimonial']['role']); ?>
                            </span>

                        </div>

                        <div class="author-verified">
                            <svg viewBox="0 0 24 24" fill="none">
                                <path d="M5 12.5L10 17L19 7"
                                    stroke="currentColor"
                                    stroke-width="2"
                                    stroke-linecap="round"
                                    stroke-linejoin="round" />
                            </svg>
                            <span>Client Review</span>
                        </div>

                    </div>

                </div>

            </div>

        </div>

    </section>

    <!-- FAQ -->
    <section style="padding-top:0;">
        <div class="container">
            <div class="section-head">
                <div class="badge-pill mb-3">
                    <span class="dot"></span>
                    Common Questions
                </div>
                <h2>Frequently asked about this service</h2>
            </div>
            <div id="faqList">
                <?php foreach ($service['faqs'] as $i => $faq): ?>
                    <div class="faq-item <?php echo $i === 0 ? 'open' : ''; ?>">
                        <div class="faq-q">
                            <span><?php echo htmlspecialchars($faq['q']); ?></span>
                            <span class="plus"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.6">
                                    <path d="M12 5v14M5 12h14" />
                                </svg></span>
                        </div>
                        <div class="faq-a">
                            <p><?php echo htmlspecialchars($faq['a']); ?></p>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- RELATED SERVICES -->
    <section class="related-services">
        <div class="container">
            <div class="section-head">
                <div class="badge-pill mb-3">
                    <span class="dot"></span>
                    Pair It With
                </div>
                <h2>Other services clients often combine with this one</h2>
            </div>
            <div class="related-grid">
                <?php
                $count = 0;
                foreach ($otherServices as $rel):
                    if ($count >= 4) break;
                    $count++;
                ?>
                    <a href="service-detail.php?slug=<?php echo urlencode($rel['slug']); ?>" class="related-card">
                        <div class="r-icon"><?php echo svc_icon($icons, $rel['icon']); ?></div>
                        <h4><?php echo htmlspecialchars($rel['title']); ?></h4>
                        <span><?php echo htmlspecialchars($rel['category_label']); ?></span>
                    </a>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- CTA -->
    <section class="container" style="padding-top:100;">
        <div class="careers">
            <div class="careers-copy">
                <span class="eyebrow" style="color:#b38f51;">Ready When You Are</span>
                <h2>Let's talk about your <?php echo htmlspecialchars(strtolower($service['title'])); ?> project</h2>
                <p>Book a discovery call and we'll tell you honestly whether we're the right fit — no obligation, no generic pitch deck.</p>
            </div>
            <div class="careers-actions">
                <a href="#" class="btn btn-gold">Book A Discovery Call</a>
                <a href="services.php" class="btn btn-outline-light">View All Services</a>
            </div>
        </div>
    </section>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var items = document.querySelectorAll('#faqList .faq-item');

            function setHeight(item, open) {
                var answer = item.querySelector('.faq-a');
                answer.style.maxHeight = open ? answer.scrollHeight + 'px' : 0;
            }

            items.forEach(function(item) {
                setHeight(item, item.classList.contains('open'));

                item.querySelector('.faq-q').addEventListener('click', function() {
                    var isOpen = item.classList.contains('open');
                    items.forEach(function(i) {
                        i.classList.remove('open');
                        setHeight(i, false);
                    });
                    if (!isOpen) {
                        item.classList.add('open');
                        setHeight(item, true);
                    }
                });
            });
        });
    </script>

<?php else: ?>

    <!-- FALLBACK: no services found in JSON -->
    <div class="container" style="padding:100px 24px;text-align:center;">
        <h1 style="font-size:1.8rem;font-weight:700;color:#070d24;margin-bottom:12px;">Service not found</h1>
        <p style="color:#6c7280;margin-bottom:24px;">We couldn't find that service. It may have been renamed or removed.</p>
        <a href="services.php" class="btn btn-gold">Browse All Services</a>
    </div>

<?php endif; ?>

<?php
include_once('elements/footer.php');
?>