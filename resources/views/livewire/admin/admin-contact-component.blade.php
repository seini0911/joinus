
<div class="page-content">
    <!-- Section catégories de services -->
    <h6 class="mb-0 text-uppercase">Messaages du site</h6>
    <hr/>
    <div class="row row-cols-1 row-cols-md-2 row-cols-xl-4">
       <!--  -->
       <div class="col">
       <div class="card radius-10 border-start border-0 border-3 border-warning">
          <div class="card-body">
             <div class="d-flex align-items-center">
                <div>
                   <p class="mb-0 text-secondary">Total</p>
                   <h4 class="my-1 text-warning">{{ $contactsNumber}}</h4>
                   <p class="mb-0 font-13"></p>
                </div>
                <div class="widgets-icons-2 rounded-circle bg-gradient-blooker text-white ms-auto"><i class='bx bx-coin-stack'></i>
                </div>
             </div>
          </div>
       </div>
       </div>
       <!-- -->
       
       </div> 
    </div>
    <!--end row-->
    <hr/>
    <hr/>
    <div class="card">
       <div class="card-body">
          <div class="table-responsive">
             <table id="example2" class="table table-striped table-bordered">
                <thead>
                   <tr>
                      <th>N°</th>
                      <th>Nom</th>
                      <th>Email</th>
                      <th>Tel</th>
                      <th>Message</th>
                      <th>Date de création</th>
                      <th>Actions</th>
                   </tr>
                </thead>
                <tbody>
                    @foreach($contacts as $contact)
                        <tr>
                            <td>{{$contact->id}}</td>
                            <td>{{$contact->name}}</td>
                            <td>{{$contact->email}}</td>
                            <td>{{$contact->phone}}</td>
                            <td>{{$contact->message}}</td>
                            <td>{{$contact->created_at}}</td>
                            <td>
                                <div class="d-flex flex-direction-row">
                                    <div class="col">
                                    <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#exampleScrollableModal" ><i
                                            class='bx bx-list-ol me-0'></i>
                                    </button>
                                    </div>
                                    <div class="col">
                                    <button type="button" class="btn btn-outline-success"><i
                                            class='bx bx-edit'></i>
                                    </button>
                                    </div>
                                    <div class="col">
                                    <button type="button" class="btn btn-outline-danger"><i
                                            class='bx bx-trash'></i>
                                    </button>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
             </table>
          </div>
       </div>
    </div>
 </div>