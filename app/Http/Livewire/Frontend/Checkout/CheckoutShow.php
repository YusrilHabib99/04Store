<?php

namespace App\Http\Livewire\Frontend\Checkout;

use App\Models\Cart;
use App\Models\Order;
use Livewire\Component;
use App\Models\OrderItem;
use Illuminate\Support\Str;

class CheckoutShow extends Component
{

    public $carts, $totalProductAmount = 0;
    public $fullname, $email, $phone, $pincode, $address, $payment_mode = NULL, $payment_id = NULL;
    protected $listeners = ['pembayaran', 'gettoken'];

    public function gettoken($data)
    {
        return $data;
    }

    public function rules()
    {
        return [
            'fullname' => 'required|string|max:121',
            'email' => 'required|email|max:121',
            'phone' => 'required|string|max:12|min:10',
            'pincode' => 'required|string|max:6|min:6',
            'address' => 'required|string|max:500',
        ];
    }

    public function placeOrder()
    {
        $this->validate();

        $order = Order::create([
            'user_id' => auth()->user()->id,
            'tracking_no' => '04:Store-' . Str::random(10),
            'fullname' => $this->fullname,
            'email' => $this->email,
            'phone' => $this->phone,
            'pincode' => $this->pincode,
            'address' => $this->address,
            'status_message' => 'Dalam proses',
            'payment_mode' => $this->payment_mode,
            'payment_id' => $this->payment_id,
        ]);

        foreach ($this->carts as $cartItem) {

            $orderItems = OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $cartItem->product_id,
                'product_color_id' => $cartItem->product_color_id,
                'quantity' => $cartItem->quantity,
                'price' => $cartItem->product->selling_price
            ]);

            if ($cartItem->product_id != NULL) {
                $cartItem->product()->where('id', $cartItem->product_id)->decrement('quantity', $cartItem->quantity);
            }
        }

        return $order;
    }

    public function codOrder()
    {
        $this->payment_mode = 'COD';
        $codOrder = $this->placeOrder();
        if ($codOrder) {

            Cart::where('user_id', auth()->user()->id)->delete();
            session()->flash('message', 'Pesanan Berhasil');
            //return false;

            return redirect()->to('terimakasih');
        } else {

            session()->flash('message', 'Terjadi kesalahan');
            return false;
        }
    }

    /**/
    public function totalProductAmount()
    {
        $this->totalProductAmount = 0;
        $this->carts = Cart::where('user_id', auth()->user()->id)->get();
        foreach ($this->carts as $cartItem) {
            $this->totalProductAmount += $cartItem->product->selling_price * $cartItem->quantity;
        }
        return $this->totalProductAmount;
    }



    public function render()
    {
        $this->fullname = auth()->user()->name;
        $this->email = auth()->user()->email;

        $this->totalProductAmount = $this->totalProductAmount();
        return view('livewire.frontend.checkout.checkout-show', [
            'totalProductAmount' => $this->totalProductAmount
        ]);
    }

    public function pembayaran()
    {
        $this->payment_mode = 'ONLINE';
        $order = $this->placeOrder();

        // $orderItem = OrderItem::where('order_id', $order->id)->get();
        $itemDetail = [];

        foreach ($order->item as $item) {

            $itemDetail[] = [
                'id' => $item->product_id,
                'price' => (int)$item->product->selling_price,
                'quantity' => (int)$item->quantity,
                'name' => $item->product->name
            ];
        }

        $postfields =
            array(
                'transaction_details' =>
                array(
                    'order_id' => $order->tracking_no,
                    'gross_amount' => (int)$this->totalProductAmount,
                ),
                'credit_card' =>
                array(
                    'secure' => true,
                ),
                'item_details' => $itemDetail,
                'customer_details' =>
                array(
                    'first_name' => $this->fullname,
                    'last_name' => '-',
                    'email' => $this->email,
                    'phone' => $this->phone,
                ),
            );

        $data_string = json_encode($postfields);

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, 'https://app.sandbox.midtrans.com/snap/v1/transactions');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Accept: application/json',
            'Authorization: Basic U0ItTWlkLXNlcnZlci1vX0pJOXozWjBVV1NkUmRhVjFfMF9QY0o6',
            'Content-Type: application/json',
        ]);

        curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);

        $response = curl_exec($ch);
        $result = json_decode($response, true);
        curl_close($ch);

        $this->emit('gettoken', $result);
        // $this->token = $result['token'];
        // return redirect()->away($result['redirect_url']);
    }



    /*
    public function render()
    {
        $this->fullname = auth()->user()->name;
        $this->email = auth()->user()->email;

        $this->carts = Cart::where('user_id', auth()->user()->id)->get();
        $this->totalProductAmount = 0; // Reset total jumlah

        foreach ($this->carts as $cartItem) {
            $this->totalProductAmount += $cartItem->product->selling_price * $cartItem->quantity;
        }

        return view('livewire.frontend.checkout.checkout-show')
            ->with('totalProductAmount', $this->totalProductAmount);
    }
    */
}
