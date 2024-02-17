<?php

class UserEntity{

    /**
     * @var string
     */
    private $firstName;

    /**
     * @var string
     */
    private $lastName;

    /**
     * @var string
     */
    private $userName;

    /**
     * @var string
     */
    private $email;

    /**
     * @var string
     */
    private $password;

    /**
     * @var string
     */
    private $signupDate;

    /**
     * @var string
     */
    private $profilePic;

    /**
     * @var string
     */
    private $friends;

    /**
     * @var int
     */
    private $likes;

    /**
     * @return string
     */
    public function getFirstName(): string
    {
        return $this->firstName;
    }

    /**
     * @param string $firstName
     * @return UserEntity
     */
    public function setFirstName(string $firstName): UserEntity
    {
        $this->firstName = $firstName;
        return $this;
    }

    /**
     * @return string
     */
    public function getLastName(): string
    {
        return $this->lastName;
    }

    /**
     * @param string $lastName
     * @return UserEntity
     */
    public function setLastName(string $lastName): UserEntity
    {
        $this->lastName = $lastName;
        return $this;
    }

    /**
     * @return string
     */
    public function getUserName(): string
    {
        return $this->userName;
    }

    /**
     * @param string $userName
     * @return UserEntity
     */
    public function setUserName(string $userName): UserEntity
    {
        $this->userName = $userName;
        return $this;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @param string $email
     * @return UserEntity
     */
    public function setEmail(string $email): UserEntity
    {
        $this->email = $email;
        return $this;
    }

    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * @param string $password
     * @return UserEntity
     */
    public function setPassword(string $password): UserEntity
    {
        $this->password = $password;
        return $this;
    }

    /**
     * @return string
     */
    public function getSignupDate(): string
    {
        return $this->signupDate;
    }

    /**
     * @param string $signupDate
     * @return UserEntity
     */
    public function setSignupDate(string $signupDate): UserEntity
    {
        $this->signupDate = $signupDate;
        return $this;
    }

    /**
     * @return string
     */
    public function getProfilePic(): string
    {
        return $this->profilePic;
    }

    /**
     * @param string $profilePic
     * @return UserEntity
     */
    public function setProfilePic(string $profilePic): UserEntity
    {
        $this->profilePic = $profilePic;
        return $this;
    }

    /**
     * @return string
     */
    public function getFriends(): string
    {
        return $this->friends;
    }

    /**
     * @param string $friends
     * @return UserEntity
     */
    public function setFriends(string $friends): UserEntity
    {
        $this->friends = $friends;
        return $this;
    }

    /**
     * @return int
     */
    public function getLikes(): int
    {
        return $this->likes;
    }

    /**
     * @param int $likes
     * @return UserEntity
     */
    public function setLikes(int $likes): UserEntity
    {
        $this->likes = $likes;
        return $this;
    }

}
