<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class LetterController extends Controller
{
    /**
     * Display the form with default values.
     */
    public function index()
    {
        $defaults = [
            'no_pol' => 'D 9800 RZ',
            'sopir' => 'Riyan',
            'muatan' => 'Galon 1500 pcs',
            'asal' => 'TIV Keboncandi',
            'tujuan' => 'HUB Semarang',
            'tanggal_muat' => '25 Mei 2026',
            'kota_tanda_tangan' => 'Surabaya',
            'tanggal_tanda_tangan' => '25 Mei 2026',
            'nama_penandatangan' => 'Adang Sumpena/CV Sutera Jaya',
        ];

        return view('welcome', compact('defaults'));
    }

    /**
     * Generate the PDF from inputs.
     */
    public function generatePdf(Request $request)
    {
        // Validation with friendly fallbacks
        $validated = $request->validate([
            'no_pol' => 'nullable|string|max:100',
            'sopir' => 'nullable|string|max:100',
            'muatan' => 'nullable|string|max:255',
            'asal' => 'nullable|string|max:255',
            'tujuan' => 'nullable|string|max:255',
            'tanggal_muat' => 'nullable|string|max:100',
            'kota_tanda_tangan' => 'nullable|string|max:100',
            'tanggal_tanda_tangan' => 'nullable|string|max:100',
            'nama_penandatangan' => 'nullable|string|max:255',
            'stamp' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Default mappings if empty
        $data = [
            'no_pol' => $validated['no_pol'] ?? 'D 9800 RZ',
            'sopir' => $validated['sopir'] ?? 'Riyan',
            'muatan' => $validated['muatan'] ?? 'Galon 1500 pcs',
            'asal' => $validated['asal'] ?? 'TIV Keboncandi',
            'tujuan' => $validated['tujuan'] ?? 'HUB Semarang',
            'tanggal_muat' => $validated['tanggal_muat'] ?? '25 Mei 2026',
            'kota_tanda_tangan' => $validated['kota_tanda_tangan'] ?? 'Surabaya',
            'tanggal_tanda_tangan' => $validated['tanggal_tanda_tangan'] ?? '25 Mei 2026',
            'nama_penandatangan' => $validated['nama_penandatangan'] ?? 'Adang Sumpena/CV Sutera Jaya',
            'stamp_base64' => '',
        ];

        // Process custom stamp upload to in-memory base64 (strictly no filesystem storage)
        if ($request->hasFile('stamp') && $request->file('stamp')->isValid()) {
            $file = $request->file('stamp');
            $mime = $file->getMimeType();
            $fileData = file_get_contents($file->getRealPath());
            $data['stamp_base64'] = 'data:' . $mime . ';base64,' . base64_encode($fileData);
        } elseif ($request->filled('stamp_base64_raw')) {
            // Support passing base64 directly (useful for APIs)
            $data['stamp_base64'] = $request->input('stamp_base64_raw');
        } else {
            // Load default stamp from public/stempel.png as base64
            $defaultStampPath = public_path('stempel.png');
            if (file_exists($defaultStampPath)) {
                $fileData = file_get_contents($defaultStampPath);
                $mime = mime_content_type($defaultStampPath) ?: 'image/png';
                $data['stamp_base64'] = 'data:' . $mime . ';base64,' . base64_encode($fileData);
            }
        }

        // Configure Dompdf options for high quality
        $pdf = Pdf::loadView('letter-pdf', $data);
        $pdf->setPaper('A4', 'portrait');

        // Filename based on driver/no_pol
        $cleanNoPol = str_replace(' ', '_', $data['no_pol']);
        $filename = "Surat_Pengantar_Muat_{$cleanNoPol}.pdf";

        // Direct stream/download
        return $pdf->download($filename);
    }
}
