@extends('layouts.main')

@section('style')
<style>
    
</style>
@endsection
@section('content')
<div class="row justify-content-center pt-2">
    <div class="col-md-10 pt-4">
        <p class="text-center text-3e5m">
            ຍິນດີຕ້ອນຮັບສູ່<br>
            {{ config('app.name') }}
        </p>  
        <p class="text-center text-1e9m">
            ເວັບໄຊຊຸມຊົນຂອງມະຫາວິທະຍາໄລສະຫວັນນະເຂດ<br>
            ອອກແບບມາເພື່ອອໍານວຍຄວາມສະດວກໃນການຮຽນ-ການສອນ ຂອງຄູ ແລະ ນັກສຶກສາພາຍໃນມະຫາວິທະຍາໄລສະຫວັນນະເຂດ.<br>
            
        </p>
        <p class="text-center text-1e5m font-weight-bold">(ກະລຸນາເຂົ້າສູ່ລະບົບເພື່ອດໍາເນີນການໃຊ້ງານ)</p>
    </div>
</div>
@endsection