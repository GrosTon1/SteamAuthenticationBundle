<?php

namespace Knojector\SteamAuthenticationBundle\User;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\Role\Role;

/**
 * @author Knojector <dev@knojector.xyz>
 */
abstract class AbstractSteamUser implements SteamUserInterface, UserInterface
{
    /**
     * @var string
     *
     * @ORM\Column(type="bigint")
     */
    protected $steamId;

    /**
     * @var string
     *
     * @ORM\Column(type="string")
     */
    protected $profileName;

    /**
     * @var string
     *
     * @ORM\Column(type="string")
     */
    protected $profileUrl;

    /**
     * @var string
     *
     * @ORM\Column(type="string")
     */
    protected $avatar;

    /**
     * @var array
     *
     * @ORM\Column(type="json_array")
     */
    protected $roles;

    /**
     * {@inheritdoc}
     */
    public function getSteamId(): int
    {
        return $this->steamId;
    }

    /**
     * {@inheritdoc}
     */
    public function setSteamId(int $steamId)
    {
        $this->steamId = $steamId;
    }

    /**
     * {@inheritdoc}
     */
    public function getProfileName(): string
    {
        return $this->profileName;
    }

    /**
     * {@inheritdoc}
     */
    public function setProfileName(string $name)
    {
        $this->profileName = $name;
    }

    /**
     * {@inheritdoc}
     */
    public function getProfileUrl(): string
    {
        return $this->profileUrl;
    }

    /**
     * {@inheritdoc}
     */
    public function setProfileUrl(string $url)
    {
        $this->profileUrl = $url;
    }

    /**
     * {@inheritdoc}
     */
    public function getAvatar(): string
    {
        return $this->avatar;
    }

    /**
     * {@inheritdoc}
     */
    public function setAvatar(string $avatar)
    {
        $this->avatar = $avatar;
    }

    /**
     * {@inheritdoc}
     */
    public function getPassword()
    {
        return null;
    }

    /**
     * {@inheritdoc}
     */
    public function getSalt()
    {
        return null;
    }

    /**
     * {@inheritdoc}
     */
    public function getUsername()
    {
       return $this->steamId;
    }

    /**
     * {@inheritdoc}
     */
    public function eraseCredentials()
    {
        return;
    }
    
    /**
     * @return array
     */
    public function getRoles(): array {
        $roles = [];
        foreach ($this->roles as $role) {
            $roles[] = new Role($role);
        }

        return $roles;
    }

    /**
     * @param array $userData
     */
    public function update(array $userData)
    {
        $this->setProfileName($userData['personaname']);
        $this->setProfileUrl($userData['profileurl']);
        $this->setAvatar($userData['avatarfull']);
    }
}
