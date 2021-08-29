@extends('layouts.main')
@section('title', 'ຕາຕະລາງການສອນ')

@section('content')
<div class="container pt-3">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-center">
                    <div class="col-4 text-center">
                        <h4>ຕາຕະລາງການສອນ</h4>
                    </div>
                </div>

                <div class="card-body overflowx-scroll">
                    <table class="table table-bordered table-striped">
                        <tr class="1em">
                            <th>ວັນທີ</th>
                            <th>ເລີ່ມສອນ</th>
                            <th>ໝົດຊົ່ວໂມງ</th>
                            <th>ວິຊາ</th>
                            <th>ຫ້ອງຮຽນ</th>
                            <th>ສາຂາ</th>
                            <th>ແກ້ໄຂ</th>
                        </tr>
                        @foreach($schedules as $schedule)
                            <tr>
                                <td class="align-middle">{{ $schedule->date->format('d/m/Y') }}</td>
                                <td class="align-middle">{{ $schedule->starttime }}</td>
                                <td class="align-middle">{{ $schedule->endtime }}</td>
                                <td class="align-middle">{{ $schedule->subject->name }}</td>
                                <td class="align-middle">{{ $schedule->classroom->name }}</td>
                                <td class="align-middle">
                                    @foreach($schedule->majors as $major)
                                        <span>{{ $major->name }}</span>
                                    @endforeach
                                </td>
                                <td class="align-middle">
                                    <cancel-teaching-button schedule-id="{{ $schedule->id }}"/>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
