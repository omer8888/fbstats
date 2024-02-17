<?php
require_once("User/UsersDao.php");
require_once("User/UserConvertHelper.php");

class UsersService
{
    /**
     * @var UsersDao
     */
    private $usersDao;

    /**
     * @var UserConvertHelper
     */
    private $userConvertHelper;

    /**
     * @param $userName
     * @return UserModel
     */
    public function getUserByUserName($userName)
    {
        $userEntity = $this->getUsersDao()->getUserByUserName($userName);
        return $this->getUserConvertHelper()->convertEntityToModel($userEntity);
    }

    /**
     * @param $userModel
     */
    public function saveUser($userModel)
    {
        $userEntity = $this->getUserConvertHelper()->convertModelToEntity($userModel);
        $this->getUsersDao()->save($userEntity);
    }

    /**
     * @return UsersDao
     */
    private function getUsersDao()
    {
        return $this->usersDao ?? $this->usersDao = new UsersDao();
    }

    /**
     * @return UserConvertHelper
     */
    private function getUserConvertHelper()
    {
        return $this->userConvertHelper ?? $this->userConvertHelper = new UserConvertHelper();
    }
}
