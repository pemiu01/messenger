<?php

declare(strict_types=1);

namespace Kerox\Messenger\Model\Callback;

class Message
{
    /**
     * @var string
     */
    protected $messageId;

    /**
     * @var string|null
     */
    protected $text;

    /**
     * @var string|null
     */
    protected $quickReply;

    /**
     * @var array
     */
    protected $attachments;

    /**
     * @var string|null
     */
    protected $replyTo;

    /**
     * @var array
     */
    protected $entities;

    /**
     * Message constructor.
     *
     * @param string $text
     * @param string $quickReply
     */
    public function __construct(
        string $messageId,
        ?string $text = null,
        ?string $quickReply = null,
        array $attachments = [],
        ?string $replyTo = null,
        array $entities = []
    ) {
        $this->messageId = $messageId;
        $this->text = $text;
        $this->quickReply = $quickReply;
        $this->attachments = $attachments;
        $this->replyTo = $replyTo;
        $this->entities = $entities;
    }

    public function getMessageId(): string
    {
        return $this->messageId;
    }

    public function getText(): ?string
    {
        return $this->text;
    }

    public function hasText(): bool
    {
        return $this->text !== null && $this->text !== '';
    }

    public function getQuickReply(): ?string
    {
        return $this->quickReply;
    }

    public function hasQuickReply(): bool
    {
        return $this->quickReply !== null && $this->quickReply !== '';
    }

    public function getAttachments(): array
    {
        return $this->attachments;
    }

    public function hasAttachments(): bool
    {
        return !empty($this->attachments);
    }

    public function getReplyTo(): ?string
    {
        return $this->replyTo;
    }

    public function isReply(): bool
    {
        return $this->replyTo !== null && $this->replyTo !== '';
    }

    public function getEntities(): array
    {
        return $this->entities;
    }

    public function hasEntities(): bool
    {
        return !empty($this->entities);
    }

    /**
     * @return \Kerox\Messenger\Model\Callback\Message
     */
    public static function create(array $callbackData)
    {
        $text = $callbackData['text'] ?? null;
        $attachments = $callbackData['attachments'] ?? [];
        $quickReply = $callbackData['quick_reply']['payload'] ?? null;
        $replyTo = $callbackData['reply_to']['mid'] ?? null;
        $entities = $callbackData['nlp']['entities'] ?? [];

        return new self($callbackData['mid'], $text, $quickReply, $attachments, $replyTo, $entities);
    }
}
