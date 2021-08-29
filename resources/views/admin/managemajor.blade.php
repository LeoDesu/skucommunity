@extends('layouts.main')
@section('title', 'ຂໍ້ມູນຂອງສາຂາ')

@section('content')
<div class="container pt-3">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-center">
                    <div class="col-4 text-center">
                        <h4>ວິຊາຮຽນ</h4>
                    </div>
                </div>

                <div class="card-body overflowx-scroll">
                    @if($major->subjects->count())
                    <table class="table table-bordered table-striped">
                        <tr class="1em">
                            <th>ວິຊາ</th>
                            <th>ຈໍານວນຊົ່ວໂມງຮຽນ</th>
                            <th>ຕົວເລືອກ</th>
                        </tr>
                        @foreach($major->subjects as $subject)
                        <tr>
                            <td>
                                {{ $subject->name }}
                            </td>
                            <td>
                                {{ $subject->pivot->quota }}
                            </td>
                            <td>
                                <button class="btn btn-primary rounded" data-toggle="modal" data-target="#modal-subject-{{ $subject->id }}">ແກ້ໄຂ</button>
                                <div id="modal-subject-{{ $subject->id }}" class="modal fade">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-body">
                                                <form action="/update-quota/{{ $major->id }}" method="post">
                                                    @csrf
                                                    <input type="hidden" name="subject_id" value="{{ $subject->id }}">
                                                    <div class="form-group row">
                                                        <input name="quota" type="number" class="form-control" placeholder="ກະລຸນາປ້ອນຈໍານວນຊົ່ວໂມງຮຽນ">
                                                    </div>
                                                    <div class="form-group row">
                                                        <input class="btn btn-primary rounded" type="submit" value="ແກ້ໄຂ" />
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </table>
                    @else
                    <h3 class="text-center">
                        ໃນສາຂານີ້ຍັງບໍ່ມີວິຊາທີ່ຮຽນ
                    </h3>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <div class="row justify-content-center mt-2">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-center">
                    <div class="col-4 text-center">
                        <h4>ນັກຮຽນ</h4>
                    </div>
                </div>

                <div class="card-body overflowx-scroll">
                    @if($major->users->count())
                    <table class="table table-bordered table-striped">
                        <tr class="1em">
                            <th>ລໍາດັບ</th>
                            <th>ຊື່</th>
                            <th>ນາມສະກຸນ</th>
                            <th>ຕົວເລືອກ</th>
                        </tr>
                        @foreach($major->users as $index => $student)
                        <tr>
                            <td>{{ $index+1 }}</td>
                            <td>
                                @if($student->gender === 'ຊາຍ')
                                    ທ.
                                @else
                                    ນ.
                                @endif
                                {{ $student->name }}
                            </td>
                            <td>{{ $student->surname }}</td>
                            <td><a href="/showuserinfo/{{ $student->id }}" class="btn btn-primary rounded">ເພີ່ມເຕີມ</a></td>
                        </tr>
                        @endforeach
                    </table>
                    @else
                    <h3 class="text-center">
                        ໃນສາຂານີ້ຍັງບໍ່ມີນັກຮຽນ
                    </h3>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
