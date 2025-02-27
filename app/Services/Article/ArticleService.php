<?php

namespace App\Services\Article;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticleService
{
    public function __construct(protected Article $article)
    {
    }

    /**
     * @param Request $request
     */
    public static function validateAddFormRequest(Request $request)
    {
        $fieldsDetails = Article::getFieldsDetails();
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
        $fieldsDetails = Article::getFieldsDetails();
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
}