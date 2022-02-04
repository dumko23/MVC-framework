<?php

namespace App\core\form;

use App\core\Model;

class Field
{
    public const TYPE_TEXT = 'text';
    public const TYPE_EMAIL = 'email';
    public const TYPE_PASSWORD = 'password';
    public const TYPE_CONFIRM_PASSWORD = 'password';


    public Model $model;
    public string $attribute;
    public string $type;

    public function __construct(Model $model, string $attribute)
    {
        $this->type = self::TYPE_TEXT;
        $this->model = $model;
        $this->attribute = $attribute;
    }

    public function __toString(): string
    {
        return sprintf('
                <div class="mb-3">
                    <label class="form-label">%s</label>
                    <input type="%s" name="%s" value="%s" class="form-control%s">
                    <div class="invalid-feedback">
                    %s
                    </div>
                </div>
            ',
            $this->model->getLabel($this->attribute),
            $this->type,
            $this->attribute,
            $this->model->{$this->attribute},
            $this->model->hasError($this->attribute) ? ' is-invalid' : '',
            $this->model->getFirstError($this->attribute)
        );
    }

    public function typeField($attribute)
    {
        if ($attribute === self::TYPE_PASSWORD || $attribute === 'confirmPassword') {
            $this->type = self::TYPE_PASSWORD;
        } elseif ($attribute === self::TYPE_EMAIL) {
            $this->type = self::TYPE_EMAIL;
        }
        return $this;
    }
}