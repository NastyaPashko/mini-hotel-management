<div class="col-md-4">
    <div class="card shadow-sm border-0 rounded-4 dashboard-card text-center p-4">

        <div class="icon-box">
            @include("staff.icons.$icon")
        </div>

        <h5 class="fw-bold mt-3">{{ $title }}</h5>
        <p class="text-muted small">{{ $text }}</p>

        <a href="{{ $link }}" class="btn site-btn-green px-4">{{ $btn }}</a>
    </div>
</div>
