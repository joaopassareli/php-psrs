<?php

namespace Alura\Mvc\Helper;

trait FlashMessageTrait 
{
    private function addErrorMessage(string $error_message) :void
    {
        $_SESSION['error_message'] = $error_message;
    }
}

