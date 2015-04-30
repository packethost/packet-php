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

    public $projects;

    public $lastLoginAt;

    public $lastLoginFrom;

    public $avatarUrl;

    public $verifiedAt;

    public $companyName;

    public $companyUrl;

    public $level;

    public $maxProjects;

    public $title;

    public $couponCode;
}
