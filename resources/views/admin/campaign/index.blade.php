<!DOCTYPE html>
<html>
<head>
  <title> شرکت کنندگان جشنواره | حوله ارس</title>

  @include('admin.includes.headerLinks')

<style>
  .display-block{
    display: block!important;
    margin: 0!important;
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
        شرکت کنندگان
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> خانه</a></li>
        <li class="active"> شرکت کنندگان</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">

          <!-- /. box -->

          <!-- /.box -->
        <!-- /.col -->
        <div class="col-md-12">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">شرکت کنندگان</h3>

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
                <button type="button" class="btn btn-default btn-sm"><i class="fa fa-refresh"></i></button>

                <div class="pull-left">


                <!-- /.btn-group -->
                </div>
                <!-- /.pull-right -->
              </div>
              <div class="table-responsive mailbox-messages">
                <table class="table table-hover table-striped">

                  <thead>
                  <tr>
                    <th class="mailbox-star">نام جشنواره</th>
                    <th class="mailbox-star">شماره تماس</th>
                    <th class="mailbox-star">ایمیل</th>
                    <th class="mailbox-name">تایید شماره؟</th>
                    <th class="mailbox-subject">تایید ایمیل؟</th>
                    <th class="mailbox-subject">جایزه</th>
                    <th class="mailbox-subject">حذف</th>

                  </tr>
                  </thead>

                  <tbody>
                  @php $phone_array=['9307473703'] ;
                    $phones="[";
                  @endphp
                  @foreach($campaigns as $campaign)
                  <tr>
                    <td class="mailbox-star">{{$campaign->campaign_name}}</td>
                    <td class="mailbox-star">{{$campaign->phone}}</td>
                    <td class="mailbox-star">{{$campaign->email}}</td>
                    <td class="mailbox-subject">{{$campaign->phone_verify}}</td>
                    <td class="mailbox-subject">{{$campaign->email_verify}}</td>
                    <td class="mailbox-subject">{{$campaign->gift}}</td>
                    <td class="mailbox-subject">
                      <form action="{{route('campaign.destroy',['campaign'=>$campaign->id])}}" method="post">
                        {{method_field('delete')}}
                        {{csrf_field()}}
                        <button type="submit" class="btn btn-danger fa fa-trash"></button>
                      </form>
                    </td>

                  </tr>

                    @php
                    if(!in_array($campaign->phone,$phone_array)&&$campaign->phone!=''&&$campaign->phone_verify!=''){
                     array_push($phone_array,$campaign->phone);
                     $phones.="'0" . $campaign->phone . "',";
                    }
                    @endphp
                  @endforeach
                  @php $phones.="'09307473703']";  @endphp
                  </tbody>
                </table>

                <input type="text" value="{{$phones}}" style="width: 100%">
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
                <button type="button" class="btn btn-default btn-sm"><i class="fa fa-refresh"></i></button>
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
    $(document).ready(function() {
        $('.page-link').addClass('btn btn-default btn-sm');
        $('.pagination').addClass('display-block');
    });
    $(document).ready(function(){

        $('#imageUpload').popupWindow({
            windowURL:'/roza-admin/elfinder/popup/main',
            windowName:'Filebrowser',
            height:490,
            width:950,
            centerScreen:1
        });
        window.callbackmain=function (file){
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
