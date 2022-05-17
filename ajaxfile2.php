<?php 
include_once('connect.php');


$role = $_POST['role'];
$grade = $_POST['grade'];
$gender = $_POST['gender'];
$barangay = $_POST['barangay'];
$modality = $_POST['modality'];

$query = "SELECT DISTINCT (s.id) AS `studentID`, s.lrn, s.sex, s.lastname, s.firstname, s.middlename,
g.grade, ss.sectionname, t.name AS `Advisor`, s.modality
FROM student_tbl s
INNER JOIN enrollment_tbl e
ON e.student_id = s.id
INNER JOIN section_tbl ss
ON ss.id = e.section_id
INNER JOIN gradelevel_tbl g
ON g.id = ss.gradelevel_id
INNER JOIN teacher t
ON t.id = ss.teacher_id
WHERE e.status = 'enrolled' ";

$lastquery = " GROUP BY studentID ORDER BY s.lastname ASC";


if ($gender !="")
{
    $query .= "AND s.sex = '$gender'";
}
if ($barangay !="")
{
    $query .= "AND s.barangay = '$barangay'";
}
if ($modality !="")
{
    $query .= "AND s.modality = '$modality'";
}
if ($grade !="")
{
    $query .= "AND g.grade = '$grade'";
}
$query .= $lastquery;

    $query_run = mysqli_query($connection, $query);
    $i=1;
    $count = mysqli_num_rows($query_run);
    ?>
                       
        <table class="text-center table table-bordered table-striped" id="table1" style="width:100%">
    <?php
    if ($count){
    ?>
                <thead style="background-color: #435ebe; color: white;">
                    <tr>                                   
                    <th style="display: none">ID</th>
                    <th style="">#</th>
                    <th hidden >Photo</th>     
                    <th style="text-align:center;">LRN</th>                                 
                    <th style="text-align: center;">First name</th>
                    <th style="display:none;text-align: center;">Middle name</th>
                    <th style="text-align: center;">Last name</th>                  
                    <th style="text-align:center;">Gender</th>
                    <th style="text-align: center;">Grade</th>
                    <th style="text-align: center;">Section</th>
                    <th style="display:none; text-align: center;">Adviser</th>
                    <th style="text-align: center;">Modality</th>
                    <th style="text-align: center;">Action</th>                             
                    </tr>
                </thead>
                <tbody>
                <?php
    }
    else{
        echo "Sorry! No record found";
    }
    ?>   
        <?php
        while($row = mysqli_fetch_assoc($query_run)){
            ?>
            <tr>                      
            <td style="font-size:13px; font-weight: 600;display: none"><?php echo $row['studentID'];?></td>
            <td style="font-size:13px; font-weight: 600"><?php echo $i?></td>
            <td style="display: none"><img style="width: 40px;height:40px;object-fit: cover; border-radius: 50%" src="uploads/<?=$row['photo']?>"></td>
            <td style="font-size:13px; font-weight: 600"><?php echo $row['lrn'];?></td>
            <td style="font-size:13px; font-weight: 600"><?php echo $row['firstname'];?></td>
            <td style="font-size:13px; font-weight: 600;display:none"><?php echo $row['middlename'];?></td>
            <td style="font-size:13px; font-weight: 600"><?php echo $row['lastname'];?></td>
            <td style="font-size:13px; font-weight: 600"><?php echo $row['sex'];?></td>
            <td style="font-size:13px; font-weight: 600"><?php echo $row['grade'];?></td>
            <td style="font-size:13px; font-weight: 600"><?php echo $row['sectionname'];?></td>
            <td style="display:none"><?php echo $row['Advisor'];?></td>
            <td style="font-size:13px; font-weight: 600"><?php echo $row['modality'];?></td>    
            <td style="">                               
                <button type="button" class="badge btn btn-success editStudentSection forLRN" data-bs-toggle="modal" 
                data-bs-target="#editStudentSection" id="<?php echo $row['grade'];?>" data-bs-whatever="@getbootstrap" <?php echo($role =='Teacher')?'': 'hidden'?>>Edit</button>     
                <button type="button" name="viewstudent" id="<?php echo $row['studentID'];?>" data-bs-target="#viewStudentProfile" data-bs-toggle="modal"  class="badge btn btn-primary viewStudentProfile">Profile</button>  
                <button type="button" class="badge btn btn-danger admineditStudentSection" data-bs-toggle="modal" 
                data-bs-target="#admineditStudentSection" data-bs-whatever="@getbootstrap" <?php echo($role=='Admin')?'': 'hidden'?>>Archive</button>                                                                 
            </td>                                                                       
            </tr>
            <?php 
            $i++;
            } 
            ?> 
    </tbody>
    </table>
   
  
<script type="text/javascript">
    $(document).ready(function (){
        var table = $('#table1').DataTable( {
            lengthChange: true,
            order: [[1, 'asc']],
            buttons: [
                    {
                        extend: 'copy',
                        exportOptions: {
                            columns: ':visible'
                        }
                    },
                    {
                        extend: 'print',
                        exportOptions: {
                            columns: ':visible'
                        }
                    },
                    {
                        extend: 'excel',
                        exportOptions: {
                            columns: ':visible'
                        }
                    },
                    {
                        extend: 'pdf',
                        exportOptions: {
                            columns: ':visible'
                        }
                    },
                    'colvis'
                ],
        });
        table.buttons().container()
            .appendTo( '#table1_wrapper .col-md-6:eq(0)');

       
     
    });
</script>

 

