<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SaveArtWorkRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'user_id'           => 'required',
            'title'             => 'required|max:255',
            'tags'              => 'required',
            'description'       => 'required',
            'art_photo'         => 'required|file|max:5000',
            'artwork_media_id'  => 'required',
            'is_mature_content' => 'required',
            'is_public'         => 'required',
        ];
    }

    public function messages()
    {
        return [
            'user_id.required' => 'User ID is missing.',
            'title.required' => 'Title is required.',
            'tags.required' => 'Please add some tags.',
            'description.required' => 'Description is required.',
            'art_photo.required' => 'Art Image is requried.',
            'artwork_media_id.required' => 'artwork media id is missing.',
            'is_mature_content.required' => 'Please choose your content is mature or not.',
            'is_public.required' => 'is_public parameter\' is value is missing.'
        ];
    }
}
