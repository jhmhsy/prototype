@if(isset($ticket))
<div class="rounded-lg  bg-white dark:bg-peak_2 text-card-foreground shadow-sm w-full max-w-md" data-v0-t="card">
    <div class="flex flex-col space-y-1.5 p-6">
        <h3 class="whitespace-nowrap text-2xl font-semibold dark:text-white">Order #.023</h3>
        <p class="text-sm dark:text-basegray">service</p>
    </div>
    <div class="p-6 space-y-4">
        <div class="grid flex-col gap-4">
            <div class="grid grid-cols-2 grap-4">
                <div class="space-y-2">
                    <label class="text-sm font-medium dark:text-basegray " for="name">
                        Name
                    </label>
                    <div class="dark:text-white">{{ $ticket->name }}</div>
                </div>
                <div class="space-y-2">
                    <label class="text-sm font-medium dark:text-basegray " for="email">
                        Email
                    </label>
                    <div class="dark:text-white">{{ $ticket->email }}</div>
                </div>
            </div>
            <div class="space-y-2">
                <label class="text-sm font-medium dark:text-basegray " for="quantity">
                    Quantity
                </label>
                <div class="dark:text-white">{{ $ticket->quantity }}</div>
            </div>
            <div class="grid grid-cols-2 justify-between">
                <div class="space-y-2">
                    <label class="text-sm font-medium dark:text-basegray " for="Status">
                        Status
                    </label>
                    <div class="dark:text-white">{{ $ticket->status }}</div>
                </div>
                @if($ticket->status !== 'claimed')
                <form action="{{ route('ticket.claim') }}" method="POST">
                    @csrf
                    <input type="hidden" name="ticket_id" value="{{ $ticket->id }}">
                    <button type="submit"
                        class="inline-flex items-center text-sm font-medium hover:text-white hover:bg-green-700   bg-green-500  text-white h-11 rounded-md px-8 ">
                        CLAIMED
                    </button>
                </form>
                @else
                <p class="font-bold text-red-600">This ticket has already been claimed.</p>
                @endif

            </div>

        </div>

    </div>
</div>
@endif