@extends('layouts.app')
@section('title', 'PRE-ORDER')

@section('content')
  

<div class="container-navbar" style="width:100% height:250px">
  

</div>


<form action="{{ route('checkout.process') }}" method="POST">
    @csrf

<div class="form-check">
  <input class="form-check-input" type="radio" name="paymentMethod" id="payCOD" value="cod" checked>
  <label class="form-check-label" for="payCOD">เก็บเงินปลายทาง</label>
</div>
<div class="form-check mt-2">
  <input class="form-check-input" type="radio" name="paymentMethod" id="payCard" value="card">
  <label class="form-check-label" for="payCard">ชำระด้วยบัตรเครดิต</label>
</div>

<!-- ช่องบัตร -->
<div id="creditCardPanel" class="mt-3 d-none">
  <label class="form-label">หมายเลขบัตร</label>
  <input type="text" class="form-control mb-2" placeholder="0000 0000 0000 0000">
  <label class="form-label">ชื่อบนบัตร</label>
  <input type="text" class="form-control mb-2">
  <div class="row">
    <div class="col">
      <label class="form-label">วันหมดอายุ</label>
      <input type="text" class="form-control" placeholder="MM/YY">
    </div>
    <div class="col">
      <label class="form-label">CVV</label>
      <input type="text" class="form-control" placeholder="123">
    </div>
  </div>
</div>

    <!-- ช่องกรอกข้อมูล + ช่องทางชำระ -->
    <button type="submit" class="btn btn-success w-100">ยืนยันชำระเงิน</button>
</form>



<script>
  document.addEventListener('DOMContentLoaded', function () {
    const payCOD = document.getElementById('payCOD');
    const payCard = document.getElementById('payCard');
    const creditCardPanel = document.getElementById('creditCardPanel');

    function toggleCreditPanel() {
      if (payCard.checked) {
        creditCardPanel.classList.remove('d-none');
      } else {
        creditCardPanel.classList.add('d-none');
      }
    }

    payCOD.addEventListener('change', toggleCreditPanel);
    payCard.addEventListener('change', toggleCreditPanel);

    toggleCreditPanel(); 
  });
</script>






@endsection