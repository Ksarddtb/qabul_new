<?php

namespace App\Services\Hemis;

use App\Models\Speciality;
use Exception;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;
use Illuminate\Support\Facades\DB;
use Throwable;

class SpecialityServices implements HemisInterfaces
{
    protected Client $client;
    protected array $headers;
    public function __construct()
    {
        $this->client = new Client();
        $this->headers = [
            'Authorization' => 'Bearer '.config('hemis.api_key'),
            'Accept' => 'application/json',
        ];
    }

    public function get()
    {
        // TODO: Implement get() method.
    }

    /**
     * @param $result
     * @throws Throwable
     */
    public function store($result): void
    {
        foreach (collect($result->data->items)->sortBy('id') as $item) {
            DB::beginTransaction();
            try {
                Speciality::firstOrCreate([
                    'id' => $item->id,
                ], [
                    'code' => $item->code,
                    'name' => $item->name,
                    'department_id' => $item->department->id,
                ]);
                DB::commit();
            } catch (Exception $exception) {
                DB::rollBack();
                throw $exception;
            }
        }
    }

    /**
     * @throws \Throwable
     */
    public function all():bool
    {

        $request = new Request('GET', config('hemis.host').'data/specialty-list?limit='.config('hemis.limit'), $this->headers);
        $res = $this->client->sendAsync($request)->wait();
        $res = $res->getBody();
        $result = json_decode($res);
        if ($result->success === true) {
            $this->store($result);
            return true;
        }
        return false;
    }
}
