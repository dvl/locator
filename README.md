PHP Files Locator
=================

A simple PHP file locator based on Symfony Finder component.


Why
---

* I've needed to import over 300k XMLs files into a database, and get all files to filter it later was using too much memory.
* Symfony's Finder is too powerfull for what I needed.


Usage
-----

	$locator = new Locator();
	$files = $locator->in('folder')
			->name('/\.xml$/')
			->date('since yesterday')
			->get();

	foreach ($files as $file) 
	{
		echo $file->getPathName() . DIRECTORY_SEPARATOR . $file->getFileName() . '<br />';
	}