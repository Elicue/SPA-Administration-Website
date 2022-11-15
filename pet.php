<?php
  
  class Pet
  {
    public function __construct(
      public string $name,
      public string $species,
      public string $user_id,
    )
    {
    }
    
    public function verify(): bool
    {
      $isValid = true;
      
      if ($this->name === '' || $this->species === '') {
        $isValid = false;
      }
      
      return $isValid;
    }
  }