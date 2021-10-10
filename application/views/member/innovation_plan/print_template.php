<link rel="stylesheet"
	href="<?php echo base_url(); ?>public/css/custom.css">
<h3 class="font-20 mt-15 mb-1"><?php echo str_replace('_',' ','Innovation_plan'); ?></h3>
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
<!--Data display of innovation_plan-->
<table cellspacing="3" cellpadding="3" class="table" align="center">
	<tr>
		<th>Users</th>
		<th>Objectives</th>
		<th>Weight Of Objectives</th>
		<th>Activities</th>
		<th>Performance Indicators</th>
		<th>Unit</th>
		<th>Wop Indicators</th>
		<th>1st</th>
		<th>2nd</th>
		<th>3rd</th>
		<th>4th</th>
		<th>5th</th>

	</tr>
	<?php foreach($innovation_plan as $c){ ?>
    <tr>
		<td><?php
    $this->CI = & get_instance();
    $this->CI->load->database();
    $this->CI->load->model('Users_model');
    $dataArr = $this->CI->Users_model->get_users($c['users_id']);
    echo $dataArr['email'];
    ?>
									</td>
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
		<td><?php echo $c['1st']; ?></td>
		<td><?php echo $c['2nd']; ?></td>
		<td><?php echo $c['3rd']; ?></td>
		<td><?php echo $c['4th']; ?></td>
		<td><?php echo $c['5th']; ?></td>

	</tr>
	<?php } ?>
</table>
<!--End of Data display of innovation_plan//-->
