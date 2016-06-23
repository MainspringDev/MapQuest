<?php

namespace MainspringDev\MapQuest\Geocoding\Handler;

use MainspringDev\MapQuest\Contract\HandlerInterface;
use MainspringDev\MapQuest\Contract\OptionInterface;
use MainspringDev\MapQuest\LocationCollection;

class XmlHandler implements HandlerInterface {
	public function encode(LocationCollection $locations, OptionInterface $options): string {
		// TODO: Implement encode() method.
	}

	public function parse(LocationCollection $locations, $response) {
		// TODO: Implement parse() method.
	}
}
