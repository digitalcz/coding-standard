<?php

declare(strict_types=1);

require_once __DIR__ . '/../vendor/autoload.php';

// Register PHP_CodeSniffer autoloader if it exists
$phpcsAutoloader = __DIR__ . '/../vendor/squizlabs/php_codesniffer/autoload.php';
if (file_exists($phpcsAutoloader)) {
    require_once $phpcsAutoloader;
}

// Define required PHP_CodeSniffer constants if not already defined
if (!defined('PHP_CodeSniffer\PHP_CODESNIFFER_VERBOSITY')) {
    define('PHP_CodeSniffer\PHP_CODESNIFFER_VERBOSITY', 0);
}

if (!defined('PHP_CodeSniffer\PHP_CODESNIFFER_CBF')) {
    define('PHP_CodeSniffer\PHP_CODESNIFFER_CBF', false);
}

// Initialize PHP_CodeSniffer tokens
use PHP_CodeSniffer\Util\Tokens;
if (class_exists('PHP_CodeSniffer\Util\Tokens')) {
    new Tokens();
}