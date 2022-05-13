<?php
require_once('TCPDF-main/tcpdf.php');
include_once('connect.php');


if(isset($_REQUEST['grade'])){

$query = "SELECT CONCAT(firstname,' ',middlename,' ',lastname) AS `Name`, age, sex, DATE_FORMAT(birthday, '%M %d,%Y') AS `birthday`,
CONCAT(street,',',barangay,',',municipality) AS `Address`, photo, mothertongue, religion, lrn, gname, gcontactno, DATE_FORMAT(dateofenroll, '%M %d,%Y') AS `dateenroll`,
studentType, 4Ps, specifyneeds,specifyneeds2, assistivetech, specifyassistivetech
FROM student_tbl
INNER JOIN enrollment_tbl
ON student_tbl.`id` = enrollment_tbl.`student_id`		 
WHERE student_tbl.`id` = '".$_POST['printdetails']."'";
$result = mysqli_query($connection, $query);


}
class pdf extends TCPDF
{
  //Page header
  public function Header() {

    if ($this->page == 1) {
    // Logo
    $image_file = K_PATH_IMAGES.'depedlogo.png';
    $this->Image($image_file, 8, 8, 25,25 , 'PNG', '', 'T', false, 300, '', false, false, 0, false, false, false);
    // Set font
    $this->SetFont('helvetica', 'B', 9);
    // Title
    $this->Cell(0,0, 'School Form 1 (SF 1) School Register',0,1,'C');
    // Set font
    $this->SetFont('helvetica', 'I', 5);
    // Mini Title
    $this->Cell(0,3, '                                      (This replaces Form 1, Master List & STS Form 2-Family Background and Profile)',0,1,'C');
    //first row
    $this->Cell(0,3, '',0,1,'C');
    $this->SetFont('helvetica', '', 12);
    $this->Cell(40,0, '',0,0,'');
    $this->Cell(20,0, 'School ID',0,0,'');
    $this->SetFont('helvetica', '', 8);
    $this->Cell(20,6, '114581',1,0,'C');
    $this->SetFont('helvetica', '', 12);
    $this->Cell(20,0, '      Region V',0,0,'');
    $this->Cell(20,0, '                     Division',0,0,'');
    $this->Cell(22,0, '',0,0,'');
    $this->SetFont('helvetica', '', 8);
    $this->Cell(65,6, ' Sorsogon City',1,0,'C');
    $this->SetFont('helvetica', '', 12);
    $this->Cell(14,0, '             District',0,0,'');
    $this->SetFont('helvetica', '', 8);
    $this->Cell(22,0, '',0,0,'');
    $this->Cell(42,6, ' Sorsogon West',1,0,'C');
    //second row
    $this->Cell(0,6, '',0,1,'C');
    $this->SetFont('helvetica', '', 4);
    $this->Cell(0,0, '',0,1,'C');
    $this->SetFont('helvetica', '', 12);
    $this->Cell(32,0, '',0,0,'');
    $this->Cell(28,0, 'School Name',0,0,'');
    $this->SetFont('helvetica', '', 8);
    $this->Cell(62,6, 'Sorsogon Pilot Elementary School',1,0,'C');
    $this->SetFont('helvetica', '', 12);
    $this->Cell(27,0, '                  School Year',0,0,'');
    $this->Cell(20,0, '                     ',0,0,'');
    $this->SetFont('helvetica', '', 8);
    $this->Cell(38,6, $_POST['schoolyear'],1,0,'C');
    $this->SetFont('helvetica', '', 12);
    $this->Cell(14,0, '       Grade Level',0,0,'');
    $this->Cell(22,0, '',0,0,'');
    $this->SetFont('helvetica', '', 8);
    $this->Cell(14,6, $_POST['gradelevel'],1,0,'C');
    $this->SetFont('helvetica', '', 12);
    $this->Cell(17,0, ' Section',0,0,'');
    $this->SetFont('helvetica', '', 8);
    $this->Cell(40,6, $_POST['gradesection'],1,0,'C');
    }
    else{

    }
}

protected $last_page_flag = false;
public function Close() {
    $this->last_page_flag = true;
    parent::Close();
}

    // Page footer
    public function Footer() {

        if ($this->last_page_flag)     
        {  
        
        // Position at 15 mm from bottom
        $this->SetY(-45);
        //first table
        $this->SetFont('helvetica', 'B', 9);
        $this->Cell(50,0, '                                         List and Code of Indicators under REMARKS column',0,0,'');
        $this->SetFont('helvetica', '', 8);
        $this->Cell(205,0, '',0,0,'');
        $this->Cell(18,0, 'Prepared by:',0,0,'');
        $this->Cell(25,5, '     ',0,0,'');
        $this->Cell(15,5, 'Certified Correct:',0,1,'');
        $this->Cell(0,1, '',0,1,'C');


        $this->SetFont('helvetica', 'B', 8);
        $this->Cell(29,5, ' Indicator',1,0,'');
        $this->Cell(11,5, ' Code',1,0,'');
        $this->Cell(65,5, '  Required Information',1,0,'');
        $this->Cell(20,5, ' ',1,0,'');
        $this->Cell(11,5, ' Code',1,0,'');
        $this->Cell(65,5, '  Required Information',1,0,'');
        //second table
        $this->Cell(1,5, '',0,0,'');
        $this->Cell(18,5, '  Registered',1,0,'');
        $this->Cell(15,5, '     BoSY',1,0,'');
        $this->Cell(15,5, '     EoSY',1,0,'');
        $this->Cell(5,5, '     ',0,0,'');
        $this->MultiCell(36, 9, $_POST['advisorcheck'], 0, 'C', 0, 0, '', '', true, 0, false, true, 9, 'B');
        $this->Cell(7,5, '     ',0,0,'');
        $this->MultiCell(36, 9, $_POST['schoolhead'], 0, 'C', 0, 0, '', '', true, 0, false, true, 9, 'B');
        $this->Cell(17,5, '     ',0,1,'');
        //signatures
  /*       $this->SetFont('helvetica', '', 9);
        $this->Cell(5,5, '',0,0,'');
        $this->Cell(18,5, 'Prepared by:',0,0,'');
        $this->Cell(25,5, '     ',0,0,'');
        $this->Cell(15,5, 'Certified Correct:',0,1,''); */
/* _________________________________________________________________ */
        //second row
        $this->SetFont('helvetica', '', 7);
        $this->Cell(29,5, ' Transferred Out',1,0,'');
        $this->Cell(11,5, ' T/O',1,0,'');
        $this->Cell(65,5, ' Name of Public (P) Private (PR) School & Effectivity Date',1,0,'');
        $this->Cell(20,5, ' ',1,0,'');
        $this->Cell(11,5, ' CCT',1,0,'');
        $this->Cell(65,5, ' CCT Control/reference number & Effectivity Dat',1,0,'');
        //second table
        $this->Cell(1,5, '',0,0,'');
        $this->Cell(18,5, '  Male',1,0,'');
        $this->Cell(15,5, $_POST['male'],1,0,'C');
        $this->Cell(15,5, '     ',1,0,'');
        //signatures
        $this->SetFont('helvetica', '', 9);
        $this->Cell(5,5, '',0,0,'');
        $this->Cell(18,5, '_________________',0,0,'');
        $this->Cell(25,5, '     ',0,0,'');
        $this->Cell(15,5, '_____________________',0,1,'');

/* _________________________________________________________________ */
        //third row
        $this->SetFont('helvetica', '', 7);
        $this->Cell(29,5, ' Transferred IN',1,0,'');
        $this->Cell(11,5, ' T/I',1,0,'');
        $this->Cell(65,5, ' Name of Public (P) Private (PR) School & Effectivity Date',1,0,'');
        $this->Cell(20,5, ' ',1,0,'');
        $this->Cell(11,5, ' B/A',1,0,'');
        $this->Cell(65,5, ' Name of school last attended & Year',1,0,'');
        //second table
        $this->Cell(1,5, '',0,0,'');
        $this->Cell(18,5, '  Female',1,0,'');
        $this->Cell(15,5,   $_POST['female'] ,1,0,'C');
        $this->Cell(15,5, '     ',1,0,'');
        //signatures
        $this->SetFont('helvetica', '', 5);
        $this->Cell(5,5, '',0,0,'');
        $this->Cell(18,5, '  (Signature of Adviser over Printed Name)',0,0,'');
        $this->Cell(25,5, '     ',0,0,'');
        $this->Cell(15,5, '  (Signature of School Head over Printed Name)',0,1,'');

        /* _________________________________________________________________ */
        //fourth row
        $this->SetFont('helvetica', '', 7);
        $this->Cell(29,5, ' Dropped',1,0,'');
        $this->Cell(11,5, ' DRP',1,0,'');
        $this->Cell(65,5, ' Reason and Effectivity Date',1,0,'');
        $this->Cell(20,5, ' ',1,0,'');
        $this->Cell(11,5, ' LWD',1,0,'');
        $this->Cell(65,5, ' Specify',1,0,'');
        //second table
        $this->Cell(1,5, '',0,0,'');
        $this->Cell(18,5, '  Total',1,0,'');
        $this->Cell(15,5, $_POST['total'] ,1,0,'C');
        $this->Cell(15,5, '     ',1,0,'');

        //signatures
        $this->SetFont('helvetica', 'B', 6);
        $this->Cell(5,5, '',0,0,'');
        $this->Cell(18,5, '  BoSY Date:            EoSYDate:',0,0,'');
        $this->Cell(25,5, '     ',0,0,''); 
        $this->Cell(15,5, '  BoSY Date:            EoSYDate:',0,1,'');
       


           /* _________________________________________________________________ */
        //fourth row
        $this->SetFont('helvetica', '', 7);
        $this->Cell(29,5, ' Late Enrollment',1,0,'');
        $this->Cell(11,5, ' LE',1,0,'');
        $this->Cell(65,5, ' Reason (Enrollment beyond 1st Friday of June)',1,0,'');
        $this->Cell(20,5, ' ',1,0,'');
        $this->Cell(11,5, ' ACL',1,0,'');
        $this->Cell(65,5, ' Specify Level & Effectivity Data',1,0,'');
        $this->Cell(49,5, '',0,0,'');


        $this->SetFont('helvetica', 'B', 6);
        $this->Cell(5,5, '',0,0,'');
        $this->Cell(18,5, '  _______________________________',0,0,'');
        $this->Cell(25,5, '     ',0,0,''); 
        $this->Cell(15,5, '  _______________________________',0,1,'');

        // Page number
        /* $this->Cell(0,10, 'Page '.$this->getAliasNumPage().'/'.$this->getAliasNbPages(), 0, false, 'C', 0, '', 0, false, 'T', 'M'); */
    }
    else{

    }
}
}

// create new PDF document
$pageLayout = array(355.6, 215.9); //  or array($height, $width) 
$pdf = new PDF('l', 'mm', $pageLayout, true, 'UTF-8', false);
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


$pdf->AddPage();
$pdf->Ln(9);

// MultiCell($w, $h, $txt, $border=0, $align='J', $fill=0, $ln=1, $x='', $y='', $reseth=true, $stretch=0, $ishtml=false, $autopadding=true, $maxh=0)

$pdf->SetFont('helvetica', '', 5);
// Multicell test
$pdf->MultiCell(2, 16, '', 1, 'C', 0, 0, '', '', true, 0, false, true, 16, 'M');
$pdf->MultiCell(26, 16, 'LRN', 1, 'C', 0, 0, '', '', true, 0, false, true, 16, 'M');
$pdf->MultiCell(50, 16, 'NAME
(Last Name, First Name, Middle Name)', 1, 'C', 0, 0, '', '', true, 0, false, true, 16, 'M');
$pdf->MultiCell(7, 16, 'Sex 
(M/F)', 1, 'C', 0, 0, '', '', true, 0, false, true, 16, 'M');
$pdf->MultiCell(15, 16, 'BIRTH DATE 
(mm/dd/ yyyy)', 1, 'C', 0, 0, '', '', true, 0, false, true, 16, 'M');
$pdf->MultiCell(10, 16, 'AGE as of 
1st Friday 
June', 1, 'C', 0, 0, '', '', true, 0, false, true, 16, 'M');
$pdf->MultiCell(12, 16, 'MOTHER 
TONGUE', 1, 'C', 0, 0, '', '', true, 0, false, true, 16, 'M');
$pdf->MultiCell(12, 16, 'IP 
(Ethnic 
Group)', 1, 'C', 0, 0, '', '', true, 0, false, true, 16, 'M');
$pdf->MultiCell(12, 16, 'RELIGION', 1, 'C', 0, 0, '', '', true, 0, false, true, 16, 'M');
$pdf->MultiCell(62, 6, 'ADDRESS', 1, 'C', 0, 0, '', '', true, 0, false, true, 6, 'M');
$pdf->MultiCell(52, 6, 'PARENTS', 1, 'C', 0, 0, '', '', true, 0, false, true, 6, 'M');
$pdf->MultiCell(36, 6, 'GUARDIANS', 1, 'C', 0, 0, '', '', true, 0, false, true, 6, 'M');
$pdf->MultiCell(18, 16, 'Contact Number 
of Parent or 
Guardian', 1, 'C', 0, 0, '', '', true, 0, false, true, 16, 'M');
$pdf->MultiCell(18, 6, 'Remarks', 1, 'C', 0, 1, '', '', true, 0, false, true, 6, 'M');
$pdf->MultiCell(146, 10, '', 0, 'C', 0, 0, '', '', true, 0, false, true, 6, 'M');
$pdf->MultiCell(20, 10, 'House #/ Street/ 
Sitio/
Purok', 1, 'C', 0, 0, '', '', true, 0, false, true, 10, 'M');
$pdf->MultiCell(14, 10, 'Barangay', 1, 'C', 0, 0, '', '', true, 0, false, true, 10, 'M');
$pdf->MultiCell(14, 10, 'Municipality/ 
City ', 1, 'C', 0, 0, '', '', true, 0, false, true, 10, 'M');
$pdf->MultiCell(14, 10, 'Province', 1, 'C', 0, 0, '', '', true, 0, false, true, 10, 'M');
$pdf->MultiCell(26, 10, 'Fathers Name (Last Name, 
First Name, Middle Name)', 1, 'C', 0, 0, '', '', true, 0, false, true, 10, 'M');
$pdf->MultiCell(26, 10, 'Mothers Maiden Name (Last 
Name, First Name, Middle 
Name)', 1, 'C', 0, 0, '', '', true, 0, false, true, 10, 'M');
$pdf->MultiCell(18, 10, 'Name', 1, 'C', 0, 0, '', '', true, 0, false, true, 10, 'M');
$pdf->MultiCell(18, 10, 'Relationship ', 1, 'C', 0, 0, '', '', true, 0, false, true, 10, 'M');
$pdf->MultiCell(18, 10, '', 0, 'C', 0, 0, '', '', true, 0, false, true, 10, 'M');
$pdf->MultiCell(18, 10, '
(Please refer to the 
legend on last page)
', 1, 'C', 0, 1, '', '', true, 0, false, true, 10, 'M');

if (isset($_POST['viewreport'])){

    error_reporting(0);

    $query = "SELECT s.lrn, CONCAT(s.lastname,',',s.firstname,',',s.middlename) AS `Name`, (IF(s.sex = 'Male', 'M', 'F')) AS `sex`, s.birthday, 
    s.age, s.mothertongue,s.ethnicgroup, s.religion, 
    s.street, s.barangay, s.municipality, s.province, s.region,
    s.fname, s.mname, s.gname, s.gcontactno, s.grelationship, g.`grade`, ss.`sectionname`
    FROM student_tbl s
    INNER JOIN enrollment_tbl e
    ON s.id = e.`student_id`
    INNER JOIN section_tbl ss
    ON e.`section_id` = ss.`id`
    INNER JOIN gradelevel_tbl g
    ON s.`gradetoenroll` = g.`id`
    WHERE ss.id = '".$_POST['sectioner']."'
    AND e.`status` = 'enrolled'
    ORDER BY s.`lastname`ASC";
    $result = mysqli_query($connection,$query);
    $i = 1;
    while ($row = mysqli_fetch_array($result)) 
    { 
        $lrn = $row['lrn'];
        $name = $row['Name'];
        $sex = $row['sex'];
        $birthday = $row['birthday'];
        $age = $row['age'];
        $mothertongue = $row['mothertongue'];
        $ethnicgroup = $row['ethnicgroup'];
        $religion = $row['religion'];
        $street = $row['street'];
        $barangay = $row['barangay'];
        $municipality = $row['municipality'];
        $province = $row['province'];
        $region = $row['region'];
        $fname = $row['fname'];
        $mname = $row['mname'];
        $gname = $row['gname'];
        $gcontactno = $row['gcontactno'];
        $grelationship = $row['grelationship'];
        $grade = $row['grade'];
        $section = $row['sectionname'];

        $pdf->MultiCell(2, 8, '', 1, 'C', 0, 0, '', '', true, 0, false, true, 9, 'M');
        $pdf->MultiCell(26, 8, $lrn, 1, 'C', 0, 0, '', '', true, 0, false, true, 9, 'M');
        $pdf->MultiCell(50, 8, $name, 1, 'C', 0, 0, '', '', true, 0, false, true, 9, 'M');
        $pdf->MultiCell(7, 8, $sex, 1, 'C', 0, 0, '', '', true, 0, false, true, 9, 'M');
        $pdf->MultiCell(15, 8, $birthday, 1, 'C', 0, 0, '', '', true, 0, false, true, 9, 'M');
        $pdf->MultiCell(10, 8, $age, 1, 'C', 0, 0, '', '', true, 0, false, true, 9, 'M');
        $pdf->MultiCell(12, 8, $mothertongue, 1, 'C', 0, 0, '', '', true, 0, false, true, 9, 'M');
        $pdf->MultiCell(12, 8, $ethnicgroup, 1, 'C', 0, 0, '', '', true, 0, false, true, 9, 'M');
        $pdf->MultiCell(12, 8, $religion, 1, 'C', 0, 0, '', '', true, 0, false, true, 9, 'M');
 /*        $pdf->MultiCell(62, 6, 'ADDRESS', 1, 'C', 0, 0, '', '', true, 0, false, true, 6, 'M');
        $pdf->MultiCell(52, 6, 'PARENTS', 1, 'C', 0, 0, '', '', true, 0, false, true, 6, 'M');
        $pdf->MultiCell(36, 6, 'GUARDIANS', 1, 'C', 0, 0, '', '', true, 0, false, true, 6, 'M'); */     
        /* $pdf->MultiCell(146, 16, '', 0, 'C', 0, 0, '', '', true, 0, false, true, 6, 'M'); */
        $pdf->MultiCell(20, 8, $street, 1, 'C', 0, 0, '', '', true, 0, false, true, 9, 'M');
        $pdf->MultiCell(14, 8, $barangay, 1, 'C', 0, 0, '', '', true, 0, false, true, 9, 'M');
        $pdf->MultiCell(14, 8, $municipality, 1, 'C', 0, 0, '', '', true, 0, false, true, 9, 'M');
        $pdf->MultiCell(14, 8, $province, 1, 'C', 0, 0, '', '', true, 0, false, true, 9, 'M');
        $pdf->MultiCell(26, 8, $fname, 1, 'C', 0, 0, '', '', true, 0, false, true, 9, 'M');
        $pdf->MultiCell(26, 8, $mname, 1, 'C', 0, 0, '', '', true, 0, false, true, 9, 'M');
        $pdf->MultiCell(18, 8, $gname, 1, 'C', 0, 0, '', '', true, 0, false, true, 9, 'M');
        $pdf->MultiCell(18, 8, $grelationship, 1, 'C', 0, 0, '', '', true, 0, false, true, 9, 'M');
        $pdf->MultiCell(18, 8, $gcontactno, 1, 'C', 0, 0, '', '', true, 0, false, true, 9, 'M');
        /* $pdf->MultiCell(18, 16, 'Remarks', 1, 'C', 0, 0, '', '', true, 0, false, true, 6, 'M'); */
        $pdf->MultiCell(18, 8, '', 1, 'C', 0, 1, '', '', true, 0, false, true, 9, 'M');
        $i++;
        if($i % 17 == 0)
        {
            $pdf->AddPage();
        }
        else
        {

        }
   
    }
}
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



