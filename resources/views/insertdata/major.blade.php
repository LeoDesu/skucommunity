@extends('layouts.main')
@section('title', 'ເພິີ່ມສາຂາ')
@section('content')
<div class="container pt-3">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">ເພີ່ມສາຂາ</div>

                <div class="card-body">
                    <form method="POST" action="/insertmajor">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('ສາຂາ: ') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" required autocomplete="name" autofocus placeholder="ສາຂາ">

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="faculty" class="col-md-4 col-form-label text-md-right">{{ __('ຄະນະ: ') }}</label>

                            <div class="col-md-6">
                                <input id="faculty" type="text" class="form-control @error('faculty') is-invalid @enderror" name="faculty" required autocomplete="faculty" autofocus placeholder="ຄະນະ">

                                @error('faculty')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-success">
                                    ເພີ່ມ
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
