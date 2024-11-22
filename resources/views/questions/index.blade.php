<x-guest-layout>
    <div class="container">
        <h1>All Questions</h1>
        <a href="{{ route('questions.create') }}" class="btn btn-primary">Add New Question</a>
        <table class="table mt-4">
            <thead>
                <tr>
                    <th>Question</th>
                    <th>Answer</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($questions as $question)
                <tr>
                    <td>{{ $question->question }}</td>
                    <td>{{ $question->answer }}</td>
                    <td>
                        <a href="{{ route('questions.edit', $question->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('questions.destroy', $question->id) }}" method="POST"
                            style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-guest-layout>