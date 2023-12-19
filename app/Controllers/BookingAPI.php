<?php

namespace App\Controllers;
use CodeIgniter\RESTful\ResourceController;
use App\Models\Booking;
use App\Models\BookingAuth;
use App\Models\Flight;
use App\Models\Airport;

class BookingAPI extends ResourceController
{
    private function getData($url, $data = [])
    {
        $url = rtrim($url, '?'); // Remove trailing question mark if it exists
        $url .= '?' . http_build_query($data);

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        $output = curl_exec($ch);

        curl_close($ch);

        return $output;
    }

    public function create()
    {
        $model = model(Booking::class);
        // $seg1 = $this->request->getVar('seg1');
        // $seg2 = $this->request->getVar('seg2');
        // $authModel = model(BookingAuth::class);
        // var_dump($seg1, $seg2);
        // $checksum = $authModel->getDataAuthentication($seg1, $seg2);
        // return $checksum;
        $checksum = 1;
        if ($checksum == 0){
            return("Invalid authentication!");
        } else {
            $flight_id = $this->request->getVar('flight_id');
            $pnr = $this->request->getVar('pnr');

            $result = $model->createBooking($flight_id, $pnr);
            if ($result) {
                $data = [
                    'message' => 'success',
                    'booking' => $result
                ];
            } else {
                $data = [
                    'message' => 'failed',
                    'booking' => []
                ];
            }
            
            return $this->respond($data);
        }
    }

    // public function testAuth()
    // {
    //     $seg1 = $this->request->getVar('seg1');
    //     $seg2 = $this->request->getVar('seg2');
    //     $authModel = model(BookingAuth::class);
    //     $checksum = 0;
    //     $checksum = $authModel->getDataAuthentication($seg1, $seg2);
    //     var_dump($checksum);
    // }

    // public function pay($pnr, $seg1=null, $seg2=null)
    // {
    //     $model = model(Booking::class);
    //     $authModel = model(BookingAuth::class);
    //     $checksum = $authModel->getDataAuthentication($seg1, $seg2);
    //     if ($checksum == 0){
    //         return("Invalid authentication!");
    //     } else {
    //         $result = $model->payBooking($pnr);
    //         if ($result) {
    //             $data = [
    //                 'message' => 'success',
    //                 'booking' => $result
    //             ];
    //         } else {
    //             $data = [
    //                 'message' => 'failed',
    //                 'booking' => []
    //             ];
    //         }
    //         return $this->respond($data);
    //     }
    // }

    public function checkinForm()
    {
        return view('checkin_form');
    }

    public function checkinResult()
    {
        $model = model(Booking::class);
        $flightModel = model(Flight::class);
        $airportModel = model(Airport::class);
        $getData = [ 
            'booking_id' => $this->request->getVar('booking_id'),
            'last_name' => $this->request->getVar('last_name')
        ];
        $response = $this->getData('localhost:3000/pnrAPI', $getData);
        $response = json_decode($response);
        $message = $response->message;
        $status = $response->status[0]->status;
        if ($message === 'success' && $status === 'Success') {    
            $pnr = $response->data[0]->id;
            $resultDump = $model->payBooking($pnr);
            $fid = $response->data[0]->flight_id;
            $result = $model->getCheckin($pnr);
            $flight_result = $flightModel->getFlight($fid);
            // print_r($flight_result->origin_id);
            $origin = $airportModel->getSpecificAirport($flight_result->origin_id);
            $destination = $airportModel->getSpecificAirport($flight_result->destination_id);
            // Booking ID, Honorifics, First Name, Last Name, Flight ID, Departure Airport, Arrival Airport, Departure Date, Seat Number
            $checkin_result = [
                'booking_id' => $response->data[0]->booking_id,
                'honorifics' => $response->data[0]->honorifics,
                'first_name' => $response->data[0]->first_name,
                'last_name' => $response->data[0]->last_name,
                'flight_id' => $response->data[0]->flight_id,
                'departure_airport' => $origin[0]->name,
                'arrival_airport' => $destination[0]->name,
                'departure_date' => $flight_result->schedule,
                'seat_num' => $result->seat_num
            ];
            return view('checkin_result', ['checkin_result' => $checkin_result]);
        } else {
            return view('checkin_result', ['checkin_result' => null]);
        }   
    }
}
