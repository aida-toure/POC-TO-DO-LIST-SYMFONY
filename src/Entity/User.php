<?php

namespace App\Entity;

class User
{
    # Aïda : ----- attributes ------#
    # Aïda : --- since there is not a table dedicated to users, i created the attributes with bash command
    private ?string $user = null;

    # Aïda ------ methods ------#
    # Aïda --- getters and setters ---#
    public function getUser(): ?string{return $this->user;}
    public function setUser(string $user): static{$this->user = $user;return $this;}
}
