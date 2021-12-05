@extends('dashboard.layouts.main')

@section('container')
    <div class="container rounded bg-white mt-5 mb-5">
        <div class="row">
            @foreach ($user as $list)
            <div class="col-md-3 border-right">
                <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img class="rounded-circle mt-5" width="150px" src="https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg"><span class="font-weight-bold">{{ $list->name }}</span><span class="text-black-50">{{ $list->email }}</span><span> </span></div>
            </div>
            <div class="col-md-5 border-right">
                <div class="p-3 py-5">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h4 class="text-right">Profile Settings</h4>
                    </div>
                    
                    <div class="row mt-2">
                        <div class="col-md-12"><label class="labels">Name</label><input type="text" class="form-control" placeholder="Name" value="{{ $list->name }}"></div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-12"><label class="labels">User Name</label><input type="text" class="form-control" placeholder="User Name" value="{{ $list->username }}"></div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-12"><label class="labels">Email</label><input type="email" class="form-control" placeholder="Email" value="{{ $list->email }}"></div>
                    </div>
                    <?php
                    if($list->is_admin == '1'){
                        $admin = 'administrator';
                    } else {
                        $admin = 'contributor';
                    }
                    ?>
                    <div class="row mt-3">
                        <div class="col-md-12"><label class="labels">Role</label><input type="text" class="form-control" placeholder="Role" disabled value="{{ $admin }}"></div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-12"><label class="labels">Status</label><input type="text" class="form-control" placeholder="Status" disabled value=""></div>
                    </div>
                    
                    <div class="row mt-3">
                        <div class="col-md-6"><label class="labels">Created at</label><input type="text" class="form-control" placeholder="create" disabled value="{{ $list->created_at }}"> </div>
                        <div class="col-md-6"><label class="labels">Updated at</label><input type="text" class="form-control" value="{{ $list->updated_at }}" placeholder="update" disabled></div>
                    </div>
                   
                    <div class="row mt-3">
                        <span class="col-md-12">
                            <a href="/dashboard/" class="btn btn-secondary">Back to Dashboard</a>
                            <button class="btn btn-primary profile-button" type="button">Update Profile</button>
                        </span>
                    </div>
                </div>
            </div>
        @endforeach
        </div>
    </div>
    </div>
    </div>
@endsection