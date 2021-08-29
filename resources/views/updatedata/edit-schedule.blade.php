@extends('layouts.main')
@section('title', 'ແກ້ໄຂຊົ່ວໂມງຮຽນ')
@section('content')
<div class="container pt-3">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">ແກ້ໄຂຊົ່ວໂມງຮຽນ</div>

                <div class="card-body">
                    <form method="POST" action="/schedule/{{ $schedule->id }}">
                        @method('patch')
                        @csrf
                        <div class="form-group row">
                            <label for="date" class="col-md-4 col-form-label text-md-right">{{ __('ວັນທີ: ') }}</label>

                            <div class="col-md-6">
                                <input id="date" type="date" pattern="\d{4}-\d{2}-\d{2}" class="form-control @error('date') is-invalid @enderror" name="date" required autocomplete="date" autofocus value="{{ old('date') ?? date('Y-m-d', strtotime($schedule->date)) }}">
                                @error('date')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="starttime" class="col-md-4 col-form-label text-md-right">{{ __('ເວລາ: ') }}</label>

                            <div class="col-md-6">
                                <select class="form-control @error('starttime') is-invalid @enderror" name="starttime" id="starttime">
                                    @foreach(App\Models\ScheduleTime::all() as $time)
                                        <option value="{{ $time->from }}"
                                            @if ($time->from === $schedule->starttime && $time->to === $schedule->endtime)
                                                selected
                                            @endif >
                                            {{ $time->from }} ເຖິງ {{ $time->to }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('starttime')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <select-classroom building="{{ $schedule?->classroom?->building }}" classroom="{{ $schedule?->classroom?->id }}"/>
                        </div>

                        <div class="row">
                            <major-data faculty="{{ $schedule?->majors?->pluck('faculty')->first() }}"/>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-success mr-2 rounded">
                                    ແກ້ໄຂ
                                </button>
                                <button class="btn btn-danger rounded" onclick="submitDeleteForm(event, 'ທ່ານແນ່ໃຈບໍວ່າຕ້ອງການລົບຊົ່ວໂມງຮຽນນີ້?')">
                                    ລົບ
                                </button>
                            </div>
                        </div>
                    </form>
                    <form id="delete-form" action="/schedule/{{ $schedule->id }}" method="POST" class="d-none">
                        @csrf
                        @method('delete')
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
