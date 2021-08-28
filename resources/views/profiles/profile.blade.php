@extends('layouts.main')
@section('title', 'ໂປຣໄຟລ໌')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card mb-3">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-2 col-sm-3"><img class="w-100" src="/storage/{{ $user->profile->image }}"></div>
                        <div class="col-md-10 col-sm-9">
                            <div class="row d-flex justify-content-between">
                                <h3>{{$user->name}} {{$user->surname}}</h3>
                                @can('edit', $user->profile)
                                    <a href="/profile/{{ $user->id }}/edit"><button class="btn btn-success btn-c-padding bd-radius-2">ແກ້ໄຂໂປຣໄຟລ໌</button></a>
                                @endcan
                            </div>
                            <div class="row">
                                <div class="col-4">
                                    ສາຂາ: {{ $user->major->name }}<br>
                                    ຄະນະ: {{ $user->major->faculty }}
                                </div>
                                <div class="col-4">
                                    ບົບບາດ: {{ $user->role }}
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-body">{{$user->profile->about}}</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">ເພດ: {{ $user->gender }}</div>
                        <div class="col-md-4">ວັນເດືອນປີເກີດ: {{ $user->date_of_birth->format('d/m/Y') }}</div>
                        <div class="col-md-4">ທີ່ຢູ່: {{ $user->address }}</div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">ເບີໂທ: {{ $user->tel }}</div>
                        <div class="col-md-8">E-mail: {{ $user->email }}</div>
                    </div>
                </div>
            </div>


            @foreach(($b = $user->blogs)->count() ? $b->toQuery()->orderBy('created_at', 'desc')->get():[] as $blog)

            <div class="card mb-2">
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
                    <div class="card-body content-body" >
                        {{ $blog->content }}
                    </div>
                </a>
            </div>    

        @endforeach
        </div>
    </div>
</div>
@endsection
