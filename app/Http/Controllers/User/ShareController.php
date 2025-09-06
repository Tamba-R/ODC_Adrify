<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Share;
use App\Models\Address;
use SimpleSoftwareIO\QrCode\Facades\QrCode; 


class ShareController extends Controller
{

    /**
     * Partage d'un lien d'adresse
     */
    public function shareLink(Address $address)
    {
        // Enregistrer le partage
        Share::create([
            'address_id' => $address->id,
            'user_id' => Auth::id(),
            'type' => 'Lien',
            'date_partage' => now(),
        ]);

        // Crée le lien
        $url = route('user.addresses.show', $address->id);

        // Redirige vers WhatsApp
        return redirect("https://wa.me/?text=" . urlencode("Découvrez mon adresse Adrify : {$address->adrify_code} - {$url}"));
    }

    /**
     * Partage via QR Code
     */
    public function shareQr(Address $address)
    {
        // Enregistrer le partage
        Share::create([
            'address_id' => $address->id,
            'user_id' => Auth::id(),
            'type' => 'QR Code',
            'date_partage' => now(),
        ]);

        // Crée le QR Code du lien
        $url = route('user.addresses.show', $address->id);
        $qrCode = QrCode::size(200)->generate($url);

        return view('user.shares.qr', compact('address', 'qrCode', 'url'));
    }

    /**
     * Historique des partages
     */
    public function index()
    {
        $shares = Share::where('user_id', Auth::id())
            ->with('address')
            ->latest()
            ->paginate(10);

        return view('user.shares.index', compact('shares'));
    }




    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
