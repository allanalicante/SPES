<?php include('connect.php');
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


    $filterquery = "SELECT s.id AS `ClassID`, g.grade AS `Grade`, s.sectionname AS `Section`, t.name AS `Advisor`, 
    COUNT(IF(e.status = 'enrolled', e.section_id, NULL)) AS students, g.id,
    COUNT(IF(ss.sex = 'Male',ss.id, NULL)) AS `boys`, 
    COUNT(IF(ss.sex = 'female',ss.id, NULL)) AS `girls`, COUNT(ss.id) AS `total`
    FROM section_tbl s
    INNER JOIN gradelevel_tbl g
    ON g.id = s.gradelevel_id
    INNER JOIN teacher t
    ON t.id = s.teacher_id
    LEFT JOIN enrollment_tbl e
    ON e.section_id = s.id
    LEFT JOIN student_tbl ss
    ON e.student_id = ss.id ";

    $footerquery=" GROUP BY s.id
    ORDER BY g.id";

    //for assigning class for pending student
    if(isset($_REQUEST['grade']))
    {
        
        $grade = $_REQUEST['grade'];
        $query = "SELECT s.id,CONCAT(g.grade,' - ',s.sectionname) AS Grade_section, t.name
        FROM `gradelevel_tbl` g
        INNER JOIN `section_tbl` s ON s.gradelevel_id = g.id
        INNER JOIN `teacher` t ON t.id = s.teacher_id
        WHERE g.grade = '$grade'";

        $result = mysqli_query($connection, $query);
        if(mysqli_num_rows($result)>0)
        {
            echo'<option value=""  disabled selected hidden>Select Class</option>';
            while($row=$result->fetch_assoc())
            {
                echo'<option value='.$row['id'].'>'.$row['Grade_section'].' (Advisor: '.$row['name'].')';'</option>';
            }
        }
        else{
            echo'<option value="" disabled selected hidden>No Available Class</option>';
        }
    }
    //for assigning specific teacher for each grade level/
    elseif(isset($_REQUEST['gradeadvisor']))
    {
        
        $grade = $_REQUEST['gradeadvisor'];
        $query = "SELECT id, name FROM teacher
        where gradetohandle = '$grade'";

        $result = mysqli_query($connection, $query);
        if(mysqli_num_rows($result)>0)
        {
            echo'<option value=""  disabled selected hidden>Select Adviser</option>';
            while($row=$result->fetch_assoc())
            {
                echo'<option value='.$row['id'].'>'.$row['name'].'</option>';
            }
        }
        else{
            echo'<option value="" disabled selected hidden>No Available Adviser</option>';
        }
    }
    // for viewing class record
    elseif(isset($_REQUEST['sectionid']))
    {
        $output = '';
        $query = "SELECT CONCAT(lastname,', ',firstname,', ',middlename) AS `Name`, age, sex, 
        DATE_FORMAT(birthday, '%M %d,%Y') AS `birthday`, CONCAT(street,',',barangay,',',municipality) AS `Address`
        FROM student_tbl s
        INNER JOIN enrollment_tbl e
        ON e.student_id = s.id
        WHERE e.status = 'enrolled'
        AND e.section_id = '".$_POST['sectionid']."'
        ORDER BY lastname ASC";
        $result = mysqli_query($connection, $query);

        $query2 = "SELECT s.teacher_id, CONCAT(g.grade,' - ', s.sectionname) AS `Class`, u.image, t.name
        FROM section_tbl s
        INNER JOIN gradelevel_tbl g
        ON g.id = s.gradelevel_id
        INNER JOIN teacher t
        ON t.id = s.teacher_id
        INNER JOIN users u
        ON u.id = t.id
        WHERE s.id ='".$_POST['sectionid']."'";
        $result2 = mysqli_query($connection, $query2);
        while ($row = mysqli_fetch_array($result2)) {           
            $class = $row['Class'];
            $advisor = $row['name'];
            $image_name = $row["image"];
         }  

         $query3 = "SELECT COUNT(IF(s.sex = 'Male',s.id, NULL)) AS `male`, 
         COUNT(IF(s.sex = 'female',s.id, NULL)) AS `female`, COUNT(s.id) AS `total`
         FROM student_tbl s
         INNER JOIN enrollment_tbl e
         ON s.id = e.student_id
         WHERE e.status = 'enrolled'
         AND e.section_id ='".$_POST['sectionid']."'";
         $result3 = mysqli_query($connection, $query3);
         while ($row = mysqli_fetch_array($result3)) {           
            $male = $row['male'];
            $female = $row['female'];
            $total = $row["total"];
         }  

        $output .= '
 
        <div class="row">
            <div class="col-lg-2 col-md-2">
                <div class="card" style="border: 1px solid #201f1f17; border-radius:0;">
                    <div class="card-header p-1 m-1" style="text-align: center;">    
                            <img style="width:85px;height:85px;object-fit: cover" src="uploads/'.$image_name.'">                        
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3">
                <table class = "table table-bordered" id="table1">
                    <tbody>
                        <tr>
                            <td width="30%" style="font-size:12px; font-weight: 600"><label><strong>Section</strong></label></td>
                            <td width="70%" style="font-size:12px; font-weight: 600">'.$class.'</td>
                        <tr>
                        <tr>  
                            <td width="30%" style="font-size:12px; font-weight: 600"><label><strong>Advisor</strong></label></td>  
                            <td width="70%" style="font-size:12px; font-weight: 600">'.$advisor.'</td>  
                        </tr>              
                    </body>
                </table>
            </div>
        </div>
            
        <div class="row">
            <div class="col-lg-12 col-md-12">  
                <table class = "table table-bordered text-center" id="table1">
                    <tr>
                        <th style="text-align: center;background-color: #d3d3d3;">Name</th>
                        <th style="text-align: center;background-color: #d3d3d3;">Age</th>
                        <th style="text-align: center;background-color: #d3d3d3;">Sex</th>
                        <th style="text-align: center;background-color: #d3d3d3;">Birthday</th>
                        <th style="text-align: center;background-color: #d3d3d3;">Address</th>
                    </tr>
            <tbody>';
        if(mysqli_num_rows($result)>0)
        {
            while($row=$result->fetch_assoc())
            {
               $output .= '
               <tr>
               <td style="text-align: center; font-size: 12px;">'.$row['Name'].'</td>
               <td style="text-align: center; font-size: 12px;">'.$row['age'].'</td>                                            
               <td style="text-align: center; font-size: 12px;">'.$row['sex'].'</td>
               <td style="text-align: center; font-size: 12px;">'.$row['birthday'].'</td>                                            
               <td style="text-align: center; font-size: 12px;">'.$row['Address'].'</td>                               
               </tr>' ;
            } 
            $output .= "</tbody></table></div></div>";
            echo $output;
        }
        else{
            echo '<td>No record found.</td>';
        }
    }
    // for viewing enrolled student details
    elseif(isset($_REQUEST['studentDetails']))
    {
        $output = '';
        $query = "SELECT CONCAT(firstname,' ',middlename,' ',lastname,' ',extension) AS `Name`, age, sex, DATE_FORMAT(birthday, '%M %d,%Y') AS `birthday`,
        CONCAT(street,',',barangay,',',municipality) AS `Address`, photo, mothertongue, religion, lrn, gname, gcontactno, DATE_FORMAT(dateofenroll, '%M %d,%Y') AS `dateenroll`,
        studentType, 4Ps, specifyneeds,specifyneeds2, assistivetech, specifyassistivetech
        FROM student_tbl
        INNER JOIN enrollment_tbl
	    ON student_tbl.`id` = enrollment_tbl.`student_id`		 
        WHERE student_tbl.`id` = '".$_POST['studentDetails']."'";
        $result = mysqli_query($connection, $query);

        $query2 = "SELECT CONCAT(firstname,' ',middlename,' ',lastname,' ',extension) AS `Name`, age, lrn, sex, DATE_FORMAT(birthday, '%M %d,%Y') AS `birthday`,
        CONCAT(street,',',barangay,',',municipality) AS `Address`, photo, studenttype
        FROM student_tbl 
        WHERE id = '".$_POST['studentDetails']."'";
        $result2 = mysqli_query($connection, $query2);
        while ($row = mysqli_fetch_array($result2)) {           
            $photo  = $row['photo'];
            $Name = $row['Name'];
            $birthdate = $row['birthday'];
            $age = $row['age'];
            $lrn = $row['lrn'];
            $studenttype = $row['studenttype'];
        }  
        $output .= '
        <div class="row">
            <div class="col-lg-3 col-md-3">
                <div class="card" style="border: 1px solid #201f1f17; border-radius:0;">
                    <div class="card-header p-1 m-1" style="text-align: center;">    
                            <img style="width:85px;height:85px;object-fit: cover" src="uploads/'.$photo.'">                        
                    </div>
                </div>
            </div>
            <div class="col-lg-9 col-md-9">
                <table class = "table table-bordered" id="table1">
                    <tbody>
                        <tr>
                            <td width="30%" style="font-size:12px; font-weight: 600"><label><strong>Name</strong></label></td>
                            <td width="70%" style="font-size:12px; font-weight: 600">'.$Name.'</td>
                        <tr>
                        <tr>  
                            <td width="30%" style="font-size:12px; font-weight: 600"><label><strong>LRN</strong></label></td>  
                            <td width="70%" style="font-size:12px; font-weight: 600">'.$lrn.'</td>  
                        </tr> 
                        <tr>  
                            <td width="30%" style="font-size:12px; font-weight: 600"><label><strong>Student Type</strong></label></td>  
                            <td width="70%" style="font-size:12px; font-weight: 600">'.$studenttype.'</td>  
                        </tr>               
                    </body>
                </table>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12 col-md-12"> 
                 <table class = "table table-bordered" id="table1">
                    <tbody>';
        if(mysqli_num_rows($result)>0)
        {
            while($row=$result->fetch_assoc())
            {
               $output .= '
               <tr>  
                <td colspan="2" width="100%" style="background-color: #d3d3d3;font-size:12px; font-weight: 600; text-align: center; text-transform: uppercase"><label><strong>Basic Information</strong></label></td>   
          </tr>  
          <tr>
                <td width="30%" style="font-size:12px; font-weight: 600"><label><strong>Birthday</strong></label></td>
                <td width="70%" style="font-size:12px; font-weight: 600">'.$row["birthday"].'</td>
        </tr>
        <tr>
            <td width="30%" style="font-size:12px; font-weight: 600"><label><strong>Age</strong></label></td>
            <td width="70%" style="font-size:12px; font-weight: 600">'.$row["age"].'</td>
         </tr>
          <tr>  
               <td width="30%" style="font-size:12px; font-weight: 600"><label><strong>Gender</strong></label></td>  
               <td width="70%" style="font-size:12px; font-weight: 600">'.$row["sex"].'</td>  
          </tr>  
          <tr>  
               <td width="30%" style="font-size:12px; font-weight: 600"><label><strong>Address</strong></label></td>  
               <td width="70%" style="font-size:12px; font-weight: 600">'.$row["Address"].'</td>  
          </tr>  
          <tr>  
               <td width="30%" style="font-size:12px; font-weight: 600"><label><strong>Mothertongue</strong></label></td>  
               <td width="70%" style="font-size:12px; font-weight: 600">'.$row["mothertongue"].'</td>  
          </tr>
          <tr>  
               <td width="30%" style="font-size:12px; font-weight: 600"><label><strong>Religion</strong></label></td>  
               <td width="70%" style="font-size:12px; font-weight: 600">'.$row["religion"].'</td>  
          </tr>
        
          <tr>  
               <td width="30%" style="font-size:12px; font-weight: 600"><label><strong>4Ps Beneficiary</strong></label></td>  
               <td width="70%" style="font-size:12px; font-weight: 600">'.$row["4Ps"].'</td>  
          </tr>
          <tr>  
            <td colspan="2" width="100%" style="background-color: #d3d3d3;font-size:12px; font-weight: 600; text-align: center; text-transform: uppercase"><label><strong>Parent/Guardian Information</strong></label></td>   
          </tr>
          <tr>  
            <td width="30%" style="font-size:12px; font-weight: 600"><label><strong>Guardian Name</strong></label></td>  
            <td width="70%" style="font-size:12px; font-weight: 600">'.$row["gname"].'</td>  
          </tr>
          <tr>  
            <td width="30%" style="font-size:12px; font-weight: 600"><label><strong>Guardian Contact No.</strong></label></td>  
            <td width="70%" style="font-size:12px; font-weight: 600">'.$row["gcontactno"].'</td>  
          </tr>
          <tr>  
            <td colspan="2" width="100%" style="background-color: #d3d3d3;font-size:12px; font-weight: 600; text-align: center; text-transform: uppercase"><label><strong>For Special Education Learners</strong></label></td>   
          </tr>
          <tr>  
            <td width="30%" style="font-size:12px; font-weight: 600"><label><strong>Disability</strong></label></td>  
            <td width="70%" style="font-size:12px; font-weight: 600">'.$row["specifyneeds"].'</td>  
          </tr>
          <tr>  
            <td width="30%" style="font-size:12px; font-weight: 600"><label><strong>Other</strong></label></td>  
            <td width="70%" style="font-size:12px; font-weight: 600">'.$row["specifyneeds2"].'</td>  
          </tr>
          <tr>  
            <td width="30%" style="font-size:12px; font-weight: 600"><label><strong>Assistive Technology</strong></label></td>  
            <td width="70%" style="font-size:12px; font-weight: 600">'.$row["specifyassistivetech"].'</td>  
          </tr>
               ';
            } 
            $output .= "</tbody></table>";
            echo $output;
        }
        else{
            echo '<td>No record found.</td>';
        }
    }
    // for viewing pending student details
    elseif(isset($_REQUEST['verifyStudents']))
    {
        $output = '';
        $query = "SELECT CONCAT(firstname,' ',middlename,' ',lastname) AS `Name`, age, sex, DATE_FORMAT(birthday, '%M %d,%Y') AS `birthday`,
        CONCAT(street,', ',barangay,', ',municipality) AS `Address`, s.photo, s.mothertongue, s.religion, s.lrn, s.gname, s.gcontactno, s.studentType, s.4Ps,
        specifyneeds,specifyneeds2, assistivetech, specifyassistivetech
        FROM student_tbl s
        WHERE s.id = '".$_POST['verifyStudents']."'";
        $result = mysqli_query($connection, $query);

        $query2 = "SELECT CONCAT(firstname,' ',middlename,' ',lastname) AS `Name`, age, lrn, sex, DATE_FORMAT(birthday, '%M %d,%Y') AS `birthday`,
        CONCAT(street,', ',barangay,', ',municipality) AS `Address`, s.photo, studenttype
        FROM student_tbl s
        WHERE s.id = '".$_POST['verifyStudents']."'";
        $result2 = mysqli_query($connection, $query2);
        while ($row = mysqli_fetch_array($result2)) {           
            $photo  = $row['photo'];
            $Name = $row['Name'];
            $birthdate = $row['birthday'];
            $age = $row['age'];
            $lrn = $row['lrn'];
            $studenttype = $row['studenttype'];
         }  

        $output .= '
    
        <div class="row">
            <div class="col-lg-3 col-md-3">
                <div class="card" style="border: 1px solid #201f1f17; border-radius:0;">
                    <div class="card-header p-1 m-1" style="text-align: center;">    
                              <img style="width:85px;height:85px;object-fit: cover" src="uploads/'.$photo.'">                        
                    </div>
                </div>
            </div>
            <div class="col-lg-9 col-md-9">
                <table class = "table table-bordered" id="table1">
                    <tbody>
                        <tr>
                            <td width="30%" style="font-size:12px; font-weight: 600"><label><strong>Name</strong></label></td>
                            <td width="70%" style="font-size:12px; font-weight: 600">'.$Name.'</td>
                        </tr>
                        <tr>  
                            <td width="30%" style="font-size:12px; font-weight: 600"><label><strong>LRN</strong></label></td>  
                            <td width="70%" style="font-size:12px; font-weight: 600">'.$lrn.'</td>  
                        </tr>
                        <tr>  
                            <td width="30%" style="font-size:12px; font-weight: 600"><label><strong>Student Type</strong></label></td>  
                            <td width="70%" style="font-size:12px; font-weight: 600">'.$studenttype.'</td>  
                        </tr>
                       
                
                    </body>
                </table>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 col-md-12"> 
                <table class = "table table-bordered" id="table1">
                    <tbody>';
        if(mysqli_num_rows($result)>0)
        {
            while($row=$result->fetch_assoc())
            {
               $output .= '
          <tr>  
                <td colspan="2" width="100%" style="background-color: #d3d3d3;font-size:12px; font-weight: 600; text-align: center; text-transform: uppercase"><label><strong>Basic Information</strong></label></td>   
          </tr>  
         
          <tr>
                <td width="30%" style="font-size:12px; font-weight: 600"><label><strong>Birthday</strong></label></td>
                <td width="70%" style="font-size:12px; font-weight: 600">'.$row["birthday"].'</td>
        </tr>
         <tr>
                <td width="30%" style="font-size:12px; font-weight: 600"><label><strong>Age</strong></label></td>
                <td width="70%" style="font-size:12px; font-weight: 600">'.$row["age"].'</td>
          </tr> 
          <tr>  
               <td width="30%" style="font-size:12px; font-weight: 600"><label><strong>Gender</strong></label></td>  
               <td width="70%" style="font-size:12px; font-weight: 600">'.$row["sex"].'</td>  
          </tr>  
          <tr>  
               <td width="30%" style="font-size:12px; font-weight: 600"><label><strong>Address</strong></label></td>  
               <td width="70%" style="font-size:12px; font-weight: 600">'.$row["Address"].'</td>  
          </tr>  
          <tr>  
               <td width="30%" style="font-size:12px; font-weight: 600"><label><strong>Mothertongue</strong></label></td>  
               <td width="70%" style="font-size:12px; font-weight: 600">'.$row["mothertongue"].'</td>  
          </tr>
          <tr>  
               <td width="30%" style="font-size:12px; font-weight: 600"><label><strong>Religion</strong></label></td>  
               <td width="70%" style="font-size:12px; font-weight: 600">'.$row["religion"].'</td>  
          </tr>
          <tr>  
               <td width="30%" style="font-size:12px; font-weight: 600"><label><strong>4Ps Beneficiary</strong></label></td>  
               <td width="70%" style="font-size:12px; font-weight: 600">'.$row["4Ps"].'</td>  
          </tr>
          <tr>  
            <td colspan="2" width="100%" style="background-color: #d3d3d3;font-size:12px; font-weight: 600; text-align: center; text-transform: uppercase"><label><strong>Parent/Guardian Information</strong></label></td>   
          </tr>
          <tr>  
            <td width="30%" style="font-size:12px; font-weight: 600"><label><strong>Guardian Name</strong></label></td>  
            <td width="70%" style="font-size:12px; font-weight: 600">'.$row["gname"].'</td>  
          </tr>
          <tr>  
            <td width="30%" style="font-size:12px; font-weight: 600"><label><strong>Guardian Contact No.</strong></label></td>  
            <td width="70%" style="font-size:12px; font-weight: 600">'.$row["gcontactno"].'</td>  
          </tr>
          <tr>  
            <td colspan="2" width="100%" style="background-color: #d3d3d3;font-size:12px; font-weight: 600; text-align: center; text-transform: uppercase"><label><strong>For Special Education Learners</strong></label></td>   
          </tr>
          <tr>  
            <td width="30%" style="font-size:12px; font-weight: 600"><label><strong>Disability</strong></label></td>  
            <td width="70%" style="font-size:12px; font-weight: 600">'.$row["specifyneeds"].'</td>  
          </tr>
          <tr>  
            <td width="30%" style="font-size:12px; font-weight: 600"><label><strong>Other</strong></label></td>  
            <td width="70%" style="font-size:12px; font-weight: 600">'.$row["specifyneeds2"].'</td>  
          </tr>
          <tr>  
            <td width="30%" style="font-size:12px; font-weight: 600"><label><strong>Assistive Technology</strong></label></td>  
            <td width="70%" style="font-size:12px; font-weight: 600">'.$row["specifyassistivetech"].'</td>  
          </tr>
               ';
            } 
            $output .= "</tbody></table>";
            echo $output;
        }
        else{
            echo '<td>No record found.</td>';
        }
    }
    // for searching lrn student registration status
    elseif(isset($_REQUEST['search2']))
    {
        $output = '';
        $sql = "SELECT * FROM student_tbl s
        INNER JOIN enrollment_tbl e
        ON e.student_id = s.id
        INNER JOIN gradelevel_tbl g
        ON s.`gradetoenroll` = g.`id`
        left JOIN section_tbl ss
        ON e.`section_id` = ss.`id`
        left JOIN teacher t
        ON ss.`teacher_id` = t.`id`
        WHERE (e.`status` != 'renew')
        AND (s.lrn = '" . $_REQUEST['search2'] . "')
        OR CONCAT(s.`firstname`,' ',s.lastname,' ',s.birthday) LIKE '" . $_REQUEST['search2'] . "'";
        $result = mysqli_query($connection, $sql);
        if(mysqli_num_rows($result) > 0)
        {
            $output .= '<h4 align="center">Search Result</h4>';
            $output .= '<table class="text-center table table-bordered table-striped" id="table1">
                            <thead style="background-color: #435ebe; color: white; ">
                                <tr>
                                    <th style="">ID</th>
                                    <th style="">Photo</th>
                                    <th style="text-align:center;">LRN</th>
                                    <th style="text-align: center;">First name</th>
                                    <th style="text-align: center;">Middle name</th>
                                    <th style="text-align: center;">Last name</th>
                                    <th style="text-align: center;">Grade</th>
                                    <th style="text-align: center;">Section</th>
                                    <th style="text-align: center;">Adviser</th>
                                    <th style="text-align: center;">Modality</th>
                                    <th style="text-align: center;">Status</th>                                  
                                </tr>
                            </thead>';
                    while($row = mysqli_fetch_array($result))
                    {
                        $photo  = $row['photo'];
                       $output .='
                            <tr>
                                <td style="font-size:14px; font-weight: 600">'.$row["id"].'</td>
                                <td style="font-size:14px; font-weight: 600"><img style="width: 40px;height:40px;object-fit: cover; border-radius: 50%" src="uploads/'.$photo.'"></td>
                                <td style="font-size:14px; font-weight: 600">'.$row["lrn"].'</td>
                                <td style="font-size:14px; font-weight: 600">'.$row["firstname"].'</td>
                                <td style="font-size:14px; font-weight: 600">'.$row["middlename"].'</td>
                                <td style="font-size:14px; font-weight: 600">'.$row["lastname"].'</td>
                                <td style="font-size:14px; font-weight: 600">'.$row["grade"].'</td>
                                <td style="font-size:14px; font-weight: 600">'.$row["sectionname"].'</td>
                                <td style="font-size:14px; font-weight: 600">'.$row["name"].'</td>
                                <td style="font-size:14px; font-weight: 600">'.$row["modality"].'</td>
                                <td style="font-size:14px; font-weight: 600">'.$row["status"].'</td>                              
                            </tr>
                       '; 
                    }
                    echo $output;
        }
        else
        {
            echo 'Data Not Found';
        }
    }
    elseif(isset($_REQUEST['search']))
    {
        $query = "SELECT * FROM student_tbl s
        INNER JOIN enrollment_tbl e
        ON e.student_id = s.id
 
        WHERE (s.lrn = '" . $_REQUEST['search'] . "' AND e.status = 'enrolled') OR 
        (s.lrn = '" . $_REQUEST['search'] . "' AND e.status ='Dropped Out') OR 
        (s.lrn = '" . $_REQUEST['search'] . "' AND e.status ='Transferred Out') OR
        (s.lrn = '" . $_REQUEST['search'] . "' AND e.status ='pending')";
        $result = mysqli_query($connection,$query) ;
    
        if(mysqli_num_rows($result)>0)
        {
            $data = mysqli_fetch_all($result,MYSQLI_ASSOC);
            echo json_encode($data);
        }
        else
        {
            echo("LRN not found");
        }
    } 
    elseif(isset($_REQUEST['classid']))
    {
          $output = '';
          $query = "SELECT DISTINCT (s.id) AS `studentID`, s.lrn, s.photo, s.lastname, s.firstname, s.middlename,
                  g.grade, ss.sectionname, t.name AS `Advisor`, s.modality, s.studenttype 
                  FROM student_tbl s
                  INNER JOIN enrollment_tbl e
                  ON e.student_id = s.id
                  INNER JOIN section_tbl ss
                  ON ss.id = e.section_id
                  INNER JOIN gradelevel_tbl g
                  ON g.id = ss.gradelevel_id
                  INNER JOIN teacher t
                  ON t.id = ss.teacher_id
                  WHERE ss.`id` = '".$_REQUEST['classid']."'
                  GROUP BY studentID
                  ORDER BY s.lastname ASC";        
                  $result = mysqli_query($connection, $query);
                  $i=1;
  
                  $query2 = "SELECT s.teacher_id, CONCAT(g.grade,' - ', s.sectionname) AS `Class`, u.image, t.name
                  FROM section_tbl s
                  INNER JOIN gradelevel_tbl g
                  ON g.id = s.gradelevel_id
                  INNER JOIN teacher t
                  ON t.id = s.teacher_id
                  INNER JOIN users u
                  ON u.id = t.id
                  WHERE s.id ='".$_REQUEST['classid']."'";
                  $result2 = mysqli_query($connection, $query2);
                  while ($row = mysqli_fetch_array($result2)) {           
                      $class = $row['Class'];
                      $advisor = $row['name'];
                      $image_name = $row["image"];
                      } 
  
                  $query3 = "SELECT COUNT(IF(s.sex = 'Male',s.id, NULL)) AS `male`, 
                  COUNT(IF(s.sex = 'female',s.id, NULL)) AS `female`, COUNT(s.id) AS `total`
                  FROM student_tbl s
                  INNER JOIN enrollment_tbl e
                  ON s.id = e.student_id
                  WHERE e.status = 'enrolled'
                  AND e.section_id ='".$_REQUEST['classid']."'";
                  $result3 = mysqli_query($connection, $query3);
                  while ($row = mysqli_fetch_array($result3)) {           
                  $male = $row['male'];
                  $female = $row['female'];
                  $total = $row["total"];
                  } 
          
                  $output .= '
                     
  
          <div class="page-heading"> <!--------------------------------- Profile Statistic Heading -------------------------->
              <div class="page-title">
                          <div class="row">
                              <div class="col-12 col-md-6 order-md-1 order-last">
                                  <h3>'.$class.'</h3>
                              </div>
                              <div class="col-12 col-md-6 order-md-2 order-first">
                                  <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                      <ol class="breadcrumb">
                                          <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                                          <li class="breadcrumb-item active" aria-current="page">Section</li>
                                      </ol>
                                  </nav>
                              </div>
                          </div>
                      </div>
              </div>
              <div class="page-content">
                  <section class="row">
                      <div class="col-12 col-lg-12 ">  <!-------------------- Basic Statistics Row 1 -------------------------->
                              <div class="row">
                                  <div class="col-12 col-lg-3 col-md-6">
                                      <div class="card" >                               
                                          <div class="card-body py-4">
                                              <div class="d-flex align-items-center">
                                                  <div class="stats-icon">
                                                  <img style="width: 50px;height:50px;object-fit: cover; border-radius: 50%" 
                                                  src="uploads/'.$image_name.'"/>
                                                  </div>
                                                  <div class="ms-3 name">
                                                      <h6 class="text-muted font-semibold">Advisor</h6>
                                                      <h6 class="font-extrabold mb-0">'.$advisor.'</h5>                       
                                                  </div>
                                              </div>  
                                          </div>                                 
                                      </div>
                                  </div>
                                  <div class="col-12 col-lg-3 col-md-6">
                                          <div class="card">
                                              <div class="card-body py-4">                                         
                                                      <div class="d-flex align-items-center">
                                                          <div class="stats-icon purple">
                                                              <lord-icon
                                                              src="https://cdn.lordicon.com/kjkiqtxg.json"
                                                              trigger="hover"
                                                              colors="outline:#121331,primary:#b26836,,secondary:#4bb3fd,tertiary:#f9c9c0,quaternary:#ebe6ef"
                                                              style="width:250px;height:250px">
                                                          </lord-icon>
                                                          </div>
                                                      <div class="ms-3 name">
                                                          <h6 class="text-muted font-semibold">Total Pupils</h6>
                                                          <h6 class="font-extrabold mb-0">'.$total.'</h6>
                                                      </div>
                                                  </div>
                                              </div>
                                          </div>
                                  </div>
                                  <div class="col-12 col-lg-3 col-md-6">
                                          <div class="card">
                                              <div class="card-body py-4">                                           
                                                      <div class="d-flex align-items-center">
                                                          <div class="stats-icon blue">
                                                          <lord-icon
                                                              src="https://cdn.lordicon.com/vusrdugn.json"
                                                              trigger="hover"
                                                              colors="outline:#121331,primary:#b26836,secondary:#4bb3fd,tertiary:#f9c9c0,quaternary:#ebe6ef"
                                                              style="width:250px;height:250px">
                                                          </lord-icon>                                                  
                                                          </div>                                             
                                                      <div class="ms-3 name">
                                                          <h6 class="text-muted font-semibold">Total Boys</h6>
                                                          <h6 class="font-extrabold mb-0">'.$male.'</h6>
                                                      </div>
                                              </div>                                      
                                          </div>
                                      </div>      
                                  </div>
                                  <div class="col-12 col-lg-3 col-md-6">
                                          <div class="card">
                                              <div class="card-body py-4">
                                                  <div class="d-flex align-items-center">                                               
                                                          <div class="stats-icon green">
                                                          <lord-icon
                                                              src="https://cdn.lordicon.com/qemhfpjm.json"
                                                              trigger="hover"
                                                              style="width:250px;height:250px">
                                                          </lord-icon>
                                                          </div>                                            
                                                      <div class="ms-3 name">
                                                          <h6 class="text-muted font-semibold">Total Girls</h6>
                                                          <h6 class="font-extrabold mb-0">'.$female.'</h6>
                                                      </div>
                                                  </div>
                                              </div>
                                          </div>
                                  </div>
                              </div>
  
                      <div class="col-12 col-lg-12 ">  <!-------------------- Student list Row 2 -------------------------->
                          <div class="card">                   
                              <div class="card-header"></div>                                                   
                              <div class="card-body">                      
                                  <table class="text-center table table-bordered table-striped" id="table1">   
                                      <thead style="background-color: #435ebe; color: white; ">
                                          <tr>
                                              <th style="display: none">ID</th>
                                              <th style="text-align:center;">#</th>                                      
                                              <th style="text-align: center;">First name</th>
                                              <th style="text-align: center;">Middle name</th>
                                              <th style="text-align: center;">Last name</th>
                                              <th style="text-align:center;">LRN</th>
                                              <th style="text-align:center;">Student Type</th>
                                              <th style="text-align: center;">Modality</th>                                                                           
                                              <th style="text-align: center;">Action</th>                                                                           
                                          </tr>
                                      </thead>
                                      <tbody>';
  
                                      if(mysqli_num_rows($result)>0)
                                          {
                                              while($row=$result->fetch_assoc())
                                              {
                                              $output .= '
                                                                             
                                      <tr>
                                          <td style="font-size:13px; font-weight: 600;display: none">'.$row['studentID'].'</td>
                                          <td style="font-size:13px; font-weight: 600">'.$i.'</td>
                                          <td style="font-size:13px; font-weight: 600">'.$row['firstname'].'</td>
                                          <td style="font-size:13px; font-weight: 600">'.$row['middlename'].'</td>
                                          <td style="font-size:13px; font-weight: 600">'.$row['lastname'].'</td>
                                          <td style="font-size:13px; font-weight: 600">'.$row['lrn'].'</td>
                                          <td style="font-size:13px; font-weight: 600">'.$row['studenttype'].'</td>
                                          <td style="font-size:13px; font-weight: 600">'.$row['modality'].'</td>                                                                                   
                                          <td>
                                          <button type="button" name="viewstudent" id="'.$row['studentID'].'" data-bs-target="#viewStudentProfile" data-bs-toggle="modal"  class="badge btn btn-primary viewStudentProfile">Profile</button>
                                          </td>                                                                                 
                                      </tr>';
                                      
                                      $i++;} 
                                      $output .= "?></tbody></table></div>
                                                      </div>
                                                  </div>
                                              </section>
                                          </div>
                                      </div>";
                                      echo $output;
                                  }
                                  else {
                                      echo '<td>No record found.</td>';
                          }
    }   
    elseif(isset($_REQUEST['checklrn']))
    {
        $lrn = $_REQUEST['checklrn'];
        $query = "SELECT * from student_tbl WHERE lrn = '$lrn'";
        $result = mysqli_query($connection, $query);
        if(mysqli_num_rows($result)>0)
        {
            echo "Sorry, LRN is already in used.";
        }
        else{

        }
    }
    elseif(isset($_REQUEST['checkusername']))
    {
        $username = $_REQUEST['checkusername'];
        $query = "SELECT * FROM users WHERE username = '$username'";
        $result = mysqli_query($connection,$query);
        if(mysqli_num_rows($result)>0)
        {
            echo "Sorry, Username is already in used.";
        }
        else
        {

        }
    } 
    elseif(isset($_REQUEST['checksection']))
    {
        $section = $_REQUEST['checksection'];
        $query = "SELECT * FROM section_tbl WHERE sectionname = '$section'";
        $result = mysqli_query($connection,$query);
        if(mysqli_num_rows($result)>0)
        {
            echo "Sorry, Section is already existing.";
        }
        else
        {

        }
    }  
    elseif(isset($_REQUEST['gradelevelfilter']))
    {
        $request = $_REQUEST['gradelevelfilter'];
        if($request == "ALL")
        { 
            $filterquery .= $footerquery;
        }
        else
        {
            $filterquery .= "WHERE g.grade = '".$request."'
            GROUP BY s.id
            ORDER BY g.id";
        } 
        $query_run = mysqli_query($connection, $filterquery);
        $i=1;
        $count = mysqli_num_rows($query_run);
        ?>
                       
            <table class="text-center table table-bordered table-striped" id="table1" style="width:100%">
        <?php
        if ($count){
        ?>
                    <thead style="background-color: #435ebe; color: white;">
                        <tr>
                            <th style="Display:none">ID</th>
                            <th style="">#</th>
                            <th style="text-align: center;">Level</th>
                            <th style="text-align: center;">Section</th>
                            <th style="text-align: center;">Advisor</th>
                            <th style="text-align: center;">Action</th>                                                          
                        </tr>
                    </thead>
                    <tbody>
                    <?php
        }
        else
        {
            echo "Sorry! No record found";
        }
        ?>   
            <?php
            while($row = mysqli_fetch_assoc($query_run)){
                ?>
                <tr>
                    <td style="Display:none"><?php echo $row['ClassID'];?></td>
                    <td style="font-size:13px; font-weight: 600"><?php echo $i?></td>
                    <td style="font-size:13px; font-weight: 600"><?php echo $row['Grade'];?></td>
                    <td style="font-size:13px; font-weight: 600"><?php echo $row['Section'];?></td>
                    <td style="font-size:13px; font-weight: 600"><?php echo $row['Advisor'];?></td>
                    <td>                                                                                                                                                                                                                                                                                
                        <a href="index.php?page=section&classid=<?php echo $row['ClassID'];?>">
                        <button type="button" title="View Class" id="<?php echo $row['ClassID'];?>" class="badge btn btn-sm btn-info seeClass"><i class="bi bi-eye"></i></button></a>                                                                                                                                                                                                                                              
                    </td>                        
                </tr>
                <?php 
                $i++;
                } 
                ?> 
        </tbody>
        </table>
        <script>
            $(document).ready(function() {
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
                    ]
                } );          
                table.buttons().container()
                    .appendTo( '#table1_wrapper .col-md-6:eq(0)' );
            });
            </script>
   
<?php
    }
    ?>