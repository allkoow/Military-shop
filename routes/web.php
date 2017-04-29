<?php

foreach (File::allFiles(app_path().'/routes') as $partial) {
	require $partial->getPathName();
}




