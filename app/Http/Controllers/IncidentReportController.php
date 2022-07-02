<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateIncidentReportRequest;
use App\Models\IncidentReport;
use App\Services\IncidentReport\IncidentReportService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class incidentReportController extends Controller
{
    private $incidentReportService;

    public function __construct(IncidentReportService $incidentReportService) {
        $this->incidentReportService = $incidentReportService;
    }
     
    public function index()
    {
        if (Auth::user() === null)
        {
            return redirect()->route('logIn');
        }
        $role = Auth::user()->role->role_name;
        return view('employeeFolder.home', [
            'reports' => $this->incidentReportService->getAll(),
            'role' => $role,
        ]);
    }

    public function create()
    {
        if (Auth::user() === null)
        {
            return redirect()->route('logIn');
        }
        $role = Auth::user()->role->role_name;
        return view('employeeFolder.create', [
            'reports' => $this->incidentReportService->getIncidentReports($role),
            'role' => $role,
            'action' => 'create',
        ]);
    }

    public function store(Request $request)
    {
        $data = [
            'date' => $request->input('input-date'),
            'fire_alarm_level' => $request->input('input-fire-alarm-level'),
            'cause_of_incident' => $request->input('input-cause-of-incident'),
            'estimated_damage' => $request->input('input-estimated-damage'),
            'reported_by' => Auth::user()->id,
            'description' => $request->input('input-description'),
            'street' => $request->input('input-street'),
            'block_no' => $request->input('input-block-no'),
            'house_type' => $request->input('input-house-type'),
        ];

        $this->incidentReportService->create($data);

        return redirect()->route('create');
    }

    public function show(IncidentReport $incident_report)
    {
        if (Auth::user() === null)
        {
            return redirect()->route('logIn');
        }
        $role = Auth::user()->role->role_name;
        return view('employeeFolder.show', [
            'report' => $incident_report,
            'role' => $role,
            'action' => 'show',
        ]);
    }

    public function confirmApproveData(IncidentReport $incident_report)
    {
        if (Auth::user() === null)
        {
            return redirect()->route('logIn');
        }
        $role = Auth::user()->role->role_name;
        return view('employeeFolder.show', [
            'report' => $incident_report,
            'role' => $role,
            'action' => 'approving',
        ]);
    }

    public function confirmRejectData(IncidentReport $incident_report)
    {
        if (Auth::user() === null)
        {
            return redirect()->route('logIn');
        }
        $role = Auth::user()->role->role_name;
        return view('employeeFolder.show', [
            'report' => $incident_report,
            'role' => $role,
            'action' => 'rejecting',
        ]);
    }

    public function edit(IncidentReport $incident_report)
    {
        $role = Auth::user()->role->role_name;
        if (Auth::user() === null)
        {
            return redirect()->route('logIn');
        }
        return view('employeeFolder.edit', [
            'report' => $incident_report,
            'role' => $role,
            'action' => 'edit',
        ]);
    }

    public function update(Request $request, IncidentReport $incident_report)
    {
        $data = [
            'date' => $request->input('input-date'),
            'fire_alarm_level' => $request->input('input-fire-alarm-level'),
            'cause_of_incident' => $request->input('input-cause-of-incident'),
            'estimated_damage' => $request->input('input-estimated-damage'),
            'reported_by' => $request->input('input-reported-by'),
            'description' => $request->input('input-description'),
            'street' => $request->input('input-street'),
            'block_no' => $request->input('input-block-no'),
            'house_type' => $request->input('input-house-type'),
        ];

        $incident_report->update($data);

        return redirect()->route('create');
    }

    public function destroy(IncidentReport $incident_report)
    {
        $incident_report->delete();

        return redirect()->route('create');
    }

    public function approve(Request $request, IncidentReport $incident_report)
    {
        
        $data = [
            'date' => $request->input('input-date'),
            'fire_alarm_level' => $request->input('input-fire-alarm-level'),
            'cause_of_incident' => $request->input('input-cause-of-incident'),
            'estimated_damage' => $request->input('input-estimated-damage'),
            'reported_by' => $request->input('input-reported-by'),
            'description' => $request->input('input-description'),
            'barangay' => $request->input('input-barangay'),
            'block_no' => $request->input('input-block-no'),
            'house_type' => $request->input('input-house-type'),
            'is_approved' => true,
        ];

        $incident_report->update($data);

        return redirect()->route('create');
    }

    public function reject(Request $request, IncidentReport $incident_report)
    {
        
        $data = [
            'date' => $request->input('input-date'),
            'fire_alarm_level' => $request->input('input-fire-alarm-level'),
            'cause_of_incident' => $request->input('input-cause-of-incident'),
            'estimated_damage' => $request->input('input-estimated-damage'),
            'reported_by' => $request->input('input-reported-by'),
            'description' => $request->input('input-description'),
            'barangay' => $request->input('input-barangay'),
            'block_no' => $request->input('input-block-no'),
            'house_type' => $request->input('input-house-type'),
            'is_rejected' => true,
        ];

        $incident_report->update($data);

        return redirect()->route('create');
    }
}
