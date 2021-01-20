@extends('layouts.main')
@section('title', 'ເພີ່ມຫ້ອງຮຽນ')

@section('content')
<div class="container pt-3">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">ເພີ່ມຫ້ອງຮຽນ</div>

                <div class="card-body">
                    <form method="POST" action="/insertclassroom">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('ຫ້ອງຮຽນ: ') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" required autocomplete="name" autofocus placeholder="ຫ້ອງຮຽນ">

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="building" class="col-md-4 col-form-label text-md-right">{{ __('ຕຶກຮຽນ: ') }}</label>

                            <div class="col-md-6">
                                <input id="building" type="text" class="form-control @error('building') is-invalid @enderror" name="building" required autocomplete="building" autofocus placeholder="ຕຶກຮຽນ">

                                @error('building')
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
