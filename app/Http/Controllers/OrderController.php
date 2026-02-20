<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class OrderController extends Controller
{
    //
    public function store(Request $request) {
        // Fetch category to get the image
        $category = Category::findOrFail($request->category_id);

        $order = new Order();
        $order->categories_id = $request->category_id;
        $order->sub_typename  = $category->sub_type;
        $order->img       = $category->img;
        $order->size = $request->input('size'); // This will now get 'S', 'M', or 'L'

        // Save checkboxes as strings
        $order->side_board  = implode(', ', $request->input('siteboard', []));
        $order->sauce_type  = implode(', ', $request->input('saucetype', []));
        $order->topping     = implode(', ', $request->input('selectTopping', []));

        // Capture the total calculated by your JavaScript
        $order->total_price = $request->total_price;
        $order->status      = 'pending';

        $order->save();

        return redirect('/')->with('success', 'Order Saved!');
    }
    //order cancle
    public function cancle($id){
        Order::where('id',$id)->delete();
        return back()->with('success', 'Order Canceled and Removed!');
    }
    //order deliver
    public function deliver(Request $request, $id) {
    $order =Order::findOrFail($id); // Find existing record
    $order->status = 'Delivered'; // Set new status from form
    $order->save(); // Save changes to DB
    return back();
}

}
