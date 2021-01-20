@extends('layouts.main')
@section('title', 'ແກ້ໄຂໂປຣໄຟລ໌')

@section('content')
<div class="container pt-3">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('ແກ້ໄຂໂປຣໄຟລ໌') }}</div>

                <div class="card-body">
                    <form method="POST" action="/updateprofile/{{$user->profile->id}}" enctype="multipart/form-data">
                        @method('patch')
                        @csrf

                        <div class="form-group row d-flex justify-content-center">
                            
                            <div class="col-md-6 row justify-content-center">
                                <img id="previewImage" class="w-100" src="/storage/{{ $user->profile->image }}">
                                <label for="image" class="btn btn-primary mt-1">ເລືອກຮູບ</label>
                                <input id="image" type="file" accept="image/*" class="form-control d-none @error('image') is-invalid @enderror" name="image" autofocus onchange="showPreviewImage(event);">

                                @error('image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="about" class="col-md-4 col-form-label text-md-right">{{ __('ກ່ຽວກັບຂ້ອຍ:') }}</label>

                            <div class="col-md-6">
                                <input id="about" type="text" class="form-control @error('about') is-invalid @enderror" name="about" placeholder="ກ່ຽວກັບຂ້ອຍ" value="{{ old('about') ?? $user->profile->about }}">

                                @error('about')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-success">
                                    {{ __('ແກ້ໄຂ') }}
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
