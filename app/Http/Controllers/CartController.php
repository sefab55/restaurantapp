<?php
namespace App\Http\Controllers;
use App\Models\Broodje;
use Illuminate\Http\Request;
use App\Models\Cart;


class CartController extends Controller
{
    public function showCart()
    {
        // Haal de inhoud van de winkelwagen op
        $cartItems = Cart::where('user_id', auth()->id())->with('product')->get();
    
        return view('winkelwagen', compact('cartItems'));
    }
    

    public function addToCart(Request $request)
{
    $product = Broodje::find($request->product_id);

    $quantity = $request->quantity ?? 1; // Als 'quantity' niet is ingesteld in het formulier, gebruik 1 als standaardwaarde.

    Cart::updateOrCreate([
        'user_id' => auth()->id(),
        'product_id' => $product->id,
    ], [
        'quantity' => $quantity,
    ]);

    return back()->with('success', 'Product is toegevoegd aan de winkelwagen.');
}
public function updateCart(Request $request, Cart $cartItem)
{
    $cartItem->update(['quantity' => $request->quantity]);
    return redirect()->route('winkelwagen.index')->with('success', 'Winkelwagen bijgewerkt.');
}

    public function removeFromCart(Cart $cartItem)
    {
        $cartItem->delete();

        return back()->with('success', 'Product verwijderd uit de winkelwagen.');
    }
}
