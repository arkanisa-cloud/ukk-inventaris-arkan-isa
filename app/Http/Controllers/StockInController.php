<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Item;
use App\Models\StockIn;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StockInController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = Item::all();
        $categories = Category::all();
        $stockIn = StockIn::all();

        return view('stock_ins.index', compact('items', 'categories', 'stockIn'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('stock-ins.create');
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
            $items = DB::table('items')->lockForUpdate()->findOrFail('item_id', $data['item_id']);
            $items->increment('quantity', $data['quantity']);
            StockIn::create($data);
        });

        return redirect()->route('stock-ins.index')->with('success', 'berhasil menambahkan stok!');
    }
}
