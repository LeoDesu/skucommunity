@extends('layouts.main')
@section('title', 'ຈັດການການສອນ')

@section('content')
<div class="container pt-3">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-flex justify-content-center">
                    <div class="col-4 text-center">
                        <h4>ຈັດການການສອນ</h4>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <select-major />
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection