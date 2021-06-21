<?php

namespace App\Http\Livewire\Eshop;

use App\Models\Eshop\Order;
use App\Models\Eshop\OrderItem;
use App\Models\Eshop\OrderAddress;
use Livewire\WithPagination;
use Livewire\Component;

class Orders extends Component
{
    use WithPagination;

    public $order;
    public $cart;
    public $statuses = [
        'canceled',
        'waiting-for-payment',
        'waiting-for-packing',
        'packing',
        'waiting-for-send',
        'send',
        'delivered',
        'done'
    ];
    public $status;
    public $select = [];
    public $filter = [];
    public $filterForm = ['status'=>[]];

    public function submitFilter()
    {
        $this->filter = $this->filterForm;
        $this->resetPage();
    }

    public function showOrder($id)
    {
        $this->order = Order::find($id);
        $this->cart = OrderItem::where('order_id', $this->order->id)->get();
        $this->status = array_search($this->order->status, $this->statuses);
    }

    public function closeOrder()
    {
        $this->order = null;
    }

    public function changeMultipleStatus($status)
    {
        if(!empty($this->select)) {
            foreach($this->select as $id) {
                $order = Order::find($id);
                $order->status = $status;
                $order->save();
            }
            flashSuccess([
                'title' => 'Status změněn!',
                'message' => 'Statusy byly  objednávek úspěšně změněny.',
            ], $this);
            $this->select = [];
        }
    }

    public function changeStatus($status, $id)
    {
        $this->order->status = $status;
        $this->order->save();
        $this->status = $id;
    }

    public function mount()
    {
        
    }

    public function render()
    {
        $orders = Order::where('cart', '0');
        foreach($this->filter as $key => $filter) {
            if(!empty($filter)) {
                $orders = $orders->whereIn($key, $filter);
            }
        }
        $orders = $orders->orderBy('submited_at', 'desc')->paginate(25);
        return view('livewire.eshop.orders')->with('orders', $orders);
    }
}
