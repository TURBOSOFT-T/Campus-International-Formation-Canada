@section('titre', 'Liste des candidatures')
@extends('admin.fixe')

@section('body')
 
<div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">

        <div class="content-wrapper">


            <div class="container-xxl flex-grow-1 container-p-y">



                <div class="container-xxl flex-grow-1 container-p-y">

            <!-- start page title -->
            <div class="row mb-3">
                <div class="col-12">
                    <div class="page-title-box">
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item">
                                    <a href="javascript: void(0);">{{ config('app.name') }}</a>
                                </li>
                                <li class="breadcrumb-item">
                                    <a href="{{ route('candidatures') }}">Candidatures</a>
                                </li>
                                <li class="breadcrumb-item active">Liste</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end page title -->


            <div class="card radius-15">
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="card-title">
                                <h5 class="mb-0 my-auto">
                                    Liste des  candidatures
                                </h5>
                            </div>
                        </div>
                  

                     
                      
                           
                        
                        </div>
                    </div>
                    <hr />
                    @livewire('Candidatures.ListCandidature') 
                </div>
            </div>
        </div>
    </div>
        </div>
    </div>
</div>



    

@endsection
