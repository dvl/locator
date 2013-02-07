PHP Files Locator
=================

A simple PHP file locator based on Symfony Finder component.


Why
---

* I've needed to import over 300k XMLs files into a database, and get all files to filter it later was using too much memory.
* Symfony's Finder is too powerfull for what I needed, and it probably will be used only once.


Usage
-----

	<?php

	require_once 'locator.php';

	$locator = new Locator();

	$files = $locator->name('/\.txt$/')
					 ->date('>= yesterday')
					 ->in('resultados')
					 ->get();

	foreach ($files as $file) {
		echo $file->getPathName() . DIRECTORY_SEPARATOR . $file->getFileName() . '<br />';
	}
