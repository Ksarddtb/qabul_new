<?php

namespace App\Services\Hemis;

use App\Models\Department;
use Exception;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;
use Illuminate\Support\Facades\DB;
use Throwable;

class DepartmentServices implements HemisInterfaces
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
                Department::updateOrCreate([
                    'id' => $item->id,
                ],[
                    'parent_id' => $item->parent,
                    'name' => $item->name,
                    'code' => $item->code,
                ]);
                DB::commit();
            } catch (Exception $exception) {
                DB::rollBack();
                throw $exception;
            }
        }
    }

    /**
     * @return bool
     * @throws Exception|Throwable
     */
    public function all(): bool
    {
        $request = new Request('GET', config('hemis.host').'data/department-list?limit='.config('hemis.limit'), $this->headers);
        $res = $this->client->sendAsync($request)->wait();
        $res=$res->getBody();
        $result=json_decode($res);
        if($result->success===true) {
            $this->store($result);
            return true;
        }
        return false;
    }
}
