<?php

namespace App\Http\Controllers;
use App\Models\Broodje;
use App\Models\Cart;
use Illuminate\Http\Request;


class DashboardController extends Controller
{
    public function index()
{
    $broodjes = Broodje::all();
    $BaguettesProducten = $broodjes->where('categorie_id', 1);
    $LuxerybunsProducten = $broodjes->where('categorie_id', 2);
    $HotProducten = $broodjes->where('categorie_id', 3);

    // Haal de inhoud van de winkelwagen op
    $cartItems = Cart::where('user_id', auth()->id())->with('product')->get();

    return view('dashboard', compact('BaguettesProducten', 'LuxerybunsProducten', 'HotProducten', 'cartItems'));
}

    
    
}