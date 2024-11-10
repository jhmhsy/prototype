<x-dash-layout>
    <div class="container mx-auto py-8 px-4 sm:px-6 lg:px-8 text-black dark:dark:text-gray-300 border border-black/40 dark:border-white/40 rounded-lg">
        <h2 class="text-2xl font-bold mb-6 dark:text-white">Create a New Member</h2>

        @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif

        <form action="{{ route('members.store') }}" method="POST" class="space-y-6">
            @csrf
            <input hidden name="form_token" value="{{ session('form_token') }}">

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div class="space-y-2">
                    <label for="name" class="text-sm font-medium leading-none dark:text-gray-300 text-secondary">Name:</label>
                    <input type="text" id="name" name="name" required maxlength="50" class="dark:bg-peak_1 flex h-10 w-full rounded-md border border-input px-3 py-2 text-sm">
                </div>
                <div class="space-y-2">
                    <label for="phone" class="text-sm font-medium leading-none dark:text-gray-300 text-secondary">Phone:</label>
                    <input type="tel" id="phone" name="phone" maxlength="20" class="dark:bg-peak_1 flex h-10 w-full rounded-md border border-input px-3 py-2 text-sm">
                </div>
                <div class="space-y-2">
                    <label for="fb" class="text-sm font-medium leading-none dark:text-gray-300 text-secondary">Facebook (optional):</label>
                    <input type="text" id="fb" name="fb" maxlength="50" class="dark:bg-peak_1 flex h-10 w-full rounded-md border border-input px-3 py-2 text-sm">
                </div>
                <div class="space-y-2">
                    <label for="email" class="text-sm font-medium leading-none dark:text-gray-300 text-secondary">Email:</label>
                    <input type="email" id="email" name="email" maxlength="100" class="dark:bg-peak_1 flex h-10 w-full rounded-md border border-input px-3 py-2 text-sm">
                </div>
                <div class="space-y-2">
                    <label for="membership_type" class="text-sm font-medium leading-none dark:text-gray-300 text-secondary">Membership Type:</label>
                    <select name="membership_type" id="membership_type" class="dark:bg-peak_1 flex h-10 w-full rounded-md border border-input px-3 py-2 text-sm">
                        <option value="Regular">Regular</option>
                        <option value="Student">Student</option>
                    </select>
                </div>
            </div>

            

            <button type="submit" class="bg-peak-4 dark:bg-gray-900 text-primary dark:text- rounded py-2 px-6 font-bold hover:bg-shade_4 dark:hover:bg-shade_7 transition-color duration-300">
                Register
            </button>
        </form>
    </div>
</x-dash-layout>