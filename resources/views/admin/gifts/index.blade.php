<!DOCTYPE html>
<html>
<head>
    <title>کد های تخفیف | حوله رزا</title>

    @include('admin.includes.headerLinks')

    <style>
        .display-block {
            display: block !important;
            margin: 0 !important;
        }
    </style>


</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">


@include('admin.includes.header')
<!-- right side column. contains the logo and sidebar -->
@include('admin.includes.aside')


<!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                کد های تخفیف
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> خانه</a></li>
                <li class="active">کد های تخفیف</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-md-4">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    @if(isset($pm))
                        <div class="alert alert-success">
                            {{$pm}}
                        </div>

                    @endif
                    <div class="box box-solid">
                        <div class="box-header with-border">
                            <h3 class="box-title">افزودن کد تخفیف</h3>

                            <div class="box-tools">
                                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                        class="fa fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="box-body no-padding">
                            <form role="form" action="{{route('gifts.store')}}" method="POST">
                                @csrf
                                <div class="box-body">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">نام کاربر</label>
                                        <select style="width: 100%" name="user_id">
                                            @foreach($users as $user)
                                                <option value="{{$user->id}}">{{$user->name}} {{$user->last_name}}
                                                    ({{$user->additionalInformation?$user->additionalInformation->phone_number:""}})
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">درصد تخفیف</label>
                                        <input type="number" class="form-control" required name="percent"
                                               placeholder="درصد تخفیف">
                                    </div>
                                </div>
                                <!-- /.box-body -->

                                <div class="box-footer">
                                    <button type="submit" class="btn btn-success" style="width: 100%">ثبت</button>
                                </div>
                            </form>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /. box -->

                    <!-- /.box -->
                </div>
                <!-- /.col -->
                <div class="col-md-8">
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">کد های تخفیف</h3>

                            <div class="box-tools pull-right">
                                <div class="has-feedback">

                                </div>
                            </div>
                            <!-- /.box-tools -->
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body no-padding">
                            <div class="mailbox-controls">
                                <!-- Check all button -->
                                <div class="pull-right">


                                </div>
                                <!-- /.btn-group -->
                                <button type="button" class="btn btn-default btn-sm"><i class="fa fa-refresh"></i>
                                </button>

                                <div class="pull-left">

                                    <!-- /.btn-group -->
                                </div>
                                <!-- /.pull-right -->
                            </div>
                            <div class="table-responsive mailbox-messages">
                                <table class="table table-hover table-striped">

                                    <thead>
                                    <tr>
                                        <th class="mailbox-star">کد تخفیف</th>
                                        <th class="mailbox-star">وضعیت</th>
                                        <th class="mailbox-name">نام کاربر</th>
                                        <th class="mailbox-name">کد سفارش</th>
                                        <th class="mailbox-subject">درصد تخفیف</th>
                                        <th class="mailbox-subject">حذف</th>
                                    </tr>
                                    </thead>

                                    <tbody>
                                    @foreach($gifts as $gift)
                                        <tr>
                                            <td class="mailbox-star"><a>{{$gift->code}}</a></td>
                                            <td class="mailbox-name">@if($gift->used==1)<span style="color: darkred">استفاده شده</span>@else
                                                    استفاده نشده @endif</td>
                                            <td class="mailbox-name">{{\App\User::find($gift->user_id)->name}} {{\App\User::find($gift->user_id)->last_name}} </td>
                                            <td class="mailbox-name">@if($gift->invoice_id!='')<a
                                                    href="{{route('invoices.show',['invoice' => $gift->invoice_id])}}"
                                                    class="btn btn-info">{{$gift->invoice_id}}</a>@endif</td>
                                            <td class="mailbox-star">{{$gift->percent}}%</td>

                                            <td class="mailbox-subject">
                                                <form action="{{route('gifts.destroy',['gift'=>$gift->id])}}"
                                                      method="post">
                                                    {{method_field('delete')}}
                                                    {{csrf_field()}}
                                                    <button type="submit" class="btn btn-danger fa fa-trash"></button>
                                                </form>
                                            </td>

                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                <!-- /.table -->
                            </div>
                            <!-- /.mail-box-messages -->
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer no-padding">
                            <div class="mailbox-controls">
                                <!-- Check all button -->
                                <div class="pull-right">


                                </div>
                                <!-- /.btn-group -->
                                <button type="button" class="btn btn-default btn-sm"><i class="fa fa-refresh"></i>
                                </button>
                                <div class="pull-left">

                                    <!-- /.btn-group -->
                                </div>
                                <!-- /.pull-right -->
                            </div>
                        </div>
                    </div>
                    <!-- /. box -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

@include('admin.includes.footer')
<!-- /.control-sidebar -->
    <!-- Add the sidebar's background. This div must be placed
         immediately after the control sidebar -->
    <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->


@include('admin.includes.footerLinks')
<!-- iCheck -->
<!-- Page Script -->

<!-- AdminLTE for demo purposes -->
<script type="text/javascript" src="/js/jquery.popupWindow.js"></script>

<script>
    $(document).ready(function () {
        $('.page-link').addClass('btn btn-default btn-sm');
        $('.pagination').addClass('display-block');
    });
    $(document).ready(function () {

        $('#imageUpload').popupWindow({
            windowURL: '/roza-admin/elfinder/popup/main',
            windowName: 'Filebrowser',
            height: 490,
            width: 950,
            centerScreen: 1
        });
        window.callbackmain = function (file) {
            $('#picture').html('<a onclick="deletemainImage()"><i class="fa fa-times btn btn-danger btn-lg"></i></a><img style="width: 50%" src="' + file + '" /> ');
            $('#featured_image').val(file);
        }
    });

    function deletemainImage() {
        $('#picture').html('');
        $('#featured_image').val('');
    }
</script>
</body>
</html>
