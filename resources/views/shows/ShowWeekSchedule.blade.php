@extends('layouts.main')
@section('title', 'ຕາຕະລາງ')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header d-flex">
                <div class="col-4 d-flex flex-direction-reverse">
                    <a class="btn btn-success btn-c-padding" href="/showschedule/{{ $lastsunday }}">ທິດກ່ອນໜ້າ</a>
                </div>
                <div class="col-4 text-center">
                    <h4>ຕາຕະລາງປະຈໍາອາທິດຂອງສາຂາ {{ $major }}</h4>
                </div>
                <div class="col-4">
                    <a class="btn btn-success btn-c-padding" href="/showschedule/{{ $nextsunday }}">ທິດຕໍ່ໄປ</a>
                </div>
            </div>

            <div class="card-body overflow-scroll">
                <table class="table table-bordered">
                    <tr>
                        <td class="text-center">ເວລາ\ວັນທີ</td>
                        @foreach($laoDays as $day => $value)
                            <td class="text-center @if($day == 'Sun') text-danger @endif">
                                {{ $value }}<br>
                                {{ date('d/m/Y', strtotime($thisweek[$day])) }}
                            </td>
                        @endforeach
                    </tr>
                    @foreach($times as $time)
                        <tr>
                            <td class="text-center">{{ $time['starttime'] }}<br>ເຖິງ<br>{{ $time['endtime']  }}</td>
                            @foreach($days as $day => $value)
                                <td class="text-center @if($day == 'Sun') text-danger @endif"
                                    @if($update && isset($schedules[$day][$time['starttime']][$time['endtime']]))
                                        onclick="updateSchedule({{ $schedules[$day][$time['starttime']][$time['endtime']]->id }})"
                                        style="cursor: pointer;"
                                    @endif >
                                    @if(isset($schedules[$day][$time['starttime']][$time['endtime']]))
                                        {{ $schedules[$day][$time['starttime']][$time['endtime']]->subject->name }}<br>
                                        {{ $schedules[$day][$time['starttime']][$time['endtime']]->classroom->name }}<br>
                                        @foreach($schedules[$day][$time['starttime']][$time['endtime']]->majors as $major)
                                            <span>{{ $major->name }}</span>
                                        @endforeach
                                        <br>
                                        {{ $schedules[$day][$time['starttime']][$time['endtime']]->teacher->name }}
                                    @endif
                                </td>
                            @endforeach
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
