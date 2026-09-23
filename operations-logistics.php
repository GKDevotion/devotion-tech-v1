<?php
$seo = [
    'title' => 'Operations & Logistics Solutions | Devotion Technologies - Technology Experts & Innovators',
    'description' => 'WMS, IMS, OMS, SCM and TMS systems Devotion Technologies builds and integrates — the connected fulfillment pipeline behind reliable e-commerce operations.',
    'keywords' => 'warehouse management system, inventory management system, order management system, supply chain management, transportation management system',
    'author' => 'Devotion Technologies'
];
include_once('elements/header.php');

$opsPath = __DIR__ . '/data/operations-logistics.json';
$systems = [];
if (file_exists($opsPath)) {
    $json = file_get_contents($opsPath);
    $decoded = json_decode($json, true);
    if (is_array($decoded)) {
        $systems = $decoded;
    }
}

$opsIcons = [
    'warehouse' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M3 10.5L12 4l9 6.5" /><path d="M5 9.5V20h14V9.5" /><path d="M9.5 20v-6h5v6" /></svg>',
    'boxes'     => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M3 8l6-3.5L15 8l-6 3.5L3 8z" /><path d="M3 8v7l6 3.5M15 8v7l-6 3.5M15 8l6-3.5v7L15 15" /></svg>',
    'clipboard' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><rect x="5" y="4" width="14" height="17" rx="2" /><path d="M9 3.5h6v3H9z" /><path d="M8.5 11h7M8.5 15h7" /></svg>',
    'network'   => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><circle cx="5" cy="6" r="2.3" /><circle cx="19" cy="6" r="2.3" /><circle cx="12" cy="18" r="2.3" /><path d="M6.8 7.6L11 15.5M17.2 7.6L13 15.5" /></svg>',
    'truck'     => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><rect x="2" y="7" width="12" height="10" rx="1.2" /><path d="M14 10.5h4.2L21 13.8V17h-3" /><circle cx="7" cy="18.5" r="1.6" /><circle cx="17" cy="18.5" r="1.6" /></svg>',
];
function ops_icon($icons, $key)
{
    return isset($icons[$key]) ? $icons[$key] : $icons['boxes'];
}
?>

<style>
    a {
        text-decoration: none;
        color: inherit;
    }

    ul {
        margin: 0;
        padding: 0;
        list-style: none;
    }

    section {
        padding: 90px 0;
    }

    .section-head {
        max-width: 700px;
        margin: 0 auto 54px;
        text-align: center;
    }

    .section-head h2 {
        font-size: clamp(1.6rem, 2.6vw, 2.1rem);
        font-weight: 700;
        color: #000;
        margin: 12px 0 10px;
    }

    .section-head p {
        color: #6c7280;
        font-size: 1rem;
    }

    .btn {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        padding: 13px 26px;
        border-radius: 10px;
        font-size: .92rem;
        font-weight: 600;
        transition: all .2s ease;
        white-space: nowrap;
    }

    .btn-gold {
        background: #b38f51;
        color: #fff;
    }

    .btn-gold:hover {
        background: #8f7040;
    }

    .btn-outline-light {
        border: 1.5px solid rgba(255, 255, 255, .4);
        color: #fff;
    }

    .btn-outline-light:hover {
        background: #fff;
        color: #000;
    }

    .btn-outline-dark {
        border: 1.5px solid #e8e3d6;
        color: #000;
    }

    .btn-outline-dark:hover {
        border-color: #b38f51;
        color: #8f7040;
    }

    /* =========================================================
   OPERATIONS HERO
========================================================= */

    .ops-hero {
        position: relative;
        overflow: hidden;
        min-height: 390px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: url('<?php echo $siteBase; ?>/assets/images/banner-img.png');
        border-top: 1px solid rgba(179, 143, 81, 0.25);
        border-bottom: 1px solid rgba(255, 255, 255, 0.06);
    }


    /* =========================================================
   HERO CONTAINER
========================================================= */

    .ops-hero-inner {
        position: relative;
        z-index: 2;
        margin: 0 auto;
        text-align: center;
    }


    /* =========================================================
   EYEBROW
========================================================= */

    .ops-hero-eyebrow {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 9px;
        margin-bottom: 18px;
        color: #b38f51;
        font-size: 1.2rem;
        font-weight: 500;
        letter-spacing: 0.2px;
    }

    .ops-hero-eyebrow span {
        width: 7px;
        height: 7px;
        display: inline-block;
        border-radius: 50%;
        background: #b38f51;
        box-shadow:
            0 0 0 4px rgba(179, 143, 81, 0.10),
            0 0 14px rgba(179, 143, 81, 0.40);
    }


    /* =========================================================
   HERO TITLE
========================================================= */

    .ops-hero h1 {
        margin: 0 auto;
        color: #000;
        font-size: clamp(38px, 5vw, 58px);
        line-height: 1.08;
        font-weight: 700;
        letter-spacing: -1.8px;
    }

    .ops-hero h1 strong {
        display: block;
        color: #b38f51;
        font-weight: 700;
    }


    /* =========================================================
   HERO DESCRIPTION
========================================================= */

    .ops-hero p {
        margin: 22px auto 0;

        color: #000;

        font-size: 16px;
        line-height: 1.75;

        font-weight: 400;
    }


    /* =========================================================
   DECORATIVE LINE
========================================================= */

    .ops-hero-line {
        width: 45px;
        height: 2px;

        margin: 28px auto 0;

        background: #b38f51;

        border-radius: 50px;

        opacity: 0.85;
    }


    /* =========================================================
   BACKGROUND GLOWS
========================================================= */

    .ops-hero-glow {
        position: absolute;

        border-radius: 50%;

        pointer-events: none;

        filter: blur(70px);
    }

    .ops-hero-glow-1 {
        width: 350px;
        height: 350px;

        top: -220px;
        left: 12%;

        background: rgba(179, 143, 81, 0.08);
    }

    .ops-hero-glow-2 {
        width: 420px;
        height: 420px;

        right: -180px;
        bottom: -260px;

        background: rgba(77, 106, 170, 0.13);
    }


    /* =========================================================
   RESPONSIVE — TABLET
========================================================= */

    @media (max-width: 991px) {

        .ops-hero {
            min-height: 350px;

            padding: 70px 25px;
        }

        .ops-hero h1 {
            font-size: 46px;
            letter-spacing: -1.2px;
        }

        .ops-hero p {
            max-width: 650px;
        }
    }


    /* =========================================================
   RESPONSIVE — MOBILE
========================================================= */

    @media (max-width: 767px) {

        .ops-hero {
            min-height: auto;

            padding: 60px 20px 65px;
        }

        .ops-hero-inner {
            max-width: 100%;
        }

        .ops-hero-eyebrow {
            margin-bottom: 15px;
            font-size: 13px;
        }

        .ops-hero h1 {
            font-size: 34px;
            line-height: 1.12;

            letter-spacing: -0.8px;
        }

        .ops-hero p {
            margin-top: 18px;

            font-size: 14px;
            line-height: 1.7;
        }

        .ops-hero-line {
            margin-top: 24px;
        }
    }


    /* =========================================================
   SMALL MOBILE
========================================================= */

    @media (max-width: 420px) {

        .ops-hero {
            padding: 52px 18px 58px;
        }

        .ops-hero h1 {
            font-size: 30px;
        }

        .ops-hero p {
            font-size: 13.5px;
        }
    }

    /* =========================================================
   FULFILLMENT PIPELINE SECTION
========================================================= */

    .pipeline-section {
        background: #ffffff;
    }


    /* =========================================================
   HEADER
========================================================= */

    .pipeline-header {
        margin: 0 auto 65px;
        text-align: center;
    }

    .pipeline-header .badge-pill {
        display: inline-flex;
        margin-bottom: 20px;
    }

    .pipeline-header h2 {
        margin: 0;
        color: #090909;
        font-size: clamp(34px, 4vw, 48px);
        line-height: 1.12;
        font-weight: 700;
        letter-spacing: -1.3px;
    }

    .pipeline-header h2 span {
        color: #b38f51;
    }

    .pipeline-header p {
        margin: 20px auto 0;
        color: #737986;
        font-size: 1.2rem;
        line-height: 1.7;
    }


    /* =========================================================
   PIPELINE WRAPPER
========================================================= */

    .pipeline-wrap {
        position: relative;
        margin: 0 auto 62px;
    }

    .pipeline-track {
        position: relative;

        display: grid;
        grid-template-columns: repeat(5, 1fr);

        align-items: start;

        gap: 15px;
    }


    /* =========================================================
   PIPELINE LINE
========================================================= */

    .pipeline-line {
        position: absolute;

        top: 31px;
        left: 10%;
        right: 10%;

        height: 1px;

        background: #e5ddd0;

        z-index: 0;
    }

    .pipeline-line-progress {
        position: absolute;

        top: 0;
        left: 0;

        width: 100%;
        height: 1px;

        background: #b38f51;

        opacity: 0.65;
    }


    /* =========================================================
   PIPELINE NODE
========================================================= */

    .pipeline-node {
        position: relative;

        z-index: 2;

        display: flex;
        flex-direction: column;
        align-items: center;

        text-align: center;

        color: #111111;

        text-decoration: none;

        transition: transform 0.25s ease;
    }

    .pipeline-node:hover {
        color: #111111;

        transform: translateY(-5px);
    }


    /* =========================================================
   NODE CIRCLE
========================================================= */

    .pn-circle {
        position: relative;

        width: 64px;
        height: 64px;

        display: flex;
        align-items: center;
        justify-content: center;

        margin-bottom: 14px;

        border: 1px solid #d9cdbb;
        border-radius: 50%;

        background: #ffffff;

        color: #b38f51;

        box-shadow:
            0 0 0 7px #ffffff,
            0 8px 24px rgba(20, 20, 20, 0.07);

        transition:
            background 0.25s ease,
            border-color 0.25s ease,
            color 0.25s ease,
            box-shadow 0.25s ease;
    }

    .pipeline-node:hover .pn-circle {
        color: #ffffff;

        background: #b38f51;

        border-color: #b38f51;

        box-shadow:
            0 0 0 7px #ffffff,
            0 12px 28px rgba(179, 143, 81, 0.25);
    }

    .pn-circle svg {
        width: 30px;
        height: 30px;
    }


    /* =========================================================
   NODE NUMBER
========================================================= */

    .pn-number {
        position: absolute;

        right: -4px;
        top: -4px;

        width: 21px;
        height: 21px;

        display: flex;
        align-items: center;
        justify-content: center;

        border: 2px solid #ffffff;
        border-radius: 50%;

        color: #ffffff;

        background: #111111;

        font-size: 8px;
        font-weight: 700;
    }


    /* =========================================================
   NODE TEXT
========================================================= */

    .pn-abbr {
        color: #111111;
        font-size: 1.2rem;
        font-weight: 700;
        letter-spacing: 0.3px;
    }

    .pn-title {
        margin-top: 4px;
        color: #8a8e97;
        font-size: 1rem;
        line-height: 1.45;
    }


    /* =========================================================
   SYSTEM CARDS
========================================================= */

    .system-cards {
        margin: 0 auto;

        display: flex;
        flex-direction: column;

        gap: 14px;
    }


    /* =========================================================
   SYSTEM CARD
========================================================= */

    .system-card {
        position: relative;

        display: grid;

        grid-template-columns: 40px 54px minmax(0, 1fr) 180px;

        align-items: center;

        gap: 18px;

        min-height: 126px;

        padding: 22px 24px;

        border: 1px solid #e5ddd1;
        border-radius: 15px;

        background: #fdfcfb;

        transition:
            transform 0.25s ease,
            border-color 0.25s ease,
            background 0.25s ease,
            box-shadow 0.25s ease;
    }

    .system-card:hover {
        transform: translateY(-2px);

        border-color: rgba(179, 143, 81, 0.48);

        background: #ffffff;

        box-shadow:
            0 12px 32px rgba(20, 20, 20, 0.065);
    }


    /* =========================================================
   CARD NUMBER
========================================================= */

    .system-card-number {
        color: #b38f51;
        font-size: 1.5rem;
        font-weight: 700;
        letter-spacing: 1px;
    }


    /* =========================================================
   CARD ICON
========================================================= */

    .sc-icon {
        width: 54px;
        height: 54px;

        display: flex;
        align-items: center;
        justify-content: center;

        border: 1px solid #e5ddd1;
        border-radius: 13px;

        color: #b38f51;

        background: #f8f5ef;

        transition:
            background 0.25s ease,
            border-color 0.25s ease,
            color 0.25s ease;
    }

    .system-card:hover .sc-icon {
        color: #ffffff;

        background: #b38f51;

        border-color: #b38f51;
    }

    .sc-icon svg {
        width: 30px;
        height: 30px;
    }


    /* =========================================================
   CARD BODY
========================================================= */

    .sc-body {
        min-width: 0;
    }

    .sc-meta {
        display: flex;
        align-items: center;
        gap: 7px;

        margin-bottom: 7px;
    }

    .sc-abbr {
        color: #b38f51;
        font-size: 1.2rem;
        font-weight: 700;
        letter-spacing: 0.8px;
    }

    .sc-separator {
        color: #c9c1b5;
        font-size: 1.2rem;
    }

    .sc-system-title {
        overflow: hidden;
        color: #858a95;
        font-size: 1.2rem;
        white-space: nowrap;
        text-overflow: ellipsis;
    }

    .sc-body h3 {
        margin: 0 0 7px;

        color: #111111;

        font-size: 16px;
        line-height: 1.35;

        font-weight: 650;
    }

    .sc-body p {
        margin: 0;
        color: #777c86;
        font-size: 1rem;
        line-height: 1.6;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }


    /* =========================================================
   STAT
========================================================= */

    .sc-stat {
        min-height: 78px;

        display: flex;
        flex-direction: column;
        justify-content: center;

        padding-left: 22px;

        border-left: 1px solid #e5ddd1;
    }

    .stat-label {
        margin-bottom: 2px;
        color: #aaa094;
        font-size: 1rem;
        font-weight: 600;

        letter-spacing: 1.2px;
    }

    .sc-stat strong {
        color: #b38f51;

        font-size: 23px;
        line-height: 1.1;

        font-weight: 700;
    }

    .stat-description {
        margin-top: 3px;
        color: #777c86;
        font-size: 1rem;
        line-height: 1.35;
    }


    /* =========================================================
   DETAILS BUTTON
========================================================= */

    .sc-details-btn {
        width: 100%;
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin-top: 12px;
        padding: 8px 10px;
        border: 1px solid #ded6ca;
        border-radius: 8px;
        color: #151515;
        background: #ffffff;
        text-decoration: none;
        font-size: 1rem;
        font-weight: 600;

        transition:
            background 0.2s ease,
            color 0.2s ease,
            border-color 0.2s ease;
    }

    .sc-details-btn i {
        color: #b38f51;

        transition: transform 0.2s ease;
    }

    .sc-details-btn:hover {
        color: #ffffff;

        background: #111111;

        border-color: #111111;
    }

    .sc-details-btn:hover i {
        color: #b38f51;

        transform: translate(2px, -2px);
    }


    /* =========================================================
   TABLET
========================================================= */

    @media (max-width: 991px) {

        .pipeline-section {
            padding: 75px 0 80px;
        }

        .pipeline-track {
            gap: 5px;
        }

        .pn-circle {
            width: 58px;
            height: 58px;
        }

        .system-card {
            grid-template-columns: 30px 50px minmax(0, 1fr) 155px;

            gap: 14px;

            padding: 19px;
        }

        .sc-body h3 {
            font-size: 15px;
        }

        .sc-body p {
            font-size: 11px;
        }
    }


    /* =========================================================
   MOBILE
========================================================= */

    @media (max-width: 767px) {

        .pipeline-section {
            padding: 60px 0 70px;
        }

        .pipeline-header {
            margin-bottom: 45px;

            padding: 0 10px;
        }

        .pipeline-header h2 {
            font-size: 30px;
        }

        .pipeline-header p {
            font-size: 14px;
        }


        /* Horizontal scroll pipeline */

        .pipeline-wrap {
            margin-right: -15px;
            margin-left: -15px;
            overflow-x: auto;
            padding: 0 25px 15px;
            scrollbar-width: none;
        }

        .pipeline-wrap::-webkit-scrollbar {
            display: none;
        }

        .pipeline-track {
            width: max-content;
            min-width: 650px;

            display: flex;

            gap: 42px;

            padding: 0 20px;
        }

        .pipeline-line {
            top: 29px;

            left: 48px;
            right: 48px;
        }

        .pn-circle {
            width: 58px;
            height: 58px;

            margin-bottom: 12px;
        }

        .pn-abbr {
            font-size: 12px;
        }

        .pn-title {
            font-size: 9px;
        }


        /* Cards */

        .system-cards {
            gap: 12px;
        }

        .system-card {
            display: grid;

            grid-template-columns: 45px minmax(0, 1fr);

            gap: 15px;

            padding: 20px;

            border-radius: 14px;
        }

        .system-card-number {
            grid-column: 1;
            grid-row: 1;

            align-self: start;
        }

        .sc-icon {
            grid-column: 1;
            grid-row: 2;

            width: 45px;
            height: 45px;
        }

        .sc-body {
            grid-column: 2;
            grid-row: 1 / span 2;
        }

        .sc-body h3 {
            font-size: 15px;
        }

        .sc-body p {
            font-size: 12px;
            line-height: 1.6;

            -webkit-line-clamp: 3;
        }

        .sc-stat {
            grid-column: 1 / -1;
            grid-row: 3;

            min-height: auto;

            padding: 15px 0 0;

            border-left: 0;
            border-top: 1px solid #e5ddd1;
        }

        .sc-stat strong {
            font-size: 21px;
        }

        .sc-details-btn {
            margin-top: 10px;

            height: 42px;

            padding: 0 13px;

            font-size: 11px;
        }
    }


    /* =========================================================
   SMALL MOBILE
========================================================= */

    @media (max-width: 420px) {

        .pipeline-header h2 {
            font-size: 27px;
        }

        .pipeline-header p {
            font-size: 13px;
        }

        .system-card {
            padding: 17px;
        }

        .sc-meta {
            flex-wrap: wrap;
        }

        .sc-system-title {
            max-width: 180px;
        }

        .sc-body h3 {
            font-size: 14px;
        }

        .sc-body p {
            font-size: 11.5px;
        }
    }

    /* =========================================================
   PIPELINE CTA
========================================================= */

    .pipeline-cta-section {
        padding: 0 0 100px;
    }

    .pipeline-cta {
        position: relative;
        overflow: hidden;

        min-height: 280px;

        display: flex;
        align-items: center;
        justify-content: space-between;

        gap: 50px;

        padding: 48px 48px 48px 50px;

        border-radius: 25px;

        background:
            radial-gradient(circle at 92% 20%,
                rgba(179, 143, 81, 0.16),
                transparent 25%),
            linear-gradient(135deg,
                #030711 0%,
                #081128 52%,
                #172b59 100%);

        border: 1px solid rgba(255, 255, 255, 0.07);

        box-shadow:
            0 25px 60px rgba(0, 0, 0, 0.13);
    }


    /* =========================================================
   GOLD LIGHT
========================================================= */

    .pipeline-cta-glow {
        position: absolute;

        width: 280px;
        height: 280px;

        right: -100px;
        top: -145px;

        border-radius: 50%;

        background: rgba(179, 143, 81, 0.16);

        filter: blur(65px);

        pointer-events: none;
    }


    /* =========================================================
   CONTENT
========================================================= */

    .pipeline-cta-content {
        position: relative;
        z-index: 2;

        max-width: 650px;
    }

    .pipeline-cta-eyebrow {
        display: flex;
        align-items: center;
        gap: 9px;

        margin-bottom: 13px;

        color: #b38f51;

        font-size: 13px;
        font-weight: 500;

        letter-spacing: 0.2px;
    }

    .cta-dot {
        width: 7px;
        height: 7px;

        flex-shrink: 0;

        border-radius: 50%;

        background: #b38f51;

        box-shadow:
            0 0 0 4px rgba(179, 143, 81, 0.10),
            0 0 14px rgba(179, 143, 81, 0.35);
    }


    /* =========================================================
   HEADING
========================================================= */

    .pipeline-cta h2 {
        max-width: 620px;

        margin: 0;

        color: #ffffff;

        font-size: clamp(30px, 3.2vw, 42px);
        line-height: 1.13;

        font-weight: 700;

        letter-spacing: -1px;
    }

    .pipeline-cta h2 span {
        color: #b38f51;
    }


    /* =========================================================
   DESCRIPTION
========================================================= */

    .pipeline-cta-content p {
        max-width: 610px;

        margin: 15px 0 0;

        color: rgba(255, 255, 255, 0.67);

        font-size: 14px;
        line-height: 1.7;
    }


    /* =========================================================
   ACTIONS
========================================================= */

    .pipeline-cta-actions {
        position: relative;
        z-index: 2;

        display: flex;
        align-items: center;

        gap: 12px;

        flex-shrink: 0;
    }


    /* =========================================================
   BUTTON BASE
========================================================= */

    .pipeline-cta-btn {
        min-width: 185px;
        height: 51px;

        display: inline-flex;
        align-items: center;
        justify-content: center;

        gap: 11px;

        padding: 0 18px;

        border-radius: 10px;

        text-decoration: none;

        font-size: 13px;
        font-weight: 600;

        transition:
            transform 0.25s ease,
            background 0.25s ease,
            border-color 0.25s ease,
            box-shadow 0.25s ease;
    }

    .pipeline-cta-btn i {
        font-size: 14px;

        transition: transform 0.25s ease;
    }

    .pipeline-cta-btn:hover {
        transform: translateY(-2px);
    }

    .pipeline-cta-btn:hover i {
        transform: translate(2px, -2px);
    }


    /* =========================================================
   PRIMARY
========================================================= */

    .pipeline-cta-btn.primary {
        color: #ffffff;

        background: #b38f51;

        border: 1px solid #b38f51;

        box-shadow:
            0 8px 22px rgba(179, 143, 81, 0.20);
    }

    .pipeline-cta-btn.primary:hover {
        color: #ffffff;

        background: #c09a5a;

        border-color: #c09a5a;

        box-shadow:
            0 12px 28px rgba(179, 143, 81, 0.28);
    }


    /* =========================================================
   SECONDARY
========================================================= */

    .pipeline-cta-btn.secondary {
        color: #ffffff;

        background: rgba(255, 255, 255, 0.025);

        border: 1px solid rgba(255, 255, 255, 0.27);
    }

    .pipeline-cta-btn.secondary:hover {
        color: #ffffff;

        background: rgba(255, 255, 255, 0.08);

        border-color: rgba(255, 255, 255, 0.48);
    }


    /* =========================================================
   TABLET
========================================================= */

    @media (max-width: 991px) {

        .pipeline-cta-section {
            padding-bottom: 80px;
        }

        .pipeline-cta {
            gap: 35px;

            padding: 42px;
        }

        .pipeline-cta h2 {
            font-size: 32px;
        }

        .pipeline-cta-actions {
            flex-direction: column;
            align-items: stretch;
        }

        .pipeline-cta-btn {
            min-width: 175px;
        }
    }


    /* =========================================================
   MOBILE
========================================================= */

    @media (max-width: 767px) {

        .pipeline-cta-section {
            padding: 0 15px 65px;
        }

        .pipeline-cta {
            display: block;

            min-height: auto;

            padding: 34px 25px;

            border-radius: 20px;
        }

        .pipeline-cta-content {
            max-width: 100%;
        }

        .pipeline-cta-eyebrow {
            margin-bottom: 12px;

            font-size: 12px;
        }

        .pipeline-cta h2 {
            font-size: 27px;

            line-height: 1.18;

            letter-spacing: -0.5px;
        }

        .pipeline-cta-content p {
            margin-top: 15px;

            font-size: 13.5px;

            line-height: 1.65;
        }

        .pipeline-cta-actions {
            display: flex;
            flex-direction: column;

            width: 100%;

            gap: 10px;

            margin-top: 26px;
        }

        .pipeline-cta-btn {
            width: 100%;

            min-width: 0;

            height: 50px;
        }
    }


    /* =========================================================
   SMALL MOBILE
========================================================= */

    @media (max-width: 400px) {

        .pipeline-cta {
            padding: 30px 20px;
        }

        .pipeline-cta h2 {
            font-size: 24px;
        }

        .pipeline-cta-content p {
            font-size: 13px;
        }
    }
</style>

<!-- HERO -->
<section class="ops-hero">
    <div class="ops-hero-glow ops-hero-glow-1"></div>
    <div class="ops-hero-glow ops-hero-glow-2"></div>

    <div class="container ops-hero-inner">

        <div class="ops-hero-eyebrow">
            <span></span>
            Operations &amp; Logistics
        </div>

        <h1>
            Five systems, one connected
            <strong>fulfillment pipeline</strong>
        </h1>

        <p>
            Warehouse, inventory, orders, supply chain and transportation
            don't work as isolated tools — they work as a pipeline.
            Here's how each piece connects to the next, and what each one
            solves on its own.
        </p>

        <div class="ops-hero-line"></div>

    </div>
</section>
<!-- =========================================================
     FULFILLMENT PIPELINE
========================================================= -->
<section class="pipeline-section">

    <div class="container">

        <!-- SECTION HEADER -->
        <div class="pipeline-header">

            <div class="badge-pill">
                <span class="dot"></span>
                The Fulfillment Pipeline
            </div>

            <h2>
                From goods received to
                <span>package delivered</span>
            </h2>

            <p>
                Each system below hands off to the next — click any node
                to jump to the full breakdown.
            </p>

        </div>


        <!-- =================================================
             PIPELINE
        ================================================== -->
        <div class="pipeline-wrap">

            <div class="pipeline-track">

                <div class="pipeline-line">
                    <span class="pipeline-line-progress"></span>
                </div>

                <?php foreach ($systems as $index => $s): ?>

                    <a
                        href="operations-logistics-detail.php?slug=<?php echo urlencode($s['slug']); ?>"
                        class="pipeline-node">

                        <div class="pn-circle">
                            <?php echo ops_icon($opsIcons, $s['icon']); ?>

                            <span class="pn-number">
                                <?php echo str_pad($index + 1, 2, '0', STR_PAD_LEFT); ?>
                            </span>
                        </div>

                        <span class="pn-abbr">
                            <?php echo htmlspecialchars($s['abbr']); ?>
                        </span>

                        <span class="pn-title">
                            <?php echo htmlspecialchars($s['title']); ?>
                        </span>

                    </a>

                <?php endforeach; ?>

            </div>

        </div>


        <!-- =================================================
             SYSTEM DETAIL CARDS
        ================================================== -->
        <div class="system-cards">

            <?php foreach ($systems as $index => $s): ?>

                <article class="system-card">

                    <!-- CARD NUMBER -->
                    <div class="system-card-number">
                        <?php echo str_pad($index + 1, 2, '0', STR_PAD_LEFT); ?>
                    </div>


                    <!-- ICON -->
                    <div class="sc-icon">
                        <?php echo ops_icon($opsIcons, $s['icon']); ?>
                    </div>


                    <!-- CONTENT -->
                    <div class="sc-body">

                        <div class="sc-meta">
                            <span class="sc-abbr">
                                <?php echo htmlspecialchars($s['abbr']); ?>
                            </span>

                            <span class="sc-separator">/</span>

                            <span class="sc-system-title">
                                <?php echo htmlspecialchars($s['title']); ?>
                            </span>
                        </div>

                        <h3>
                            <?php echo htmlspecialchars($s['tagline']); ?>
                        </h3>

                        <p>
                            <?php echo htmlspecialchars($s['overview']); ?>
                        </p>

                    </div>


                    <!-- STAT -->
                    <div class="sc-stat">

                        <span class="stat-label">
                            KEY IMPACT
                        </span>

                        <strong>
                            <?php echo htmlspecialchars($s['cover_stat']['value']); ?>
                        </strong>

                        <span class="stat-description">
                            <?php echo htmlspecialchars($s['cover_stat']['label']); ?>
                        </span>

                        <a
                            href="operations-logistics-detail.php?slug=<?php echo urlencode($s['slug']); ?>"
                            class="sc-details-btn">
                            <span>View Details</span>
                            <i class="bi bi-arrow-up-right"></i>
                        </a>

                    </div>

                </article>

            <?php endforeach; ?>

        </div>

    </div>

</section>

<!-- CTA -->
<section class="pipeline-cta-section">
    <div class="container">

        <div class="pipeline-cta">

            <div class="pipeline-cta-glow"></div>

            <div class="pipeline-cta-content">

                <div class="pipeline-cta-eyebrow">
                    <span class="cta-dot"></span>
                    Not Sure Where To Start?
                </div>

                <h2>
                    Tell us where the
                    <span>pipeline breaks</span>
                    down for you
                </h2>

                <p>
                    Book a discovery call and we'll tell you honestly which
                    piece to fix first, and whether it needs all five or just one.
                </p>

            </div>


            <div class="pipeline-cta-actions">

                <a href="#" class="pipeline-cta-btn primary">
                    <span>Book A Discovery Call</span>
                    <i class="bi bi-arrow-up-right"></i>
                </a>

                <a href="services.php" class="pipeline-cta-btn secondary">
                    <span>View Our Services</span>
                    <i class="bi bi-arrow-right"></i>
                </a>

            </div>

        </div>

    </div>
</section>

<?php
include_once('elements/faqs.php');
include_once('elements/footer.php');
?>