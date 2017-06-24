@extends('company.master')
@section('content')
<div class="content">
         <div class="container-fluid">
             <div class="row">
                 <div class="col-md-4">
                     <div class="card">
                         <div class="header">
                             <h4 class="title">Add new Job</h4>
                             <p class="category">sub heading here</p>
                         </div>
                         <div class="content">

                           <div class="form-group ">
                          {{Form::open(['url' =>'company/addJobSubmit'])}}
                          {{Form::label('Job Title')}}
                          {{Form::text('job_title')}}<br/>

                          {{Form::label('Skills')}}<br/>

                          {{Form::label('HTML')}}
                          {{Form::checkbox('skills[]', 'HTML')}}

                          {{Form::label('CSS')}}
                          {{Form::checkbox('skills[]', 'CSS')}}

                          {{Form::label('PHP')}}
                          {{Form::checkbox('skills[]', 'PHP')}}
                          <br/>
                          {{Form::label('Requirements')}}
                          {{Form::textarea('requirements')}}<br/>

                          {{Form::label('company/contact Email')}}
                          {{Form::text('contact_email')}}<br/>

                          {{Form::submit('add job')}}
                          {{Form::close()}}
                           </div>

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

                 <div class="col-md-8">
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
