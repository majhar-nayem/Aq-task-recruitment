<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePacketDataRequest;
use App\Models\PacketData;
use App\Models\PacketT2Data;
use App\Services\GetFormattedPacketData;
use App\Services\GetFormattedT2PacketData;

class PacketDataController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return PacketData::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePacketDataRequest $request, GetFormattedPacketData $formattedPacketData)
    {
        try {
            $formatted_data = $formattedPacketData->handle($request->packet);
            PacketData::query()->insert($formatted_data);
            return response()->json(['message' => "Packet Data has been saved Successfully!"]);
        } catch (\Exception $exception) {
            return response()->json([
                'error' => "Failed To Save Data",
                'message' => $exception->getMessage()
            ], 500);
        }
    }

    public function storeT2PacketData(StorePacketDataRequest $request, GetFormattedT2PacketData $packetData)
    {
        try {
            $formatted_data = $packetData->handle($request->packet);
            PacketT2Data::query()->insert($formatted_data);
            return response()->json(['message' => "Packet Data has been saved Successfully!"]);
        } catch (\Exception $exception) {
            return response()->json([
                'error' => "Failed To Save Data",
                'message' => $exception->getMessage()
            ], 500);
        }
    }

    public function packetT2Data()
    {
        return PacketT2Data::all();
    }
}
