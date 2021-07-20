<div class="page-heading">
                <div class="page-title">
                    <div class="row">
                        <div class="col-12 col-md-6 order-md-1 order-last">
                            <h3>TEACHER RECORDS</h3>
                            <p class="text-subtitle text-muted">For user to check Teacher list</p>
                        </div>
                        <div class="col-12 col-md-6 order-md-2 order-first">
                            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">DataTable</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
                <section class="section">
                    <div class="card">
                        <div class="card-header">
                        <div class="col-12 d-flex justify-content-end reset-btn">                      
                                <a href=""><button type="submit"
                                    class="btn btn-primary me-1 mb-1" id="myBtn">Add Teacher</button></a>                                                        
                            </div> 
                            <HR></HR> 
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered table-striped" id="table1">
                                <thead style="background-color: #435ebe; color: white;">
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Advisory Class</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>Joven Hayag</td>
                                        <td>Grade 2 Aguinaldo</td>
                                        <td>
                                            <span class="badge bg-primary">Profile</span>
                                            <button type="button" class="badge btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@getbootstrap">Edit</button>                                 
                                        </td>
                                    </tr>    
                                </tbody>
                            </table>
                        </div>
                    </div>

                </section>
            </div>
                <!----------------------------------------------- FOR MODAL --------------------------------------------------------------------->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">MANAGE TEACHER</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form>
          <div class="mb-3">
            <label for="lrn-name" class="col-form-label">Name</label>
            <input type="text" class="form-control" id="lrn-name">
          </div>
          <div class="mb-3">
            <label for="name-text" class="col-form-label">Advisory Class</label>
            <input type="text" class="form-control" id="name-text"></textarea>
          </div>
         
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save</button>
      </div>
    </div>
  </div>
</div>