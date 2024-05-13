<?php

namespace App\Services;

use App\Services\CommonService;

use Validator;
use \DateTime;

use App\Report;
use App\Business;
use App\Criticity;

class ReportService
{
    protected $common_service;

    public function __construct(CommonService $common_service)
    {
        $this->common_service = $common_service;
    }

    public function getReports($parameters)
    {
        $from_date = $parameters['from_date'];
        $to_date   = $parameters['to_date'];
        $is_global = $parameters['is_global'];

        if ($is_global) {
            $reports = Report::whereBetween("event_date", [$from_date, $to_date])->orderBy('event_date', 'DESC')->get();
        } else {
            if(session('load_business') == 1) {
                $reports = Report::whereIn("business_id", array(1, 193, 194, 195, 196, 197, 198, 199, 200, 201, 202, 203, 204, 205, 206, 207, 208, 209, 210, 211, 212, 213, 214, 215, 216, 217, 218, 219, 220, 221, 222, 223, 226, 227, 228, 229))->whereBetween("event_date", [$from_date, $to_date])->orderBy('event_date', 'DESC')->get();
            } else {
                $reports = Report::where("business_id", session('load_business'))->whereBetween("event_date", [$from_date, $to_date])->orderBy('event_date', 'DESC')->get();
            }
        }
		
		foreach($reports as $report)
		{
			$bn = Business::find($report->business_id);
			$report->business = ($bn!=null) ? $bn->name : "";
			
			$cr = Criticity::find($report->criticity_id);
			$report->criticity = ($cr!=null) ? $cr->calification : "";
        }

        return compact('parameters', 'reports');
    }

}
