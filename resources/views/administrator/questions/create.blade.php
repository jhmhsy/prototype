<div style="display: none;" x-show="createmodal" class="fixed select-none inset-0 bg-black opacity-25 z-40">
</div>

<div style="display: none;"
    class="modal fixed admin-modal-container top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 z-50 p-4"
    x-show="createmodal" @click.away="createmodal = false" x-transition:enter="transition ease-out duration-300"
    x-transition:enter-start="opacity-0 transform scale-90" x-transition:enter-end="opacity-100 transform scale-100"
    x-transition:leave="transition ease-in duration-100" x-transition:leave-start="opacity-100 transform scale-100"
    x-transition:leave-end="opacity-0 transform scale-90">
    <div
        class="bg-white dark:bg-peak_2  dark:text-white rounded shadow-lg w-full max-w-2xl max-h-[90vh] overflow-y-auto">
        <div class=" mt-50 p-4">
            <div class="flex flex-col space-y-1.5 px-6">

                <p class="text-sm text-muted-foreground">Enter the details of the new equipment.</p>
            </div>

            <div class="p-6 dark:text-white">


                <form action="{{ route('questions.store') }}" method="POST">
                    @csrf

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div class="space-y-2">
                            <label class="text-sm font-medium text-gray-500" for="question">
                                Question
                            </label>
                            <textarea
                                class="dark:bg-peak_1 flex min-h-[80px] w-full rounded-md border dark:border-none  px-3 py-2 text-sm"
                                name="question" id="question" required placeholder="Enter question"></textarea>
                        </div>
                        <div class="space-y-2">
                            <label class="text-sm font-medium text-gray-500" for="answer">
                                Answer
                            </label>
                            <textarea
                                class="dark:bg-peak_1 flex min-h-[80px] w-full rounded-md border dark:border-none  px-3 py-2 text-sm"
                                name="answer" id="answer" required placeholder="Enter answer"></textarea>
                        </div>
                    </div>

                    <div class="space-y-2">
                        <label class="text-sm font-medium text-gray-500" for="extra_answer">
                            Extra Answer
                        </label>
                        <textarea
                            class="dark:bg-peak_1 flex min-h-[80px] w-full rounded-md border dark:border-none  px-3 py-2 text-sm"
                            name="extra_answer" id="extra_answer" placeholder="Enter any additional details"></textarea>
                    </div>

                    <button
                        class="inline-flex items-center justify-center rounded-md text-sm font-medium transition-colors  h-10 px-4 py-2 w-full"
                        type="submit">
                        Save Question
                    </button>
                </form>
            </div>
        </div>
    </div>

</div>