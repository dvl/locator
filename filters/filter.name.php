<?php

class FileNameFilter extends \FilterIterator
{
	private $pattern;

	public function __construct(\Iterator $iterator, $pattern)
	{
		parent::__construct($iterator);

		$this->pattern = $pattern;
	}

	public function accept()
	{
		$fileinfo = $this->getInnerIterator()->current();

		if (preg_match($this->pattern, $fileinfo)) {
			return true;
		}

		return false;
	}
}