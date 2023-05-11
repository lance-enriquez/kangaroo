<?php

namespace App\Http\Controllers;

use App\Models\Kangaroo;
use App\Services\KangarooService;
use Illuminate\Http\JsonResponse;
use App\Http\Requests\KangarooRequest;
use Illuminate\Support\Facades\Validator;

/**
 * HomeController class.
 *
 * @package App\Http\Controllers
 * @author Lorenzo Enriquez
 * @since 2023.05.09
 */
class HomeController
{
    /**
     * KangarooService class object.
     *
     * @var KangarooService
     */
    private KangarooService $kangarooService;

    /**
     * HomeController constructor.
     *
     * @param KangarooService $kangarooService
     */
    public function __construct(KangarooService $kangarooService)
    {
        $this->kangarooService = $kangarooService;
    }

    /**
     * Returns page for index.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function showPage(): \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('home');
    }

    /**
     * Returns all data in a JSON response.
     *
     * @return JsonResponse
     */
    public function getKangaroos(): JsonResponse
    {
        return response()->json($this->kangarooService->getKangaroos());
    }

    /**
     * Saves data and returns a JSON response.
     *
     * @param KangarooRequest $request
     * @return JsonResponse
     */
    public function saveKangaroos(KangarooRequest $request): JsonResponse
    {
        $data = request()->json()->all();

        $validation = Validator::make($data, $request->rules(), $request->messages());
        $errorMessages = array_merge(...array_values($validation->errors()->messages()));

        if (count($errorMessages) > 0) {
            return response()->json($errorMessages, 403);
        }

        $kangaroo = new Kangaroo($data);
        $status = $this->kangarooService->saveKangaroos($kangaroo);

        $isSuccess = ($status === true);
        $code = ($isSuccess === true) ? 200 : 403;
        $message = ($isSuccess === true) ? [$status] : $status;

        return response()->json($message, $code);
    }
}
