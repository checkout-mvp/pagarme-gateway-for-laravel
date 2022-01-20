<?php
namespace MartinsHumberto\PagarmeGateway\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use MartinsHumberto\PagarmeGateway\Models\PagarmeNotification;

class PagarmeNotificationController extends Controller
{
    public function index(Request $request)
    {
        $query = PagarmeNotification::query();

        $query->when(
            $request->page, function ($query) use ($request) {
                $offSet = ($request->page * ($request->limit ? : config('pagarmegateway.limit_per_page', 5))) - ( $request->limit ? : config('pagarmegateway.limit_per_page', 5));
                return $query->offSet($offSet);
            }
        );

        $query->orderBy('id', 'desc');

        $data = $query->limit($request->limit ?: config('pagarmegateway.limit_per_page', 5))->get();

        return response()->json($data);
    }

    public function store(Request $request)
    {
        $request->validate(
            [
              'external_order'    => 'required',
              'status'            => 'required',
              'status'            => 'required',
              'event'             => 'required',
              'account.name'      => 'required',
              'data'              => 'required',
            ]
        );

        $request->merge(['status' => $request->status ?: 'NOT_FOUND']);

        PagarmeNotification::create(
            [
              'external_order'    => $request->only('external_order'),
              'status'            => $request->only('status'),
              'event'             => $request->only('event'),
              'store_name'        => $request->only('account.name'),
              'data'              => $request->data,
            ]
        );

        return response()->json(null, 204);
    }

    public function show($id)
    {
        $data = PagarmeNotification::findOrFail($id);

        return response()->json($data);
    }

    public function update(Request $request, $id)
    {
        $request->validate(
            [
            'external_order'    => 'nullable',
            'status'            => 'nullable',
            'status'            => 'nullable',
            'event'             => 'nullable',
            'account.name'      => 'nullable',
            'data'              => 'nullable',
            ]
        );

        PagarmeNotification::findOrFail($id)->update(
            array_filter(
                [
                'external_order'    => $request->only('external_order'),
                'status'            => $request->only('status'),
                'event'             => $request->only('event'),
                'store_name'        => $request->only('account.name'),
                'data'              => $request->data,
                ]
            )
        );

        return response()->json(null, 204);
    }

    public function delete($id)
    {
        PagarmeNotification::findOrFail($id);

        return response()->json(null, 204);
    }
}
