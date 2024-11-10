@extends('admin.layouts.app')
@section('content')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Our Team</h1>
                </div>
                <div class="col-sm-6" style="text-align:right;">
                    <a href="{{url('/add_team_member')}}" class="btn btn-primary">Add Team Member</a>
                </div>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Our Team List</h3>
        </div>
        <div class="card-body p-0 table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Profile Picture</th>
                        <th>Name</th>
                        <th>Country</th>
                        <th>Address</th>
                        <th>Postcode</th>
                        <th>Email</th>
                        <th>Whatsapp Number</th>
                        <th>Facebook Link</th>
                        <th>Status</th>
                        <th>Created Date</th>
                        <th style="text-align: center;">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($getRecords as $value)
                    @php
                        $getImage = $value->getImageSingle($value->id);
                    @endphp
                    <tr>
                        <td>{{$no++}}</td>
                        <td>
                            @if(!empty($getImage) && !empty($getImage->getImage()))
                                <img style="width: 50px; height:45px; border-radius: 80%; margin-left: 20px;" src="{{$getImage->getImage()}}" alt="">    
                            @endif
                        </td>
                        <td>{{$value->first_name}} {{$value->last_name}}</td>
                        <td>{{$value->country}}</td>
                        <td>{{$value->address}}</td>
                        <td>{{$value->postcode}}</td>
                        <td>{{$value->email}}</td>
                        <td>{{$value->whatsapp_number}}</td>
                        <td>{{$value->facebook_link}}</td>
                        <td>
                            @if ($value->status == 0)
                            <span style="color: rgb(8, 165, 8)">Active</span>
                            @endif
                            @if ($value->status == 1)
                            <span style="color: #D0342C">Inactive</span>
                            @endif
                        </td>
                        <td>{{date('d-m-y', strtotime($value->created_at))}}</td>
                        <td style="text-align: center;">
                            <a href="{{url('/shipping_charge_edit/'.$value->id)}}" class="btn btn-primary btn_edit"
                                style="width: 50px;"><i class="fas fa-edit"></i></a>
                            <a onclick="confirmation(event)" href="{{url('/shipping_charge_delete/'.$value->id)}}" class="btn btn-danger btn_delete"
                                style="width: 50px;"><i class="fas fa-trash"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div style="padding: 10px; float: right;">
                {!! $getRecords->appends(Illuminate\Support\Facades\Request::except('page'))->links() !!}
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')

<script type="text/javascript">
    $(document).ready(function () {
    var shownPopup = false;
    $("form").submit(function (event) {
        if (shownPopup === false) {
            event.preventDefault();
            shownPopup = true;
            var form = $(this);
            Swal.fire({
                icon: 'success',
                title: 'Updated!',
                text: 'System setting has been updated.'
            }).then(function() {
                form.trigger('submit');
            });
        }
    });
});

</script>
@endsection