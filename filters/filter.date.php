<?php

class DateFilter extends \FilterIterator
{
	private $date;

	public function __construct(\Iterator $iterator, $date)
	{
		parent::__construct($iterator);

		$this->date = $date;
	}

	public function accept()
	{
		$fileinfo = $this->current();

		$filemtime = $fileinfo->getMTime();

		$list = explode(' ', $this->date);

		$operator = $list[0]; 

		if (!in_array($operator, array('>', '<', '>=', '<=', '==', '!='))) {
            throw new \InvalidArgumentException(sprintf('Invalid operator "%s".', $operator));
        }

		unset($list[0]);

		$period = implode(' ', $list);

		$date = new \DateTime($period);
		$comparemtime = $date->format('U');

		switch ($operator) {
			case '>':
				return $filemtime > $comparemtime;
			case '>=':
				return $filemtime >= $comparemtime;
			case '<':
				return $filemtime < $comparemtime;
			case '<=':
				return $filemtime <= $comparemtime;
			case '!=':
				return $filemtime != $comparemtime;
		}

		return $filemtime == $comparemtime;
	}
}