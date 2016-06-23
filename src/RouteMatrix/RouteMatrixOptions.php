<?php

namespace MainspringDev\MapQuest\RouteMatrix;

use MainspringDev\MapQuest\Contract\OptionInterface;

class RouteMatrixOptions implements OptionInterface {
	/**
	 * @var bool
	 */
	protected $many_to_one;
	/**
	 * @var bool
	 */
	protected $all_to_all;

	/**
	 * @param bool $many_to_one
	 * @param bool $all_to_all
	 */
	public function __construct(bool $many_to_one = true, bool $all_to_all = false) {
		$this->many_to_one = $many_to_one;
		$this->all_to_all = $all_to_all;
	}

	/**
	 * @return array
	 */
	public function getOptions(): array {
		return [
			'all_to_all'  => $this->all_to_all,
			'many_to_one' => $this->many_to_one
		];
	}

	/**
	 * @return bool
	 */
	public function isManyToOne(): bool {
		return $this->many_to_one;
	}

	/**
	 * @return bool
	 */
	public function isAllToAll(): bool {
		return $this->all_to_all;
	}
}
