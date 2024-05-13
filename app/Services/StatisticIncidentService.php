<?php

namespace App\Services;

use Validator;
use \DateTime;

use App\Incident;
use App\Business;
use App\Turn;
use App\ViaType;
use App\UnitType;
use App\IncidentArea;
use App\IncidentType;
use App\IncidentStatus;
use App\IncidentEnvType;
use App\IncidentConsequence;
use App\IncidentSocialType;
use App\InjureNature;
use App\InjureMechanism;
use App\InjuredClasification;
use App\BasicCause;
use App\ImmediateCause;
use App\BodyPartAffected;
use App\EventClasification;

class StatisticIncidentService
{
	
	public function getStatisticTurnData($year, $selected_categories)
    {   
        $list     = Turn::all();
        $tags     = array();
        $counters = array();
        $i        = 0;

        foreach ($list as $element) {
            $tags[$i] = $element->name;
            if(session('load_business') == 1) {
                $counters[$i] = count(Incident::whereYear("incidentdate","=",$year)->where("turn_id","=", $element->id)->whereIn("category_id", $selected_categories)->get());
            } else {
                $counters[$i] = count(Incident::whereYear("incidentdate","=",$year)->where("turn_id","=", $element->id)->where("business_id", session('load_business'))->whereIn("category_id", $selected_categories)->get());
            }
            $i++;
        }
        return compact('year', 'tags', 'counters');
    }

    public function getStatisticBusinessData($year, $selected_categories)
    {   
        $tags     = array();
        $counters = array();
        $i        = 0;

        if(session('load_business') == 1) {
            $list = Business::all();
            foreach ($list as $element) {
                $tags[$i] = $element->name;
                $counters[$i] = count(Incident::whereYear("incidentdate","=",$year)->where("business_id","=", $element->id)->whereIn("category_id", $selected_categories)->get());
                $i++;
            }
        } else {
            $business     = Business::where("id", session('load_business'))->get();
            $tags[$i]     = $business->name;
            $counters[$i] = count(Incident::whereYear("incidentdate","=",$year)->where("business_id", session('load_business'))->whereIn("category_id", $selected_categories)->get());
        }
        return compact('year', 'tags', 'counters');
    }

    public function getStatisticMonthData($year, $selected_categories)
    {
        $months = array();

        for ($i = 0; $i < 12; $i++) {
            $month = str_pad($i + 1, 2, "0", STR_PAD_LEFT);
            if(session('load_business') == 1) {
                $months[$i] = count(Incident::whereYear("incidentdate","=",$year)->whereMonth("incidentdate","=",$month)->whereIn("category_id", $selected_categories)->get());     
            } else {
                $months[$i] = count(Incident::whereYear("incidentdate","=",$year)->whereMonth("incidentdate","=",$month)->where("business_id", session('load_business'))->whereIn("category_id", $selected_categories)->get());   
            }
        }
        return compact('year','months');
    }

    public function getStatisticClassesData($year, $selected_categories)
    {
        $list     = IncidentType::all();
        $tags     = array();
        $counters = array();
        $i        = 0;

        foreach ($list as $element) {
            $tags[$i] = $element->name;
            if(session('load_business') == 1) {
                $counters[$i] = count(Incident::whereYear("incidentdate","=",$year)->where("incidenttype_id","=", $element->id)->whereIn("category_id", $selected_categories)->get());
            } else {
                $counters[$i] = count(Incident::whereYear("incidentdate","=",$year)->where("incidenttype_id","=", $element->id)->where("business_id", session('load_business'))->whereIn("category_id", $selected_categories)->get());
            }
            $i++;
        }
        return compact('year', 'tags', 'counters');
    }

    public function getStatisticConsequencesData($year, $selected_categories)
    {
        $list     = IncidentConsequence::all();
        $tags     = array();
        $counters = array();
        $i        = 0;

        foreach ($list as $element) {
            $tags[$i] = $element->name;
            if(session('load_business') == 1) {
                $counters[$i] = count(Incident::whereYear("incidentdate","=",$year)->where("incidentconsequence_id","=", $element->id)->whereIn("category_id", $selected_categories)->get());
            } else {
                $counters[$i] = count(Incident::whereYear("incidentdate","=",$year)->where("incidentconsequence_id","=", $element->id)->where("business_id", session('load_business'))->whereIn("category_id", $selected_categories)->get());
            }
            $i++;
        }
        return compact('year', 'tags', 'counters');
    }

    public function getStatisticEventClassificationData($year, $selected_categories)
    {
        $list     = EventClasification::all();
        $tags     = array();
        $counters = array();
        $i        = 0;

        foreach ($list as $element) {
            $tags[$i] = $element->name;
            if(session('load_business') == 1) {
                $counters[$i] = count(Incident::whereYear("incidentdate","=",$year)->where("eventclasification_id","=", $element->id)->whereIn("category_id", $selected_categories)->get());
            } else {
                $counters[$i] = count(Incident::whereYear("incidentdate","=",$year)->where("eventclasification_id","=", $element->id)->where("business_id", session('load_business'))->whereIn("category_id", $selected_categories)->get());
            }
            $i++;
        }
        return compact('year', 'tags', 'counters');
    }

    public function getStatisticAreaData($year, $selected_categories)
    {
        $list     = IncidentArea::all();
        $tags     = array();
        $counters = array();
        $i        = 0;

        foreach ($list as $element) {
            $tags[$i] = $element->name;
            if(session('load_business') == 1) {
                $counters[$i] = count(Incident::whereYear("incidentdate","=",$year)->where("incidentarea_id","=", $element->id)->whereIn("category_id", $selected_categories)->get());
            } else {
                $counters[$i] = count(Incident::whereYear("incidentdate","=",$year)->where("incidentarea_id","=", $element->id)->where("business_id", session('load_business'))->whereIn("category_id", $selected_categories)->get());
            }
            $i++;
        }
        return compact('year', 'tags', 'counters');
    }

    public function getStatisticViaTypeData($year, $selected_categories)
    {
        $list     = ViaType::all();
        $tags     = array();
        $counters = array();
        $i        = 0;

        foreach ($list as $element) {
            $tags[$i] = $element->name;
            if(session('load_business') == 1) {
                $counters[$i] = count(Incident::whereYear("incidentdate","=",$year)->where("viatype_id","=", $element->id)->whereIn("category_id", $selected_categories)->get());
            } else {
                $counters[$i] = count(Incident::whereYear("incidentdate","=",$year)->where("viatype_id","=", $element->id)->where("business_id", session('load_business'))->whereIn("category_id", $selected_categories)->get());
            }
            $i++;
        }
        return compact('year', 'tags', 'counters');
    }

    public function getStatisticClassificationInjureData($year, $selected_categories)
    {
        $list     = InjuredClasification::all();
        $tags     = array();
        $counters = array();
        $i        = 0;

        foreach ($list as $element) {
            $tags[$i]      = $element->name;
            $counters[$i]  = 0;
            if(session('load_business') == 1) {
                $counters[$i] += count(Incident::whereYear("incidentdate","=",$year)->where("injureclasification_1","=", $element->id)->whereIn("category_id", $selected_categories)->get());
                $counters[$i] += count(Incident::whereYear("incidentdate","=",$year)->where("injureclasification_2","=", $element->id)->whereIn("category_id", $selected_categories)->get());
                $counters[$i] += count(Incident::whereYear("incidentdate","=",$year)->where("injureclasification_3","=", $element->id)->whereIn("category_id", $selected_categories)->get());
                $counters[$i] += count(Incident::whereYear("incidentdate","=",$year)->where("injureclasification_4","=", $element->id)->whereIn("category_id", $selected_categories)->get());
                $counters[$i] += count(Incident::whereYear("incidentdate","=",$year)->where("injureclasification_5","=", $element->id)->whereIn("category_id", $selected_categories)->get());
            } else {
                $counters[$i] += count(Incident::whereYear("incidentdate","=",$year)->where("injureclasification_1","=", $element->id)->where("business_id", session('load_business'))->whereIn("category_id", $selected_categories)->get());
                $counters[$i] += count(Incident::whereYear("incidentdate","=",$year)->where("injureclasification_2","=", $element->id)->where("business_id", session('load_business'))->whereIn("category_id", $selected_categories)->get());
                $counters[$i] += count(Incident::whereYear("incidentdate","=",$year)->where("injureclasification_3","=", $element->id)->where("business_id", session('load_business'))->whereIn("category_id", $selected_categories)->get());
                $counters[$i] += count(Incident::whereYear("incidentdate","=",$year)->where("injureclasification_4","=", $element->id)->where("business_id", session('load_business'))->whereIn("category_id", $selected_categories)->get());
                $counters[$i] += count(Incident::whereYear("incidentdate","=",$year)->where("injureclasification_5","=", $element->id)->where("business_id", session('load_business'))->whereIn("category_id", $selected_categories)->get());
            }
            $i++;
        }
        return compact('year', 'tags', 'counters');
    }

    public function getStatisticNatureInjureData($year, $selected_categories)
    {
        $list     = InjureNature::all();
        $tags     = array();
        $counters = array();
        $i        = 0;

        foreach ($list as $element) {
            $tags[$i]      = $element->name;
            $counters[$i]  = 0;
            if(session('load_business') == 1) {
                $counters[$i] += count(Incident::whereYear("incidentdate","=",$year)->where("injurenature_1_id","=", $element->id)->whereIn("category_id", $selected_categories)->get());
                $counters[$i] += count(Incident::whereYear("incidentdate","=",$year)->where("injurenature_2_id","=", $element->id)->whereIn("category_id", $selected_categories)->get());
                $counters[$i] += count(Incident::whereYear("incidentdate","=",$year)->where("injurenature_3_id","=", $element->id)->whereIn("category_id", $selected_categories)->get());
                $counters[$i] += count(Incident::whereYear("incidentdate","=",$year)->where("injurenature_4_id","=", $element->id)->whereIn("category_id", $selected_categories)->get());
                $counters[$i] += count(Incident::whereYear("incidentdate","=",$year)->where("injurenature_5_id","=", $element->id)->whereIn("category_id", $selected_categories)->get());
            } else {
                $counters[$i] += count(Incident::whereYear("incidentdate","=",$year)->where("injurenature_1_id","=", $element->id)->where("business_id", session('load_business'))->whereIn("category_id", $selected_categories)->get());
                $counters[$i] += count(Incident::whereYear("incidentdate","=",$year)->where("injurenature_2_id","=", $element->id)->where("business_id", session('load_business'))->whereIn("category_id", $selected_categories)->get());
                $counters[$i] += count(Incident::whereYear("incidentdate","=",$year)->where("injurenature_3_id","=", $element->id)->where("business_id", session('load_business'))->whereIn("category_id", $selected_categories)->get());
                $counters[$i] += count(Incident::whereYear("incidentdate","=",$year)->where("injurenature_4_id","=", $element->id)->where("business_id", session('load_business'))->whereIn("category_id", $selected_categories)->get());
                $counters[$i] += count(Incident::whereYear("incidentdate","=",$year)->where("injurenature_5_id","=", $element->id)->where("business_id", session('load_business'))->whereIn("category_id", $selected_categories)->get());
            }
            $i++;
        }
        return compact('year', 'tags', 'counters');
    }

    public function getStatisticMechanismInjureData($year, $selected_categories)
    {
        $list     = InjureMechanism::all();
        $tags     = array();
        $counters = array();
        $i        = 0;

        foreach ($list as $element) {
            $tags[$i]      = $element->name;
            $counters[$i]  = 0;
            if(session('load_business') == 1) {
                $counters[$i] += count(Incident::whereYear("incidentdate","=",$year)->where("injuremechanism_1_id","=", $element->id)->whereIn("category_id", $selected_categories)->get());
                $counters[$i] += count(Incident::whereYear("incidentdate","=",$year)->where("injuremechanism_2_id","=", $element->id)->whereIn("category_id", $selected_categories)->get());
                $counters[$i] += count(Incident::whereYear("incidentdate","=",$year)->where("injuremechanism_3_id","=", $element->id)->whereIn("category_id", $selected_categories)->get());
                $counters[$i] += count(Incident::whereYear("incidentdate","=",$year)->where("injuremechanism_4_id","=", $element->id)->whereIn("category_id", $selected_categories)->get());
                $counters[$i] += count(Incident::whereYear("incidentdate","=",$year)->where("injuremechanism_5_id","=", $element->id)->whereIn("category_id", $selected_categories)->get());
            } else {
                $counters[$i] += count(Incident::whereYear("incidentdate","=",$year)->where("injuremechanism_1_id","=", $element->id)->where("business_id", session('load_business'))->whereIn("category_id", $selected_categories)->get());
                $counters[$i] += count(Incident::whereYear("incidentdate","=",$year)->where("injuremechanism_2_id","=", $element->id)->where("business_id", session('load_business'))->whereIn("category_id", $selected_categories)->get());
                $counters[$i] += count(Incident::whereYear("incidentdate","=",$year)->where("injuremechanism_3_id","=", $element->id)->where("business_id", session('load_business'))->whereIn("category_id", $selected_categories)->get());
                $counters[$i] += count(Incident::whereYear("incidentdate","=",$year)->where("injuremechanism_4_id","=", $element->id)->where("business_id", session('load_business'))->whereIn("category_id", $selected_categories)->get());
                $counters[$i] += count(Incident::whereYear("incidentdate","=",$year)->where("injuremechanism_5_id","=", $element->id)->where("business_id", session('load_business'))->whereIn("category_id", $selected_categories)->get());
            }
            $i++;
        }
        return compact('year', 'tags', 'counters');
    }

    public function getStatisticBodyPartInjureData($year, $selected_categories)
    {
        $list     = BodyPartAffected::all();
        $tags     = array();
        $counters = array();
        $i        = 0;

        foreach ($list as $element) {
            $tags[$i]      = $element->name;
            $counters[$i]  = 0;
            if(session('load_business') == 1) {
                $counters[$i] += count(Incident::whereYear("incidentdate","=",$year)->where("bodypartaffected_1_id","=", $element->id)->whereIn("category_id", $selected_categories)->get());
                $counters[$i] += count(Incident::whereYear("incidentdate","=",$year)->where("bodypartaffected_2_id","=", $element->id)->whereIn("category_id", $selected_categories)->get());
                $counters[$i] += count(Incident::whereYear("incidentdate","=",$year)->where("bodypartaffected_3_id","=", $element->id)->whereIn("category_id", $selected_categories)->get());
                $counters[$i] += count(Incident::whereYear("incidentdate","=",$year)->where("bodypartaffected_4_id","=", $element->id)->whereIn("category_id", $selected_categories)->get());
                $counters[$i] += count(Incident::whereYear("incidentdate","=",$year)->where("bodypartaffected_5_id","=", $element->id)->whereIn("category_id", $selected_categories)->get());
            } else {
                $counters[$i] += count(Incident::whereYear("incidentdate","=",$year)->where("bodypartaffected_1_id","=", $element->id)->where("business_id", session('load_business'))->whereIn("category_id", $selected_categories)->get());
                $counters[$i] += count(Incident::whereYear("incidentdate","=",$year)->where("bodypartaffected_2_id","=", $element->id)->where("business_id", session('load_business'))->whereIn("category_id", $selected_categories)->get());
                $counters[$i] += count(Incident::whereYear("incidentdate","=",$year)->where("bodypartaffected_3_id","=", $element->id)->where("business_id", session('load_business'))->whereIn("category_id", $selected_categories)->get());
                $counters[$i] += count(Incident::whereYear("incidentdate","=",$year)->where("bodypartaffected_4_id","=", $element->id)->where("business_id", session('load_business'))->whereIn("category_id", $selected_categories)->get());
                $counters[$i] += count(Incident::whereYear("incidentdate","=",$year)->where("bodypartaffected_5_id","=", $element->id)->where("business_id", session('load_business'))->whereIn("category_id", $selected_categories)->get());
            }
            $i++;
        }
        return compact('year', 'tags', 'counters');
    }

    public function getStatisticUnitTypeData($year, $selected_categories)
    {
        $list     = UnitType::all();
        $tags     = array();
        $counters = array();
        $i        = 0;

        foreach ($list as $element) {
            $tags[$i] = $element->name;
            if(session('load_business') == 1) {
                $counters[$i] = count(Incident::whereYear("incidentdate","=",$year)->where("unittype_id","=", $element->id)->whereIn("category_id", $selected_categories)->get());
            } else {
                $counters[$i] = count(Incident::whereYear("incidentdate","=",$year)->where("unittype_id","=", $element->id)->where("business_id", session('load_business'))->whereIn("category_id", $selected_categories)->get());
            }
            $i++;
        }
        return compact('year', 'tags', 'counters');
    }

    public function getStatisticIncidentEnvData($year, $selected_categories)
    {
        $list     = IncidentEnvType::all();
        $tags     = array();
        $counters = array();
        $i        = 0;

        foreach ($list as $element) {
            $tags[$i] = $element->name;
            if(session('load_business') == 1) {
                $counters[$i] = count(Incident::whereYear("incidentdate","=",$year)->where("incidentenvtype_id","=", $element->id)->whereIn("category_id", $selected_categories)->get());
            } else {
                $counters[$i] = count(Incident::whereYear("incidentdate","=",$year)->where("incidentenvtype_id","=", $element->id)->where("business_id", session('load_business'))->whereIn("category_id", $selected_categories)->get());
            }
            $i++;
        }
        return compact('year', 'tags', 'counters');
    }

    public function getStatisticImmediateCauseData($year, $selected_categories)
    {
        $list     = ImmediateCause::all();
        $tags     = array();
        $counters = array();
        $i        = 0;

        foreach ($list as $element) {
            $tags[$i]     = $element->name;
            $counters[$i] = 0;
            if(session('load_business') == 1) {
                $counters[$i] += count(Incident::whereYear("incidentdate","=",$year)->where("immediatecause_1_id","=", $element->id)->whereIn("category_id", $selected_categories)->get());
                $counters[$i] += count(Incident::whereYear("incidentdate","=",$year)->where("immediatecause_2_id","=", $element->id)->whereIn("category_id", $selected_categories)->get());
                $counters[$i] += count(Incident::whereYear("incidentdate","=",$year)->where("immediatecause_3_id","=", $element->id)->whereIn("category_id", $selected_categories)->get());
                $counters[$i] += count(Incident::whereYear("incidentdate","=",$year)->where("immediatecause_4_id","=", $element->id)->whereIn("category_id", $selected_categories)->get());
                $counters[$i] += count(Incident::whereYear("incidentdate","=",$year)->where("immediatecause_5_id","=", $element->id)->whereIn("category_id", $selected_categories)->get());
            } else {
                $counters[$i] += count(Incident::whereYear("incidentdate","=",$year)->where("immediatecause_1_id","=", $element->id)->where("business_id", session('load_business'))->whereIn("category_id", $selected_categories)->get());
                $counters[$i] += count(Incident::whereYear("incidentdate","=",$year)->where("immediatecause_2_id","=", $element->id)->where("business_id", session('load_business'))->whereIn("category_id", $selected_categories)->get());
                $counters[$i] += count(Incident::whereYear("incidentdate","=",$year)->where("immediatecause_3_id","=", $element->id)->where("business_id", session('load_business'))->whereIn("category_id", $selected_categories)->get());
                $counters[$i] += count(Incident::whereYear("incidentdate","=",$year)->where("immediatecause_4_id","=", $element->id)->where("business_id", session('load_business'))->whereIn("category_id", $selected_categories)->get());
                $counters[$i] += count(Incident::whereYear("incidentdate","=",$year)->where("immediatecause_5_id","=", $element->id)->where("business_id", session('load_business'))->whereIn("category_id", $selected_categories)->get());
            }
            $i++;
        }
        return compact('year', 'tags', 'counters');
    }

    public function getStatisticBasicCauseData($year, $selected_categories)
    {
        $list     = BasicCause::all();
        $tags     = array();
        $counters = array();
        $i        = 0;

        foreach ($list as $element) {
            $tags[$i]     = $element->name;
            $counters[$i] = 0;
            if(session('load_business') == 1) {
                $counters[$i] += count(Incident::whereYear("incidentdate","=",$year)->where("basiccause_1_id","=", $element->id)->whereIn("category_id", $selected_categories)->get());
                $counters[$i] += count(Incident::whereYear("incidentdate","=",$year)->where("basiccause_2_id","=", $element->id)->whereIn("category_id", $selected_categories)->get());
                $counters[$i] += count(Incident::whereYear("incidentdate","=",$year)->where("basiccause_3_id","=", $element->id)->whereIn("category_id", $selected_categories)->get());
                $counters[$i] += count(Incident::whereYear("incidentdate","=",$year)->where("basiccause_4_id","=", $element->id)->whereIn("category_id", $selected_categories)->get());
                $counters[$i] += count(Incident::whereYear("incidentdate","=",$year)->where("basiccause_5_id","=", $element->id)->whereIn("category_id", $selected_categories)->get());
            } else {
                $counters[$i] += count(Incident::whereYear("incidentdate","=",$year)->where("basiccause_1_id","=", $element->id)->where("business_id", session('load_business'))->whereIn("category_id", $selected_categories)->get());
                $counters[$i] += count(Incident::whereYear("incidentdate","=",$year)->where("basiccause_2_id","=", $element->id)->where("business_id", session('load_business'))->whereIn("category_id", $selected_categories)->get());
                $counters[$i] += count(Incident::whereYear("incidentdate","=",$year)->where("basiccause_3_id","=", $element->id)->where("business_id", session('load_business'))->whereIn("category_id", $selected_categories)->get());
                $counters[$i] += count(Incident::whereYear("incidentdate","=",$year)->where("basiccause_4_id","=", $element->id)->where("business_id", session('load_business'))->whereIn("category_id", $selected_categories)->get());
                $counters[$i] += count(Incident::whereYear("incidentdate","=",$year)->where("basiccause_5_id","=", $element->id)->where("business_id", session('load_business'))->whereIn("category_id", $selected_categories)->get());
            }
            $i++;
        }
        return compact('year', 'tags', 'counters');
    }

    public function getStatisticCommitteeSummaryData($parameters, $selected_categories)
    {
        $begin_date        = $parameters['begin_date'];
        $end_date          = $parameters['end_date'];
		
		$begin_date = str_replace('/', '-', $begin_date);
		$end_date = str_replace('/', '-', $end_date);
		
		$begin_date = date('Y-m-d', strtotime($begin_date));
		$end_date = date('Y-m-d', strtotime($end_date));
		
        $month             = $parameters['month'];
        $selected_business = $parameters['selected_business'];
        $tags              = array();
        $counters          = array();
        $tags[0]           = "Registrable";
        $tags[1]           = "No Registrable";

        if ($month == "00"){
            //Todos los meses seleccionados No Registrable
            $counters[0][0]    = count(Incident::whereBetween("incidentdate", [$begin_date, $end_date])->whereIn("business_id", $selected_business)->whereIn("eventclasification_id",[1,2])->whereIn("category_id", $selected_categories)->whereMonth("incidentdate", "=", "01")->get());
            //Todos los meses seleccionados Registrable
            $counters[0][1]    = count(Incident::whereBetween("incidentdate", [$begin_date, $end_date])->whereIn("business_id", $selected_business)->whereIn("eventclasification_id",[3])->whereIn("category_id", $selected_categories)->whereMonth("incidentdate", "=", "01")->get());
			
			//Todos los meses seleccionados No Registrable
            $counters[1][0]    = count(Incident::whereBetween("incidentdate", [$begin_date, $end_date])->whereIn("business_id", $selected_business)->whereIn("eventclasification_id",[1,2])->whereIn("category_id", $selected_categories)->whereMonth("incidentdate", "=", "02")->get());
            //Todos los meses seleccionados Registrable
            $counters[1][1]    = count(Incident::whereBetween("incidentdate", [$begin_date, $end_date])->whereIn("business_id", $selected_business)->whereIn("eventclasification_id",[3])->whereIn("category_id", $selected_categories)->whereMonth("incidentdate", "=", "02")->get());
			
			//Todos los meses seleccionados No Registrable
            $counters[2][0]    = count(Incident::whereBetween("incidentdate", [$begin_date, $end_date])->whereIn("business_id", $selected_business)->whereIn("eventclasification_id",[1,2])->whereIn("category_id", $selected_categories)->whereMonth("incidentdate", "=", "03")->get());
            //Todos los meses seleccionados Registrable
            $counters[2][1]    = count(Incident::whereBetween("incidentdate", [$begin_date, $end_date])->whereIn("business_id", $selected_business)->whereIn("eventclasification_id",[3])->whereIn("category_id", $selected_categories)->whereMonth("incidentdate", "=", "03")->get());
			
			//Todos los meses seleccionados No Registrable
            $counters[3][0]    = count(Incident::whereBetween("incidentdate", [$begin_date, $end_date])->whereIn("business_id", $selected_business)->whereIn("eventclasification_id",[1,2])->whereIn("category_id", $selected_categories)->whereMonth("incidentdate", "=", "04")->get());
            //Todos los meses seleccionados Registrable
            $counters[3][1]    = count(Incident::whereBetween("incidentdate", [$begin_date, $end_date])->whereIn("business_id", $selected_business)->whereIn("eventclasification_id",[3])->whereIn("category_id", $selected_categories)->whereMonth("incidentdate", "=", "04")->get());
			
			//Todos los meses seleccionados No Registrable
            $counters[4][0]    = count(Incident::whereBetween("incidentdate", [$begin_date, $end_date])->whereIn("business_id", $selected_business)->whereIn("eventclasification_id",[1,2])->whereIn("category_id", $selected_categories)->whereMonth("incidentdate", "=", "05")->get());
            //Todos los meses seleccionados Registrable
            $counters[4][1]    = count(Incident::whereBetween("incidentdate", [$begin_date, $end_date])->whereIn("business_id", $selected_business)->whereIn("eventclasification_id",[3])->whereIn("category_id", $selected_categories)->whereMonth("incidentdate", "=", "05")->get());
			
			//Todos los meses seleccionados No Registrable
            $counters[5][0]    = count(Incident::whereBetween("incidentdate", [$begin_date, $end_date])->whereIn("business_id", $selected_business)->whereIn("eventclasification_id",[1,2])->whereIn("category_id", $selected_categories)->whereMonth("incidentdate", "=", "06")->get());
            //Todos los meses seleccionados Registrable
            $counters[5][1]    = count(Incident::whereBetween("incidentdate", [$begin_date, $end_date])->whereIn("business_id", $selected_business)->whereIn("eventclasification_id",[3])->whereIn("category_id", $selected_categories)->whereMonth("incidentdate", "=", "06")->get());
			
			//Todos los meses seleccionados No Registrable
            $counters[6][0]    = count(Incident::whereBetween("incidentdate", [$begin_date, $end_date])->whereIn("business_id", $selected_business)->whereIn("eventclasification_id",[1,2])->whereIn("category_id", $selected_categories)->whereMonth("incidentdate", "=", "07")->get());
            //Todos los meses seleccionados Registrable
            $counters[6][1]    = count(Incident::whereBetween("incidentdate", [$begin_date, $end_date])->whereIn("business_id", $selected_business)->whereIn("eventclasification_id",[3])->whereIn("category_id", $selected_categories)->whereMonth("incidentdate", "=", "07")->get());
			
			//Todos los meses seleccionados No Registrable
            $counters[7][0]    = count(Incident::whereBetween("incidentdate", [$begin_date, $end_date])->whereIn("business_id", $selected_business)->whereIn("eventclasification_id",[1,2])->whereIn("category_id", $selected_categories)->whereMonth("incidentdate", "=", "08")->get());
            //Todos los meses seleccionados Registrable
            $counters[7][1]    = count(Incident::whereBetween("incidentdate", [$begin_date, $end_date])->whereIn("business_id", $selected_business)->whereIn("eventclasification_id",[3])->whereIn("category_id", $selected_categories)->whereMonth("incidentdate", "=", "08")->get());
			
			//Todos los meses seleccionados No Registrable
            $counters[8][0]    = count(Incident::whereBetween("incidentdate", [$begin_date, $end_date])->whereIn("business_id", $selected_business)->whereIn("eventclasification_id",[1,2])->whereIn("category_id", $selected_categories)->whereMonth("incidentdate", "=", "09")->get());
            //Todos los meses seleccionados Registrable
            $counters[8][1]    = count(Incident::whereBetween("incidentdate", [$begin_date, $end_date])->whereIn("business_id", $selected_business)->whereIn("eventclasification_id",[3])->whereIn("category_id", $selected_categories)->whereMonth("incidentdate", "=", "09")->get());
			
			//Todos los meses seleccionados No Registrable
            $counters[9][0]    = count(Incident::whereBetween("incidentdate", [$begin_date, $end_date])->whereIn("business_id", $selected_business)->whereIn("eventclasification_id",[1,2])->whereIn("category_id", $selected_categories)->whereMonth("incidentdate", "=", "10")->get());
            //Todos los meses seleccionados Registrable
            $counters[9][1]    = count(Incident::whereBetween("incidentdate", [$begin_date, $end_date])->whereIn("business_id", $selected_business)->whereIn("eventclasification_id",[3])->whereIn("category_id", $selected_categories)->whereMonth("incidentdate", "=", "10")->get());
			
			//Todos los meses seleccionados No Registrable
            $counters[10][0]    = count(Incident::whereBetween("incidentdate", [$begin_date, $end_date])->whereIn("business_id", $selected_business)->whereIn("eventclasification_id",[1,2])->whereIn("category_id", $selected_categories)->whereMonth("incidentdate", "=", "11")->get());
            //Todos los meses seleccionados Registrable
            $counters[10][1]    = count(Incident::whereBetween("incidentdate", [$begin_date, $end_date])->whereIn("business_id", $selected_business)->whereIn("eventclasification_id",[3])->whereIn("category_id", $selected_categories)->whereMonth("incidentdate", "=", "11")->get());
			
			//Todos los meses seleccionados No Registrable
            $counters[11][0]    = count(Incident::whereBetween("incidentdate", [$begin_date, $end_date])->whereIn("business_id", $selected_business)->whereIn("eventclasification_id",[1,2])->whereIn("category_id", $selected_categories)->whereMonth("incidentdate", "=", "12")->get());
            //Todos los meses seleccionados Registrable
            $counters[11][1]    = count(Incident::whereBetween("incidentdate", [$begin_date, $end_date])->whereIn("business_id", $selected_business)->whereIn("eventclasification_id",[3])->whereIn("category_id", $selected_categories)->whereMonth("incidentdate", "=", "12")->get());
			
			//Acumulado No Registrable
			$counters[12][0]    = count(Incident::whereBetween("incidentdate", [$begin_date, $end_date])->whereIn("business_id", $selected_business)->whereIn("eventclasification_id",[1,2])->whereIn("category_id", $selected_categories)->get());
			//Acumulado Registrable
			$counters[12][1]    = count(Incident::whereBetween("incidentdate", [$begin_date, $end_date])->whereIn("business_id", $selected_business)->whereIn("eventclasification_id",[3])->whereIn("category_id", $selected_categories)->get());
			
        } else {
            //Mes seleccionado No Registrable
            $counters[0][0]    = count(Incident::whereBetween("incidentdate", [$begin_date, $end_date])->whereMonth("incidentdate","=",$month)->whereIn("business_id", $selected_business)->whereIn("eventclasification_id",[1,2])->whereIn("category_id", $selected_categories)->get());
            //Mes seleccionado Registrable
            $counters[0][1]    = count(Incident::whereBetween("incidentdate", [$begin_date, $end_date])->whereMonth("incidentdate","=",$month)->whereIn("business_id", $selected_business)->whereIn("eventclasification_id",[3])->whereIn("category_id", $selected_categories)->get());
			
			//Acumulado No Registrable
			$counters[1][0]    = count(Incident::whereBetween("incidentdate", [$begin_date, $end_date])->whereIn("business_id", $selected_business)->whereIn("eventclasification_id",[1,2])->whereIn("category_id", $selected_categories)->get());
			//Acumulado Registrable
			$counters[1][1]    = count(Incident::whereBetween("incidentdate", [$begin_date, $end_date])->whereIn("business_id", $selected_business)->whereIn("eventclasification_id",[3])->whereIn("category_id", $selected_categories)->get());
        }
        
        
        
        $incidents         = Incident::whereBetween("incidentdate", [$begin_date, $end_date])->whereIn("business_id", $selected_business)->whereIn("category_id", $selected_categories)->get();

        foreach($incidents as $incident)
        {
            $incident->business           = Business::find($incident->business_id);
            $incident->eventClasification = EventClasification::find($incident->eventclasification_id);
            $incident->IncidentType       = IncidentType::find($incident->incidenttype_id);

            if ($incident->eventclasification_id == 1 || $incident->eventclasification_id == 2){
                $incident->registrable =  "NO";
            } elseif ($incident->eventclasification_id == 3) {
                $incident->registrable =  "SI";
            } else {
                $incident->registrable =  "";
            }
			
			$nd = explode("-", $incident->incidentdate);
			$incident->incidentdate_formatted = $incident->incidentdate;
			if(count($nd) > 2) {
				$incident->incidentdate_formatted = $nd[2] . "-" . $nd[1] . "-" . $nd[0];
			}
        }

        $result['tags']      = $tags;
        $result['counters']  = $counters;
        $result['incidents'] = $incidents;
		$result['month'] = $month;
        return compact('parameters', 'result');
    }

    public function getStatisticCommitteeBusinessData($parameters, $selected_categories)
    {   
        $begin_date      = $parameters['begin_date'];
        $end_date        = $parameters['end_date'];
		
		$begin_date = str_replace('/', '-', $begin_date);
		$end_date = str_replace('/', '-', $end_date);
		
		$begin_date = date('Y-m-d', strtotime($begin_date));
		$end_date = date('Y-m-d', strtotime($end_date));
		
        $list_business   = Business::whereIn('id', $parameters['selected_business'])->orderBy('name')->get();
        $list_events     = EventClasification::all();
        $selected_events = $parameters['selected_events'];
        $tags            = array();
        $business_ids    = array();
        $counters_total  = array();
        $counters        = array();
        $i               = 0;

        foreach ($list_business as $business) {
            $counter = count(Incident::whereBetween("incidentdate", [$begin_date, $end_date])->where("business_id","=", $business->id)->whereIn('eventclasification_id', $selected_events)->whereIn("category_id", $selected_categories)->get());
            if ($counter > 0){
                $tags[$i]           = $business->name;
                $business_ids[$i]   = $business->id;
                $counters_total[$i] = $counter;
                $i++;
            }
        }
        
        foreach ($list_events as $i => $event) {
            foreach ($business_ids as $j => $business_id) {
                $counters[$i][$j] = in_array($event->id, $selected_events) ? count(Incident::whereBetween("incidentdate", [$begin_date, $end_date])->where("business_id","=", $business_id)->where("eventclasification_id","=", $event->id)->whereIn("category_id", $selected_categories)->get()) : 0;
            }
        }

        $result['tags']           = $tags;
        $result['counters']       = $counters;
        $result['counters_total'] = $counters_total;
        return compact('parameters', 'result');
    }

    public function getStatisticCommitteeCorrectiveActionPlanData($parameters, $selected_categories)
    {   
        $selected_events   = $parameters['selected_events'];
        $selected_business = $parameters['selected_business'];
        $list_business     = Business::whereIn('id', $selected_business)->orderBy('name')->get();
		
		$begin_date      = $parameters['begin_date'];
        $end_date        = $parameters['end_date'];
		
		$begin_date = str_replace('/', '-', $begin_date);
		$end_date = str_replace('/', '-', $end_date);
		
		$begin_date = date('Y-m-d', strtotime($begin_date));
		$end_date = date('Y-m-d', strtotime($end_date));
		
		$begin_date_format = DateTime::createFromFormat('Y-m-d', $begin_date);
		$end_date_format = DateTime::createFromFormat('Y-m-d', $end_date);
		
        $months_name       = $parameters['months_name'];
		
        $begin_year        = $begin_date_format->format('Y');
        $begin_month       = $begin_date_format->format('m');
        $end_year          = $end_date_format->format('Y');
        $end_month         = $end_date_format->format('m');

        $years = array();
        for ($i = $begin_year; $i <= $end_year; $i++) {
            
            $b_month = ($i == $begin_year) ? (int) $begin_month : 1;
            $e_month = ($i == $end_year)   ? (int) $end_month   : 12;

            $months = array();
            for ($j = $b_month; $j <= $e_month ; $j++) {

                $businesses = array();
                foreach ($list_business as $k => $business) {
                    
                    $list_incidents = Incident::whereYear("incidentdate","=",$i)->whereMonth("incidentdate","=",$j)->where("business_id","=", $business->id)->whereIn("eventclasification_id",$selected_events)->whereIn("category_id", $selected_categories)->get();
                    $incidents      = array();
                    foreach ($list_incidents as $l => $incident) {

                        $actions = array();
                        for ($m = 1; $m <= 10; $m++) {
                            if ($incident['causecorrectiveaction_'.$m] != ""){
                                $action['corrective_action'] = $incident['causecorrectiveaction_'.$m];
                                $action['required_date']     = $incident['causerequireddate_'.$m];
                                $action['executed_date']     = $incident['caseexecuteddate_'.$m];
								
								$nd1 = explode("-", $action['required_date']);
								$action['required_date_formatted'] = $action['required_date'];
								if(count($nd1) > 2) {
									$action['required_date_formatted'] = $nd1[2] . "-" . $nd1[1] . "-" . $nd1[0];
								}
								
								$nd2 = explode("-", $action['executed_date']);
								$action['executed_date_formatted'] = $action['executed_date'];
								if(count($nd2) > 2) {
									$action['executed_date_formatted'] = $nd2[2] . "-" . $nd2[1] . "-" . $nd2[0];
								}
								
                                $actions[$m -1]  = $action;
                            }
                        }

                        $in['incident'] = IncidentType::find($incident->incidenttype_id)->name;
                        $in['date']     = $incident->incidentdate;
						
						$nd = explode("-", $incident->incidentdate);
						$in['incidentdate_formatted'] = $incident->incidentdate;
						if(count($nd) > 2) {
							$in['incidentdate_formatted'] = $nd[2] . "-" . $nd[1] . "-" . $nd[0];
						}
						
                        $in['actions']  = $actions;
                        $incidents[$l]  = $in;
                    }

                    $bs['business']  = $business->name;
                    $bs['incidents'] = $incidents;
                    $businesses[$k]  = $bs;
                }

                $month['month']        = $months_name[$j - 1];
                $month['businesses']   = $businesses;
                $months[$j - $b_month] = $month;
            }

            $year['year']            = $i;
            $year['months']          = $months;
            $years[$i - $begin_year] = $year;
        }   

        $result['years'] = $years;
        return compact('parameters', 'result');
    }

    public function getStatisticCommitteeCorrectiveActionStats($parameters, $selected_categories)
    {   
        $begin_date      = $parameters['begin_date'];
        $end_date        = $parameters['end_date'];
		
		$begin_date = str_replace('/', '-', $begin_date);
		$end_date = str_replace('/', '-', $end_date);
		
		$begin_date = date('Y-m-d', strtotime($begin_date));
		$end_date = date('Y-m-d', strtotime($end_date));
		
        $selected_business = $parameters['selected_business'];
        $selected_events   = $parameters['selected_events'];
        $months            = $parameters['months_name'];
        $tags              = array();
        $counters          = array();

        for ($i = 0; $i < 12; $i++) {
            
            $month           = $i + 1;
            $tags[$i]        = $months[$i];
            $counters[0][$i] = 0;
            $counters[1][$i] = 0;
            $counters[2][$i] = 0;

            for($j = 1; $j <= 10; $j++) {
                $counters[0][$i] += count(Incident::whereBetween("incidentdate", [$begin_date, $end_date])->whereMonth("incidentdate","=",$month)->whereIn("business_id", $selected_business)->whereIn("eventclasification_id",$selected_events)->where("causecorrectiveaction_".$j,"<>","")->whereIn("category_id", $selected_categories)->get());
                $counters[1][$i] += count(Incident::whereBetween("incidentdate", [$begin_date, $end_date])->whereMonth("incidentdate","=",$month)->whereIn("business_id", $selected_business)->whereIn("eventclasification_id",$selected_events)->where("causecorrectiveaction_".$j,"<>","")->where("caseexecuteddate_".$j,"<>","")->whereIn("category_id", $selected_categories)->get());
                $counters[2][$i] += count(Incident::whereBetween("incidentdate", [$begin_date, $end_date])->whereMonth("incidentdate","=",$month)->whereIn("business_id", $selected_business)->whereIn("eventclasification_id",$selected_events)->where("causecorrectiveaction_".$j,"<>","")->where("caseexecuteddate_".$j,"=","")->whereIn("category_id", $selected_categories)->get());
            }

            
            $counters[3][$i] = "";
			$pending_businesses = array();
			for($m = 1; $m <= 10; $m++) {
				$incidents = Incident::whereBetween("incidentdate", [$begin_date, $end_date])->whereMonth("incidentdate","=",$month)->whereIn("business_id", $selected_business)->whereIn("eventclasification_id",$selected_events)->where("causecorrectiveaction_".$m,"<>","")->where("caseexecuteddate_".$m,"=","")->whereIn("category_id", $selected_categories)->get();
				foreach ($incidents as $incident) {
					$business = Business::find($incident->business_id);
					$pending  = 0;
					for($j = 1; $j <= 10; $j++) {
						$pending += count(Incident::where("business_id","=", $incident->business_id)->where("causecorrectiveaction_".$j,"<>","")->where("caseexecuteddate_".$j,"=","")->whereIn("category_id", $selected_categories)->get());
					}
					$cn = $counters[3][$i].$business->name."(".$pending.")";
					if(!in_array($cn, $pending_businesses)) {
						$pending_businesses[] = $cn;
					}
				}
			}
			$counters[3][$i] = implode(", ", $pending_businesses);
        }
        
        $result['tags']     = $tags;
        $result['counters'] = $counters;

        return compact('parameters', 'result');
    }

}
