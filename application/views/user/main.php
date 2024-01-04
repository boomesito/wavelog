<script>
	var lang_admin_confirm_pwd_reset = "<?php echo lang('admin_confirm_pwd_reset'); ?>";
	var lang_admin_user = "<?php echo lang('admin_user'); ?>";
	var lang_gen_hamradio_callsign = "<?php echo lang('gen_hamradio_callsign'); ?>";
</script>
<div class="container">

	<br>

	<h2><?php echo $page_title; ?></h2>

	<?php if ($this->session->flashdata('notice')) { ?>
		<!-- Display Message -->
		<div class="alert alert-info" role="alert">
			<?php echo $this->session->flashdata('notice'); ?>
		</div>

	<?php } ?>

	<?php if ($this->session->flashdata('success')) { ?>
		<!-- Display Message -->
		<div class="alert alert-success" role="alert">
			<?php echo $this->session->flashdata('success'); ?>
		</div>

	<?php } ?>

	<?php if ($this->session->flashdata('danger')) { ?>
		<!-- Display Message -->
		<div class="alert alert-danger" role="alert">
			<?php echo $this->session->flashdata('danger'); ?>
		</div>

	<?php } ?>

	<div class="card">
		<div class="card-header">
			<?php echo lang('admin_user_list'); ?>
		</div>
		<div class="card-body">
			<p class="card-text"><?php echo lang('admin_user_line1'); ?></p>
			<p class="card-text"><?php echo lang('admin_user_line2'); ?></p>
			<p class="card-text"><?php echo lang('admin_user_line3'); ?></p>
			<p class="card-text"><?php echo lang('admin_user_line4'); ?></p>
			<p><a class="btn btn-primary" href="<?php echo site_url('user/add'); ?>"><i class="fas fa-user-plus"></i> <?php echo lang('admin_create_user'); ?></a></p>

			<div class="table-responsive">
				<table class="table table-striped">
					<thead>
						<tr>
							<th scope="col"><?php echo lang('admin_user'); ?></th>
							<th scope="col"><?php echo lang('gen_hamradio_callsign'); ?></th>
							<th scope="col"><?php echo lang('admin_email'); ?></th>
							<th scope="col"><?php echo lang('admin_type'); ?></th>
							<th scope="col"><?php echo lang('admin_last_login'); ?></th>
							<th style="text-align: center; vertical-align: middle;" scope="col"><?php echo lang('admin_edit'); ?></th>
							<th style="text-align: center; vertical-align: middle;" scope="col"><?php echo lang('admin_password_reset'); ?></th>
							<th style="text-align: center; vertical-align: middle;" scope="col"><?php echo lang('admin_delete'); ?></th>
						</tr>
					</thead>
					<tbody>

						<?php

						$i = 0;
						foreach ($results->result() as $row) { ?>
							<?php echo '<tr class="tr' . ($i & 1) . '">'; ?>
							<td><a href="<?php echo site_url('user/edit') . "/" . $row->user_id; ?>"><?php echo $row->user_name; ?></a></td>
							<td><?php echo $row->user_callsign; ?></td>
							<td><?php echo $row->user_email; ?></td>
							<td><?php $l = $this->config->item('auth_level');
								echo $l[$row->user_type]; ?></td>
							<td><?php 
								if ($row->last_login_date != null) { // if the user never logged in before the value is null. We can show "never" then.
									echo $row->last_login_date;
								} else {
									echo lang('general_word_never');
								}?>
							</td>
							<td style="text-align: center; vertical-align: middle;"><a href="<?php echo site_url('user/edit') . "/" . $row->user_id; ?>" class="btn btn-outline-primary btn-sm"><i class="fas fa-user-edit"></i></a>
							<td style="text-align: center; vertical-align: middle;">
								<?php
								if ($_SESSION['user_id'] != $row->user_id) {
									echo '<a class="btn btn-primary btn-sm ms-1 admin_pwd_reset" data-username="' . $row->user_name . '" data-callsign="' . $row->user_callsign . '" data-userid="' . $row->user_id . '"><i class="fas fa-key"></i></a>';
								}
								?></td>
							<td style="text-align: center; vertical-align: middle;">
								<?php
								if ($_SESSION['user_id'] != $row->user_id) {
									echo "<a href=" . site_url('user/delete') . "/" . $row->user_id . " class=\"btn btn-danger btn-sm\"><i class=\"fas fa-user-minus\"></i></a>";
								}
								?></td>
							</td>
							</tr>
						<?php $i++;
						} ?>
					</tbody>
				</table>
			</div>

		</div>
	</div>
</div>