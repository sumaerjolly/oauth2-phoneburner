<?php

namespace SumaerJolly\OAuth2\Client\Provider;

use League\OAuth2\Client\Provider\ResourceOwnerInterface;
use League\OAuth2\Client\Tool\ArrayAccessorTrait;

class PhoneburnerUser implements ResourceOwnerInterface
{
  use ArrayAccessorTrait;

  /**
   * @var array
   */
  protected $response;

  /**
   * @param array $response
   */
  public function __construct(array $response)
  {
    $this->response = $response;
  }

  public function getId()
  {
    return $this->getValueByKey($this->response, 'members.members.0.user_id');
  }

  public function getEmail()
  {
    return $this->getValueByKey($this->response, 'members.members.0.email_address');
  }

  public function toArray()
  {
    return $this->response;
  }
}
