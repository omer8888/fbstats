<?php
require_once("User/UserEntity.php");

class UserConvertHelper
{
    /**
     * @param UserModel $userModel
     * @return UserEntity
     */
    public function convertModelToEntity($userModel)
    {
        return (new UserEntity())
            ->setFirstName($userModel->getFirstName())
            ->setLastName($userModel->getLastName())
            ->setUserName($userModel->getUserName())
            ->setEmail($userModel->getEmail())
            ->setPassword($userModel->getPassword())
            ->setSignupDate($userModel->getSignupDate())
            ->setProfilePic($userModel->getProfilePic())
            ->setFriends($userModel->getFriends())
            ->setLikes($userModel->getLikes());
    }

    /**
     * @param UserEntity $userEntity
     * @return UserModel
     */
    public function convertEntityToModel($userEntity)
    {
        return (new UserModel())
            ->setFirstName($userEntity->getFirstName())
            ->setLastName($userEntity->getLastName())
            ->setUserName($userEntity->getUserName())
            ->setEmail($userEntity->getEmail())
            ->setPassword($userEntity->getPassword())
            ->setSignupDate($userEntity->getSignupDate())
            ->setProfilePic($userEntity->getProfilePic())
            ->setFriends($userEntity->getFriends())
            ->setLikes($userEntity->getLikes());

    }
}