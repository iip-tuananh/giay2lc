<?php

namespace App\Http\Controllers\Admin;

use App\ExcelExports\OrderExcel;
use App\ExcelImports\OrderImport;
use App\Model\Admin\Order;
use Illuminate\Http\Request;
use App\Model\Admin\Order as ThisModel;
use Illuminate\Support\Facades\Response;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Validator;
use \stdClass;

use Rap2hpoutre\FastExcel\FastExcel;
use PDF;
use App\Http\Controllers\Controller;
use \Carbon\Carbon;
use Illuminate\Validation\Rule;
use App\Helpers\FileHelper;
use App\Model\Admin\OrderRevenueDetail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Model\Common\Customer;
use Maatwebsite\Excel\Facades\Excel;

class OrderController extends Controller
{
    protected $view = 'admin.orders';
    protected $route = 'orders';

    public function index()
    {
        return view($this->view . '.index');
    }

    // Hàm lấy data cho bảng list
    public function searchData(Request $request)
    {
        $objects = ThisModel::searchByFilter($request);
        return Datatables::of($objects)
            ->addColumn('total_price', function ($object) {
                return number_format($object->total_price);
            })
            ->editColumn('code', function ($object) {
                return '<a href = "'.route('orders.show', $object->id).'" title = "Xem chi tiết">' . $object->code . '</a>';
            })
            ->addColumn('customer', function ($object) {
                $hasAccount = !empty($object->customer);

                $name  = optional($object->customer)->name  ?: ($object->customer_name ?: 'Khách lẻ');
                $email = optional($object->customer)->email ?: ($object->customer_email ?? null);
                $phone = optional($object->customer)->phone ?: ($object->customer_phone ?? null);

                // Avatar chữ cái đầu
                $avatar = mb_strtoupper(mb_substr(trim($name), 0, 1, 'UTF-8'), 'UTF-8');

                $html  = '<div class="d-flex align-items-center">';
                $html .= '  <div class="mr-2" style="width:28px;height:28px;border-radius:50%;background:#eef2f7;display:flex;align-items:center;justify-content:center;font-weight:700;">'.e($avatar).'</div>';
                $html .= '  <div>';
                $html .= '    <div class="font-weight-bold">'.e($name);
                if (!$hasAccount) {
                    $html .= ' <span class="badge badge-secondary" title="Đơn khách lẻ">Khách lẻ</span>';
                }
                $html .= '    </div>';
                if ($email) {
                    $html .= '    <div class="small"><a href="mailto:'.e($email).'">'.e($email).'</a></div>';
                }
                if ($phone) {
                    $html .= '    <div class="small text-muted">'.e($phone).'</div>';
                }
                $html .= '  </div>';
                $html .= '</div>';

                return $html;
            })
            ->editColumn('payment_method', function ($object) {
                    $val = is_numeric($object->payment_method)
                        ? (int)$object->payment_method
                        : strtolower((string)$object->payment_method);

                    $map = [
                        1      => ['badge' => 'success',  'icon' => 'fa-truck',            'label' => 'Thanh toán khi nhận hàng'],
                        2      => ['badge' => 'info',     'icon' => 'fa-qrcode',           'label' => 'Thanh toán QR code'],
                        'cod'  => ['badge' => 'success',  'icon' => 'fa-truck',            'label' => 'Thanh toán khi nhận hàng'],
                        'qr'   => ['badge' => 'info',     'icon' => 'fa-qrcode',           'label' => 'Thanh toán QR code'],
                        // thêm trường hợp khác nếu có:
                        'bank' => ['badge' => 'primary',  'icon' => 'fa-university',       'label' => 'Chuyển khoản ngân hàng'],
                    ];
                    $m = $map[$val] ?? ['badge' => 'secondary', 'icon' => 'fa-question-circle', 'label' => 'Không rõ'];

                    return '<span class="badge badge-'.$m['badge'].'">'
                        .    '<i class="fa '.$m['icon'].' mr-1"></i>'.e($m['label'])
                        . '</span>';
                })
            ->editColumn('type', function ($object) {
                return $object->type == 0 ? 'Đơn hàng thường' : 'Đơn hàng affiliate';
            })
            ->editColumn('code_client', function ($object) {
                return '<a href = "javascript:void(0)" title = "Xem chi tiết" class="show-order-client">' . $object->code . '</a>';
            })
            ->editColumn('created_at', function ($object) {
                return $object->type == 0 ? formatDate($object->created_at) : formatDate($object->aff_order_at);
            })
            ->addColumn('action', function ($object) {
                $result = '<div class="btn-group btn-action">
                <button class="btn btn-info btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class = "fa fa-cog"></i>
                </button>
                <div class="dropdown-menu">';
                $result = $result . ' <a href="" title="đổi trạng thái" class="dropdown-item update-status"><i class="fa fa-angle-right"></i>Đổi trạng thái</a>';
                if ($object->type == 0) {
                    $result = $result . ' <a href="'.route('orders.show', $object->id).'" title="xem chi tiết" class="dropdown-item"><i class="fa fa-angle-right"></i>Xem chi tiết</a>';
                }
                $result = $result . '</div></div>';
                return $result;
            })
            ->addColumn('action_client', function ($object) {
                $result = '<div class="btn-group btn-action">
                <button class="btn btn-info btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class = "fa fa-cog"></i>
                </button>
                <div class="dropdown-menu">';
                if ($object->type == 0) {
                    $result = $result . ' <a href="" title="Hủy đơn hàng" class="dropdown-item update-status"><i class="fa fa-angle-right"></i>Hủy đơn hàng</a>';
                    $result = $result . ' <a href="'.route('orders.show', $object->id).'" title="xem chi tiết" class="dropdown-item"><i class="fa fa-angle-right"></i>Xem chi tiết</a>';
                }
                $result = $result . '</div></div>';
                return $result;
            })
            ->addIndexColumn()
            ->rawColumns(['code', 'action', 'action_client', 'code_client', 'customer', 'payment_method'])
            ->make(true);
    }

    public function show(Request $request, $id) {
        $order = Order::query()->with(['details.product', 'customer'])->find($id);
        $order->payment_method_name = @Order::PAYMENT_METHODS[$order->payment_method] ?? 'Thanh toán khi nhận hàng';
        $customer = $order->customer;

        if($customer){
            $customerInfo['name'] = $customer->name;
            $customerInfo['email'] = $customer->email;
        } else {
            $customerInfo['name'] = $order->customer_name;
            $customerInfo['email'] = $order->customer_email;
            $customerInfo['phone'] = $order->customer_phone;
            $customerInfo['address'] = $order->customer_address;
        }

        $order->customerInfo = $customerInfo;

        return view($this->view . '.show', compact('order'));
    }

    public function updateStatus(Request $request)
    {
        $order = Order::query()->find($request->order_id);
        $config = \App\Model\Admin\Config::where('id',1)->select('revenue_percent_1')->first();
        $order->status = $request->status;
        $order->save();
        // TODO: Tính điểm thưởng khi admin duyệt đơn hàng
        $current_user = User::query()->where('email', $order->customer_email)->where('status', 1)->where('type', 10)->first();
        if ($current_user) {
            $new_point = ($order->total_after_discount * $config->revenue_percent_1 / 100) / 1000;
            $current_user->point += floor($new_point);
            $current_user->save();
        }
        // $order_revenue_details = OrderRevenueDetail::query()->where('order_id', $order->id)->get();
        // foreach ($order_revenue_details as $order_revenue_detail) {
        //     if ($order->status == Order::MOI) {
        //         $order_revenue_detail->status = OrderRevenueDetail::STATUS_PENDING;
        //     } else if ($order->status == Order::DUYET) {
        //         $order_revenue_detail->status = OrderRevenueDetail::STATUS_PAID;
        //     } else if ($order->status == Order::THANH_CONG) {
        //         $order_revenue_detail->status = OrderRevenueDetail::STATUS_WAIT_QUYET_TOAN;
        //     } else if ($order->status == Order::HUY) {
        //         $order_revenue_detail->status = OrderRevenueDetail::STATUS_CANCEL;
        //     }
        //     $order_revenue_detail->save();
        // }

        return Response::json(['success' => true, 'message' => 'cập nhật trạng thái đơn hàng thành công']);
    }

    public function exportList(Request $request) {
        $data = Order::searchByFilter($request)->where('type', 0)->values();
        $result['CHI_TIET'] = Order::getTableList($data);
        $result['COLSPAN'] = 8;
        $result['FROM_DATE'] = $request->startDate ? Carbon::parse($request->startDate)->format('d/m/Y') : '';
        $result['TO_DATE'] = $request->endDate ? Carbon::parse($request->endDate)->format('d/m/Y') : '';

        return (new OrderExcel())
            ->forData($result)
            ->download('danh_sach_don_hang.xlsx');
    }

    // Import Excel
	public function importExcel(Request $request) {
		$validate = Validator::make(
			$request->all(),
			[
                'file' => 'required|file|mimes:xlsx,xls,csv,txt',
			],
			[
				'file.required' => 'Không được để trống',
				'file.file' => 'Không hợp lệ',
				'file.mimes' => 'Không hợp lệ',
			]
		);

		$json = new stdClass();

        if ($validate->fails()) {
            $json->success = false;
            $json->errors = $validate->errors();
            $json->message = "Import thất bại!";
            return Response::json($json);
        }
        DB::beginTransaction();
        try {
			$import = new OrderImport;
			Excel::import($import, $request->file('file'));

            DB::commit();

            $json->success = true;
            $json->details = [
                'import' => $import->getImportCount(),
                'skip' => $import->getSkipCount(),
                'invalid_rows' => $import->getInvalidRow(),
            ];
            $json->message = "Import thành công!";
            return Response::json($json);
        } catch (Exception $e) {
            DB::rollBack();
            $json->success = false;
            $json->message = "Đã có lỗi xảy ra!";
            return Response::json($json);
        }
	}
}
