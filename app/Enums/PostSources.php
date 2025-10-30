<?php

namespace App\Enums;

enum PostSources: string
{
    case JSONPLACEHOLDER = 'jsonplaceholder';
    case FAKESTORE = 'fakestore';
    case LOCAL = 'local';
}
