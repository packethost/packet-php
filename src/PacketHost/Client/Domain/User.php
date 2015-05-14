<?php namespace PacketHost\Client\Domain;

class User extends BaseDomain
{
    /**
     * @var string
     */
    public $token;

    /**
     * @var string
     */
    public $emails = []; // "emails": [ { "address": "melissa@example.com", "default": true },

    /**
     * @var string
     */
    public $email;

    /**
     * @var string
     */
    public $firstName;

    /**
     * @var string
     */
    public $lastName;

    /**
     * @var string
     */
    public $fullName;

    /**
     * @var string
     */
    public $displayName;

    /**
     * @var string
     */
    public $password;

    public $currentPassword;

    /**
    * @var string
    */
    public $passwordDigest;
    
    /**
     * @var string
     */
    public $twitter;

    /**
     * @var string
     */
    public $facebook;

    /**
     * @var string
     */
    public $linkedin;

    /**
     * @var string
     */
    public $timezone;

    /**
     * @var
     */
    public $twoFactorAuth;

    public $otpUri;

    public $phoneNumber;
    
    public $imageUrl;

    public $avatarUrl;

    public $verifiedAt;

    public $level;

    public $maxProjects;

    public $couponCode;
}
