<?php
/**
 * DeliveriesApi
 * PHP version 5
 *
 * @category Class
 * @package  iPosExchanger
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 */

/**
 * iPos integration for FileMaker 17 API
 *
 * OpenAPI description for the iPOS integration for FileMaker 17 API
 *
 * OpenAPI spec version: 1.0.0
 * Contact: thomas@spysystem.dk
 * Generated by: https://openapi-generator.tech
 * OpenAPI Generator version: 3.3.0-SNAPSHOT
 */

/**
 * NOTE: This class is auto generated by OpenAPI Generator (https://openapi-generator.tech).
 * https://openapi-generator.tech
 * Do not edit the class manually.
 */

namespace iPosExchanger\Api;

use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;
#region SPY Code
use GuzzleHttp\Cookie\CookieJar;
#endregion
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Psr7\MultipartStream;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\RequestOptions;
use iPosExchanger\ApiException;
use iPosExchanger\Configuration;
use iPosExchanger\HeaderSelector;
use iPosExchanger\ObjectSerializer;

/**
 * DeliveriesApi Class Doc Comment
 *
 * @category Class
 * @package  iPosExchanger
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 */
class DeliveriesApi
{
    /**
     * @var ClientInterface
     */
    protected $client;

    /**
     * @var Configuration
     */
    protected $config;

    /**
     * @var HeaderSelector
     */
    protected $headerSelector;

	#region SPY Code
	protected $bXDebugOnInstance	= false;
	protected $bXDebugOnNextRequest;

	/**
	 * @param bool $bXDebugOnInstance
	 * @return $this
	 */
	public function setXDebugOnInstance(bool $bXDebugOnInstance)
	{
		$this->bXDebugOnInstance	= $bXDebugOnInstance;

		return $this;
	}

	/**
	 * @return $this
	 */
	public function setXDebugOnNextRequest()
	{
		$this->bXDebugOnNextRequest	= true;

		return $this;
	}
	#endregion

    /**
     * @param ClientInterface $client
     * @param Configuration   $config
     * @param HeaderSelector  $selector
     */
    public function __construct(
        ClientInterface $client = null,
        Configuration $config = null,
        HeaderSelector $selector = null
    ) {
        $this->client = $client ?: new Client();
        $this->config = $config ?: new Configuration();
        $this->headerSelector = $selector ?: new HeaderSelector();
    }

    /**
     * @return Configuration
     */
    public function getConfig()
    {
        return $this->config;
    }

    /**
     * Operation createDelivery
     *
     * Creates a new Delivery
     *
     * @param  string $str_database Target Database in FileMaker (required)
     * @param  \iPosExchanger\Model\CreateOrUpdateDeliveryRequest $create_or_update_delivery_request Record to be created (optional)
     *
     * @throws \iPosExchanger\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \iPosExchanger\Model\CreateRecordResponse|\iPosExchanger\Model\DefaultResponseObject|\iPosExchanger\Model\DefaultResponseObject
     */
    public function createDelivery($str_database, $create_or_update_delivery_request = null)
    {
        list($response) = $this->createDeliveryWithHttpInfo($str_database, $create_or_update_delivery_request);
        return $response;
    }

    /**
     * Operation createDeliveryWithHttpInfo
     *
     * Creates a new Delivery
     *
     * @param  string $str_database Target Database in FileMaker (required)
     * @param  \iPosExchanger\Model\CreateOrUpdateDeliveryRequest $create_or_update_delivery_request Record to be created (optional)
     *
     * @throws \iPosExchanger\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \iPosExchanger\Model\CreateRecordResponse|\iPosExchanger\Model\DefaultResponseObject|\iPosExchanger\Model\DefaultResponseObject, HTTP status code, HTTP response headers (array of strings)
     */
    public function createDeliveryWithHttpInfo($str_database, $create_or_update_delivery_request = null)
    {
        $request = $this->createDeliveryRequest($str_database, $create_or_update_delivery_request);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? $e->getResponse()->getBody()->getContents() : null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    $response->getBody()
                );
            }

            $responseBody = $response->getBody();
            switch($statusCode) {
                case 200:
                    if ('\iPosExchanger\Model\CreateRecordResponse' === '\SplFileObject') {
                        $content = $responseBody; //stream goes to serializer
                    } else {
                        $content = $responseBody->getContents();
                        if ('\iPosExchanger\Model\CreateRecordResponse' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\iPosExchanger\Model\CreateRecordResponse', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 401:
                    if ('\iPosExchanger\Model\DefaultResponseObject' === '\SplFileObject') {
                        $content = $responseBody; //stream goes to serializer
                    } else {
                        $content = $responseBody->getContents();
                        if ('\iPosExchanger\Model\DefaultResponseObject' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\iPosExchanger\Model\DefaultResponseObject', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 404:
                    if ('\iPosExchanger\Model\DefaultResponseObject' === '\SplFileObject') {
                        $content = $responseBody; //stream goes to serializer
                    } else {
                        $content = $responseBody->getContents();
                        if ('\iPosExchanger\Model\DefaultResponseObject' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\iPosExchanger\Model\DefaultResponseObject', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
            }

            $returnType = '\iPosExchanger\Model\CreateRecordResponse';
            $responseBody = $response->getBody();
            if ($returnType === '\SplFileObject') {
                $content = $responseBody; //stream goes to serializer
            } else {
                $content = $responseBody->getContents();
                if ('\iPosExchanger\Model\CreateRecordResponse' !== 'string') {
                    $content = json_decode($content);
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\iPosExchanger\Model\CreateRecordResponse',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 401:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\iPosExchanger\Model\DefaultResponseObject',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 404:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\iPosExchanger\Model\DefaultResponseObject',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation createDeliveryAsync
     *
     * Creates a new Delivery
     *
     * @param  string $str_database Target Database in FileMaker (required)
     * @param  \iPosExchanger\Model\CreateOrUpdateDeliveryRequest $create_or_update_delivery_request Record to be created (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function createDeliveryAsync($str_database, $create_or_update_delivery_request = null)
    {
        return $this->createDeliveryAsyncWithHttpInfo($str_database, $create_or_update_delivery_request)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation createDeliveryAsyncWithHttpInfo
     *
     * Creates a new Delivery
     *
     * @param  string $str_database Target Database in FileMaker (required)
     * @param  \iPosExchanger\Model\CreateOrUpdateDeliveryRequest $create_or_update_delivery_request Record to be created (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function createDeliveryAsyncWithHttpInfo($str_database, $create_or_update_delivery_request = null)
    {
        $returnType = '\iPosExchanger\Model\CreateRecordResponse';
        $request = $this->createDeliveryRequest($str_database, $create_or_update_delivery_request);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    $responseBody = $response->getBody();
                    if ($returnType === '\SplFileObject') {
                        $content = $responseBody; //stream goes to serializer
                    } else {
                        $content = $responseBody->getContents();
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'createDelivery'
     *
     * @param  string $str_database Target Database in FileMaker (required)
     * @param  \iPosExchanger\Model\CreateOrUpdateDeliveryRequest $create_or_update_delivery_request Record to be created (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function createDeliveryRequest($str_database, $create_or_update_delivery_request = null)
    {
        // verify the required parameter 'str_database' is set
        if ($str_database === null || (is_array($str_database) && count($str_database) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $str_database when calling createDelivery'
            );
        }

        $resourcePath = '/{strDatabase}/layouts/api_SPY_Varemodtagelse/records';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;


        // path params
        if ($str_database !== null) {
            $resourcePath = str_replace(
                '{' . 'strDatabase' . '}',
                ObjectSerializer::toPathValue($str_database),
                $resourcePath
            );
        }

        // body params
        $_tempBody = null;
        if (isset($create_or_update_delivery_request)) {
            $_tempBody = $create_or_update_delivery_request;
        }

        if ($multipart) {
            $headers = $this->headerSelector->selectHeadersForMultipart(
                ['application/json']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/json'],
                ['application/json']
            );
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            // $_tempBody is the method argument, if present
            if($headers['Content-Type'] !== 'application/json') {
                $httpBody = $_tempBody;
            } else {
                $httpBody = \GuzzleHttp\json_encode(ObjectSerializer::sanitizeForSerialization($_tempBody));
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $multipartContents[] = [
                        'name' => $formParamName,
                        'contents' => $formParamValue
                    ];
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = \GuzzleHttp\Psr7\build_query($formParams);
            }
        }

        // this endpoint requires API key authentication
        $apiKey = $this->config->getApiKeyWithPrefix('Authorization');
        if ($apiKey !== null) {
            $headers['Authorization'] = $apiKey;
        }

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $query = \GuzzleHttp\Psr7\build_query($queryParams);
        return new Request(
            'POST',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Create http client option
     *
     * @throws \RuntimeException on file opening failure
     * @return array of http client options
     */
    protected function createHttpClientOption()
    {
        $options = [];
        if ($this->config->getDebug()) {
            $options[RequestOptions::DEBUG] = fopen($this->config->getDebugFile(), 'a');
            if (!$options[RequestOptions::DEBUG]) {
                throw new \RuntimeException('Failed to open the debug file: ' . $this->config->getDebugFile());
            }
        }

		#region SPY Code
		$bEnableXDebug	= $this->bXDebugOnNextRequest;

		if($bEnableXDebug === null)
		{
			$bEnableXDebug	= $this->bXDebugOnInstance;
		}

		$this->bXDebugOnNextRequest	= null;

		if($bEnableXDebug)
		{
			if(preg_match('/^(?:https?:\/\/)?([^\/:]+\.[^\/:]+)/i', $this->getConfig()->getHost(), $arrMatches) === 1)
			{
				$options['cookies'] = CookieJar::fromArray(
					[
						'XDEBUG_SESSION'	=> 'PHPSTORM',
					],
					$arrMatches[1]
				);
			}
		}
		#endregion

        return $options;
    }
}
