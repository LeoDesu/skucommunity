@extends('layouts.main')
@section('title', 'ຂໍ້ມູນວິຊາຮຽນ')

@section('content')
<div class="container pt-3">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-center">
                    <div class="col-4 text-center">
                        <h4>ຂໍ້ມູນວິຊາຮຽນ</h4>
                    </div>
                </div>

                <div class="card-body overflowx-scroll">
                    @if($subjects->count())
                    <table class="table table-bordered table-striped">
                        <tr class="1em">
                            <th>ລໍາດັບ</th>
                            <th>ວິຊາ</th>
                            <th>ພາກວິຊາທີ່ຮຽນ</th>
                            <th>ຕົວເລືອກ</th>
                        </tr>
                        @foreach($subjects as $index => $subject)
                        <tr>
                            <td>{{ $index+1 }}</td>
                            <td>{{ $subject->name }}</td>
                            <td>
                            @foreach ($subject->majors as $index => $major)
                                {{ $major->name }}({{ $major->pivot->quota }} ຊົ່ວໂມງ)
                            @endforeach
                            </td>
                            <td>
                                <button class="btn btn-danger rounded" onclick="submitDeleteForm(event, 'ທ່ານແນ່ໃຈບໍວ່າຕ້ອງການລົບວິຊາຮຽນນີ້?', 'delete-subject-form-{{ $subject->id }}')">ລົບ</button>
                                <form id="delete-subject-form-{{ $subject->id }}" action="/deletesubject/{{ $subject->id }}" method="post">
                                    @csrf
                                    @method('delete')
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </table>
                    @else
                    <h3 class="text-center">
                        ຕອນນີ້ຍັງບໍ່ມີວິຊາຮຽນໃດໆໃນລະບົບ
                    </h3>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
