<div class="py-0 sm:py-5 md:py-7 lg:py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

        <div class="p-4 sm:p-8 bg-white dark:bg-peak_2 shadow sm:rounded-lg">
            <div class="max-w-xl">
                @include('profile.partials.update-password-form')
            </div>
        </div>


        @if (auth()->user()->getRoleNames()->first() == 'SuperAdmin')

        <div class="p-4 sm:p-8 bg-white dark:bg-peak_2 shadow sm:rounded-lg">
            <div class="max-w-xl">
                <h1 class="font-bold text-red-600">Account Deletion Not Possible</h1>
            </div>
        </div>
        @else

        <div class="p-4 sm:p-8 bg-white dark:bg-peak_2 shadow sm:rounded-lg">
            <div class="max-w-xl">
                @include('profile.partials.delete-user-form')
            </div>
        </div>
        @endif

    </div>
</div>