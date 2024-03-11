<?php

namespace AgroZamin\Integrations\BusinessId;

use AgroZamin\Integrations\BusinessId\Exception\Http\NotFoundHttpException;
use AgroZamin\Integrations\BusinessId\Exception\Http\UnauthorizedHttpException;
use AgroZamin\Integrations\BusinessId\Trait\OrganizationTrait;
use AgroZamin\Integrations\Helper\Json;
use AgroZamin\Integrations\Integration;
use AgroZamin\Integrations\RequestData;
use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Log\LoggerInterface;
use Throwable;

class BusinessId extends Integration {
    use OrganizationTrait;

    protected const AUTHORIZATION_HEADER_NAME = 'Authorization';

    protected string $contentType = 'application/json';

    private string $serviceToken;
    private ClientInterface $client;
    private LoggerInterface|null $logger;

    /**
     * @param string $serviceToken
     * @param ClientInterface $client
     * @param LoggerInterface|null $logger
     */
    public function __construct(string $serviceToken, ClientInterface $client, LoggerInterface $logger = null) {
        $this->serviceToken = $serviceToken;
        $this->client = $client;
        $this->logger = $logger;
    }

    /**
     * @return string
     */
    protected function serviceName(): string {
        return 'AgroZamin.BusinessID';
    }

    /**
     * @return string
     */
    protected function apiVersion(): string {
        return '1.0.0';
    }

    /**
     * @return string[]
     */
    protected function defaultHeaders(): array {
        return [
            self::AUTHORIZATION_HEADER_NAME => $this->serviceToken,
            'Content-Type' => $this->contentType
        ];
    }

    /**
     * @return Client
     */
    protected function getClient(): Client {
        return $this->client;
    }

    /**
     * @param RequestData $requestData
     *
     * @return void
     */
    protected function onBeforeRequest(RequestData $requestData): void {
        $this->logger?->info($this->serviceName() . 'OnBeforeRequest', ['requestData' => $requestData]);
    }

    /**
     * @param RequestData $requestData
     *
     * @return void
     */
    protected function onAfterRequest(RequestData $requestData): void {
        $this->logger?->info($this->serviceName() . 'onAfterRequest', ['requestData' => $requestData]);
    }

    /**
     * @param RequestData $requestData
     *
     * @return void
     */
    protected function onThrow(RequestData $requestData): void {
        $this->logger?->error($this->serviceName() . 'onThrow', ['requestData' => $requestData]);
    }

    /**
     * @param ResponseInterface $response
     * @param Throwable $exception
     *
     * @return Throwable
     */
    protected function handleException(ResponseInterface $response, Throwable $exception): Throwable {
        $payload = Json::decode($response->getBody()->getContents());

        $message = $payload['body']['message'];
        $code = $payload['body']['code'];

        return match ($response->getStatusCode()) {
            401 => new UnauthorizedHttpException($message, $code, $exception),
            404 => new NotFoundHttpException($message, $code, $exception)
        };
    }
}