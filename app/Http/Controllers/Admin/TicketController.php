<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Ticket;
use Illuminate\View\View;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Http;


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
    public function index()
    {
        $tickets = Ticket::paginate(10); 
        return view('administrator.ticket.index', compact('tickets'));
    }

    public function showScanPage()
    {
        return view('administrator.ticket.scan');
    }

    
//OOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOO



//takes inputs ( name, email, quantity, status "unclaimed as default"), and sets randome secure encryption key. 
    public function store(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'quantity' => 'required|integer|min:1',
    ]);

    
    $randomletters = Str::random(10);

    // Combine both
    $combinedString = $randomletters . "{$request->email}";

     //encrypt the both into 250 characters to use as sceurity
    $encryptionKey = Crypt::encrypt($combinedString);

    // Convert the encryption key to binary before storing
    $binaryKey = hex2bin(bin2hex($encryptionKey));
    
    $ticket = Ticket::create([
        'name' => $request->name,
        'email' => $request->email,
        'quantity' => $request->quantity,
        'status' => 'unclaimed',
        'encrypted_key' => $binaryKey,
        'encrypted_id' => $binaryKey,
    ]);
    
    $qrCodeUrl = "https://api.qrserver.com/v1/create-qr-code/?size=200x200&data=" . urlencode($encryptionKey);
    
    session(['qrCodeData' => $encryptionKey]);

    
    return redirect()->route('ticket.success')->with([
        'success' => 'Ticket created successfully!',
        'qrCodeUrl' => $qrCodeUrl,
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
            return redirect()->route('administrator.scan')->with('error', 'No matching ticket found.');
        }
    }   

    //if 'claimed' btn is clicked, changes the users status to claimed and deletes the encryption key to not claim again
    public function claimTicket(Request $request)
    {
        $ticket = Ticket::findOrFail($request->input('ticket_id'));
    
        if ($ticket->status === 'claimed') {
            return redirect()->route('administrator.scan')->with('error', 'This ticket has already been claimed.');
        }
    
       
        $ticket->status = 'claimed';
        $ticket->encrypted_key = 'claimed';
        $ticket->save();
    
        return redirect()->route('administrator.scan')->with('success', 'Ticket has been successfully claimed.');
    }
    
}