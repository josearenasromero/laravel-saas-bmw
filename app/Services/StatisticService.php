<?php

namespace App\Services;

use App\Services\CommonService;

use Validator;
use \DateTime;

use App\Incident;
use App\Business;
use App\Report;

class StatisticService
{
    protected $common_service;

    public function __construct(CommonService $common_service)
    {
        $this->common_service = $common_service;
    }

    public function getGlobalReportStatusTableData($parameters)
    {   
        $begin_date        = $parameters['begin_date'];
        $end_date          = $parameters['end_date'];
		
		$begin_date = explode("/", $begin_date);
		$begin_date = $begin_date[2] . "-" . $begin_date[1] . "-" . $begin_date[0];
		$end_date = explode("/", $end_date);
		$end_date = $end_date[2] . "-" . $end_date[1] . "-" . $end_date[0];
		
		
        $selected_business = $parameters['selected_business'];
        $selected_bases    = $parameters['selected_bases'];
        $selected_statuses = $parameters['selected_statuses'];
        $months_name       = $this->common_service->getMonthsName();
        $counters          = array();
        $tot_pro           = 0;
        $tot_lev           = 0; 
        $tot_pen           = 0; 
        $tot_anu           = 0;
        
        for ($i = 0; $i < 12; $i++) {
            $month           = $i + 1;
            $counters[$i][0] = $months_name[$i];
            $counters[$i][1] = count(Report::whereIn("business_id", $selected_business)->whereBetween("event_date", [$begin_date, $end_date])->whereMonth("event_date","=",$month)->whereIn('base_id', $selected_bases)->where('status', '=', 'En Proceso')->get());
            $counters[$i][2] = count(Report::whereIn("business_id", $selected_business)->whereBetween("event_date", [$begin_date, $end_date])->whereMonth("event_date","=",$month)->whereIn('base_id', $selected_bases)->where('status', '=', 'Levantada')->get());
            $counters[$i][3] = count(Report::whereIn("business_id", $selected_business)->whereBetween("event_date", [$begin_date, $end_date])->whereMonth("event_date","=",$month)->whereIn('base_id', $selected_bases)->where('status', '=', 'Pendiente')->get());
            $counters[$i][4] = count(Report::whereIn("business_id", $selected_business)->whereBetween("event_date", [$begin_date, $end_date])->whereMonth("event_date","=",$month)->whereIn('base_id', $selected_bases)->where('status', '=', 'Anulada')->get());
            $counters[$i][5] = $counters[$i][1] + $counters[$i][2] + $counters[$i][3] + $counters[$i][4];
            $counters[$i][6] = ($counters[$i][5] == 0) ? 0 : round($counters[$i][2] / $counters[$i][5], 2);

            //Totals
            $tot_pro += $counters[$i][1];
            $tot_lev += $counters[$i][2];
            $tot_pen += $counters[$i][3];
            $tot_anu += $counters[$i][4];
        }

        $counters[12][0] = 'Total';
        $counters[12][1] = $tot_pro;
        $counters[12][2] = $tot_lev;
        $counters[12][3] = $tot_pen;
        $counters[12][4] = $tot_anu;
        $counters[12][5] = $tot_pro + $tot_lev + $tot_pen + $tot_anu;
        $counters[12][6] = ($counters[12][5] == 0) ? 0 : round($counters[12][2] / $counters[12][5], 2);

        return $counters;
    }

    public function getGlobalPendingInProcessData($parameters)
    {   
        $begin_date        = $parameters['begin_date'];
        $end_date          = $parameters['end_date'];
		
		$begin_date = str_replace('/', '-', $begin_date);
		$end_date = str_replace('/', '-', $end_date);
		
		$begin_date = date('Y-m-d', strtotime($begin_date));
		$end_date = date('Y-m-d', strtotime($end_date));
		
        $selected_business = $parameters['selected_business'];
        $selected_bases    = $parameters['selected_bases'];
        $selected_statuses = $parameters['selected_statuses'];
        $list_business     = Business::whereIn('id', $selected_business)->orderBy('name')->get();
        $businesses        = array();
        $k                 = 0;

        foreach ($list_business as $business) {
            $counter_total = count(Report::where("business_id","=", $business->id)->whereBetween("event_date", [$begin_date, $end_date])->whereIn('base_id', $selected_bases)->whereIn('status', $selected_statuses)->get());

            if ($counter_total > 0){
                $counters = array();
                for ($i = 1; $i <= 12; $i++) {
                    $counters[$i] = count(Report::where("business_id","=", $business->id)->whereBetween("event_date", [$begin_date, $end_date])->whereMonth("event_date","=",$i)->whereIn('base_id', $selected_bases)->whereIn('status', $selected_statuses)->get());
                }
                $bs['business'] = $business->name;
                $bs['counters'] = $counters;
                $businesses[$k] = $bs;
                $k++;
            }
        }
        $result['businesses'] = $businesses;
        return compact('parameters', 'result');
    }

}
