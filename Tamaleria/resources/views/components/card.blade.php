{{-- resources/views/components/card.blade.php --}}

<div class="card project-card">
    <time class="card-date">{{ now()->format('Y-m-d') }}</time>

    <h3 class="card-title">
        <a href="{{ $link }}">{{ $title }}</a>
    </h3>

    <div class="card-badge {{ $color }}">{{ $badge }}</div>

    <p class="card-text">
        {{ $text }}
    </p>

    <div class="card-progress-box">
        <div class="progress-label">
            <span class="progress-title"></span>
            <data class="progress-data"></data>
        </div>
    </div>

    <a href="{{ $link }}" class="dbutton">Gestionar</a>
</div>
