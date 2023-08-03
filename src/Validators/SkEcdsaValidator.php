<?php
declare(strict_types=1);

namespace TroiaStudio\SshKeyValidator\Validators;

use TroiaStudio\SshKeyValidator\Enums\SSH_KEY;

class SkEcdsaValidator extends AbstractValidator
{
    public SSH_KEY $type = SSH_KEY::SK_ECDSA_SHA2_NITSTP256;
}