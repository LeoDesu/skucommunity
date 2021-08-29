@extends('layouts.main')
@section('title', 'ຂໍ້ມູນການສອນ')

@section('content')
<div class="container pt-3">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-center">
                    <div class="col-4 text-center">
                        <h4>ຂໍ້ມູນການສອນ</h4>
                    </div>
                </div>

                <div class="card-body overflowx-scroll">
                    @if($user->teachSubjects->count())
                    <table class="table table-bordered table-striped">
                        <tr class="1em">
                            <th>ວິຊາ</th>
                            <th>ພາກວິຊາທີ່ຮຽນ</th>
                        </tr>
                        @foreach($user->teachSubjects as $subject)
                        <tr>
                            <td>
                                {{ $subject->name }}
                            </td>
                            <td>
                            @foreach ($subject->majors as $index => $major)
                                {{ $major->name }}({{ $major->pivot->quota }} ຊົ່ວໂມງ)
                                
                            @endforeach
                            </td>
                        </tr>
                        @endforeach
                    </table>
                    @else
                    <h3 class="text-center">
                        ທ່ານຍັງບໍ່ມີຂໍ້ມູນການສອນໃດໆໃນລະບົບ
                    </h3>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
