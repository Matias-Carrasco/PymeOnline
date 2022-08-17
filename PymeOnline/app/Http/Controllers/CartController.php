<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\producto;
use App\Models\imagen;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function shop()
    {
        $products = producto::all();
        //dd($products);
        return view('shop')->withTitle('E-COMMERCE STORE | SHOP')->with(['products' => $products]);
    }

    public function cart()  {
        $cartCollection = \Cart::getContent();
        //dd($cartCollection);
        //dd($cartCollection);
        return view('cart')->withTitle('Carrito')->with(['cartCollection' => $cartCollection]);;
    }
    public function remove(Request $request){
        \Cart::remove($request->id);
        return redirect()->route('cart.index')->with('success_msg', 'El item fue removido!');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function add(Request $request){
        //dd($request);
        $id = Auth::id();
        $id_producto = $request->id;

        $producto=producto::where('producto_id','=',$id_producto)->first();
        $imagen=imagen::where('producto_id','=',$id_producto)->first();
        
        
        \Cart::add(array(
            'id' => $request->id,
            'name' => $producto->producto_nombre,
            'price' => 1,
            'quantity' => 1,
            'attributes' => array(
                'image' => $imagen->imagen_url
            )

        ));

        return redirect()->route('cart.index')->with('success_msg', 'Item Agregado a sú Carrito!');
        //return redirect('producto')->with('alert_success','Item Agregado a su carrito');
        //return redirect()->route('cart.index')->with('success_msg', 'Item Agregado a sú Carrito!');
    }

    public function update(Request $request){
        \Cart::update($request->id,
            array(
                'quantity' => array(
                    'relative' => false,
                    'value' => $request->quantity
                ),
        ));
        return redirect()->route('cart.index')->with('success_msg', 'El carrito fue actualizado!');
    }

    public function clear(){
        \Cart::clear();
        return redirect()->route('cart.index')->with('success_msg', 'El carrito fue limpiado!');
    }

 

}
