<?php
namespace App\Enums;
enum tableStatus: string
{
    case Pending = 'pending';
    case Avaliable = 'avaliable';
    case Unavaliable = 'unavaliable';
}