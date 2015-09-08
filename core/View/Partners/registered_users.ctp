<div class="partners index">
<h2><?php  echo __('Registered Users'); ?></h2>
<table>
	<tr>
		<th>Reigstered Users</th>
		<th>Maximum Registered Users</th>
	</tr>
	<tr>
		<td><?php echo $partner['Partner']['user_count']; ?></td>
		<td><?php echo $partner['Partner']['users_limit']; ?></td>
	</tr>
</table>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Registered Users'), array('action' => 'registered_users')); ?> </li>
		<li><?php echo $this->Html->link(__('Purchase Additional User Licenses'), '#'); ?> </li>		
	</ul>
</div>