<?php

namespace App\Services;

use Validator;
use \DateTime;

use App\File;
use App\Simulation;
use App\Business;

use App\Services\CommonService;

class SimulationService
{
    const SIMULATION_INO_ID   = "I";
    const SIMULATION_PRO_ID   = "P";
    const SIMULATION_ST_OPEN  = "1";
    const SIMULATION_ST_CLOSE = "2";
    const SIMULATION_RV_APR   = "A";
    const SIMULATION_RV_OBS   = "O";
    protected $common_service;

    public function __construct(CommonService $common_service)
    {
        $this->common_service = $common_service;
        include(app_path() . '/Functions/phpmailer/PHPMailerAutoload.php');
    }

    public function getSimulationType($type_id)
    {
        return ($type_id == SimulationService::SIMULATION_INO_ID) ? "Inopinado" : (($type_id == SimulationService::SIMULATION_PRO_ID) ? "Programado" : "");
    }

    public function getSimulationTypes()
    {
        $simulation_types = [];
        $simulation_types[SimulationService::SIMULATION_INO_ID] = "INOPINADO";
        $simulation_types[SimulationService::SIMULATION_PRO_ID] = "PROGRAMADO";
        return $simulation_types;
    }

    public function getSimulationStatuses()
    {
        $simulation_statues = [];
        $simulation_statues[SimulationService::SIMULATION_ST_OPEN] = "ABIERTO";
        $simulation_statues[SimulationService::SIMULATION_ST_CLOSE] = "CERRADO";
        return $simulation_statues;
    }

    public function getSimulationStatus($status_id)
    {
        return ($status_id == SimulationService::SIMULATION_ST_OPEN) ? "Abierto" : (($status_id == SimulationService::SIMULATION_ST_CLOSE) ? "Cerrado" : "");
    }

    public function getSimulationStatusReview($status_id)
    {
        return ($status_id == SimulationService::SIMULATION_RV_APR) ? "Aprobado" : (($status_id == SimulationService::SIMULATION_RV_OBS) ? "Observado" : "");
    }

    public function storeSimulationPlan($simulation, $request)
    {
        $simulation->simulation_date                 = $this->common_service->getFormattedDate($request->input('simulation_date'));
        $simulation->simulation_time                 = $request->input('simulation_time');
        $simulation->topic                           = $request->input('topic');
        $simulation->place                           = $request->input('place');
        $simulation->attendant                       = $request->input('attendant');
        $simulation->generalities                    = $request->input('generalities');
        $simulation->purpose                         = $request->input('purpose');
        $simulation->severity                        = $request->input('severity');
        $simulation->incident_description            = $request->input('incident_description');
        $simulation->responsable_1                   = $request->input('responsable_1');
        $simulation->responsable_position_1          = $request->input('responsable_position_1');
        $simulation->responsable_2                   = $request->input('responsable_2');
        $simulation->responsable_position_2          = $request->input('responsable_position_2');
        $simulation->responsable_3                   = $request->input('responsable_3');
        $simulation->responsable_position_3          = $request->input('responsable_position_3');
        $simulation->responsable_4                   = $request->input('responsable_4');
        $simulation->responsable_position_4          = $request->input('responsable_position_4');
        $simulation->responsable_5                   = $request->input('responsable_5');
        $simulation->responsable_position_5          = $request->input('responsable_position_5');
        $simulation->contingency_materials           = $request->input('contingency_materials');
        $simulation->immediate_response_application  = $request->input('immediate_response_application');
        $simulation->evaluation_meeting              = $request->input('evaluation_meeting');
        $simulation->final_report                    = $request->input('final_report');
        return $simulation;
    }

    public function storeChronological($simulation, $request)
    {
        $simulation->activity_time_1      = $request->input('activity_time_1');
        $simulation->activity_1           = $request->input('activity_1');
        $simulation->activity_executor_1  = $request->input('activity_executor_1');
        $simulation->activity_time_2      = $request->input('activity_time_2');
        $simulation->activity_2           = $request->input('activity_2');
        $simulation->activity_executor_2  = $request->input('activity_executor_2');
        $simulation->activity_time_3      = $request->input('activity_time_3');
        $simulation->activity_3           = $request->input('activity_3');
        $simulation->activity_executor_3  = $request->input('activity_executor_3');
        $simulation->activity_time_4      = $request->input('activity_time_4');
        $simulation->activity_4           = $request->input('activity_4');
        $simulation->activity_executor_4  = $request->input('activity_executor_4');
        $simulation->activity_time_5      = $request->input('activity_time_5');
        $simulation->activity_5           = $request->input('activity_5');
        $simulation->activity_executor_5  = $request->input('activity_executor_5');
        $simulation->activity_time_6      = $request->input('activity_time_6');
        $simulation->activity_6           = $request->input('activity_6');
        $simulation->activity_executor_6  = $request->input('activity_executor_6');
        $simulation->activity_time_7      = $request->input('activity_time_7');
        $simulation->activity_7           = $request->input('activity_7');
        $simulation->activity_executor_7  = $request->input('activity_executor_7');
        $simulation->activity_time_8      = $request->input('activity_time_8');
        $simulation->activity_8           = $request->input('activity_8');
        $simulation->activity_executor_8  = $request->input('activity_executor_8');
        $simulation->activity_time_9      = $request->input('activity_time_9');
        $simulation->activity_9           = $request->input('activity_9');
        $simulation->activity_executor_9  = $request->input('activity_executor_9');
        $simulation->activity_time_10     = $request->input('activity_time_10');
        $simulation->activity_10          = $request->input('activity_10');
        $simulation->activity_executor_10 = $request->input('activity_executor_10');
        return $simulation;
    }

    public function storeEvaluation($simulation, $request)
    {
        $simulation->monitor_board              = $request->input('monitor_board');
        $simulation->evaluator                  = $request->input('evaluator');
        $simulation->supervisor_id              = $request->input('supervisor_id');
        $simulation->evaluation_start_time      = $request->input('evaluation_start_time');
        $simulation->evaluation_end_time        = $request->input('evaluation_end_time');
        $simulation->drive_plate                = $request->input('drive_plate');
        $simulation->question_punctuation_01    = $request->input('question_punctuation_01');
        $simulation->question_observation_01    = $request->input('question_observation_01');
        $simulation->question_punctuation_02    = $request->input('question_punctuation_02');
        $simulation->question_observation_02    = $request->input('question_observation_02');
        $simulation->question_punctuation_03    = $request->input('question_punctuation_03');
        $simulation->question_observation_03    = $request->input('question_observation_03');
        $simulation->question_punctuation_04    = $request->input('question_punctuation_04');
        $simulation->question_observation_04    = $request->input('question_observation_04');
        $simulation->question_punctuation_05    = $request->input('question_punctuation_05');
        $simulation->question_observation_05    = $request->input('question_observation_05');
        $simulation->question_punctuation_06    = $request->input('question_punctuation_06');
        $simulation->question_observation_06    = $request->input('question_observation_06');
        $simulation->question_punctuation_07    = $request->input('question_punctuation_07');
        $simulation->question_observation_07    = $request->input('question_observation_07');
        $simulation->question_punctuation_08    = $request->input('question_punctuation_08');
        $simulation->question_observation_08    = $request->input('question_observation_08');
        $simulation->question_punctuation_09    = $request->input('question_punctuation_09');
        $simulation->question_observation_09    = $request->input('question_observation_09');
        $simulation->question_punctuation_10    = $request->input('question_punctuation_10');
        $simulation->question_observation_10    = $request->input('question_observation_10');
        $simulation->question_punctuation_11    = $request->input('question_punctuation_11');
        $simulation->question_observation_11    = $request->input('question_observation_11');
        $simulation->question_punctuation_12    = $request->input('question_punctuation_12');
        $simulation->question_observation_12    = $request->input('question_observation_12');
        $simulation->question_punctuation_13    = $request->input('question_punctuation_13');
        $simulation->question_observation_13    = $request->input('question_observation_13');
        $simulation->question_punctuation_14    = $request->input('question_punctuation_14');
        $simulation->question_observation_14    = $request->input('question_observation_14');
        $simulation->question_punctuation_15    = $request->input('question_punctuation_15');
        $simulation->question_observation_15    = $request->input('question_observation_15');
        $simulation->question_punctuation_16    = $request->input('question_punctuation_16');
        $simulation->question_observation_16    = $request->input('question_observation_16');
        $simulation->question_punctuation_17    = $request->input('question_punctuation_17');
        $simulation->question_observation_17    = $request->input('question_observation_17');
        $simulation->question_punctuation_18    = $request->input('question_punctuation_18');
        $simulation->question_observation_18    = $request->input('question_observation_18');
        $simulation->question_punctuation_19    = $request->input('question_punctuation_19');
        $simulation->question_observation_19    = $request->input('question_observation_19');
        $simulation->question_punctuation_20    = $request->input('question_punctuation_20');
        $simulation->question_observation_20    = $request->input('question_observation_20');
        $simulation->competitor_1               = $request->input('competitor_1');
        $simulation->competitor_position_1      = $request->input('competitor_position_1');
        $simulation->competitor_2               = $request->input('competitor_2');
        $simulation->competitor_position_2      = $request->input('competitor_position_2');
        $simulation->competitor_3               = $request->input('competitor_3');
        $simulation->competitor_position_3      = $request->input('competitor_position_3');
        $simulation->competitor_4               = $request->input('competitor_4');
        $simulation->competitor_position_4      = $request->input('competitor_position_4');
        $simulation->competitor_5               = $request->input('competitor_5');
        $simulation->competitor_position_5      = $request->input('competitor_position_5');
        $simulation->continuous_improvements    = $request->input('continuous_improvements');
        return $simulation;
    }

    public function storeLearnedLessons($simulation, $request)
    {
        $simulation->learned_lessons                     = $request->input('learned_lessons');
        $simulation->improvement_action_1                = $request->input('improvement_action_1');
        $simulation->improvement_action_required_date_1  = $this->common_service->getFormattedDate($request->input('improvement_action_required_date_1'));
        $simulation->improvement_action_executed_date_1  = $this->common_service->getFormattedDate($request->input('improvement_action_executed_date_1'));
        $simulation->improvement_action_responsable_1    = $request->input('improvement_action_responsable_1');
        $simulation->improvement_action_2                = $request->input('improvement_action_2');
        $simulation->improvement_action_required_date_2  = $this->common_service->getFormattedDate($request->input('improvement_action_required_date_2'));
        $simulation->improvement_action_executed_date_2  = $this->common_service->getFormattedDate($request->input('improvement_action_executed_date_2'));
        $simulation->improvement_action_responsable_2    = $request->input('improvement_action_responsable_2');
        $simulation->improvement_action_3                = $request->input('improvement_action_3');
        $simulation->improvement_action_required_date_3  = $this->common_service->getFormattedDate($request->input('improvement_action_required_date_3'));
        $simulation->improvement_action_executed_date_3  = $this->common_service->getFormattedDate($request->input('improvement_action_executed_date_3'));
        $simulation->improvement_action_responsable_3    = $request->input('improvement_action_responsable_3');
        $simulation->improvement_action_4                = $request->input('improvement_action_4');
        $simulation->improvement_action_required_date_4  = $this->common_service->getFormattedDate($request->input('improvement_action_required_date_4'));
        $simulation->improvement_action_executed_date_4  = $this->common_service->getFormattedDate($request->input('improvement_action_executed_date_4'));
        $simulation->improvement_action_responsable_4    = $request->input('improvement_action_responsable_4');
        $simulation->improvement_action_5                = $request->input('improvement_action_5');
        $simulation->improvement_action_required_date_5  = $this->common_service->getFormattedDate($request->input('improvement_action_required_date_5'));
        $simulation->improvement_action_executed_date_5  = $this->common_service->getFormattedDate($request->input('improvement_action_executed_date_5'));
        $simulation->improvement_action_responsable_5    = $request->input('improvement_action_responsable_5');
        $simulation->improvement_action_6                = $request->input('improvement_action_6');
        $simulation->improvement_action_required_date_6  = $this->common_service->getFormattedDate($request->input('improvement_action_required_date_6'));
        $simulation->improvement_action_executed_date_6  = $this->common_service->getFormattedDate($request->input('improvement_action_executed_date_6'));
        $simulation->improvement_action_responsable_6    = $request->input('improvement_action_responsable_6');
        $simulation->improvement_action_7                = $request->input('improvement_action_7');
        $simulation->improvement_action_required_date_7  = $this->common_service->getFormattedDate($request->input('improvement_action_required_date_7'));
        $simulation->improvement_action_executed_date_7  = $this->common_service->getFormattedDate($request->input('improvement_action_executed_date_7'));
        $simulation->improvement_action_responsable_7    = $request->input('improvement_action_responsable_7');
        $simulation->improvement_action_8                = $request->input('improvement_action_8');
        $simulation->improvement_action_required_date_8  = $this->common_service->getFormattedDate($request->input('improvement_action_required_date_8'));
        $simulation->improvement_action_executed_date_8  = $this->common_service->getFormattedDate($request->input('improvement_action_executed_date_8'));
        $simulation->improvement_action_responsable_8    = $request->input('improvement_action_responsable_8');
        $simulation->improvement_action_9                = $request->input('improvement_action_9');
        $simulation->improvement_action_required_date_9  = $this->common_service->getFormattedDate($request->input('improvement_action_required_date_9'));
        $simulation->improvement_action_executed_date_9  = $this->common_service->getFormattedDate($request->input('improvement_action_executed_date_9'));
        $simulation->improvement_action_responsable_9    = $request->input('improvement_action_responsable_9');
        $simulation->improvement_action_10               = $request->input('improvement_action_10');
        $simulation->improvement_action_required_date_10 = $this->common_service->getFormattedDate($request->input('improvement_action_required_date_10'));
        $simulation->improvement_action_executed_date_10 = $this->common_service->getFormattedDate($request->input('improvement_action_executed_date_10'));
        $simulation->improvement_action_responsable_10   = $request->input('improvement_action_responsable_10');
        return $simulation;
    }

    public function ApproveOrRejectSimulation($simulation, $request)
    {
        $simulation->review_state       = $request->input('review_state');
        $simulation->review_observation = $request->input('review_observation');
        
        if ($simulation->review_state == "A") {
            $simulation->plan_status_id = "2";
        } else {
            $simulation->plan_status_id = "1";
        }
        return $simulation;
    }

    public function closeSimulation($simulation)
    {
        $count_blanks = 0;
        $complete     = true;
        
        for ($i = 1; $i <= 10; $i++) { 
            $required_date = 'improvement_action_required_date_' . $i;
            $executed_date = 'improvement_action_executed_date_' . $i;
            
            if (($simulation[$required_date] == "") && ($simulation[$executed_date] == "")) {
                $count_blanks++;
            } else if (($simulation[$required_date] != "") && ($simulation[$executed_date] != "")) {
                $complete = true;
            } else {
                $complete = false;
                break;
            }
        }

        if (($count_blanks != 10) && ($complete)) {
            $simulation->status_id = "2";
        } else {
            $simulation->status_id = "1";
        }
        return $simulation;
    }

    public function sendEmailImprovementAction($simulation, $request)
    {
        $is_supervisor = $this->common_service->isSupervisor();
        $documents     = File::where('type', 'document')->where('module', 'simulation')->where('reference_id', $simulation->id)->count();
        $n_documents   = (int)$request->input('n_documents');

        if($documents > $n_documents) {
            if ($simulation->simulation_type_id == SimulationService::SIMULATION_INO_ID) { 
                return $this->sendUnexpectedSimulationEmailStatus2($simulation);
            } else {
                return $this->sendProgrammedSimulationEmailStatus4($simulation);
            }
        }
    }

    public function sendUnexpectedSimulationEmail($simulation)
    {
        $plan_status_id = $simulation->plan_status_id;

        if ($plan_status_id == "1") {
            sendUnexpectedSimulationEmailStatus1($simulation);
        } else if ($plan_status_id == "2") {
            sendUnexpectedSimulationEmailStatus2($simulation);
        }
    }

    public function sendProgrammedSimulationEmail($simulation)
    {
        $plan_status_id = $simulation->plan_status_id;

        if ($plan_status_id == "1") {
            sendProgrammedSimulationEmailStatus1($simulation);
        } else if ($plan_status_id == "2") {
            sendProgrammedSimulationEmailStatus2($simulation);
        } else if ($plan_status_id == "3") {
            sendProgrammedSimulationEmailStatus3($simulation);
        } else if ($plan_status_id == "4") {
            sendProgrammedSimulationEmailStatus4($simulation);
        }
    }

    //------------//
    //    Mails   //
    //------------//

    public function sendUnexpectedSimulationEmailStatus1($simulation)
    {
        $business = Business::find($simulation->business_id);
        $mail     = new \PHPMailer;
        $mail->isHTML(true); 
        $subject       = "Simulacro Inopinado de Seguridad Vial";
        $mail->Subject = utf8_decode($subject);  
        $mail->setFrom('noresponder@antaminaseguridadvial.org', 'Sistema');

        //$send_to = array("brajean.junchaya@pucp.pe");
        $send_to = explode(",", $business->rep_email);
        foreach($send_to as $to) {           
            $mail->addAddress($to);
        }

        $mail->addCC('SeguridadVialMina@antamina.com');
		$mail->addCC('lidervialantamina@hotmail.com');
		$mail->addCC('vtunan@antamina.com');
        $mail->addCC('vboucher@antamina.com');
        $body       = 'Estimados <b>' . $business->name . ' :</b> <br> <h2>Este mensaje lo recibe porque se ha generado un <b>SIMULACRO INOPINADO</b> de Seguridad Vial para su empresa. Completar las secciones pendientes en el sistema.</h2><br><p>Puede ver el detalle en el siguiente enlace:</p><p><a href="'.url('/simulation/'.$simulation->id.'/complete').'">Ver Simulacro</a></p>';
        $mail->Body = utf8_decode($body);
        
        return $mail->send();
    }

    public function sendUnexpectedSimulationEmailStatus2($simulation)
    {
        $business = Business::find($simulation->business_id);
        $mail     = new \PHPMailer;
        $mail->isHTML(true); 
        $subject       = "Acciones de Mejora de Simulacro Inopinado";
        $mail->Subject = utf8_decode($subject);  
        $mail->setFrom('noresponder@antaminaseguridadvial.org', 'Sistema');

        // $mail->addAddress('brajean.junchaya@pucp.pe');
        $mail->addAddress('SeguridadVialMina@antamina.com');
		$mail->addAddress('lidervialantamina@hotmail.com');
		$mail->addAddress('vtunan@antamina.com');
		$mail->addAddress('vboucher@antamina.com');
        $body       = 'Estimados <b> SEGURIDAD VIAL:</b> <br> <h2>Este mensaje lo recibe porque se ha subido al sistema <b>EVIDENCIA DE ACCIONES DE MEJORA</b> del simulacro inopinado de la empresa <b>' . $business->name . ' </b> para su revisión.</h2><br><p>Puede ver el detalle en el siguiente enlace:</p><p><a href="'.url('/simulation/'.$simulation->id.'/complete').'">Ver Simulacro</a></p>';
        $mail->Body = utf8_decode($body);

        return $mail->send();
    }

    public function sendProgrammedSimulationEmailStatus1($simulation)
    {
        $business = Business::find($simulation->business_id);
        $mail     = new \PHPMailer;
        $mail->isHTML(true); 
        $subject       = "Plan de Simulacro Programado";  
        $mail->Subject = utf8_decode($subject);  
        $mail->setFrom('noresponder@antaminaseguridadvial.org', 'Sistema');

        // $mail->addAddress('brajean.junchaya@pucp.pe');
        $mail->addAddress('SeguridadVialMina@antamina.com');
		$mail->addAddress('lidervialantamina@hotmail.com');
		$mail->addAddress('vtunan@antamina.com');
		$mail->addAddress('vboucher@antamina.com');
        $body       = 'Estimados <b> SEGURIDAD VIAL:</b> <br> <h2>Este mensaje lo recibe porque se ha creado un <b>PLAN DE SIMULACRO PROGRAMADO</b> de la empresa <b>' . $business->name . ' </b> para su revisión.</h2><br><p>Puede ver el detalle en el siguiente enlace:</p><p><a href="'.url('/simulation/'.$simulation->id.'/complete').'">Ver Simulacro</a></p>';
        $mail->Body = utf8_decode($body);

        return $mail->send();
    }

    public function sendProgrammedSimulationEmailStatus2($simulation)
    {
        $business = Business::find($simulation->business_id);
        $mail     = new \PHPMailer;
        $mail->isHTML(true); 
        $mail->setFrom('noresponder@antaminaseguridadvial.org', 'Sistema');
        
        // $send_to = array("brajean.junchaya@pucp.pe");
        $send_to = explode(",", $business->rep_email);
        foreach($send_to as $to) {           
            $mail->addAddress($to);
        }
        
        $mail->addCC('SeguridadVialMina@antamina.com');
		$mail->addCC('lidervialantamina@hotmail.com');
		$mail->addCC('vtunan@antamina.com');
        $mail->addCC('vboucher@antamina.com');
        
        if ($simulation->review_state == "A") {
            $subject = "Aprobación de Plan de Simulacro Programado";  
            $body    = 'Estimados <b>' . $business->name . ' :</b> <br> <h2>Este mensaje lo recibe porque se ha <b>aprobado el PLAN DE SIMULACRO PROGRAMADO</b> de su representada en la plataforma web de Seguridad Vial. El personal de Seguridad Vial se encontrará presente el día, hora y lugar programado del simulacro para la evaluación correspondiente. Se recuerda comunicar al inicio del simulacro al Centro de Control Tunan.</h2><br><p>Puede ver el detalle en el siguiente enlace:</p><p><a href="'.url('/simulation/'.$simulation->id.'/complete').'">Ver Simulacro</a></p>';
        } else {
            $subject = "Observación de Plan de Simulacro Programado";  
            $body    = 'Estimados <b>' . $business->name . ' :</b> <br> <h2>Este mensaje lo recibe porque se ha <b>observado el PLAN DE SIMULACRO PROGRAMADO</b> de su representada en la plataforma web de Seguridad Vial. Realizar las correcciones en el sistema.</h2><br><p>Puede ver el detalle en el siguiente enlace:</p><p><a href="'.url('/simulation/'.$simulation->id.'/complete').'">Ver Simulacro</a></p>';
        }

        $mail->Subject = utf8_decode($subject);  
        $mail->Body    = utf8_decode($body);
        
        return $mail->send();
    }

    public function sendProgrammedSimulationEmailStatus3($simulation)
    {
        $business = Business::find($simulation->business_id);
        $mail     = new \PHPMailer;
        $mail->isHTML(true); 
        $subject       = "Evaluación de Simulacro Programado";  
        $mail->Subject = utf8_decode($subject);  
        $mail->setFrom('noresponder@antaminaseguridadvial.org', 'Sistema');
        
        // $send_to = array("brajean.junchaya@pucp.pe");
        $send_to = explode(",", $business->rep_email);
        foreach($send_to as $to) {           
            $mail->addAddress($to);
        }
        
        $mail->addCC('SeguridadVialMina@antamina.com');
		$mail->addCC('lidervialantamina@hotmail.com');
		$mail->addCC('vtunan@antamina.com');
        $mail->addCC('vboucher@antamina.com');
        $body       = 'Estimados <b>' . $business->name . ' :</b> <br> <h2>Este mensaje lo recibe porque se ha realizado la <b>Evaluación del SIMULACRO PROGRAMADO</b> de su representada en la plataforma web de Seguridad Vial. Completar las secciones pendientes en el sistema.</h2><br><p>Puede ver el detalle en el siguiente enlace:</p><p><a href="'.url('/simulation/'.$simulation->id.'/complete').'">Ver Simulacro</a></p>';
        $mail->Body = utf8_decode($body);

        return $mail->send();
    }

    public function sendProgrammedSimulationEmailStatus4($simulation)
    {
        $business = Business::find($simulation->business_id);
        $mail     = new \PHPMailer;
        $mail->isHTML(true); 
        $subject       = "Acciones de Mejora de Simulacro Programado";  
        $mail->Subject = utf8_decode($subject);  
        $mail->setFrom('noresponder@antaminaseguridadvial.org', 'Sistema');
        
        // $mail->addAddress('brajean.junchaya@pucp.pe');
        $mail->addAddress('SeguridadVialMina@antamina.com');
		$mail->addAddress('lidervialantamina@hotmail.com');
		$mail->addAddress('vtunan@antamina.com');
		$mail->addAddress('vboucher@antamina.com');
		//$mail->addAddress('arenas.jose@pucp.pe');
        $body       = 'Estimados <b> SEGURIDAD VIAL:</b> <br> <h2>Este mensaje lo recibe porque se ha subido al sistema <b>EVIDENCIA DE ACCIONES DE MEJORA</b> del simulacro programado de la empresa <b>' . $business->name . ' </b> para su revisión.</h2><br><p>Puede ver el detalle en el siguiente enlace:</p><p><a href="'.url('/simulation/'.$simulation->id.'/complete').'">Ver Simulacro</a></p>';
        $mail->Body = utf8_decode($body);

        return $mail->send();
    }

    //------------//
    // Statistics //
    //------------//

    public function getStatisticSimulationsMonthlyData($parameters)
    {
        $begin_date                = DateTime::createFromFormat("d/m/Y", $parameters['begin_date']);
        $end_date                  = DateTime::createFromFormat("d/m/Y", $parameters['end_date']);
        $selected_business         = $parameters['selected_business'];
        $selected_simulation_types = $parameters['selected_simulation_types'];
        $months_name               = $this->common_service->getMonthsName();
        $counters                  = array();
        $total_inopinado           = 0;
        $total_programado          = 0; 
        
        for ($i = 0; $i < 12; $i++) {
            $month           = $i + 1;
            $counters[$i][0] = $months_name[$i];
            $counters[$i][1] = !in_array(SimulationService::SIMULATION_INO_ID, $selected_simulation_types) ? 0 : count(Simulation::whereIn("business_id", $selected_business)->whereBetween("simulation_date", [$begin_date->format("Y-m-d"), $end_date->format("Y-m-d")])->whereMonth("simulation_date","=",$month)->where('simulation_type_id', '=', SimulationService::SIMULATION_INO_ID)->get());
            $counters[$i][2] = !in_array(SimulationService::SIMULATION_PRO_ID, $selected_simulation_types) ? 0 : count(Simulation::whereIn("business_id", $selected_business)->whereBetween("simulation_date", [$begin_date->format("Y-m-d"), $end_date->format("Y-m-d")])->whereMonth("simulation_date","=",$month)->where('simulation_type_id', '=', SimulationService::SIMULATION_PRO_ID)->get());
            $counters[$i][3] = $counters[$i][1] + $counters[$i][2];

            //Totals
            $total_inopinado  += $counters[$i][1];
            $total_programado += $counters[$i][2];
        }

        $counters[12][0] = 'Total';
        $counters[12][1] = $total_inopinado;
        $counters[12][2] = $total_programado;
        $counters[12][3] = $total_inopinado + $total_programado;

        $result['counters'] = $counters;
        return compact('parameters', 'result');
    }

    public function getStatisticImprovementActionsDetailData($parameters)
    {   
        $selected_business            = $parameters['selected_business'];
        $selected_simulation_types    = $parameters['selected_simulation_types'];
        $selected_simulation_statuses = $parameters['selected_simulation_statuses'];
        $list_business                = Business::whereIn('id', $selected_business)->orderBy('name')->get();
        $begin_date                   = DateTime::createFromFormat("d/m/Y", $parameters['begin_date']);
        $end_date                     = DateTime::createFromFormat("d/m/Y", $parameters['end_date']);
        $months_name                  = $parameters['months_name'];
        $begin_year                   = $begin_date->format('Y');
        $begin_month                  = $begin_date->format('m');
        $end_year                     = $end_date->format('Y');
        $end_month                    = $end_date->format('m');

        $years = array();
        for ($i = $begin_year; $i <= $end_year; $i++) {
            
            $b_month = ($i == $begin_year) ? (int) $begin_month : 1;
            $e_month = ($i == $end_year)   ? (int) $end_month   : 12;

            $months = array();
            for ($j = $b_month; $j <= $e_month ; $j++) {

                $businesses = array();
                foreach ($list_business as $k => $business) {
                    
                    $list_simulations = Simulation::whereYear("simulation_date","=",$i)->whereMonth("simulation_date","=",$j)->where("business_id","=", $business->id)->whereIn('simulation_type_id', $selected_simulation_types)->whereIn('status_id', $selected_simulation_statuses)->get();
                    $simulations      = array();
                    foreach ($list_simulations as $l => $simulation) {

                        $actions = array();
                        for ($m = 1; $m <= 10; $m++) {
                            if ($simulation['improvement_action_'.$m] != ""){
                                $action['improvement_action'] = $simulation['improvement_action_'.$m];
                                $action['required_date']      = $simulation['improvement_action_required_date_'.$m];
                                $action['executed_date']      = $simulation['improvement_action_executed_date_'.$m];
								
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
								
                                $actions[$m - 1]  = $action;
                            }
                        }

                        if (count($actions) > 0) {
                            $simu['simulation'] = $this->getSimulationType($simulation->simulation_type_id);
                            $simu['topic']      = $simulation->topic;
                            $simu['date']       = $simulation->simulation_date;
							
							$nd = explode("-", $simulation->simulation_date);
							$simu['date_formatted'] = $simulation->simulation_date;
							if(count($nd) > 2) {
								$simu['date_formatted'] = $nd[2] . "-" . $nd[1] . "-" . $nd[0];
							}
							
                            $simu['actions']    = $actions;
                            $simulations[$l]    = $simu;
                        }
                    }
                    
                    if (count($simulations) > 0) {
                        $bs['business']    = $business->name;
                        $bs['simulations'] = $simulations;
                        $businesses[$k]    = $bs;
                    }
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

    public function getStatisticSimulationsSummaryData($parameters)
    {
        $begin_date                   = DateTime::createFromFormat("d/m/Y", $parameters['begin_date']);
        $end_date                     = DateTime::createFromFormat("d/m/Y", $parameters['end_date']);
        $selected_business            = $parameters['selected_business'];
        $selected_simulation_types    = $parameters['selected_simulation_types'];
        $selected_simulation_statuses = $parameters['selected_simulation_statuses'];
        $total_status_open            = 0;
        $total_status_close           = 0; 
        
        $simulations = Simulation::whereIn("business_id", $selected_business)->whereBetween("simulation_date", [$begin_date->format("Y-m-d"), $end_date->format("Y-m-d")])->whereIn('simulation_type_id', $selected_simulation_types)->whereIn('status_id', $selected_simulation_statuses)->get()->sortBydesc('simulation_date');

        foreach($simulations as $simulation)
        {
            $simulation->business = Business::find($simulation->business_id)->name;
            $simulation->type     = $this->getSimulationType($simulation->simulation_type_id);
            $simulation->status   = $this->getSimulationStatus($simulation->status_id);
			
			$nd = explode("-", $simulation->simulation_date);
			$simulation->simulation_date_formatted = $simulation->simulation_date;
			if(count($nd) > 2) {
				$simulation->simulation_date_formatted = $nd[2] . "-" . $nd[1] . "-" . $nd[0];
			}

            if($simulation->status_id == SimulationService::SIMULATION_ST_OPEN) {
                $total_status_open++;
            } else {
                $total_status_close++;
            }
        }

        $result['simulations']        = $simulations;
        $result['total_status_open']  = $total_status_open;
        $result['total_status_close'] = $total_status_close;
        return compact('parameters', 'result');
    }

    public function getstatisticImprovementActionsMonthlyData($parameters)
    {
        $begin_date                = DateTime::createFromFormat("d/m/Y", $parameters['begin_date']);
        $end_date                  = DateTime::createFromFormat("d/m/Y", $parameters['end_date']);
        $selected_business         = $parameters['selected_business'];
        $selected_simulation_types = $parameters['selected_simulation_types'];
        $months                    = $parameters['months_name'];
        $tags                      = array();
        $counters                  = array();

        for ($i = 0; $i < 12; $i++) {
            
            $month           = $i + 1;
            $tags[$i]        = $months[$i];
            $counters[0][$i] = 0;
            $counters[1][$i] = 0;
            $counters[2][$i] = 0;

            for($j = 1; $j <= 10; $j++) {
                $counters[0][$i] += count(Simulation::whereBetween("simulation_date", [$begin_date->format("Y-m-d"), $end_date->format("Y-m-d")])->whereMonth("simulation_date","=",$month)->whereIn("business_id", $selected_business)->whereIn('simulation_type_id', $selected_simulation_types)->where("improvement_action_".$j,"<>","")->get());
                $counters[1][$i] += count(Simulation::whereBetween("simulation_date", [$begin_date->format("Y-m-d"), $end_date->format("Y-m-d")])->whereMonth("simulation_date","=",$month)->whereIn("business_id", $selected_business)->whereIn('simulation_type_id', $selected_simulation_types)->where("improvement_action_".$j,"<>","")->where("improvement_action_executed_date_".$j,"<>","")->get());
                $counters[2][$i] += count(Simulation::whereBetween("simulation_date", [$begin_date->format("Y-m-d"), $end_date->format("Y-m-d")])->whereMonth("simulation_date","=",$month)->whereIn("business_id", $selected_business)->whereIn('simulation_type_id', $selected_simulation_types)->where("improvement_action_".$j,"<>","")->where("improvement_action_executed_date_".$j,"=","")->get());
            }

            $simulations = Simulation::whereBetween("simulation_date", [$begin_date->format("Y-m-d"), $end_date->format("Y-m-d")])->whereMonth("simulation_date","=",$month)->whereIn("business_id", $selected_business)->whereIn('simulation_type_id', $selected_simulation_types)->get();
            
            $keys            = array();
            $counters[3][$i] = "";
            foreach ($simulations as $simulation) {
                $business = Business::find($simulation->business_id);
                $pending  = 0;
                for($j = 1; $j <= 10; $j++) {
                    $pending += count(Simulation::where("id","=",$simulation->id)->where("business_id","=", $simulation->business_id)->where("improvement_action_".$j,"<>","")->where("improvement_action_executed_date_".$j,"=","")->get());
                }
                if ($pending > 0) {
                    if (array_key_exists($simulation->business_id, $keys)) {
                        $keys[$simulation->business_id] += $pending;
                    } else {
                        $keys[$simulation->business_id] = $pending;
                    }
                }
            }
            foreach ($keys as $k => $value) {
                $business        = Business::find($k);
                $counters[3][$i] = $counters[3][$i].$business->name."(".$value."), ";
            }
        }
        
        $result['tags']     = $tags;
        $result['counters'] = $counters;

        return compact('parameters', 'result');
    }

    public function getStatisticSimulationsByCompaniesData($parameters)
    {
        $begin_date                   = DateTime::createFromFormat("d/m/Y", $parameters['begin_date']);
        $end_date                     = DateTime::createFromFormat("d/m/Y", $parameters['end_date']);
        $selected_business            = $parameters['selected_business'];
        $selected_simulation_types    = $parameters['selected_simulation_types'];
        $selected_simulation_statuses = $parameters['selected_simulation_statuses'];
        $list_business                = Business::whereIn('id', $selected_business)->orderBy('name')->get();
        $businesses                   = array();
        $totals                       = array(0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);
		$per_business = array();
        foreach ($list_business as $k => $business) {
            $counter_total = count(Simulation::where("business_id","=", $business->id)->whereBetween("simulation_date", [$begin_date->format("Y-m-d"), $end_date->format("Y-m-d")])->whereIn('simulation_type_id', $selected_simulation_types)->whereIn('status_id', $selected_simulation_statuses)->get());

            if ($counter_total > 0){
                $counters = array();
                for ($i = 1; $i <= 12; $i++) {
                    $counters[$i]   = count(Simulation::where("business_id","=", $business->id)->whereBetween("simulation_date", [$begin_date->format("Y-m-d"), $end_date->format("Y-m-d")])->whereMonth("simulation_date", "=", $i)->whereIn('simulation_type_id', $selected_simulation_types)->whereIn('status_id', $selected_simulation_statuses)->get());
                    $totals[$i -1] += $counters[$i];
                }
                $bs['business'] = $business->name;
                $bs['months']   = $counters;
                $bs['total']    = $counter_total;
				$per_business[] = $counter_total;
                $businesses[$k] = $bs;
            }
        }

        $result['businesses'] = $businesses;
        $result['totals']     = $totals;
        return compact('parameters', 'result', 'per_business');
    }

}
