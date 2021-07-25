            <div class="page-heading">
                <div class="page-title">
                    <div class="row">
                        <div class="col-12 col-md-6 order-md-1 order-last">
                            <h3>STUDENT RECORDS</h3>
                            <p class="text-subtitle text-muted">Manage Students</p>
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
                                <a href="?page=records&data=admission-new"><button type="submit"
                                    class="btn btn-primary me-1 mb-1" id="myBtn">Add New Student</button></a>     
                                                    
                            </div> 
                            <HR></HR>                        
                        </div>
                        <div class="card-body">
                           <div class="table-responsive">
                            <table class="table table-striped table-bordered" id="table1">   
                                <thead style="background-color: #435ebe; color: white;"class="grey lighten-2">
                                    <tr>
                                        <th>#</th>
                                        <th>LRN</th>
                                        <th>Name</th>
                                        <th>Level & Section</th>
                                        <th>Adviser</th>
                                        <th>Student Type</th>
                                        <th>Date Enrolled</th>                                     
                                        <th>Action</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>1247564647</td>
                                        <td>Ren Andy Hayag</td>
                                        <td>Grade 2 A</td>
                                        <td>Mr. Berba</td>
                                        <td>Regular</td>     
                                        <td>June 23, 2018</td>                                
                                        <td>
                                            <a href="?page=records&data=admission-new"><span class="badge bg-primary Edit">Profile</span></a>
                                            <button type="button" class="badge btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@getbootstrap">Edit</button>                                     
                                        </td>
                                    </tr> 
                                    <tr>
                                        <td>1</td>
                                        <td>1247564647</td>
                                        <td>Ren Andy Hayag</td>
                                        <td>Grade 2 A</td>
                                        <td>Mr. Berba</td>
                                        <td>Regular</td>     
                                        <td>June 23, 2018</td>                                
                                        <td>
                                            <a href="?page=records&data=admission-new"><span class="badge bg-primary Edit">Profile</span></a>
                                            <button type="button" class="badge btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@getbootstrap">Edit</button>                                     
                                        </td>
                                    </tr> 
                                    <tr>
                                        <td>1</td>
                                        <td>1247564647</td>
                                        <td>Ren Andy Hayag</td>
                                        <td>Grade 2 A</td>
                                        <td>Mr. Berba</td>
                                        <td>Regular</td>     
                                        <td>June 23, 2018</td>                                
                                        <td>
                                            <a href="?page=records&data=admission-new"><span class="badge bg-primary Edit">Profile</span></a>
                                            <button type="button" class="badge btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@getbootstrap">Edit</button>                                     
                                        </td>
                                    </tr> 
                                    <tr>
                                        <td>1</td>
                                        <td>1247564647</td>
                                        <td>Ren Andy Hayag</td>
                                        <td>Grade 2 A</td>
                                        <td>Mr. Berba</td>
                                        <td>Regular</td>     
                                        <td>June 23, 2018</td>                                
                                        <td>
                                            <a href="?page=records&data=admission-new"><span class="badge bg-primary Edit">Profile</span></a>
                                            <button type="button" class="badge btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@getbootstrap">Edit</button>                                     
                                        </td>
                                    </tr> 
                                    <tr>
                                        <td>1</td>
                                        <td>1247564647</td>
                                        <td>Ren Andy Hayag</td>
                                        <td>Grade 2 A</td>
                                        <td>Mr. Berba</td>
                                        <td>Regular</td>     
                                        <td>June 23, 2018</td>                                
                                        <td>
                                            <a href="?page=records&data=admission-new"><span class="badge bg-primary Edit">Profile</span></a>
                                            <button type="button" class="badge btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@getbootstrap">Edit</button>                                     
                                        </td>
                                    </tr> 
                                    <tr>
                                        <td>1</td>
                                        <td>1247564647</td>
                                        <td>Ren Andy Hayag</td>
                                        <td>Grade 2 A</td>
                                        <td>Mr. Berba</td>
                                        <td>Regular</td>     
                                        <td>June 23, 2018</td>                                
                                        <td>
                                            <a href="?page=records&data=admission-new"><span class="badge bg-primary Edit">Profile</span></a>
                                            <button type="button" class="badge btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@getbootstrap">Edit</button>                                     
                                        </td>
                                    </tr> 
                                </tbody>
                            </table>
                          </div>
                        </div>
                    </div>

                </section>
            </div>


            <!----------------------------------------------- FOR MODAL --------------------------------------------------------------------->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">EDIT STUDENT</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form>
          <div class="mb-3">
            <label for="lrn-name" class="col-form-label">LRN</label>
            <input type="text" class="form-control" id="lrn-name">
          </div>
          <div class="mb-3">
            <label for="name-text" class="col-form-label">Name</label>
            <input type="text" class="form-control" id="name-text"></textarea>
          </div>
          <div class="mb-3">
            <label for="level-name" class="col-form-label">Level & Section</label>
            <input type="text" class="form-control" id="level-name">
          </div>
          <div class="mb-3">
            <label for="adviser-text" class="col-form-label">Adviser</label>
            <input type="text" class="form-control" id="adviser-text"></textarea>
          </div>
          <div class="mb-3">
            <label for="student-type-name" class="col-form-label">Student Type</label>
            <input type="text" class="form-control" id="student-type-name">
          </div>
          <div class="mb-3">
            <label for="date-text" class="col-form-label">Date Enrolled</label>
            <input type="date" class="form-control" id="date-text"></textarea>
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