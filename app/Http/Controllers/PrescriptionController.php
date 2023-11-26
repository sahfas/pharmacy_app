<?php

namespace App\Http\Controllers;

use App\Models\Prescription;
use Illuminate\Http\Request;
use App\Models\PrescriptionImage;
use Illuminate\Support\Facades\Auth;

class PrescriptionController extends Controller
{

    public function store(Request $request)
    {
        dd($request);
        $request->validate([
            'note' => 'nullable|string',
            'delivery_address' => 'required|string',
            'delivery_time' => 'required|date',
            'files.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $prescription = Prescription::create([
            'note' => $request->input('note'),
            'delivery_address' => $request->input('delivery_address'),
            'delivery_time' => $request->input('delivery_time'),
            'user_id' => Auth::id(),
        ]);

        if ($request->hasFile('files')) {
            foreach ($request->file('files') as $file) {
                $path = $file->storeAs('public/prescriptions', $file->getClientOriginalName());
                PrescriptionImage::create([
                    'image_path' => $path,
                    'prescription_id' => $prescription->id,
                ]);
            }
        }

        return redirect()->route('prescriptions.create')->with('success', 'Prescription created successfully.');
    }
}
