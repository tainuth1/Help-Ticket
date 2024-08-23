<?php

namespace App\Enum;

enum TicketStatus: string
{
    case OPEN = 'Open';
    case RESOLVED = 'Resolved';
    case REJECTED = 'Rejected';
}