@extends('layouts.main')
@section('title', 'ສ້າງກະທູ້')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="text-center">ສ້າງກະທູ້</h4>
                </div>
                <div class="card-body">
                    <form action="/createblog" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row form-group">
                            <textarea class="w-100 p-3 blog-textarea @error('content') is-invalid @enderror" name="content" id="content" rows="3" placeholder="ຂຽນສິ່ງທີ່ທ່ານຕ້ອງການໂພສ" ></textarea>
                            @error('content')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="row form-group justify-content-center">
                            <label for="file" class="btn btn-primary">ໄຟລ໌ແນບ</label>
                            <input type="file" name="attachment" id="file" class="d-none" onchange="previewFile(event);">
                        </div>
                        <div id="preview" class="row form-group justify-content-center w-100">
                        </div>
                        <div class="row form-group">
                            <input class="btn btn-success text-1em" type="submit" value="ໂພສ">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection