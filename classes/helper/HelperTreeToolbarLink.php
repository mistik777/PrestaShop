<?php
/*
* 2007-2013 PrestaShop
*
* NOTICE OF LICENSE
*
* This source file is subject to the Open Software License (OSL 3.0)
* that is bundled with this package in the file LICENSE.txt.
* It is also available through the world-wide-web at this URL:
* http://opensource.org/licenses/osl-3.0.php
* If you did not receive a copy of the license and are unable to
* obtain it through the world-wide-web, please send an email
* to license@prestashop.com so we can send you a copy immediately.
*
* DISCLAIMER
*
* Do not edit or add to this file if you wish to upgrade PrestaShop to newer
* versions in the future. If you wish to customize PrestaShop for your
* needs please refer to http://www.prestashop.com for more information.
*
*  @author PrestaShop SA <contact@prestashop.com>
*  @copyright  2007-2013 PrestaShop SA
*  @license    http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
*  International Registered Trademark & Property of PrestaShop SA
*/

class HelperTreeToolbarLinkCore extends HelperTreeToolbarButtonCore implements
	HelperITreeToolbarButtonCore
{
	private   $_icon_class;
	private   $_link;
	protected $_template = 'tree_toolbar_link.tpl';

	public function __construct($label, $action = null, $link, $iconClass)
	{
		parent::__construct($label, $action);
		$this->setLink($link);
		$this->setIconClass($iconClass);
	}

	public function setIconClass($value)
	{
		$this->_icon_class = $value;
		return $this;
	}

	public function getIconClass()
	{
		return $this->_icon_class;
	}

	public function setLink($value)
	{
		$this->_link = $value;
		return $this;
	}

	public function getLink()
	{
		if (!isset($this->_link))
			$this->_link = '';

		return $this->_link;
	}

	public function render()
	{
		$template = parent::render();
		$template->assign(array(
			'link'       => $this->getLink(),
			'action'     => $this->getAction(),
			'label'      => $this->getLabel(),
			'class'      => $this->getClass(),
			'icon_class' => $this->getIconClass()
		));
		return $template->fetch();
	}
}