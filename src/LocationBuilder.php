<?php

namespace MainspringDev\MapQuest;

class LocationBuilder {
	protected $street;
	protected $admin_area_5;
	protected $admin_area_5_type;
	protected $admin_area_4;
	protected $admin_area_4_type;
	protected $admin_area_3;
	protected $admin_area_3_type;
	protected $admin_area_1;
	protected $admin_area_1_type;
	protected $postal_code;
	protected $type;
	protected $drag_point;
	protected $latitude;
	protected $longitude;

	/**
	 * @return LocationBuilder
	 */
	public function __construct() {
		$this->reset();
	}

	/**
	 * @param string $street
	 * @return LocationBuilder
	 */
	public function withStreet($street): self {
		$this->street = $street;

		return $this;
	}

	/**
	 * @param string $city
	 * @return LocationBuilder
	 */
	public function withCity($city): self {
		$this->admin_area_5 = $city;

		return $this;
	}

	/**
	 * @param string $county
	 * @return LocationBuilder
	 */
	public function withCounty($county): self {
		$this->admin_area_4 = $county;

		return $this;
	}

	/**
	 * @param string $state
	 * @return LocationBuilder
	 */
	public function withState($state): self {
		$this->admin_area_3 = $state;

		return $this;
	}

	/**
	 * @param string $postal_code
	 * @return LocationBuilder
	 */
	public function withPostalCode($postal_code): self {
		$this->postal_code = $postal_code;

		return $this;
	}

	/**
	 * @param string $country
	 * @return LocationBuilder
	 */
	public function withCountry($country): self {
		$this->admin_area_1 = $country;

		return $this;
	}

	/**
	 * @return LocationBuilder
	 */
	public function withTypeStop(): self {
		$this->type = 's';

		return $this;
	}

	/**
	 * @return LocationBuilder
	 */
	public function withTypeVia(): self {
		$this->type = 'v';

		return $this;
	}

	/**
	 * Set DragPoint parameter to true
	 * 
	 * @return LocationBuilder
	 */
	public function withDragPoint(): self {
		$this->drag_point = true;

		return $this;
	}

	/**
	 * Set DragPoint parameter to false
	 * 
	 * @return LocationBuilder
	 */
	public function withoutDragPoint(): self {
		$this->drag_point = false;

		return $this;
	}

	/**
	 * @param float $latitude
	 * @return LocationBuilder
	 */
	public function withLatitude($latitude): self {
		$this->latitude = $latitude;
		
		return $this;
	}

	/**
	 * @param float $longitude
	 * @return LocationBuilder
	 */
	public function withLongitude($longitude): self {
		$this->longitude = $longitude;

		return $this;
	}

	/**
	 * @param bool $reset
	 * @return Location
	 */
	public function build($reset = true): Location {
		$location = new Location(
			$this->street,
			$this->admin_area_5,
			$this->admin_area_1_type,
			$this->admin_area_4,
			$this->admin_area_4_type,
			$this->admin_area_3,
			$this->admin_area_3_type,
			$this->admin_area_1,
			$this->admin_area_1_type,
			$this->postal_code,
			$this->type,
			$this->drag_point,
			$this->latitude,
			$this->longitude
		);
		
		if ($reset) {
			$this->reset();
		}
		
		return $location;
	}

	/**
	 * @return void
	 */
	public function reset() {
		$this->street = '';
		$this->admin_area_5 = '';
		$this->admin_area_5_type = 'City';
		$this->admin_area_4 = '';
		$this->admin_area_4_type = 'County';
		$this->admin_area_3 = '';
		$this->admin_area_3_type = 'State';
		$this->admin_area_1 = 'US';
		$this->admin_area_1_type = 'Country';
		$this->postal_code = '';
		$this->type = 's';
		$this->drag_point = false;
		$this->latitude = null;
		$this->longitude = null;
	}
}
