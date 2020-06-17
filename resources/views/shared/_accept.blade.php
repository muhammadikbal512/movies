@can ('accept', $model)
    <a href="#" title="Mark this answer as best answer" class="{{ $model->status }}"
    onclick="event.preventDefault(); document.getElementById('accept-answer-{{ $model->id }}').submit();">
        <i class="fas fa-check fa-2x"></i>
    </a>
    <form id="accept-answer-{{ $model->id }}" action="{{ route('answers.accept', $model->id) }}" method="post" style="display: none;">
        @csrf
    </form>
    @else
@if ($model->is_best)
    <a href="#" title="The question owner accepted this answer as best answer" class="{{ $model->status }}">
    <i class="fas fa-check fa-2x"></i>
</a>
@endif
@endcan