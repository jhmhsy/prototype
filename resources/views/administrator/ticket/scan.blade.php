<x-dash-layout>
    <section class="grid grid-cols-1 gap-5">
        <h1 class="text-4xl pb-5 font-bold dark:text-white">Scan Ticket</h1>

        <form action="{{ route('scan.ticket') }}" method="POST">
            @csrf
            <div class="grid grid-cols-1 gap-4 w-1/2">
                <h1 class="text-red-500 font-bold text-2xl ">Sorry for inconvenience, Scanner is
                    currently Unavailable!
                </h1>
                <p class="text-red-400">Please download the QR code provided and manually scan it at a public scanner.
                    Once scanned, please
                    enter the encrypted text here. Thank you!</p>
                <div>
                    <label class="text-sm font-medium dark:text-white" for="encryption-key">
                        Encryption Key
                    </label>
                    <input
                        class="flex h-10 w-full rounded-md border border-input bg-background px-3 py-2 text-sm ring-offset-background file:border-0 file:bg-transparent file:text-sm file:font-medium placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50"
                        id="encrypted_key" name="encrypted_id" placeholder="Enter encryption key" type="text" />
                </div>
                <button type="submit"
                    class="inline-flex items-center text-sm font-medium hover:text-white hover:bg-black  bg-coolblue text-white h-11 rounded-md px-8 ">
                    Scan
                </button>
            </div>
        </form>


        @if(isset($ticket))

        <div class="rounded-lg border bg-white text-card-foreground shadow-sm w-full max-w-md" data-v0-t="card">
            <div class="flex flex-col space-y-1.5 p-6">
                <h3 class="whitespace-nowrap text-2xl font-semibold leading-none tracking-tight">Order #.023</h3>
                <p class="text-sm text-muted-foreground">service</p>
            </div>
            <div class="p-6 space-y-4">
                <div class="grid flex-col gap-4">
                    <div class="grid grid-cols-2 grap-4">
                        <div class="space-y-2">
                            <label
                                class="text-sm font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70"
                                for="name">
                                Name
                            </label>
                            <div>{{ $ticket->name }}</div>
                        </div>
                        <div class="space-y-2">
                            <label
                                class="text-sm font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70"
                                for="email">
                                Email
                            </label>
                            <div>{{ $ticket->email }}</div>
                        </div>
                    </div>
                    <div class="space-y-2">
                        <label
                            class="text-sm font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70"
                            for="quantity">
                            Quantity
                        </label>
                        <div>{{ $ticket->quantity }}</div>
                    </div>
                    <div class="grid grid-cols-2 justify-between">
                        <div class="space-y-2">
                            <label
                                class="text-sm font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70"
                                for="Status">
                                Status
                            </label>
                            <div>{{ $ticket->status }}</div>
                        </div>
                        @if($ticket->status !== 'claimed')
                        <form action="{{ route('scan.claim') }}" method="POST">
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



        @if(session('error'))
        <p style="color: red;">{{ session('error') }}</p>
        @endif

        @if(session('success'))
        <p style="color: green;">{{ session('success') }}</p>
        @endif



    </section>
</x-dash-layout>