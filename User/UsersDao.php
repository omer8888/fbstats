<?php

class UsersDao
{
    /**
     * @param string $username
     * @return UserEntity|null
     */
    public function getUserByUserName(string $username)
    {
        $result = query("SELECT * FROM users WHERE user_name='{$username}'");
        if (!isset($result) || !mysqli_num_rows($result) == 1) {
            return null;
        }
        $row = $result->fetch_assoc();
        return $this->convertRowToEntity($row);
    }

    /**
     * @param string $email
     * @return UserEntity|null
     */
    private function getUserByUserEmail(string $email)
    {
        $result = query("SELECT * FROM users WHERE email='{$email}'");
        if (!isset($result) || !mysqli_num_rows($result) == 1) {
            return null;
        }
        $row = $result->fetch_assoc();
        return $this->convertRowToEntity($row);
    }

    /**
     * @param UserEntity $user
     */
    public function save(UserEntity $user)
    {
        $query = query("INSERT INTO users (id,first_name,last_name,user_name,email,password,signup_date,profile_pic,num_posts,num_likes,user_closed,friends_array)
             VALUES ('', '{$user->getFirstName()}', '{$user->getLastName()}', '{$user->getUserName()}', '{$user->getEmail()}', '{$user->getPassword()}', '{$user->getSignupDate()}', '{$user->getProfilePic()}', '0', '0', 'no', ',')");
        confirm($query);
    }

    /**
     * @param $row
     * @return UserEntity
     */
    private function convertRowToEntity($row)
    {
        return (new UserEntity())
            ->setFirstName($row['first_name'])
            ->setLastName($row['last_name'])
            ->setUserName($row['user_name'])
            ->setEmail($row['email'])
            ->setPassword($row['password'])
            ->setSignupDate($row['signup_date'])
            ->setProfilePic($row['profile_pic'])
            ->setFriends($row['friends_array'])
            ->setLikes($row['num_likes']);
    }
}
