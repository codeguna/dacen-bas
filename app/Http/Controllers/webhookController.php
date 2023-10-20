<?php

namespace App\Http\Controllers;

use App\Models\ScanLog;
use Illuminate\Http\Request;

class WebhookController extends Controller
{
    public function fingerspotHandler(Request $request)
    {
        $data = $request->all();

        $type = $data['type'];
        $cloudId = $data['cloud_id'];

        $myCloudId = 'C260503403280925';

        if ($type === 'attlog') {

            $pin = 'lpkia-' . $data['data']['pin'];
            $myPin = explode('-', $pin);
            if ($myPin[1] === "050") {
                $realPin = "1" . $myPin[1];
            } else {
                $realPin = $data['data']['pin'];
            }

            if ($cloudId !== $myCloudId) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'invalid cloud id'
                ], 400);
            }

            $attlogData = [
                'pin' => $realPin,
                'scan' => $data['data']['scan'],
                'verify' => $data['data']['verify'],
                'status_scan' => $data['data']['status_scan'],
                'ip_scan' => $request->ip() ?? '-',
            ];
            ScanLog::create($attlogData);

            return response()->json([
                'status' => 'Success',
                'data' => $attlogData
            ]);
        } else {
            return response()->json([
                'status' => 'error',
                'message' => 'attlog not found'
            ], 404);
        }
    }
}
