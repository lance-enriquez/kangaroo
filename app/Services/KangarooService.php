<?php

namespace App\Services;

use App\Models\Kangaroo;
use Illuminate\Support\Arr;
use Illuminate\Database\QueryException;

/**
 * KangarooService class.
 *
 * @package App\Services
 * @author Lorenzo Enriquez
 * @since 2023.05.09
 */
class KangarooService
{
    /**
     * Retrieves all data from database.
     *
     * @return array
     */
    public function getKangaroos(): array
    {
        return Kangaroo::all()->toArray();
    }

    /**
     * Saves data to database.
     *
     * @param Kangaroo $kangaroo
     * @return array|bool
     */
    public function saveKangaroos(Kangaroo $kangaroo): array|bool
    {
        try {
            $kangarooArray = $kangaroo->toArray();
            $pivotArray =  Arr::only($kangarooArray, [Kangaroo::UNIQUE_PIVOT_KEY]);
            Arr::pull($kangarooArray, Kangaroo::UNIQUE_PIVOT_KEY);
            Kangaroo::updateOrCreate($pivotArray, $kangarooArray);
            return true;
        } catch (QueryException $exception) {
            return [($exception->getCode() === '23000') ? 'Duplicate data.' : 'Server error!'];
        }
    }
}
