@extends('admin.fixe')
@section('titre', 'Accueil')
@section('body')
    @php
        $config = DB::table('configs')->select('icon', 'logo', 'tounoir', 'seance')->first();

    @endphp
<head>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>
    <div class="container-xxl flex-grow-1 container-p-y">
        <!-- Hour chart  -->
        <div class="card bg-transparent shadow-none my-6 border-0">
            <div class="card-body row p-0 pb-6 g-6">
                <div class="col-12 col-lg-8 card-separator">
                    <h5 class="mb-2">Content de vous revoir,<span class="h4"> Campus-International-Formation-Canada 👋🏻</span></h5>
                    <div class="col-12 col-lg-5">

                    </div>
                    <div class="d-flex justify-content-between flex-wrap gap-4 me-12">


                        <div class="d-flex align-items-center gap-4">
                            <div class="avatar avatar-lg">
                                <div class="avatar-initial bg-label-warning rounded">
                                    <div>
                                        <span class="avatar-initial rounded bg-label-primary"><i
                                                class="ti ti-clock ti-28px"></i></span>
                                    </div>
                                </div>
                            </div>
                            <div class="content-right">
                                <p class="mb-0 fw-medium">Paternaires</p>
                                <h4 class="text-warning mb-0">{{ $totalSponsors ?? '' }}</h4>
                            </div>
                        </div>
              
                        <div class="d-flex align-items-center gap-4">
                            <div class="avatar avatar-lg">
                                <div class="avatar-initial bg-label-info rounded">
                                    <div>
                                       
                                        <i class="menu-icon tf-icons ti ti-users"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="content-right">
                                <p class="mb-0 fw-medium">Utilisateurs</p>
                                <h4 class="text-info mb-0">{{ $totalUser ?? ' ' }}</h4>
                            </div>
                        </div>
               


                   

                      {{--  <div class="d-flex align-items-center gap-4">
                            <div class="avatar avatar-lg">
                                <div class="avatar-initial bg-label-warning rounded">
                                    <div>
                                        <span class="avatar-initial rounded bg-label-primary"><i
                                                class="ti ti-clock ti-28px"></i></span>
                                    </div>
                                </div>
                            </div>
                            <div class="content-right">
                                <p class="mb-0 fw-medium">Candidatures</p>
                                <h4 class="text-warning mb-0">{{ $totalCandidatures ?? ' ' }}</h4>
                            </div>
                        </div> --}}



                        
                      {{--  <div class="d-flex align-items-center gap-4">
                            <div class="avatar avatar-lg">
                                <div class="avatar-initial bg-label-warning rounded">
                                    <div>
                                        <span class="avatar-initial rounded bg-label-primary"><i
                                                class="ti ti-clock ti-28px"></i></span>
                                    </div>
                                </div>
                            </div>
                            <div class="content-right">
                                <p class="mb-0 fw-medium">Offres d'emplois</p>
                                <h4 class="text-warning mb-0">{{ $totalOffres ?? ' ' }}</h4>
                            </div>
                        </div> --}}

                        <div class="d-flex align-items-center gap-4">
                            <div class="avatar avatar-lg">
                                <div class="avatar-initial bg-label-warning rounded">
                                    <div>
                                        <span class="avatar-initial rounded bg-label-primary"><i
                                                class="ti ti-clock ti-28px"></i></span>
                                    </div>
                                </div>
                            </div>
                            <div class="content-right">
                                <p class="mb-0 fw-medium">Actualités</p>
                                <h4 class="text-warning mb-0">{{ $totalactualites ?? ' ' }}</h4>
                            </div>
                        </div>


                    </div>
                </div>
               
                <div id="chart3" data-values="@json($inscriptionMonth)"></div>
            </div>
        </div>
        <!-- Hour chart End  -->

        <!-- Topic and Instructors -->
        <div class="row mb-6 g-6">
            <!-- Interested Topics -->

            <!--/ Interested Topics -->

            <!-- Popular Instructors -->

            <!--/ Popular Instructors -->

            <!-- Top Courses -->
            <div class="col-xxl-4 col-lg-6">
                <div class="card h-100">
                    <div class="card-header d-flex align-items-center justify-content-between">
                        <h5 class="card-title m-0 me-2">Les rescentes galleries</h5>
                        <div class="dropdown">
                        
                        </div>
                    </div>
                    <div class="card-body">
                        <ul class="list-unstyled mb-0">
                            @foreach ($latestImages as $video)
                                <li class="d-flex mb-6 align-items-center">
                                    <div class="avatar flex-shrink-0 me-4">
                                        {{-- <span class="avatar-initial rounded bg-label-primary"><i
                                                class="ti ti-video ti-lg"></i></span> --}}
                                                 <img src="{{ Storage::url($video->image ?? ' ') }}" alt="Avatar"
                                            class="rounded-circle" />
                                    </div>
                                    <div class="row w-100 align-items-center">
                                        <div class="col-sm-8 mb-1 mb-sm-0 mb-lg-1 mb-xxl-0">
                                            <h6 class="mb-0">{{ $video->titre ?? '' }}</h6>

                                            <p class="mb-0 text-truncate">Publiée le:{{ $video->created_at ?? '' }}</p>

                                        </div>

                                      
                                    </div>
                                </li>
                            @endforeach

                        </ul>
                    </div>
                </div>
            </div>
            <!--/ Top Courses -->

            <!-- Upcoming Webinar -->
            <div class="col-xxl-4 col-md-6">

                <div class="card h-100">
                    @foreach ($lastblog as $event)
                        @if ($lastevent)
                            <div class="card-body">
                                <div class="bg-label-primary rounded text-center mb-4 pt-4">
                                    <img class="img-fluid" src="{{ Storage::url($event->image ?? ' ') }}"
                                        alt="Card girl image" width="140" />
                                </div>
                                <h5 class="mb-2">{{ $event->titre }}</h5>
                                <p class="small">
                                    {{--   {{ $lastestVideo->created_at }} --}}

                                </p>
                                <div class="row mb-4 g-3">
                                    <div class="col-6">
                                        <div class="d-flex">
                                            <div class="avatar flex-shrink-0 me-3">
                                                <span class="avatar-initial rounded bg-label-primary"><i
                                                        class="ti ti-calendar-event ti-28px"></i></span>
                                            </div>
                                            <div>
                                                <h6 class="mb-0 text-nowrap"></h6>
                                                <small>{{ $event->created_at }}</small>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="d-flex">
                                            <div class="avatar flex-shrink-0 me-3">
                                                <span class="avatar-initial rounded bg-label-primary"><i
                                                        class="ti ti-clock ti-28px"></i></span>
                                            </div>
                                            {{--  <div>
                                    <h6 class="mb-0 text-nowrap">32 minutes</h6>
                                    <small>Duration</small>
                                </div> --}}
                                        </div>
                                    </div>
                                </div>
                                <a href="javascript:void(0);" class="btn btn-primary w-100">Actualité en cours
                                </a>
                            </div>
                        @endif
                    @endforeach

                </div>





            </div>
            <!--/ Upcoming Webinar -->


            <div class="col-xxl-4 col-lg-6">
                <div class="card h-100">
                    <div class="card-header d-flex align-items-center justify-content-between">
                        <div class="card-title mb-0">
                            <h5 class="m-0 me-2">Les dernières  actualités </h5>
                        </div>
                        <div class="dropdown">

                        </div>
                    </div>
                    <div class="px-5 py-4 border border-start-0 border-end-0">
                        <div class="d-flex justify-content-between align-items-center">
                            {{--  <p class="mb-0 text-uppercase">Evènements</p> --}}
                            {{--  <p class="mb-0 text-uppercase">Videos</p> --}}
                        </div>
                    </div>
                    <div class="card-body">



                        @foreach ($lastevents as $event)
                            <div class="d-flex justify-content-between align-items-center mb-6">
                                <div class="d-flex align-items-center">
                                    <div class="avatar avatar me-4">

                                        <img src="{{ Storage::url($event->image ?? ' ') }}" alt="Avatar"
                                            class="rounded-circle" />
                                    </div>
                                    <div>
                                        <div>
                                            <h6 class="mb-0 text-truncate">{{ $event->title ?? ' ' }}</h6>
                                            {{-- <small class="text-truncate text-body">{{ $user->role ?? ' ' }}</small> --}}
                                        </div>
                                    </div>
                                </div>
                                <div class="text-end">
                                    {{--    <h6 class="mb-0">{{ $user->videos_count }}</h6> --}}
                                </div>
                            </div>
                        @endforeach



                    </div>
                </div>
            </div>
            <!--/ Assignment Progress -->
        </div>
        <!--  Topic and Instructors  End-->

        <!-- Course datatable -->


        <!-- Course datatable End -->
    </div>

@endsection
@push('scripts')
    <!-- Vector map JavaScript -->
    <script src="/admin/assets/plugins/apexcharts-bundle/js/apexcharts.min.js"></script>
    <script src="/admin/assets/js/index2.js"></script>
    <!-- App JS -->
@endpush
