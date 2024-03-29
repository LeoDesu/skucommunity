@extends('layouts.main')
@section('title', 'ແຜງຄວບຄຸມ')

@section('content')
<div class="container pt-3">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-center">
                    <div class="col-4 text-center">
                        <h4>ແຜງຄວບຄຸມ</h4>
                    </div>
                </div>
                <div class="card-body border-collapse">
                    <div class="row row-eq-height">
                        <div class="col-md-6 mb-4">
                            <div class="card h-100">
                                <div class="card-header bg-light">
                                    <h5 class="text-center">ຈັດການຜູ້ໃຊ້</h5>
                                </div>
                                <div class="card-body">
                                    <div class="row mb-2"><a href="/adduser" class="btn btn-info text-1em w-100">ເພີ່ມຜູ້ໃຊ້</a></div>
                                    <div class="row mb-2"><a href="/manageteaching" class="btn btn-info text-1em w-100">ຈັດການການສອນ</a></div>
                                    <div class="row mb-2"><a href="/userinfo" class="btn btn-info text-1em w-100">ຂໍ້ມູນຜູ້ໃຊ້</a></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 mb-4">
                            <div class="card h-100">
                                <div class="card-header bg-light">
                                    <h5 class="text-center">ຈັດການຄະນະ ແລະ ສາຂາວິຊາຮຽນ</h5>
                                </div>
                                <div class="card-body">
                                    <div class="row mb-2">
                                        <insert-major-button csrf="{{ $token }}" button-class="btn btn-info w-100 text-1em"/>
                                    </div>
                                    <div class="row mb-2">
                                        <manage-subject-button csrf="{{ $token }}" button-class="btn btn-info w-100 text-1em"/>
                                    </div>
                                    <div class="row mb-2">
                                        <manage-major-select-major csrf="{{ $token }}" element-class="w-100" button-class="btn-info text-1em w-100" />
                                    </div>
                                    <div class="row mb-2">
                                        <a href="/show-teaching-info" class="btn btn-info w-100 text-1em">ຂໍ້ມູນການສອນ</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row row-eq-height">
                        <div class="col-md-6 mb-4">
                            <div class="card h-100">
                                <div class="card-header bg-light">
                                    <h5 class="text-center">ຈັດການລະບົບ</h5>
                                </div>
                                <div class="card-body">
                                    <div class="row mb-2">
                                        <insert-subject-button csrf="{{ $token }}" button-class="btn btn-info w-100 text-1em"/>
                                    </div>
                                    <div class="row mb-2">
                                        <insert-classroom-button csrf="{{ $token }}" button-class="btn btn-info w-100 text-1em"/>
                                    </div>
                                    <div class="row mb-2"><a href="/subjectinfos" class="btn btn-info text-1em w-100">ຂໍ້ມູນວິຊາຮຽນ</a></div>
                                    <div class="row mb-2"><a href="/classroominfos" class="btn btn-info text-1em w-100">ຂໍ້ມູນຫ້ອງຮຽນ</a></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 mb-4">
                            <div class="card h-100">
                                <div class="card-header bg-light">
                                    <h5 class="text-center">ຈັດການຕາຕະລາງ</h5>
                                </div>
                                <div class="card-body">
                                    <div class="row mb-2">
                                        <insert-schedule-button csrf="{{ $token }}" element-class="w-100" button-class="btn-info text-1em w-100" />
                                    </div>
                                    <div class="row mb-2">
                                        <manage-schedules-select-major csrf="{{ $token }}" element-class="w-100" button-class="btn-info text-1em w-100" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
