    @extends('layout/admin/main')

    @section('content')


    <div class="container mb-5">
        <h3>Job Details</h3>
    </div>

    <div class="container">
        <div class="row">
            @foreach($jobdetails as $job)
            <div class="card mb-3">
                <div class="card-header">
                    <h5>{{$job->job_title}}</h5>
                </div>
                <div class="card-body">
                    <p class="card-text">
                        <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512">
                            <path d="M184 48H328c4.4 0 8 3.6 8 8V96H176V56c0-4.4 3.6-8 8-8zm-56 8V96H64C28.7 96 0 124.7 0 160v96H192 320 512V160c0-35.3-28.7-64-64-64H384V56c0-30.9-25.1-56-56-56H184c-30.9 0-56 25.1-56 56zM512 288H320v32c0 17.7-14.3 32-32 32H224c-17.7 0-32-14.3-32-32V288H0V416c0 35.3 28.7 64 64 64H448c35.3 0 64-28.7 64-64V288z" />
                        </svg>
                        Min : {{$job->jobRequirement->experience_level}} Year
                    </p>
                    <p class="card-text">
                        <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 320 512">
                            <path d="M0 64C0 46.3 14.3 32 32 32H96h16H288c17.7 0 32 14.3 32 32s-14.3 32-32 32H231.8c9.6 14.4 16.7 30.6 20.7 48H288c17.7 0 32 14.3 32 32s-14.3 32-32 32H252.4c-13.2 58.3-61.9 103.2-122.2 110.9L274.6 422c14.4 10.3 17.7 30.3 7.4 44.6s-30.3 17.7-44.6 7.4L13.4 314C2.1 306-2.7 291.5 1.5 278.2S18.1 256 32 256h80c32.8 0 61-19.7 73.3-48H32c-17.7 0-32-14.3-32-32s14.3-32 32-32H185.3C173 115.7 144.8 96 112 96H96 32C14.3 96 0 81.7 0 64z" />
                        </svg>
                        {{$job->salary?$job->salary:'Not Disclosed'}}
                    </p>
                    <p class="card-text">
                        @php
                        $location = implode(',',json_decode($job->location));
                        @endphp
                        <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 384 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                            <path d="M215.7 499.2C267 435 384 279.4 384 192C384 86 298 0 192 0S0 86 0 192c0 87.4 117 243 168.3 307.2c12.3 15.3 35.1 15.3 47.4 0zM192 128a64 64 0 1 1 0 128 64 64 0 1 1 0-128z" />
                        </svg>
                        {{$location}}
                    </p>
                    <p class="card-text">
                        <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 384 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                            <path d="M32 32C32 14.3 46.3 0 64 0H320c17.7 0 32 14.3 32 32s-14.3 32-32 32H290.5l11.4 148.2c36.7 19.9 65.7 53.2 79.5 94.7l1 3c3.3 9.8 1.6 20.5-4.4 28.8s-15.7 13.3-26 13.3H32c-10.3 0-19.9-4.9-26-13.3s-7.7-19.1-4.4-28.8l1-3c13.8-41.5 42.8-74.8 79.5-94.7L93.5 64H64C46.3 64 32 49.7 32 32zM160 384h64v96c0 17.7-14.3 32-32 32s-32-14.3-32-32V384z" />
                        </svg>
                        @if( $job->employment_type == 0)
                        Full Time

                        @elseif($job->employment_type == 1)
                        Part Time

                        @else
                        Contract
                        @endif
                    </p>
                    <p class="card-text">
                        <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 640 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                            <path d="M337.8 5.4C327-1.8 313-1.8 302.2 5.4L166.3 96H48C21.5 96 0 117.5 0 144V464c0 26.5 21.5 48 48 48H592c26.5 0 48-21.5 48-48V144c0-26.5-21.5-48-48-48H473.7L337.8 5.4zM256 416c0-35.3 28.7-64 64-64s64 28.7 64 64v96H256V416zM96 192h32c8.8 0 16 7.2 16 16v64c0 8.8-7.2 16-16 16H96c-8.8 0-16-7.2-16-16V208c0-8.8 7.2-16 16-16zm400 16c0-8.8 7.2-16 16-16h32c8.8 0 16 7.2 16 16v64c0 8.8-7.2 16-16 16H512c-8.8 0-16-7.2-16-16V208zM96 320h32c8.8 0 16 7.2 16 16v64c0 8.8-7.2 16-16 16H96c-8.8 0-16-7.2-16-16V336c0-8.8 7.2-16 16-16zm400 16c0-8.8 7.2-16 16-16h32c8.8 0 16 7.2 16 16v64c0 8.8-7.2 16-16 16H512c-8.8 0-16-7.2-16-16V336zM232 176a88 88 0 1 1 176 0 88 88 0 1 1 -176 0zm88-48c-8.8 0-16 7.2-16 16v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16s-7.2-16-16-16H336V144c0-8.8-7.2-16-16-16z" />
                        </svg>
                        @php
                        $education = implode(',',json_decode($job->jobRequirement->minimum_education));
                        @endphp
                        {{$education}}
                    </p>
                </div>
                <div class="card-footer">
                    <div class="row">
                        <div class="col-3">
                            <span class=" w-100">Posted : {{$job->posting_date}} </span>
                        </div>
                        <div class="col-3">
                            <span class="w-100">Opening : {{$job->opening_number}}</span>
                        </div>
                        <div class="col-3">
                            <span class="w-100">Applicants : {{$count}} </span>
                        </div>
                        <div class="col-3">
                            <span class="w-100">
                                <a href="{{ route('editjob', ['id' => $job->id]) }}" class = "btn btn-primary">Edit</a>
                            </span>
                        </div>

                        
                       
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <h5>Job Description </h5>
                </div>
                <div class="card-body">

                    <div class="row mb-3">
                        <div class="col-12">
                            <span class=" w-100"><b>Overview :</b></span>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-12">
                            <span class=" w-100">{!! $job->description !!}</span>
                        </div>

                    </div>

                    <div class="row mt-3">
                        <div class="col-12">
                            <span class=" w-100"> <b>Requirements :</b></span>
                        </div>
                        <div class="col-12">
                            <span class=" w-100">{!! $job->JobRequirement->requirement_text !!}</span>
                        </div>
                    </div>




                    @if(!empty($job->JobRequirement->benefits))
                    <div class="row mt-3">
                        <div class="col-12">
                            <span class=" w-100"> <b>Benefits :</b></span>
                        </div>
                        <div class="col-12">
                            <span class=" w-100">{!! $job->JobRequirement->benefits !!}</span>
                        </div>
                    </div>

                    @endif


                </div>
                @endforeach
            </div>
        </div>


        <!-- Login Required Modal -->
        <div class="modal fade " id="login-modal" tabindex="-1" role="dialog" aria-labelledby="login-modal-title" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content bg-white">
                    <div class="modal-header">
                        <h5 class="modal-title" id="login-modal-title">Login Required</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>Please log in to share your interest.</p>
                    </div>
                    <div class="modal-footer">
                        <a href="{{ route('login') }}" class="btn btn-primary">Login</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="interest-modal" tabindex="-1" role="dialog" aria-labelledby="interest-modal-title" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="interest-modal-title">Share Interest</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="interest-form" action="{{url('sendmessage')}}" method="post">
                            @csrf
                            <!-- Hidden input to store the product ID -->
                            <input type="hidden" id="product-id" name="product_id" value="">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="Your Name">
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="Your Email">
                            </div>
                            <div class="form-group">
                                <label for="contact">Contact</label>
                                <input type="text" class="form-control" id="contact" name="contact" placeholder="Your Contact Number">
                            </div>
                            <div class="form-group">
                                <label for="message">Message</label>
                                <textarea class="form-control" id="message" rows="3" name="message" placeholder="Your Message"></textarea>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" id="submit-interest">Submit</button>
                    </div>
                </div>
            </div>
        </div>


        <script>
            window.isAuthenticated = "{{ auth()->check() ? 'true' : 'false' }}";
            $('#share_interest').click(function(e) {
                e.preventDefault();
                if (window.isAuthenticated === 'true') {
                    var currentUrl = window.location.href;
                    var productId = currentUrl.substring(currentUrl.lastIndexOf('/') + 1)
                    $('#product-id').val(productId);
                    $('#interest-modal').modal('show');
                } else {
                    var currentUrl = window.location.href;
                    $('#login-modal').modal('show');
                }
            })

            $('#submit-interest').click(function() {
                // Prevent the default form submission
                event.preventDefault();

                // Get the form data
                var formData = $('#interest-form').serialize();

                // Send an AJAX request to submit the form
                $.ajax({
                    type: 'POST', // Assuming you want to use a POST request
                    url: $('#interest-form').attr('action'), // Get the form action URL
                    data: formData,
                    success: function(response) {
                        alert('Message submitted successfully');
                        $('#interest-modal').modal('hide');
                    },

                });
            });
        </script>
        @endsection