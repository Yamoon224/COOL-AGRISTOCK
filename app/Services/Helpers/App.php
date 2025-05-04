<?php

use App\Models\Tariff;
    use App\Models\Activity;
    use Illuminate\Support\Facades\Auth;


    /**
     * @param string : user's name | app_name default value
     * @return string : url of resource from https://ui-avatars.com
     */
    if (!function_exists('makeActivity')) 
    {     
        function makeActivity($isLogin = true) 
        {
            if ($isLogin) {
                Activity::create(['user_id' => Auth::id(), 'login_at' => now()]);
            } else {
                Activity::where('user_id', Auth::id())
                    ->whereNull('logout_at')
                    ->update(['logout_at' => now()]);
            }
        }
    }  

    if (!function_exists('isGroupAuthorized')) 
    {     
        function isGroupAuthorized(array $groupIds) 
        {
            return in_array(Auth::user()->group_id, $groupIds);
        }
    }  

    /**
     * @param string : value to format
     * @param string : currency 
     * @param string : sepator
     * @return string : amount - sep - currency 
     */
    if (!function_exists('moneyFormat')) 
    {
        function moneyFormat(string $amount, string $currency = "Fcfa", string $sep = " ") 
        {
            $number = number_format($amount, 0, ',', $sep);
            return $number. " " .$currency;
        }   
    }

    /**
     * @param string : value to format
     * @param string : currency 
     * @param string : sepator
     * @return string : amount - sep - currency 
     */
    if (!function_exists('getBillingAmount')) 
    {
        function getBillingAmount($qty, $duration, $storage_id) 
        {
            $tariff = Tariff::where('storage_id', $storage_id)
                ->where('min_qty', '<', $qty)
                ->where('max_qty', '>', $qty)
                ->first();
            return $duration * $tariff->price;
        }
    }

    /**
     * @param string : value to format
     * @param string : currency 
     * @param string : sepator
     * @return string : amount - sep - currency 
     */
    if (!function_exists('switchKgToTonne')) 
    {
        function switchKgToTonne($kg, $unit = 'kg') 
        {
            return $unit == 'kg' ? ($kg / 1000 ). " t" : ($kg * 1000). " kg";
        }
    }
   