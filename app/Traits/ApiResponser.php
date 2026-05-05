<?php

namespace App\Traits;

use Carbon\Carbon;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

/*
|--------------------------------------------------------------------------
| Api Responser Trait
|--------------------------------------------------------------------------
|
| This trait will be used for any response we sent to clients.
|
*/

trait ApiResponser
{
	/**
	 * Return a success JSON response.
	 *
	 * @param  array|string  $data
	 * @param  string  $message
	 * @param  int|null  $code
	 * @return \Illuminate\Http\JsonResponse
	 */
	protected function success($data, string $message = null, int $code = 200)
	{
		return response()->json([
			'status' => 'Success',
			'message' => $message,
			'data' => $data
		], $code);
	}

	/**
	 * Return a success JSON response with Paginated Data.
	 *
	 * @param  LengthAwarePaginator  $datas
	 * @param  string  $message
	 * @param  int|null  $code
	 * @return \Illuminate\Http\JsonResponse
	 */
	protected function datasSuccess(LengthAwarePaginator $datas, int $code = 200, string $message = null)
	{
		$nextPage = null;
		$prevPage = null;
		if ($datas->currentPage() != $datas->lastPage()) {
			$nextPage = $datas->currentPage() + 1;
		}
		if ($datas->currentPage() != 1) {
			$prevPage = $datas->currentPage() - 1;
		}
		return response()->json([
			'page' => [
				'total' => $datas->total(),
				'per_page' => $datas->perPage(),
				'current_page' => $datas->currentPage(),
				'last_page' => $datas->lastPage(),
				'next_page' => $nextPage,
				'prev_page' => $prevPage,
			],
			'data' => $datas->items(),
			'status' => 'Success',
			'message' => $message,
		], $code);
	}

	/**
	 * Return an error JSON response.
	 *
	 * @param  string  $message
	 * @param  int  $code
	 * @param  array|string|null  $data
	 * @return \Illuminate\Http\JsonResponse
	 */
	protected function error(string $message = null, int $code, $data = null)
	{
		return response()->json([
			'status' => 'Error',
			'message' => $message,
			'data' => $data
		], $code);
	}
}
