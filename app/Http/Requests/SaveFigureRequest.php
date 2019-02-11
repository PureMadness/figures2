<?php

namespace App\Http\Requests;

use App\Enums\FigureTypes;
use App\Rules\TriangleRule;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;

class SaveFigureRequest extends FormRequest
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
        $rules = [];

        switch ($this->get('type')) {
            case FigureTypes::TRIANGLE:
                $rules = [
                    'data' => ['array', 'required', new TriangleRule()],
                    'data.side1' => 'required|numeric|min:0',
                    'data.side2' => 'required|numeric|min:0',
                    'data.side3' => 'required|numeric|min:0',
                ];
                break;
            case FigureTypes::RECTANGLE:
                $rules = [
                    'data' => 'required|array',
                    'data.x1' => 'required|numeric',
                    'data.x2' => 'required|numeric',
                    'data.y1' => 'required|numeric',
                    'data.y2' => 'required|numeric',
                ];
                break;
            case FigureTypes::SQUARE:
                $rules = [
                    'data' => 'required|array',
                    'data.side' => 'required|numeric|min:0',
                ];
                break;
            case FigureTypes::CIRCLE:
                $rules = [
                    'data' => 'required|array',
                    'data.radius' => 'required|numeric|min:0',
                ];
                break;
            default:
                throw new BadRequestHttpException('Unknown type ' . $this->get('type'));
        }

        return $rules;
    }
}
