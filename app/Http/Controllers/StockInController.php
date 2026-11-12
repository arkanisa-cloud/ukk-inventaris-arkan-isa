<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Item;
use App\Models\StockIn;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;

class StockInController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $stockIns = StockIn::with('item')->get();

        return view('stock_ins.index', compact('stockIns'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $items = Item::all();
        $stockIns = StockIn::all();
        
        return view('stock_ins.create', compact('items', 'stockIns'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'item_id' => 'required|integer|exists:items,id',
            'quantity' => 'required|integer|min:1',
            'date' => 'required|date',
            'description' => 'nullable|string|max:255'
        ]);

        DB::transaction(function () use ($data) {
            $items = Item::lockForUpdate()->findOrFail($data['item_id']);
            $items->increment('quantity', $data['quantity']);
            StockIn::create($data);
        });

        return redirect()->route('stock-ins.index')->with('success', 'berhasil menambahkan stok.');
    }
}
