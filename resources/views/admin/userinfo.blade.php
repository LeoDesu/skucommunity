@extends('layouts.main')
@section('title', 'ຂໍ້ມູນຜູ້ໃຊ້')

@section('content')
<div class="container pt-3">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header text-center">
                    ຄົ້ນຫາຜູ້ໃຊ້
                </div>
                <div class="card-body">
                    <userlist-search csrf="{{ $token }}"/>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
