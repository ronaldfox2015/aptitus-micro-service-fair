<?php

namespace Aptitus\Fairs\Infrastructure\Services\Encrypt;

use Firebase\JWT\JWT as FireBaseJWT;
use Symfony\Component\HttpKernel\Exception\UnauthorizedHttpException;

/**
 * AptJwt Class
 *
 * @package Aptitus\Fairs\Infrastructure\Services\Encrypt
 * @author Jose Guillermo <jguillermo@outlook.com>
 * @copyright (c) 2017, Orbis
 */
class Jwt
{
    const ENCRYPTION_ALGORITHM = 'HS256';

    private $key;

    public function __construct(String $key)
    {
        $this->key = $key;
    }

    /**
     * Genera la cadena encriptada

     * @param array $data
     * @param int $ttl tiempo de vida ( en segundos ), por defecto dura 5 minutos
     * @return string
     */
    public function encode(array $data, int $ttl = 300)
    {
        $issuedAt = time();
        $notBefore = $issuedAt + FireBaseJWT::$leeway;             // Adding 10 seconds
        $expire = $notBefore + $ttl;       // Adding 1 hour , 60*60
        $token = [
            'iat' => $issuedAt,         // Issued at: time when the token was generated
            'nbf' => $notBefore,        // Not before
            'exp' => $expire,           // Expire
            'data' => $data
        ];
        return FireBaseJWT::encode($token, $this->key, self::ENCRYPTION_ALGORITHM);
    }

    public function decode($jwt)
    {
        try {
            $decode = FireBaseJWT::decode($jwt, $this->key, [self::ENCRYPTION_ALGORITHM]);
            $result = (array)$decode->data;
        } catch (\Exception $e) {
            throw new UnauthorizedHttpException(null, 'Las credenciales son incorrectas.', $e);
        }
        return $result;
    }
}
