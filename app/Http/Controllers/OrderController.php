<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Customer;
use App\Models\Payment;
use App\Models\OrderLineItem;
use Illuminate\Http\Request;
use App\Http\Resources\OrderResource;
use App\Models\BillToAddress;
use App\Models\OrderStoreAssignment;
use App\Models\ShipToAddress;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::with(['customer', 'billToAddress', 'shipToAddress', 'payment', 'orderLineItems'])->get();
        return OrderResource::collection($orders);
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'source_id' => 'required|exists:sources,id',
            'ref_order_id' => 'nullable|exists:orders,id',
            'customer_id' => 'nullable|exists:customers,id',
            'customer' => 'required_without:customer_id|array',
            'bill_to_address_id' => 'nullable|exists:bill_to_addresses,id',
            'ship_to_address_id' => 'nullable|exists:ship_to_addresses,id',
            'payment' => 'required_without:payment_id|array',
            'payment.payment_method_id' => 'required|exists:payment_methods,id',
            'payment.status' => 'required',
            'payment.created_by' => 'required',
            'payment.updated_by' => 'required',
            'order_store_assignment' => 'required_without:order_store_assignment_id|array',
            'order_store_assignment.store_id' => 'required|exists:stores,id',
            'order_store_assignment.prev_store_id' => 'nullable|exists:stores,id',
            'order_store_assignment.prev_assigned_date' => 'nullable',
            'order_store_assignment.created_by' => 'required',
            'order_store_assignment.updated_by' => 'required',
            'order_line_items' => 'required|array|min:1',
            'order_line_items.*.source_line_item_id' => 'required',
            'order_line_items.*.description1' => 'required',
            'order_line_items.*.description2' => 'nullable',
            'order_line_items.*.description3' => 'nullable',
            'order_line_items.*.description4' => 'nullable',
            'order_line_items.*.discount' => 'required|numeric',
            'order_line_items.*.org_price' => 'required|numeric',
            'order_line_items.*.price' => 'required|numeric',
            'order_line_items.*.quantity' => 'required|integer',
            'order_line_items.*.sku' => 'required',
            'order_line_items.*.size' => 'nullable',
            'order_line_items.*.season' => 'nullable',
            'order_line_items.*.color' => 'nullable',
            'order_line_items.*.collection' => 'nullable',
            'order_line_items.*.category' => 'nullable',
            'order_line_items.*.item_type' => 'required',
            'order_line_items.*.taxable' => 'required',
            'order_line_items.*.tax' => 'required',
            'order_line_items.*.tax_perc' => 'required',
            'order_line_items.*.sid' => 'nullable',
            'order_line_items.*.store_no' => 'nullable',
            'order_line_items.*.subsidiary_no' => 'nullable',
            'order_line_items.*.dimensions' => 'nullable',
            'order_line_items.*.created_by' => 'required',
            'order_line_items.*.updated_by' => 'required',
            'source_order_id' => 'required',
            'source_order_no' => 'required',
            'financial_status' => 'required',
            'fulfillment_status' => 'required',
            'total_amount' => 'required|numeric',
            'total_subtotal_amount' => 'required|numeric',
            'total_quantity' => 'required|integer',
            'total_tax_amount' => 'required|numeric',
            'total_discount_amount' => 'required|numeric',
            'ordered_quantity' => 'required|integer',
            'fulfilled_quantity' => 'nullable|integer',
            'subsidiary_no' => 'nullable',
            'order_notes' => 'nullable',
            'remarks' => 'nullable',
            'instructions' => 'nullable',
            'delivery_notes' => 'nullable',
            'option1' => 'nullable',
            'option2' => 'nullable',
            'option3' => 'nullable',
            'status' => 'required',
            'order_type' => 'required',
            'created_by' => 'required',
            'updated_by' => 'required',
            'order_created_at' => 'nullable|date',
            'order_updated_at' => 'nullable|date',
        ]);


        $customer = $request->has('customer_id') ? Customer::find($request->customer_id) : null;
        $billToAddress = $request->has('bill_to_address_id') ? BillToAddress::find($request->bill_to_address_id) : null;
        $shipToAddress = $request->has('ship_to_address_id') ? ShipToAddress::find($request->ship_to_address_id) : null;

        // Ensure that customer, billToAddress, and shipToAddress are not null before accessing their properties
        $order = Order::create([
            'source_id' => $validated['source_id'],
            'ref_order_id' => $validated['ref_order_id'],
            'customer_id' => $customer ? $customer->id : null,
            'bill_to_address_id' => $billToAddress ? $billToAddress->id : null,
            'ship_to_address_id' => $shipToAddress ? $shipToAddress->id : null,
            'payment' => $validated['payment'],
            'order_store_assignment' => $validated['order_store_assignment'],
            'order_line_items' => $validated['order_line_items'],
            'source_order_id' => $validated['source_order_id'],
            'source_order_no' => $validated['source_order_no'],
            'financial_status' => $validated['financial_status'],
            'fulfillment_status' => $validated['fulfillment_status'],
            'total_amount' => $validated['total_amount'],
            'total_subtotal_amount' => $validated['total_subtotal_amount'],
            'total_quantity' => $validated['total_quantity'],
            'total_tax_amount' => $validated['total_tax_amount'],
            'total_discount_amount' => $validated['total_discount_amount'],
            'ordered_quantity' => $validated['ordered_quantity'],
            'fulfilled_quantity' => $validated['fulfilled_quantity'],
            'subsidiary_no' => $validated['subsidiary_no'],
            'order_notes' => $validated['order_notes'],
            'remarks' => $validated['remarks'],
            'instructions' => $validated['instructions'],
            'delivery_notes' => $validated['delivery_notes'],
            'option1' => $validated['option1'],
            'option2' => $validated['option2'],
            'option3' => $validated['option3'],
            'status' => $validated['status'],
            'order_type' => $validated['order_type'],
            'created_by' => $validated['created_by'],
            'updated_by' => $validated['updated_by'],
            'order_created_at' => now(),
            'order_updated_at' => now(),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        foreach ($validated['order_line_items'] as $item) {
            OrderLineItem::create([
                'source_line_item_id' => $item['source_line_item_id'],
                'order_id' => $order->id,
                'order_no' => $order->source_order_no,
                'description1' => $item['description1'],
                'description2' => $item['description2'],
                'description3' => $item['description3'],
                'description4' => $item['description4'],
                'discount' => $item['discount'],
                'org_price' => $item['org_price'],
                'price' => $item['price'],
                'quantity' => $item['quantity'],
                'sku' => $item['sku'],
                'size' => $item['size'],
                'season' => $item['season'],
                'color' => $item['color'],
                'collection' => $item['collection'],
                'category' => $item['category'],
                'item_type' => $item['item_type'],
                'taxable' => $item['taxable'],
                'tax' => $item['tax'],
                'tax_perc' => $item['tax_perc'],
                'sid' => $item['sid'],
                'store_no' => $item['store_no'],
                'subsidiary_no' => $item['subsidiary_no'],
                'dimensions' => $item['dimensions'],
                'created_by' => $item['created_by'],
                'updated_by' => $item['updated_by'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
        $payment = Payment::create([
            'order_id' => $order->id,
            'payment_method_id' => $validated['payment']['payment_method_id'],
            'date' => now(),
            'amount' => $order->total_subtotal_amount,
            'status' => $validated['payment']['status'],
            'created_by' => $validated['payment']['created_by'],
            'updated_by' => $validated['payment']['updated_by'],
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $orderStoreAssignment = OrderStoreAssignment::create([
            'order_id' => $order->id,
            'store_id' => $validated['order_store_assignment']['store_id'],
            'assigned_date' => now(),
            'prev_store_id' => $validated['order_store_assignment']['prev_store_id'],
            'prev_assigned_date' => $validated['order_store_assignment']['prev_assigned_date'],
            'created_by' => $validated['order_store_assignment']['created_by'],
            'updated_by' => $validated['order_store_assignment']['updated_by'],
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        $lineItems = count($validated['order_line_items']);

        $order->update([
            'payment_id' => $payment->id,
            'order_store_assignment_id' => $orderStoreAssignment->id,
            'line_items' => $lineItems,
        ]);

        // Load the relationships
        $order->load(['orderLineItems', 'payment', 'orderStoreAssignment']);

        return response()->json($order, 201);
    }




    public function show($id)
    {
        $order = Order::with(['customer', 'billToAddress', 'shipToAddress', 'payment', 'orderLineItems'])->findOrFail($id);
        return new OrderResource($order);
    }

    public function update(Request $request, $id)
    {
        $order = Order::findOrFail($id);

        $order->update($request->all());

        return response()->json($order);
    }
}
