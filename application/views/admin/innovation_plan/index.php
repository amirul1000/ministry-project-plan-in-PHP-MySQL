<h5 class="font-20 mt-15 mb-1"><?php echo str_replace('_',' ','Innovation_plan'); ?></h5>
<?php
echo $this->session->flashdata('msg');
?>
<!--Action-->
<div>
	<div class="float_left padding_10">
		<a href="<?php echo site_url('admin/innovation_plan/save'); ?>"
			class="btn btn-success">Add</a>
	</div>
	<div class="float_left padding_10">
		<i class="fa fa-download"></i> Export <select name="xeport_type"
			class="select"
			onChange="window.location='<?php echo site_url('admin/innovation_plan/export'); ?>/'+this.value">
			<option>Select..</option>
			<option>Pdf</option>
			<option>CSV</option>
		</select>
	</div>
	<div class="float_right padding_10">
		<ul class="left-side-navbar d-flex align-items-center">
			<li class="hide-phone app-search mr-15">
                <?php echo form_open_multipart('admin/innovation_plan/search/',array("class"=>"form-horizontal")); ?>
                    <input name="key" type="text"
				value="<?php echo isset($key)?$key:'';?>" placeholder="Search..."
				class="form-control">
				<button type="submit" class="mr-0">
					<i class="fa fa-search"></i>
				</button>
                <?php echo form_close(); ?>
            </li>
		</ul>
	</div>
</div>
<!--End of Action//-->

<!--Data display of innovation_plan-->
<table class="table table-striped table-bordered">
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

		<th>Actions</th>
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

		<td><a
			href="<?php echo site_url('admin/innovation_plan/details/'.$c['id']); ?>"
			class="action-icon"> <i class="zmdi zmdi-eye"></i></a> <a
			href="<?php echo site_url('admin/innovation_plan/save/'.$c['id']); ?>"
			class="action-icon"> <i class="zmdi zmdi-edit"></i></a> <a
			href="<?php echo site_url('admin/innovation_plan/remove/'.$c['id']); ?>"
			onClick="return confirm('Are you sure to delete this item?');"
			class="action-icon"> <i class="zmdi zmdi-delete"></i></a></td>
	</tr>
	<?php } ?>
</table>
<!--End of Data display of innovation_plan//-->

<!--No data-->
<?php
if (count($innovation_plan) == 0) {
    ?>
<div align="center">
	<h3>Data is not exists</h3>
</div>
<?php
}
?>
<!--End of No data//-->

<!--Pagination-->
<?php
echo $link;
?>
<!--End of Pagination//-->
