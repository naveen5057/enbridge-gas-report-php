<?php

	require_once 'vendor/autoload.php';

	use Facebook\WebDriver\Remote\RemoteWebDriver;
	use Facebook\WebDriver\WebDriverBy;
	use Facebook\WebDriver\WebDriverExpectedCondition;
	use PHPUnit\Framework\TestCase;
	use Facebook\WebDriver\Chrome\ChromeOptions;
	use Facebook\WebDriver\Chrome\ChromeDriver;
	use Facebook\WebDriver\Remote\DesiredCapabilities;

	$host = 'http://localhost:4444/wd/hub';
	$capabilities = DesiredCapabilities::chrome();

	// Adding root dir to download file
	$prefs = array('download.default_directory' => 'C:\\Users\\nknav\\OneDrive\\Documents\\php\\');
	$options = new ChromeOptions();
	$options->addArguments('headless');
	$options->setExperimentalOption('prefs', $prefs);

	// Adding to the capabilities
	$capabilities->setCapability(ChromeOptions::CAPABILITY, $options);

	// Creatig the driver
	$driver = RemoteWebDriver::create($host, $capabilities);

	// Navigate to the web page
	$driver->get('https://www.enbridgegas.com/en/storage-transportation/operational-information/gas-day-summary');

	// Fill out the form
	$driver->executeScript('window.scrollTo(0,500);');

		// Click the submit button
	$driver->findElement(WebDriverBy::id('export'))->click();
	sleep(10);

	echo 'Downloaded successfully!' . PHP_EOL;

	$driver->quit();
?>