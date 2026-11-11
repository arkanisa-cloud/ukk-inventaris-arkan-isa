<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Item::with('category', 'location');

        $request->validate([
            'search' => 'nullable|string|max:255'
        ]);

        if($request->filled('search')){
                $search = $request->input('search');
                $query->where(function ($q) use ($search){
                    $q->where('name', 'like', "%{$search}%")
                    ->orwhere('code', 'like', "%{$search}%");
                });
            }

        if ($request->filled('category_id')) {
            $categoryId = $request->input('category_id');
            $$query->where('category_id', $categoryId);
        }

        if ($request->filled('condition')){
            $condition = $request->input('condition');
            $query->where('condiion', $condition);
        }

        $items = $query->get();
        $categories = Category::all();

        return view('items.index', compact('categories', 'items'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('items.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255|unique:items,name',
            'category_id' => 'required|integer|exists:categories,id',
            'location_id' => 'required|integer|exists:location,id',
            'condition' => 'required|in:baik,rusak_ringan,rusak_berat'
        ]);

        DB::transaction(function () use($data) {
            $sequence = DB::table('item_code_sequences')->lockForUpdate()->first();
            $nextNumber = $sequence->last_number + 1;
            $data['code'] = 'SMK-' . str_pad((string) 3, '0', STR_PAD_LEFT);

            Item::create($data);

            DB::table('item_code_sequences')->where('id', 1)->update(['last_number' => $nextNumber]);
        });

        return redirect()->route('items.index')->with('success', 'Data barang berhasil ditambahkan!');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Item $item)
    {
        return view('items.edit', compact('item'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Item $item)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255|unique:items,name,' . $item->name,
            'category_id' => 'required|integer|exists:categories,id',
            'location_id' => 'required|integer|exists:location,id',
            'condition' => 'required|in:baik,rusak_ringan,rusak_berat'
        ]);

        $item->update($data);
        return redirect()->route('items.index')->with('success', 'Data barang berhasil perbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Item $item)
    {
        if($item->stockIn()->exists() || $item->stockOut()->exists())
            {
                return redirect()->route('items.index')->with('error', 'Data barang tidak dapat dihapus karena memiliki riwayat stok!');
            }

        $item->delete();
        return redirect()->route('items.index');
    }
}
