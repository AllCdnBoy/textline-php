<?php

namespace Textline\Resources;

class Message
{
    protected $messageBody;
    protected $attachments = [];
    protected $groupUuid;
    protected $resolve;

    public function __construct($message, $type = 'normal')
    {
        $this->addMessage($message, $type);
    }

    public function addAttachment(string $contentType, string $name, string $url, $isImage = '')
    {
        $this->attachments[] = [
            'content_type' => $contentType,
            'name' => $name,
            'url' => $url,
            'is_image' => $isImage
        ];
    }

    public function addMessage(string $message, bool $whisper = false)
    {
        if ($whisper) {
            $this->messageBody = ['whisper' => $message];
        } else {
            $this->messageBody = ['body' => $message];
        }
    }

    public function addGroupUuid(string $id)
    {
        $this->groupUuid = $id;
    }

    public function setResolve()
    {
        $this->resolve = 1;
    }

    public function getBody(): array
    {
        $body = ['comment' =>
            $this->messageBody
        ];

        if ($this->attachments) {
            $body['attachments'] = $this->attachments;
        }

        if ($this->groupUuid) {
            $body['group_uuid'] = $this->groupUuid;
        }

        if ($this->resolve) {
            $body['resolve'] = $this->resolve;
        }

        return $body;

    }
}
