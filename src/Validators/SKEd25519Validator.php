<?php
declare(strict_types=1);

namespace TroiaStudio\SshKeyValidator\Validators;

use TroiaStudio\SshKeyValidator\Enums\SSH_KEY;

class SKEd25519Validator extends AbstractValidator
{
    public SSH_KEY $type = SSH_KEY::SK_ED25519;
}