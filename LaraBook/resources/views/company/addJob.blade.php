@extends('company.master')
<style>
  #job_head{
  color:rgb(6, 99, 52); font-weight:bold;
  }
</style>
@section('content')
<div class="content">
         <div class="container-fluid">
             <div class="row">
                 <div class="col-md-6">
                    <div class="card">
                         <div class="header">
                             <h4 class="title">Add new Job</h4>
                             <p class="category">sub heading here</p>
                         </div>
                         <div class="content">

                          <div class="form-group">
                          {{Form::open(['url' =>'company/addJobSubmit'])}}
                          {{Form::label('Job Title')}}
                          {{Form::text('job_title',null,['class' =>'form-control'])}}
                          </div>

                          <h4 id="job_head">Skills</h4>
                          <div class="row">
                            <?php // use proper css styling ?>

                          <li style="margin:15px; float:left; list-style:none">
                            {{Form::label('HTML')}}
                          {{Form::checkbox('skills[]', 'HTML')}}
                          </li>
                          <li style="margin:15px; float:left; list-style:none">
                          {{Form::label('CSS')}}
                          {{Form::checkbox('skills[]', 'CSS')}}
                          </li>
                          <li style="margin:15px; float:left; list-style:none">
                          {{Form::label('PHP')}}
                          {{Form::checkbox('skills[]', 'PHP')}}
                          </li>
                          </div>

                          <h4 id="job_head">Requirements</h4>
                          <div class="form-group">
                           {{Form::textarea('requirements',null,
                           ['class'=>'form-control', 'rows' => 3, 'cols' => 40])}}
                         </div>

                          <h4 id="job_head">company/contact Email</h4>
                          {{Form::text('contact_email',null,['class' =>'form-control'])}}<br/>

                          {{Form::submit('add job',null,['class' =>'btn, btn-primary'])}}
                          {{Form::close()}}


                             <div class="footer">
                                 <div class="legend">

                                 </div>
                                 <hr>
                                 <div class="stats">

                                 </div>
                             </div>
                         </div>
                          </div>
                 </div>

                 <div class="col-md-6">
                     <div class="card">
                         <div class="header">
                           <h4 class="title">Heading here</h4>
                           <p class="category">sub heading here</p>
                         </div>
                         <div class="content">

                             <div class="footer">
                                 <div class="legend">

                                  </div>
                                 <hr>
                                 <div class="stats">

                                 </div>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>



         </div>
     </div>
     @endsection
