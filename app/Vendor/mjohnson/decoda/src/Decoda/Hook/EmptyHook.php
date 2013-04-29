<?php
/**
 * @copyright	Copyright 2006-2013, Miles Johnson - http://milesj.me
 * @license		http://opensource.org/licenses/mit-license.php - Licensed under the MIT License
 * @link		http://milesj.me/code/php/decoda
 */

namespace Decoda\Hook;

use Decoda\Hook\AbstractHook;

/**
 * An empty hook used for no operation events.
 */
class EmptyHook extends AbstractHook {

	/**
	 * Fix weird problems.
	 *
	 * @param string $string
	 * @return mixed
	 */
	public function beforeParse($string) {

		// Fix URLs that end in trailing slash
		// This causes URLs to be triggered as self closing tags instead of opening tags
		if ($this->getParser()->hasFilter('Url')) {
			$string = preg_replace_callback('/\[url=(.*?)\]/i', function($matches) {
				return sprintf('[url="%s"]', trim($matches[1], '"'));
			}, $string);
		}

		return $string;
	}

}