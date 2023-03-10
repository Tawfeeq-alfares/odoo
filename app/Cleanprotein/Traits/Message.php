<?php

namespace Cleanprotein\Traits;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

trait Message
{

   /**
   * return localization data from DB
   *
   * @param \Illuminate\Http\Request $request
   * @param \Closure(\Illuminate\Http\Request): 
   * @return array|mixed
   */
    public function messageLang(Request $request)
    {

        if (!empty($request->header('Accept-Language'))) {
            if ($request->header('Accept-Language') == 'ar') {
                return 'ar';
            }
        }
        return 'en';
    }

    public function storeMessage($request)
    {

        if (self::messageLang($request) == 'en') {
            return 'Data has been added successfully';
        } else {
            return 'تم إضافة البيانات بنجاح';
        }

    }
    // addMessage

    public function deleteMessage($request)
    {

        if (self::messageLang($request) == 'en') {
            return 'Data has been deleted successfully';
        } else {
            return 'تم حذف البيانات بنجاح';
        }

    }
    // deleteMessage

}
