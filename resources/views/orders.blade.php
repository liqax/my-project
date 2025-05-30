@extends('layouts.app')

@section('content')
<div class="container py-4">
  <h2 class="mb-4"> ประวัติคำสั่งซื้อของคุณ</h2>

  <!-- Filter -->
  <form method="GET" class="row g-2 mb-3">
    <div class="col-md-3">
      <select name="status" class="form-select">
        <option value="">-- เลือกสถานะ --</option>
        <option value="processing">กำลังดำเนินการ</option>
        <option value="shipped">จัดส่งแล้ว</option>
        <option value="cancelled">ยกเลิก</option>
      </select>
    </div>
    <div class="col-md-3">
      <select name="month" class="form-select">
        <option value="">-- เลือกเดือน --</option>
        @for($i=1;$i<=12;$i++)
          <option value="{{ sprintf('%02d',$i) }}">เดือนที่ {{ $i }}</option>
        @endfor
      </select>
    </div>
    <div class="col-md-3">
      <button class="btn btn-primary" type="submit">กรอง</button>
    </div>
  </form>

  <!-- Orders Table -->
  <div class="table-responsive">
    <table class="table align-middle">
      <thead>
        <tr>
          <th>สินค้า</th>
          <th>ราคา/หน่วย</th>
          <th>จำนวน</th>
          <th>รวม</th>
          <th>สถานะ</th>
          <th>วันที่</th>
          <th>ใบเสร็จ</th>
        </tr>
      </thead>
      <tbody>
        @forelse($orders as $order)
        <tr>
          <td>{{ $order['name'] }}</td>
          <td>฿{{ number_format($order['price'],2) }}</td>
          <td>{{ $order['qty'] }}</td>
          <td>฿{{ number_format($order['qty'] * $order['price'], 2) }}</td>
          <td>
            <span class="badge 
              {{ $order['status']=='shipped' ? 'bg-success' : ($order['status']=='cancelled' ? 'bg-danger' : 'bg-warning') }}">
              {{ ucfirst($order['status']) }}
            </span>
          </td>
          <td>{{ \Carbon\Carbon::parse($order['date'])->format('d/m/Y') }}</td>
          <td>
            <a href="{{ route('orders.receipt', $order['id']) }}" class="btn btn-sm btn-outline-primary">
              ใบเสร็จ
            </a>
          </td>
        </tr>
        @empty
        <tr><td colspan="7" class="text-center text-muted">ไม่มีคำสั่งซื้อในช่วงนี้</td></tr>
        @endforelse
      </tbody>
    </table>
  </div>
</div>
@endsection
