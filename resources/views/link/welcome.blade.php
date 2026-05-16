<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Bank Portal</title>
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
    background: #0b2e4a;
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
    background: #0b2e4a;
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

    <div class="section-title">Available Applications</div>

<div class="cards-area">
    <div class="cards-bg" style="background-image: url('{{ asset('assets/images/it-bg.jpg') }}');"></div>

    <div class="grid">
    @foreach ($link as $links)

        <div class="card">
            <img src="{{ asset('uploads/icons/'.$links->icon) }}">

            <h3>{{ $links->name }}</h3>

            <div class="btn">
                <a class="open" href="{{ $links->path }}" target="_blank">
                    Open
                </a>

                <button class="copy"
                    onclick="copyLink('{{ $links->path }}')">
                    Copy
                </button>
            </div>
        </div>

    @endforeach
    </div>

    <!-- Pagination removed: showing all links -->

</div>
        

       

    </div>

</div>

<div class="footer">
    © 2026 AziziBank Internal Portal | All Rights Reserved By IT Department
</div>

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

// SAFE COPY (fallback for old browsers)
function copyLink(url) {
    if (navigator.clipboard && window.isSecureContext) {
        navigator.clipboard.writeText(url);
        alert("Copied: " + url);
    } else {
        var textArea = document.createElement("textarea");
        textArea.value = url;
        document.body.appendChild(textArea);
        textArea.select();
        try {
            document.execCommand("copy");
            alert("Copied: " + url);
        } catch (err) {
            alert("Copy failed");
        }
        document.body.removeChild(textArea);
    }
}
</script>

</body>
</html>