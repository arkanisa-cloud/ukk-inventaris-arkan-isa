<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Item;
use App\Models\StockIn;
use App\Models\StockOut;

class ReportController extends Controller
{
    public function index() {
        $totalItem = Item::count();
        $totalStock = Item::sum('quantity');
        $totalStockIn = StockIn::sum('quantity');
        $totalStockOut = StockOut::sum('quantity');
        $items = Item::with('category', 'location')->get();

        return view('reports.index', compact('totalItem', 'totalStock', 'totalStockIn', 'totalStockOut', 'items'));
    }
}
