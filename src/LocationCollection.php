<?php

namespace MainspringDev\MapQuest;

class LocationCollection implements \Iterator {
	/**
	 * @var Location[]
	 */
	protected $locations = [];

	/**
	 * @param Location $location
	 * @return void
	 */
	public function addLocation(Location $location) {
		$this->locations[$location->getFingerprint()] = $location;
	}

	/**
	 * @return Location[]
	 */
	public function getLocations(): array {
		return $this->locations;
	}

	/**
	 * @return int
	 */
	public function count(): int {
		return count($this->locations);
	}

	/**
	 * @return Location
	 */
	public function current(): Location {
		return current($this->locations);
	}

	/**
	 * @return string|null
	 */
	public function key() {
		return key($this->locations);
	}

	/**
	 * @return void
	 */
	public function next() {
		next($this->locations);
	}

	/**
	 * @return void
	 */
	public function rewind() {
		reset($this->locations);
	}

	/**
	 * @return bool
	 */
	public function valid(): bool {
		return (key($this->locations) !== null);
	}
}
