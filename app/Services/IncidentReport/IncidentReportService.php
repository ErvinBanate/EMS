<?php

declare(strict_types = 1);

namespace App\Services\IncidentReport;

use App\Models\IncidentReport;
use Illuminate\Support\Facades\Auth;

class IncidentReportService 
{
    private $incidentReport;

    public function __construct(IncidentReport $incidentReport) {
        $this->incidentReport = $incidentReport;
    }

    public function create(array $data)
    {
        $this->incidentReport->create($data);
    }

    public function getAll() 
    {
        return $this->incidentReport->all();
    }

    public function getIncidentReports(string $role)
    {
        if ($role === IncidentReport::EMPLOYEE) {
            return $this->incidentReport->with('reportedBy')->where('reported_by', Auth::user()->id)->get();
        }
        if ($role === IncidentReport::TEAMLEADER) {
            return $this->incidentReport->with('reportedBy')->get();
        }
        if ($role === IncidentReport::ADMIN) {
            return $this->incidentReport->with('reportedBy')->where(['is_approved' => 1, 'is_rejected' => 0])->get();
        }
        
    }
}