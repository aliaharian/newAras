<?php

namespace App\Http\Controllers;

use App\invoice;
use App\invoice_line_item;
use App\User;
use Illuminate\Http\Request;
use Mail;

class invoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $invoices=invoice::orderBy('id','DESC')->simplePaginate(10);
        return view('admin.invoices.index',compact('invoices'));
    }


    public function show($id)
    {
        $invoice=invoice::find($id);
        $invoice_line_items=invoice_line_item::where('invoice_id',$id)->get();
        return view('admin.invoices.show',compact('invoice','invoice_line_items'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $invoice=invoice::find($id);
        $invoice->status=$request->toggle_option;
        $invoice->arrival_date=$request->arrival_date;
        $invoice->save();


        $user_email=User::find(invoice::find($id)->user_id)->email;
        $user_name=User::find(invoice::find($id)->user_id)->name.' '.User::find(invoice::find($id)->user_id)->last_name;

        $data = array('text' => '
<p style="text-align: center">با تشکر از حسن انتخاب شما</p>
<p style="text-align: center">وضعیت سفارش شما به کد '
            .invoice::find($id)->invoice_number.'
و کد پیگیری
'.invoice::find($id)->tracking_code.'
به حالت
<b style="color: red;font-weight: 800">
'.$request->toggle_option.'
</b>
تغییر یافت
</p>
<p style="text-align: center">
تاریخ و زمان تحویل مرسوله به شما:
<b style="color: red;font-weight: 800">
'.$request->arrival_date.'
</b>
</p>

',
            'title'=>'وضعیت سفارش شما تغییر یافت',
            'subtitle'=>'در صورتی که مورد رخ داده بر خلاف چیزی است که با شما همانگ شده، از طریق شماره تماس های موجود در بخش تما با ما به ما اطلاع دهید. با تشکر');
//        Mail::send('blank-mail', $data, function($message) use($user_email,$user_name) {
//            $message->to($user_email, $user_name)->subject
//            ('تغییر وضعیت سفارش محصول از فروشگاه اینترنتی حوله ارس');
//            $message->from('invoice@arastowel.com','حوله ارس');
//        });

        return redirect('/aras-admin/invoices');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        invoice::find($id)->delete();
//        $articles=DB::table('articles')->get();
        return redirect('/aras-admin/invoices');
    }

    public function type($type)
    {
            $invoices = invoice::where('status', 'LIKE', $type)->simplePaginate(10);
            return view('admin.invoices.index', compact('invoices'));

    }
}

