<?php

namespace App\Services;

use \DateTime;
use Validator;

class CommonService
{
	const SUPERVISOR_ID = 1;

	public function getFirstDateOfYear($format = 'Y-01-01')
	{
		return date($format);
	}

	public function getFirstDateOfMonth($format = 'Y-m-01')
	{
		return date($format);
	}

	public function getCurrentDate($format = 'Y-m-d')
	{
		return date($format);
	}

	public function getCurrentMonth()
	{
		return date('m');
	}

	public function getCurrentYear()
	{
		return date('Y');
	}

	public function getFormattedDate($date, $format_before = 'd/m/Y', $format_after = 'Y-m-d')
	{
		if ($date == "" || $date == null) {
			return "";
		}
		$new_date = DateTime::createFromFormat($format_before, $date);
		return $new_date->format($format_after);
	}
	
	public function getList($elements, $key_field, $value_field, $allField = false)
	{
		$list = [];
		if ($allField) {
		    $list["*"] = "Todos";
        }
		foreach ($elements as $element) {
			$list[$element[$key_field]] = $element[$value_field];
		}
		return $list;
	}

	public function getJsonList($elements, $key_field, $value_field)
	{
		$list = [];
		foreach ($elements as $element) {
			$obj = [
				"Value"   => $element[$key_field],
				"Content" => $element[$value_field]
			];
			$list[] = $obj;
		}
		return $list;
	}

	public function getMonthsName()
	{
		$months = array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");
		return $months;
	}

	public function getStatusesFromReport()
	{
		$statuses = array("En Proceso"=>"En Proceso", "Levantada"=>"Levantada", "Pendiente"=>"Pendiente", "Anulada"=>"Anulada");
		return $statuses;
	}

	public function getFixedListBusiness($businesses)
	{
		//$business = array(1, 193, 194, 195, 196, 197, 198, 199, 200, 201, 202, 203, 204, 205, 206, 207, 208, 209, 210, 211, 212, 213, 214, 215, 216, 217, 218, 219, 220, 221, 222, 223, 226, 227, 228, 229);
		$list = array();
		foreach ($businesses as $business) {
			array_push($list, $business->id);
		}
		return $list;
	}

    public function isSupervisor()
    {
        return session('load_business') == CommonService::SUPERVISOR_ID;
    }

}
