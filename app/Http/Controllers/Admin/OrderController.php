<?php

namespace App\Http\Controllers\Admin;

use App\Helper\Toastr;
use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class OrderController extends Controller
{
    private const VIEW_PATH = 'admin.orders.';
    public function index()
    {
        $orders = Order::with(['orderItems'])->latest('id')->paginate(20);
        return view(self::VIEW_PATH . __FUNCTION__, compact('orders'));
    }

    public function edit(Order $order)
    {
        $order->load(['orderItems']);

        // dd($order->orderItems);

        return view(self::VIEW_PATH . __FUNCTION__, compact('order'));
    }
    public function update(Request $request, Order $order)
    {
        try {

            // if ($request->status_order === 'delivered') {
            //     $payment = 'paid';
            // }

            $order->update([
                'status_order' => $request->status_order,
            ]);
            Toastr::success('', 'Cập nhật trạng thái thành công');
            return back();
        } catch (\Throwable $th) {
            Log::error($th->getMessage());
            Toastr::error('', 'Cập nhật trạng thái không thành công');
            return back();
        }
    }
}
