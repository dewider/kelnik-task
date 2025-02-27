<?php

namespace App\Services\Article;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ArticleService
{
    public function __construct(protected Article $article)
    {
    }

    /**
     * @return array
     */
    public static function getFormFields(): array
    {
        return [
            'title' => [
                'rule' => 'required|max:255',
                'title' => 'Заголовок',
                'type' => 'string',
            ],
            'author' => [
                'title' => 'Автор',
                'rule' => 'max:100',
                'type' => 'string',
            ],
            'preview_text' => [
                'title' => 'Бриф',
                'rule' => 'required|max:500',
                'type' => 'text',
            ],
            'detail_text' => [
                'title' => 'Детальный текст',
                'rule' => 'required',
                'type' => 'text',
            ]
        ];
    }

    /**
     * @param string $field
     * @return string
     */
    public function get(string $field): ?string
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
     * @param Request $request
     * @return void
     */
    public static function validateAddFormRequest(Request $request)
    {
        $fieldsDetails = self::getFormFields();
        $fieldsValidateRules = array_map(function ($fieldDetails) {
            return isset($fieldDetails['rule'])
                ? $fieldDetails['rule']
                : '';
        }, $fieldsDetails);
        $request->validate($fieldsValidateRules);
    }

    /**
     * @param Request $request
     * @return void
     */
    public static function storeAddFormRequest(Request $request)
    {
        $fieldsValues = [];
        foreach (self::getFormFields() as $fieldName => $fieldDetails) {
            $fieldsValues[$fieldName] = $request->get($fieldName);
        }
        Article::create($fieldsValues);
    }

    /**
     * @return array
     */
    public static function getAddFormFields(): array
    {
        $fieldsDetails = self::getFormFields();
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