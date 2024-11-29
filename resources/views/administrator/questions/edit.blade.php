<div style="display: none;" x-show="Editmodal === {{$question->id}}"
    class="fixed select-none inset-0 bg-black opacity-25 z-40">
</div>


<div style="display: none;"
    class="modal fixed admin-modal-container top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 z-50 p-4"
    x-show="Editmodal === {{$question->id}}" @click.away="Editmodal = null"
    x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 transform scale-90"
    x-transition:enter-end="opacity-100 transform scale-100" x-transition:leave="transition ease-in duration-100"
    x-transition:leave-start="opacity-100 transform scale-100" x-transition:leave-end="opacity-0 transform scale-90">
    <div class="bg-white dark:bg-peak_2 rounded shadow-lg w-full max-w-2xl max-h-[90vh] overflow-y-auto" @click.stop>
        <div class=" mt-50 p-4">
            <div class="flex flex-col space-y-1.5 px-6">
                <h3 class="whitespace-nowrap tracking-tight text-2xl font-bold dark:text-white">Edit Question</h3>
                <p class="text-sm text-gray-500 ">What is this new question? </p>
            </div>
            <div class="p-6 text-black dark:text-white">

                <div class="container">
                    <h1>Edit Question</h1>
                    <form action="{{ route('questions.update', $question->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="space-y-6">
                            <!-- Question Field -->
                            <div class="form-group">
                                <label for="question"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                    Question *
                                </label>
                                <textarea id="question" name="question" placeholder="Enter your question here..." class="w-full min-h-[120px] px-4 py-3 rounded-lg border border-gray-300 
                   focus:ring-2 focus:ring-blue-500 focus:border-blue-500
                   dark:bg-peak_1 dark:border-gray-600 dark:focus:border-blue-400
                   dark:text-gray-100 dark:placeholder-gray-400
                   transition duration-150 ease-in-out" required>{{ $question->question }}</textarea>
                            </div>

                            <!-- Answer Field -->
                            <div class="form-group">
                                <label for="answer"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                    Answer *
                                </label>
                                <textarea id="answer" name="answer" placeholder="Enter the answer here..." class="w-full min-h-[120px] px-4 py-3 rounded-lg border border-gray-300 
                   focus:ring-2 focus:ring-blue-500 focus:border-blue-500
                   dark:bg-peak_1 dark:border-gray-600 dark:focus:border-blue-400
                   dark:text-gray-100 dark:placeholder-gray-400
                   transition duration-150 ease-in-out" required>{{ $question->answer }}</textarea>
                            </div>

                            <!-- Extra Answer Field -->
                            <div class="form-group">
                                <label for="extra_answer"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                    Additional Information *
                                </label>
                                <textarea id="extra_answer" name="extra_answer"
                                    placeholder="Enter any additional information here..." class="w-full min-h-[120px] px-4 py-3 rounded-lg border border-gray-300 
                   focus:ring-2 focus:ring-blue-500 focus:border-blue-500
                   dark:bg-peak_1 dark:border-gray-600 dark:focus:border-blue-400
                   dark:text-gray-100 dark:placeholder-gray-400
                   transition duration-150 ease-in-out">{{ $question->extra_answer }}</textarea>
                            </div>
                            <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded">Update
                                Question</button>
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>