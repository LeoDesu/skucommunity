@extends('layouts.main')
@section('title', 'ຂໍ້ມູນຜູ້ໃຊ້')

@section('content')
<div class="container pt-3">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header text-center">
                    ຂໍ້ມູນຜູ້ໃຊ້
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <tr>
                            <td class="pt-2 pb-2 col-md-3">ລະຫັດ</td>
                            <td class="pt-2 pb-2">{{ $user->id }}</td>
                        </tr>
                        <tr>
                            <td class="pt-2 pb-2 col-md-3">ຊື່</td>
                            <td class="pt-2 pb-2">{{ $user->name }}</td>
                        </tr>
                        <tr>
                            <td class="pt-2 pb-2 col-md-3">ນາມສະກຸນ</td>
                            <td class="pt-2 pb-2">{{ $user->surname }}</td>
                        </tr>
                        <tr>
                            <td class="pt-2 pb-2 col-md-3">ວັນເດືອນປີເກີດ</td>
                            <td class="pt-2 pb-2">{{ $user->date_of_birth->format('d/m/Y') }}</td>
                        </tr>
                        <tr>
                            <td class="pt-2 pb-2 col-md-3">ທີ່ຢູ່</td>
                            <td class="pt-2 pb-2">{{ $user->address }}</td>
                        </tr>
                        <tr>
                            <td class="pt-2 pb-2 col-md-3">ບົດບາດ</td>
                            <td class="pt-2 pb-2">{{ $user->role }}</td>
                        </tr>
                        @if($user->teachsubjects->count() > 0)
                            <tr>
                                <td class="pt-2 pb-2 col-md-3">ວິຊາສອນ</td>
                                <td class="pt-2 pb-2">
                                    @foreach($user->teachsubjects as $subject)
                                        @if ($user->teachsubjects->first() != $subject)
                                            ,
                                        @endif
                                        {{ $subject->name }}
                                    @endforeach
                                </td>
                            </tr>
                        @endif
                        <tr>
                            <td class="pt-2 pb-2 col-md-3">ສາຂາ</td>
                            <td class="pt-2 pb-2">{{ $user->major->name }}</td>
                        </tr>
                        <tr>
                            <td class="pt-2 pb-2 col-md-3">ເບີໂທ</td>
                            <td class="pt-2 pb-2">{{ $user->tel }}</td>
                        </tr>
                        <tr>
                            <td class="pt-2 pb-2 col-md-3">E-Mail</td>
                            <td class="pt-2 pb-2">{{ $user->email }}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
