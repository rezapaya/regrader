<div class="container">
	<div class="row">
		<div class="span12">
			<ul class="breadcrumb">
				<li><i class="icon-fire"></i> <?php echo $this->lang->line('contests'); ?></li>
				<li><span class="divider">|</span></li>
				<li><i class="icon-list-alt"></i> <?php echo $this->lang->line('contest_list'); ?></li>
				<li><span class="divider">|</span></li>
				<li><i class="icon-plus"></i> <a href="<?php echo site_url('admin/contest/edit/0/' . $page_offset); ?>"><?php echo $this->lang->line('add_new_contest'); ?></a></li>
			</ul>
		</div>
	</div>
	
	<div class="row">
		<div class="span12">
			<?php if ($this->session->flashdata('add_successful')): ?>
			<div class="alert alert-success">
				<?php echo $this->lang->line('add_contest_successful'); ?>
			</div>
			<?php endif; ?>

			<?php if ($this->session->flashdata('edit_successful')): ?>
			<div class="alert alert-success">
				<?php echo $this->lang->line('edit_contest_successful'); ?>
			</div>
			<?php endif; ?>

			<?php if ($this->session->flashdata('delete_successful')): ?>
			<div class="alert alert-success">
				<?php echo $this->lang->line('delete_contest_successful'); ?>
			</div>
			<?php endif; ?>

			<?php if ($this->session->flashdata('error') != ''): ?>
			<div class="alert alert-error">
				<?php echo $this->session->flashdata('error'); ?>
			</div>
			<?php endif; ?>

			<h3><?php echo $this->lang->line('contest_list'); ?></h3>

			<?php if (count($contests) == 0) : ?>
				<p><i><?php echo $this->lang->line('no_contest'); ?></h3></i></p>
			<?php else: ?>
				<p><?php printf($this->lang->line('showing_contests'),  (($page_offset-1)*$items_per_page + 1), (($page_offset-1)*$items_per_page + count($contests)), $total_contests); ?></p>
			<?php endif; ?>
			
			<table class="table table-bordered table-striped">
				<thead>
					<tr>
						<th class="id-th"><i class="icon-tag icon-white"></i></th>
						<th><i class="icon-eye-open icon-white"></i> <?php echo $this->lang->line('name'); ?></th>
						<th><i class="icon-calendar icon-white"></i> <?php echo $this->lang->line('start_time'); ?></th>
						<th><i class="icon-calendar icon-white"></i> <?php echo $this->lang->line('end_time'); ?></th>
						<th><i class="icon-calendar icon-white"></i> <?php echo $this->lang->line('freeze_time'); ?></th>
						<th><i class="icon-calendar icon-white"></i> <?php echo $this->lang->line('unfreeze_time'); ?></th>
						<th><i class="icon-star icon-white"></i> <?php echo $this->lang->line('status'); ?></th>
						<th class="operations-th"><i class="icon-cog icon-white"></i></th>
					</tr>
				</thead>

				<tbody>
					<?php foreach ($contests as $v) : ?>
					<tr>
						<td class="id-td"><?php echo $v['id']; ?></td>
						<td><?php echo $v['name']; ?></td>
						<td><?php echo $v['start_time']; ?></td>
						<td><?php echo $v['end_time']; ?></td>
						<td><?php echo $v['freeze_time']; ?></td>
						<td><?php echo $v['unfreeze_time']; ?></td>
						<td class="contest-enabled-td"><?php echo $v['enabled'] ? '<span class="label label-success">' . $this->lang->line('active') . '</span>' : '<span class="label label-important">' . $this->lang->line('not_active') . '</span>'; ?></td>
						<td class="operations-td">
							<a href="<?php echo site_url('admin/contest/edit/' . $v['id'] . '/' . $page_offset); ?>" rel="tooltip" title="<?php echo $this->lang->line('edit'); ?>"><i class="icon-pencil"></i></a>
							<a href="<?php echo site_url('admin/contest/editProblems/' . $v['id'] .'/' . $page_offset); ?>" rel="tooltip" title="<?php echo $this->lang->line('problem'); ?>"><i class="icon-book"></i></a>
							<a href="<?php echo site_url('admin/contest/delete/' . $v['id'] . '/' . $page_offset); ?>" rel="tooltip" title="<?php echo $this->lang->line('delete'); ?>" onclick="return confirm('<?php printf($this->lang->line('confirm_delete_contest'), $v['id'], $v['name']); ?>');"><i class="icon-trash"></i></td>
						</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
			
			<div class="pagination">
				<?php echo $pager; ?>
			</div>
		</div>
	</div>
	
</div>