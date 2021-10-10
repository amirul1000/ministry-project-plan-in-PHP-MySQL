<!--Left Menu-->
<nav>
	<ul class="sidebar-menu" data-widget="tree">
		<li class="sidemenu-user-profile d-flex align-items-center">
			<div class="user-thumbnail">
                <?php
                if (is_file(APPPATH . '../public/' . $this->session->userdata['file_picture']) && file_exists(APPPATH . '../public/' . $this->session->userdata['file_picture'])) {
                    ?>
					  <img
					src="<?php echo base_url().'public/'.$this->session->userdata['file_picture']?>"
					alt="">
				<?php
                } else {
                    ?>
					  <img class="border-radius-50"
					src="<?php echo base_url()?>public/uploads/no_image.jpg">
				<?php
                }
                ?>
            </div>
			<div class="user-content">
				<h6><?php echo $this->session->userdata['first_name']?> <?php echo $this->session->userdata['last_name']?></h6>
				<!--<span>Pro User</span>-->
			</div>
		</li>
		<li <?php if($this->router->fetch_class()=="homecontroller"){?>
			class="active" <?php }?>><a
			href="<?php echo site_url('admin/homecontroller'); ?>"><i
				class="icon_lifesaver"></i> <span>Dashboard</span></a></li>
		<li <?php if($this->router->fetch_class()=="homecontroller"){?>
			class="active" <?php }?>><a
			href="<?php echo site_url('homecontroller'); ?>"><i
				class="icon_document_alt"></i> <span>Landing</span></a></li>         
        <?php
        $menu_open = false;
        if ($this->router->fetch_class() == "profile" || $this->router->fetch_class() == "country" || $this->router->fetch_class() == "company" || $this->router->fetch_class() == "users" || $this->router->fetch_class() == "category") {
            $menu_open = true;
        }
        ?>
        <li
			class="treeview <?php if($menu_open==true){?>menu-open<?php }?>"><a
			href="javascript:void(0)"><i class="icon_document_alt"></i> <span>Settings</span>
				<i class="fa fa-angle-right"></i></a>
			<ul class="treeview-menu" <?php if($menu_open==true){?>
				style="display: block;" <?php }?>>
				<li <?php if($this->router->fetch_class()=="profile"){?>
					class="active" <?php }?>><a
					href="<?php echo site_url('admin/profile/index'); ?>">- Profile</a></li>
				<li <?php if($this->router->fetch_class()=="country"){?>
					class="active" <?php }?>><a
					href="<?php echo site_url('admin/country/index'); ?>">- Country</a></li>
				<li <?php if($this->router->fetch_class()=="company"){?>
					class="active" <?php }?>><a
					href="<?php echo site_url('admin/company/index'); ?>">- Company</a></li>
				<li <?php if($this->router->fetch_class()=="users"){?>
					class="active" <?php }?>><a
					href="<?php echo site_url('admin/users/index'); ?>">- Users</a></li>
			</ul></li>
		<li <?php if($this->router->fetch_class()=="department"){?>
			class="active" <?php }?>><a
			href="<?php echo site_url('admin/department/index'); ?>"><i
				class="icon_table"></i>Department</a></li>
		<li <?php if($this->router->fetch_class()=="objectives"){?>
			class="active" <?php }?>><a
			href="<?php echo site_url('admin/objectives/index'); ?>"><i
				class="icon_table"></i>Objectives</a></li>
        <li <?php if($this->router->fetch_class()=="predefined_activities"){?>
			class="active" <?php }?>><a
			href="<?php echo site_url('admin/predefined_activities/index'); ?>"><i
				class="icon_table"></i>Predefined Activities</a></li>        
		<li <?php if($this->router->fetch_class()=="activities"){?>
			class="active" <?php }?>><a
			href="<?php echo site_url('admin/activities/index'); ?>"><i
				class="icon_table"></i>Activities</a></li>
		<li
			<?php if($this->router->fetch_class()=="performance_indicators"){?>
			class="active" <?php }?>><a
			href="<?php echo site_url('admin/performance_indicators/index'); ?>"><i
				class="icon_table"></i>Performance Indicators</a></li>
		<li
			<?php if($this->router->fetch_class()=="predefined_innovation_plan"){?>
			class="active" <?php }?>><a
			href="<?php echo site_url('admin/predefined_innovation_plan/index'); ?>"><i
				class="icon_table"></i>Predefined Innovation Plan</a></li>
		<li <?php if($this->router->fetch_class()=="innovation_plan"){?>
			class="active" <?php }?>><a
			href="<?php echo site_url('admin/innovation_plan/index'); ?>"><i
				class="icon_table"></i>Innovation Plan</a></li>
		<li <?php if($this->router->fetch_class()=="documents"){?>
			class="active" <?php }?>><a
			href="<?php echo site_url('admin/documents/index'); ?>"><i
				class="icon_table"></i>Documents</a></li>
	</ul>
</nav>
<!--End of Left Menu//-->