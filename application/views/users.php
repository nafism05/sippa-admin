<table cellpadding=0 cellspacing=10>
	<tr>
		<th>First Name</th>
		<th>Last Name</th>
		<th>Email</th>
		<th>Groups</th>
		<th>Status</th>
		<th>Action</th>
	</tr>
	<?php foreach ($users as $user):
		if(!$this->ion_auth->is_admin($user->id)){ ?>
			<tr>
	            <td><?php echo htmlspecialchars($user->first_name,ENT_QUOTES,'UTF-8');?></td>
	            <td><?php echo htmlspecialchars($user->last_name,ENT_QUOTES,'UTF-8');?></td>
	            <td><?php echo htmlspecialchars($user->email,ENT_QUOTES,'UTF-8');?></td>
				<td>
					<?php foreach ($user->groups as $group):?>
						<?php echo anchor("auth/edit_group/".$group->id, htmlspecialchars($group->name,ENT_QUOTES,'UTF-8')) ;?><br />
	                <?php endforeach?>
				</td>
				<td><?php echo ($user->active) ? anchor("auth/deactivate/".$user->id, 'Active') : anchor("auth/activate/". $user->id, lang('index_inactive_link'));?></td>
				<td><?php echo anchor("auth/edit_user/".$user->id, 'Edit') ;?></td>
			</tr>
		<?php } 
	endforeach;?>
</table>

<p><?php echo anchor('create_user', 'Create User')?></p>