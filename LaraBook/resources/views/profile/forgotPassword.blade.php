@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">

       <div class="col-md-8 col-md-offset-2">
          <div class="panel panel-default">
              <div class="panel-heading">Reset Password</div>
                  <div class="panel-body">
                  <form method="post" action="{{url('/setToken')}}" class="form-horizontal">
                  {{csrf_field()}}
                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                     <label for="email" class="col-md-4 control-label">E-Mail Address</label>
                       <div class="col-md-6">
                       <input type="text" name="email_address" class="form-control" >
                     </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-4">
                            <input type="submit" value="Reset Password" class="btn btn-primary">
                          </div>
                        </div>
                  </form>
                </div>
            </div>
          </div>

  </div>
</div>
@endsection
