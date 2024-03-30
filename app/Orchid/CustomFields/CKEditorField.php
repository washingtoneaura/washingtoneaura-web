<?php

namespace App\Orchid\CustomFields;

use Orchid\Screen\Field;

class CKEditorField extends Field
{
    /**
     * @var string
     */
    public $view = 'custom-fields.ckeditor';

    /**
     * Default attributes value.
     *
     * @var array
     */
    public $attributes = [
        'class' => 'form-control',
    ];

    /**
     * Attributes available for a particular tag.
     *
     * @var array
     */
    public $inlineAttributes = [
        'form',
        'placeholder',
        'name',
    ];

    /**
     * @param string|null $name
     *
     * @return Field|CKEditorField
     */
    public static function make(string $name = null): Field
    {
        return (new static())->name($name);
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        $name = $this->get('name');
        $value = old($name, $this->get('value'));

        return view($this->view, [
            'attributes' => $this->attributes,
            'name' => $name,
            'value' => $value,
            // Add any additional data you need to pass to the view here
        ]);
    }
}