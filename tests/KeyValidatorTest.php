<?php

declare(strict_types = 1);

namespace Tests;

use PHPUnit\Framework\TestCase;
use TroiaStudio\SshKeyValidator\KeyValidator;
use TroiaStudio\SshKeyValidator\Validators\DSSValidator;
use TroiaStudio\SshKeyValidator\Validators\EcdsaValidator;
use TroiaStudio\SshKeyValidator\Validators\Ed25519Validator;
use TroiaStudio\SshKeyValidator\Validators\RsaValidator;
use TroiaStudio\SshKeyValidator\Validators\SkEcdsaValidator;
use TroiaStudio\SshKeyValidator\Validators\SKEd25519Validator;
use TroiaStudio\SshKeyValidator\Validators\Validator;

final class KeyValidatorTest extends TestCase
{

    public function testValidateAllOk(): void
    {
        $validators = [
            new DSSValidator(),
            new EcdsaValidator(),
            new Ed25519Validator(),
            new RsaValidator(),
            new SkEcdsaValidator(),
            new SKEd25519Validator(),
        ];

        $key = 'ssh-ed25519 AAAAC3NzaC1lZDI1NTE5AAAAINCqSM/QRXfw4xbJo+DIW4k9Ehks9hpxMyN/SoFvJHNZ test ed25519';

        $this->validTest($validators, $key, true);
    }

    public function testValidateAllFalse(): void
    {
        $validators = [
            new DSSValidator(),
            new EcdsaValidator(),
            new Ed25519Validator(),
            new RsaValidator(),
            new SkEcdsaValidator(),
            new SKEd25519Validator(),
        ];

        $key = 'ssed25519 AAAAC3NzaC1lZDI1NTE5AAAAIFaGEVPvFEkPXCRHmLv7MpicOLfIo2FPhmXfQ/8W/3NS me@jan-galek.cz';

        $this->validTest($validators, $key, false);
    }

    public function testValidateEd25519Ok(): void
    {
        $validators = [
            new Ed25519Validator(),
        ];

        $key = 'ssh-ed25519 AAAAC3NzaC1lZDI1NTE5AAAAINCqSM/QRXfw4xbJo+DIW4k9Ehks9hpxMyN/SoFvJHNZ test ed25519';

        $this->validTest($validators, $key, true);
    }

    public function testValidateSkEd25519Ok(): void
    {
        $validators = [
            new SkEd25519Validator(),
        ];

        $key = 'sk-ssh-ed25519@openssh.com AAAAGnNrLXNzaC1lZDI1NTE5QG9wZW5zc2guY29tAAAAINCqSM/QRXfw4xbJo+DIW4k9Ehks9hpxMyN/SoFvJHNZ test ed25519 sk';

        $this->validTest($validators, $key, true);
    }

    public function testValidateRsaOk(): void
    {
        $validators = [
            new RsaValidator(),
        ];

        $key = 'ssh-rsa AAAAB3NzaC1yc2EAAAADAQABAAABAQCw/NB2MsqSn4bXSbtjnE3N8BOFCfAIfOERVX1uhnkysnR5JprsSpwDt44NQt1bu35n2x439LdwyH03Wr1Tuywu7WuJxqxskgBic5NjkEbCY4m6u6rQPFAse+10huXD5fwy09WDjiKyPcGLB1Gt0ro6KtW5TEt3QWJG+M2Et6JSIWZ1EJjdfSGf0IEbvRkwEWJtQaQ4fppmbVbVgIe0Rgi5gxsMB7DA8qePmALk60t1+h/1ZENo1vXWG/7f9V6xCWYSoHmj/mkEKxCqkG5Y/T3LNaRMGONhunhNNaPXvGO7o61KGKYFzat0hKxIBb3yjfFbZKLUuyPUFK2fRmbHcdKd test rsa';

        $this->validTest($validators, $key, true);
    }

    public function testValidateRsaFalse(): void
    {
        $validators = [
            new RsaValidator(),
        ];

        $key = 'sshrsa AAAAB3NzaC1yc2EAAAADAQABAAABAQCw/NB2MsqSn4bXSbtjnE3N8BOFCfAIfOERVX1uhnkysnR5JprsSpwDt44NQt1bu35n2x439LdwyH03Wr1Tuywu7WuJxqxskgBic5NjkEbCY4m6u6rQPFAse+10huXD5fwy09WDjiKyPcGLB1Gt0ro6KtW5TEt3QWJG+M2Et6JSIWZ1EJjdfSGf0IEbvRkwEWJtQaQ4fppmbVbVgIe0Rgi5gxsMB7DA8qePmALk60t1+h/1ZENo1vXWG/7f9V6xCWYSoHmj/mkEKxCqkG5Y/T3LNaRMGONhunhNNaPXvGO7o61KGKYFzat0hKxIBb3yjfFbZKLUuyPUFK2fRmbHcdKd test rsa';

        $this->validTest($validators, $key, false);
    }

    public function testValidateEcdsaOk(): void
    {
        $validators = [
            new EcdsaValidator(),
        ];

        $key = 'ecdsa-sha2-nistp256 AAAAE2VjZHNhLXNoYTItbmlzdHAyNTYAAAAIbmlzdHAyNTYAAABBBDDW0/FqTq6yCbscqDYSjRsAHx4Moz1gpayl5xwlAQdSOd+Hg/Vjx3u50G0ogGRh3H6NJpFWEceppUMdxBbHFw8= test ecds';

        $this->validTest($validators, $key, true);
    }

    public function testValidateSkEcdsaOk(): void
    {
        $validators = [
            new SkEcdsaValidator(),
        ];

        $key = 'sk-ecdsa-sha2-nistp256@openssh.com AAAAInNrLWVjZHNhLXNoYTItbmlzdHAyNTZAb3BlbnNzaC5jb2YAAAAIbmlzdHAyNTYAAABBBDDW0/FqTq6yCbscqDYSjRsAHx4Moz1gpayl5xwlAQdSOd+Hg/Vjx3u50G0ogGRh3H6NJpFWEceppUMdxBbHFw8= test ecds-sk';

        $this->validTest($validators, $key, true);
    }

    public function testValidateEcdsaFalse(): void
    {
        $validators = [
            new EcdsaValidator(),
        ];

        $key = 'ssh-ed25519 AAAAC3NzaC1lZDI1NTE5AAAAINCqSM/QRXfw4xbJo+DIW4k9Ehks9hpxMyN/SoFvJHNZ test ed25519';

        $this->validTest($validators, $key, false);
    }

    /**
     * @param Validator[] $validators
     */
    protected function validTest(array $validators, string $key, bool $expected): void
    {
        $validator = new KeyValidator($validators);
        $this->assertSame($expected, $validator->validate($key));
    }

}
