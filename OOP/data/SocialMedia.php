<?php

class SocialMedia
{
    public string $name;
}

final class Twitter extends SocialMedia
{
    final public function login(string $username, string $password): bool
    {
        return true;
    }
}

class Facebook extends SocialMedia
{
    final public function login(string $username, string $password): bool
    {
        return true;
    }
}

class FakeFacebook extends Facebook
{
    // error
    public function login(string $username, string $password): bool
    {
        return false;
    }
}

// error extends from final class
class TwitterClient extends Twitter
{

}