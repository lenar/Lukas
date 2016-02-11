<?php

$loader = require_once( __DIR__ . '/../vendor/autoload.php' );

use OE\Lukas\Parser\QueryParser;
use OE\Lukas\Visitor\QueryItemPrinter;

$scanner = new \OE\Lukas\Parser\QueryScanner();
$scanner->addToken('TRIP', '#^(trip:[0-9]+)(.*)#');
$scanner->addToken('EXPERIENCE', '#^(experience:[0-9]+)(.*)#');
$scanner->addToken('EXTENSION', '#^(extension:[a-zA-Z0-9\.]+)(.*)#');

$parser = new QueryParser($scanner);
$parser->readString( 'Lukas AND (me OR him) AND -term AND trip:123' );
$query = $parser->parse();

$v = new QueryItemPrinter();
$query->accept($v);