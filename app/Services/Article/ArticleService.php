<?php

namespace App\Services\Article;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ArticleService
{
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

    public function __construct(protected Article $article)
    {
    }

    /**
     * @param string $field
     * @return string
     */
    public function get(string $field): string
    {
        $readableFields = [
            'id',
            'created_at',
            'title',
            'author',
            'preview_text',
            'detail_text'
        ];
        if (in_array($field, $readableFields)) {
            return $this->article->$field;
        }

        throw new \Exception('Undefined field ' . $field);
    }

    /**
     * @return array
     */
    public static function getFieldsDetails(): array
    {
        return self::$fieldsDetails;
    }

    /**
     * @param Request $request
     * @return void
     */
    public static function validateAddFormRequest(Request $request)
    {
        $fieldsDetails = self::getFieldsDetails();
        $fieldsValidateRules = array_map(function ($fieldDetails) {
            return isset($fieldDetails['rule'])
                ? $fieldDetails['rule']
                : '';
        }, $fieldsDetails);
        $request->validate($fieldsValidateRules);
    }

    /**
     * @return array
     */
    public static function getAddFormFields(): array
    {
        $fieldsDetails = self::getFieldsDetails();
        return array_map(function ($fieldDetails) {
            if (
                isset($fieldDetails['rule'])
                && strpos($fieldDetails['rule'], 'required') !== false
            ){
                $fieldDetails['title'] .= '*';
                $fieldDetails['required'] = true;
            } else {
                $fieldDetails['required'] = false;
            }
            return $fieldDetails;
        }, $fieldsDetails);
    }

    public function __call(string $name, array $arguments): ?string
    {
        if (mb_strpos($name, 'get') === 0) {
            $field = Str::snake(mb_substr($name, 3));
            return $this->get($field);
        }
        throw new \Exception('Undefined method ' . $name . '()');
    }
}