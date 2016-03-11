<?php

function isAddress($possibleAddress) {
    $address_pattern='/^[a-ö0-9\s]+$/i';

    return preg_match($address_pattern, $possibleAddress);
}

?>