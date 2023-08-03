<?php
declare(strict_types=1);

namespace TroiaStudio\SshKeyValidator\Validators;

use TroiaStudio\SshKeyValidator\Enums\SSH_KEY;

class DSSValidator extends AbstractValidator
{
    public SSH_KEY $type = SSH_KEY::DSS;
}