<?php

namespace Core\Libs;

use GuzzleHttp\Client;

class ApiRequests extends Client {

    private array $query, $headers, $bodyData;

    protected $answer;

    public function __construct(array $config = []) {
        parent::__construct($config);
    }

    public function makeCall (string $method, string $url) {
        if (!empty($this->query)) {
            $options["query"] = $this->query;
        }

        if (!empty($this->headers)) {
            $options["headers"] = $this->headers;
        }

        if (!empty($this->bodyData)) {
            $options["form_params"] = $this->bodyData;
        }

        $this->answer = $this->request($method, $url, $options ?? [])->getBody()->getContents();
        return $this;
    }

    public function getAnswer (int $origin = 0) {
        return ($origin === 1) ? $this->answer : json_decode($this->answer, true);
    }

    public function setQuery (array $query) {
        $this->query = $query;
        return $this;
    }

    public function getQuery() {
        return $this->query;
    }

    public function setHeaders (array $headers) {
        $this->headers = (empty($this->headers)) ? $headers : array_merge($this->headers, $headers);
        return $this;
    }

    public function getHeaders () {
        return $this->headers;
    }

    public function setBodyData (array $body) {
        $this->bodyData = $body;
        return $this;
    }

    public function getBodyData () {
        return $this->bodyData;
    }

}