@extends('layouts.main')
@section('title', $title)
@section('style')
<style>
    
</style>
@endsection
@section('content')
<div class="row justify-content-center pt-2">
    <div class="col-md-10">
        @foreach($blogs as $blog)

            <div class="card mb-2">
                {{-- onclick="$.toggleContent('content-{{$blog->id}}');" --}}
                <div class="card-header content-header d-flex justify-content-between" >
                    <div class="">
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
                <a href="/blog/{{ $blog->id }}">
                    {{-- id="content-{{$blog->id}}" --}}
                    <div class="card-body content-body" >
                        {{ $blog->content }}
                    </div>
                </a>
            </div>    

        @endforeach
    </div>
</div>
@endsection