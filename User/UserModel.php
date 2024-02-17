<?php


class UserModel
{
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
     * @return UserModel
     */
    public function setFirstName(string $firstName): UserModel
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
     * @return UserModel
     */
    public function setLastName(string $lastName): UserModel
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
     * @return UserModel
     */
    public function setUserName(string $userName): UserModel
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
     * @return UserModel
     */
    public function setEmail(string $email): UserModel
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
     * @return UserModel
     */
    public function setPassword(string $password): UserModel
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
     * @return UserModel
     */
    public function setSignupDate(string $signupDate): UserModel
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
     * @return UserModel
     */
    public function setProfilePic(string $profilePic): UserModel
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
     * @return UserModel
     */
    public function setFriends(string $friends): UserModel
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
     * @return UserModel
     */
    public function setLikes(int $likes): UserModel
    {
        $this->likes = $likes;
        return $this;
    }

}
