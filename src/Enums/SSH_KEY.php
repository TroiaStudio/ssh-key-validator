<?php
declare(strict_types=1);

namespace TroiaStudio\SshKeyValidator\Enums;

enum SSH_KEY: string
{
    case DSS = '^ssh-dss AAAAB3NzaC1kc3[0-9A-Za-z+/]+[=]{0,3}(\s.*)?$';
    case ECDSA_SHA2_NITSTP256 = '^ecdsa-sha2-nistp256 AAAAE2VjZHNhLXNoYTItbmlzdHAyNT[0-9A-Za-z+/]+[=]{0,3}(\s.*)?$';
    case SK_ECDSA_SHA2_NITSTP256 = '^sk-ecdsa-sha2-nistp256@openssh.com AAAAInNrLWVjZHNhLXNoYTItbmlzdHAyNTZAb3BlbnNzaC5jb2[0-9A-Za-z+/]+[=]{0,3}(\s.*)?$';
    case ED25519 = '^ssh-ed25519 AAAAC3NzaC1lZDI1NTE5[0-9A-Za-z+/]+[=]{0,3}(\s.*)?$';
    case SK_ED25519 = '^sk-ssh-ed25519@openssh.com AAAAGnNrLXNzaC1lZDI1NTE5QG9wZW5zc2guY29t[0-9A-Za-z+/]+[=]{0,3}(\s.*)?$';
    case RSA = '^ssh-rsa AAAAB3NzaC1yc2[0-9A-Za-z+/]+[=]{0,3}(\s.*)?$';
}
