<div class="container">
	<div class="row">
		<div class="span12">
			<ul class="breadcrumb">
				<li><i class="icon-fire"></i> <?php echo $this->lang->line('contests'); ?></li>
				<li><span class="divider">|</span></li>
				<li><i class="icon-list-alt"></i> <?php echo isset($contest) ? $this->lang->line('contest') . ' ' . $contest['id'] : $this->lang->line('new_contest'); ?></li>
			</ul>
		</div>
	</div>

	<div class="row">
		<div class="span12">
			<h3><?php echo isset($contest) ? $this->lang->line('edit_contest') : $this->lang->line('add_contest'); ?></h3>
			<form class="form-horizontal" action="" method="post">
				<div class="control-group<?php echo form_error('form[name]') == '' ? '' : ' error'; ?>">
					<label class="control-label"><?php echo $this->lang->line('name'); ?></label>
					<div class="controls">
						<input name="form[name]" type="text" class="span4" maxlength="50" value="<?php echo set_value('form[name]', @$contest['name']); ?>"/>
						<span class="help-inline"><?php echo form_error('form[name]'); ?></span>
					</div>
				</div>

				<?php
					$tnames = array('start_time', 'end_time', 'freeze_time', 'unfreeze_time');
					$tlabels = array($this->lang->line('start_time'), $this->lang->line('end_time'), $this->lang->line('freeze_time'), $this->lang->line('unfreeze_time'));
					for ($i = 0; $i < 4; $i++) : ?>

					<div class="control-group<?php echo form_error('form[' . $tnames[$i] . ']') == '' ? '' : ' error'; ?>">
						<label class="control-label"><?php echo $tlabels[$i]; ?></label>
						<div class="controls">
							<div class="input-append">
								<input name="<?php echo 'form[' . $tnames[$i] . ']'; ?>" id="anytime_<?php echo $tnames[$i]; ?>" type="text" class="span4" maxlength="19" value="<?php echo set_value('form[' . $tnames[$i] . ']', @$contest[$tnames[$i]]); ?>"/>
							</div>
							<span class="help-inline"><?php echo form_error('form[' . $tnames[$i] . ']'); ?></span>
							<?php if ($i >= 2): ?>
								<p class="help-block"><?php echo $this->lang->line('no_freeze_time'); ?></p>
							<?php endif; ?>
						</div>
					</div>
				<?php endfor; ?>

				<div class="control-group">
					<label class="control-label"><?php echo $this->lang->line('is_active'); ?></label>
					<div class="controls">
						<input name="form[enabled]" type="checkbox" value="1" <?php echo set_checkbox('form[enabled]', '1', (bool)@$contest['enabled']); ?>/>
					</div>
				</div>

				<div class="control-group">
					<label class="control-label"><?php echo $this->lang->line('category'); ?></label>
					<div class="controls">
						<?php if (count($contest_members) == 1) : ?>
							<p>(<?php echo $this->lang->line('no_category'); ?>)</p>
						<?php endif; ?>
						<?php foreach ($contest_members as $k => $v): if ($k == 1) continue; ?>
							<label class="checkbox">
								<input name="<?php echo 'c' . $k; ?>" type="checkbox" value="1" <?php echo set_checkbox('c' . $k, '1', @$v['present']); ?>/>
								<?php echo $v['name']; ?>
							</label>
						<?php endforeach; ?>
					</div>
				</div>

				<div class="control-group">
					<label class="control-label"><?php echo $this->lang->line('language'); ?></label>
					<div class="controls">
						<?php if (count($contest_languages) == 0) : ?>
							<p>(<?php echo $this->lang->line('no_language'); ?>)</p>
						<?php endif; ?>
						<?php foreach ($contest_languages as $k => $v): ?>
							<label class="checkbox">
								<input name="<?php echo 'l' . $k; ?>" type="checkbox" value="1" <?php echo set_checkbox('l' . $k, '1', @$v['present']); ?>/>
								<?php echo $v['name']; ?>
							</label>
						<?php endforeach; ?>
					</div>
				</div>

				<div class="form-actions">
					<button type="submit" class="btn btn-danger"><?php echo isset($contest) ? '<i class="icon-download-alt icon-white"></i> ' . $this->lang->line('save') : '<i class="icon-plus icon-white"></i> ' . $this->lang->line('add'); ?></button>
					<a class="btn" href="<?php echo site_url('admin/contest/viewAll/' . $page_offset); ?>"><?php echo $this->lang->line('cancel'); ?></a>
				</div>
			</form>
		</div>
	</div>
</div>

<script type="text/javascript">
	AnyTime.picker("anytime_start_time", {format: "%Y-%m-%d %H:%i:%s"});
	AnyTime.picker("anytime_end_time", {format: "%Y-%m-%d %H:%i:%s"});
	AnyTime.picker("anytime_freeze_time", {format: "%Y-%m-%d %H:%i:%s"});
	AnyTime.picker("anytime_unfreeze_time", {format: "%Y-%m-%d %H:%i:%s"});
</script>