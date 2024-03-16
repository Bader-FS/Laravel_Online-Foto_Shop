<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use ErrorException;
use App\Models\Photo;

class PaymentController extends Controller
{
    public function index(Photo $photo){
        session()->put('order',[
            'photo_id' => $photo->id,
            'qty' => 1,
            'total' => $photo->price 
        ]);

        return view('payments.index')->with([
            'photo' => $photo
        ]);
    }

    public function pay(){

        \Stripe\Stripe::setApiKey('sk_test_51Oo1plJ3MIokhj73moFma8hrcEJJvsbDkw5jSq9sEsn2BeouHM7jEH99sOmqnKjVQRiAoWB9oGnTI2ic4Bnt6IgZ00sqJNTaXd');

        try {
            $jsonStr = file_get_contents('php://input');
            $jsonObj = json_decode($jsonStr);

            $paymentIntent = \Stripe\PaymentIntent::create([
                'amount' => $this->calculateOrderAmount($jsonObj->items),
                'currency' => 'usd',
                'description' => 'Laravel Images Stock',
                'setup_future_usage' => 'on_session',
                'metadata' => [
                    'user_id' => auth()->user()->id
                ]
            ]);

            $output = [
                'clientSecret' => $paymentIntent->client_secret
            ];

            return response()->json($output);

        } catch (ErrorException $e) {
            return response()->json([
                'error' => $e->getMessage()
            ]);
        }
    }

    public function calculateOrderAmount(array $items)
    {
        foreach ($items as $item) {
            //to get Amount by Dollar we multiple in 100:
            return $item->amount * 100;
        }
    }

    public function success()
    {
        $order = session()->get('order');
        auth()->user()->orders()->create($order);
        session()->remove('order');
        return redirect()->route('photos.show', $order['photo_id'])->with([
            'success' => 'Payment placed successfully'
        ]);
    }
}
