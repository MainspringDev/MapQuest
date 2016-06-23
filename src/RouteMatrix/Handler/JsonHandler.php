<?php

namespace MainspringDev\MapQuest\RouteMatrix\Handler;

use MainspringDev\MapQuest\Contract\HandlerInterface;
use MainspringDev\MapQuest\Contract\OptionInterface;
use MainspringDev\MapQuest\Location;
use MainspringDev\MapQuest\LocationCollection;
use MainspringDev\MapQuest\LocationResponse;

class JsonHandler implements HandlerInterface {
	/**
	 * @param LocationCollection $locations
	 * @param OptionInterface $options
	 * @return string
	 */
	public function encode(LocationCollection $locations, OptionInterface $options): string {
		$json['locations'] = [];

		while ($locations->valid()) {
			$location = $locations->current();

			$json['locations'][] = $this->makeLocationData($location);
			
			$locations->next();
		}

		$json['options'] = [
			'allToAll'  => ($options->getOptions()['allToAll'] ?? false),
			'manyToOne' => ($options->getOptions()['manyToOne'] ?? true)
		];
		
		return json_encode($json);
	}

	/**
	 * @param Location $location
	 * @return array
	 */
	private function makeLocationData(Location $location) {
		$data = [];

		$data['street'] = $location->getStreet();
		$data['adminArea5'] = $location->getAdminArea5(); // City
		$data['adminArea4'] = $location->getAdminArea4(); // County
		$data['adminArea3'] = $location->getAdminArea3(); // State
		$data['postalCode'] = $location->getPostalCode();
		$data['adminArea1'] = $location->getAdminArea1(); // Country

		if ($location->getLatitude() !== null && $location->getLongitude() !== null) {
			$data['latLng'] = [
				'lng' => $location->getLongitude(),
				'lat' => $location->getLatitude()
			];
		}
		
		return $data;
	}

	public function parse(LocationCollection $locations, $response) {
		$data = json_decode($response, true);

		foreach ($data['locations'] as $location) {
			$location_response = new LocationResponse(
				$location['street'],
				$location['adminArea5'],
				$location['adminArea5Type'],
				$location['adminArea4'],
				$location['adminArea4Type'],
				$location['adminArea3'],
				$location['adminArea3Type'],
				$location['adminArea1'],
				$location['adminArea1Type'],
				$location['postalCode'],
				$location['type'],
				$location['dragPoint'],
				$location['latLng']['lat'],
				$location['latLng']['lng'],
				$location['displayLatLng']['lat'],
				$location['displayLatLng']['lng'],
				$location['geocodeQuality'],
				$location['geocodeQualityCode'],
				$location['linkId'],
				$location['sideOfStreet']
			);
		}
	}
}
