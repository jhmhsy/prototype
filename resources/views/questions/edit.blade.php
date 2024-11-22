<x-guest-layout>
    <div class="container">
        <h1>Edit Question</h1>
        <form action="{{ route('questions.update', $question->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="question">Question</label>
                <textarea name="question" class="form-control" required>{{ $question->question }}</textarea>
            </div>
            <div class="form-group">
                <label for="answer">Answer</label>
                <textarea name="answer" class="form-control" required>{{ $question->answer }}</textarea>
            </div>
            <div class="form-group">
                <label for="extra_answer">Extra Answer</label>
                <textarea name="extra_answer" class="form-control">{{ $question->extra_answer }}</textarea>
            </div>
            <button type="submit" class="btn btn-primary">Update Question</button>
        </form>
    </div>
</x-guest-layout>