@extends('layouts.main')
@section('title', 'ຂໍ້ມູນຫ້ອງຮຽນ')

@section('content')
<div class="container pt-3">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-center">
                    <div class="col-4 text-center">
                        <h4>ຂໍ້ມູນຫ້ອງຮຽນ</h4>
                    </div>
                </div>

                <div class="card-body overflowx-scroll">
                    @if($classrooms->count())
                    <table class="table table-bordered table-striped">
                        <tr class="1em">
                            <th>ລໍາດັບ</th>
                            <th>ຕຶກຮຽນ</th>
                            <th>ຫ້ອງຮຽນ</th>
                            <th>ຕົວເລືອກ</th>
                        </tr>
                        @foreach($classrooms as $index => $classroom)
                        <tr>
                            <td>{{ $index+1 }}</td>
                            <td>{{ $classroom->building }}</td>
                            <td>{{ $classroom->name }}</td>
                            <td>
                                <button class="btn btn-danger rounded" onclick="submitDeleteForm(event, 'ທ່ານແນ່ໃຈບໍວ່າຕ້ອງການລົບຫ້ອງຮຽນນີ້?', 'delete-classroom-form-{{ $classroom->id }}')">ລົບ</button>
                                <form id="delete-classroom-form-{{ $classroom->id }}" action="/deleteclassroom/{{ $classroom->id }}" method="post">
                                    @csrf
                                    @method('delete')
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </table>
                    @else
                    <h3 class="text-center">
                        ຕອນນີ້ຍັງບໍ່ມີຫ້ອງຮຽນໃດໆໃນລະບົບ
                    </h3>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
