<?php

namespace Anggadarkprince\SimpleWebLogin\Services;

use Anggadarkprince\SimpleWebLogin\Config\Database;
use Anggadarkprince\SimpleWebLogin\Domains\User;
use Anggadarkprince\SimpleWebLogin\Exceptions\ValidationException;
use Anggadarkprince\SimpleWebLogin\Models\UserLoginRequest;
use Anggadarkprince\SimpleWebLogin\Models\UserLoginResponse;
use Anggadarkprince\SimpleWebLogin\Models\UserPasswordUpdateRequest;
use Anggadarkprince\SimpleWebLogin\Models\UserPasswordUpdateResponse;
use Anggadarkprince\SimpleWebLogin\Models\UserProfileUpdateRequest;
use Anggadarkprince\SimpleWebLogin\Models\UserProfileUpdateResponse;
use Anggadarkprince\SimpleWebLogin\Models\UserRegisterRequest;
use Anggadarkprince\SimpleWebLogin\Models\UserRegisterResponse;
use Anggadarkprince\SimpleWebLogin\Repositories\UserRepository;
use Exception;

class UserService
{
    private UserRepository $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * Register user account.
     *
     * @param UserRegisterRequest $request
     * @return UserRegisterResponse
     * @throws ValidationException
     */
    public function register(UserRegisterRequest $request): UserRegisterResponse
    {
        $this->validateUserRegistrationRequest($request);

        try {
            Database::beginTransaction();

            $user = $this->userRepository->findById($request->id);
            if ($user != null) {
                throw new ValidationException("User Id already exists");
            }

            $user = new User();
            $user->id = $request->id;
            $user->name = $request->name;
            $user->password = password_hash($request->password, PASSWORD_BCRYPT);

            $this->userRepository->save($user);

            $response = new UserRegisterResponse();
            $response->user = $user;

            Database::commitTransaction();

            return $response;
        } catch (Exception $exception) {
            Database::rollbackTransaction();
            throw $exception;
        }
    }

    /**
     * Validate user registration request.
     *
     * @param UserRegisterRequest $request
     * @throws ValidationException
     */
    private function validateUserRegistrationRequest(UserRegisterRequest $request)
    {
        if ($request->id == null || $request->name == null || $request->password == null ||
            trim($request->id) == "" || trim($request->name) == "" || trim($request->password) == "") {
            throw new ValidationException("Id, Name, Password can not blank");
        }
    }

    /**
     * Check user authentication.
     *
     * @param UserLoginRequest $request
     * @return UserLoginResponse
     * @throws ValidationException
     */
    public function login(UserLoginRequest $request): UserLoginResponse
    {
        $this->validateUserLoginRequest($request);

        $user = $this->userRepository->findById($request->id);
        if ($user == null) {
            throw new ValidationException("Id or password is wrong");
        }

        if (password_verify($request->password, $user->password)) {
            $response = new UserLoginResponse();
            $response->user = $user;
            return $response;
        } else {
            throw new ValidationException("Id or password is wrong");
        }
    }

    /**
     * Validate user login request.
     *
     * @param UserLoginRequest $request
     * @throws ValidationException
     */
    private function validateUserLoginRequest(UserLoginRequest $request)
    {
        if ($request->id == null || $request->password == null ||
            trim($request->id) == "" || trim($request->password) == "") {
            throw new ValidationException("Id, Password can not blank");
        }
    }

    /**
     * Update user profile.
     *
     * @param UserProfileUpdateRequest $request
     * @return UserProfileUpdateResponse
     * @throws ValidationException
     */
    public function updateProfile(UserProfileUpdateRequest $request): UserProfileUpdateResponse
    {
        $this->validateUserProfileUpdateRequest($request);

        try {
            Database::beginTransaction();

            $user = $this->userRepository->findById($request->id);
            if ($user == null) {
                throw new ValidationException("User is not found");
            }

            $user->name = $request->name;
            $this->userRepository->update($user);

            Database::commitTransaction();

            $response = new UserProfileUpdateResponse();
            $response->user = $user;
            return $response;
        } catch (Exception $exception) {
            Database::rollbackTransaction();
            throw $exception;
        }
    }

    /**
     * Validate user profile update request.
     *
     * @param UserProfileUpdateRequest $request
     * @throws ValidationException
     */
    private function validateUserProfileUpdateRequest(UserProfileUpdateRequest $request)
    {
        if ($request->id == null || $request->name == null ||
            trim($request->id) == "" || trim($request->name) == "") {
            throw new ValidationException("Id, Name can not blank");
        }
    }

    /**
     * Update user password.
     *
     * @param UserPasswordUpdateRequest $request
     * @return UserPasswordUpdateResponse
     * @throws ValidationException
     */
    public function updatePassword(UserPasswordUpdateRequest $request): UserPasswordUpdateResponse
    {
        $this->validateUserPasswordUpdateRequest($request);

        try {
            Database::beginTransaction();

            $user = $this->userRepository->findById($request->id);
            if ($user == null) {
                throw new ValidationException("User is not found");
            }

            if (!password_verify($request->oldPassword, $user->password)) {
                throw new ValidationException("Old password is wrong");
            }

            $user->password = password_hash($request->newPassword, PASSWORD_BCRYPT);
            $this->userRepository->update($user);

            Database::commitTransaction();

            $response = new UserPasswordUpdateResponse();
            $response->user = $user;
            return $response;
        } catch (Exception $exception) {
            Database::rollbackTransaction();
            throw $exception;
        }
    }

    /**
     * Validate user password update request.
     *
     * @param UserPasswordUpdateRequest $request
     * @throws ValidationException
     */
    private function validateUserPasswordUpdateRequest(UserPasswordUpdateRequest $request)
    {
        if ($request->id == null || $request->oldPassword == null || $request->newPassword == null ||
            trim($request->id) == "" || trim($request->oldPassword) == "" || trim($request->newPassword) == "") {
            throw new ValidationException("Id, Old Password, New Password can not blank");
        }
    }
}