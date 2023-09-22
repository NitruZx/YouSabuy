<?php
namespace App\Enums;

enum ClientRole: string {
    case Guest = 'guest';
    case Tenant = 'tenant';
}

?>