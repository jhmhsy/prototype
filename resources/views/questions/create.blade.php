<x-guest-layout>

    <div class="container">
        <h1>Add New Question</h1>
        <form action="{{ route('questions.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="question">Question</label>
                <textarea name="question" class="form-control" required></textarea>
            </div>
            <div class="form-group">
                <label for="answer">Answer</label>
                <textarea name="answer" class="form-control" required></textarea>
            </div>
            <div class="form-group">
                <label for="extra_answer">Extra Answer</label>
                <textarea name="extra_answer" class="form-control"></textarea>
            </div>
            <button type="submit" class="btn btn-success">Save Question</button>
        </form>
    </div>
</x-guest-layout>