@extends('company.master')
@section('content')
<style>
table{ width:100%}

table th{ padding:10px; border:1px solid #ddd}
table td { padding:10px; border-bottom:1px solid #ddd}
</style>
<div class="content">
         <div class="container-fluid">
             <div class="row">
                 <div class="col-md-8">
                     <div class="card">
                         <div class="header">
                             <h4 class="title">Jobs submit by you</h4>
                             <p class="category">sub heading here</p>
                         </div>
                         <div class="content">

                           <div class="form-group ">

                           </div>

                             <div class="footer">
                                 <div class="legend">
                                   <table>
                                     <tr>
                                       <th>
                                         Job Title
                                       </th>
                                       <th>
                                         skills
                                       </th>
                                       <th>
                                         Contact Email
                                       </th>
                                       <th>
                                         Details
                                       </th>
                                     </tr>
                                     @foreach($jobs as $job)
                                     <tr>
                                       <td>{{$job->job_title}}</td>
                                       <td>{{$job->skills}}</td>
                                          <td>{{$job->contact_email}}</td>
                                          <td><a href="">view</a></td>
                                     </tr>

                                     @endforeach
                                   </table>
                                 </div>
                                 <hr>
                                 <div class="stats">

                                 </div>
                             </div>
                         </div>
                     </div>
                 </div>

                 <div class="col-md-4">
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
