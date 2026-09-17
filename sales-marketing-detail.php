<?php
$smPath = __DIR__ . '/data/sales-marketing.json';
$tools = [];
if (file_exists($smPath)) {
    $json = file_get_contents($smPath);
    $decoded = json_decode($json, true);
    if (is_array($decoded)) {
        $tools = $decoded;
    }
}

$slug = isset($_GET['slug']) ? preg_replace('/[^a-z0-9\-]/', '', strtolower($_GET['slug'])) : '';
$tool = null;
foreach ($tools as $t) {
    if ($t['slug'] === $slug) {
        $tool = $t;
        break;
    }
}
if (!$tool && count($tools) > 0) {
    $tool = $tools[0];
}

$seo = [
    'title' => ($tool ? $tool['title'] . ' (' . $tool['abbr'] . ')' : 'Sales & Marketing') . ' | Devotion Technologies - Technology Experts & Innovators',
    'description' => $tool ? $tool['tagline'] : 'Sales and marketing systems built by Devotion Technologies.',
    'keywords' => 'Devotion Technologies ' . ($tool ? strtolower($tool['abbr']) : 'sales marketing') . ', sales software, marketing systems',
    'author' => 'Devotion Technologies'
];
include_once('elements/header.php');

$smIcons = [
    'hub'    => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><circle cx="12" cy="12" r="3.2" /><path d="M12 4v3.3M12 16.7V20M20 12h-3.3M7.3 12H4M17 7l-2.3 2.3M9.3 14.7L7 17M17 17l-2.3-2.3M9.3 9.3L7 7" /></svg>',
    'pos'    => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><rect x="3" y="4" width="18" height="12" rx="1.6" /><path d="M8 20h8M9 16v4M15 16v4" /><path d="M7 8h4v3H7z" /></svg>',
    'tag'    => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M12.5 3H5a2 2 0 00-2 2v7.5a2 2 0 00.6 1.4l8.5 8.5a2 2 0 002.8 0l6-6a2 2 0 000-2.8l-8.4-8.4a2 2 0 00-1-.6z" /><circle cx="8" cy="8" r="1.3" /></svg>',
    'layout' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><rect x="3" y="3.5" width="18" height="17" rx="2" /><path d="M3 8.5h18M9 8.5V20.5" /></svg>',
    'mail'   => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><rect x="3" y="5" width="18" height="14" rx="2" /><path d="M3.5 6.5L12 13l8.5-6.5" /></svg>',
    'users'  => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><circle cx="9" cy="8" r="3.2" /><path d="M2.5 20c0-3.5 3-6 6.5-6s6.5 2.5 6.5 6" /><circle cx="17.5" cy="8.5" r="2.4" /><path d="M15.8 14.2c2.7.3 4.7 2.4 4.7 5.3" /></svg>',
    'idcard' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><rect x="2.5" y="5" width="19" height="14" rx="2" /><circle cx="8.5" cy="11" r="2.1" /><path d="M5.5 16.5c.6-1.7 1.9-2.6 3-2.6s2.4.9 3 2.6M14.5 9.5h5M14.5 13h5" /></svg>',
    'coins'  => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><ellipse cx="9" cy="7" rx="6" ry="3" /><path d="M3 7v10a6 3 0 0012 0V7" /><path d="M21 11.5a6 3 0 01-6 2.9M21 15.5a6 3 0 01-6 2.9" /><path d="M15 8v10" /></svg>',
    'cloud'  => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M7 18a4.5 4.5 0 01-1-8.9A5.5 5.5 0 0116.9 8.1 4 4 0 0117 16H7z" /></svg>',
];
function sm_icon($icons, $key)
{
    return isset($icons[$key]) ? $icons[$key] : $icons['hub'];
}

$otherTools = array_values(array_filter($tools, function ($t) use ($tool) {
    return !$tool || $t['slug'] !== $tool['slug'];
}));
?>

<?php if ($tool): ?>

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
            padding: 80px 0;
        }

        .section-head {
            max-width: 700px;
            margin-bottom: 36px;
        }

        .section-head h2 {
            font-size: clamp(1.4rem, 2.2vw, 1.9rem);
            font-weight: 700;
            color: #000;
            margin: 12px 0 10px;
        }

        .section-head p {
            color: #6c7280;
            font-size: .98rem;
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

        /* BREADCRUMB */
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
            font-size: 1rem;
            color: #6c7280;
        }

        .breadcrumb-bar a:hover {
            color: #8f7040;
        }

        .breadcrumb-bar li.current {
            color: #000;
            font-weight: 600;
        }

        .breadcrumb-bar .sep {
            color: #c7cbd3;
        }

        /* =========================================================
   SYSTEM DETAIL HERO
========================================================= */

        .sys-hero {
            position: relative;
            overflow: hidden;
            background-image: url(../d-tech/assets/images/banner-img.png);
            background-repeat: no-repeat;
            color: #000;
        }

        /* Subtle architectural grid */
        .sys-hero::before {
            content: "";
            position: absolute;
            inset: 0;
            background-image:
                linear-gradient( #00000011 1px,
                    transparent 1px),
                linear-gradient(90deg,
                    #00000011 1px,
                    transparent 1px);

            background-size: 56px 56px;
            pointer-events: none;
        }

        /* Gold top accent */
        .sys-hero::after {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 3px;
            background: #B38F51;
        }

        .sys-hero .container {
            position: relative;
            z-index: 1;
        }

        /* Main Layout */
        .sys-hero-inner {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 50px;
            min-height: 215px;
            padding: 40px 0;
        }


        /* =========================================================
        MAIN CONTENT
        ========================================================= */

        .sys-hero-main {
            display: flex;
            align-items: center;

            gap: 24px;

            min-width: 0;
        }


        /* =========================================================
   ICON
========================================================= */

        .sys-hero-icon {
            width: 70px;
            height: 70px;

            flex-shrink: 0;

            display: flex;
            align-items: center;
            justify-content: center;

            border: 1px solid rgba(255, 255, 255, 0.15);

            border-radius: 17px;

            color: #b38f51;

            background:
                linear-gradient(145deg,
                    rgba(255, 255, 255, 0.08),
                    rgba(255, 255, 255, 0.025));

            box-shadow:
                inset 0 1px 0 rgba(255, 255, 255, 0.08),
                0 12px 30px rgba(0, 0, 0, 0.18);

            backdrop-filter: blur(8px);
        }

        .sys-hero-icon svg {
            width: 28px;
            height: 28px;
        }


        /* =========================================================
   TEXT
========================================================= */

        .sys-hero-text {
            min-width: 0;
        }


        /* =========================================================
   ABBR
========================================================= */

        .sys-hero-abbr {
            display: flex;
            align-items: center;
            gap: 8px;

            margin-bottom: 6px;

            color: #b38f51;

            font-size: 1.2rem;
            font-weight: 700;

            letter-spacing: 1.8px;

            text-transform: uppercase;
        }

        .sys-hero-abbr span {
            width: 6px;
            height: 6px;

            flex-shrink: 0;

            border-radius: 50%;

            background: #b38f51;

            box-shadow:
                0 0 0 4px rgba(179, 143, 81, 0.09),
                0 0 12px rgba(179, 143, 81, 0.35);
        }


        /* =========================================================
   TITLE
========================================================= */

        .sys-hero h1 {
            margin: 0;

            color: #000;

            font-size: clamp(34px, 4vw, 48px);
            line-height: 1.1;

            font-weight: 700;

            letter-spacing: -1.2px;
        }


        /* =========================================================
   TAGLINE
========================================================= */

        .sys-hero .tagline {
            margin: 9px 0 0;
            color: #000;
            font-size: 1.2rem;
            line-height: 1.6;
            font-weight: 400;
        }


        /* =========================================================
   STAT
========================================================= */

        .sys-hero-stat {
            position: relative;
            padding: 8px 0 8px 38px;

            border-left: 1px solid rgba(255, 255, 255, 0.15);

            display: flex;
            flex-direction: column;

            justify-content: center;
        }


        /* =========================================================
   STAT LABEL
========================================================= */

        .sys-stat-label {
            margin-bottom: 5px;

            color: #000;

            font-size: 1rem;
            font-weight: 600;

            letter-spacing: 1.5px;

            text-transform: uppercase;
        }


        /* =========================================================
   STAT VALUE
========================================================= */

        .sys-hero-stat strong {
            color: #b38f51;

            font-size: clamp(32px, 4vw, 43px);
            line-height: 1;

            font-weight: 700;

            letter-spacing: -1px;

            text-shadow:
                0 0 25px rgba(179, 143, 81, 0.13);
        }


        /* =========================================================
   STAT DESCRIPTION
========================================================= */

        .sys-stat-description {
            margin-top: 7px;

            color: #000;

            font-size: 1.2rem;
            line-height: 1.4;
        }


        /* =========================================================
   BACKGROUND GLOWS
========================================================= */

        .sys-hero-glow {
            position: absolute;

            border-radius: 50%;

            pointer-events: none;

            filter: blur(70px);
        }

        .sys-hero-glow-left {
            width: 280px;
            height: 280px;

            left: -150px;
            top: -100px;

            background: rgba(179, 143, 81, 0.06);
        }

        .sys-hero-glow-right {
            width: 400px;
            height: 400px;

            right: -180px;
            top: -170px;

            background: rgba(75, 103, 165, 0.12);
        }


        /* =========================================================
   TABLET
========================================================= */

        @media (max-width: 991px) {

            .sys-hero {
                min-height: 225px;
            }

            .sys-hero-inner {
                min-height: 225px;

                gap: 35px;

                padding: 38px 20px;
            }

            .sys-hero-main {
                gap: 18px;
            }

            .sys-hero-icon {
                width: 62px;
                height: 62px;
            }

            .sys-hero-icon svg {
                width: 25px;
                height: 25px;
            }

            .sys-hero h1 {
                font-size: 36px;
            }

            .sys-hero .tagline {
                font-size: 14px;
            }

            .sys-hero-stat {
                min-width: 180px;

                padding-left: 28px;
            }
        }


        /* =========================================================
   MOBILE
========================================================= */

        @media (max-width: 767px) {

            .sys-hero {
                min-height: auto;
            }

            .sys-hero-inner {
                min-height: auto;

                display: flex;
                flex-direction: column;

                align-items: flex-start;

                gap: 28px;

                padding: 45px 15px;
            }

            .sys-hero-main {
                width: 100%;

                align-items: flex-start;

                gap: 16px;
            }

            .sys-hero-icon {
                width: 55px;
                height: 55px;

                border-radius: 14px;
            }

            .sys-hero-icon svg {
                width: 22px;
                height: 22px;
            }

            .sys-hero-abbr {
                margin-bottom: 5px;

                font-size: 10px;

                letter-spacing: 1.5px;
            }

            .sys-hero h1 {
                font-size: 29px;

                line-height: 1.13;

                letter-spacing: -0.6px;
            }

            .sys-hero .tagline {
                margin-top: 7px;

                font-size: 13px;

                line-height: 1.55;
            }


            /* STAT */

            .sys-hero-stat {
                width: 100%;
                min-width: 0;

                padding: 20px 0 0;

                border-left: 0;

                border-top: 1px solid rgba(255, 255, 255, 0.13);
            }

            .sys-stat-label {
                font-size: 8px;
            }

            .sys-hero-stat strong {
                font-size: 32px;
            }

            .sys-stat-description {
                font-size: 11px;
            }
        }


        /* =========================================================
   SMALL MOBILE
========================================================= */

        @media (max-width: 420px) {

            .sys-hero-inner {
                padding: 38px 15px;
            }

            .sys-hero-main {
                gap: 13px;
            }

            .sys-hero-icon {
                width: 50px;
                height: 50px;

                border-radius: 12px;
            }

            .sys-hero h1 {
                font-size: 25px;
            }

            .sys-hero .tagline {
                font-size: 12px;
            }
        }

        /* =========================================================
   TOOL CONTENT SECTION
========================================================= */

        .tool-content-section {
            padding: 75px 0 95px;
            background: #ffffff;
        }

        .tool-body-layout {
            display: grid;
            grid-template-columns: minmax(0, 1fr) 350px;
            gap: 52px;
            align-items: start;
        }


        /* =========================================================
   MAIN CONTENT
========================================================= */

        .tool-main-copy {
            min-width: 0;
        }


        /* =========================================================
   OVERVIEW
========================================================= */

        .tool-overview {
            max-width: 850px;
            margin-bottom: 46px;
        }

        .content-kicker {
            display: inline-flex;
            align-items: center;

            margin-bottom: 14px;

            color: #b38f51;

            font-size: 11px;
            font-weight: 700;

            letter-spacing: 1.4px;
            text-transform: uppercase;
        }

        .tool-lede {
            margin: 0;
            color: #24334d;
            font-size: 1.2rem;
            line-height: 1.75;
            font-weight: 400;
        }


        /* =========================================================
   SECTION HEADING
========================================================= */

        .tool-section-heading {
            margin-bottom: 23px;
        }

        .section-badge {
            width: fit-content;
            display: inline-flex;
            align-items: center;
            gap: 9px;
            padding: 8px 13px;
            margin-bottom: 15px;
            color: #17233b;
            font-size: 1rem;
            font-weight: 600;

            border: 1px solid #e7ddce;

            border-radius: 30px;

            background: #fff;
        }

        .badge-dot {
            width: 7px;
            height: 7px;

            border-radius: 50%;

            background: #b38f51;

            box-shadow:
                0 0 0 4px rgba(179, 143, 81, 0.09);
        }

        .tool-section-heading h2 {
            margin: 0;

            color: #05070b;

            font-size: clamp(30px, 3vw, 38px);
            line-height: 1.15;

            font-weight: 700;

            letter-spacing: -0.8px;
        }

        .tool-section-heading h2 span {
            color: #b38f51;
        }

        .tool-section-heading p {
            margin: 10px 0 0;
            color: #747b89;
            font-size: 1.2rem;
            line-height: 1.65;
        }


        /* =========================================================
   FEATURE LIST
========================================================= */

        .professional-feature-list {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .professional-feature-item {
            position: relative;

            min-height: 68px;

            display: flex;
            align-items: center;

            padding: 12px 18px 12px 12px;

            border: 1px solid #e9e1d5;

            border-radius: 12px;

            background: #fcfbf9;

            transition:
                transform 0.25s ease,
                border-color 0.25s ease,
                box-shadow 0.25s ease,
                background 0.25s ease;
        }

        .professional-feature-item:hover {
            transform: translateX(4px);

            background: #ffffff;

            border-color: rgba(179, 143, 81, 0.42);

            box-shadow:
                0 10px 25px rgba(20, 25, 35, 0.06);
        }


        /* =========================================================
   FEATURE NUMBER
========================================================= */

        .feature-number {
            width: 35px;
            flex-shrink: 0;
            color: #b38f51;
            font-size: 1.2rem;
            font-weight: 600;
            letter-spacing: 0.7px;
            text-align: center;
        }


        /* =========================================================
   CHECK
========================================================= */

        .feature-check {
            width: 34px;
            height: 34px;

            flex-shrink: 0;

            display: flex;
            align-items: center;
            justify-content: center;

            margin-right: 14px;

            color: #ffffff;

            border-radius: 50%;

            background: #090a0c;
        }

        .feature-check svg {
            width: 16px;
            height: 16px;
        }


        /* =========================================================
   FEATURE TEXT
========================================================= */

        .feature-text {
            flex: 1;
            color: #101318;
            font-size: 1.2rem;
            line-height: 1.45;
            font-weight: 500;
        }


        /* =========================================================
   FEATURE ARROW
========================================================= */

        .feature-arrow {
            width: 30px;
            height: 30px;

            display: flex;
            align-items: center;
            justify-content: center;

            margin-left: 15px;

            color: #b38f51;

            opacity: 0;

            transform: translateX(-5px);

            transition:
                opacity 0.25s ease,
                transform 0.25s ease;
        }

        .feature-arrow svg {
            width: 16px;
            height: 16px;
        }

        .professional-feature-item:hover .feature-arrow {
            opacity: 1;
            transform: translateX(0);
        }


        /* =========================================================
   INTEGRATIONS
========================================================= */

        .tool-integrations-section {
            margin-top: 55px;
            padding-top: 42px;

            border-top: 1px solid #eee8df;
        }

        .integration-heading {
            margin-bottom: 20px;
        }

        .integration-heading h3 {
            margin: 0;

            color: #101318;

            font-size: 22px;
            line-height: 1.25;

            font-weight: 700;

            letter-spacing: -0.3px;
        }


        /* =========================================================
   INTEGRATION CHIPS
========================================================= */

        .professional-integration-chips {
            display: flex;
            flex-wrap: wrap;

            gap: 10px;
        }

        .integration-chip {
            display: inline-flex;
            align-items: center;
            gap: 9px;
            min-height: 42px;
            padding: 7px 14px 7px 8px;
            color: #182033;
            font-size: 1rem;
            font-weight: 500;
            border: 1px solid #e7dfd3;
            border-radius: 30px;
            background: #faf8f4;
            transition:
                border-color 0.2s ease,
                background 0.2s ease,
                transform 0.2s ease;
        }

        .integration-chip:hover {
            transform: translateY(-2px);

            border-color: #b38f51;

            background: #ffffff;
        }

        .integration-icon {
            width: 27px;
            height: 27px;

            display: flex;
            align-items: center;
            justify-content: center;

            color: #b38f51;

            border-radius: 50%;

            background: #ffffff;

            border: 1px solid #eadfce;
        }

        .integration-icon svg {
            width: 13px;
            height: 13px;
        }


        /* =========================================================
   SIDEBAR
========================================================= */

        .professional-sidebar {
            position: sticky;
            top: 30px;

            display: flex;
            flex-direction: column;

            gap: 18px;
        }


        /* =========================================================
   TOOLS NAVIGATION
========================================================= */

        .tools-navigation-card {
            overflow: hidden;

            border: 1px solid #e6ded2;

            border-radius: 17px;

            background: #ffffff;

            box-shadow:
                0 10px 35px rgba(25, 30, 40, 0.045);
        }

        .tools-card-header {
            padding: 24px 20px 18px;

            border-bottom: 1px solid #eee9e1;
        }

        .tools-label {
            display: block;
            margin-bottom: 5px;
            color: #b38f51;
            font-size: 1rem;
            font-weight: 600;
            letter-spacing: 1.4px;
            text-transform: uppercase;
        }

        .tools-card-header h3 {
            margin: 0;

            color: #101318;

            font-size: 22px;
            font-weight: 700;
        }

        .tools-card-header p {
            margin: 7px 0 0;
            color: #858b97;
            font-size: 1rem;
            line-height: 1.55;
        }


        /* =========================================================
   SIDEBAR NAV
========================================================= */

        .professional-sidebar-nav {
            list-style: none;

            padding: 10px;

            margin: 0;
        }

        .professional-sidebar-nav li {
            margin: 0;
        }

        .professional-sidebar-nav a {
            min-height: 53px;

            display: flex;
            align-items: center;
            justify-content: space-between;

            gap: 10px;

            padding: 10px 11px;

            color: #737b8c;

            text-decoration: none;

            border-radius: 9px;

            transition:
                background 0.2s ease,
                color 0.2s ease;
        }

        .professional-sidebar-nav a:hover {
            color: #11151c;

            background: #faf8f4;
        }

        .professional-sidebar-nav a.active {
            color: #111111;

            background: #f5f1e9;

            box-shadow:
                inset 3px 0 0 #b38f51;
        }

        .sidebar-tool-name {
            display: flex;
            flex-direction: column;

            gap: 2px;

            min-width: 0;
        }

        .sidebar-tool-name strong {
            color: inherit;
            font-size: 1.2rem;
            font-weight: 700;
        }

        .sidebar-tool-name span {
            color: inherit;
            font-size: 0.9rem;
            line-height: 1.35;
        }

        .sidebar-arrow {
            width: 25px;
            height: 25px;

            flex-shrink: 0;

            display: flex;
            align-items: center;
            justify-content: center;

            opacity: 0.45;

            transition:
                opacity 0.2s ease,
                transform 0.2s ease;
        }

        .sidebar-arrow svg {
            width: 13px;
            height: 13px;
        }

        .professional-sidebar-nav a:hover .sidebar-arrow,
        .professional-sidebar-nav a.active .sidebar-arrow {
            opacity: 1;
            transform: translateX(2px);
        }


        /* =========================================================
   SIDEBAR CTA
========================================================= */

        .professional-sidebar-cta {
            position: relative;

            overflow: hidden;

            padding: 26px 21px 21px;

            border-radius: 17px;

            background:
                radial-gradient(circle at 100% 0%,
                    rgba(179, 143, 81, 0.16),
                    transparent 40%),
                linear-gradient(145deg,
                    #030609 0%,
                    #090e1b 55%,
                    #101e3d 100%);

            border: 1px solid rgba(255, 255, 255, 0.08);

            box-shadow:
                0 15px 35px rgba(0, 0, 0, 0.13);
        }

        .sidebar-cta-glow {
            position: absolute;

            width: 130px;
            height: 130px;

            right: -70px;
            top: -70px;

            border-radius: 50%;

            background: rgba(179, 143, 81, 0.14);

            filter: blur(30px);

            pointer-events: none;
        }

        .cta-content {
            position: relative;
            z-index: 2;
        }

        .cta-mini-label {
            display: block;
            margin-bottom: 10px;
            color: #b38f51;
            font-size: 1rem;
            font-weight: 700;
            letter-spacing: 1.4px;
        }

        .professional-sidebar-cta h3 {
            margin: 0;

            color: #ffffff;

            font-size: 22px;
            line-height: 1.2;

            font-weight: 700;

            letter-spacing: -0.3px;
        }

        .professional-sidebar-cta p {
            margin: 11px 0 20px;
            color: rgba(255, 255, 255, 0.61);
            font-size: 1rem;
            line-height: 1.65;
        }


        /* =========================================================
   DISCOVERY BUTTON
========================================================= */

        .sidebar-discovery-btn {
            min-height: 48px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 10px;
            padding: 0 15px;
            color: #ffffff;
            text-decoration: none;
            font-size: 1rem;
            font-weight: 600;
            border-radius: 9px;
            background: #b38f51;
            box-shadow: 0 8px 20px rgba(179, 143, 81, 0.16);
            transition:
                background 0.2s ease,
                transform 0.2s ease,
                box-shadow 0.2s ease;
        }

        .sidebar-discovery-btn:hover {
            color: #ffffff;

            background: #c09a5a;

            transform: translateY(-2px);

            box-shadow:
                0 12px 25px rgba(179, 143, 81, 0.24);
        }

        .sidebar-discovery-btn svg {
            width: 16px;
            height: 16px;

            transition: transform 0.2s ease;
        }

        .sidebar-discovery-btn:hover svg {
            transform: translateX(3px);
        }


        /* =========================================================
   TABLET
========================================================= */

        @media (max-width: 991px) {

            .tool-content-section {
                padding: 60px 0 75px;
            }

            .tool-body-layout {
                grid-template-columns: minmax(0, 1fr) 260px;

                gap: 30px;
            }

            .tool-lede {
                font-size: 15px;
            }

            .tool-section-heading h2 {
                font-size: 31px;
            }

            .professional-feature-item {
                min-height: 64px;
            }

            .feature-number {
                display: none;
            }
        }


        /* =========================================================
   MOBILE
========================================================= */

        @media (max-width: 767px) {

            .tool-content-section {
                padding: 50px 0 65px;
            }

            .tool-body-layout {
                display: flex;
                flex-direction: column;

                gap: 45px;
            }

            .tool-main-copy {
                width: 100%;
            }

            .tool-overview {
                margin-bottom: 38px;
            }

            .tool-lede {
                font-size: 14px;
                line-height: 1.7;
            }

            .tool-section-heading h2 {
                font-size: 28px;
            }

            .tool-section-heading p {
                font-size: 12px;
            }

            .professional-feature-list {
                gap: 8px;
            }

            .professional-feature-item {
                min-height: 62px;

                padding: 10px 12px;
            }

            .feature-number {
                display: none;
            }

            .feature-check {
                width: 31px;
                height: 31px;

                margin-right: 11px;
            }

            .feature-check svg {
                width: 14px;
                height: 14px;
            }

            .feature-text {
                font-size: 12.5px;
            }

            .feature-arrow {
                display: none;
            }

            .tool-integrations-section {
                margin-top: 45px;
                padding-top: 35px;
            }

            .integration-heading h3 {
                font-size: 20px;
            }

            .professional-integration-chips {
                gap: 8px;
            }

            .integration-chip {
                min-height: 39px;

                padding-right: 12px;

                font-size: 11px;
            }

            .integration-icon {
                width: 25px;
                height: 25px;
            }

            .professional-sidebar {
                position: static;

                width: 100%;
            }

            .tools-card-header {
                padding: 21px 18px 16px;
            }

            .professional-sidebar-nav {
                padding: 8px;
            }

            .professional-sidebar-cta {
                padding: 25px 20px 20px;
            }
        }


        /* =========================================================
   SMALL MOBILE
========================================================= */

        @media (max-width: 420px) {

            .tool-content-section {
                padding-top: 40px;
            }

            .tool-section-heading h2 {
                font-size: 25px;
            }

            .section-badge {
                font-size: 11px;
            }

            .professional-feature-item {
                padding: 9px 10px;
            }

            .feature-check {
                width: 29px;
                height: 29px;

                margin-right: 10px;
            }

            .feature-text {
                font-size: 12px;
            }

            .professional-sidebar-cta h3 {
                font-size: 20px;
            }
        }

        /* =========================================================
   BENEFITS SECTION
========================================================= */

        .benefit-section {
            position: relative;

            padding: 90px 0 100px;

            background: #f7f4ee;

            border-top: 1px solid #eee7dc;
            border-bottom: 1px solid #eee7dc;
        }


        /* =========================================================
   SECTION HEADER
========================================================= */

        .benefit-section-head {
            margin: 0 auto 38px;
        }

        .benefit-badge {
            width: fit-content;
            display: inline-flex;
            align-items: center;
            gap: 9px;
            margin-bottom: 16px;
            color: #24334d;
            font-size: 1rem;
            font-weight: 500;
            background: rgba(255, 255, 255, 0.72);
            border: 1px solid #e2d9ca;
            border-radius: 30px;
        }

        .benefit-badge-dot {
            width: 7px;
            height: 7px;
            border-radius: 50%;
            background: #b38f51;
            box-shadow:
                0 0 0 4px rgba(179, 143, 81, 0.10);
        }


        /* =========================================================
   HEADING
========================================================= */

        .benefit-section-head h2 {
            margin: 0;
            color: #05070b;
            font-size: clamp(32px, 3.5vw, 42px);
            line-height: 1.14;
            font-weight: 700;
            letter-spacing: -1px;
        }

        .benefit-section-head h2 span {
            color: #b38f51;
        }

        .benefit-section-head>p {
            margin: 12px 0 0;
            color: #707889;
            font-size: 1.2rem;
            line-height: 1.7;
        }


        /* =========================================================
   BENEFIT GRID
========================================================= */

        .professional-benefit-grid {
            display: grid;

            grid-template-columns: repeat(3, minmax(0, 1fr));

            gap: 20px;
        }


        /* =========================================================
   BENEFIT CARD
========================================================= */

        .professional-benefit-card {
            position: relative;

            min-height: 235px;

            display: flex;
            flex-direction: column;

            padding: 24px 24px 22px;

            overflow: hidden;

            background: #ffffff;

            border: 1px solid #e4dccf;

            border-radius: 16px;

            box-shadow:
                0 8px 25px rgba(30, 34, 40, 0.025);

            transition:
                transform 0.3s ease,
                border-color 0.3s ease,
                box-shadow 0.3s ease;
        }

        .professional-benefit-card:hover {
            transform: translateY(-5px);

            border-color: rgba(179, 143, 81, 0.45);

            box-shadow:
                0 18px 40px rgba(30, 34, 40, 0.08);
        }


        /* =========================================================
   CARD TOP
========================================================= */

        .benefit-card-top {
            display: flex;

            align-items: center;
            justify-content: space-between;

            margin-bottom: 34px;
        }


        /* =========================================================
   NUMBER
========================================================= */

        .benefit-number {
            width: 60px;
            height: 60px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            color: #a77f3e;
            font-size: 1rem;
            font-weight: 700;
            background: #f7f3eb;
            border: 1px solid #eee5d7;
            border-radius: 8px;
        }


        /* =========================================================
   ARROW
========================================================= */

        .benefit-arrow {
            width: 40px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #b38f51;
            border: 1px solid #e9dfcf;
            border-radius: 50%;
            opacity: 0;
            transform: translateX(-5px);
            transition:
                opacity 0.25s ease,
                transform 0.25s ease,
                background 0.25s ease;
        }

        .benefit-arrow svg {
            width: 15px;
            height: 15px;
        }

        .professional-benefit-card:hover .benefit-arrow {
            opacity: 1;

            transform: translateX(0);

            background: #faf7f1;
        }


        /* =========================================================
   CONTENT
========================================================= */

        .benefit-card-content {
            flex: 1;
        }

        .benefit-card-content h3 {
            margin: 0 0 9px;
            color: #080a0e;
            font-size: 1.2rem;
            line-height: 1.3;
            font-weight: 500;
            letter-spacing: -0.2px;
        }

        .benefit-card-content p {
            margin: 0;
            color: #697386;
            font-size: 1.2rem;
            line-height: 1.65;
        }


        /* =========================================================
   BOTTOM ACCENT
========================================================= */

        .benefit-card-line {
            width: 0;
            height: 2px;

            margin-top: 22px;

            border-radius: 10px;

            background: #b38f51;

            transition: width 0.35s ease;
        }

        .professional-benefit-card:hover .benefit-card-line {
            width: 42px;
        }


        /* =========================================================
   TABLET
========================================================= */

        @media (max-width: 991px) {

            .benefit-section {
                padding: 75px 0 80px;
            }

            .professional-benefit-grid {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }

            .professional-benefit-card {
                min-height: 220px;
            }
        }


        /* =========================================================
   MOBILE
========================================================= */

        @media (max-width: 767px) {

            .benefit-section {
                padding: 60px 0 70px;
            }

            .benefit-section-head {
                margin-bottom: 28px;
            }

            .benefit-section-head h2 {
                font-size: 29px;
                line-height: 1.18;

                letter-spacing: -0.6px;
            }

            .benefit-section-head>p {
                font-size: 13px;
            }

            .professional-benefit-grid {
                grid-template-columns: 1fr;

                gap: 12px;
            }

            .professional-benefit-card {
                min-height: 0;

                padding: 21px 20px;
            }

            .benefit-card-top {
                margin-bottom: 25px;
            }

            .benefit-card-content h3 {
                font-size: 16px;
            }

            .benefit-card-content p {
                font-size: 12.5px;
            }

            /* Keep mobile clean */
            .benefit-arrow {
                opacity: 1;

                transform: none;
            }
        }


        /* =========================================================
   SMALL MOBILE
========================================================= */

        @media (max-width: 420px) {

            .benefit-section {
                padding: 50px 0 60px;
            }

            .benefit-section-head h2 {
                font-size: 25px;
            }

            .benefit-badge {
                font-size: 11px;
            }

            .professional-benefit-card {
                padding: 19px 18px;
            }

            .benefit-card-top {
                margin-bottom: 22px;
            }
        }

        /* =========================================================
   IMPLEMENTATION PROCESS
========================================================= */

        .implementation-section {
            position: relative;
            padding: 95px 0 105px;
            background: #ffffff;
        }


        /* =========================================================
   HEADER
========================================================= */

        .implementation-head {
            margin-bottom: 48px;
        }

        .implementation-head .badge-pill {
            margin-bottom: 18px;
        }

        .implementation-head h2 {
            margin: 0;
            color: #05070b;
            font-size: clamp(32px, 3.2vw, 42px);
            line-height: 1.15;
            font-weight: 700;
            letter-spacing: -1px;
        }

        .implementation-head p {
            margin: 13px 0 0;
            color: #707889;
            font-size: 1.2rem;
            line-height: 1.7;
        }


        /* =========================================================
   TIMELINE
========================================================= */

        .implementation-timeline {
            position: relative;
            padding-bottom: 5px;
        }


        /* =========================================================
   VERTICAL LINE
========================================================= */

        .implementation-line {
            position: absolute;

            top: 27px;
            bottom: 28px;

            left: 21px;

            width: 1px;

            background:
                linear-gradient(to bottom,
                    #b38f51 0%,
                    #e8dfd0 18%,
                    #e8dfd0 82%,
                    #b38f51 100%);
        }


        /* =========================================================
   STEP
========================================================= */

        .implementation-step {
            position: relative;

            display: grid;

            grid-template-columns: 44px minmax(0, 1fr);

            column-gap: 20px;

            align-items: start;

            margin-bottom: 28px;
        }

        .implementation-step:last-child {
            margin-bottom: 0;
        }


        /* =========================================================
   NUMBER CIRCLE
========================================================= */

        .implementation-number {
            position: relative;

            z-index: 2;

            width: 44px;
            height: 44px;

            display: flex;
            align-items: center;
            justify-content: center;

            background: #ffffff;

            border: 1px solid #b38f51;

            border-radius: 50%;
        }

        .implementation-number span {
            width: 32px;
            height: 32px;

            display: flex;
            align-items: center;
            justify-content: center;

            color: #a17b3e;

            background: #f8f4ec;

            border-radius: 50%;

            font-size: 1rem;
            font-weight: 700;
        }


        /* =========================================================
   CONTENT CARD
========================================================= */

        .implementation-card {
            position: relative;

            min-height: 112px;

            display: flex;
            align-items: center;
            justify-content: space-between;

            padding: 23px 24px 23px 25px;

            background: #ffffff;

            border: 1px solid #e7dfd2;

            border-radius: 14px;

            box-shadow:
                0 5px 18px rgba(20, 24, 30, 0.025);

            transition:
                transform 0.3s ease,
                border-color 0.3s ease,
                box-shadow 0.3s ease;
        }

        .implementation-card::before {
            content: "";

            position: absolute;

            left: -1px;
            top: 18px;
            bottom: 18px;

            width: 2px;

            border-radius: 5px;

            background: #b38f51;

            transform: scaleY(0);

            transform-origin: center;

            transition: transform 0.3s ease;
        }

        .implementation-step:hover .implementation-card {
            transform: translateX(5px);

            border-color: rgba(179, 143, 81, 0.42);

            box-shadow:
                0 14px 35px rgba(20, 24, 30, 0.07);
        }

        .implementation-step:hover .implementation-card::before {
            transform: scaleY(1);
        }


        /* =========================================================
   STEP LABEL
========================================================= */

        .implementation-step-label {
            display: block;
            margin-bottom: 7px;
            color: #b38f51;
            font-size: 1rem;
            font-weight: 700;
            letter-spacing: 1.2px;
        }


        /* =========================================================
   TITLE
========================================================= */

        .implementation-card h3 {
            margin: 0 0 6px;
            color: #080a0e;
            font-size: 1.2rem;
            line-height: 1.35;

            font-weight: 600;

            letter-spacing: -0.15px;
        }


        /* =========================================================
   DESCRIPTION
========================================================= */

        .implementation-card p {
            margin: 0;
            color: #6d7687;
            font-size: 1.2rem;
            line-height: 1.6;
        }


        /* =========================================================
   ARROW
========================================================= */

        .implementation-arrow {
            flex: 0 0 auto;

            width: 36px;
            height: 36px;

            margin-left: 25px;

            display: flex;
            align-items: center;
            justify-content: center;

            color: #b38f51;

            border: 1px solid #e9e1d5;

            border-radius: 50%;

            opacity: 0;

            transform: translateX(-7px);

            transition:
                opacity 0.25s ease,
                transform 0.25s ease,
                background 0.25s ease;
        }

        .implementation-arrow svg {
            width: 15px;
            height: 15px;
        }

        .implementation-step:hover .implementation-arrow {
            opacity: 1;

            transform: translateX(0);

            background: #faf7f1;
        }


        /* =========================================================
   LAST STEP
========================================================= */

        .implementation-step:last-child .implementation-number {
            background: #fbf8f2;
        }


        /* =========================================================
   TABLET
========================================================= */

        @media (max-width: 991px) {

            .implementation-section {
                padding: 75px 0 85px;
            }

            .implementation-timeline {
                width: 100%;
            }
        }


        /* =========================================================
   MOBILE
========================================================= */

        @media (max-width: 767px) {

            .implementation-section {
                padding: 60px 0 70px;
            }

            .implementation-head {
                margin-bottom: 35px;
            }

            .implementation-head h2 {
                font-size: 30px;
                letter-spacing: -0.7px;
            }

            .implementation-head p {
                font-size: 13px;
            }

            .implementation-step {
                grid-template-columns: 38px minmax(0, 1fr);

                column-gap: 14px;

                margin-bottom: 18px;
            }

            .implementation-line {
                top: 23px;

                left: 18px;

                bottom: 25px;
            }

            .implementation-number {
                width: 38px;
                height: 38px;
            }

            .implementation-number span {
                width: 28px;
                height: 28px;

                font-size: 9px;
            }

            .implementation-card {
                min-height: auto;

                padding: 19px 17px;

                border-radius: 12px;
            }

            .implementation-card::before {
                top: 14px;
                bottom: 14px;
            }

            .implementation-card h3 {
                font-size: 15px;
            }

            .implementation-card p {
                font-size: 12px;

                line-height: 1.6;
            }

            .implementation-arrow {
                display: none;
            }

            .implementation-step-label {
                font-size: 8px;

                margin-bottom: 6px;
            }
        }


        /* =========================================================
   SMALL MOBILE
========================================================= */

        @media (max-width: 420px) {

            .implementation-section {
                padding: 50px 0 60px;
            }

            .implementation-head h2 {
                font-size: 26px;
            }

            .implementation-step {
                grid-template-columns: 34px minmax(0, 1fr);

                column-gap: 12px;
            }

            .implementation-line {
                left: 16px;
            }

            .implementation-number {
                width: 34px;
                height: 34px;
            }

            .implementation-number span {
                width: 25px;
                height: 25px;
            }

            .implementation-card {
                padding: 17px 15px;
            }
        }

        /* TESTIMONIAL */
        .testimonial-card {
            background: #fbfaf7;
            border: 1px solid #e8e3d6;
            border-radius: 18px;
            padding: 36px;
            display: flex;
            gap: 22px;
            align-items: center;
        }

        .testimonial-card .quote-mark {
            font-family: Georgia, serif;
            font-size: 2.8rem;
            color: #b38f51;
            line-height: 1;
            flex: none;
        }

        .testimonial-card p.quote {
            font-size: 1.02rem;
            color: #000;
            font-weight: 500;
            line-height: 1.65;
            margin-bottom: 12px !important;
        }

        .testimonial-card .who {
            font-size: .84rem;
            color: #6c7280;
        }

        .testimonial-card .who strong {
            color: #000;
        }

        /* FAQ */
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
            font-size: .96rem;
            font-weight: 600;
            color: #000;
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
            font-size: .92rem;
            line-height: 1.7;
        }

        /* =========================================================
   RELATED TOOLS
========================================================= */

        .related-tools {
            position: relative;

            padding: 90px 0 100px;

            background: #f8f6f1;
        }


        /* =========================================================
   SECTION HEADER
========================================================= */

        .related-head {
            margin-bottom: 38px;
        }

        .related-head .badge-pill {
            margin-bottom: 17px;
        }

        .related-heading-row {
            display: flex;
            align-items: flex-end;
            justify-content: space-between;
        }

        .related-head h2 {
            margin: 0;

            max-width: 850px;

            color: #07090d;

            font-size: clamp(30px, 3vw, 40px);
            line-height: 1.18;

            font-weight: 700;

            letter-spacing: -0.9px;
        }

        .related-head p {
            max-width: 610px;

            margin: 12px 0 0;

            color: #737b8b;

            font-size: 13px;
            line-height: 1.65;
        }


        /* =========================================================
   GRID
========================================================= */

        .related-grid {
            display: grid;

            grid-template-columns: repeat(4, minmax(0, 1fr));

            gap: 18px;
        }


        /* =========================================================
   CARD
========================================================= */

        .related-card {
            position: relative;

            min-height: 175px;

            display: flex;
            flex-direction: column;
            justify-content: space-between;

            padding: 20px;

            overflow: hidden;

            color: inherit;
            text-decoration: none;

            background: #ffffff;

            border: 1px solid #e6dfd4;

            border-radius: 14px;

            box-shadow:
                0 5px 20px rgba(20, 24, 30, 0.025);

            transition:
                transform 0.3s ease,
                border-color 0.3s ease,
                box-shadow 0.3s ease,
                background 0.3s ease;
        }


        /* Gold bottom accent */

        .related-card::after {
            content: "";

            position: absolute;

            left: 20px;
            right: 20px;
            bottom: 0;

            height: 2px;

            background: #b38f51;

            border-radius: 4px 4px 0 0;

            transform: scaleX(0);

            transform-origin: left;

            transition: transform 0.3s ease;
        }


        /* =========================================================
   HOVER
========================================================= */

        .related-card:hover {
            color: inherit;
            text-decoration: none;

            transform: translateY(-5px);

            border-color: rgba(179, 143, 81, 0.65);

            box-shadow:
                0 16px 35px rgba(20, 24, 30, 0.08);
        }

        .related-card:hover::after {
            transform: scaleX(1);
        }


        /* =========================================================
   CARD TOP
========================================================= */

        .related-card-top {
            display: flex;

            align-items: flex-start;
            justify-content: space-between;
        }


        /* =========================================================
   ICON
========================================================= */

        .r-icon {
            width: 40px;
            height: 40px;

            display: flex;
            align-items: center;
            justify-content: center;

            color: #a57f43;

            background: #f5ecdc;

            border: 1px solid #eee2cd;

            border-radius: 10px;

            transition:
                background 0.3s ease,
                color 0.3s ease,
                transform 0.3s ease;
        }

        .r-icon svg {
            width: 25px;
            height: 25px;
        }

        .related-card:hover .r-icon {
            color: #ffffff;

            background: #b38f51;

            border-color: #b38f51;

            transform: translateY(-2px);
        }


        /* =========================================================
   ARROW
========================================================= */

        .related-arrow {
            width: 32px;
            height: 32px;

            display: flex;
            align-items: center;
            justify-content: center;

            color: #9299a5;

            border: 1px solid #e8e2d8;

            border-radius: 50%;

            opacity: 0;

            transform: translate(-4px, 4px);

            transition:
                opacity 0.25s ease,
                transform 0.25s ease,
                color 0.25s ease,
                border-color 0.25s ease,
                background 0.25s ease;
        }

        .related-arrow svg {
            width: 14px;
            height: 14px;
        }

        .related-card:hover .related-arrow {
            opacity: 1;

            transform: translate(0, 0);

            color: #b38f51;

            border-color: rgba(179, 143, 81, 0.4);

            background: #fbf8f2;
        }


        /* =========================================================
   CONTENT
========================================================= */

        .related-card-content {
            margin-top: 25px;
        }


        /* Short abbreviation */

        .r-abbr {
            display: block;

            margin-bottom: 5px;

            color: #090b0f;

            font-size: 15px;
            line-height: 1.2;

            font-weight: 700;

            letter-spacing: -0.1px;
        }


        /* Full title */

        .related-card h3 {
            margin: 0;
            color: #737b8b;
            font-size: 0.9rem;
            line-height: 1.55;
            font-weight: 400;
        }


        /* =========================================================
   ACTIVE / FOCUS
========================================================= */

        .related-card:focus-visible {
            outline: 2px solid #b38f51;
            outline-offset: 3px;
        }


        /* =========================================================
   LARGE TABLET
========================================================= */

        @media (max-width: 1100px) {

            .related-grid {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }

            .related-card {
                min-height: 160px;
            }
        }


        /* =========================================================
   TABLET
========================================================= */

        @media (max-width: 767px) {

            .related-tools {
                padding: 65px 0 75px;
            }

            .related-head {
                margin-bottom: 30px;
            }

            .related-head h2 {
                font-size: 29px;

                letter-spacing: -0.6px;
            }

            .related-head p {
                font-size: 12px;
            }

            .related-grid {
                grid-template-columns: repeat(2, minmax(0, 1fr));

                gap: 13px;
            }

            .related-card {
                min-height: 150px;

                padding: 17px;

                border-radius: 12px;
            }

            .r-icon {
                width: 36px;
                height: 36px;
            }

            .r-icon svg {
                width: 15px;
                height: 15px;
            }

            .related-arrow {
                width: 29px;
                height: 29px;

                opacity: 1;

                transform: none;
            }

            .related-card-content {
                margin-top: 20px;
            }

            .r-abbr {
                font-size: 14px;
            }

            .related-card h3 {
                font-size: 11px;
            }
        }


        /* =========================================================
   MOBILE
========================================================= */

        @media (max-width: 480px) {

            .related-tools {
                padding: 55px 0 65px;
            }

            .related-head h2 {
                font-size: 25px;
                line-height: 1.2;
            }

            .related-grid {
                grid-template-columns: 1fr;

                gap: 12px;
            }

            .related-card {
                min-height: 125px;

                padding: 17px;
            }

            .related-card-top {
                align-items: center;
            }

            .related-card-content {
                margin-top: 18px;
            }

            .related-card::after {
                left: 17px;
                right: 17px;
            }
        }

        /* CTA */
        .careers {
            background: linear-gradient(135deg, #000, #152a58);
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
            font-size: .96rem;
        }

        .careers-actions {
            position: relative;
            z-index: 2;
            display: flex;
            gap: 14px;
            flex-wrap: wrap;
        }

        @media (max-width: 980px) {
            .body-layout {
                grid-template-columns: 1fr;
            }

            .sys-sidebar {
                position: static;
            }

            .benefit-grid {
                grid-template-columns: 1fr 1fr;
            }

            .related-grid {
                grid-template-columns: 1fr 1fr;
            }
        }

        @media (max-width: 600px) {
            .benefit-grid {
                grid-template-columns: 1fr;
            }

            .related-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>

    <!-- BREADCRUMB -->
    <div class="breadcrumb-bar">
        <div class="container">
            <ul>
                <li><a href="index.php">Home</a></li>
                <li class="sep">/</li> 
                <li><a href="sales-marketing.php">Sales &amp; Marketing</a></li>
                <li class="sep">/</li>
                <li class="current"><?php echo htmlspecialchars($tool['abbr']); ?></li>
            </ul>
        </div>
    </div>
    <!-- =========================================================
     SYSTEM HERO
    ========================================================= -->
    <section class="sys-hero">

        <div class="sys-hero-glow sys-hero-glow-left"></div>
        <div class="sys-hero-glow sys-hero-glow-right"></div>

        <div class="container">

            <div class="sys-hero-inner">

                <!-- LEFT / MAIN -->
                <div class="sys-hero-main">

                    <div class="sys-hero-icon">
                        <?php echo sm_icon($smIcons, $tool['icon']); ?>
                    </div>

                    <div class="sys-hero-text">

                        <div class="sys-hero-abbr">
                            <span></span>
                            <?php echo htmlspecialchars($tool['abbr']); ?>
                        </div>

                        <h1>
                            <?php echo htmlspecialchars($tool['title']); ?>
                        </h1>

                        <p class="tagline">
                            <?php echo htmlspecialchars($tool['tagline']); ?>
                        </p>

                    </div>

                </div>


                <!-- RIGHT / STAT -->
                <div class="sys-hero-stat">

                    <span class="sys-stat-label">
                        KEY PERFORMANCE
                    </span>

                    <strong>
                        <?php echo htmlspecialchars($tool['cover_stat']['value']); ?>
                    </strong>

                    <span class="sys-stat-description">
                        <?php echo htmlspecialchars($tool['cover_stat']['label']); ?>
                    </span>

                </div>

            </div>

        </div>

    </section>

    <!-- =========================================================
     OVERVIEW + FEATURES + SIDEBAR
========================================================= -->
    <section class="tool-content-section">

        <div class="container">

            <div class="tool-body-layout">

                <!-- =========================
                 MAIN CONTENT
            ========================== -->
                <main class="tool-main-copy">

                    <!-- Overview -->
                    <div class="tool-overview">
                        <span class="content-kicker">
                            <?php echo htmlspecialchars($tool['abbr']); ?> Overview
                        </span>

                        <p class="tool-lede">
                            <?php echo htmlspecialchars($tool['overview']); ?>
                        </p>
                    </div>


                    <!-- Features -->
                    <div class="tool-features-section">

                        <div class="tool-section-heading">

                            <div class="section-badge">
                                <span class="badge-dot"></span>
                                What's Included
                            </div>

                            <h2>
                                What you get with
                                <span><?php echo htmlspecialchars($tool['abbr']); ?></span>
                            </h2>

                            <p>
                                Everything your team needs to manage operations
                                efficiently from one connected system.
                            </p>

                        </div>


                        <div class="professional-feature-list">

                            <?php foreach ($tool['features'] as $index => $f): ?>

                                <div class="professional-feature-item">

                                    <div class="feature-number">
                                        <?php echo str_pad($index + 1, 2, '0', STR_PAD_LEFT); ?>
                                    </div>

                                    <div class="feature-check">
                                        <svg viewBox="0 0 24 24"
                                            fill="none"
                                            stroke="currentColor"
                                            stroke-width="2.5">
                                            <path d="M5 13l4 4L19 7" />
                                        </svg>
                                    </div>

                                    <div class="feature-text">
                                        <?php echo htmlspecialchars($f); ?>
                                    </div>

                                    <div class="feature-arrow">
                                        <svg viewBox="0 0 24 24"
                                            fill="none"
                                            stroke="currentColor"
                                            stroke-width="1.8">
                                            <path d="M5 12h14" />
                                            <path d="m13 6 6 6-6 6" />
                                        </svg>
                                    </div>

                                </div>

                            <?php endforeach; ?>

                        </div>

                    </div>


                    <!-- Integrations -->
                    <div class="tool-integrations-section">

                        <div class="tool-section-heading integration-heading">

                            <div class="section-badge">
                                <span class="badge-dot"></span>
                                Integrates With
                            </div>

                            <h3>
                                Connect your existing tools
                            </h3>

                        </div>


                        <div class="professional-integration-chips">

                            <?php foreach ($tool['integrations'] as $intg): ?>

                                <span class="integration-chip">
                                    <span class="integration-icon">
                                        <svg viewBox="0 0 24 24"
                                            fill="none"
                                            stroke="currentColor"
                                            stroke-width="1.8">
                                            <path d="M12 3v18" />
                                            <path d="M3 12h18" />
                                            <circle cx="12" cy="12" r="8" />
                                        </svg>
                                    </span>

                                    <?php echo htmlspecialchars($intg); ?>
                                </span>

                            <?php endforeach; ?>

                        </div>

                    </div>

                </main>


                <!-- =========================
                 SIDEBAR
            ========================== -->
                <aside class="professional-sidebar">

                    <!-- All Tools -->
                    <div class="tools-navigation-card">

                        <div class="tools-card-header">

                            <span class="tools-label">
                                Explore
                            </span>

                            <h3>All Tools</h3>

                            <p>
                                Explore the systems that connect
                                your business operations.
                            </p>

                        </div>


                        <ul class="professional-sidebar-nav">

                            <?php foreach ($tools as $t): ?>

                                <li>
                                    <a
                                        href="sales-marketing-detail.php?slug=<?php echo urlencode($t['slug']); ?>"
                                        class="<?php echo $t['slug'] === $tool['slug'] ? 'active' : ''; ?>">

                                        <span class="sidebar-tool-name">
                                            <strong>
                                                <?php echo htmlspecialchars($t['abbr']); ?>
                                            </strong>

                                            <span>
                                                <?php echo htmlspecialchars($t['title']); ?>
                                            </span>
                                        </span>

                                        <span class="sidebar-arrow">
                                            <svg viewBox="0 0 24 24"
                                                fill="none"
                                                stroke="currentColor"
                                                stroke-width="1.8">
                                                <path d="M5 12h14" />
                                                <path d="m13 6 6 6-6 6" />
                                            </svg>
                                        </span>

                                    </a>
                                </li>

                            <?php endforeach; ?>

                        </ul>

                    </div>


                    <!-- CTA -->
                    <div class="professional-sidebar-cta">

                        <div class="sidebar-cta-glow"></div>

                        <div class="cta-content">

                            <span class="cta-mini-label">
                                GET STARTED
                            </span>

                            <h3>
                                Ready to take
                                the next step?
                            </h3>

                            <p>
                                Tell us about your business and we'll
                                follow up with the right next steps
                                within one business day.
                            </p>

                            <a href="#" class="sidebar-discovery-btn">
                                <span>Book A Discovery Call</span>

                                <svg viewBox="0 0 24 24"
                                    fill="none"
                                    stroke="currentColor"
                                    stroke-width="2">
                                    <path d="M5 12h14" />
                                    <path d="m13 6 6 6-6 6" />
                                </svg>
                            </a>

                        </div>

                    </div>

                </aside>

            </div>

        </div>

    </section>

    <!-- BENEFITS -->
    <!-- =========================================================
     BENEFITS
========================================================= -->
    <section class="benefit-section">

        <div class="container">

            <div class="benefit-section-head">

                <div class="benefit-badge">
                    <span class="benefit-badge-dot"></span>
                    Why It Matters
                </div>

                <h2>
                    What changes once
                    <span><?php echo htmlspecialchars($tool['abbr']); ?></span>
                    is running
                </h2>

                <p>
                    See the practical difference a connected system can make
                    across your day-to-day operations.
                </p>

            </div>


            <div class="professional-benefit-grid">

                <?php foreach ($tool['benefits'] as $i => $b): ?>

                    <article class="professional-benefit-card">

                        <div class="benefit-card-top">

                            <span class="benefit-number">
                                <?php echo str_pad($i + 1, 2, '0', STR_PAD_LEFT); ?>
                            </span>

                            <span class="benefit-arrow">
                                <svg viewBox="0 0 24 24"
                                    fill="none"
                                    stroke="currentColor"
                                    stroke-width="1.8">
                                    <path d="M5 12h14" />
                                    <path d="m13 6 6 6-6 6" />
                                </svg>
                            </span>

                        </div>

                        <div class="benefit-card-content">

                            <h3>
                                <?php echo htmlspecialchars($b['title']); ?>
                            </h3>

                            <p>
                                <?php echo htmlspecialchars($b['desc']); ?>
                            </p>

                        </div>

                        <div class="benefit-card-line"></div>

                    </article>

                <?php endforeach; ?>

            </div>

        </div>

    </section>

    <!-- =========================================================
     IMPLEMENTATION PROCESS
========================================================= -->
    <section class="implementation-section">
        <div class="container">

            <div class="implementation-head">

                <div class="badge-pill">
                    <span class="dot"></span>
                    How We Roll It Out
                </div>

                <h2>Implementation process</h2>

                <p>
                    A structured rollout designed to minimize disruption,
                    prepare your team, and get your system running smoothly.
                </p>

            </div>


            <div class="implementation-timeline">

                <!-- Vertical timeline line -->
                <div class="implementation-line"></div>

                <?php foreach ($tool['process'] as $i => $step): ?>

                    <div class="implementation-step">

                        <!-- Number -->
                        <div class="implementation-number">
                            <span>
                                <?php echo str_pad($i + 1, 2, '0', STR_PAD_LEFT); ?>
                            </span>
                        </div>


                        <!-- Content Card -->
                        <div class="implementation-card">

                            <div class="implementation-card-content">

                                <span class="implementation-step-label">
                                    STEP <?php echo str_pad($i + 1, 2, '0', STR_PAD_LEFT); ?>
                                </span>

                                <h3>
                                    <?php echo htmlspecialchars($step['title']); ?>
                                </h3>

                                <p>
                                    <?php echo htmlspecialchars($step['desc']); ?>
                                </p>

                            </div>


                            <!-- Arrow -->
                            <div class="implementation-arrow">
                                <svg viewBox="0 0 24 24"
                                    fill="none"
                                    stroke="currentColor"
                                    stroke-width="1.8">
                                    <path d="M5 12h14" />
                                    <path d="m13 6 6 6-6 6" />
                                </svg>
                            </div>

                        </div>

                    </div>

                <?php endforeach; ?>

            </div>

        </div>
    </section>

    <!-- TESTIMONIAL -->
    <section style="padding-top:0;">
        <div class="container">
            <div class="testimonial-card">
                <span class="quote-mark">&ldquo;</span>
                <div>
                    <p class="quote"><?php echo htmlspecialchars($tool['testimonial']['quote']); ?></p>
                    <span class="who"><strong><?php echo htmlspecialchars($tool['testimonial']['author']); ?></strong> &middot; <?php echo htmlspecialchars($tool['testimonial']['role']); ?></span>
                </div>
            </div>
        </div>
    </section>

    <!-- FAQ -->
    <section style="padding-top:100px;">
        <div class="container">
            <div class="section-head">
                <div class="badge-pill mb-3"><span class="dot"></span> Common Questions</div>
                <h2>Frequently asked about <?php echo htmlspecialchars($tool['abbr']); ?></h2>
            </div>
            <div id="faqList">
                <?php foreach ($tool['faqs'] as $i => $faq): ?>
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

    <!-- =========================================================
     RELATED TOOLS
========================================================= -->
    <section class="related-tools">

        <div class="container">

            <div class="related-head">

                <div class="badge-pill">
                    <span class="dot"></span>
                    Pairs Well With
                </div>

                <div class="related-heading-row">
                    <div>
                        <h2>Other tools in the sales &amp; marketing stack</h2>
                        <p>
                            Connect the tools your team already uses to create
                            a more consistent workflow.
                        </p>
                    </div>
                </div>

            </div>


            <div class="related-grid">

                <?php
                $c = 0;

                foreach ($otherTools as $rel):

                    if ($c >= 4) {
                        break;
                    }

                    $c++;
                ?>

                    <a
                        href="sales-marketing-detail.php?slug=<?php echo urlencode($rel['slug']); ?>"
                        class="related-card">

                        <div class="related-card-top">

                            <div class="r-icon">
                                <?php echo sm_icon($smIcons, $rel['icon']); ?>
                            </div>

                            <span class="related-arrow">
                                <svg viewBox="0 0 24 24"
                                    fill="none"
                                    stroke="currentColor"
                                    stroke-width="1.8">
                                    <path d="M5 12h14" />
                                    <path d="m13 6 6 6-6 6" />
                                </svg>
                            </span>

                        </div>


                        <div class="related-card-content">

                            <span class="r-abbr">
                                <?php echo htmlspecialchars($rel['abbr']); ?>
                            </span>

                            <h3>
                                <?php echo htmlspecialchars($rel['title']); ?>
                            </h3>

                        </div>

                    </a>

                <?php endforeach; ?>

            </div>

        </div>

    </section>

    <!-- CTA -->
    <section class="container" style="padding-top:100px;">
        <div class="careers">
            <div class="careers-copy">
                <span class="eyebrow" style="color:#b38f51;">Ready When You Are</span>
                <h2>Let's talk about your <?php echo htmlspecialchars($tool['abbr']); ?> setup</h2>
                <p>Book a discovery call and we'll tell you honestly whether we're the right fit — no obligation, no generic pitch deck.</p>
            </div>
            <div class="careers-actions">
                <a href="#" class="btn btn-gold">Book A Discovery Call</a>
                <a href="sales-marketing.php" class="btn btn-outline-light">View All Tools</a>
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

    <div class="container" style="padding:100px 24px;text-align:center;">
        <h1 style="font-size:1.8rem;font-weight:700;color:#000;margin-bottom:12px;">Tool not found</h1>
        <p style="color:#6c7280;margin-bottom:24px;">We couldn't find that tool. It may have been renamed or removed.</p>
        <a href="sales-marketing.php" class="btn btn-gold">Browse Sales &amp; Marketing</a>
    </div>

<?php endif; ?>

<?php
include_once('elements/faqs.php');
include_once('elements/footer.php');
?>