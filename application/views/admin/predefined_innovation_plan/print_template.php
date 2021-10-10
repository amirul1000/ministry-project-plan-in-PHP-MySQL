<link rel="stylesheet"
	href="<?php echo base_url(); ?>public/css/custom.css">
<h3 class="font-20 mt-15 mb-1"><?php echo str_replace('_',' ','Predefined_innovation_plan'); ?></h3>
Date: <?php echo date("Y-m-d");?>
<hr>
<!--*************************************************
*********mpdf header footer page no******************
****************************************************-->
<htmlpageheader name="firstpage" class="hide"> </htmlpageheader>

<htmlpageheader name="otherpages" class="hide"> <span class="float_left"></span>
<span class="padding_5"> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</span>
<span class="float_right"></span> </htmlpageheader>
<sethtmlpageheader name="firstpage" value="on" show-this-page="1" />
<sethtmlpageheader name="otherpages" value="on" />

<htmlpagefooter name="myfooter" class="hide">
<div align="center">
	<br>
	<span class="padding_10">Page {PAGENO} of {nbpg}</span>
</div>
</htmlpagefooter>

<sethtmlpagefooter name="myfooter" value="on" />
<!--*************************************************
*********#////mpdf header footer page no******************
****************************************************-->
<!--Data display of predefined_innovation_plan-->
<table cellspacing="3" cellpadding="3" class="table" align="center">
	<tr>
		<th>Objectives</th>
		<th>Weight Of Objectives</th>
		<th>Activities</th>
		<th>Performance Indicators</th>
		<th>Unit</th>
		<th>Wop Indicators</th>

	</tr>
	<?php foreach($predefined_innovation_plan as $c){ ?>
    <tr>
		<td><?php
    $this->CI = & get_instance();
    $this->CI->load->database();
    $this->CI->load->model('Objectives_model');
    $dataArr = $this->CI->Objectives_model->get_objectives($c['objectives_id']);
    echo $dataArr['financial_year'];
    ?>
									</td>
		<td><?php echo $c['weight_of_objectives']; ?></td>
		<td><?php
    $this->CI = & get_instance();
    $this->CI->load->database();
    $this->CI->load->model('Activities_model');
    $dataArr = $this->CI->Activities_model->get_activities($c['activities_id']);
    echo $dataArr['activities_name'];
    ?>
									</td>
		<td><?php
    $this->CI = & get_instance();
    $this->CI->load->database();
    $this->CI->load->model('Performance_indicators_model');
    $dataArr = $this->CI->Performance_indicators_model->get_performance_indicators($c['performance_indicators_id']);
    echo $dataArr['unit'];
    ?>
									</td>
		<td><?php echo $c['unit']; ?></td>
		<td><?php echo $c['wop_indicators']; ?></td>

	</tr>
	<?php } ?>
</table>
<!--End of Data display of predefined_innovation_plan//-->
