<x-guest-layout>
    <form action="{{ route(name: 'payment.create') }}">

        <button typ=" submit" class="bg-black px-10 py-6 rounded-sm text-white hover:bg-blue-500 active:bg-blue-700">
            pay</button>
    </form>

    @if(session('amount'))
    <p>Payment of {{ session('amount') }} was successful!</p>
    @endif
</x-guest-layout>