<?php
App::uses('File', 'Utility');

/**
 * 2010-05-16 ms
 */
class FileLib extends File {

	/**
	 * Convenience class for reading, writing and appending to files.
	 * 2009-06-15 ms
	 */
	protected $allowedDelimiters = array(
		',',
		';',
		'|',
		' ',
		'#');

	protected $allowedEnclosures = array('"', '\'');

	protected $allowedTags = array(
		'<h1>',
		'<h2>',
		'<h3>',
		'<p>',
		'<b>',
		'<a>',
		'<img>');

	protected $defaultFormat = '%s'; // %s\t%s\t%s => 	some	nice	text

	public function __destruct() {
		$this->close();
	}

	/**
	 * A better csv reader which handles encoding as well as removes completely empty lines
	 *
	 * 2009-06-15 ms
	 */
	public function readCsv($length = 0, $delimiter = null, $enclosure = null, $mode = 'rb', $force = false, $removeEmpty = false) {
		$res = array();
		if ($this->open($mode, $force) === false) {
			return false;
		}

		if ($this->lock !== null && flock($this->handle, LOCK_SH) === false) {
			return false;
		}

		# php cannot handle delimiters with more than a single char
		if (mb_strlen($delimiter) > 1) {
			$count = 0;
			while (!feof($this->handle)) {
				if ($count > 100) {
					throw new RuntimeException('max recursion depth');
				}
				$count++;
				$tmp = fgets($this->handle, 8000);
				$tmp = explode($delimiter, $tmp);
				if (true || WINDOWS) {
					$tmp = $this->_encode($tmp);
				}
				$isEmpty = true;
				foreach ($tmp as $key => $val) {
					if (!empty($val)) {
						$isEmpty = false;
						break;
					}
				}
				if ($isEmpty) {
					continue;
				}
				$res[] = $tmp;
			}

		} else {
			while (true) {
				$data = fgetcsv($this->handle, $length, (!empty($delimiter) ? $delimiter : ','), (!empty($enclosure) ? $enclosure : '"'));
				if ($data === false) {
					break;
				}
				if (true || WINDOWS) {
					$data = $this->_encode($data);
				}
				$isEmpty = true;
				foreach ($data as $key => $val) {
					if (!empty($val)) {
						$isEmpty = false;
						break;
					}
				}
				if ($isEmpty && $removeEmpty) {
					continue;
				}
				$res[] = $data;
			}
		}

		if ($this->lock !== null) {
			flock($this->handle, LOCK_UN);
		}
		$this->close();
		return $res;
	}

	/**
	 * Write an array to a csv file
	 *
	 * @param array $data
	 * @return bool $success
	 * 2012-07-06 ms
	 */
	public function writeCsv($data, $delimiter = null, $enclosure = null) {
		if ($this->open('w', true) !== true) {
			return false;
		}
		if ($this->lock !== null) {
			if (flock($this->handle, LOCK_EX) === false) {
				return false;
			}
		}
		$success = true;
		foreach ($data as $row) {
			if (fputcsv($this->handle, array_values($row), (isset($delimiter) ? $delimiter : ','), (isset($enclosure) ? $enclosure : '"')) === false) {
				$success = false;
			}
		}
		if ($this->lock !== null) {
			flock($this->handle, LOCK_UN);
		}
		$this->close();
		return $success;
	}

	/**
	 * 2009-06-15 ms
	 */
	public function readWithPattern($format = null, $mode = 'rb', $force = false) {
		$res = array();
		if ($this->open($mode, $force) === false) {
			return false;
		}

		if ($this->lock !== null && flock($this->handle, LOCK_SH) === false) {
			return false;
		}

		if (empty($format)) {
			$format = $this->defaultFormat;
		}

		while (true) {
			$data = fscanf($this->handle, $format);
			if ($data === false) {
				break;
			}
			$res[] = $data;
		}

		if ($this->lock !== null) {
			flock($this->handle, LOCK_UN);
		}

		return $res;
	}

	/**
	 * Return the contents of this File as a string - but without tags
	 *
	 * @param string/array $tags: <tag><tag2><tag3> or array('<tag>',...) otherwise default tags are used
	 * @param string $mode
	 * @param boolean $force If true then the file will be re-opened even if its already opened, otherwise it won't
	 * @return mixed string on success, false on failure
	 * @access public
	 * 2009-06-15 ms
	 */
	public function readWithTags($tags = null, $mode = 'rb', $force = false) {
		if ($this->open($mode, $force) === false) {
			return false;
		}
		if ($this->lock !== null && flock($this->handle, LOCK_SH) === false) {
			return false;
		}

		if (empty($tags)) {
			$tags = implode($this->allowedTags);
		} else {
			if (is_array($tags)) {
				$tags = implode($tags);
			}
		}

		$data = '';
		while (!feof($this->handle)) {
			$data .= fgetss($this->handle, 4096, $tags);
		}
		$data = trim($data);

		if ($this->lock !== null) {
			flock($this->handle, LOCK_UN);
		}

		return $data;
	}

	/**
	 * transfer array to cake structure
	 * @param data (usually with the first row as keys!)
	 * @param options
	 * - keys (defaults to first array content in data otherwise) (order is important!)
	 * - preserve_keys (do not slug and lowercase)
	 * @return array $result or FALSE on failure
	 * 2010-10-15 ms
	 */
	public function transfer($data, $options = array()) {
		$res = array();

		if (empty($options['keys'])) {
			$keys = array_shift($data);
		} else {
			$keys = $options['keys'];
		}

		foreach ($keys as $num => $key) {
			if (empty($options['preserve_keys'])) {
				$key = strtolower(Inflector::slug($key));
			}
			foreach ($data as $n => $val) {
				$res[$n][$key] = $val[$num];
			}
		}
		return $res;
	}

	/**
	 * Assert proper encoding
	 *
	 * @param array
	 * @return array
	 */
	protected function _encode(array $array) {
		$convertedArray = array();
		foreach ($array as $key => $value) {
			if (!mb_check_encoding($key, 'UTF-8')) {
				$key = utf8_encode($key);
			}
			if (is_array($value)) {
				$value = $this->_encode($value);
			}
			if (!mb_check_encoding($value, 'UTF-8')) {
				$value = utf8_encode($value);
			}
			$convertedArray[$key] = trim($value);
		}
		return $convertedArray;
	}

}
