<?php

declare(strict_types=1);

namespace App\Enums;

enum SnippetFileType: string
{
    case Text = 'text';
    case Code = 'code';
    case Attachment = 'attachment';
}
