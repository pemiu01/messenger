<?php

declare(strict_types=1);

namespace Kerox\Messenger\Api;

use Kerox\Messenger\Model\ThreadControl;
use Kerox\Messenger\Request\ThreadRequest;
use Kerox\Messenger\Response\ThreadResponse;

class Thread extends AbstractApi
{
    public function pass(ThreadControl $threadControl): ThreadResponse
    {
        $request = new ThreadRequest($this->pageToken, $threadControl);
        $response = $this->client->post('me/pass_thread_control', $request->build());

        return new ThreadResponse($response);
    }

    public function take(ThreadControl $threadControl): ThreadResponse
    {
        $request = new ThreadRequest($this->pageToken, $threadControl);
        $response = $this->client->post('me/take_thread_control', $request->build());

        return new ThreadResponse($response);
    }

    public function request(ThreadControl $threadControl): ThreadResponse
    {
        $request = new ThreadRequest($this->pageToken, $threadControl);
        $response = $this->client->post('me/request_thread_control', $request->build());

        return new ThreadResponse($response);
    }
}
