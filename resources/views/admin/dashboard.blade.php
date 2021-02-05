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
                    <div class="row">
                        <div class="col-md-6 mb-4">
                            <div class="card">
                                <div class="card-header bg-light">
                                    <h5 class="text-center">ຈັດການຜູ້ໃຊ້</h5>
                                </div>
                                <div class="card-body">
                                    <div class="row mb-2"><a href="/adduser" class="btn btn-info text-1em w-100">ເພີ່ມຜູ້ໃຊ້</a></div>
                                    <div class="row mb-2"><a href="/manageteaching" class="btn btn-info text-1em w-100">ຈັດການການສອນ</a></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 mb-4">
                            <div class="card">
                                <div class="card-header bg-light">
                                    <h5 class="text-center">ຈັດການຄະນະ ແລະ ສາຂາວິຊາຮຽນ</h5>
                                </div>
                                <div class="card-body">
                                    <div class="row mb-2"><a href="/insertmajor" class="btn btn-info text-1em w-100">ເພີ່ມຄະນະ ແລະ ສາຂາວິຊາຮຽນ</a></div>
                                    <div class="row mb-2"><a href="/managesubjects" class="btn btn-info text-1em w-100">ຈັດການວິຊາຮຽນຂອງສາຂາ</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-4">
                            <div class="card">
                                <div class="card-header bg-light">
                                    <h5 class="text-center">ຈັດການລະບົບ</h5>
                                </div>
                                <div class="card-body">
                                    <div class="row mb-2"><insert-subject-button csrf="{{ $token }}"/></div>
                                    <div class="row mb-2"><insert-classroom-button csrf="{{ $token }}"/></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 mb-4">
                            <div class="card">
                                <div class="card-header bg-light">
                                    <h5 class="text-center">ຈັດການຕາຕະລາງ</h5>
                                </div>
                                <div class="card-body">
                                    <div class="row mb-2"><a href="/insertschedule" class="btn btn-info text-1em w-100">ເພິ່ມຊົ່ວໂມງຮຽນ</a></div>
                                    <div class="row mb-2"><a href="#" class="btn btn-info text-1em w-100">ແກ້ໄຂຕາຕະລາງ</a></div>
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
