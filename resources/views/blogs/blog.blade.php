@extends('layouts.main')
@section('style')
<style>
    
</style>
@endsection
@section('content')
<div class="row justify-content-center pt-2">
    <div class="col-md-10">
        <div class="card mb-2">
            <div class="card-header content-header d-flex justify-content-between">
                <div class="col-md-5">
                    <a href="/profile/{{ $blog->author->id }}" class="mr-3 text-decoration-none">
                        <img class="post-profile" src="/storage/{{ $blog->author->profile->image }}">
                    </a>
                    ໂພສໂດຍ
                    <a href="/profile/{{ $blog->author->id }}" class="profile-name">
                        {{$blog->author->name}}
                    </a>
                    {{ $blog->created_at->format('H:i:s d/m/Y') }}
                </div>
                <div>
                    ເຂົ້າເບິ່ງ: {{ $blog->views }}
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    {{ $blog->content }}
                </div>
                <div class="row justify-content-center">
                    @if($image)
                        <img class="w-100 mt-2" src="/storage/{{ $blog->attachment }}">
                    @elseif($video)
                        <video class="w-100 mt-2" src="/storage/{{ $blog->attachment }}" controls></video>
                    @elseif($audio)
                        <audio class="w-100 mt-2" src="/storage/{{ $blog->attachment }}" controls></audio>
                    @else
                        <a href="/storage/{{ $blog->attachment }}">{{ pathinfo($blog->attachment, PATHINFO_FILENAME) }}.{{ pathinfo($blog->attachment, PATHINFO_EXTENSION) }}</a>
                    @endif
                </div>
            </div>
            <div class="card-footer">
                <div class="row d-flex align-items-center">
                    @auth
                        <form action="/upvote/{{ $blog->id }}" method="post">@csrf<button class="btn btn-success mr-1 btn-c-padding" type="submit">ໃຫ້ຄະແນນ: </button></form>{{ $upvotes }}
                        <form action="/downvote/{{ $blog->id }}" method="post">@csrf<button class="btn btn-danger ml-1 mr-1 btn-c-padding" type="submit">ລົບຄະແນນ: </button></form>{{ $downvotes }}
                    @else
                        <div class="btn-c-padding">ຄົນໃຫ້ຄະແນນ:</div>{{ $upvotes }}<div class="btn-c-padding">ຄົນລົບຄະແນນ:</div>{{ $downvotes }}
                    @endauth
                </div>
                @auth
                    <div class="row col-12">
                        <form class="col-12" action="/comment/{{ $blog->id }}" method="post">
                            @csrf
                            <div class="form-group row">
                                <label for="comment" class="col-md-2 col-form-label text-md-right">{{ __('ຄວາມຄິດເຫັນ:') }}</label>
                                <div class="col-md-8">
                                    <input id="comment" type="text" class="form-control @error('comment') is-invalid @enderror" name="comment" autocomplete="comment" placeholder="ຂຽນຄວາມຄິດເຫັນຂອງທ່ານ">
                                    @error('comment')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <input class="btn btn-success btn-c-padding mt-sm-2" type="submit" value="ໂພສ" style="min-width: 5em;">
                            </div>
                        </form>
                    </div>  
                @endauth
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                @foreach($blog->comments as $comment)
                    <div class="row mt-3 mb-3 d-flex">
                        <div class="mr-1" style="width: 3em;">
                            <img src="/storage/{{ $comment->user->profile->image }}" style="width: 100%;">
                        </div>
                        <div class="col-md-11 col-sm-10">
                            <div class="row d-flex justify-content-between">
                                <div>{{ $comment->user->name }}</div>
                                <div>{{ $comment->created_at->format('ເມື່ອ h:i d/m/Y') }}</div>
                            </div>
                            <div class="row">
                                {{ $comment->comment }}
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection