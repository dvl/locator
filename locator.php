<?php

class Locator 
{
	private $names = array();
	private $dates = array();
	private $folder;
	private $date = 0;

	public function name($pattern) 
	{
		$this->names[] = $pattern;

		return $this;
	}

	public function in($folder)
	{
		if (!is_dir($folder)) {
			throw new Exception('Invalid Folder');
		}

		$this->folder = $folder;

		return $this;
	}

	public function date($date)
	{
		$this->dates = $date;

		return $this;
	}

	public function get() 
	{
		$iterator = new \RecursiveDirectoryIterator($this->folder, \FilesystemIterator::SKIP_DOTS);
		$iterator = new \RecursiveIteratorIterator($iterator, \RecursiveIteratorIterator::SELF_FIRST);

		if (count($this->names) !== 0) {
			foreach ($this->names as $name) {
				$iterator = new FileNameFilter($iterator, $name);
			}
		}

		return $iterator;
	}

}