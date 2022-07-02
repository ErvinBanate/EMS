@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                @if ($action === 'approving')
                    <h1 class='text-center'>Confirm Fire Incident Report</h1>
                @endif
                @if ($action === 'rejecting')
                    <h1 class='text-center'>Confirm Fire Incident Report</h1>
                @endif
                @if ($action === 'show')
                    <h1 class='text-center'>Incident Report</h1>
                @endif
                <br>
                @if ($action === 'approving')
                    <form class="row g-3" method="POST" action="{{ route('approve', $report->id) }}">
                @endif
                @if ($action === 'rejecting')
                    <form class="row g-3" method="POST" action="{{ route('reject', $report->id) }}">
                @endif
                @if ($action === 'show')
                    <form class="row g-3" method="POST" action="{{ route('update', $report->id) }}">
                @endif
                @csrf
                <div class="col-md-3">
                    <label class="form-label" for="input-street">Street</label>
                    <p class="form-control">{{ $report->street }}</p>
                    <input class="form-control" type="hidden" name="input-street" value="{{ $report->barangay }}">
                </div>
                <div class="col-md-3">
                    <label class="form-label" for="input-block-no">Block Number</label>
                    <p class="form-control">{{ $report->block_no }}</p>
                    <input class="form-control" type="hidden" name="input-block-no" value="{{ $report->block_no }}">
                </div>
                <div class="col-md-3">
                    <label class="form-label" for="input-house-type">House Type</label>
                    <p class="form-control">{{ $report->house_type }}</p>
                    <input class="form-control" type="hidden" name="input-house-type" value="{{ $report->house_type }}">
                </div>
                <div class="col-md-3">
                    <label class="form-label" for="input-date">Date</label>
                    <p class="form-control">{{ $report->date }}</p>
                    <input class="form-control" type="hidden" name="input-date" value="{{ $report->date }}">
                </div>
                <div class="col-md-6">
                    <label class="form-label" for="input-fire-alarm-level">Fire Alarm Level</label>
                    <p class="form-control">{{ $report->fire_alarm_level }}</p>
                    <input class="form-control" type="hidden" name="input-fire-alarm-level"
                        value="{{ $report->fire_alarm_level }}">
                </div>
                <div class="col-md-6">
                    <label class="form-label" for="input-cause-of-incident">Cause of Incident</label>
                    <p class="form-control">{{ $report->cause_of_incident }}</p>
                    <input class="form-control" type="hidden" name="input-cause-of-incident"
                        value="{{ $report->cause_of_incident }}">
                </div>
                <div class="col-md-6">
                    <label class="form-label" for="input-estimated-damage">Estimated Damage</label>
                    <p class="form-control">{{ $report->estimated_damage }}</p>
                    <input class="form-control" type="hidden" name="input-estimated-damage"
                        value="{{ $report->estimated_damage }}">
                </div>
                <div class="col-md-6">
                    <label class="form-label" for="input-reported-by">Reported By</label>
                    <p class="form-control">{{ $report->reportedBy->name }}</p>
                    <input class="form-control" type="hidden" name="input-reported-by"
                        value="{{ $report['reported_by'] }}">
                </div>
                <div class="col-md-12">
                    <label class="form-label" for="input-description">Description</label>
                    <p class="form-control">{{ $report->description }}<br></p>
                    <input class="form-control" type="hidden" name="input-description" rows="4"
                        value="{{ $report->description }}">
                </div>
                <div class="col-12">
                    @if ($action === 'edit')
                        <button class="btn btn-primary" type="submit">Update</button>
                    @endif
                    @if ($action === 'approving')
                        <button class="btn btn-primary" type="submit">Approve</button>
                    @endif
                    @if ($action === 'rejecting')
                        <button class="btn btn-primary" type="submit">Reject</button>
                    @endif
                </div>
                </form>
            </div>
        </div>
    </div>
@endsection
