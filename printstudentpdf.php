<?php
require_once('TCPDF-main/tcpdf.php');

// MultiCell($w, $h, $txt, $border=0, $align='J', $fill=0, $ln=1, $x='', $y='', $reseth=true, $stretch=0, $ishtml=false, $autopadding=true, $maxh=0)


class pdf extends TCPDF
{
    
  //Page header
  public function Header() {
    
    include_once('connect.php');

    if (isset($_POST['printstudent'])){
    $id = $_POST['printId'];
    error_reporting(0);

    $query = "SELECT student_tbl.`id`, CONCAT(firstname,' ',middlename,' ',lastname) AS `Name`, age, sex, DATE_FORMAT(birthday, '%M %d,%Y') AS `birthday`,
    CONCAT(street,', ',barangay,', ',municipality) AS `address`, photo, mothertongue, religion, lrn, gname, gcontactno, DATE_FORMAT(dateofenroll, '%M %d,%Y') AS `dateenroll`,
    studentType, 4Ps, specifyneeds,specifyneeds2, assistivetech, specifyassistivetech
    FROM student_tbl
    INNER JOIN enrollment_tbl
    ON student_tbl.`id` = enrollment_tbl.`student_id`
    where student_tbl.`id` = '".$id."'";
    $result = mysqli_query($connection,$query);
    
    $row = mysqli_fetch_array($result);
     
    $name = $row['Name'];
    $lrn = $row['lrn'];
    $studenttype = $row['studentType'];
    $bdate = $row['birthday'];
    $age = $row['age'];
    $gender = $row['sex'];
    $address = $row['address'];
    $mothertongue = $row['mothertongue'];
    $religion = $row['religion'];
    $fourps = $row['4Ps'];
    $gname = $row['gname'];
    $gcontact = $row['gcontactno'];
    $disability = $row['specifyneeds'];
    $other = $row['specifyneeds2'];
    $assistech = $row['specifyassistivetech'];
    $photo = $row['photo'];

    // Logo
    $image_file = K_PATH_IMAGES.'depedlogo.png';
    $this->Image($image_file, 8, 8, 25,25 , 'PNG', '', 'T', false, 300, '', false, false, 0, false, false, false);
    // Set font
    $this->SetFont('helvetica', 'B', 15);
    // Title
    $this->Cell(0,0,'',0,1,'C');
    $this->Cell(0,0,'Sorsogon Pilot Elementary School',0,1,'C');
    // Set font
    $this->SetFont('helvetica', 'B', 9);
    $this->Cell(0,0,'De Vera St, Sorsogon City, 4700 Sorsogon',0,1,'C');
    $this->Cell(0,10,'',0,1,'C');
    // Set font
    $this->SetFont('helvetica', 'B', 13);
    $this->Cell(0,0,'STUDENT PROFILE',0,1,'C');

    $this->Cell(0,10,'',0,1,'C');
    $this->SetFont('helvetica', 'B', 9);
    $this->Image('uploads/'.$photo, '', '', 30, 30, '', '', '', false, 300, '', false, false, 1, false, false, false);
    $this->MultiCell(40, 10, '', 0, 'C', 0, 0, '', '', true, 0, false, true, 9, 'M');
    $this->MultiCell(36, 10, ' Name', 1, 'L', 0, 0, '', '', true, 0, false, true, 9, 'M');
    $this->MultiCell(110, 10, ' '.$name, 1, 'C', 0, 1, '', '', true, 0, false, true, 9, 'M');
    $this->MultiCell(40, 10, '', 0, 'C', 0, 0, '', '', true, 0, false, true, 9, 'M');
    $this->MultiCell(36, 10, ' LRN', 1, 'L', 0, 0, '', '', true, 0, false, true, 9, 'M');
    $this->MultiCell(110, 10, ' '.$lrn, 1, 'C', 0, 1, '', '', true, 0, false, true, 9, 'M');
    $this->MultiCell(40, 10, '', 0, 'C', 0, 0, '', '', true, 0, false, true, 9, 'M');
    $this->MultiCell(36, 10, ' Student Type', 1, 'L', 0, 0, '', '', true, 0, false, true, 9, 'M');
    $this->MultiCell(110, 10, ' '.$studenttype, 1, 'C', 0, 1, '', '', true, 0, false, true, 9, 'M');


    $this->Cell(0,10,'',0,1,'C');
    $this->MultiCell(186, 11, 'BASIC INFORMATION', 1, 'C', 0, 1, '', '', true, 0, false, true, 9, 'M');
    $this->MultiCell(35, 10, ' Birthday', 1, 'L', 0, 0, '', '', true, 0, false, true, 9, 'M');
    $this->MultiCell(70, 10, ' '.$bdate, 1, 'C', 0, 0, '', '', true, 0, false, true, 9, 'M');
    $this->MultiCell(35, 10, ' Age', 1, 'L', 0, 0, '', '', true, 0, false, true, 9, 'M');
    $this->MultiCell(46, 10, ' '.$age, 1, 'C', 0, 1, '', '', true, 0, false, true, 9, 'M');
    $this->MultiCell(35, 10, ' Gender', 1, 'L', 0, 0, '', '', true, 0, false, true, 9, 'M');
    $this->MultiCell(70, 10, ' '.$gender, 1, 'C', 0, 0, '', '', true, 0, false, true, 9, 'M');
    $this->MultiCell(35, 10, ' Mothertongue', 1, 'L', 0, 0, '', '', true, 0, false, true, 9, 'M');
    $this->MultiCell(46, 10, ' '.$mothertongue, 1, 'C', 0, 1, '', '', true, 0, false, true, 9, 'M');
    $this->MultiCell(35, 10, ' Address', 1, 'L', 0, 0, '', '', true, 0, false, true, 9, 'M');
    $this->MultiCell(151, 10, ' '.$address, 1, 'C', 0, 1, '', '', true, 0, false, true, 9, 'M');
    $this->MultiCell(35, 10, ' Religion', 1, 'L', 0, 0, '', '', true, 0, false, true, 9, 'M');
    $this->MultiCell(70, 10, ' '.$religion, 1, 'C', 0, 0, '', '', true, 0, false, true, 9, 'M');
    $this->MultiCell(35, 10, ' 4Ps Beneficiary', 1, 'L', 0, 0, '', '', true, 0, false, true, 9, 'M');
    $this->MultiCell(46, 10, ' '.$fourps, 1, 'C', 0, 1, '', '', true, 0, false, true, 9, 'M');

    $this->Cell(0,10,'',0,1,'C');
    $this->MultiCell(186, 11, 'PARENT/GUARDIAN INFORMATION', 1, 'C', 0, 1, '', '', true, 0, false, true, 9, 'M');
    $this->MultiCell(50, 10, ' Guardian Name', 1, 'L', 0, 0, '', '', true, 0, false, true, 9, 'M');
    $this->MultiCell(136, 10, ' '.$gname, 1, 'C', 0, 1, '', '', true, 0, false, true, 9, 'M');
    $this->MultiCell(50, 10, ' Guardian Contact', 1, 'L', 0, 0, '', '', true, 0, false, true, 9, 'M');
    $this->MultiCell(136, 10, ' '.$gcontact, 1, 'C', 0, 1, '', '', true, 0, false, true, 9, 'M');


    $this->Cell(0,10,'',0,1,'C');
    $this->MultiCell(186, 11, 'FOR SPECIAL EDUCATION LEARNERS', 1, 'C', 0, 1, '', '', true, 0, false, true, 9, 'M');
    $this->MultiCell(50, 10, ' Disability', 1, 'L', 0, 0, '', '', true, 0, false, true, 9, 'M');
    $this->MultiCell(136, 10, ' '.$disability, 1, 'C', 0, 1, '', '', true, 0, false, true, 9, 'M');
    $this->MultiCell(50, 10, ' Others', 1, 'L', 0, 0, '', '', true, 0, false, true, 9, 'M');
    $this->MultiCell(136, 10, ' '.$other, 1, 'C', 0, 1, '', '', true, 0, false, true, 9, 'M');
    $this->MultiCell(50, 10, ' Assistive Technology', 1, 'L', 0, 0, '', '', true, 0, false, true, 9, 'M');
    $this->MultiCell(136, 10, ' '.$assistech, 1, 'C', 0, 1, '', '', true, 0, false, true, 9, 'M');



    //first row  
    }
    else{

        }
    }

}





// create new PDF document
$pageLayout = array(210, 297); //  or array($height, $width) 
$pdf = new PDF('p', 'mm', $pageLayout, true, 'UTF-8', false);
//$pdf = new PDF('l', 'mm', 'A4');

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('SPES');
$pdf->SetTitle('TCPDF Example 001');
$pdf->SetSubject('');
$pdf->SetKeywords('');

// set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(10, PDF_MARGIN_TOP,5);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);



/* $pdf->Cell(29,16, ' LRN',1,0,'');
$pdf->Multicell(20,16, ' NAME (Last Name, First Name, Middle Name) ',1,0,'');
$pdf->Cell(65,16, ' Reason (Enrollment beyond 1st Friday of June)',1,0,'');
$pdf->Cell(20,16, ' ',1,0,'');
$pdf->Cell(11,16, ' ACL',1,0,'');
$pdf->Cell(65,16, ' Specify Level & Effectivity Data',1,0,'');
$pdf->Cell(29,16, ' Late Enrollment',1,0,'');
$pdf->Cell(11,16, ' LE',1,0,'');
$pdf->Cell(65,16, ' Reason (Enrollment beyond 1st Friday of June)',1,0,'');
$pdf->Cell(20,16, ' ',1,0,'');
$pdf->Cell(11,16, ' ACL',1,0,'');
$pdf->Cell(65,16, ' Specify Level & Effectivity Data',1,0,'');
$pdf->Cell(20,16, ' ',1,0,'');
$pdf->Cell(11,16, ' ACL',1,0,'');
$pdf->Cell(65,16, ' Specify Level & Effectivity Data',1,0,'');
$pdf->Cell(49,16, '',0,0,'');
$pdf->Cell(65,16, ' Specify Level & Effectivity Data',1,0,'');
$pdf->Cell(49,16, '',0,0,''); */
// ---------------------------------------------------------
// Close and output PDF document
// This method has several options, check the source code documentation for more information.
$pdf->Output('sf1.pdf', 'I');
//============================================================+
// END OF FILE
//============================================================+
?>



