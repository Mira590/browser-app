@extends('admin.master')

@section('content')
<style>
    .portal-dashboard {
        --dashboard-ink: #172b3d;
        --dashboard-muted: #748597;
        --dashboard-line: #e6edf3;
        padding: 8px 4px 28px;
        color: var(--dashboard-ink);
    }

    .dashboard-welcome {
        position: relative;
        display: flex;
        min-height: 190px;
        align-items: center;
        justify-content: space-between;
        gap: 24px;
        overflow: hidden;
        margin-bottom: 24px;
        padding: 30px clamp(22px, 4vw, 42px);
        border-radius: 20px;
        background:
            radial-gradient(circle at 84% 20%, rgba(74, 167, 212, 0.3), transparent 25%),
            linear-gradient(115deg, #102b46 0%, #17486d 64%, #1c6b91 100%);
        color: #fff;
        box-shadow: 0 14px 32px rgba(16, 43, 70, 0.14);
    }

    .dashboard-welcome::after {
        position: absolute;
        right: 12%;
        bottom: -132px;
        width: 270px;
        height: 270px;
        border: 1px solid rgba(255, 255, 255, 0.12);
        border-radius: 50%;
        content: "";
        pointer-events: none;
    }

    .dashboard-welcome-copy,
    .dashboard-welcome-meta {
        position: relative;
        z-index: 1;
    }

    .dashboard-eyebrow {
        margin-bottom: 11px;
        color: #a9e3f2;
        font-size: 11px;
        font-weight: 800;
        letter-spacing: 1.5px;
        text-transform: uppercase;
    }

    .dashboard-welcome h1 {
        margin: 0;
        color: #fff;
        font-size: clamp(25px, 3vw, 36px);
        font-weight: 750;
        letter-spacing: -0.8px;
    }

    .dashboard-welcome p {
        max-width: 560px;
        margin: 10px 0 0;
        color: rgba(240, 248, 255, 0.76);
        font-size: 14px;
        line-height: 1.6;
    }

    .dashboard-welcome-meta {
        display: flex;
        min-width: 155px;
        align-items: center;
        gap: 12px;
        padding: 13px 15px;
        border: 1px solid rgba(255, 255, 255, 0.16);
        border-radius: 13px;
        background: rgba(255, 255, 255, 0.09);
        color: #fff;
        backdrop-filter: blur(8px);
    }

    .dashboard-welcome-meta i {
        font-size: 22px;
        color: #9de0ef;
    }

    .dashboard-welcome-meta span {
        display: block;
        color: rgba(240, 248, 255, 0.68);
        font-size: 10px;
    }

    .dashboard-welcome-meta strong {
        display: block;
        margin-top: 3px;
        font-size: 12px;
    }

    .dashboard-section-heading {
        display: flex;
        align-items: flex-end;
        justify-content: space-between;
        gap: 16px;
        margin: 26px 0 14px;
    }

    .dashboard-section-heading h2 {
        margin: 0;
        color: var(--dashboard-ink);
        font-size: 17px;
        font-weight: 750;
    }

    .dashboard-section-heading p {
        margin: 5px 0 0;
        color: var(--dashboard-muted);
        font-size: 12px;
    }

    .dashboard-stat-card {
        display: flex;
        min-height: 135px;
        align-items: flex-start;
        justify-content: space-between;
        gap: 14px;
        padding: 20px;
        border: 1px solid var(--dashboard-line);
        border-radius: 15px;
        background: #fff;
        box-shadow: 0 5px 16px rgba(21, 48, 70, 0.035);
        text-decoration: none !important;
        transition: transform 0.18s ease, box-shadow 0.18s ease, border-color 0.18s ease;
    }

    .dashboard-stat-card:hover {
        transform: translateY(-3px);
        border-color: #cbdbe8;
        box-shadow: 0 12px 24px rgba(21, 48, 70, 0.09);
    }

    .dashboard-stat-label {
        color: #52677a;
        font-size: 12px;
        font-weight: 700;
    }

    .dashboard-stat-value {
        margin-top: 10px;
        color: var(--dashboard-ink);
        font-size: 30px;
        font-weight: 800;
        letter-spacing: -1px;
        line-height: 1;
    }

    .dashboard-stat-description {
        margin-top: 8px;
        color: #8a99a8;
        font-size: 11px;
    }

    .dashboard-stat-icon {
        display: inline-flex;
        width: 44px;
        height: 44px;
        flex: 0 0 auto;
        align-items: center;
        justify-content: center;
        border-radius: 13px;
        font-size: 20px;
    }

    .dashboard-stat-icon.blue { background: #edf5fd; color: #2672b4; }
    .dashboard-stat-icon.green { background: #eaf8f1; color: #23845a; }
    .dashboard-stat-icon.orange { background: #fff4e8; color: #c87b20; }
    .dashboard-stat-icon.purple { background: #f3efff; color: #7354bd; }

    .dashboard-content-card {
        height: 100%;
        border: 1px solid var(--dashboard-line);
        border-radius: 15px;
        background: #fff;
        box-shadow: 0 5px 16px rgba(21, 48, 70, 0.035);
    }

    .dashboard-content-card-header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 12px;
        padding: 18px 20px;
        border-bottom: 1px solid #edf1f5;
    }

    .dashboard-content-card-header h3 {
        margin: 0;
        color: var(--dashboard-ink);
        font-size: 14px;
        font-weight: 750;
    }

    .dashboard-content-card-header a {
        color: #2672b4;
        font-size: 11px;
        font-weight: 700;
        text-decoration: none;
    }

    .dashboard-list {
        margin: 0;
        padding: 4px 20px;
        list-style: none;
    }

    .dashboard-list-item {
        display: flex;
        align-items: center;
        gap: 12px;
        padding: 13px 0;
    }

    .dashboard-list-item + .dashboard-list-item {
        border-top: 1px solid #f0f3f6;
    }

    .dashboard-list-icon {
        display: inline-flex;
        width: 36px;
        height: 36px;
        flex: 0 0 auto;
        align-items: center;
        justify-content: center;
        overflow: hidden;
        border-radius: 10px;
        background: #f1f6fa;
        color: #41647f;
        font-size: 16px;
    }

    .dashboard-list-icon img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .dashboard-list-copy {
        min-width: 0;
        flex: 1;
    }

    .dashboard-list-copy strong {
        display: block;
        overflow: hidden;
        color: #294155;
        font-size: 12px;
        font-weight: 700;
        text-overflow: ellipsis;
        white-space: nowrap;
    }

    .dashboard-list-copy span {
        display: block;
        margin-top: 4px;
        color: #91a0ad;
        font-size: 10px;
    }

    .dashboard-empty {
        padding: 30px 18px;
        color: var(--dashboard-muted);
        font-size: 12px;
        text-align: center;
    }

    .dashboard-empty i {
        display: block;
        margin-bottom: 8px;
        color: #9aabba;
        font-size: 24px;
    }

    .dashboard-quick-links {
        display: grid;
        gap: 10px;
        padding: 16px 20px 20px;
    }

    .dashboard-quick-link {
        display: flex;
        min-height: 48px;
        align-items: center;
        gap: 12px;
        padding: 0 13px;
        border: 1px solid #e8eef3;
        border-radius: 11px;
        background: #fff;
        color: #34536c;
        font-size: 12px;
        font-weight: 700;
        text-decoration: none !important;
        transition: border-color 0.18s, background 0.18s, color 0.18s;
    }

    .dashboard-quick-link:hover {
        border-color: #c9dceb;
        background: #f7fbfe;
        color: #1769aa;
    }

    .dashboard-quick-link i {
        width: 20px;
        color: #367dae;
        font-size: 18px;
        text-align: center;
    }

    @media (max-width: 767px) {
        .portal-dashboard {
            padding: 2px 0 22px;
        }

        .dashboard-welcome {
            min-height: auto;
            align-items: flex-start;
            flex-direction: column;
            padding: 25px 22px;
        }

        .dashboard-welcome-meta {
            min-width: 0;
        }

        .dashboard-stat-card {
            min-height: 120px;
            padding: 17px;
        }

        .dashboard-section-heading {
            margin-top: 22px;
        }
    }
</style>

@php
    $displayName = $user->first_name ?: ($user->username ?: 'there');
@endphp

<div class="container-fluid portal-dashboard">
    <section class="dashboard-welcome">
        <div class="dashboard-welcome-copy">
            <div class="dashboard-eyebrow">AziziBank · Internal portal</div>
            <h1>Welcome back, {{ $displayName }}</h1>
            <p>Your workspace at a glance. Access applications, forms, and the tools you use every day.</p>
        </div>
        <div class="dashboard-welcome-meta">
            <i class="bx bx-calendar" aria-hidden="true"></i>
            <div>
                <span>Today</span>
                <strong>{{ now()->format('l, F j, Y') }}</strong>
            </div>
        </div>
    </section>

    <div class="dashboard-section-heading">
        <div>
            <h2>Portal overview</h2>
            <p>A quick summary of the resources available in your workspace.</p>
        </div>
    </div>

    <div class="row g-3">
        @foreach ($stats as $stat)
            <div class="col-12 col-sm-6 col-xxl-3">
                <a class="dashboard-stat-card" href="{{ $stat['url'] }}">
                    <div>
                        <div class="dashboard-stat-label">{{ $stat['label'] }}</div>
                        <div class="dashboard-stat-value">{{ number_format($stat['value']) }}</div>
                        <div class="dashboard-stat-description">{{ $stat['description'] }}</div>
                    </div>
                    <span class="dashboard-stat-icon {{ $stat['tone'] }}">
                        <i class="bx {{ $stat['icon'] }}" aria-hidden="true"></i>
                    </span>
                </a>
            </div>
        @endforeach
    </div>

    <div class="dashboard-section-heading">
        <div>
            <h2>Your workspace</h2>
            <p>Recently added resources and useful shortcuts.</p>
        </div>
        <a class="btn btn-sm btn-outline-primary" href="{{ route('welcome.page') }}">
            <i class="bx bx-globe me-1" aria-hidden="true"></i>Open portal
        </a>
    </div>

    <div class="row g-3">
        <div class="col-12 col-xl-8">
            <div class="row g-3">
                <div class="col-12 col-lg-6">
                    <section class="dashboard-content-card">
                        <header class="dashboard-content-card-header">
                            <h3>Recent applications</h3>
                            @if ($isAdmin)
                                <a href="{{ route('admin.link.list') }}">View all</a>
                            @else
                                <a href="{{ route('welcome.page') }}">Open portal</a>
                            @endif
                        </header>
                        @forelse ($recentLinks as $recentLink)
                            @if ($loop->first)
                                <ul class="dashboard-list">
                            @endif
                            <li class="dashboard-list-item">
                                <span class="dashboard-list-icon">
                                    @if ($recentLink->icon)
                                        <img src="{{ asset('uploads/icons/'.rawurlencode($recentLink->icon)) }}" alt="" loading="lazy">
                                    @else
                                        <i class="bx bx-link-alt" aria-hidden="true"></i>
                                    @endif
                                </span>
                                <span class="dashboard-list-copy">
                                    <strong>{{ $recentLink->name }}</strong>
                                    <span>Portal application</span>
                                </span>
                                <a class="btn btn-sm btn-light" href="{{ $recentLink->path }}" target="_blank" rel="noopener noreferrer" aria-label="Open {{ $recentLink->name }}">
                                    <i class="bx bx-right-arrow-alt" aria-hidden="true"></i>
                                </a>
                            </li>
                            @if ($loop->last)
                                </ul>
                            @endif
                        @empty
                            <div class="dashboard-empty">
                                <i class="bx bx-grid-alt" aria-hidden="true"></i>
                                No applications have been added yet.
                            </div>
                        @endforelse
                    </section>
                </div>

                <div class="col-12 col-lg-6">
                    <section class="dashboard-content-card">
                        <header class="dashboard-content-card-header">
                            <h3>Recently added forms</h3>
                            @if ($isAdmin)
                                <a href="{{ route('admin.forms.index') }}">Manage forms</a>
                            @else
                                <a href="{{ route('welcome.page', ['formsPage' => 1]) }}">Browse forms</a>
                            @endif
                        </header>
                        @forelse ($recentForms as $recentForm)
                            @if ($loop->first)
                                <ul class="dashboard-list">
                            @endif
                            <li class="dashboard-list-item">
                                <span class="dashboard-list-icon"><i class="bx bx-file" aria-hidden="true"></i></span>
                                <span class="dashboard-list-copy">
                                    <strong>{{ $recentForm->title }}</strong>
                                    <span>{{ strtoupper(pathinfo($recentForm->file_path, PATHINFO_EXTENSION)) }} · {{ $recentForm->created_at->format('M j, Y') }}</span>
                                </span>
                                <a class="btn btn-sm btn-light" href="{{ asset('forms/'.rawurlencode($recentForm->file_path)) }}" download aria-label="Download {{ $recentForm->title }}">
                                    <i class="bx bx-download" aria-hidden="true"></i>
                                </a>
                            </li>
                            @if ($loop->last)
                                </ul>
                            @endif
                        @empty
                            <div class="dashboard-empty">
                                <i class="bx bx-file" aria-hidden="true"></i>
                                No forms have been uploaded yet.
                            </div>
                        @endforelse
                    </section>
                </div>
            </div>
        </div>

        <div class="col-12 col-xl-4">
            <section class="dashboard-content-card">
                <header class="dashboard-content-card-header">
                    <h3>Quick actions</h3>
                </header>
                <div class="dashboard-quick-links">
                    <a class="dashboard-quick-link" href="{{ route('welcome.page') }}">
                        <i class="bx bx-globe" aria-hidden="true"></i>
                        <span>Browse applications and forms</span>
                    </a>
                    @if ($isAdmin)
                        <a class="dashboard-quick-link" href="{{ route('admin.link') }}">
                            <i class="bx bx-plus-circle" aria-hidden="true"></i>
                            <span>Add an application</span>
                        </a>
                        <a class="dashboard-quick-link" href="{{ route('admin.forms.index') }}">
                            <i class="bx bx-file" aria-hidden="true"></i>
                            <span>Manage downloadable forms</span>
                        </a>
                        <a class="dashboard-quick-link" href="{{ route('admin.slider') }}">
                            <i class="bx bx-images" aria-hidden="true"></i>
                            <span>Update portal banners</span>
                        </a>
                        <a class="dashboard-quick-link" href="{{ route('admin.allUsers') }}">
                            <i class="bx bx-group" aria-hidden="true"></i>
                            <span>Manage team members</span>
                        </a>
                    @endif
                </div>
            </section>
        </div>
    </div>
</div>
@endsection
