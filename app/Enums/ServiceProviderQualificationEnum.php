<?php

namespace App\Enums;

enum ServiceProviderQualificationEnum: string
{
    case ACTIVE = 'active';
    case NONACTIVE = 'nonactive';
    case PENDING = 'pending';
    case REJECT = 'reject';
}
