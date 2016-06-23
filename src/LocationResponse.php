<?php

namespace MainspringDev\MapQuest;

class LocationResponse {
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
	protected $display_latitude;
	protected $display_longitude;
	protected $geocode_quality;
	protected $geocode_quality_code;
	protected $link_id;
	protected $side_of_street;

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
		float $latitude,
		float $longitude,
		float $display_latitude,
		float $display_longitude,
		string $geocode_quality,
		string $geocode_quality_code,
		string $link_id,
		string $side_of_street
	) {
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
		$this->display_latitude = $display_latitude;
		$this->display_longitude = $display_longitude;
		$this->geocode_quality = $geocode_quality;
		$this->geocode_quality_code = $geocode_quality_code;
		$this->link_id = $link_id;
		$this->side_of_street = $side_of_street;
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
	 * @return float
	 */
	public function getLatitude(): float {
		return $this->latitude;
	}

	/**
	 * @return float
	 */
	public function getLongitude(): float {
		return $this->longitude;
	}

	/**
	 * @return float
	 */
	public function getDisplayLatitude(): float {
		return $this->display_latitude;
	}

	/**
	 * @return float
	 */
	public function getDisplayLongitude(): float {
		return $this->display_longitude;
	}

	/**
	 * @return string
	 */
	public function getGeocodeQuality(): string {
		return $this->geocode_quality;
	}

	/**
	 * @return string
	 */
	public function getGeocodeQualityCode(): string {
		return $this->geocode_quality_code;
	}

	/**
	 * @return string
	 */
	public function getLinkId(): string {
		return $this->link_id;
	}

	/**
	 * @return string
	 */
	public function getSideOfStreet(): string {
		return $this->side_of_street;
	}
}
