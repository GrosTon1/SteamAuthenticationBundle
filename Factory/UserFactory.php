<?php

namespace Knojector\SteamAuthenticationBundle\Factory;

use Knojector\SteamAuthenticationBundle\Exception\InvalidUserClassException;
use Knojector\SteamAuthenticationBundle\User\SteamUserInterface;

/**
 * @author Knojector <dev@404-labs.xyz>
 */
class UserFactory
{
    /**
     * @var string
     */
    private $userClass;

    /**
     * @param string $userClass
     */
    public function __construct(string $userClass)
    {
        $this->userClass = $userClass;
    }

    /**
     * @param array $userData
     *
     * @return SteamUserInterface
     *
     * @throws InvalidUserClassException
     */
    public function getFromSteamApiResponse(array $userData)
    {
        $user = new $this->userClass;
        if (!$user instanceof SteamUserInterface) {
            throw new InvalidUserClassException($this->userClass);
        }

        $user->setSteamId($userData['steamid']);
        $user->setProfileName($userData['personaname']);
        $user->setProfileUrl($userData['profileurl']);
        $user->setAvatar($userData['avatarfull']);

        return $user;
    }
}
