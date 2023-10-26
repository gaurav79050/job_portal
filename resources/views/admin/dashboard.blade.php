@extends('layout/admin/main')

@section('content')

      <div class="middle-content container-xxl p-0">
         <div class="row layout-top-spacing">
            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12 layout-spacing">
               <div class="widget widget-card-four">
                  <div class="widget-content">
                     <div class="w-header">
                        <div class="w-info">
                           <h6 class="value">Total Created Job</h6>
                        </div>
                        <div class="task-action">
                        </div>
                     </div>
                     <div class="w-content">
                        <div class="w-info">
                           {{$jobcount}}
                        </div>
                     </div>
                    
                  </div>
               </div>
            </div>

            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12 layout-spacing">
               <div class="widget widget-card-four">
                  <div class="widget-content">
                     <div class="w-header">
                        <div class="w-info">
                           <h6 class="value">Total Application</h6>
                        </div>
                        <div class="task-action">
                        </div>
                     </div>
                     <div class="w-content">
                        <div class="w-info">
                           {{$applicationcount}}
                        </div>
                     </div>
                    
                  </div>
               </div>
            </div>
         </div>
      </div>


    </div>
@endsection