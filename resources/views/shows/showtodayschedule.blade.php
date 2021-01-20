@extends('layouts.main')
@section('title', 'ຕາຕະລາງ')

@section('content')
{{-- <div class="container pt-3"> --}}
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex">
                    <div class="col-4 d-flex flex-direction-reverse">
                        <a class="btn btn-success btn-c-padding" href="">ທິດກ່ອນໜ້າ</a>
                    </div>
                    <div class="col-4 text-center">
                        <h4>ຕາຕະລາງ</h4>
                    </div>
                    <div class="col-4">
                        <a class="btn btn-success btn-c-padding" href="">ທິດຕໍ່ໄປ</a>
                    </div>
                </div>

                <div class="card-body overflow-scroll">
                    <table class="table table-bordered">
                        <tr>
                            <td>ເວລາ\ຫ້ອງ</td>
                            <td>COM1</td>
                            <td>COM2</td>
                            <td>COM3</td>
                            <td>Conference</td>
                            <td>Hall1</td>
                            <td>Hall2</td>
                        </tr>
                        @foreach($times as $starttime => $endtimes)
                            @foreach ($endtimes as $endtime)
                                <tr>
                                    <td>{{ $starttime }}<br>ເຖິງ<br>{{ $endtime }}</td>
                                    <td></td>
                                    <td></td>
                                </tr>
                            @endforeach
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
{{-- </div> --}}
@endsection
