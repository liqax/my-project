<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function history(Request $request)
    {
        $orders = collect([
            [
                'id' => 1,
                'name' => 'หนังสือคณิตศาสตร์ ป.6',
                'qty' => 2,
                'price' => 120,
                'status' => 'shipped',
                'date' => '2024-06-01',
            ],
            [
                'id' => 2,
                'name' => 'โดรน GEN2',
                'qty' => 1,
                'price' => 12000,
                'status' => 'processing',
                'date' => '2024-06-02',
            ],
            [
                'id' => 3,
                'name' => 'สารละลายเมทิลเรด',
                'qty' => 3,
                'price' => 75,
                'status' => 'cancelled',
                'date' => '2024-06-02',
            ],
        ]);

        // กรองตามสถานะ
        if ($request->has('status')) {
            $orders = $orders->where('status', $request->status);
        }

        // กรองตามเดือน
        if ($request->has('month')) {
            $orders = $orders->filter(fn($o) =>
                date('m', strtotime($o['date'])) == $request->month
            );
        }

        return view('orders.history', [
            'orders' => $orders,
        ]);
    }
}
