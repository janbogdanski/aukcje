<?php
/*
	This file is part of UserMgmt.

	Author: Chetan Varshney (http://ektasoftwares.com)

	UserMgmt is free software: you can redistribute it and/or modify
	it under the terms of the GNU General Public License as published by
	the Free Software Foundation, either version 3 of the License, or
	(at your option) any later version.

	UserMgmt is distributed in the hope that it will be useful,
	but WITHOUT ANY WARRANTY; without even the implied warranty of
	MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
	GNU General Public License for more details.

	You should have received a copy of the GNU General Public License
	along with Foobar.  If not, see <http://www.gnu.org/licenses/>.
*/
?>
<div id="dashboard" class="row-fluid">
	<div style="float:left"><?php echo $this->Html->link(__("Dashboard",true),"/dashboard", array('class' => 'm-btn mini blue')) ?></div>
<?php   if ($this->UserAuth->isAdmin()) { ?>
	<div style="float:left;padding-left:10px"><?php echo $this->Html->link(__("Add User",true),"/addUser", array('class' => 'm-btn mini blue')) ?></div>
	<div style="float:left;padding-left:10px"><?php echo $this->Html->link(__("All Users",true),"/allUsers", array('class' => 'm-btn mini blue')) ?></div>
	<div style="float:left;padding-left:10px"><?php echo $this->Html->link(__("Add Group",true),"/addGroup", array('class' => 'm-btn mini blue')) ?></div>
	<div style="float:left;padding-left:10px"><?php echo $this->Html->link(__("All Groups",true),"/allGroups", array('class' => 'm-btn mini blue')) ?></div>
	<div style="float:left;padding-left:10px"><?php echo $this->Html->link(__("Permissions",true),"/permissions", array('class' => 'm-btn mini blue')) ?></div>
	<div style="float:left;padding-left:10px"><?php echo $this->Html->link(__("Profile",true),"/viewUser/".$this->UserAuth->getUserId(), array('class' => 'm-btn mini blue')) ?></div>
	<div style="float:left;padding-left:10px"><?php echo $this->Html->link(__("Edit Profile",true),"/editUser/".$this->UserAuth->getUserId(), array('class' => 'm-btn mini blue')) ?></div>
<?php   } else {?>
	<div style="float:left;padding-left:10px"><?php echo $this->Html->link(__("Profile",true),"/myprofile", array('class' => 'm-btn mini blue')) ?></div>
<?php   } ?>
	<div style="float:left;padding-left:10px"><?php echo $this->Html->link(__("Change Password",true),"/changePassword", array('class' => 'm-btn mini blue')) ?></div>
<!--	<div style="float:right;padding-left:10px">--><?php //echo $this->Html->link(__("Sign Out",true),"/logout", array('class' => 'm-btn mini red')) ?><!--</div>-->
	<div style="clear:both"></div>
</div>