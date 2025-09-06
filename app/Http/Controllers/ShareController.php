<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Share;
use App\Models\Address;
use Illuminate\Support\Facades\Auth;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class ShareController extends Controller
{

    /**
     * Partager une adresse via WhatsApp (Lien)
     */
    public function shareLink(Address $address)
    {
        // Sauvegarde du partage
        Share::create([
            'user_id'    => Auth::id(),
            'address_id' => $address->id,
            'type'       => 'Lien',
        ]);

        // Générer le lien WhatsApp
        $url = route('user.addresses.show', $address->id);
        $message = "Découvrez mon adresse Adrify : {$address->adrify_code} - {$url}";
        $whatsappUrl = "https://wa.me/?text=" . urlencode($message);

        return redirect($whatsappUrl);
    }


    /**
     * Partager une adresse via QR Code
     */
    public function shareQr(Address $address)
    {
        // Sauvegarde du partage
        Share::create([
            'user_id'    => Auth::id(),
            'address_id' => $address->id,
            'type'       => 'QR Code',
        ]);

        // Générer le lien direct de l’adresse
        $url = route('user.addresses.show', $address->id);

        // Retourner une vue qui affiche le QR Code
        return view('user.shares.qr', compact('address', 'url'));
    }


    /**
     * Historique de mes partages
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
    public function show(Address $address)
    {
        //
        $this->authorize('view', $address);

        $link = route('addresses.show', $address->id);

        // Générer QR Code en base64
        $qrCode = base64_encode(QrCode::format('png')->size(200)->generate($link));

        // Sauvegarder un enregistrement de partage
        Share::create([
            'address_id' => $address->id,
            'type' => 'QR Code',
        ]);

        return view('shares.show', compact('address', 'link', 'qrCode'));
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
