@extends('layouts.main')
@section('title', 'ຈັດການການສອນ')

@section('content')
<div class="container pt-3">
    @livewireStyles
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <form action="/manageteaching" method="post">
                    @csrf
                    <div class="card-header d-flex justify-content-center">
                        <div class="col-4 text-center">
                            <h4>ຈັດການການສອນ</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row w-100"><select-user-by-search/></div>
                        <div class="row w-100"><select-subject-by-search/></div>
                        <div class="row form-group">
                            <button type="submit" class="btn btn-primary offset-md-4">ບັນທຶກ</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @livewireScripts
</div>
@endsection
