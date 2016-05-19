<?php
class PermalinksPlugin extends Omeka_Plugin_AbstractPlugin
{
	protected $_hooks = array(
		'install',
		'public_head',
		'public_footer',
		'config',
		'config_form'
	);

	protected $_options = array(
		'permalinkUrn'=>""
	);

	public function hookInstall($args)
	{
		set_option('permalink_urn', '');
	}

	public function hookPublicHead($args)
	{
		if (isset($_GET['route'])) {
			$redirect_url = absolute_url($_GET['route']);
			echo '<meta http-equiv="refresh" content="0;URL='.$redirect_url.'">';
		}
	}

	public function hookPublicFooter($args)
	{
		$basePath = Zend_Controller_Front::getInstance()->getRequest()->getPathInfo();
		$baseUrl = Zend_Controller_Front::getInstance()->getRequest()->getBaseUrl();
		if ($permalinkUrn = get_option("permalink_urn")):
			$queryParams = $_GET;
			unset($queryParams['route']);
			$queryParams['route'] = $basePath; ?>
			<a href="<?php echo $permalinkUrn."?".http_build_query($queryParams); ?>">Permalink</a>
		<?php endif;
	}

	public function hookConfig($args)
	{
		set_option('permalink_urn', $_POST['permalinkUrn']);
	}

	public function hookConfigForm($args)
	{
		include('config-form.php');
	}
}