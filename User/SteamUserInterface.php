<?php

namespace Knojector\SteamAuthenticationBundle\User;

/**
 * @see https://developer.valvesoftware.com/wiki/Steam_Web_API#GetPlayerSummaries_.28v0002.29
 *
 * @author Knojector <dev@404-labs.xyz>
 */
interface SteamUserInterface
{
    /**
     * @return int
     */
    public function getSteamId(): int;

    /**
     * @param int $steamId
     */
    public function setSteamId(int $steamId);

    /**
     * @return string
     */
    public function getProfileName(): string;

    /**
     * @param string $name
     */
    public function setProfileName(string $name);

    /**
     * @return string
     */
    public function getProfileUrl(): string;

    /**
     * @param string $url
     */
    public function setProfileUrl(string $url);

    /**
     * @return string
     */
    public function getAvatar(): string;

    /**
     * @param string $avatar
     */
    public function setAvatar(string $avatar);

    /**
     * @param array $userData
     */
    public function update(array $userData);
}
