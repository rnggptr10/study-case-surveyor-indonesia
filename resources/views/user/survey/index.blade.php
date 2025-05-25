<h2>Surveys yang Ditugaskan ke Anda</h2>

@foreach($assignedSurveys as $assignedSurvey)
    <div>
        <strong>{{ $assignedSurvey->survey->title }}</strong> -
        @if ($assignedSurvey->filled_at)
            <a href="{{ route('user.survey.result', $assignedSurvey->id) }}">
                <button type="button">Lihat Hasil</button>
            </a>
        @else
            <a href="{{ route('user.surveys.fill', $assignedSurvey->id) }}">Isi Survey</a>
        @endif
    </div>
@endforeach
