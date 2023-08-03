<?php

declare(strict_types = 1);

namespace TroiaStudio\SshKeyValidator\Validators;

use TroiaStudio\SshKeyValidator\Enums\SshKey;

class SkEcdsaValidator extends AbstractValidator
{

    public SshKey $type = SshKey::SK_ECDSA_SHA2_NITSTP256;

}
