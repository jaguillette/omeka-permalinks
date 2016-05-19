<?php $view = get_view(); ?>
<div id="permalinks-settings">
	<h2>Permalinks Settings</h2>
	<div class="field">
        <div class="two columns alpha">
            <?php echo $view->formLabel('permalinkUrn', __('Permalink URN')); ?>
        </div>
        <div class="inputs five columns omega">
            <?php echo $view->formText('permalinkUrn', get_option('permalink_urn')); ?>
        </div>
	</div>
</div>