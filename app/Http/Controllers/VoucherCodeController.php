<?php

namespace App\Http\Controllers;

use App\Recipient;
use App\SpecialOffer;
use App\VoucherCode;
use Illuminate\Http\Request;

class VoucherCodeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function createVoucherCode(Request $request)
    {

        /* TODO: For a Given Special Offer and an expiration date generate for each Recipient a Voucher Code
        */
        try{

            $offer_id = $request->offer_id;
            $expiration_date = $request->expiration_date;

            $special_offer = SpecialOffer::find($offer_id);

            dd($special_offer);

            $code = new VoucherCode;
            $code->generateRandomCode();
            $code->specialOffer()->save($special_offer);
            $code->expiration_date = $expiration_date;

            $code->save();

            return response()->json($code, 200);
        } catch (\Exception $e) {
            return response()->json($e->getMessage(), 500);
        }

    }

    public function validateVoucherCode($voucher_code, $email)
    {
        /* TODO: Validates the Voucher Code. In Case it's valid, return the Percentage Discount and set the date of Usage */
    }

    public function getVoucherCodesByEmail($email)
    {
        /* TODO: Return all his valid Voucher Codes with the Name of Special Offer */
    }
}
