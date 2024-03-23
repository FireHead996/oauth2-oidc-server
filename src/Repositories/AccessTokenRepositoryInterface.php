<?php

/**
 * @author      Alex Bilbie <hello@alexbilbie.com>
 * @copyright   Copyright (c) Alex Bilbie
 * @license     http://mit-license.org/
 *
 * @link        https://github.com/thephpleague/oauth2-server
 */

declare(strict_types=1);

namespace League\OAuth2\Server\Repositories;

use League\OAuth2\Server\Entities\AccessTokenEntityInterface;
use League\OAuth2\Server\Entities\ClientEntityInterface;
use League\OAuth2\Server\Entities\ScopeEntityInterface;
use League\OAuth2\Server\Exception\UniqueTokenIdentifierConstraintViolationException;

/**
 * Access token interface.
 */
interface AccessTokenRepositoryInterface extends RepositoryInterface
{
    /**
     * Create a new access token
     *
     * @param ScopeEntityInterface[] $scopes
     */
    public function getNewToken(
        ClientEntityInterface $clientEntity,
        array $scopes,
        string|null $userIdentifier = null
    ): AccessTokenEntityInterface;

    /**
     * Store access token into storage
     *
     * @throws UniqueTokenIdentifierConstraintViolationException
     */
    public function persistNewAccessToken(AccessTokenEntityInterface $accessTokenEntity): void;

    /**
     * Revoke access token by identifier
     */
    public function revokeAccessToken(string $tokenId): void;

    /**
     * Check if access token with provided identifier is revoked
     */
    public function isAccessTokenRevoked(string $tokenId): bool;
}
