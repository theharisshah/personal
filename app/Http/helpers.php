<?php

function getPassword($salt = '')
{
    return str_random(2) . $salt . str_random(3);
}
