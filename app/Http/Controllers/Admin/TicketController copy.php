<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Ticket;
use Illuminate\View\View;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Crypt;
use Endroid\QrCode\QrCode;
use Endroid\QrCode\Writer\PngWriter;


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

    //generate 10 random leters and combine with user email
    $randomletters = Str::random(10);
    $combinedString = $randomletters . $request->email;

    //encrypt them both 
    $encryptionKey = Crypt::encrypt($combinedString);
    $binaryKey = hex2bin(bin2hex($encryptionKey));

    //save the encryption key to database
    $ticket = Ticket::create([
        'name' => $request->name,
        'email' => $request->email,
        'quantity' => $request->quantity,
        'status' => 'unclaimed',
        'encrypted_key' => $binaryKey,
        'encrypted_id' => $binaryKey,
    ]);


    // Generate QR code based on the encryption key
    $qrCode = new QrCode($binaryKey);
    $qrCode->setSize(300);
    $writer = new PngWriter();
    $result = $writer->write($qrCode);
    $dataUrl = $result->getDataUri();

    session(['qrCodeData' => $binaryKey]);

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



    public function showUploader()
    {
        return view('administrator.ticket.scan');
    }

    public function handleUpload(Request $request)
    {
        $request->validate([
            'qr_code' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->file('qr_code')) {
            // Process the uploaded image here
            // For now, we'll just return a success message
            return response()->json(['message' => 'Image uploaded successfully']);
        }

        return response()->json(['error' => 'No image uploaded'], 400);
    }
    
}