<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>AziziBank Applications Portal</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<style>
 /* SIMPLE PAGINATION */
/* PAGINATION WRAPPER */
.pagination-wrapper {
    margin-top: 25px;
    display: flex;
    justify-content: center;
}

/* force single row */
.pagination-wrapper nav {
    display: flex !important;
    flex-direction: row !important;
    align-items: center;
    gap: 10px;
}

/* Laravel default ul fix */
.pagination-wrapper ul {
    display: flex !important;
    flex-direction: row !important;
    list-style: none;
    padding: 0;
    margin: 0;
    gap: 10px;
}

/* links */
.pagination-wrapper li {
    display: inline-block;
}

/* buttons */
.pagination-wrapper a,
.pagination-wrapper span {
    padding: 10px 18px;
    border-radius: 8px;
    text-decoration: none;
    border: 1px solid #0b2e4a;
    color: #0b2e4a;
    background: white;
    font-size: 14px;
    font-weight: 600;
    display: inline-flex;
    align-items: center;
    gap: 6px;
    transition: 0.2s;
}

/* hover */
.pagination-wrapper a:hover {
    background: #0b2e4a;
    color: white;
}

/* disabled */
.pagination-wrapper .disabled span {
    opacity: 0.4;
}

.pagination-wrapper {
    margin: 24px 0 8px;
}

.pagination-wrapper nav {
    justify-content: center;
}

.pagination-wrapper nav > div:first-child {
    display: none;
}

.pagination-wrapper nav > div:last-child {
    display: flex;
    align-items: center;
    gap: 10px;
}

.pagination-wrapper nav span[aria-current="page"] span {
    border-color: #0b2e4a;
    background: #0b2e4a;
    color: #fff;
}

.pagination-wrapper nav svg {
    width: 18px;
    height: 18px;
}
    
body {
    margin: 0;
    font-family: Arial, Helvetica, sans-serif;
    background: #f4f7fb;
    color: #1e2a38;
}

/* TOP BAR */
.topbar {
    background: #0b2e4a;
    color: white;
    padding: 15px 30px;
    display: flex;
    justify-content: space-between;
    align-items: center;
}

/* SLIDER */
.slider {
    width: 92%;
    margin: 20px auto;
    height: 540px;
    border-radius: 14px;
    overflow: hidden;
    position: relative;
    box-shadow: 0 6px 20px rgba(0,0,0,0.15);
}

.slides {
    position: relative;
    width: 100%;
    height: 100%;
}

.slide {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    opacity: 0;
    transition: opacity 1s ease;
}

.slide.active {
    opacity: 1;
    z-index: 2;
}

.slide img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    display: block;
}

/* Responsive height fallbacks */
@media (max-width: 992px) {
    .slider { height: 420px; }
}

@media (max-width: 600px) {
    .slider { height: 260px; }
}

/* OVERLAY (SAFE FALLBACK) */
.overlay {
    position: absolute;
    bottom: 25px;
    left: 30px;
    color: #ffffff;
    /* glass-style panel */
    background-color: rgba(255,255,255,0.08);
    padding: 14px 18px;
    border-radius: 10px;
    max-width: 65%;
    border: 1px solid rgba(255,255,255,0.12);
    box-shadow: 0 8px 24px rgba(2,6,23,0.35);
    /* blur support (Safari/Chrome) */
    -webkit-backdrop-filter: blur(6px);
    backdrop-filter: blur(6px);
}

/* Fallback for browsers that don't support backdrop-filter (Firefox older versions) */
@supports not ((-webkit-backdrop-filter: blur(6px)) or (backdrop-filter: blur(6px))) {
    .overlay {
        /* stronger solid fallback so text remains readable */
        background-color: rgba(0,0,0,0.45);
        border: 0;
        box-shadow: none;
    }
}


.overlay h2 {
    margin: 0;
    font-size: 18px;
}

.overlay p {
    margin-top: 6px;
    font-size: 13px;
}

/* CONTAINER */
.container {
    width: 92%;
    margin: auto;
}

/* DATE CARD */
.date-card {
    background: #130bab;
    color: white;
    padding: 20px;
    border-radius: 14px;
    margin: 20px 0;
    display: flex;
    justify-content: space-between;
    align-items: center;
}

/* fallback flex support */
.date-card div {
    display: inline-block;
}

.time {
    font-size: 24px;
    font-weight: bold;
}

/* TITLE */
.section-title {
    font-size: 20px;
    font-weight: bold;
    margin: 20px 0;
    border-left: 5px solid #0b2e4a;
    padding-left: 10px;
}

/* GRID (fallback for old browsers) */
/* GRID */
.grid {
    display: flex;
    flex-wrap: wrap;
    align-items: stretch;
    margin: -10px;
}

/* modern grid where supported */
@supports (display: grid) {
    .grid {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 20px;
        margin: 0;
    }
    .card {
        width: auto;
        margin: 0;
    }
}

/* Tablet */
@media (max-width: 992px) {
    .grid {
        width: 100%;
    }
    .card {
        width: calc(50% - 20px);
    }
}

/* Mobile */
@media (max-width: 600px) {
    .grid,
    .card {
        width: 100%;
    }
    .card {
        margin: 10px 0;
    }
}

/* CARD (glass) */
.cards-area {
    position: relative;
    margin-top: 10px;
    border-radius: 14px;
    overflow: hidden;
    padding: 28px;
}
.cards-bg {
    position: absolute;
    top: 0;
    right: 0;
    bottom: 0;
    left: 0;
    background-position: center;
    background-size: cover;
    background-repeat: no-repeat;
    opacity: 0.34;
    z-index: 0;
    transform: scale(1.03);
    /* tint/filter for visual consistency */
    -webkit-filter: brightness(0.9) contrast(0.92) saturate(0.95);
    filter: brightness(0.9) contrast(0.92) saturate(0.95);
}

/* If CSS filters are not supported, increase opacity so background remains visible */
@supports not (filter: brightness(0.9)) {
    .cards-bg { opacity: 0.48; }
}

.grid { position: relative; z-index: 1; }

.card {
    width: auto;
    background: rgba(255,255,255,0.48);
    backdrop-filter: blur(6px);
    -webkit-backdrop-filter: blur(6px);
    border: 1px solid rgba(255,255,255,0.18);
    border-radius: 12px;
    padding: 18px;
    text-align: center;
    box-shadow: 0 8px 28px rgba(16,24,40,0.08);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

@supports not (display: grid) {
    .card {
        width: calc(25% - 20px);
        margin: 10px;
    }
}

@supports not ((-webkit-backdrop-filter: blur(6px)) or (backdrop-filter: blur(6px))) {
    .card {
        background: rgba(255,255,255,0.96);
        border-color: rgba(204,204,204,0.4);
    }
}

.card:hover {
    transform: translateY(-6px);
    box-shadow: 0 14px 40px rgba(16,24,40,0.14);
}

.card img {
    width: 60px;
    margin-bottom: 12px;
    border-radius: 8px;
}

.card h3 {
    margin: 6px 0;
    font-size: 14px;
    color: #0f172a;
}

/* BUTTONS */
.btn {
    margin-top: 12px;
}

.btn a, .btn button {
    display: block;
    margin: 5px auto;
    padding: 6px;
    font-size: 12px;
    border-radius: 6px;
    border: none;
    cursor: pointer;
    text-decoration: none;
}

.open {
    background: #091285;
    color: white;
}

.copy {
    background: #e9eef5;
    color: #1e2a38;
}

/* FOOTER */
.footer {
    background: #0b2e4a;
    color: white;
    text-align: center;
    padding: 14px;
    margin-top: 30px;
    font-size: 12px;
}

/* Welcome page refresh */
:root {
    color-scheme: light;
    --navy: #102b46;
    --blue: #1769aa;
    --ink: #172b3d;
    --muted: #647789;
    --line: #e2eaf1;
    --surface: #ffffff;
}

body {
    background: #f3f7fb;
    color: var(--ink);
    font-family: Inter, "Segoe UI", Arial, sans-serif;
}

.topbar {
    min-height: 66px;
    padding: 14px max(4%, calc((100% - 1260px) / 2));
    background: var(--navy);
    box-shadow: 0 3px 14px rgba(16, 43, 70, 0.16);
}

.topbar h2 {
    margin: 0;
    font-size: 19px;
    letter-spacing: 0.1px;
}

.slider {
    width: min(92%, 1260px);
    height: clamp(270px, 36vw, 430px);
    margin: 28px auto 24px;
    border-radius: 20px;
    box-shadow: 0 16px 42px rgba(16, 43, 70, 0.16);
}

.slide img {
    background: #203d56;
}

.overlay {
    bottom: 28px;
    left: 28px;
    max-width: min(560px, calc(100% - 56px));
    padding: 20px 24px;
    border-radius: 14px;
    background: rgba(11, 35, 57, 0.72);
}

.overlay h2 {
    font-size: clamp(20px, 3vw, 30px);
}

.overlay p {
    margin-bottom: 0;
    font-size: 15px;
    line-height: 1.5;
}

.container {
    width: min(92%, 1260px);
}

.date-card {
    min-height: 86px;
    margin: 0 0 34px;
    padding: 20px 26px;
    border-radius: 16px;
    background: linear-gradient(120deg, #102b46, #1d5e8a);
    box-shadow: 0 10px 24px rgba(16, 43, 70, 0.12);
}

#fullDate {
    font-size: 15px;
    font-weight: 700;
}

#dayName {
    margin-top: 5px;
    color: rgba(255, 255, 255, 0.72);
    font-size: 13px;
}

.time {
    font-size: 27px;
    font-variant-numeric: tabular-nums;
}

.section-heading {
    display: flex;
    align-items: flex-end;
    justify-content: space-between;
    gap: 20px;
    margin: 0 0 18px;
}

.section-title {
    margin: 0;
    border: 0;
    padding: 0;
    color: var(--ink);
    font-size: 25px;
    letter-spacing: -0.5px;
}

.section-description {
    margin: 7px 0 0;
    color: var(--muted);
    font-size: 14px;
}

.application-tools {
    display: flex;
    flex-wrap: wrap;
    align-items: center;
    gap: 10px;
    margin-bottom: 18px;
}

.portal-tabs {
    display: flex;
    gap: 8px;
    margin-bottom: 20px;
    border-bottom: 1px solid var(--line);
}

.portal-tab {
    min-height: 44px;
    padding: 0 18px;
    border: 0;
    border-bottom: 3px solid transparent;
    background: transparent;
    color: var(--muted);
    font: inherit;
    font-size: 15px;
    font-weight: 700;
    cursor: pointer;
}

.portal-tab[aria-selected="true"] {
    border-bottom-color: var(--blue);
    color: var(--navy);
}

.portal-tab:focus-visible {
    outline: 3px solid rgba(23, 105, 170, 0.35);
    outline-offset: 2px;
}

.form-category-tabs {
    display: flex;
    flex-wrap: wrap;
    gap: 8px;
    margin: 0 0 22px;
    padding: 6px;
    border: 1px solid var(--line);
    border-radius: 12px;
    background: #eaf0f5;
}

.form-category-tab {
    display: inline-flex;
    min-height: 42px;
    flex: 1 1 145px;
    align-items: center;
    justify-content: center;
    gap: 8px;
    padding: 0 16px;
    border: 1px solid transparent;
    border-radius: 9px;
    background: transparent;
    color: #53687b;
    font: inherit;
    font-size: 13px;
    font-weight: 700;
    cursor: pointer;
    transition: color 0.2s, background 0.2s, box-shadow 0.2s;
}

.form-category-tab[aria-selected="true"] {
    border-color: #e4ebf1;
    background: #fff;
    color: var(--navy);
    box-shadow: 0 2px 6px rgba(22, 53, 78, 0.07);
}

.form-category-tab:focus-visible {
    outline: 3px solid rgba(23, 105, 170, 0.35);
    outline-offset: 2px;
}

.category-count {
    display: inline-flex;
    min-width: 22px;
    height: 22px;
    align-items: center;
    justify-content: center;
    padding: 0 5px;
    border-radius: 99px;
    background: rgba(23, 105, 170, 0.1);
    color: inherit;
    font-size: 11px;
}

.form-category-panel[hidden] {
    display: none !important;
}

.portal-panel[hidden] {
    display: none !important;
}

.form-file-type {
    margin: -4px 0 16px;
    color: var(--muted);
    font-size: 12px;
    font-weight: 700;
}

.search-wrap {
    position: relative;
    flex: 1 1 260px;
}

.search-input {
    width: 100%;
    min-height: 44px;
    box-sizing: border-box;
    padding: 0 14px 0 42px;
    border: 1px solid var(--line);
    border-radius: 10px;
    outline: none;
    background: var(--surface);
    color: var(--ink);
    font: inherit;
    transition: border-color 0.2s, box-shadow 0.2s;
}

.search-input:focus {
    border-color: #5da4d7;
    box-shadow: 0 0 0 3px rgba(23, 105, 170, 0.12);
}

.search-icon {
    position: absolute;
    top: 50%;
    left: 15px;
    color: var(--muted);
    font-size: 17px;
    transform: translateY(-50%);
    pointer-events: none;
}

.filter-button {
    min-height: 44px;
    padding: 0 16px;
    border: 1px solid var(--line);
    border-radius: 10px;
    background: var(--surface);
    color: #35516a;
    font: inherit;
    font-size: 14px;
    font-weight: 700;
    cursor: pointer;
    transition: color 0.2s, background 0.2s, border-color 0.2s;
}

.filter-button:hover,
.filter-button[aria-pressed="true"] {
    border-color: var(--navy);
    background: var(--navy);
    color: #fff;
}

.filter-button:focus-visible,
.favorite-button:focus-visible,
.btn a:focus-visible,
.btn button:focus-visible {
    outline: 3px solid rgba(23, 105, 170, 0.35);
    outline-offset: 2px;
}

.favorite-count {
    display: inline-flex;
    min-width: 20px;
    height: 20px;
    align-items: center;
    justify-content: center;
    margin-left: 5px;
    border-radius: 99px;
    background: rgba(23, 105, 170, 0.12);
    color: inherit;
    font-size: 12px;
}

.cards-area {
    min-height: 140px;
    margin-top: 0;
    padding: 0;
    overflow: visible;
    border-radius: 0;
}

.cards-bg {
    display: none;
}

.grid {
    position: relative;
    z-index: 1;
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(225px, 1fr));
    gap: 16px;
    margin: 0;
}

.card {
    display: flex;
    width: auto;
    min-width: 0;
    flex-direction: column;
    align-items: center;
    box-sizing: border-box;
    margin: 0;
    padding: 22px 18px 18px;
    border: 1px solid var(--line);
    border-radius: 15px;
    background: var(--surface);
    box-shadow: 0 5px 16px rgba(22, 53, 78, 0.05);
    text-align: center;
    transition: transform 0.2s ease, box-shadow 0.2s ease, border-color 0.2s ease;
}

.card:hover {
    transform: translateY(-3px);
    border-color: #c5d8e7;
    box-shadow: 0 12px 26px rgba(22, 53, 78, 0.11);
}

.card[hidden] {
    display: none !important;
}

.card img {
    width: 54px;
    height: 54px;
    margin-bottom: 12px;
    object-fit: contain;
    border-radius: 12px;
}

.card h3 {
    min-height: 40px;
    margin: 4px 0 12px;
    overflow-wrap: anywhere;
    font-size: 15px;
    line-height: 1.4;
}

.btn {
    display: flex;
    width: 100%;
    align-items: center;
    justify-content: center;
    gap: 8px;
    margin-top: auto;
}

.btn a,
.btn button {
    display: inline-flex;
    min-height: 38px;
    align-items: center;
    justify-content: center;
    box-sizing: border-box;
    margin: 0;
    padding: 0 13px;
    border-radius: 8px;
    font: inherit;
    font-size: 13px;
    font-weight: 700;
    transition: background 0.2s, color 0.2s, border-color 0.2s;
}

.btn .open {
    flex: 1;
    background: var(--navy);
    color: white;
}

.btn .open:hover {
    background: var(--blue);
}

.btn .copy {
    border: 1px solid var(--line);
    background: #f7f9fb;
    color: #35516a;
}

.btn .copy:hover {
    background: #e9f1f7;
}

.btn .favorite-button {
    width: 40px;
    padding: 0;
    border: 1px solid var(--line);
    background: white;
    color: #667b8c;
    font-size: 20px;
}

.btn .favorite-button[aria-pressed="true"] {
    border-color: #f4d284;
    background: #fff8e6;
    color: #d39200;
}

.empty-state {
    padding: 42px 20px;
    border: 1px dashed #c9d7e3;
    border-radius: 14px;
    background: rgba(255, 255, 255, 0.7);
    color: var(--muted);
    text-align: center;
}

.empty-state strong {
    display: block;
    margin-bottom: 6px;
    color: var(--ink);
}

.user-paths-section {
    margin-top: 48px;
    padding-top: 30px;
    border-top: 1px solid var(--line);
}

.user-path-form {
    display: grid;
    grid-template-columns: minmax(180px, 0.8fr) minmax(240px, 1.4fr) auto;
    gap: 12px;
    margin: 20px 0;
    padding: 18px;
    border: 1px solid var(--line);
    border-radius: 14px;
    background: var(--surface);
    box-shadow: 0 5px 16px rgba(22, 53, 78, 0.04);
}

.user-path-field {
    display: flex;
    min-width: 0;
    flex-direction: column;
    gap: 7px;
}

.user-path-field label {
    color: #35516a;
    font-size: 13px;
    font-weight: 700;
}

.user-path-input {
    width: 100%;
    min-height: 42px;
    box-sizing: border-box;
    padding: 0 12px;
    border: 1px solid var(--line);
    border-radius: 9px;
    outline: none;
    background: #fff;
    color: var(--ink);
    font: inherit;
    font-size: 14px;
}

.user-path-input:focus {
    border-color: #5da4d7;
    box-shadow: 0 0 0 3px rgba(23, 105, 170, 0.12);
}

.user-path-submit {
    align-self: end;
    min-height: 42px;
    padding: 0 17px;
    border: 0;
    border-radius: 9px;
    background: var(--navy);
    color: #fff;
    font: inherit;
    font-size: 14px;
    font-weight: 700;
    cursor: pointer;
}

.user-path-submit:hover {
    background: var(--blue);
}

.user-path-submit:focus-visible,
.user-path-remove:focus-visible {
    outline: 3px solid rgba(23, 105, 170, 0.35);
    outline-offset: 2px;
}

.user-path-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(225px, 1fr));
    gap: 16px;
}

.user-path-card {
    min-width: 0;
    padding: 18px;
    border: 1px solid var(--line);
    border-radius: 14px;
    background: var(--surface);
    box-shadow: 0 5px 16px rgba(22, 53, 78, 0.05);
}

.user-path-card h3 {
    margin: 0 0 7px;
    overflow-wrap: anywhere;
    color: var(--ink);
    font-size: 15px;
}

.user-path-url {
    display: block;
    margin-bottom: 15px;
    overflow-wrap: anywhere;
    color: var(--muted);
    font-size: 12px;
    line-height: 1.5;
    text-decoration: none;
}

.user-path-url:hover {
    color: var(--blue);
    text-decoration: underline;
}

.user-path-actions {
    display: flex;
    gap: 8px;
}

.user-path-actions a,
.user-path-actions button {
    display: inline-flex;
    min-height: 36px;
    align-items: center;
    justify-content: center;
    box-sizing: border-box;
    padding: 0 12px;
    border: 1px solid var(--line);
    border-radius: 8px;
    background: #f7f9fb;
    color: #35516a;
    font: inherit;
    font-size: 13px;
    font-weight: 700;
    text-decoration: none;
    cursor: pointer;
}

.user-path-actions .user-path-open {
    flex: 1;
    border-color: var(--navy);
    background: var(--navy);
    color: #fff;
}

.user-path-actions .user-path-open:hover {
    border-color: var(--blue);
    background: var(--blue);
}

.user-path-actions .user-path-remove:hover {
    border-color: #e6b9b9;
    background: #fff3f3;
    color: #a23333;
}

.status-message {
    position: fixed;
    right: 20px;
    bottom: 20px;
    z-index: 10;
    max-width: min(400px, calc(100% - 40px));
    padding: 12px 16px;
    border-radius: 10px;
    background: var(--navy);
    color: white;
    box-shadow: 0 8px 24px rgba(16, 43, 70, 0.2);
    font-size: 14px;
}

.status-message[hidden] {
    display: none;
}

.footer {
    margin-top: 48px;
    padding: 20px;
    background: var(--navy);
    font-size: 13px;
}

@media (max-width: 600px) {
    .topbar {
        padding: 14px 4%;
    }

    .topbar h2 {
        font-size: 16px;
    }

    .slider {
        width: 92%;
        height: 260px;
        margin-top: 18px;
        border-radius: 14px;
    }

    .overlay {
        bottom: 14px;
        left: 14px;
        max-width: calc(100% - 28px);
        padding: 13px 15px;
    }

    .date-card {
        padding: 16px;
    }

    .time {
        font-size: 21px;
    }

    .section-heading {
        align-items: flex-start;
    }

    .section-title {
        font-size: 22px;
    }

    .grid {
        grid-template-columns: repeat(auto-fill, minmax(155px, 1fr));
        gap: 12px;
    }

    .user-path-form {
        grid-template-columns: 1fr;
        padding: 14px;
    }

    .user-path-submit {
        width: 100%;
    }

    .card {
        padding: 17px 12px 14px;
    }
}
</style>
</head>

<body>

<!-- TOP BAR -->
<div class="topbar">
    <h2>🏦 AziziBank Applications Portal</h2>
</div>

<!-- SLIDER -->
@php $sliderCount = $sliders->count() ?: 3; @endphp
<div class="slider">
    <div class="slides" id="slides">

        @forelse($sliders as $slider)
            <div class="slide">
                <img src="{{ $slider->pic ? asset('uploads/sliders/'.$slider->pic) : asset('sig.jpg') }}" alt="{{ $slider->title }}">
                <div class="overlay">
                    <h2>{{ $slider->title }}</h2>
                    <p>Access your banking applications quickly and securely.</p>
                </div>
            </div>
        @empty
            <div class="slide">
                <img src="sig.jpg">
                <div class="overlay">
                    <h2>Welcome to Portal</h2>
                    <p>Access all internal systems in one place.</p>
                </div>
            </div>

            <div class="slide">
                <img src="ss.png">
                <div class="overlay">
                    <h2>Secure Banking System</h2>
                    <p>Reliable and protected environment.</p>
                </div>
            </div>

            <div class="slide">
                <img src="sig.jpg">
                <div class="overlay">
                    <h2>Fast Access</h2>
                    <p>Quick access to all applications.</p>
                </div>
            </div>
        @endforelse

    </div>
</div>

<div class="container">

    <!-- DATE CARD -->
    <div class="date-card">
        <div>
            <div id="fullDate"></div>
            <div id="dayName"></div>
        </div>
        <div class="time" id="time"></div>
    </div>

    <div class="portal-tabs" id="portalTabList" role="tablist" aria-label="Portal sections">
        <button class="portal-tab" id="applicationsTab" type="button" role="tab" aria-selected="true" aria-controls="applicationsPanel" tabindex="0">Applications</button>
        <button class="portal-tab" id="formsTab" type="button" role="tab" aria-selected="false" aria-controls="formsPanel" tabindex="-1">Forms</button>
    </div>

    <section class="portal-panel" id="applicationsPanel" role="tabpanel" aria-labelledby="applicationsTab">
    <div class="section-heading">
        <div>
            <h1 class="section-title">Your applications</h1>
            <p class="section-description">Open your work tools quickly, or save the ones you use most. Search and favorites apply to the current page.</p>
        </div>
    </div>

    <div class="application-tools">
        <label class="search-wrap">
            <span class="search-icon" aria-hidden="true">⌕</span>
            <input class="search-input" id="applicationSearch" type="search" placeholder="Search applications..." aria-label="Search applications">
        </label>
        <button class="filter-button" type="button" data-filter="all" aria-pressed="true">All applications</button>
        <button class="filter-button" type="button" data-filter="favorites" aria-pressed="false">
            Favorites <span class="favorite-count" id="favoriteCount">0</span>
        </button>
    </div>

<div class="cards-area">
    <div class="cards-bg" style="background-image: url('{{ asset('assets/images/it-bg.jpg') }}');"></div>

    <div class="grid" id="applicationGrid">
    @foreach ($link as $links)

        <div class="card" data-application-card data-path="{{ $links->path }}" data-name="{{ $links->name }}">
            <img src="{{ asset('uploads/icons/'.$links->icon) }}" alt="" loading="lazy">

            <h3>{{ $links->name }}</h3>

            <div class="btn">
                <a class="open" href="{{ $links->path }}" target="_blank" rel="noopener noreferrer">
                    Open
                </a>

                <button class="copy" type="button" data-copy-path="{{ $links->path }}">
                    Copy
                </button>
                <button class="favorite-button" type="button" aria-label="Add {{ $links->name }} to favorites" aria-pressed="false" title="Add to favorites">☆</button>
            </div>
        </div>

    @endforeach
    </div>
    <div class="empty-state" id="emptyState" hidden>
        <strong id="emptyTitle">No applications found</strong>
        <span id="emptyDescription">Try another search.</span>
    </div>

    @if ($link->hasPages())
        <div class="pagination-wrapper" aria-label="Application pages">
            {{ $link->links() }}
        </div>
    @endif

</div>
    <section class="user-paths-section" aria-labelledby="userPathsTitle">
        <div class="section-heading">
            <div>
                <h2 class="section-title" id="userPathsTitle">User paths</h2>
                <p class="section-description">Save useful links from the web in this browser. These links are not sent to the database.</p>
            </div>
        </div>

        <form class="user-path-form" id="userPathForm">
            <div class="user-path-field">
                <label for="userPathName">Link name</label>
                <input class="user-path-input" id="userPathName" name="name" type="text" maxlength="80" placeholder="For example, Google" required>
            </div>
            <div class="user-path-field">
                <label for="userPathUrl">Web address</label>
                <input class="user-path-input" id="userPathUrl" name="url" type="text" maxlength="2048" placeholder="https://www.google.com" inputmode="url" autocomplete="url" required>
            </div>
            <button class="user-path-submit" type="submit">Add path</button>
        </form>

        <div class="user-path-grid" id="userPathGrid"></div>
        <div class="empty-state" id="userPathEmpty">
            <strong>No user paths saved</strong>
            <span>Add a name and web address above to keep a link here.</span>
        </div>
    </section>
    </section>

    <section class="portal-panel" id="formsPanel" role="tabpanel" aria-labelledby="formsTab" hidden>
        <div class="section-heading">
            <div>
                <h1 class="section-title">Downloadable forms</h1>
                <p class="section-description">Download the forms you need.</p>
            </div>
        </div>

        <div class="form-category-tabs" role="tablist" aria-label="Form categories">
            @foreach ($formCategories as $category => $categoryLabel)
                <button
                    class="form-category-tab"
                    id="{{ $category }}FormsTab"
                    type="button"
                    role="tab"
                    data-form-tab
                    data-category="{{ $category }}"
                    aria-selected="{{ $activeFormCategory === $category ? 'true' : 'false' }}"
                    aria-controls="{{ $category }}FormsPanel"
                    tabindex="{{ $activeFormCategory === $category ? '0' : '-1' }}"
                >
                    {{ $categoryLabel }}
                    <span class="category-count">{{ $forms[$category]->total() }}</span>
                </button>
            @endforeach
        </div>

        @foreach ($formCategories as $category => $categoryLabel)
            <section
                class="form-category-panel"
                id="{{ $category }}FormsPanel"
                role="tabpanel"
                aria-labelledby="{{ $category }}FormsTab"
                @if ($activeFormCategory !== $category) hidden @endif
            >
                @if ($forms[$category]->isNotEmpty())
                    <div class="grid">
                        @foreach ($forms[$category] as $form)
                            <article class="card">
                                <div aria-hidden="true" style="font-size: 42px; margin-bottom: 12px;">📄</div>
                                <h3>{{ $form['name'] }}</h3>
                                <p class="form-file-type">{{ $form['extension'] }} document</p>
                                <div class="btn">
                                    <a class="open" href="{{ $form['url'] }}" download>Download</a>
                                </div>
                            </article>
                        @endforeach
                    </div>
                    @if ($forms[$category]->hasPages())
                        <div class="pagination-wrapper" aria-label="{{ $categoryLabel }} pages">
                            {{ $forms[$category]->appends(['formCategory' => $category])->links() }}
                        </div>
                    @endif
                @else
                    <div class="empty-state">
                        <strong>No {{ strtolower($categoryLabel) }} available yet</strong>
                        <span>Forms added to this category will appear here.</span>
                    </div>
                @endif
            </section>
        @endforeach
    </section>

    </div>

</div>

<div class="footer">
    © 2026 AziziBank Internal Portal | All Rights Reserved By  Mirajan Najmezada
</div>
<div class="status-message" id="statusMessage" role="status" aria-live="polite" hidden></div>

<script>
// SAFE SLIDER (works in all browsers)
var index = 0;
var slideElements = document.querySelectorAll('.slide');
var slideCount = slideElements.length || {{ $sliderCount }};

function showSlide(i) {
    for (var j = 0; j < slideElements.length; j++) {
        var slide = slideElements[j];
        if (j === i) {
            slide.classList.add('active');
        } else {
            slide.classList.remove('active');
        }
    }
}

window.addEventListener('load', function() {
    showSlide(index);
});

setInterval(function () {
    index = (index + 1) % slideCount;
    showSlide(index);
}, 5000);

// DATE & TIME
function getWeekdayName(date) {
    var weekdays = [
        'Sunday', 'Monday', 'Tuesday', 'Wednesday',
        'Thursday', 'Friday', 'Saturday'
    ];
    return weekdays[date.getDay()];
}

function updateTime() {
    var now = new Date();

    document.getElementById("time").innerHTML =
        now.toLocaleTimeString();

    document.getElementById("fullDate").innerHTML =
        now.toLocaleDateString();

    var dayName = document.getElementById("dayName");
    if (typeof now.toLocaleDateString === 'function') {
        try {
            dayName.innerHTML = now.toLocaleDateString('en-US', { weekday: 'long' });
        } catch (e) {
            dayName.innerHTML = getWeekdayName(now);
        }
    } else {
        dayName.innerHTML = getWeekdayName(now);
    }
}

setInterval(updateTime, 1000);
updateTime();

var favoriteStorageKey = 'azizibank.favoritePaths';
var userPathsStorageKey = 'azizibank.userPaths';
var favoritePaths = new Set();
var userPaths = [];
var activeFilter = 'all';
var statusTimeout;

function showStatus(message) {
    var statusMessage = document.getElementById('statusMessage');
    statusMessage.textContent = message;
    statusMessage.hidden = false;
    window.clearTimeout(statusTimeout);
    statusTimeout = window.setTimeout(function() {
        statusMessage.hidden = true;
    }, 3500);
}

function loadFavorites() {
    try {
        var storedValue = window.localStorage.getItem(favoriteStorageKey);
        if (!storedValue) {
            return [];
        }

        var parsedValue = JSON.parse(storedValue);
        if (!Array.isArray(parsedValue) || !parsedValue.every(function(path) {
            return typeof path === 'string';
        })) {
            throw new Error('Stored favorites must be an array of paths.');
        }
        return parsedValue;
    } catch (error) {
        console.error('Unable to load saved application favorites.', error);
        showStatus('Favorites could not be loaded from this browser.');
        return [];
    }
}

function saveFavorites() {
    try {
        window.localStorage.setItem(favoriteStorageKey, JSON.stringify(Array.from(favoritePaths)));
        return true;
    } catch (error) {
        console.error('Unable to save application favorites.', error);
        showStatus('Favorites could not be saved. Check your browser storage settings.');
        return false;
    }
}

function normalizeWebAddress(value) {
    var address = value.trim();
    if (!/^[a-zA-Z][a-zA-Z\d+.-]*:/.test(address)) {
        address = 'https://' + address;
    }

    var parsedAddress = new URL(address);
    if (parsedAddress.protocol !== 'http:' && parsedAddress.protocol !== 'https:') {
        throw new Error('Only http and https links can be saved.');
    }
    return parsedAddress.href;
}

function loadUserPaths() {
    try {
        var storedValue = window.localStorage.getItem(userPathsStorageKey);
        if (!storedValue) {
            return [];
        }

        var parsedValue = JSON.parse(storedValue);
        if (!Array.isArray(parsedValue) || !parsedValue.every(function(path) {
            return path && typeof path.name === 'string' && typeof path.url === 'string'
                && normalizeWebAddress(path.url) === path.url;
        })) {
            throw new Error('Stored user paths have an invalid format.');
        }
        return parsedValue;
    } catch (error) {
        console.error('Unable to load saved user paths.', error);
        showStatus('User paths could not be loaded from this browser.');
        return [];
    }
}

function saveUserPaths() {
    try {
        window.localStorage.setItem(userPathsStorageKey, JSON.stringify(userPaths));
        return true;
    } catch (error) {
        console.error('Unable to save user paths.', error);
        showStatus('User paths could not be saved. Check your browser storage settings.');
        return false;
    }
}

function renderUserPaths() {
    var grid = document.getElementById('userPathGrid');
    grid.textContent = '';

    userPaths.forEach(function(userPath) {
        var card = document.createElement('article');
        card.className = 'user-path-card';

        var name = document.createElement('h3');
        name.textContent = userPath.name;

        var address = document.createElement('a');
        address.className = 'user-path-url';
        address.href = userPath.url;
        address.target = '_blank';
        address.rel = 'noopener noreferrer';
        address.textContent = userPath.url;

        var actions = document.createElement('div');
        actions.className = 'user-path-actions';

        var openLink = document.createElement('a');
        openLink.className = 'user-path-open';
        openLink.href = userPath.url;
        openLink.target = '_blank';
        openLink.rel = 'noopener noreferrer';
        openLink.textContent = 'Open';

        var copyButton = document.createElement('button');
        copyButton.type = 'button';
        copyButton.textContent = 'Copy';
        copyButton.addEventListener('click', function() {
            copyLink(userPath.url);
        });

        var removeButton = document.createElement('button');
        removeButton.className = 'user-path-remove';
        removeButton.type = 'button';
        removeButton.textContent = 'Remove';
        removeButton.setAttribute('aria-label', 'Remove ' + userPath.name);
        removeButton.addEventListener('click', function() {
            var previousPaths = userPaths;
            userPaths = userPaths.filter(function(path) {
                return path.url !== userPath.url;
            });
            if (!saveUserPaths()) {
                userPaths = previousPaths;
            }
            renderUserPaths();
        });

        actions.appendChild(openLink);
        actions.appendChild(copyButton);
        actions.appendChild(removeButton);
        card.appendChild(name);
        card.appendChild(address);
        card.appendChild(actions);
        grid.appendChild(card);
    });

    document.getElementById('userPathEmpty').hidden = userPaths.length > 0;
}

function renderApplications() {
    var searchTerm = document.getElementById('applicationSearch').value.trim().toLowerCase();
    var cards = document.querySelectorAll('[data-application-card]');
    var visibleCount = 0;

    cards.forEach(function(card) {
        var path = card.getAttribute('data-path') || '';
        var name = card.getAttribute('data-name') || '';
        var isFavorite = favoritePaths.has(path);
        var matchesFilter = activeFilter === 'all' || isFavorite;
        var matchesSearch = (name + ' ' + path).toLowerCase().indexOf(searchTerm) !== -1;
        var isVisible = matchesFilter && matchesSearch;
        var favoriteButton = card.querySelector('.favorite-button');

        card.hidden = !isVisible;
        favoriteButton.textContent = isFavorite ? '★' : '☆';
        favoriteButton.setAttribute('aria-pressed', isFavorite ? 'true' : 'false');
        favoriteButton.setAttribute('aria-label', (isFavorite ? 'Remove ' + name + ' from' : 'Add ' + name + ' to') + ' favorites');
        favoriteButton.title = isFavorite ? 'Remove from favorites' : 'Add to favorites';

        if (isVisible) {
            visibleCount++;
        }
    });

    document.getElementById('favoriteCount').textContent = favoritePaths.size;
    var emptyState = document.getElementById('emptyState');
    emptyState.hidden = visibleCount > 0;
    document.getElementById('emptyTitle').textContent =
        activeFilter === 'favorites' && favoritePaths.size === 0 ? 'No favorites yet' : 'No applications found';
    document.getElementById('emptyDescription').textContent =
        activeFilter === 'favorites' && favoritePaths.size === 0
            ? 'Select the star on any application to save it here.'
            : 'Try another search or switch to all applications.';
}

favoritePaths = new Set(loadFavorites());
userPaths = loadUserPaths();
renderApplications();
renderUserPaths();

document.getElementById('userPathForm').addEventListener('submit', function(event) {
    event.preventDefault();

    var nameInput = document.getElementById('userPathName');
    var urlInput = document.getElementById('userPathUrl');
    var name = nameInput.value.trim();
    var url;

    try {
        url = normalizeWebAddress(urlInput.value);
    } catch (error) {
        showStatus('Enter a valid http or https web address.');
        urlInput.focus();
        return;
    }

    if (!name) {
        nameInput.focus();
        return;
    }
    if (userPaths.some(function(path) { return path.url === url; })) {
        showStatus('This web address is already in your user paths.');
        return;
    }

    userPaths.push({ name: name, url: url });
    if (!saveUserPaths()) {
        userPaths.pop();
        return;
    }

    event.currentTarget.reset();
    renderUserPaths();
    showStatus('User path saved in this browser.');
});

document.getElementById('applicationSearch').addEventListener('input', renderApplications);

document.querySelectorAll('[data-filter]').forEach(function(button) {
    button.addEventListener('click', function() {
        activeFilter = button.getAttribute('data-filter');
        document.querySelectorAll('[data-filter]').forEach(function(filterButton) {
            filterButton.setAttribute('aria-pressed', filterButton === button ? 'true' : 'false');
        });
        renderApplications();
    });
});

var portalTabs = document.querySelectorAll('#portalTabList [role="tab"][aria-controls]');
portalTabs.forEach(function(tab) {
    tab.addEventListener('click', function() {
        portalTabs.forEach(function(otherTab) {
            var isSelected = otherTab === tab;
            otherTab.setAttribute('aria-selected', isSelected ? 'true' : 'false');
            otherTab.tabIndex = isSelected ? 0 : -1;
            document.getElementById(otherTab.getAttribute('aria-controls')).hidden = !isSelected;
        });
    });
});

var formTabs = document.querySelectorAll('[data-form-tab]');
formTabs.forEach(function(tab) {
    tab.addEventListener('click', function() {
        formTabs.forEach(function(otherTab) {
            var isSelected = otherTab === tab;
            otherTab.setAttribute('aria-selected', isSelected ? 'true' : 'false');
            otherTab.tabIndex = isSelected ? 0 : -1;
            document.getElementById(otherTab.getAttribute('aria-controls')).hidden = !isSelected;
        });

        var currentUrl = new URL(window.location.href);
        currentUrl.searchParams.set('formCategory', tab.getAttribute('data-category'));
        window.history.replaceState(null, '', currentUrl);
    });

    tab.addEventListener('keydown', function(event) {
        var currentIndex = Array.prototype.indexOf.call(formTabs, tab);
        var nextIndex = currentIndex;

        if (event.key === 'ArrowRight') {
            nextIndex = (currentIndex + 1) % formTabs.length;
        } else if (event.key === 'ArrowLeft') {
            nextIndex = (currentIndex - 1 + formTabs.length) % formTabs.length;
        } else if (event.key === 'Home') {
            nextIndex = 0;
        } else if (event.key === 'End') {
            nextIndex = formTabs.length - 1;
        } else {
            return;
        }

        event.preventDefault();
        formTabs[nextIndex].focus();
        formTabs[nextIndex].click();
    });
});

document.getElementById('applicationGrid').addEventListener('click', function(event) {
    var target = event.target;
    if (!target || !target.matches) {
        return;
    }

    var favoriteButton = target.closest('.favorite-button');
    if (favoriteButton) {
        var card = favoriteButton.closest('[data-application-card]');
        var path = card.getAttribute('data-path') || '';
        var wasFavorite = favoritePaths.has(path);

        if (wasFavorite) {
            favoritePaths.delete(path);
        } else {
            favoritePaths.add(path);
        }

        if (!saveFavorites()) {
            if (wasFavorite) {
                favoritePaths.add(path);
            } else {
                favoritePaths.delete(path);
            }
        }
        renderApplications();
        return;
    }

    var copyButton = target.closest('[data-copy-path]');
    if (copyButton) {
        copyLink(copyButton.getAttribute('data-copy-path'));
    }
});

window.addEventListener('storage', function(event) {
    if (event.key === favoriteStorageKey) {
        favoritePaths = new Set(loadFavorites());
        renderApplications();
    }
    if (event.key === userPathsStorageKey) {
        userPaths = loadUserPaths();
        renderUserPaths();
    }
});

// SAFE COPY (fallback for old browsers)
function copyLink(url) {
    if (navigator.clipboard && window.isSecureContext) {
        navigator.clipboard.writeText(url).then(function() {
            showStatus('Link copied to clipboard.');
        }).catch(function(error) {
            console.error('Unable to copy application link.', error);
            showStatus('Could not copy this link.');
        });
    } else {
        var textArea = document.createElement("textarea");
        textArea.value = url;
        document.body.appendChild(textArea);
        textArea.select();
        try {
            if (document.execCommand("copy")) {
                showStatus('Link copied to clipboard.');
            } else {
                showStatus('Could not copy this link.');
            }
        } catch (err) {
            console.error('Unable to copy application link.', err);
            showStatus('Could not copy this link.');
        }
        document.body.removeChild(textArea);
    }
}
</script>

</body>
</html>