<?php

namespace App\Http\Livewire\Frontend\Product;

use App\Models\Cart;
use Livewire\Component;
use App\Models\Wishlist;
use Illuminate\Support\Facades\Auth;

class View extends Component
{

    public $category, $product, $quantityCount = 1;

    public function addToWishlist($productId)
    {
        if(Auth::check())
        {
            if(Wishlist::where('user_id', auth()->user()->id)->where('product_id',$productId)->exists())
            {
                session()->flash('message','Sudah ditambahkan sebelumnya');
                return false;
            }
            else
            {
                Wishlist::create([
                    'user_id' => auth()->user()->id,
                    'product_id' => $productId
                ]);
                $this->emit('wishlistAddedUpdated');
                session()->flash('message','Berhasil menambahkan ke Wishlist');
            }
        }
        else
        {
            session()->flash('message','Silakan Login untuk melanjutkan');
            return false;
        }
    }

    public function decrementQuantity()
    {
        if ($this->quantityCount > 1 ) {
            $this->quantityCount--;
        }
    }
    
    public function incrementQuantity()
    {
        if($this->quantityCount < 10){
            $this->quantityCount++;
        }
    }

    // PENTING! Kondisi saat ini menggunakan solusi satu post untuk satu stok
    public function addToCart(int $productId)
    {
        if(Auth::check())
        {
            if($this->product->where('id',$productId)->where('status','0')->exists())
            {
                if ($this->product->quantity > 0) 
                {
                    if (Cart::where('user_id', auth()->user()->id)->where('product_id', $productId)->exists()) 
                    {
                        // Jika produk yang sama yang akan ditambahkan sudah ada dalam keranjang
                        session()->flash('message','Product already added to Cart');
                        return false;
                    }
                    else
                    {
                        if ($this->product->quantity >= $this->quantityCount) 
                        {
                            // Insert Product to Cart
                            Cart::create([
                                'user_id' => auth()->user()->id,
                                'product_id' => $productId,
                                'quantity' => $this->quantityCount
                            ]);
    
                            $this->emit('CartAddedUpdated');
    
                            session()->flash('message','Produk berhasil dimasukan ke dalam Keranjang');
                            return false;
                        }
                        else
                        {   
                            // Jika jumlah produk yang akan ditambahkan melebihi jumlah stok
                            session()->flash('message','Hanya ' .$this->product->quantity. ' stok tersedia');
                            return false;
                        }
                    }
                }
                else
                {   
                    // Jika produk yang akan ditambahkan memiliki stok: 0
                    session()->flash('message','Stok habis');
                    return false;
                }
            }
            else
            {   
                //
                session()->flash('message','Produk tidak tersedia');
                return false;
            }
        }
        else
        {   
            // Jika proses dilakukan dalam keadaan logout
            session()->flash('message','Silakan Login untuk melanjutkan');
            return false;
        }
    }

    public function mount($category, $product)
    {
        $this->category = $category;
        $this->product = $product;
    }

    public function render()
    {
        return view('livewire.frontend.product.view', [
            'category' => $this->category,
            'product' => $this->product
        ]);

    }
}
