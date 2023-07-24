<?php

namespace App\Http\Livewire\Frontend\Cart;

use App\Models\Cart;
use Livewire\Component;

class CartShow extends Component
{
    public $cart, $totalPrice = 0;

    public function decrementQuantity(int $cartId)
    {
        $cartData = Cart::where('id', $cartId)->where('user_id', auth()->user()->id)->first();
        if($cartData)
        {
            if($cartData->product->quantity > $cartData->quantity)
            {
                $cartData->decrement('quantity');
                session()->flash('message','Kuantitas di-update');
                return false;
            }
            else
            {
                session()->flash('message','Hanya ' .$cartData->product->quantity. ' stok tersedia');
                return false;
            }
        }
        else
        {
            session()->flash('message','Terjadi kesalahan');
            return false;
        }
    }

    public function incrementQuantity(int $cartId)
    {
        $cartData = Cart::where('id', $cartId)->where('user_id', auth()->user()->id)->first();
        if($cartData)
        {
            if($cartData->product->quantity > $cartData->quantity)
            {
                $cartData->increment('quantity');
                session()->flash('message','Kuantitas di-update');
                return false;
            }
            else
            {
                session()->flash('message','Hanya ' .$cartData->product->quantity. ' stok tersedia');
                return false;
            }
        }
        else
        {
            session()->flash('message','Terjadi kesalahan');
            return false;
        }
    }

    public function removeCartItem(int $cartId)
    {
        $cartRemoveData = Cart::where('user_id', auth()->user()->id)->where('id', $cartId)->first();
        if($cartRemoveData) {
            $cartRemoveData->delete();

            $this->emit('CartAddedUpdated');
    
            session()->flash('message','Produk berhasil dihapus');
            return false;
        }else{
            session()->flash('message','Terjadi kesalahan');
            return false;
        }
    }

    public function render()
    {
        $this->cart = Cart::where('user_id', auth()->user()->id)->get();
        return view('livewire.frontend.cart.cart-show',[
            'cart' => $this->cart
        ]);
    }
}
