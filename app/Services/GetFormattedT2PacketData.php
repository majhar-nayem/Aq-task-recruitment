<?php

namespace App\Services;

use Carbon\Carbon;

class GetFormattedT2PacketData
{
    public function handle(string $data)
    {
        $base_arr = explode('|', $data);
        $result = [];

        for ($i = 9; $i < count($base_arr); $i++) {
            $sensor_data_arr = explode('-', $base_arr[$i]);

            foreach ($sensor_data_arr as $item) {
                [$sensor_type, $value] = explode('_', $item);
                $result[] = [
                    'packet_id' => $base_arr[0] ?? null,
                    'device_id' => $base_arr[1] ?? null,
                    'sensometer_id' => $base_arr[2] ?? null,
                    'device_timestamp' => Carbon::createFromTimestamp($base_arr[3] ?? null)->toDateTimeString(),
                    'data_count' => $base_arr[4] ?? null,
                    'meter_param_id' => $base_arr[5] ?? null,
                    'meter_id' => $base_arr[6] ?? null,
                    'phase' => $base_arr[7] ?? null,
                    'sensor_type' => $sensor_type,
                    'type' => $this->sensorTypeName($sensor_type),
                    'value' => $value,
                    'created_at' => now(),
                    'updated_at' => now()
                ];
            }
        }

        return $result;
    }

    private function sensorTypeName($sensor_type_key)
    {
        switch ($sensor_type_key) {
            case strtolower($sensor_type_key[0]) == 'v' :
                return 'voltage';
            case strtolower($sensor_type_key[0]) == 'a' :
                return 'amp';
            case strtolower($sensor_type_key[0]) == 'w':
                return 'watt';
            case strtolower($sensor_type_key[0]) == 'e':
                return 'khr';
            default :
                return null;
        }
    }
}
