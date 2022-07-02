@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <h1 class='text-center'>Fire Incident Report</h1>
                <br>
                <form class="row g-3" method="POST" action="{{ route('update', $report->id) }}">
                    @csrf
                    <div class="col-md-3">
                        <label class="form-label" for="input-street">Street</label>
                        <input class="form-control" type="text" name="input-street" value="{{ $report->street }}">
                    </div>
                    <div class="col-md-3">
                        <label class="form-label" for="input-block-no">Block Number</label>
                        <input class="form-control" type="text" name="input-block-no" value="{{ $report->block_no }}">
                    </div>
                    <div class="col-md-3">
                        <label class="form-label" for="input-house-type">House Type</label>
                        <input class="form-control" type="text" name="input-house-type"
                            value="{{ $report->house_type }}">
                    </div>
                    <div class="col-md-3">
                        <label class="form-label" for="input-date">Date</label>
                        <input class="form-control" type="date" name="input-date" value="{{ $report->date }}">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label" for="input-fire-alarm-level">Fire Alarm Level</label>
                        <input class="form-control" type="text" name="input-fire-alarm-level"
                            value="{{ $report->fire_alarm_level }}">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label" for="input-cause-of-incident">Cause of Incident</label>
                        <input class="form-control" type="text" name="input-cause-of-incident"
                            value="{{ $report->cause_of_incident }}">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label" for="input-estimated-damage">Estimated Damage</label>
                        <input class="form-control" type="text" name="input-estimated-damage"
                            value="{{ $report->estimated_damage }}">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label" for="input-reported-by">Reported By</label>
                        <input class="form-control" type="text" name="input-reported-by"
                            value="{{ $report->reported_by }}">
                    </div>
                    <div class="col-md-12">
                        <label class="form-label" for="input-description">Description</label>
                        <input class="form-control" type="text" name="input-description" rows="4"
                            value="{{ $report->description }}">
                    </div>
                    <div class="col-12">
                        @if ($action === 'edit')
                            <button class="btn btn-primary" type="submit">Update</button>
                        @endif
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
