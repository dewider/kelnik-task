<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = [
        'title',
        'author',
        'preview_text',
        'detail_text'
    ];

    protected static array $fieldsDetails = [
        'title' => [
            'rule' => 'required',
            'title' => 'Заголовок',
            'type' => 'string',
        ],
        'author' => [
            'title' => 'Автор',
            'type' => 'string',
        ],
        'preview_text' => [
            'title' => 'Бриф',
            'rule' => 'required',
            'type' => 'text',
        ],
        'detail_text' => [
            'title' => 'Детальный текст',
            'rule' => 'required',
            'type' => 'text',
        ]
    ];

    public static function getFieldsDetails(): array
    {
        return self::$fieldsDetails;
    }
}
