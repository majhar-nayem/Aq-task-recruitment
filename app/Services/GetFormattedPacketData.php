<?php

namespace App\Services;

use Carbon\Carbon;

class GetFormattedPacketData
{
    public function handle(string $data)
    {
        $str = explode('|', $data);

        $result = [];
        for ($i = 0; $i < $str[4]; $i++) {
            $sensor_data_arr = explode('-', $str[$i + 5]);
            $result[] = [
                'packet_id' => $str[0] ?? null,
                'device_id' => $str[1] ?? null,
                'sensometer_id' => $str[2] ?? null,
                'device_timestamp' => Carbon::createFromTimestamp($str[3] ?? null)->toDateTimeString(),
                'sensor_id' => trim($sensor_data_arr[0] ?? null),
                'slave_address' => $sensor_data_arr[1] ?? null,
                'value' => $sensor_data_arr[2] ?? null,
                'created_at' => now(),
                'updated_at' => now()
            ];
        }
        return $result;
    }
}
