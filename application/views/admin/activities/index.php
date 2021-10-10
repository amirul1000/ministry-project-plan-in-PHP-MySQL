<h5 class="font-20 mt-15 mb-1"><?php echo str_replace('_',' ','Activities'); ?></h5>
<?php
echo $this->session->flashdata('msg');
?>
<!--Action-->
<div>
	<div class="float_left padding_10">
		<a href="<?php echo site_url('admin/activities/save'); ?>"
			class="btn btn-success">Add</a>
	</div>
	<div class="float_left padding_10">
		<i class="fa fa-download"></i> Export <select name="xeport_type"
			class="select"
			onChange="window.location='<?php echo site_url('admin/activities/export'); ?>/'+this.value">
			<option>Select..</option>
			<option>Pdf</option>
			<option>CSV</option>
		</select>
	</div>
	<div class="float_right padding_10">
		<ul class="left-side-navbar d-flex align-items-center">
			<li class="hide-phone app-search mr-15">
                <?php echo form_open_multipart('admin/activities/search/',array("class"=>"form-horizontal")); ?>
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

<!--Data display of activities-->
<table class="table table-striped table-bordered">
	<tr>
		<th>Objectives</th>
		<th>Activities Name</th>
		<th>Description</th>
		<th>Order No</th>

		<th>Actions</th>
	</tr>
	<?php foreach($activities as $c){ ?>
    <tr>
		<td><?php
    $this->CI = & get_instance();
    $this->CI->load->database();
    $this->CI->load->model('Objectives_model');
    $dataArr = $this->CI->Objectives_model->get_objectives($c['objectives_id']);
    echo $dataArr['objectives_name'];
    ?>
									</td>
		<td><?php echo $c['activities_name']; ?></td>
		<td><?php echo $c['description']; ?></td>
		<td><?php echo $c['order_no']; ?></td>

		<td><a
			href="<?php echo site_url('admin/activities/details/'.$c['id']); ?>"
			class="action-icon"> <i class="zmdi zmdi-eye"></i></a> <a
			href="<?php echo site_url('admin/activities/save/'.$c['id']); ?>"
			class="action-icon"> <i class="zmdi zmdi-edit"></i></a> <a
			href="<?php echo site_url('admin/activities/remove/'.$c['id']); ?>"
			onClick="return confirm('Are you sure to delete this item?');"
			class="action-icon"> <i class="zmdi zmdi-delete"></i></a></td>
	</tr>
	<?php } ?>
</table>
<!--End of Data display of activities//-->

<!--No data-->
<?php
if (count($activities) == 0) {
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
