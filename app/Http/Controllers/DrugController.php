<?php

namespace App\Http\Controllers;

use App\Models\Drug;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DrugController extends Controller
{
    public function index()
    {
        $drugs = Drug::all();
        return view('drugs_add', compact('drugs'));
    }

    public function dashboard()
    {
        $userType = Auth::user()->user_type;

        if ($userType === 'pharmacist') {
            $drugs = Drug::all();
            return view('dashboard', compact('drugs'));
        } elseif ($userType === 'user') {
            return view('home');
        } else {
            return view('error');
        }
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            'quantity' => 'required|numeric'
        ]);

        Drug::create($request->all());

        return redirect()->route('dashboard.index')->with('success', 'Drug added successfully!');
    }

    public function show($id)
    {
        $drug = Drug::find($id);
        // dd($drug);
        return response()->json($drug);
    }
}
