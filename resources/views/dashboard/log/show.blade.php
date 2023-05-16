<!-- ini adalah konten dari halaman Detail Kontrakan -->
@extends('layout/main')

<!-- ini adalah title dari halaman Detail Kontrakan -->
@section('title', 'DETAIL LOG ACTIVITY')

<!-- ini adalah isi konten dari halaman Detail Kontrakan -->
@section('container')
 <!-- Header -->
 <div class="header bg-primary pb-6">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4">
            <div class="col-lg-6 col-8">  
              <nav aria-label="breadcrumb" class="d-md-inline-block ml-md-4">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                  <li class="breadcrumb-item"><a href="">Dashboard</a></li>
                  <li class="breadcrumb-item"><a href=" ">LOG ACTIVITY</a></li>
                  <li class="breadcrumb-item " aria-current="page">Detail LOG ACTIVITY</li>
                </ol>
              </nav>
            </div> 
          </div> 
        </div>
      </div>

    <!-- Page content -->
    <div class="container-fluid mt--4">
      <div class="row">
         <!-- disini isi konten -->
         <div class="container-xl"> 
           <!-- Form CRUD -->
            <div class="row ">
              <div class="col-lg-8 mx-auto">
                <div class="card mt-2 mx-auto p-4 bg-light">
                  <div class="card-body bg-light">
                    <div class="container">
                      <h1 class="text-center mb-4"><i class="ni ni-single-02 text-blue" style="size: 20px;"></i> <br>
                        Detail Data Kontrakan</h1>
                       <form id="contact-form" role="form">
                           <div class="controls">
                               
                              <div class="row">
                                   <div class="col-md-12">
                                       <div class="form-group"> <label for="form_name">ID Kontrakan :</label> <input id="form_name" type="text" name="name" class="form-control" value=" KR{{$activitylog->id}}" readonly > </div>
                                   </div>    
                               </div>
                               
                               
                           
                                <div class="row" >
                                    <div class="col-md-12">
                                      <a href="/dashboard/kontrakan"  class="btn btn-success btn-send pt-2 btn-block " style="font-size: 20px;" >
                                        <span>Kembali</span>
                                      </a>  
                                    </div> 
                                </div> 

                       </form> 
                     </div>
                  </div>
                <div>
              </div> <!-- /.8 -->
            </div> <!-- Tutup Row -->

      </div>    <!-- Tutup Row Isi Konten -->
         
    </div>
      <!-- ini adalah tutup endsection -->
      @endsection