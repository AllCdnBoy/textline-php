<?php

namespace Textline\Resources;

class Conversations extends Resource
{
    public function get(array $query = [])
    {
        $response = $this->client
                         ->get('conversations.json', $query)
                         ->getContent();

        return $response;
    }

    public function messageByPhone(string $number, array $body = [])
    {
        $response = $this->client
                         ->post('conversations.json', array_merge([
                             'phone_number' => $number
                         ], $body))
                         ->getContent();

        return $response;
    }

    public function scheduleByPhone(string $number, int $timestamp, string $comment, array $body = [])
    {
        $response = $this->client
                         ->post("conversations/schedule.json", array_merge([
                             'phone_number' => $number,
                             'timestamp' => $timestamp,
                             'comment' => [
                                 'body' => $comment
                             ]
                         ], $body))
                         ->getContent();

        return $response;
    }
}
