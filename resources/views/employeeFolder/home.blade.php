@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <h1 class='text-center'>Fire Incident Reports</h1>
                <br>
                <table class="table table-bordered table-hover">
                    <thead>
                        <th class='text-center'>Street</th>
                        <th class='text-center'>Block Number</th>
                        <th class='text-center'>House Type</th>
                        <th class='text-center'>Date</th>
                        <th class='text-center'>Fire Alarm Level</th>
                        <th class='text-center'>Cause of Incident</th>
                        <th class='text-center'>Estimated Damage</th>
                        <th class='text-center'>Reported By</th>
                        <th class='text-center'>Status</th>
                    </thead>
                    <tbody>
                        @foreach ($reports as $report)
                            @if ($report['is_approved'] == 1 && $report['is_rejected'] == 0)
                                <tr>
                                    <td class='text-center'>{{ $report['street'] }}</td>
                                    <td class='text-center'>{{ $report['block_no'] }}</td>
                                    <td class='text-center'>{{ $report['house_type'] }}</td>
                                    <td class='text-center'>{{ $report['date'] }}</td>
                                    <td class='text-center'>{{ $report['fire_alarm_level'] }}</td>
                                    <td class='text-center'>{{ $report['cause_of_incident'] }}</td>
                                    <td class='text-center'>{{ $report['estimated_damage'] }}</td>
                                    <td class='text-center'>{{ $report->reportedBy->name }}</td>
                                    @if ($report['is_approved'] == 1 && $report['is_rejected'] == 0)
                                        <td class='text-center'>Approved</td>
                                    @else
                                        <td class='text-center'>Data Error</td>
                                    @endif
                                    <td class="text-center">
                                        <a href="{{ route('show', $report['id']) }}">View</a>
                                    </td>
                                </tr>
                            @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
