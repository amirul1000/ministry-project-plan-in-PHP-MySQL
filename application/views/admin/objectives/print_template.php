<link rel="stylesheet"
	href="<?php echo base_url(); ?>public/css/custom.css">
<h3 class="font-20 mt-15 mb-1"><?php echo str_replace('_',' ','Objectives'); ?></h3>
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
<!--Data display of objectives-->
<table cellspacing="3" cellpadding="3" class="table" align="center">
	<tr>
		<th>Department</th>
		<th>Financial Year</th>
		<th>Sl No</th>
		<th>Objectives Name</th>
		<th>Weight Of Objectives</th>

	</tr>
	<?php foreach($objectives as $c){ ?>
    <tr>
		<td><?php
    $this->CI = & get_instance();
    $this->CI->load->database();
    $this->CI->load->model('Department_model');
    $dataArr = $this->CI->Department_model->get_department($c['department_id']);
    echo $dataArr['department'];
    ?>
									</td>
		<td><?php echo $c['financial_year']; ?></td>
		<td><?php echo $c['sl_no']; ?></td>
		<td><?php echo $c['objectives_name']; ?></td>
		<td><?php echo $c['weight_of_objectives']; ?></td>

	</tr>
	<?php } ?>
</table>
<!--End of Data display of objectives//-->
