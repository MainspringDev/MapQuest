<?php

namespace MainspringDev\MapQuest;

class Location {
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

	public function __construct(
		string $street,
		string $admin_area_5,
		string $admin_area_5_type,
		string $admin_area_4,
		string $admin_area_4_type,
		string $admin_area_3,
		string $admin_area_3_type,
		string $admin_area_1,
		string $admin_area_1_type,
		string $postal_code,
		string $type,
		bool $drag_point,
		float $latitude = null,
		float $longitude = null
	) {
		if ($type !== 's' && $type !== 'v') {
			throw new \InvalidArgumentException("Type must be 's' (stop) or 'v' (via). Value '{$type}' received.");
		}

		if ($latitude !== null && ($latitude > 90 || $latitude < 90)) {
			throw new \InvalidArgumentException("Latitude must be between 90 and -90. Value '{$latitude}' received.");
		}
		
		if ($longitude !== null && ($longitude > 180 || $longitude < 180)) {
			throw new \InvalidArgumentException("Longitude must be between 180 and -180. Value '{$longitude}' received.");
		}
		
		if ($latitude !== null & $longitude === null) {
			throw new \InvalidArgumentException("Longitude required.");
		}

		if ($longitude !== null & $latitude === null) {
			throw new \InvalidArgumentException("Latitude required.");
		}

		$this->street = $street;
		$this->admin_area_5 = $admin_area_5;
		$this->admin_area_5_type = $admin_area_5_type;
		$this->admin_area_4 = $admin_area_4;
		$this->admin_area_4_type = $admin_area_4_type;
		$this->admin_area_3 = $admin_area_3;
		$this->admin_area_3_type = $admin_area_3_type;
		$this->admin_area_1 = $admin_area_1;
		$this->admin_area_1_type = $admin_area_1_type;
		$this->postal_code = $postal_code;
		$this->type = $type;
		$this->drag_point = $drag_point;
		$this->latitude = $latitude;
		$this->longitude = $longitude;
	}

	/**
	 * @return string
	 */
	public function getStreet(): string {
		return $this->street;
	}

	/**
	 * City
	 *
	 * @return string
	 */
	public function getAdminArea5(): string {
		return $this->admin_area_5;
	}

	/**
	 * @return string
	 */
	public function getAdminArea5Type(): string {
		return $this->admin_area_5_type;
	}

	/**
	 * @return string
	 */
	public function getCity(): string {
		return $this->admin_area_5;
	}

	/**
	 * County
	 *
	 * @return string
	 */
	public function getAdminArea4(): string {
		return $this->admin_area_4;
	}

	/**
	 * @return string
	 */
	public function getAdminArea4Type(): string {
		return $this->admin_area_4_type;
	}

	/**
	 * @return string
	 */
	public function getCounty(): string {
		return $this->admin_area_4;
	}

	/**
	 * State
	 *
	 * @return string
	 */
	public function getAdminArea3(): string {
		return $this->admin_area_3;
	}

	/**
	 * @return string
	 */
	public function getAdminArea3Type(): string {
		return $this->admin_area_3_type;
	}

	/**
	 * @return string
	 */
	public function getState(): string {
		return $this->admin_area_3;
	}

	/**
	 * Country
	 *
	 * @return string
	 */
	public function getAdminArea1(): string {
		return $this->admin_area_1;
	}

	/**
	 * @return string
	 */
	public function getAdminArea1Type(): string {
		return $this->admin_area_1_type;
	}

	/**
	 * @return string
	 */
	public function getCountry(): string {
		return $this->admin_area_1;
	}

	/**
	 * @return string
	 */
	public function getPostalCode(): string {
		return $this->postal_code;
	}

	/**
	 * @return string
	 */
	public function getType(): string {
		return $this->type;
	}

	/**
	 * @return bool
	 */
	public function isTypeStop(): bool {
		return ($this->type === 's');
	}

	/**
	 * @return bool
	 */
	public function isTypeVia(): bool {
		return ($this->type === 'v');
	}

	/**
	 * @return boolean
	 */
	public function isDragPoint(): bool {
		return $this->drag_point;
	}

	/**
	 * @return float|null
	 */
	public function getLatitude() {
		return $this->latitude;
	}

	/**
	 * @return float|null
	 */
	public function getLongitude() {
		return $this->longitude;
	}

	/**
	 * @return string
	 */
	public function getFingerprint() {
		return sha1(serialize($this));
	}
}
