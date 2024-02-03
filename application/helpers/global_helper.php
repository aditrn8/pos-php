<?php
function cekvar($var)
{
	$CI = &get_instance();
	echo "<pre>";
	print_r($var);
	echo "</pre>";
	exit();
}
function cekdb()
{
	$CI = &get_instance();
	echo "<pre>";
	print_r($CI->db->last_query());
	echo "</pre>";
	exit();
}
function sub_module_option($tbl, $fild, $ref, $kd = "")
{
	$er = form_error($fild) ? "invalid" : "";
	$opt = '<div class="' . $er . '"><select class="form-control default-select2" id="' . $fild . '" name="' . $fild . '"' . $kd . '>';
	$opt .= '<option value=""> Pilih </option>';
	foreach ($tbl->result() as $op) {
		$opt .= '<option value="' . $op->{$fild} . '" ' . set_select($fild, $op->{$fild}) . '>' . $op->{$ref} . '</option>';
	}
	$opt .= '</select></div>';
	echo $opt;
}
function sub_module_option_polos($fild, $kd = "")
{
	$er = form_error($fild) ? "invalid" : "";
	$opt = '<div class="' . $er . '"><select class="form-control default-select2" id="' . $fild . '" name="' . $fild . '"' . $kd . '>';
	$opt .= '<option value=""> Pilih </option>';
	$opt .= '</select></div>';
	echo $opt;
}
function sub_module_option_2($tbl, $fild, $fild2, $kd = "")
{
	$er = form_error($fild) ? "invalid" : "";
	$opt = '<div class="' . $er . '"><select class="form-control default-select2" id="' . $fild . '" name="' . $fild . '"' . $kd . '>';
	$opt .= '<option value=""> Pilih </option>';
	foreach ($tbl->result() as $op) {
		$opt .= '<option value="' . $op->{$fild} . '" ' . set_select($fild, $op->{$fild}) . '>' . $op->{$fild} . ' | ' .  $op->{$fild2} . '</option>';
	}
	$opt .= '</select></div>';
	echo $opt;
}
function sub_module_option_2_value($tbl, $fild, $fild2, $kd = "")
{
	$er = form_error($fild) ? "invalid" : "";
	$opt = '<div class="' . $er . '"><select class="form-control  default-select2" id="' . $fild . '" name="' . $fild . '"' . $kd . ' aria-hidden="true">';
	$opt .= '<option value=""> Pilih </option>';
	foreach ($tbl->result() as $op) {
		$opt .= '<option value="' . $op->{$fild} . ' | ' . $op->{$fild2} . '" ' . set_select($fild, $op->{$fild} . ' | ' . $op->{$fild2}) . '>' . $op->{$fild} . ' | ' . $op->{$fild2} . '</option>';
	}
	$opt .= '</select></div>';
	echo $opt;
}
function sub_module_option_3_value($tbl, $fild, $fild2, $fild3, $kd = "")
{
	$er = form_error($fild) ? "invalid" : "";
	$opt = '<div class="' . $er . '"><select class="form-control  default-select2" id="' . $fild . '" name="' . $fild . '"' . $kd . ' aria-hidden="true">';
	$opt .= '<option value=""> Pilih </option>';
	foreach ($tbl->result() as $op) {
		$opt .= '<option value="' . $op->{$fild} . ' | ' . $op->{$fild2} . ' | ' . $op->{$fild3} . '" ' . set_select($fild, $op->{$fild} . ' | ' . $op->{$fild2} . ' | ' . $op->{$fild3}) . '>' . $op->{$fild2} . ' | ' . $op->{$fild3} . '</option>';
	}
	$opt .= '</select></div>';
	echo $opt;
}

function sub_module_text($fild, $kd = "")
{
	$er = form_error($fild) ? "invalid" : "";
	$v = '<div class="' . $er . '"><input style="width:100%;" type="text" id="' . $fild . '" name="' . $fild . '" value="' . set_value($fild) . '" ' . $kd . ' class="form-control" placeholder="Input ' .  preg_replace('/_/', ' ', $fild) . '" /></div>';
	echo $v;
}
function sub_module_barcode($fild, $kd = "")
{
	$er = form_error($fild) ? "invalid" : "";
	$vl = $er == "invalid" ? "" : set_value($fild);
	$v = '<div class="' . $er . '"><input style="width:100%;" type="text" id="' . $fild . '" name="' . $fild . '" value="' . $vl . '" ' . $kd . ' class="form-control" placeholder="Input ' .  preg_replace('/_/', ' ', $fild) . '" /></div>';
	echo $v;
}
function sub_module_textarea($fild, $kd = "")
{
	$er = form_error($fild) ? "invalid" : "";
	$v = '<div class="' . $er . '"><textarea style="width:100%;" rows="2" id="' . $fild . '" name="' . $fild . '" ' . $kd . ' class="form-control" placeholder="Input ' .  preg_replace('/_/', ' ', $fild) . '" >' . set_value($fild) . '</textarea></div>';
	echo $v;
}
function sub_module_numeric($fild, $kd = "")
{
	$er = form_error($fild) ? "invalid" : "";
	$v = '<div class="' . $er . '"><input style="width:100%;" id="' . $fild . '" name="' . $fild . '" value="' . set_value($fild, 1) . '" ' . $kd . ' class="form-control" placeholder="Input ' .  preg_replace('/_/', ' ', $fild)  . '" /></div>';
	echo $v;
}
function sub_module_date($fild, $kd = "")
{
	$er = form_error($fild) ? "invalid" : "";
	$v = '<div class="' . $er . '"><input style="width:100%;" data-date-format="dd-mm-yyyy" type="date" id="' . $fild . '" name="' . $fild . '" value="' . set_value($fild) . '" ' . $kd . ' class="form-control datepicker1" /></div>';

	echo $v;
}
function sub_module_date_e($fild, $vl, $kd = "")
{
	$er = form_error($fild) ? "invalid" : "";
	$dt = form_error($fild) ? set_value($fild) : $vl;
	$v = '<div class="' . $er . '"><input style="width:100%;" data-date-format="dd-mm-yyyy" type="date" id="' . $fild . '" name="' . $fild . '" value="' . $dt . '" ' . $kd . ' class="form-control datepicker1" /></div>';

	echo $v;
}

function sub_module_text_e($fild, $vl, $kd = "")
{
	$er = form_error($fild) ? "invalid" : "";
	$dt = form_error($fild) ? set_value($fild) : $vl;
	$v = '<div class="' . $er . '"><input style="width:100%;" type="text" id="' . $fild . '" name="' . $fild . '" value="' . $dt . '" ' . $kd . ' class="form-control" placeholder="Input ' .  preg_replace('/_/', ' ', $fild) . '" /></div>';
	echo $v;
}
function sub_module_option_e($tbl, $fild, $ref, $vl, $kd = "")
{
	$er = form_error($fild) ? "invalid" : "";
	$dt = form_error($fild) ? set_value($fild) : $vl;

	$opt = '<div class="' . $er . '"><select style="width:100%;" class="form-control  default-select2" id="' . $fild . '" name="' . $fild . '" ' . $kd . '>';
	$opt .= '<option value=""> Pilih </option>';
	foreach ($tbl->result() as $op) {
		$selec = $dt == $op->{$fild} ? " selected" : "";
		$opt .= '<option value="' . $op->{$fild} . '" ' . $selec . '>' . $op->{$ref} . '</option>';
	}
	$opt .= '</select></div>';
	echo $opt;
}
function sub_module_textarea_e($fild, $vl, $kd = "")
{
	$er = form_error($fild) ? "invalid" : "";
	$dt = form_error($fild) ? set_value($fild) : $vl;
	$v = '<div class="' . $er . '"><textarea style="width:100%;" rows="2" id="' . $fild . '" name="' . $fild . '" ' . $kd . '  class="form-control" placeholder="Input ' .  preg_replace('/_/', ' ', $fild) . '" >' . $dt . '</textarea></div>';
	echo $v;
}
function sub_module_numeric_e($fild, $vl, $kd = "")
{
	$er = form_error($fild) ? "invalid" : "";
	$dt = form_error($fild) ? set_value($fild) : $vl;
	$v = '<div class="' . $er . '"><input style="width:100%;" type="number" id="' . $fild . '" name="' . $fild . '" value="' . $dt . '" ' . $kd . ' class="form-control" placeholder="Input ' . preg_replace('/_/', '', $fild)  . '" />';
	echo $v;
}
function sub_module_texthidden($fild, $vl = "")
{
	$dt = set_value($fild) ? set_value($fild) : $vl;
	$v = '<input style="width:100%;" type="hidden" id="' . $fild . '" name="' . $fild . '" value="' . $dt . '" class="form-control" />';
	echo $v;
}
function sub_module_texthidden2($fild, $kd = "")
{
	$dt = form_error($fild) ? set_value($fild) : "";
	$v = '<input style="width:100%;" type="text" id="' . $fild . '" name="' . $fild . '" value="' . $dt . '" ' . $kd . ' class="form-control" />';
	echo $v;
}
function sub_module_option_e_2($tbl, $fild, $ref, $ref2, $vl, $kd = "")
{
	$er = form_error($fild) ? "invalid" : "";
	$dt = form_error($fild) ? set_value($fild) : $vl;

	$opt = '<div class="' . $er . '"><select style="width:100%;" class="form-control default-select2" id="' . $fild . '" name="' . $fild . '" ' . $kd . '>';
	$opt .= '<option value=""> Pilih </option>';
	foreach ($tbl->result() as $op) {
		$selec = $dt == $op->{$fild} ? " selected" : "";
		$opt .= '<option value="' . $op->{$fild} . '" ' . $selec . '>' . $op->{$ref} . ' | ' . $op->{$ref2} . '</option>';
	}
	$opt .= '</select></div>';
	echo $opt;
}
