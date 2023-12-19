<?php

namespace App\Controllers;
use CodeIgniter\RESTful\ResourceController;
use App\Models\Booking;
use App\Models\BookingAuth;

class BookingAPI extends ResourceController
{
    public function create($seg1=null, $seg2=null)
    {
        $model = model(Booking::class);
        $authModel = model(BookingAuth::class);
        $checksum = $authModel->getDataAuthentication($seg1, $seg2);
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


    public function pay($pnr, $seg1=null, $seg2=null)
    {
        $model = model(Booking::class);
        $authModel = model(BookingAuth::class);
        $checksum = $authModel->getDataAuthentication($seg1, $seg2);
        if ($checksum == 0){
            return("Invalid authentication!");
        } else {
            $result = $model->payBooking($pnr);
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

    public function checkinForm()
    {
        return view('checkin_form');
    }

    public function checkinResult()
    {
        $model = model(Booking::class);
        $pnr = $this->request->getVar('pnr');
        $last_name = $this->request->getVar('last_name');
        $result = $model->getCheckin($pnr, $last_name);
        if ($result) {
            return view('checkin_result', ['booking' => $result]);       
        } else {
            echo "No booking information available.";           
        }
    }
}
