@extends('layouts.main')
@section('title', 'ແກ້ໄຂຕາຕະລາງ')

@section('content')
<div class="container pt-3">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <manageschedules-selectmajor csrf="{{ $token }}"/>
            </div>
        </div>
    </div>
</div>
@endsection
