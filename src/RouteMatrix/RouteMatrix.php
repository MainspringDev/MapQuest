<?php

namespace MainspringDev\MapQuest\RouteMatrix;

use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;
use MainspringDev\MapQuest\Contract\HandlerInterface;
use MainspringDev\MapQuest\Contract\RequestInterface;
use MainspringDev\MapQuest\Location;
use MainspringDev\MapQuest\LocationCollection;
use MainspringDev\MapQuest\RouteMatrix\Handler\JsonHandler;

class RouteMatrix implements RequestInterface {
	const REQUEST_URL = 'http://www.mapquestapi.com/directions/v2/routematrix';
	/**
	 * @var string
	 */
	protected $key;
	/**
	 * @var LocationCollection
	 */
	protected $locations;
	/**
	 * @var Client
	 */
	protected $client;
	/**
	 * @var HandlerInterface
	 */
	protected $handler;
	/**
	 * @var RouteMatrixOptions
	 */
	protected $options;

	/**
	 * @param string             $key
	 * @param LocationCollection $locations
	 * @param ClientInterface    $client
	 * @param HandlerInterface   $handler
	 * @param RouteMatrixOptions $options
	 */
	public function __construct(string $key, LocationCollection $locations, ClientInterface $client, HandlerInterface $handler, RouteMatrixOptions $options) {
		$this->key = $key;
		$this->locations = $locations;
		$this->client = $client;
		$this->handler = $handler;
		$this->options = $options;
	}

	/**
	 * Convenience method for generating RouteMatrix class using GuzzleHttp and JsonHandler
	 * 
	 * @param string $key
	 * @return RouteMatrix
	 */
	public static function make(string $key) {
		return new RouteMatrix(
			$key,
			new LocationCollection(),
			new Client(['base_uri' => self::REQUEST_URL]),
			new JsonHandler(),
			new RouteMatrixOptions()
		);
	}

	/**
	 * @param Location[] $locations
	 * @return void
	 */
	public function addLocation(Location ...$locations) {
		foreach ($locations as $location) {
			$this->locations->addLocation($location);
		}
	}

	/**
	 * @param LocationCollection $locations
	 * @return void
	 */
	public function addLocations(LocationCollection $locations) {
		while($locations->valid()) {
			$location = $locations->current();
			
			$this->locations->addLocation($location);
			
			$locations->next();
		}
	}
	
	public function request() {
		$body = $this->handler->encode($this->locations, $this->options);

		$response = $this->client->request('POST', '', [
			'query' => ['key' => $this->key],
			'body'  => $body
		]);

		$results = $response->getBody()->getContents();

		$tmp = $this->handler->parse($this->locations, $results);
	}
}
