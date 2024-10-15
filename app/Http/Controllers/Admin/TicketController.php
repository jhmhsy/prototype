<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Ticket;
use App\Models\PaymentTransaction;
use Illuminate\View\View;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Crypt;
use Endroid\QrCode\QrCode;
use Endroid\QrCode\Writer\PngWriter;
use App\Models\TicketKeyHistory;
use Endroid\QrCode\ErrorCorrectionLevel;

use Illuminate\Http\Exceptions\ThrottleRequestsException;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Cache\RateLimiting\Limit;




class TicketController extends Controller
{
    //--------------------------- public 
    public function show(): View
    {
        return view('components.gymtickets.ticket');
    }

    public function success(): View
    {
        return view('components.gymtickets.success');
    }


    //--------------------------- admin 
    public function index(Request $request)
    {
        $search = $request->input('search');
        $sortBy = $request->get('sortBy', 'created_at');
        $sortDirection = $request->get('sortDirection', 'asc');

        $tickets = Ticket::when($search, fn($query) => $query->where(
            fn($q) =>
            $q->where('name', 'like', "%{$search}%")
                ->orWhere('email', 'like', "%{$search}%")
                ->orWhere('quantity', 'like', "%{$search}%")
                ->orWhere('status', 'like', "%{$search}%")
        ))
            ->orderBy($sortBy, $sortDirection)
            ->paginate(10);

        return view('administrator.ticket.index', compact('tickets', 'sortBy', 'sortDirection', 'search'));
    }

    public function showScanPage()
    {
        return view('administrator.ticket.scan');
    }

    public function transaction(Request $request)
    {
        $search = $request->input('search');
        $sortBy = $request->get('sortBy', 'created_at');
        $sortDirection = $request->get('sortDirection', 'asc');

        $transactions = PaymentTransaction::when($search, fn($query) => $query->where(
            fn($q) =>
            $q->where('name', 'like', "%{$search}%")
                ->orWhere('email', 'like', "%{$search}%")
                ->orWhere('item_name', 'like', "%{$search}%")
                ->orWhere('quantity', 'like', "%{$search}%")
                ->orWhere('currency', 'like', "%{$search}%")
                ->orWhere('amount', 'like', "%{$search}%")
                ->orWhere('status', 'like', "%{$search}%")
        ))
            ->orderBy($sortBy, $sortDirection)
            ->paginate(10);

        return view('administrator.ticket.transaction', compact('transactions', 'sortBy', 'sortDirection', 'search'));
    }

    //OOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOO



    //takes inputs ( name, email, quantity, status "unclaimed as default"), and sets randome secure encryption key. 
    public function store(Request $request)
    {

        $key = 'store-ticket:' . $request->ip(); // Unique key for the user's IP

        // Check if the user has exceeded the limit
        if (RateLimiter::tooManyAttempts($key, 1)) {
            // Provide feedback to the user if they exceed the limit
            return response()->json(['message' => 'Too many requests, please try again later.'], 429);
        }
        // Increment the attempts
        RateLimiter::hit($key, 20);



        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'phone' => 'required|string',
            'currency' => 'required|string',
            'amount' => 'required|numeric',
            'description' => 'required|string',
            'item_name' => 'required|string',
            'quantity' => 'required|integer',
            'payment' => 'required|string',
        ]);



        do {
            // Generate a random string of 30 characters
            $randomletters = Str::random(30);

            // Check if the generated random string already exists in the database
            $exists = TicketKeyHistory::where('random_string', $randomletters)->exists();
        } while ($exists);

        // Save the generated random string in the databse table
        TicketKeyHistory::create(['random_string' => $randomletters]);


        //encrypt them both 
        $binaryKey = hex2bin(bin2hex($randomletters));

        //save the encryption key to databse
        $ticket = Ticket::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'currency' => $request->currency,
            'amount' => $request->amount,
            'description' => $request->description,
            'item_name' => $request->item_name,
            'quantity' => $request->quantity,
            'status' => 'unclaimed',
            'payment' => $request->payment,
            'encrypted_key' => $binaryKey,
            'encrypted_id' => $binaryKey,
        ]);

        $qrCode = new QrCode($binaryKey);
        $qrCode->setSize(300)
            ->setMargin(10)
            ->setErrorCorrectionLevel(ErrorCorrectionLevel::High)
            ->setEncoding(new \Endroid\QrCode\Encoding\Encoding('UTF-8'));

        $writer = new PngWriter();
        $result = $writer->write($qrCode);
        $dataUrl = $result->getDataUri();

        // Store the QR code data in the session
        session(['qrCodeData' => $binaryKey]);

        // Redirect with success message and QR code URL
        return redirect()->route('ticket.success')->with([
            'success' => 'Ticket created successfully!',
            'qrCodeUrl' => $dataUrl,
        ]);
    }

    //scans the database for the same encryption key provided to the staff, if exist then will show the use details that corresponds to the key
    public function scanTicket(Request $request)
    {
        $encryptedKey = $request->input('encrypted_id');

        $ticket = Ticket::where('encrypted_id', $encryptedKey)->first();

        if (!$ticket) {

            if (ctype_xdigit($encryptedKey)) {
                $binaryKey = hex2bin($encryptedKey);
                $ticket = Ticket::where('encrypted_id', $binaryKey)->first();
            }
        }

        if ($ticket) {
            return view('administrator.ticket.scan', ['ticket' => $ticket]);
        } else {
            return redirect()->route('ticket.scan')->with('error', 'No matching ticket found.');
        }
    }

    //if 'claimed' btn is clicked, changes the users status to claimed and deletes the encryption key to not claim again
    public function claimTicket(Request $request)
    {
        $ticket = Ticket::findOrFail($request->input('ticket_id'));

        if ($ticket->status === 'claimed') {
            return redirect()->route('ticket.scan')->with('error', 'This ticket has already been claimed.');
        }


        $ticket->status = 'claimed';
        $ticket->encrypted_key = 'claimed';
        $ticket->save();

        return redirect()->route('ticket.scan')->with('success', 'Ticket has been successfully claimed.');
    }





}