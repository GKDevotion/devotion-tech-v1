<?php
$seo = [
    'title' => 'Our Technology | Devotion Technologies - Technology Experts & Innovators',
    'description' => 'The frontend, backend, mobile, cloud, database, AI and integration technologies Devotion Technologies builds with — and how deep each stack actually runs.',
    'keywords' => 'Devotion Technologies stack, frontend development, backend development, cloud devops, database solutions, AI automation, API integration',
    'author' => 'Devotion Technologies'
];
include_once('elements/header.php');

// ---- Load technology categories from JSON ----
$techPath = __DIR__ . '/data/technology.json';
$technologies = [];
if (file_exists($techPath)) {
    $json = file_get_contents($techPath);
    $decoded = json_decode($json, true);
    if (is_array($decoded)) {
        $technologies = $decoded;
    }
}

// ---- Inline icon library, keyed by the "icon" field in technology.json ----
$techIcons = [
    'monitor'  => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><rect x="2.5" y="4" width="19" height="13" rx="2" /><path d="M8 21h8M12 17v4" /></svg>',
    'server'   => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><rect x="3" y="3.5" width="18" height="7" rx="1.6" /><rect x="3" y="13.5" width="18" height="7" rx="1.6" /><circle cx="7" cy="7" r="1" fill="currentColor" stroke="none" /><circle cx="7" cy="17" r="1" fill="currentColor" stroke="none" /></svg>',
    'device'   => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><rect x="7" y="2" width="10" height="20" rx="2" /><path d="M11 18h2" /></svg>',
    'cloud'    => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M7 18a4.5 4.5 0 01-1-8.9A5.5 5.5 0 0116.9 8.1 4 4 0 0117 16H7z" /></svg>',
    'database' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><ellipse cx="12" cy="5.5" rx="8" ry="3" /><path d="M4 5.5V18a8 3 0 0016 0V5.5" /><path d="M4 12a8 3 0 0016 0" /></svg>',
    'spark'    => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M12 2l1.8 6.2L20 10l-6.2 1.8L12 18l-1.8-6.2L4 10l6.2-1.8z" /></svg>',
    'link'     => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M9 15l6-6" /><path d="M10 6l1-1a4 4 0 015.7 5.7l-1 1M14 18l-1 1a4 4 0 01-5.7-5.7l1-1" /></svg>',
];
function tech_icon($icons, $key)
{
    return isset($icons[$key]) ? $icons[$key] : $icons['spark'];
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

    img {
        max-width: 100%;
        display: block;
    }

    section {
        padding: 90px 0;
    }

    .section-head {
        margin-bottom: 44px;
    }

    .section-head h2 {
        font-size: clamp(1.5rem, 2.4vw, 2rem);
        font-weight: 700;
        color: #070d24;
        margin: 12px 0 10px;
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
        color: #fff;
    }

    .btn-outline-light {
        border: 1.5px solid rgba(255, 255, 255, .4);
        color: #fff;
    }

    .btn-outline-light:hover {
        background: #fff;
        color: #070d24;
    }

    .btn-outline-dark {
        border: 1.5px solid #e8e3d6;
        color: #070d24;
    }

    .btn-outline-dark:hover {
        border-color: #b38f51;
        color: #8f7040;
    }


    /* =========================================
    TECHNOLOGY HERO
    ========================================= */

    .tech-hero {
        position: relative;
        background: url('<?php echo $siteBase; ?>/assets/images/banner-img.png');
        color: #000;
        min-height: 470px;
        padding: 0px;
        display: flex;
        align-items: center;
        overflow: hidden;
        isolation: isolate;
    }


    /* =========================================
    BACKGROUND GRID
    ========================================= */

    .tech-hero-grid {
        position: absolute;
        inset: 0;
        z-index: -1;
        background-image:
            linear-gradient(#00000011 1px,
                transparent 1px),
            linear-gradient(90deg,
                #00000011 1px,
                transparent 1px);

        background-size: 42px 42px;
        pointer-events: none;
    }


    /* =========================================
    DECORATIVE GOLD GLOW
    ========================================= */
    .tech-hero-glow {
        position: absolute;
        width: 560px;
        height: 560px;
        top: -250px;
        right: -180px;
        border-radius: 50%;
        z-index: -1;
        pointer-events: none;
    }

    /* =========================================
    HERO CONTAINER
    ========================================= */

    .tech-hero-inner {
        position: relative;
        display: grid;
        grid-template-columns: minmax(0, 1fr) auto;
        align-items: center;
        gap: 70px;
        min-height: 470px;
        padding-top: 65px;
        padding-bottom: 65px;

    }

    /* =========================================
    HERO CONTENT
    ========================================= */
    .tech-hero-content {
        min-width: 0;
    }

    /* =========================================
    EYEBROW
    ========================================= */

    .tech-eyebrow {

        display: inline-flex;
        align-items: center;
        gap: 10px;
        margin-bottom: 22px;
        color: #b38f51;
        font-size: 1.2rem;
        font-weight: 600;
        letter-spacing: 1.5px;
        text-transform: uppercase;
    }

    /* Gold Dot */

    .tech-eyebrow-dot {
        width: 7px;
        height: 7px;
        flex-shrink: 0;
        border-radius: 50%;
        background: #B38F51;
        box-shadow: 0 0 0 5px rgba(179, 143, 81, 0.10);

    }

    /* =========================================
    HERO TITLE
    ========================================= */

    .tech-hero-content h1 {
        margin: 0;
        color: #000;
        font-size: clamp(34px, 4vw, 58px);
        line-height: 1.12;
        font-weight: 700;
        letter-spacing: -1.8px;

    }

    /* Gold Highlight */
    .tech-hero-content h1 span {
        display: block;
        color: #b38f51;
    }

    /* =========================================
    DESCRIPTION
    ========================================= */
    .tech-hero-description {
        margin: 25px 0 0;
        color: #9da6b9;
        font-size: 1.2rem;
        line-height: 1.85;
        font-weight: 400;
    }

    /* =========================================
    STATS WRAPPER
    ========================================= */
    .tech-hero-stats {
        display: flex;
        flex-direction: column;
        gap: 0;
        min-width: 190px;
        border-left: 1px solid rgba(255, 255, 255, 0.18);
    }

    /* =========================================
    STAT ITEM
    ========================================= */

    .tech-stat {
        display: flex;
        flex-direction: column;
        padding: 22px 0 22px 30px;
        border-bottom: 1px solid rgba(255, 255, 255, 0.13);
    }

    /* Remove last border */
    .tech-stat:last-child {
        border-bottom: none;
    }

    /* Stat Number */
    .tech-stat strong {
        display: block;
        color: #b38f51;
        font-size: 32px;
        line-height: 1.2;
        font-weight: 700;
        letter-spacing: -0.8px;
    }

    /* Plus / Percentage */
    .tech-stat strong span {
        color: #B38F51;
    }

    /* Stat Label */
    .tech-stat>span {
        display: block;
        margin-top: 8px;
        color: #9da6b9;
        font-size: 1.2rem;
        line-height: 1.5;
        font-weight: 500;
    }

    /* =========================================
    TABLET
    ========================================= */
    @media (max-width: 991px) {

        .tech-hero {
            min-height: auto;
        }

        .tech-hero-inner {
            grid-template-columns: 1fr;
            gap: 40px;
            min-height: auto;
            padding-top: 75px;
            padding-bottom: 75px;
        }

        .tech-hero-content {
            max-width: 750px;
        }

        .tech-hero-content h1 {
            font-size: clamp(36px, 5vw, 52px);
        }

        .tech-hero-stats {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            border-left: none;
            border-top: 1px solid rgba(255, 255, 255, 0.18);
        }

        .tech-stat {
            padding: 25px 20px 0 0;
            border-bottom: none;
            border-right: 1px solid rgba(255, 255, 255, 0.13);
        }

        .tech-stat:last-child {
            border-right: none;
            padding-left: 20px;
        }

        .tech-stat:nth-child(2) {
            padding-left: 20px;
        }

    }

    /* =========================================
    MOBILE
    ========================================= */
    @media (max-width: 576px) {

        .tech-hero-inner {
            padding-top: 55px;
            padding-bottom: 55px;
            gap: 35px;
        }

        .tech-hero-content h1 {
            font-size: 34px;
            letter-spacing: -1px;
        }

        .tech-hero-description {
            font-size: 15px;
            line-height: 1.75;
        }

        .tech-hero-stats {
            grid-template-columns: 1fr;
            gap: 0;
        }

        .tech-stat {
            padding: 18px 0;
            border-right: none;
            border-bottom: 1px solid rgba(255, 255, 255, 0.13);
        }

        .tech-stat:nth-child(2),
        .tech-stat:last-child {
            padding-left: 0;
        }

        .tech-stat:last-child {
            border-bottom: none;
        }

        .tech-stat strong {
            font-size: 30px;
        }

    }

    /* =========================================
   TECHNOLOGY STACK SWITCHER
   ========================================= */

    .stack-switcher {
        padding: 100px 0;
    }

    .stack-switcher .section-head {
        margin-bottom: 38px;
    }

    .stack-switcher .section-head h2 {
        font-size: clamp(28px, 3vw, 40px);
        line-height: 1.18;
        color: #000;
        margin-bottom: 15px;
    }

    .stack-switcher .section-head p {
        color: #667085;
        font-size: 1rem;
        line-height: 1.8;
    }

    /* =========================================
   MAIN SHELL
   ========================================= */

    .switcher-shell {
        display: grid;
        grid-template-columns: 270px minmax(0, 1fr);
        background: #ffffff;
        border: 1px solid #e5ded2;
        border-radius: 22px;
        overflow: hidden;
        box-shadow: 0 18px 50px rgba(7, 13, 36, 0.06);
    }

    /* =========================================
   LEFT NAVIGATION RAIL
   ========================================= */

    .switcher-rail {
        background: #000;
        padding: 24px 14px;
        display: flex;
        flex-direction: column;
        gap: 8px;
    }

    .rail-item {
        display: flex;
        align-items: center;
        gap: 13px;
        width: 100%;
        padding: 14px 13px;
        border: 1px solid transparent;
        border-radius: 12px;
        background: transparent;
        color: #aab1c5;
        text-align: left;
        cursor: pointer;
        transition:
            background 0.25s ease,
            color 0.25s ease,
            border-color 0.25s ease,
            transform 0.25s ease;
    }

    .rail-item:hover {
        background: rgba(255, 255, 255, 0.06);
        color: #ffffff;
    }

    .rail-item.active {
        border-color: #b38f51;
        color: #ffffff;
    }

    .rail-icon {
        width: 38px;
        height: 38px;
        flex: 0 0 38px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 10px;
        background: rgba(255, 255, 255, 0.06);
        color: #b7bfd2;
        transition: 0.25s ease;
    }

    .rail-item.active .rail-icon {
        background: #b38f51;
        color: #ffffff;
    }

    .rail-title {
        font-size: 13px;
        font-weight: 600;
        line-height: 1.4;
    }

    /* =========================================
   CONTENT AREA
   ========================================= */

    .switcher-content {
        min-width: 0;
        padding: 46px 42px;
        background: #ffffff;
    }

    .switcher-panel {
        display: none;
        animation: techPanelFade 0.35s ease;
    }

    .switcher-panel.active {
        display: block;
    }

    @keyframes techPanelFade {
        from {
            opacity: 0;
            transform: translateY(8px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    /* =========================================
   PANEL TOP
   ========================================= */

    .panel-top {
        display: grid;
        grid-template-columns: minmax(0, 1fr) auto;
        gap: 30px;
        align-items: start;
        padding-bottom: 34px;
        border-bottom: 1px solid #eee8de;
    }

    .panel-top .eyebrow {
        display: block;
        color: #b38f51;
        font-size: 1rem;
        font-weight: 700;
        letter-spacing: 0.07em;
        text-transform: uppercase;
        margin-bottom: 12px;
    }

    .panel-top h3 {
        color: #070d24;
        font-size: clamp(22px, 2.2vw, 29px);
        line-height: 1.3;
        margin-bottom: 12px;
    }

    .panel-top p {
        color: #667085;
        font-size: 1rem;
        line-height: 1.8;
        margin: 0;
    }

    /* =========================================
   PANEL STAT
   ========================================= */

    .panel-stat {
        min-width: 120px;
        padding: 18px 20px;
        text-align: center;
        border: 1px solid #e5ded2;
        border-radius: 14px;
        background: #faf8f3;
    }

    .panel-stat strong {
        display: block;
        color: #b38f51;
        font-size: 28px;
        font-weight: 800;
        line-height: 1.2;
    }

    .panel-stat span {
        display: block;
        margin-top: 8px;
        color: #7b8497;
        font-size: 1rem;
        line-height: 1.5;
    }

    /* =========================================
   PANEL BODY
   ========================================= */

    .panel-body {
        display: grid;
        grid-template-columns: minmax(0, 1fr) minmax(0, 1fr);
        gap: 42px;
        padding-top: 34px;
    }

    .pb-label {
        display: block;
        margin-bottom: 22px;
        color: #b38f51;
        font-size: 1rem;
        font-weight: 600;
        letter-spacing: 0.09em;
    }

    /* =========================================
   STACK PROFICIENCY BARS
   ========================================= */

    .stack-bar {
        margin-bottom: 21px;
    }

    .stack-bar:last-child {
        margin-bottom: 0;
    }

    .stack-bar-top {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 15px;
        margin-bottom: 9px;
    }

    .stack-bar-top .name {
        color: #000;
        font-size: 1rem;
        font-weight: 600;
    }

    .stack-bar-top .level {
        color: #b38f51;
        font-size: 1rem;
        font-weight: 600;
    }

    .stack-bar-track {
        width: 100%;
        height: 6px;
        overflow: hidden;
        border-radius: 100px;
        background: #eee9df;
    }

    .stack-bar-fill {
        width: 0;
        height: 100%;
        border-radius: inherit;
        background: #b38f51;
        transition: width 0.8s ease;
    }

    /* =========================================
   PROJECT TYPE CHIPS
   ========================================= */

    .panel-chips {
        display: flex;
        flex-wrap: wrap;
        gap: 10px;
    }

    .panel-chips span {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        padding: 10px 13px;
        border: 1px solid #e5ded2;
        border-radius: 100px;
        background: #ffffff;
        color: #000;
        font-size: 1rem;
        font-weight: 500;
        line-height: 1.4;
        transition: 0.25s ease;
    }

    .panel-chips span::before {
        content: "";
        width: 5px;
        height: 5px;
        flex: 0 0 5px;
        border-radius: 50%;
        background: #b38f51;
    }

    .panel-chips span:hover {
        border-color: #b38f51;
        background: #faf8f3;
    }

    /* =========================================
   CTA
   ========================================= */

    .panel-cta {
        margin-top: 30px;
    }

    .btn-outline-dark {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 10px;
        padding: 12px 20px;
        border: 1px solid #dcd4c7;
        border-radius: 9px;
        color: #000;
        background: #ffffff;
        font-size: 13px;
        font-weight: 700;
        text-decoration: none;
        transition: 0.25s ease;
    }

    .btn-outline-dark:hover {
        color: #ffffff;
        background: #000;
        border-color: #000;
    }

    /* =========================================
   RESPONSIVE
   ========================================= */

    @media (max-width: 991px) {

        .stack-switcher {
            padding: 75px 0;
        }

        .switcher-shell {
            grid-template-columns: 220px minmax(0, 1fr);
        }

        .switcher-content {
            padding: 32px 26px;
        }

        .panel-body {
            grid-template-columns: 1fr;
            gap: 32px;
        }

        .panel-top {
            gap: 20px;
        }

        .panel-stat {
            min-width: 105px;
        }

    }

    @media (max-width: 767px) {

        .stack-switcher {
            padding: 55px 0;
        }

        .switcher-shell {
            display: block;
            border-radius: 16px;
        }

        .switcher-rail {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 8px;
            padding: 14px;
        }

        .rail-item {
            padding: 11px 10px;
            gap: 9px;
        }

        .rail-icon {
            width: 32px;
            height: 32px;
            flex-basis: 32px;
        }

        .rail-title {
            font-size: 11px;
        }

        .switcher-content {
            padding: 28px 20px;
        }

        .panel-top {
            grid-template-columns: 1fr;
            gap: 22px;
        }

        .panel-stat {
            width: fit-content;
            min-width: 125px;
            text-align: left;
        }

        .panel-body {
            padding-top: 28px;
        }

    }


    /* =========================================
   HOW WE WORK — PROFESSIONAL PROCESS
========================================= */

    .process-strip {
        position: relative;
        padding: 105px 0 115px;
        background: #F8F6F1;
        overflow: hidden;
    }

    /* Soft decorative background */
    .process-strip::before {
        content: "";
        position: absolute;
        width: 380px;
        height: 380px;
        top: -180px;
        right: -100px;
        border-radius: 50%;
        background: rgba(179, 143, 81, 0.055);
        pointer-events: none;
    }

    .process-strip .container {
        position: relative;
        z-index: 1;
    }

    /* =========================================
   SECTION HEADING
========================================= */

    .process-heading {
        margin-bottom: 58px;
    }

    .process-heading h2 {
        margin-bottom: 16px;
        color: #070D24;
        font-size: clamp(28px, 3vw, 42px);
        font-weight: 700;
        line-height: 1.18;
        letter-spacing: -1.1px;
    }

    .process-heading p {
        margin: 0;
        color: #647086;
        font-size: 1.2rem;
        line-height: 1.75;
    }

    /* =========================================
   STEP GRID
========================================= */

    .step-grid {
        display: grid;
        grid-template-columns: repeat(4, minmax(0, 1fr));
        gap: 22px;
        position: relative;
    }

    /* Connecting line behind cards */
    .step-grid::before {
        content: "";
        position: absolute;
        top: 34px;
        left: 11%;
        right: 11%;
        height: 1px;
        background: linear-gradient(90deg,
                rgba(179, 143, 81, 0.15),
                rgba(179, 143, 81, 0.65),
                rgba(179, 143, 81, 0.15));
        z-index: 0;
    }

    /* =========================================
   STEP CARD
========================================= */

    .step-item {
        position: relative;
        z-index: 1;
        min-width: 0;
        padding: 27px 25px 29px;
        border: 1px solid #E6DED0;
        border-radius: 18px;
        background: #FFFFFF;
        box-shadow: 0 8px 30px rgba(7, 13, 36, 0.035);
        transition:
            transform 0.3s ease,
            box-shadow 0.3s ease,
            border-color 0.3s ease;
    }

    /* Colorful top accent */
    .step-item::before {
        content: "";
        position: absolute;
        top: -1px;
        left: 25px;
        right: 25px;
        height: 3px;
        border-radius: 0 0 8px 8px;
        background: #B38F51;
    }

    /* Individual accent colors */
    .step-item:nth-child(2)::before {
        background: #B38F51;
    }

    .step-item:nth-child(3)::before {
        background: #B38F51;
    }

    .step-item:nth-child(4)::before {
        background: #B38F51;
    }

    /* Hover effect */
    .step-item:hover {
        transform: translateY(-7px);
        border-color: #D7C4A4;
        box-shadow: 0 18px 40px rgba(7, 13, 36, 0.09);
    }

    /* =========================================
   NUMBER + ICON
========================================= */

    .step-top {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 12px;
        margin-bottom: 27px;
    }

    .step-top .num {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 53px;
        height: 53px;
        border-radius: 15px;
        background: #F5EDDF;
        color: #B38F51;
        font-size: 19px;
        font-weight: 700;
        letter-spacing: -0.5px;
    }

    .step-item:nth-child(2) .num {
        background: #F5EDDF;
        color: #b38f51;
    }

    .step-item:nth-child(3) .num {
        background: #F5EDDF;
        color: #b38f51;
    }

    .step-item:nth-child(4) .num {
        background: #F5EDDF;
        color: #b38f51;
    }

    /* Small icon */
    .step-icon {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 35px;
        height: 35px;
        border-radius: 50%;
        border: 1px solid #E8DFD1;
        color: #B38F51;
        font-size: 18px;
        font-weight: 600;
    }

    .step-item:nth-child(2) .step-icon {
        color: #b38f51;
    }

    .step-item:nth-child(3) .step-icon {
        color: #b38f51;
    }

    .step-item:nth-child(4) .step-icon {
        color: #b38f51;
    }

    /* =========================================
   STEP CONTENT
========================================= */

    .step-label {
        display: inline-block;
        margin-bottom: 11px;
        color: #b38f51;
        font-size: 1rem;
        font-weight: 700;
        letter-spacing: 1.3px;
        text-transform: uppercase;
    }

    .step-item:nth-child(2) .step-label {
        color: #b38f51;
    }

    .step-item:nth-child(3) .step-label {
        color: #b38f51;
    }

    .step-item:nth-child(4) .step-label {
        color: #b38f51;
    }

    .step-content h4 {
        margin: 0 0 13px;
        color: #070D24;
        font-size: 18px;
        font-weight: 700;
        line-height: 1.35;
        letter-spacing: -0.3px;
    }

    .step-content p {
        margin: 0;
        color: #647086;
        font-size: 1rem;
        line-height: 1.75;
    }

    /* =========================================
   RESPONSIVE — TABLET
========================================= */

    @media (max-width: 1100px) {

        .step-grid {
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 22px;
        }

        .step-grid::before {
            display: none;
        }

        .step-item {
            padding: 25px;
        }

        .process-heading {
            margin-bottom: 42px;
        }

    }

    /* =========================================
   RESPONSIVE — MOBILE
========================================= */

    @media (max-width: 575px) {

        .process-strip {
            padding: 70px 0 75px;
        }

        .process-heading {
            margin-bottom: 35px;
        }

        .process-heading h2 {
            font-size: 28px;
            letter-spacing: -0.7px;
        }

        .process-heading p {
            font-size: 14px;
        }

        .step-grid {
            grid-template-columns: 1fr;
            gap: 18px;
        }

        .step-item {
            padding: 23px 22px 25px;
            border-radius: 16px;
        }

        .step-top {
            margin-bottom: 22px;
        }

        .step-top .num {
            width: 48px;
            height: 48px;
            border-radius: 13px;
            font-size: 17px;
        }

        .step-content h4 {
            font-size: 17px;
        }

        .step-content p {
            font-size: 14px;
        }

    }

   
/* =========================================
   TECHNOLOGY CTA SECTION
========================================= */

.tech-cta-section {
    padding: 80px 0 100px;
    background: #FFFFFF;
}

/* Main CTA */
.tech-cta {
    position: relative;
    overflow: hidden;
    padding: 68px 68px;
    border-radius: 27px;
    background:
        radial-gradient(
            circle at 92% 0%,
            rgba(179, 143, 81, 0.22),
            transparent 32%
        ),
        linear-gradient(
            115deg,
            #070D24 0%,
            #101D43 58%,
            #182B59 100%
        );
    box-shadow: 0 20px 60px rgba(7, 13, 36, 0.12);
}

/* Decorative border */
.tech-cta::before {
    content: "";
    position: absolute;
    inset: 0;
    border: 1px solid rgba(255, 255, 255, 0.12);
    border-radius: inherit;
    pointer-events: none;
}

/* Subtle grid pattern */
.tech-cta::after {
    content: "";
    position: absolute;
    inset: 0;
    opacity: 0.055;
    background-image:
        linear-gradient(
            rgba(255, 255, 255, 0.6) 1px,
            transparent 1px
        ),
        linear-gradient(
            90deg,
            rgba(255, 255, 255, 0.6) 1px,
            transparent 1px
        );
    background-size: 42px 42px;
    pointer-events: none;
}

/* =========================================
   DECORATIVE GLOW
========================================= */

.cta-glow {
    position: absolute;
    border-radius: 50%;
    pointer-events: none;
    filter: blur(2px);
}

.cta-glow-one {
    width: 250px;
    height: 250px;
    top: -170px;
    right: 50px;
    background: rgba(179, 143, 81, 0.16);
}

.cta-glow-two {
    width: 180px;
    height: 180px;
    bottom: -130px;
    left: 35%;
    background: rgba(90, 116, 180, 0.12);
}

/* =========================================
   CONTENT GRID
========================================= */

.cta-grid {
    position: relative;
    z-index: 2;
    display: grid;
    grid-template-columns: minmax(0, 1.25fr) minmax(280px, 0.75fr);
    align-items: center;
    gap: 65px;
}

/* =========================================
   EYEBROW
========================================= */

.cta-eyebrow {
    display: inline-flex;
    align-items: center;
    gap: 10px;
    margin-bottom: 21px;
    color: #b38f51;
    font-size: 1.2rem;
    font-weight: 600;
    letter-spacing: 0.2px;
}

.cta-eyebrow-dot {
    width: 8px;
    height: 8px;
    border-radius: 50%;
    background: #B38F51;
    box-shadow: 0 0 0 5px rgba(179, 143, 81, 0.12);
}

/* =========================================
   HEADING
========================================= */

.cta-content h2 {
    max-width: 670px;
    margin: 0 0 20px;
    color: #FFFFFF;
    font-size: clamp(28px, 3.2vw, 43px);
    font-weight: 700;
    line-height: 1.18;
    letter-spacing: -1.2px;
}

.cta-content h2 span {
    color: #FFFFFF;
}

/* Description */
.cta-content p {
    margin: 0;
    color: #C3CBDD;
    font-size: 1rem;
    line-height: 1.75;
}

/* =========================================
   TRUST POINTS
========================================= */

.cta-trust {
    display: flex;
    flex-wrap: wrap;
    gap: 20px;
    margin-top: 28px;
}

.trust-item {
    display: inline-flex;
    align-items: center;
    gap: 9px;
    color: #D5DCEC;
    font-size: 1rem;
}

.trust-check {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    width: 19px;
    height: 19px;
    border: 1px solid rgba(179, 143, 81, 0.5);
    border-radius: 50%;
    color: #D0AD6B;
    font-size: 11px;
    font-weight: 700;
}

/* =========================================
   CTA ACTIONS
========================================= */

.cta-actions {
    display: flex;
    flex-direction: column;
    align-items: stretch;
    gap: 13px;
    max-width: 320px;
    width: 100%;
    justify-self: end;
}

/* Base Button */
.cta-btn {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 18px;
    min-height: 57px;
    padding: 15px 19px 15px 24px;
    border-radius: 11px;
    font-size: 13px;
    font-weight: 600;
    text-decoration: none;
    transition:
        transform 0.25s ease,
        box-shadow 0.25s ease,
        background 0.25s ease;
}

/* Primary */
.cta-btn-primary {
    background: #B38F51;
    color: #FFFFFF;
    box-shadow: 0 7px 22px rgba(179, 143, 81, 0.16);
}

.cta-btn-primary:hover {
    background: #C39D5B;
    color: #FFFFFF;
    transform: translateY(-3px);
    box-shadow: 0 12px 28px rgba(179, 143, 81, 0.24);
}

/* Secondary */
.cta-btn-secondary {
    border: 1px solid rgba(255, 255, 255, 0.32);
    background: rgba(255, 255, 255, 0.035);
    color: #FFFFFF;
}

.cta-btn-secondary:hover {
    background: rgba(255, 255, 255, 0.11);
    border-color: rgba(255, 255, 255, 0.6);
    color: #FFFFFF;
    transform: translateY(-3px);
}

/* Button arrow */
.cta-btn-arrow {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    width: 27px;
    height: 27px;
    border-radius: 50%;
    background: rgba(255, 255, 255, 0.13);
    font-size: 15px;
    transition: transform 0.25s ease;
}

.cta-btn:hover .cta-btn-arrow {
    transform: translate(2px, -2px);
}

.cta-note {
    margin-top: 7px;
    color: #8F9BB5;
    font-size: 1rem;
    line-height: 1.6;
    text-align: center;
}

/* =========================================
   TABLET
========================================= */

@media (max-width: 991px) {

    .tech-cta {
        padding: 52px 42px;
    }

    .cta-grid {
        grid-template-columns: 1fr;
        gap: 35px;
    }

    .cta-content h2 {
        max-width: 700px;
    }

    .cta-actions {
        justify-self: start;
        max-width: 390px;
        width: 100%;
    }

    .cta-note {
        text-align: left;
    }

}

/* =========================================
   MOBILE
========================================= */

@media (max-width: 575px) {

    .tech-cta-section {
        padding: 55px 0 70px;
    }

    .tech-cta {
        padding: 36px 24px;
        border-radius: 21px;
    }

    .cta-grid {
        gap: 30px;
    }

    .cta-eyebrow {
        font-size: 12px;
        margin-bottom: 17px;
    }

    .cta-content h2 {
        font-size: 29px;
        letter-spacing: -0.7px;
        line-height: 1.22;
    }

    .cta-content p {
        font-size: 14px;
        line-height: 1.7;
    }

    .cta-trust {
        flex-direction: column;
        gap: 12px;
        margin-top: 24px;
    }

    .cta-actions {
        max-width: 100%;
    }

    .cta-btn {
        min-height: 54px;
        padding: 14px 17px 14px 19px;
        font-size: 12px;
    }

}
</style>


<!-- TECHNOLOGY HERO -->
<section class="tech-hero">

    <!-- Background Grid -->
    <div class="tech-hero-grid"></div>

    <!-- Decorative Glow -->
    <div class="tech-hero-glow"></div>

    <div class="container tech-hero-inner">

        <!-- Left Content -->
        <div class="tech-hero-content">

            <div class="tech-eyebrow">
                <span class="tech-eyebrow-dot"></span>
                Our Technology
            </div>

            <h1>
                Seven stacks, one team that
                <span>actually knows all of them.</span>
            </h1>

            <p class="tech-hero-description">
                From the interface someone taps on their phone down to the
                database handling their request, we build and maintain the
                full stack — so nothing gets lost in a handoff between vendors.
            </p>

        </div>

        <!-- Right / Bottom Stats -->
        <div class="tech-hero-stats">

            <div class="tech-stat">

                <strong>
                    <?php echo count($technologies); ?>
                </strong>

                <span>Stack categories</span>

            </div>

            <div class="tech-stat">

                <strong>
                    500<span>+</span>
                </strong>

                <span>Projects delivered</span>

            </div>

            <div class="tech-stat">

                <strong>
                    99.9<span>%</span>
                </strong>

                <span>Average uptime</span>

            </div>

        </div>

    </div>

</section>

<!-- MASTER/DETAIL SWITCHER -->
<section class="stack-switcher">
    <div class="container">
        <div class="section-head">
            <div class="badge-pill mb-3">
                <span class="dot"></span>
                Explore The Stack
            </div>
            <h2>Pick a category to see how deep it runs</h2>
            <p>Every category below is a real, actively-maintained capability — not a logo wall. Click through to see the tools, proficiency and the kind of work we use each one for.</p>
        </div>

        <div class="switcher-shell">
            <div class="switcher-rail" id="techRail">
                <?php foreach ($technologies as $i => $t): ?>

                    <button type="button" class="rail-item <?php echo $i === 0 ? 'active' : ''; ?>" data-target="panel-<?php echo htmlspecialchars($t['slug'], ENT_QUOTES, 'UTF-8'); ?>" aria-selected="<?php echo $i === 0 ? 'true' : 'false'; ?>">
                        <span class="rail-icon">
                            <?php echo tech_icon($techIcons, $t['icon']); ?>
                        </span>
                        <span class="rail-title">
                            <?php echo htmlspecialchars($t['title']); ?>
                        </span>
                    </button>

                <?php endforeach; ?>
            </div>

            <div class="switcher-content">
                <?php foreach ($technologies as $i => $t): ?>
                    <div class="switcher-panel <?php echo $i === 0 ? 'active' : ''; ?>" id="panel-<?php echo htmlspecialchars($t['slug']); ?>">
                        <div class="panel-top">
                            <div>
                                <span class="eyebrow"><?php echo htmlspecialchars($t['title']); ?></span>
                                <h3><?php echo htmlspecialchars($t['tagline']); ?></h3>
                                <p><?php echo htmlspecialchars($t['overview']); ?></p>
                            </div>
                            <div class="panel-stat">
                                <strong><?php echo htmlspecialchars($t['cover_stat']['value']); ?></strong>
                                <span><?php echo htmlspecialchars($t['cover_stat']['label']); ?></span>
                            </div>
                        </div>

                        <div class="panel-body">
                            <div class="panel-block">
                                <span class="pb-label">Core Stack</span>
                                <?php foreach (array_slice($t['core_stack'], 0, 4) as $tech): ?>
                                    <div class="stack-bar">
                                        <div class="stack-bar-top">
                                            <span class="name"><?php echo htmlspecialchars($tech['name']); ?></span>
                                            <span class="level"><?php echo (int) $tech['level']; ?>%</span>
                                        </div>
                                        <div class="stack-bar-track">
                                            <div class="stack-bar-fill" style="width:<?php echo (int) $tech['level']; ?>%;"></div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>

                            <div class="panel-block">
                                <span class="pb-label">Where We Use It</span>
                                <div class="panel-chips">
                                    <?php foreach ($t['project_types'] as $pt): ?>
                                        <span><?php echo htmlspecialchars($pt); ?></span>
                                    <?php endforeach; ?>
                                </div>
                                <div class="panel-cta">
                                    <a href="technology-detail.php?slug=<?php echo urlencode($t['slug']); ?>" class="btn btn-outline-dark">View Full Details</a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>


<!-- HOW WE WORK -->
<section class="process-strip">
    <div class="container">

        <!-- Section Heading -->
        <div class="section-head process-heading">
            <div class="badge-pill mb-3">
                <span class="dot"></span>
                How We Apply It
            </div>

            <h2>
                The same discipline, whichever layer of the stack we're in
            </h2>

            <p>
                Regardless of which technology category your project needs,
                every engagement follows the same four-step rhythm.
            </p>
        </div>

        <!-- Process Steps -->
        <div class="step-grid">

            <div class="step-item">
                <div class="step-top">
                    <span class="num">01</span>
                    <span class="step-icon">↗</span>
                </div>

                <div class="step-content">
                    <span class="step-label">Discovery</span>

                    <h4>Assess The Fit</h4>

                    <p>
                        We confirm the right technology for your constraints
                        before recommending anything.
                    </p>
                </div>
            </div>

            <div class="step-item">
                <div class="step-top">
                    <span class="num">02</span>
                    <span class="step-icon">⌘</span>
                </div>

                <div class="step-content">
                    <span class="step-label">Architecture</span>

                    <h4>Architect First</h4>

                    <p>
                        Structure and contracts are agreed before implementation
                        begins, not discovered midway.
                    </p>
                </div>
            </div>

            <div class="step-item">
                <div class="step-top">
                    <span class="num">03</span>
                    <span class="step-icon">⚡</span>
                </div>

                <div class="step-content">
                    <span class="step-label">Development</span>

                    <h4>Build &amp; Demo Weekly</h4>

                    <p>
                        You see working software every week, not a status report
                        about working software.
                    </p>
                </div>
            </div>

            <div class="step-item">
                <div class="step-top">
                    <span class="num">04</span>
                    <span class="step-icon">✓</span>
                </div>

                <div class="step-content">
                    <span class="step-label">Launch &amp; Support</span>

                    <h4>Monitor After Launch</h4>

                    <p>
                        We stay accountable for how it performs in production,
                        not just on delivery day.
                    </p>
                </div>
            </div>

        </div>

    </div>
</section>

<!-- =========================================
     TECHNOLOGY CTA
========================================= -->
<section class="tech-cta-section">
    <div class="container">

        <div class="tech-cta">

            <!-- Decorative background -->
            <div class="cta-glow cta-glow-one"></div>
            <div class="cta-glow cta-glow-two"></div>

            <div class="cta-grid">

                <!-- CTA Content -->
                <div class="cta-content">

                    <div class="cta-eyebrow">
                        <span class="cta-eyebrow-dot"></span>
                        Not Sure Which Stack Fits?
                    </div>

                    <h2>
                        Tell us what you're building —
                        <span>we'll recommend the right technology.</span>
                    </h2>

                    <p>
                        Book a discovery call and we'll tell you honestly
                        which stack (or combination) makes sense for your
                        goals, timeline and team.
                    </p>

                    <div class="cta-trust">
                        <span class="trust-item">
                            <span class="trust-check">✓</span>
                            Practical recommendations
                        </span>

                        <span class="trust-item">
                            <span class="trust-check">✓</span>
                            Built around your goals
                        </span>
                    </div>

                </div>

                <!-- CTA Actions -->
                <div class="cta-actions">

                    <a href="contact.php" class="cta-btn cta-btn-primary">
                        <span>Book A Discovery Call</span>
                        <span class="cta-btn-arrow">↗</span>
                    </a>

                    <a href="services.php" class="cta-btn cta-btn-secondary">
                        <span>View Our Services</span>
                        <span class="cta-btn-arrow">↗</span>
                    </a>

                    <span class="cta-note">
                        Let's find the right fit for your project.
                    </span>

                </div>

            </div>

        </div>

    </div>
</section>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var railItems = document.querySelectorAll('#techRail .rail-item');
        var panels = document.querySelectorAll('.switcher-panel');

        railItems.forEach(function(item) {
            item.addEventListener('click', function() {
                var target = item.getAttribute('data-target');

                railItems.forEach(function(r) {
                    r.classList.remove('active');
                });
                item.classList.add('active');

                panels.forEach(function(p) {
                    p.classList.toggle('active', p.id === target);
                });
            });
        });
    });
</script>

<?php
include_once('elements/footer.php');
?>