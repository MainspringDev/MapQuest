<?php

namespace MainspringDev\MapQuest\Contract;

use MainspringDev\MapQuest\LocationCollection;

interface HandlerInterface {
	/**
	 * @param LocationCollection $locations
	 * @param OptionInterface    $options
	 * @return string
	 */
	public function encode(LocationCollection $locations, OptionInterface $options): string;

	/**
	 * @param LocationCollection $locations
	 * @param mixed              $response
	 * @return mixed
	 */
	public function parse(LocationCollection $locations, $response);
}
