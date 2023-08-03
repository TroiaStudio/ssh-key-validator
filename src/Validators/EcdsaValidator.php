<?php
declare(strict_types=1);

namespace TroiaStudio\SshKeyValidator\Validators;

use TroiaStudio\SshKeyValidator\Enums\SSH_KEY;

class EcdsaValidator extends AbstractValidator
{
    public SSH_KEY $type = SSH_KEY::ECDSA_SHA2_NITSTP256;
}