<?php
$meta = $this->menu_m->select_meta()->row();
?>
<div class="kt-footer kt-grid__item kt-grid kt-grid--desktop kt-grid--ver-desktop" id="kt_footer">
	<div class="kt-container kt-container--fluid ">
		<div class="kt-footer__copyright">
			2020 &copy <?=$meta->meta_name;?>
		</div>
	</div>
</div>