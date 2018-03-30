<?php
/**
 * This file is part of the TYPO3 CMS project.
 *
 * It is free software; you can redistribute it and/or modify it under
 * the terms of the GNU General Public License, either version 2
 * of the License, or any later version.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 * The TYPO3 project - inspiring people to share!
 */
$confDir = __DIR__ . '/../../';
require_once __DIR__ . '/../../vendor/autoload.php';
$configReaderFactory = new \Helhum\ConfigLoader\ConfigurationReaderFactory($confDir);
$configLoader = new \Helhum\ConfigLoader\ConfigurationLoader(
    [
        $configReaderFactory->createRootReader($confDir . 'env.yml'),
    ]
);
$config = $configLoader->load();
$GLOBALS['TYPO3_CONF_VARS'] = array_replace_recursive(
    $GLOBALS['TYPO3_CONF_VARS'],
    $config
);