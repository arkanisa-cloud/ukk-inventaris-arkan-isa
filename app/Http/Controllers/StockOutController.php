<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Item;
use App\Models\StockIn;
use App\Models\StockOut;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;

class StockOutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = Item::all();
        $categories = Category::all();
        $stockOuts = StockOut::all();

        return view('stock_outs.index', compact('items', 'categories', 'stockOuts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $items = Item::all();
        $stockOuts = StockOut::all();

        return view('stock_outs.create', compact('items', 'stockOuts'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'item_id' => 'required|integer|exists:items,id',
            'quantity' => 'required|integer|min:1',
            'recipent' => 'required|string|max:255',
            'date' => 'required|date',
            'description' => 'nullable|string|max:255'
        ]);

        DB::transaction(function () use ($data) {
            $item = Item::lockForUpdate()->findOrFail($data['item_id']);
            if ($item->quantity < $data['quantity']) {
                throw ValidationException::withMessages(['quantity' => 'stok tidak mencukupi']);
            }
            $item->decrement('quantity', $data['quantity']);
            StockOut::create($data);
        });

        return redirect()->route('stock-outs.index')->with('success', 'berhasil menambahkan stok!');
    }
}
