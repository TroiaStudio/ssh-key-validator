<?php

declare(strict_types = 1);

namespace TroiaStudio\SshKeyValidator;

use TroiaStudio\SshKeyValidator\Enums\SshKey;

class Key
{

    protected SshKey $key;

    protected string $type;

    protected string $value;

    protected string $prefix;

    protected string $comment = '';

    public function __construct(SshKey $key, string $value, string $prefix, string $comment = '')
    {
        $this->key = $key;
        $this->type = $key->name;
        $this->value = $value;
        $this->prefix = $prefix;
        $this->comment = $comment;
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function getValue(): string
    {
        return $this->value;
    }

    public function getPrefix(): string
    {
        return $this->prefix;
    }

    public function getComment(): string
    {
        return $this->comment;
    }

}
