<?php

/***************************
  Sample using a PHP array
****************************/

require('fpdm.php');

$fields = array(
	'status' => 'TEXTO',
	'incidente' => 'TEXTO LARGO DE PRUEBA',
	'nombreaccidentado' => 'TEXTO LARGO DE PRUEBA',
	'edad' => 'TEXTO LARGO DE PRUEBA',
	'cargo' => 'TEXTO LARGO DE PRUEBA',
	'gerencia' => 'TEXTO LARGO DE PRUEBA',
	'fecha' => 'TEXTO LARGO DE PRUEBA',
	'superintendencia' => 'TEXTO LARGO DE PRUEBA',
	'hora' => 'TEXTO LARGO DE PRUEBA',
	'consecuencia' => 'TEXTO LARGO DE PRUEBA',
	'turno' => 'TEXTO LARGO DE PRUEBA',
	'tipounidad' => 'TEXTO LARGO DE PRUEBA',
	'areaincidente' => 'TEXTO LARGO DE PRUEBA',
	'tipoincidenteambiental' => 'TEXTO LARGO DE PRUEBA',
	'tipovia' => 'TEXTO LARGO DE PRUEBA',
	'tipoincidentesocial' => 'TEXTO LARGO DE PRUEBA',
	'reportepreliminar' => 'TEXTO LARGO DE PRUEBA',
	'clasificacionevento' => 'TEXTO LARGO DE PRUEBA',
	'reportante' => 'TEXTO LARGO DE PRUEBA',
	'ubicacion' => 'TEXTO LARGO DE PRUEBA',
	'empresatransportista' => 'TEXTO LARGO DE PRUEBA',
	'empresaproveedora' => 'TEXTO LARGO DE PRUEBA',
	'descripcion' => 'TEXTO LARGO DE PRUEBA',
	
	'participantesinvolucrado_1' => 'TEXTO LARGO DE PRUEBA',
	'participantesinvolucrado_2' => 'TEXTO LARGO DE PRUEBA',
	'participantesinvolucrado_3' => 'TEXTO LARGO DE PRUEBA',
	'participantesinvolucrado_4' => 'TEXTO LARGO DE PRUEBA',
	'participantesinvolucrado_5' => 'TEXTO LARGO DE PRUEBA',
	'participantesrol_1' => 'TEXTO LARGO DE PRUEBA',
	'participantesrol_2' => 'TEXTO LARGO DE PRUEBA',
	'participantesrol_3' => 'TEXTO LARGO DE PRUEBA',
	'participantesrol_4' => 'TEXTO LARGO DE PRUEBA',
	'participantesrol_5' => 'TEXTO LARGO DE PRUEBA',
	'participantesdeclaracion_1' => 'TEXTO LARGO DE PRUEBA',
	'participantesdeclaracion_2' => 'TEXTO LARGO DE PRUEBA',
	'participantesdeclaracion_3' => 'TEXTO LARGO DE PRUEBA',
	'participantesdeclaracion_4' => 'TEXTO LARGO DE PRUEBA',
	'participantesdeclaracion_5' => 'TEXTO LARGO DE PRUEBA',
	
	'lesioneslesionado_1' => 'TEXTO LARGO DE PRUEBA',
	'lesioneslesionado_2' => 'TEXTO LARGO DE PRUEBA',
	'lesioneslesionado_3' => 'TEXTO LARGO DE PRUEBA',
	'lesioneslesionado_4' => 'TEXTO LARGO DE PRUEBA',
	'lesioneslesionado_5' => 'TEXTO LARGO DE PRUEBA',
	'lesionesnaturaleza_1' => 'TEXTO LARGO DE PRUEBA',
	'lesionesnaturaleza_2' => 'TEXTO LARGO DE PRUEBA',
	'lesionesnaturaleza_3' => 'TEXTO LARGO DE PRUEBA',
	'lesionesnaturaleza_4' => 'TEXTO LARGO DE PRUEBA',
	'lesionesnaturaleza_5' => 'TEXTO LARGO DE PRUEBA',
	'lesionesparte_1' => 'TEXTO LARGO DE PRUEBA',
	'lesionesparte_2' => 'TEXTO LARGO DE PRUEBA',
	'lesionesparte_3' => 'TEXTO LARGO DE PRUEBA',
	'lesionesparte_4' => 'TEXTO LARGO DE PRUEBA',
	'lesionesparte_5' => 'TEXTO LARGO DE PRUEBA',
	'lesionesmecanismo_1' => 'TEXTO LARGO DE PRUEBA',
	'lesionesmecanismo_2' => 'TEXTO LARGO DE PRUEBA',
	'lesionesmecanismo_3' => 'TEXTO LARGO DE PRUEBA',
	'lesionesmecanismo_4' => 'TEXTO LARGO DE PRUEBA',
	'lesionesmecanismo_5' => 'TEXTO LARGO DE PRUEBA',
	'lesionesclasificacion_1' => 'TEXTO LARGO DE PRUEBA',
	'lesionesclasificacion_2' => 'TEXTO LARGO DE PRUEBA',
	'lesionesclasificacion_3' => 'TEXTO LARGO DE PRUEBA',
	'lesionesclasificacion_4' => 'TEXTO LARGO DE PRUEBA',
	'lesionesclasificacion_5' => 'TEXTO LARGO DE PRUEBA',
	'lesionescomentarios_1' => 'TEXTO LARGO DE PRUEBA',
	'lesionescomentarios_2' => 'TEXTO LARGO DE PRUEBA',
	'lesionescomentarios_3' => 'TEXTO LARGO DE PRUEBA',
	'lesionescomentarios_4' => 'TEXTO LARGO DE PRUEBA',
	'lesionescomentarios_5' => 'TEXTO LARGO DE PRUEBA',
	
	'perdida_1' => 'X',
	'perdida_2' => 'X',
	'perdida_3' => 'X',
	'perdida_4' => 'X',
	'perdida_5' => 'X',
	
	'danoequipo_1' => 'TEXTO LARGO DE PRUEBA',
	'danoequipo_2' => 'TEXTO LARGO DE PRUEBA',
	'danoequipo_3' => 'TEXTO LARGO DE PRUEBA',
	'danoequipo_4' => 'TEXTO LARGO DE PRUEBA',
	'danoequipo_5' => 'TEXTO LARGO DE PRUEBA',
	'danorol_1' => 'TEXTO LARGO DE PRUEBA',
	'danorol_2' => 'TEXTO LARGO DE PRUEBA',
	'danorol_3' => 'TEXTO LARGO DE PRUEBA',
	'danorol_4' => 'TEXTO LARGO DE PRUEBA',
	'danorol_5' => 'TEXTO LARGO DE PRUEBA',
	'danoplaca_1' => 'TEXTO LARGO DE PRUEBA',
	'danoplaca_2' => 'TEXTO LARGO DE PRUEBA',
	'danoplaca_3' => 'TEXTO LARGO DE PRUEBA',
	'danoplaca_4' => 'TEXTO LARGO DE PRUEBA',
	'danoplaca_5' => 'TEXTO LARGO DE PRUEBA',
	'danoobservaciones_1' => 'TEXTO LARGO DE PRUEBA',
	'danoobservaciones_2' => 'TEXTO LARGO DE PRUEBA',
	'danoobservaciones_3' => 'TEXTO LARGO DE PRUEBA',
	'danoobservaciones_4' => 'TEXTO LARGO DE PRUEBA',
	'danoobservaciones_5' => 'TEXTO LARGO DE PRUEBA',
	
	'danoambientaltipo_1' => 'TEXTO LARGO DE PRUEBA',
	'danoambientaltipo_2' => 'TEXTO LARGO DE PRUEBA',
	'danoambientaltipo_3' => 'TEXTO LARGO DE PRUEBA',
	'danoambientaltipo_4' => 'TEXTO LARGO DE PRUEBA',
	'danoambientaltipo_5' => 'TEXTO LARGO DE PRUEBA',
	'danoambientalvol_1' => 'TEXTO LARGO DE PRUEBA',
	'danoambientalvol_2' => 'TEXTO LARGO DE PRUEBA',
	'danoambientalvol_3' => 'TEXTO LARGO DE PRUEBA',
	'danoambientalvol_4' => 'TEXTO LARGO DE PRUEBA',
	'danoambientalvol_5' => 'TEXTO LARGO DE PRUEBA',
	'danoambientalvolrec_1' => 'TEXTO LARGO DE PRUEBA',
	'danoambientalvolrec_2' => 'TEXTO LARGO DE PRUEBA',
	'danoambientalvolrec_3' => 'TEXTO LARGO DE PRUEBA',
	'danoambientalvolrec_4' => 'TEXTO LARGO DE PRUEBA',
	'danoambientalvolrec_5' => 'TEXTO LARGO DE PRUEBA',
	'danoambientalmaterial_1' => 'TEXTO LARGO DE PRUEBA',
	'danoambientalmaterial_2' => 'TEXTO LARGO DE PRUEBA',
	'danoambientalmaterial_3' => 'TEXTO LARGO DE PRUEBA',
	'danoambientalmaterial_4' => 'TEXTO LARGO DE PRUEBA',
	'danoambientalmaterial_5' => 'TEXTO LARGO DE PRUEBA',
	'danoambientalcomentarios_1' => 'TEXTO LARGO DE PRUEBA',
	'danoambientalcomentarios_2' => 'TEXTO LARGO DE PRUEBA',
	'danoambientalcomentarios_3' => 'TEXTO LARGO DE PRUEBA',
	'danoambientalcomentarios_4' => 'TEXTO LARGO DE PRUEBA',
	'danoambientalcomentarios_5' => 'TEXTO LARGO DE PRUEBA',
	
	'analisis_1' => 'TEXTO LARGO DE PRUEBA',
	'analisis_2' => 'TEXTO LARGO DE PRUEBA',
	'analisis_3' => 'TEXTO LARGO DE PRUEBA',
	'analisis_4' => 'TEXTO LARGO DE PRUEBA',
	'analisis_5' => 'TEXTO LARGO DE PRUEBA',
	'analisis_6' => 'TEXTO LARGO DE PRUEBA',
	
	'causainmediata_1' => 'TEXTO LARGO DE PRUEBA',
	'causainmediata_2' => 'TEXTO LARGO DE PRUEBA',
	'causainmediata_3' => 'TEXTO LARGO DE PRUEBA',
	'causainmediata_4' => 'TEXTO LARGO DE PRUEBA',
	'causainmediata_5' => 'TEXTO LARGO DE PRUEBA',
	'causabasica_1' => 'TEXTO LARGO DE PRUEBA',
	'causabasica_2' => 'TEXTO LARGO DE PRUEBA',
	'causabasica_3' => 'TEXTO LARGO DE PRUEBA',
	'causabasica_4' => 'TEXTO LARGO DE PRUEBA',
	'causabasica_5' => 'TEXTO LARGO DE PRUEBA',
	'causaaccion_1' => 'TEXTO LARGO DE PRUEBA',
	'causaaccion_2' => 'TEXTO LARGO DE PRUEBA',
	'causaaccion_3' => 'TEXTO LARGO DE PRUEBA',
	'causaaccion_4' => 'TEXTO LARGO DE PRUEBA',
	'causaaccion_5' => 'TEXTO LARGO DE PRUEBA',
	'causafecha_1' => 'TEXTO LARGO DE PRUEBA',
	'causafecha_2' => 'TEXTO LARGO DE PRUEBA',
	'causafecha_3' => 'TEXTO LARGO DE PRUEBA',
	'causafecha_4' => 'TEXTO LARGO DE PRUEBA',
	'causafecha_5' => 'TEXTO LARGO DE PRUEBA',
	'causaejecutada_1' => 'TEXTO LARGO DE PRUEBA',
	'causaejecutada_2' => 'TEXTO LARGO DE PRUEBA',
	'causaejecutada_3' => 'TEXTO LARGO DE PRUEBA',
	'causaejecutada_4' => 'TEXTO LARGO DE PRUEBA',
	'causaejecutada_5' => 'TEXTO LARGO DE PRUEBA',
	'causaavance_1' => 'TEXTO LARGO DE PRUEBA',
	'causaavance_2' => 'TEXTO LARGO DE PRUEBA',
	'causaavance_3' => 'TEXTO LARGO DE PRUEBA',
	'causaavance_4' => 'TEXTO LARGO DE PRUEBA',
	'causaavance_5' => 'TEXTO LARGO DE PRUEBA',
	'causaasignado_1' => 'TEXTO LARGO DE PRUEBA',
	'causaasignado_2' => 'TEXTO LARGO DE PRUEBA',
	'causaasignado_3' => 'TEXTO LARGO DE PRUEBA',
	'causaasignado_4' => 'TEXTO LARGO DE PRUEBA',
	'causaasignado_5' => 'TEXTO LARGO DE PRUEBA',
	
	'conclusioninvestigacion' => 'TEXTO LARGO DE PRUEBA',
	'aprendizajeclave' => 'TEXTO LARGO DE PRUEBA',
	
	'equiponombre_1' => 'TEXTO LARGO DE PRUEBA',
	'equiponombre_2' => 'TEXTO LARGO DE PRUEBA',
	'equiponombre_3' => 'TEXTO LARGO DE PRUEBA',
	'equiponombre_4' => 'TEXTO LARGO DE PRUEBA',
	'equiponombre_5' => 'TEXTO LARGO DE PRUEBA',
	'equipocargo_1' => 'TEXTO LARGO DE PRUEBA',
	'equipocargo_2' => 'TEXTO LARGO DE PRUEBA',
	'equipocargo_3' => 'TEXTO LARGO DE PRUEBA',
	'equipocargo_4' => 'TEXTO LARGO DE PRUEBA',
	'equipocargo_5' => 'TEXTO LARGO DE PRUEBA',
	'equipofecha_1' => 'TEXTO LARGO DE PRUEBA',
	'equipofecha_2' => 'TEXTO LARGO DE PRUEBA',
	'equipofecha_3' => 'TEXTO LARGO DE PRUEBA',
	'equipofecha_4' => 'TEXTO LARGO DE PRUEBA',
	'equipofecha_5' => 'TEXTO LARGO DE PRUEBA',
	'equipofirma_1' => 'TEXTO LARGO DE PRUEBA',
	'equipofirma_2' => 'TEXTO LARGO DE PRUEBA',
	'equipofirma_3' => 'TEXTO LARGO DE PRUEBA',
	'equipofirma_4' => 'TEXTO LARGO DE PRUEBA',
	'equipofirma_5' => 'TEXTO LARGO DE PRUEBA',
	
	'evidenciaacciones' => 'TEXTO LARGO DE PRUEBA',
	'listadocumentos' => 'TEXTO LARGO DE PRUEBA',
);

$pdf = new FPDM('MODELO_PRUEBAS.pdf');
$pdf->Load($fields, false); // second parameter: false if field values are in ISO-8859-1, true if UTF-8
$pdf->Merge();
$pdf->Output();
?>
