<?php
// Vars
$page = "home";
$pagetitle = "Patrick Portfolio";
$description = "Welcome to Patrick's digital portfolio. Browse my latest projects, professional experience, and creative work. Let’s build something amazing together.";




include("template-parts/header.php");
?>




<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Andrian Patrick Catag — Full-Stack Web Developer Portfolio">
    <title>Andrian Patrick Catag | Full-Stack Web Developer</title>

```
<style>
    /* =========================================================
       ROOT / RESET
    ========================================================= */

    :root {
        --bg: #080a0f;
        --bg-soft: #0d1118;
        --card: #11161f;
        --card-hover: #151c27;
        --border: #202936;
        --text: #f1f5f9;
        --muted: #94a3b8;
        --muted-light: #cbd5e1;

        --primary: #60a5fa;
        --primary-bright: #38bdf8;
        --secondary: #a78bfa;
        --success: #34d399;

        --glow: rgba(56, 189, 248, 0.15);

        --max-width: 1240px;
        --nav-width: 250px;

        --radius: 18px;
        --transition: 0.3s ease;
    }

    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    html {
        scroll-behavior: smooth;
    }

    body {
        background:
            radial-gradient(circle at 80% 10%, rgba(56, 189, 248, 0.07), transparent 25%),
            radial-gradient(circle at 10% 50%, rgba(167, 139, 250, 0.05), transparent 25%),
            var(--bg);
        color: var(--text);
        font-family:
            Inter,
            ui-sans-serif,
            system-ui,
            -apple-system,
            BlinkMacSystemFont,
            "Segoe UI",
            sans-serif;
        line-height: 1.7;
        min-height: 100vh;
    }

    body.menu-open {
        overflow: hidden;
    }

    a {
        color: inherit;
        text-decoration: none;
    }

    button,
    input,
    textarea,
    select {
        font: inherit;
    }

    img {
        max-width: 100%;
        display: block;
    }

    ::selection {
        background: rgba(56, 189, 248, 0.25);
        color: white;
    }

    /* =========================================================
       NAVIGATION
    ========================================================= */

    .navbar {
        position: fixed;
        left: 0;
        top: 0;
        bottom: 0;
        width: var(--nav-width);
        background: rgba(8, 10, 15, 0.88);
        backdrop-filter: blur(18px);
        -webkit-backdrop-filter: blur(18px);
        border-right: 1px solid var(--border);
        z-index: 1000;
        display: flex;
        flex-direction: column;
        padding: 28px 20px;
    }

    .nav-brand {
        display: flex;
        align-items: center;
        gap: 12px;
        margin-bottom: 50px;
    }

    .brand-mark {
        width: 42px;
        height: 42px;
        border-radius: 12px;
        display: grid;
        place-items: center;
        background: linear-gradient(
            135deg,
            var(--primary-bright),
            var(--secondary)
        );
        color: #05070a;
        font-weight: 900;
        font-size: 17px;
        box-shadow: 0 0 30px rgba(56, 189, 248, 0.2);
    }

    .brand-text strong {
        display: block;
        font-size: 14px;
        letter-spacing: -0.02em;
    }

    .brand-text span {
        display: block;
        color: var(--muted);
        font-size: 11px;
        margin-top: 1px;
    }

    .nav-label {
        color: #64748b;
        text-transform: uppercase;
        letter-spacing: 0.16em;
        font-size: 10px;
        font-weight: 700;
        margin: 0 12px 15px;
    }

    .nav-links {
        list-style: none;
        display: flex;
        flex-direction: column;
        gap: 6px;
    }

    .nav-links button {
        width: 100%;
        border: 0;
        background: transparent;
        color: var(--muted);
        padding: 12px 13px;
        border-radius: 11px;
        text-align: left;
        cursor: pointer;
        transition: var(--transition);
        display: flex;
        align-items: center;
        gap: 12px;
    }

    .nav-links button:hover {
        background: rgba(255, 255, 255, 0.04);
        color: var(--text);
        transform: translateX(3px);
    }

    .nav-icon {
        width: 27px;
        height: 27px;
        display: grid;
        place-items: center;
        border-radius: 8px;
        background: rgba(255, 255, 255, 0.04);
        font-size: 13px;
    }

    .nav-footer {
        margin-top: auto;
        padding: 15px 12px;
        border-top: 1px solid var(--border);
        color: #64748b;
        font-size: 11px;
    }

    .nav-status {
        display: flex;
        align-items: center;
        gap: 8px;
        margin-bottom: 5px;
        color: var(--muted);
    }

    .status-dot {
        width: 7px;
        height: 7px;
        background: var(--success);
        border-radius: 50%;
        box-shadow: 0 0 10px rgba(52, 211, 153, 0.7);
    }

    /* =========================================================
       MOBILE HEADER
    ========================================================= */

    .mobile-header {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        height: 70px;
        background: rgba(8, 10, 15, 0.9);
        backdrop-filter: blur(18px);
        border-bottom: 1px solid var(--border);
        z-index: 1100;
        padding: 0 20px;
        align-items: center;
        justify-content: space-between;
    }

    .mobile-brand {
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .mobile-brand .brand-mark {
        width: 36px;
        height: 36px;
        border-radius: 10px;
        font-size: 14px;
    }

    .menu-toggle {
        width: 44px;
        height: 44px;
        border: 1px solid var(--border);
        border-radius: 10px;
        background: var(--card);
        color: var(--text);
        cursor: pointer;
        display: grid;
        place-items: center;
        position: relative;
    }

    .hamburger {
        width: 20px;
        height: 14px;
        position: relative;
    }

    .hamburger span {
        position: absolute;
        left: 0;
        width: 100%;
        height: 2px;
        border-radius: 2px;
        background: var(--text);
        transition: var(--transition);
    }

    .hamburger span:nth-child(1) {
        top: 0;
    }

    .hamburger span:nth-child(2) {
        top: 6px;
    }

    .hamburger span:nth-child(3) {
        top: 12px;
    }

    .menu-toggle.active .hamburger span:nth-child(1) {
        top: 6px;
        transform: rotate(45deg);
    }

    .menu-toggle.active .hamburger span:nth-child(2) {
        opacity: 0;
    }

    .menu-toggle.active .hamburger span:nth-child(3) {
        top: 6px;
        transform: rotate(-45deg);
    }

    /* =========================================================
       MAIN
    ========================================================= */

    main {
        margin-left: var(--nav-width);
    }

    .container {
        width: min(var(--max-width), calc(100% - 70px));
        margin: 0 auto;
    }

    section {
        padding: 110px 0;
        position: relative;
    }

    section:not(:first-child) {
        border-top: 1px solid rgba(255, 255, 255, 0.035);
    }

    .section-heading {
        margin-bottom: 50px;
    }

    .eyebrow {
        color: var(--primary-bright);
        text-transform: uppercase;
        letter-spacing: 0.18em;
        font-size: 11px;
        font-weight: 800;
        margin-bottom: 10px;
    }

    .section-heading h2 {
        font-size: clamp(30px, 4vw, 48px);
        line-height: 1.1;
        letter-spacing: -0.045em;
    }

    .section-heading p {
        max-width: 650px;
        color: var(--muted);
        margin-top: 15px;
    }

    /* =========================================================
       HERO
    ========================================================= */

    .hero {
        min-height: 100vh;
        display: flex;
        align-items: center;
        padding-top: 70px;
    }

    .hero-grid {
        display: grid;
        grid-template-columns: 310px 1fr;
        gap: 70px;
        align-items: center;
    }

    .profile-wrapper {
        position: relative;
    }

    .profile-image {
        width: 280px;
        height: 350px;
        object-fit: cover;
        border-radius: 24px;
        border: 1px solid var(--border);
        background: linear-gradient(145deg, #17202d, #0b0f15);
        box-shadow:
            0 30px 80px rgba(0, 0, 0, 0.45),
            0 0 60px rgba(56, 189, 248, 0.07);
    }

    .profile-glow {
        position: absolute;
        width: 180px;
        height: 180px;
        background: var(--primary-bright);
        opacity: 0.08;
        filter: blur(70px);
        left: 50px;
        bottom: -30px;
        z-index: -1;
    }

    .profile-badge {
        position: absolute;
        bottom: -16px;
        right: 5px;
        padding: 10px 14px;
        border: 1px solid var(--border);
        border-radius: 12px;
        background: rgba(17, 22, 31, 0.92);
        backdrop-filter: blur(12px);
        font-size: 12px;
        color: var(--muted-light);
    }

    .hero-content .eyebrow {
        margin-bottom: 15px;
    }

    .hero-title {
        font-size: clamp(42px, 6vw, 76px);
        line-height: 0.98;
        letter-spacing: -0.065em;
        margin-bottom: 22px;
    }

    .hero-title .gradient {
        background: linear-gradient(
            100deg,
            #f8fafc 20%,
            var(--primary-bright) 55%,
            var(--secondary)
        );
        -webkit-background-clip: text;
        background-clip: text;
        color: transparent;
    }

    .hero-subtitle {
        color: var(--muted-light);
        font-size: 18px;
        max-width: 760px;
        margin-bottom: 28px;
    }

    .skill-pills {
        display: flex;
        flex-wrap: wrap;
        gap: 8px;
        margin-bottom: 30px;
    }

    .pill {
        border: 1px solid var(--border);
        background: rgba(255, 255, 255, 0.025);
        color: var(--muted-light);
        padding: 6px 11px;
        border-radius: 999px;
        font-size: 12px;
        transition: var(--transition);
    }

    .pill:hover {
        border-color: rgba(56, 189, 248, 0.4);
        color: var(--primary-bright);
        background: rgba(56, 189, 248, 0.05);
    }

    .hero-copy {
        color: var(--muted);
        max-width: 850px;
    }

    .hero-copy p {
        margin-bottom: 18px;
    }

    .hero-copy strong {
        color: var(--muted-light);
        font-weight: 600;
    }

    .hero-end {
        color: var(--primary-bright);
        font-size: 24px;
        letter-spacing: 4px;
    }

    /* =========================================================
       EXPERTISE
    ========================================================= */

    .expertise-grid {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 18px;
    }

    .expertise-card {
        background: linear-gradient(
            145deg,
            rgba(17, 22, 31, 0.95),
            rgba(13, 17, 24, 0.85)
        );
        border: 1px solid var(--border);
        border-radius: var(--radius);
        padding: 26px;
        transition: var(--transition);
    }

    .expertise-card:hover {
        transform: translateY(-4px);
        border-color: rgba(56, 189, 248, 0.2);
        background: var(--card-hover);
    }

    .expertise-card.full {
        grid-column: 1 / -1;
    }

    .category-heading {
        display: flex;
        align-items: center;
        gap: 12px;
        margin-bottom: 20px;
    }

    .category-icon {
        width: 40px;
        height: 40px;
        display: grid;
        place-items: center;
        background: rgba(56, 189, 248, 0.08);
        border: 1px solid rgba(56, 189, 248, 0.15);
        border-radius: 11px;
    }

    .category-heading h3 {
        font-size: 17px;
    }

    .tags {
        display: flex;
        flex-wrap: wrap;
        gap: 8px;
    }

    .tag {
        color: var(--muted-light);
        border: 1px solid #263140;
        background: #0c1118;
        padding: 7px 10px;
        border-radius: 8px;
        font-size: 12px;
        transition: var(--transition);
    }

    .tag:hover {
        color: var(--primary-bright);
        border-color: rgba(56, 189, 248, 0.35);
        transform: translateY(-2px);
    }

    /* =========================================================
       EXPERIENCE
    ========================================================= */

    .experience-list {
        display: flex;
        flex-direction: column;
        gap: 24px;
    }

    .experience-card {
        position: relative;
        border: 1px solid var(--border);
        background: var(--card);
        border-radius: var(--radius);
        padding: 30px;
        overflow: hidden;
    }

    .experience-card::before {
        content: "";
        position: absolute;
        top: 0;
        left: 0;
        width: 3px;
        height: 100%;
        background: linear-gradient(
            to bottom,
            var(--primary-bright),
            var(--secondary)
        );
    }

    .experience-top {
        display: flex;
        align-items: flex-start;
        justify-content: space-between;
        gap: 20px;
        margin-bottom: 24px;
    }

    .experience-number {
        color: #334155;
        font-size: 13px;
        font-weight: 800;
        letter-spacing: 0.1em;
    }

    .experience-card h3 {
        font-size: 23px;
        line-height: 1.3;
    }

    .experience-card .company {
        color: var(--primary-bright);
        font-size: 13px;
        margin-top: 4px;
    }

    .experience-section {
        margin-top: 22px;
    }

    .experience-section h4 {
        font-size: 13px;
        color: var(--text);
        margin-bottom: 10px;
        text-transform: uppercase;
        letter-spacing: 0.08em;
    }

    .experience-section ul {
        list-style: none;
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 8px 22px;
    }

    .experience-section li {
        color: var(--muted);
        font-size: 13px;
        padding-left: 18px;
        position: relative;
    }

    .experience-section li::before {
        content: "›";
        position: absolute;
        left: 0;
        color: var(--primary-bright);
        font-weight: 900;
    }

    /* =========================================================
       PERSONAL
    ========================================================= */

    .personal-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 20px;
    }

    .info-card {
        border: 1px solid var(--border);
        background: var(--card);
        border-radius: var(--radius);
        padding: 28px;
    }

    .info-card h3 {
        font-size: 18px;
        margin-bottom: 20px;
    }

    .info-row {
        display: flex;
        justify-content: space-between;
        gap: 20px;
        padding: 13px 0;
        border-bottom: 1px solid rgba(255, 255, 255, 0.05);
        font-size: 13px;
    }

    .info-row:last-child {
        border-bottom: 0;
    }

    .info-row span:first-child {
        color: var(--muted);
    }

    .info-row span:last-child {
        color: var(--muted-light);
        text-align: right;
    }

    /* =========================================================
       CONTACT
    ========================================================= */

    .contact-grid {
        display: grid;
        grid-template-columns: 0.75fr 1.25fr;
        gap: 25px;
        align-items: start;
    }

    .contact-intro {
        border: 1px solid var(--border);
        background:
            radial-gradient(circle at top right, rgba(56, 189, 248, 0.08), transparent 40%),
            var(--card);
        border-radius: var(--radius);
        padding: 30px;
    }

    .contact-intro h3 {
        font-size: 28px;
        line-height: 1.2;
        margin-bottom: 15px;
    }

    .contact-intro p {
        color: var(--muted);
        font-size: 14px;
    }

    .contact-note {
        margin-top: 25px;
        padding: 14px;
        border: 1px dashed #344154;
        border-radius: 11px;
        color: #94a3b8;
        font-size: 12px;
    }

    .contact-form {
        border: 1px solid var(--border);
        background: var(--card);
        border-radius: var(--radius);
        padding: 30px;
    }

    .form-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 18px;
    }

    .form-group {
        display: flex;
        flex-direction: column;
        gap: 7px;
    }

    .form-group.full {
        grid-column: 1 / -1;
    }

    .form-group label {
        color: var(--muted-light);
        font-size: 12px;
        font-weight: 600;
    }

    .form-group input,
    .form-group textarea,
    .form-group select {
        width: 100%;
        background: #0a0e14;
        border: 1px solid #263140;
        border-radius: 10px;
        color: var(--text);
        outline: none;
        padding: 12px 13px;
        transition: var(--transition);
    }

    .form-group input:focus,
    .form-group textarea:focus,
    .form-group select:focus {
        border-color: rgba(56, 189, 248, 0.6);
        box-shadow: 0 0 0 3px rgba(56, 189, 248, 0.07);
    }

    .form-group textarea {
        min-height: 150px;
        resize: vertical;
    }

    .submit-button {
        margin-top: 20px;
        width: 100%;
        border: 0;
        border-radius: 10px;
        padding: 13px;
        background: linear-gradient(
            100deg,
            var(--primary-bright),
            var(--secondary)
        );
        color: #05070a;
        font-weight: 800;
        cursor: pointer;
        transition: var(--transition);
    }

    .submit-button:hover {
        transform: translateY(-2px);
        box-shadow: 0 12px 30px rgba(56, 189, 248, 0.15);
    }

    /* =========================================================
       FOOTER
    ========================================================= */

    footer {
        border-top: 1px solid var(--border);
        margin-left: var(--nav-width);
        background: #06080c;
    }

    .footer-inner {
        width: min(var(--max-width), calc(100% - 70px));
        margin: 0 auto;
        padding: 60px 0 30px;
    }

    .footer-top {
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
        gap: 40px;
        padding-bottom: 40px;
    }

    .footer-brand h3 {
        font-size: 25px;
        letter-spacing: -0.04em;
    }

    .footer-brand p {
        color: var(--muted);
        max-width: 420px;
        margin-top: 10px;
        font-size: 13px;
    }

    .footer-code {
        font-family: "SFMono-Regular", Consolas, monospace;
        color: #475569;
        font-size: 12px;
        margin-top: 18px;
    }

    .footer-links {
        display: flex;
        gap: 8px;
        flex-wrap: wrap;
        justify-content: flex-end;
    }

    .footer-link {
        padding: 8px 12px;
        border: 1px solid var(--border);
        border-radius: 8px;
        color: var(--muted);
        font-size: 11px;
    }

    .footer-bottom {
        border-top: 1px solid rgba(255, 255, 255, 0.05);
        padding-top: 20px;
        display: flex;
        justify-content: space-between;
        gap: 20px;
        color: #64748b;
        font-size: 11px;
    }

    /* =========================================================
       SCROLL REVEAL
    ========================================================= */

    .reveal {
        opacity: 0;
        transform: translateY(20px);
        transition: opacity 0.7s ease, transform 0.7s ease;
    }

    .reveal.visible {
        opacity: 1;
        transform: translateY(0);
    }

    /* =========================================================
       RESPONSIVE
    ========================================================= */

    @media (max-width: 1100px) {
        :root {
            --nav-width: 220px;
        }

        .hero-grid {
            grid-template-columns: 240px 1fr;
            gap: 40px;
        }

        .profile-image {
            width: 230px;
            height: 300px;
        }

        .container {
            width: min(var(--max-width), calc(100% - 45px));
        }

        .footer-inner {
            width: min(var(--max-width), calc(100% - 45px));
        }
    }

    @media (max-width: 850px) {
        .navbar {
            transform: translateX(-100%);
            transition: transform 0.35s ease;
            width: 280px;
            box-shadow: 20px 0 50px rgba(0, 0, 0, 0.35);
        }

        .navbar.open {
            transform: translateX(0);
        }

        .mobile-header {
            display: flex;
        }

        main {
            margin-left: 0;
        }

        footer {
            margin-left: 0;
        }

        .hero {
            padding-top: 130px;
        }

        .hero-grid {
            grid-template-columns: 1fr;
        }

        .profile-wrapper {
            display: flex;
            justify-content: center;
        }

        .hero-content {
            text-align: center;
        }

        .skill-pills {
            justify-content: center;
        }

        .hero-copy {
            text-align: left;
        }

        .expertise-grid,
        .personal-grid,
        .contact-grid {
            grid-template-columns: 1fr;
        }

        .expertise-card.full {
            grid-column: auto;
        }

        .experience-section ul {
            grid-template-columns: 1fr;
        }
    }

    @media (max-width: 600px) {
        .container {
            width: calc(100% - 30px);
        }

        .footer-inner {
            width: calc(100% - 30px);
        }

        section {
            padding: 75px 0;
        }

        .hero {
            padding-top: 105px;
        }

        .profile-image {
            width: 210px;
            height: 260px;
        }

        .hero-title {
            font-size: 43px;
        }

        .hero-subtitle {
            font-size: 15px;
        }

        .experience-card,
        .expertise-card,
        .info-card,
        .contact-form,
        .contact-intro {
            padding: 21px;
        }

        .experience-top {
            flex-direction: column;
        }

        .form-grid {
            grid-template-columns: 1fr;
        }

        .form-group.full {
            grid-column: auto;
        }

        .footer-top,
        .footer-bottom {
            flex-direction: column;
        }

        .footer-links {
            justify-content: flex-start;
        }
    }

    @media (prefers-reduced-motion: reduce) {
        html {
            scroll-behavior: auto;
        }

        *,
        *::before,
        *::after {
            animation-duration: 0.01ms !important;
            animation-iteration-count: 1 !important;
            transition-duration: 0.01ms !important;
        }

        .reveal {
            opacity: 1;
            transform: none;
        }
    }
</style>
```

</head>

<body>

```
<!-- =========================================================
     MOBILE HEADER
========================================================== -->

<header class="mobile-header">
    <div class="mobile-brand">
        <div class="brand-mark">AC</div>

        <div class="brand-text">
            <strong>Andrian Catag</strong>
            <span>Full-Stack Developer</span>
        </div>
    </div>

    <button
        class="menu-toggle"
        id="menuToggle"
        aria-label="Toggle navigation"
        aria-expanded="false"
    >
        <span class="hamburger">
            <span></span>
            <span></span>
            <span></span>
        </span>
    </button>
</header>


<!-- =========================================================
     SIDE NAVIGATION
========================================================== -->

<nav class="navbar" id="navbar">

    <div class="nav-brand">
        <div class="brand-mark">AC</div>

        <div class="brand-text">
            <strong>Andrian Catag</strong>
            <span>Full-Stack Developer</span>
        </div>
    </div>

    <div class="nav-label">Navigation</div>

    <ul class="nav-links">

        <!--
            These buttons intentionally do not navigate anywhere.
            Replace them with your own links later.
        -->

        <li>
            <button type="button" data-target="expertise">
                <span class="nav-icon">⚡</span>
                Expertise
            </button>
        </li>

        <li>
            <button type="button" data-target="experience">
                <span class="nav-icon">🚀</span>
                Experience
            </button>
        </li>

        <li>
            <button type="button" data-target="personal">
                <span class="nav-icon">👤</span>
                Personal Info
            </button>
        </li>

        <li>
            <button type="button" data-target="contact">
                <span class="nav-icon">✉️</span>
                Contact
            </button>
        </li>

    </ul>

    <div class="nav-footer">
        <div class="nav-status">
            <span class="status-dot"></span>
            Open to opportunities
        </div>

        <div>© 2026 Andrian Patrick Catag</div>
    </div>

</nav>


<!-- =========================================================
     MAIN CONTENT
========================================================== -->

<main>

    <!-- =====================================================
         HERO
    ====================================================== -->

    <section class="hero" id="home">

        <div class="container">

            <div class="hero-grid">

                <div class="profile-wrapper reveal">

                    <!-- Replace this dummy image with your own -->
                    <img
                        class="profile-image"
                        src="https://placehold.co/560x700/111827/60a5fa?text=YOUR+PHOTO"
                        alt="Andrian Patrick Catag profile placeholder"
                    >

                    <div class="profile-glow"></div>

                    <div class="profile-badge">
                        💻 10+ Years Coding
                    </div>

                </div>


                <div class="hero-content reveal">

                    <div class="eyebrow">
                        👋 Hello, World!
                    </div>

                    <h1 class="hero-title">
                        I'm Andrian Patrick
                        <span class="gradient">Catag.</span>
                    </h1>

                    <p class="hero-subtitle">
                        A passionate <strong>💻 Full-Stack Web Developer</strong>
                        building dynamic, secure, scalable, and
                        user-focused digital experiences.
                    </p>

                    <div class="skill-pills">
                        <span class="pill">PHP</span>
                        <span class="pill">Laravel</span>
                        <span class="pill">WordPress</span>
                        <span class="pill">CodeIgniter</span>
                        <span class="pill">JavaScript</span>
                        <span class="pill">Python</span>
                        <span class="pill">APIs</span>
                        <span class="pill">Git</span>
                    </div>


                    <div class="hero-copy">

                        <p>
                            👋 I'm Andrian Patrick Catag, a passionate
                            💻 Web Developer with over 10 years of experience
                            building dynamic, secure, and scalable websites
                            and applications.
                        </p>

                        <p>
                            🛠️ <strong>My core skills include:</strong>
                            PHP, API Integration, WordPress Development
                            (Themes & Plugins), CodeIgniter, Laravel,
                            CMS Development, DNS Management, JavaScript,
                            Python, Tailwind CSS, Communications Development,
                            and Git.
                        </p>

                        <p>
                            🧩 I specialize in creating custom solutions
                            that are clean, efficient, and user-focused.
                            Bringing ideas to life through code and
                            collaboration. Whether it's crafting a new
                            WordPress plugin or scaling a Laravel-based
                            application, I'm all about delivering
                            high-quality results that make an impact.
                        </p>

                        <p>
                            📚 I love my work as a Full-Stack Web Developer
                            and am always eager to learn new technologies.
                            Since the tech industry evolves rapidly, I
                            believe it's essential to stay updated by
                            continuously learning and exploring new tools
                            and trends in my spare time.
                        </p>

                        <p>
                            🎯 When I take on a project, I approach it with
                            full commitment and urgency, aiming to deliver
                            the best possible quality as efficiently as I
                            can. While it's true that developers may
                            occasionally encounter errors, I take
                            responsibility by implementing thorough
                            self-testing procedures before submitting any
                            work. I deeply value your time, and I make it
                            a priority to ensure that no time is wasted
                            on sloppy or incomplete output.
                        </p>

                        <p>
                            🔎 I consider myself a highly resourceful
                            developer. Even when I'm confident in my
                            approach, I take the time to explore whether
                            there might be newer, more efficient, or more
                            reliable methods available. As technology
                            evolves rapidly, staying open to continuous
                            improvement is essential — there's always
                            something new that can enhance the way we
                            build and solve problems.
                        </p>

                        <p>
                            🤝 <strong>Let's build something great together!</strong>
                        </p>

                        <div class="hero-end">...</div>

                    </div>

                </div>

            </div>

        </div>

    </section>


    <!-- =====================================================
         EXPERTISE
    ====================================================== -->

    <section id="expertise">

        <div class="container">

            <div class="section-heading reveal">
                <div class="eyebrow">⚡ What I Do</div>

                <h2>Expertise</h2>

                <p>
                    A practical toolkit built around backend engineering,
                    web applications, automation, APIs, databases,
                    and modern frontend technologies.
                </p>
            </div>


            <div class="expertise-grid">


                <article class="expertise-card full reveal">

                    <div class="category-heading">
                        <div class="category-icon">🧠</div>
                        <h3>Main Skills / Focus</h3>
                    </div>

                    <div class="tags">
                        <span class="tag">🕷️ Web Scraping</span>
                        <span class="tag">🤖 User Interaction Bots</span>
                        <span class="tag">🐍 IP Manipulation with Python</span>
                        <span class="tag">🧩 Deep PHP Logic</span>
                        <span class="tag">📡 Web Monitoring</span>
                        <span class="tag">⏱️ Cronjob Scripts</span>
                        <span class="tag">🤝 CRM</span>
                        <span class="tag">🗄️ Huge Database Management</span>
                        <span class="tag">⚙️ PHP Performance Optimization</span>
                    </div>

                </article>


                <article class="expertise-card reveal">

                    <div class="category-heading">
                        <div class="category-icon">💻</div>
                        <h3>General</h3>
                    </div>

                    <div class="tags">
                        <span class="tag">PHP</span>
                        <span class="tag">JavaScript</span>
                        <span class="tag">Ajax</span>
                        <span class="tag">jQuery</span>
                        <span class="tag">HTML / TPL</span>
                        <span class="tag">CSS / SCSS</span>
                        <span class="tag">Python</span>
                        <span class="tag">Node.js</span>
                        <span class="tag">React.js</span>
                        <span class="tag">CRM</span>
                        <span class="tag">RESTful APIs</span>
                        <span class="tag">SEO</span>
                        <span class="tag">Webhosting</span>
                        <span class="tag">DNS Management</span>
                    </div>

                </article>


                <article class="expertise-card reveal">

                    <div class="category-heading">
                        <div class="category-icon">🧱</div>
                        <h3>Developments</h3>
                    </div>

                    <div class="tags">
                        <span class="tag">Laravel</span>
                        <span class="tag">CodeIgniter</span>
                        <span class="tag">WordPress</span>
                        <span class="tag">OpenCart</span>
                        <span class="tag">SuiteCRM</span>
                        <span class="tag">Joomla</span>
                    </div>

                </article>


                <article class="expertise-card reveal">

                    <div class="category-heading">
                        <div class="category-icon">🗄️</div>
                        <h3>Databases</h3>
                    </div>

                    <div class="tags">
                        <span class="tag">MySQL</span>
                        <span class="tag">MongoDB</span>
                        <span class="tag">SQLite</span>
                    </div>

                </article>


                <article class="expertise-card reveal">

                    <div class="category-heading">
                        <div class="category-icon">🧰</div>
                        <h3>Applications</h3>
                    </div>

                    <div class="tags">
                        <span class="tag">GitHub</span>
                        <span class="tag">Postman</span>
                        <span class="tag">npm / nvm</span>
                        <span class="tag">Composer</span>
                        <span class="tag">MongoDB Compass</span>
                        <span class="tag">Workbench</span>
                        <span class="tag">Amazon Workspace</span>
                        <span class="tag">VSCode / Sublime</span>
                        <span class="tag">WAMP / XAMPP</span>
                        <span class="tag">FileZilla / WinSCP</span>
                        <span class="tag">Photoshop</span>
                    </div>

                </article>


                <article class="expertise-card reveal">

                    <div class="category-heading">
                        <div class="category-icon">🔌</div>
                        <h3>3rd Party Web APIs</h3>
                    </div>

                    <div class="tags">
                        <span class="tag">Quickbase — Database</span>
                        <span class="tag">Twilio — SMS / Voice</span>
                        <span class="tag">Letterfriend — Email</span>
                        <span class="tag">Sendy — Email</span>
                        <span class="tag">DNSMadeEasy — DNS</span>
                        <span class="tag">Amazon S3 — Cloud Storage</span>
                    </div>

                </article>


                <article class="expertise-card full reveal">

                    <div class="category-heading">
                        <div class="category-icon">🧩</div>
                        <h3>Web Plugins & UI Tools</h3>
                    </div>

                    <div class="tags">
                        <span class="tag">Bootstrap</span>
                        <span class="tag">Font Awesome</span>
                        <span class="tag">Alpine.js</span>
                        <span class="tag">Tailwind CSS</span>
                        <span class="tag">TW-elements</span>
                        <span class="tag">Frostbite</span>
                    </div>

                </article>

            </div>

        </div>

    </section>


    <!-- =====================================================
         EXPERIENCE
    ====================================================== -->

    <section id="experience">

        <div class="container">

            <div class="section-heading reveal">
                <div class="eyebrow">🚀 Selected Work</div>
                <h2>Recent Experience</h2>
                <p>
                    A selection of systems, applications, integrations,
                    and development work from recent projects.
                </p>
            </div>


            <div class="experience-list">


                <!-- COVERAGE ONE -->

                <article class="experience-card reveal">

                    <div class="experience-top">

                        <div>
                            <div class="experience-number">01 / WORDPRESS</div>

                            <h3>
                                Coverage One Insurance
                            </h3>

                            <div class="company">
                                Recent WordPress Project
                            </div>
                        </div>

                        <div class="tag">🌐 WordPress</div>

                    </div>


                    <div class="experience-section">

                        <h4>Project Highlights</h4>

                        <ul>
                            <li>
                                Landing page used to monitor web company
                                traffic as requested by the client.
                            </li>

                            <li>
                                User registration submitted to an external
                                AWS database server.
                            </li>

                            <li>
                                Form integrated with ActiveProspect for
                                independent consent verification.
                            </li>

                            <li>
                                Letterfriend API used to send an email
                                for each form entry.
                            </li>

                            <li>
                                Twilio API used to send SMS notifications
                                for each form entry.
                            </li>
                        </ul>

                    </div>

                </article>


                <!-- BROWSERCALL -->

                <article class="experience-card reveal">

                    <div class="experience-top">

                        <div>
                            <div class="experience-number">02 / CODEIGNITER</div>

                            <h3>
                                Call Center Aircaller & Admin GUI
                            </h3>

                            <div class="company">
                                browsercall
                            </div>
                        </div>

                        <div class="tag">☎️ CodeIgniter</div>

                    </div>


                    <div class="experience-section">

                        <h4>🖥️ Admin</h4>

                        <ul>
                            <li>Agent status monitoring dashboard.</li>
                            <li>Daily and weekly call/sales statistics.</li>
                            <li>Closing call statistics.</li>
                            <li>Join, listen, whisper, and mute actions.</li>
                            <li>Agent timesheets with date-range filtering.</li>
                            <li>View and listen to call recordings.</li>
                            <li>Voicemail management.</li>
                            <li>Hold music management.</li>
                            <li>Callback tracker.</li>
                            <li>Customer-state assignment.</li>
                            <li>Agent call-duration tracking.</li>
                            <li>Vendor and campaign management.</li>
                            <li>Campaign assignment to agents.</li>
                            <li>Carrier extension management.</li>
                            <li>Call transfer log monitoring.</li>
                        </ul>

                    </div>


                    <div class="experience-section">

                        <h4>🎧 Agents</h4>

                        <ul>
                            <li>Make and receive calls while available.</li>
                            <li>Add someone to an active call.</li>
                            <li>Remove someone from a call.</li>
                            <li>Mute and unmute participants.</li>
                            <li>Transfer calls.</li>
                            <li>Make call dispositions.</li>
                            <li>Pause the dialer to stop receiving calls.</li>
                        </ul>

                    </div>


                    <div class="experience-section">

                        <h4>⚙️ Back-End Systems</h4>

                        <ul>
                            <li>Twilio Voice and SMS API integration.</li>
                            <li>Automatic callback SMS reminders.</li>
                            <li>Agent and customer call tracking.</li>
                            <li>Smart customer call assignment.</li>
                            <li>Automatic agent status updates.</li>
                            <li>Customer referral tracking.</li>
                            <li>External call-transfer tracking.</li>
                            <li>Marketing partner monitoring.</li>
                        </ul>

                    </div>

                </article>


                <!-- SPLASHING MONKEY -->

                <article class="experience-card reveal">

                    <div class="experience-top">

                        <div>
                            <div class="experience-number">03 / OPENCART</div>

                            <h3>
                                Splashing Monkey
                            </h3>

                            <div class="company">
                                Recent OpenCart Project
                            </div>
                        </div>

                        <div class="tag">🛒 OpenCart</div>

                    </div>


                    <div class="experience-section">

                        <h4>Project Highlights</h4>

                        <ul>
                            <li>Custom OpenCart theme.</li>
                            <li>Custom extension modules.</li>
                            <li>Third-party payment API integrations.</li>
                            <li>Stripe integration.</li>
                            <li>PayPal integration.</li>
                        </ul>

                    </div>

                </article>

            </div>

        </div>

    </section>


    <!-- =====================================================
         PERSONAL INFORMATION
    ====================================================== -->

    <section id="personal">

        <div class="container">

            <div class="section-heading reveal">
                <div class="eyebrow">👤 Beyond the Code</div>

                <h2>Personal Information</h2>

                <p>
                    Placeholder information for now. Replace these entries
                    with your actual details when you're ready.
                </p>
            </div>


            <div class="personal-grid">

                <div class="info-card reveal">

                    <h3>🙋 Personal Details</h3>

                    <div class="info-row">
                        <span>Full Name</span>
                        <span>Andrian Patrick Catag</span>
                    </div>

                    <div class="info-row">
                        <span>Location</span>
                        <span>[Your Location]</span>
                    </div>

                    <div class="info-row">
                        <span>Email</span>
                        <span>[your@email.com]</span>
                    </div>

                    <div class="info-row">
                        <span>Phone</span>
                        <span>[Your Phone Number]</span>
                    </div>

                    <div class="info-row">
                        <span>Availability</span>
                        <span>Open to opportunities</span>
                    </div>

                    <div class="info-row">
                        <span>Role</span>
                        <span>Full-Stack Web Developer</span>
                    </div>

                </div>


                <div class="info-card reveal">

                    <h3>🎓 Education & Certifications</h3>

                    <div class="info-row">
                        <span>Education</span>
                        <span>[Your Degree / Course]</span>
                    </div>

                    <div class="info-row">
                        <span>School</span>
                        <span>[Your School / University]</span>
                    </div>

                    <div class="info-row">
                        <span>Graduation</span>
                        <span>[Year]</span>
                    </div>

                    <div class="info-row">
                        <span>Certification</span>
                        <span>[Certification Name]</span>
                    </div>

                    <div class="info-row">
                        <span>Additional Training</span>
                        <span>[Training / Course]</span>
                    </div>

                    <div class="info-row">
                        <span>Interests</span>
                        <span>Technology · Coding · Learning</span>
                    </div>

                </div>

            </div>

        </div>

    </section>


    <!-- =====================================================
         CONTACT
    ====================================================== -->

    <section id="contact">

        <div class="container">

            <div class="section-heading reveal">

                <div class="eyebrow">✉️ Let's Talk</div>

                <h2>Contact Me</h2>

                <p>
                    Have an idea, project, or technical challenge?
                    Tell me a little about it.
                </p>

            </div>


            <div class="contact-grid">

                <div class="contact-intro reveal">

                    <h3>
                        Let's turn your idea into something useful. 🚀
                    </h3>

                    <p>
                        Whether you're building a new application,
                        improving an existing system, integrating an API,
                        or looking for help with a complex web project,
                        I'd love to hear what you're working on.
                    </p>

                    <div class="contact-note">
                        💡 <strong>Note:</strong> This contact form is
                        currently a visual placeholder and is not connected
                        to a backend or email service yet.
                    </div>

                </div>


                <form class="contact-form reveal" id="contactForm">

                    <div class="form-grid">

                        <div class="form-group">
                            <label for="name">Your Name *</label>
                            <input
                                id="name"
                                type="text"
                                placeholder="John Doe"
                                required
                            >
                        </div>


                        <div class="form-group">
                            <label for="email">Email Address *</label>
                            <input
                                id="email"
                                type="email"
                                placeholder="john@example.com"
                                required
                            >
                        </div>


                        <div class="form-group">
                            <label for="phone">Phone Number</label>
                            <input
                                id="phone"
                                type="tel"
                                placeholder="+63 900 000 0000"
                            >
                        </div>


                        <div class="form-group">
                            <label for="company">Company</label>
                            <input
                                id="company"
                                type="text"
                                placeholder="Your company"
                            >
                        </div>


                        <div class="form-group">
                            <label for="contact-method">
                                Preferred Contact Method
                            </label>

                            <select id="contact-method">
                                <option value="">Select one</option>
                                <option>Email</option>
                                <option>Phone</option>
                                <option>SMS</option>
                                <option>Video Call</option>
                            </select>
                        </div>


                        <div class="form-group">
                            <label for="project-type">
                                Project Type
                            </label>

                            <select id="project-type">
                                <option value="">Select project type</option>
                                <option>Website</option>
                                <option>Web Application</option>
                                <option>WordPress</option>
                                <option>Laravel</option>
                                <option>API Integration</option>
                                <option>Database / Backend</option>
                                <option>Other</option>
                            </select>
                        </div>


                        <div class="form-group">
                            <label for="budget">Estimated Budget</label>

                            <select id="budget">
                                <option value="">Select budget</option>
                                <option>Under $500</option>
                                <option>$500 – $1,000</option>
                                <option>$1,000 – $3,000</option>
                                <option>$3,000 – $5,000</option>
                                <option>$5,000+</option>
                                <option>Let's discuss</option>
                            </select>
                        </div>


                        <div class="form-group">
                            <label for="best-time">
                                Best Time to Contact
                            </label>

                            <input
                                id="best-time"
                                type="text"
                                placeholder="e.g. Weekdays, 9 AM – 5 PM"
                            >
                        </div>


                        <div class="form-group full">

                            <label for="message">
                                Tell Me About Your Project *
                            </label>

                            <textarea
                                id="message"
                                placeholder="Tell me about your project, goals, requirements, timeline, or anything else that might be useful..."
                                required
                            ></textarea>

                        </div>

                    </div>


                    <button
                        type="submit"
                        class="submit-button"
                    >
                        Send Project Inquiry ✨
                    </button>

                </form>

            </div>

        </div>

    </section>

</main>


<!-- =========================================================
     FOOTER
========================================================== -->

<footer>

    <div class="footer-inner">

        <div class="footer-top">

            <div class="footer-brand">

                <h3>
                    Andrian Patrick Catag<span style="color:#38bdf8;">.</span>
                </h3>

                <p>
                    Full-Stack Web Developer focused on building
                    reliable systems, thoughtful interfaces, and
                    solutions that actually solve problems.
                </p>

                <div class="footer-code">
                    &lt;code&gt; build · test · improve · repeat &lt;/code&gt;
                </div>

            </div>


            <div class="footer-links">

                <!-- Replace these placeholders later -->

                <span class="footer-link">GitHub</span>
                <span class="footer-link">LinkedIn</span>
                <span class="footer-link">Email</span>
                <span class="footer-link">Portfolio</span>

            </div>

        </div>


        <div class="footer-bottom">

            <span>
                © 2026 Andrian Patrick Catag. All rights reserved.
            </span>

            <span>
                Built with curiosity, clean code & ☕
            </span>

        </div>

    </div>

</footer>


<!-- =========================================================
     JAVASCRIPT
========================================================== -->

<script>

    /* ---------------------------------------------------------
       MOBILE NAVIGATION
    --------------------------------------------------------- */

    const menuToggle = document.getElementById("menuToggle");
    const navbar = document.getElementById("navbar");

    menuToggle.addEventListener("click", () => {

        const isOpen = navbar.classList.toggle("open");

        menuToggle.classList.toggle("active", isOpen);

        menuToggle.setAttribute(
            "aria-expanded",
            String(isOpen)
        );

        document.body.classList.toggle(
            "menu-open",
            isOpen
        );

    });


    /* ---------------------------------------------------------
       NAV BUTTONS
       
       Currently scrolls internally instead of navigating
       externally. Replace these with your own links later.
    --------------------------------------------------------- */

    document.querySelectorAll("[data-target]").forEach(button => {

        button.addEventListener("click", () => {

            const targetId = button.dataset.target;
            const target = document.getElementById(targetId);

            if (target) {

                target.scrollIntoView({
                    behavior: "smooth"
                });

            }

            // Close mobile menu
            navbar.classList.remove("open");
            menuToggle.classList.remove("active");
            menuToggle.setAttribute(
                "aria-expanded",
                "false"
            );
            document.body.classList.remove("menu-open");

        });

    });


    /* ---------------------------------------------------------
       SCROLL REVEAL
    --------------------------------------------------------- */

    const revealElements =
        document.querySelectorAll(".reveal");

    const observer = new IntersectionObserver(
        entries => {

            entries.forEach(entry => {

                if (entry.isIntersecting) {

                    entry.target.classList.add("visible");

                    observer.unobserve(entry.target);

                }

            });

        },
        {
            threshold: 0.08
        }
    );


    revealElements.forEach(element => {
        observer.observe(element);
    });


    /* ---------------------------------------------------------
       CONTACT FORM
       
       Visual only — no backend.
    --------------------------------------------------------- */

    document
        .getElementById("contactForm")
        .addEventListener("submit", event => {

            event.preventDefault();

            alert(
                "Thanks! The contact form is currently a visual demo and has not been connected to a backend yet."
            );

        });


    /* ---------------------------------------------------------
       CLOSE MOBILE MENU WHEN ESCAPE IS PRESSED
    --------------------------------------------------------- */

    document.addEventListener("keydown", event => {

        if (event.key === "Escape") {

            navbar.classList.remove("open");

            menuToggle.classList.remove("active");

            menuToggle.setAttribute(
                "aria-expanded",
                "false"
            );

            document.body.classList.remove("menu-open");

        }

    });

</script>
```

</body>
</html>




<?php include("template-parts/footer.php"); ?>