@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif
@if(session('error'))
    <div class="alert alert-danger">{{ session('error') }}</div>
@endif

<form method="POST" action="{{ route('admin.survey.assign.store') }}">
    @csrf
    <label>Survey:</label>
    <select name="survey_id">
        @foreach($surveys as $survey)
            <option value="{{ $survey->id }}">{{ $survey->title }}</option>
        @endforeach
    </select>

    <label>User:</label>
    <select name="user_id">
        @foreach($users as $user)
            <option value="{{ $user->id }}">{{ $user->name }}</option>
        @endforeach
    </select>

    <button type="submit">Assign</button>
</form>

<hr>

<h3>Assigned Surveys</h3>
@foreach($surveys as $survey)
    <h4>{{ $survey->title }}</h4>
    <ul>
        @foreach($survey->assignedSurveys as $assignedSurvey)
            <li>
                {{ $assignedSurvey->user->name }}
            </li>
        @endforeach
    </ul>
@endforeach
