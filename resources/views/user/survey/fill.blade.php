<!-- resources/views/user/surveys/fill.blade.php -->

<h2>Isi Survey: {{ $assignedSurvey->survey->title }}</h2>

<form method="POST" action="{{ route('user.surveys.submit', $assignedSurvey->id) }}">
    @csrf

    @foreach($questions as $question)
        <div>
            <p><strong>{{ $loop->iteration }}. {{ $question->situation }}</strong></p>
            @foreach($question->options as $option)
                <label>
                    <input type="radio" name="answers[{{ $question->id }}]" value="{{ $option->id }}" required>
                    {{ $option->text }} ({{ $option->style }})
                </label><br>
            @endforeach
        </div>
    @endforeach

    <button type="submit">Kirim</button>
</form>
