
<?php 

include '../inc/connection.php';
$data = $_GET['data'];

$dateArray = array('1' => 'January','February','March','April','May','June','July','August','September','October','November','December');

$query = "SELECT * FROM student_details WHERE Stud_id = '$data'";
$results = $mysqli->query($query);

while ($row = $results->fetch_array(MYSQLI_BOTH))
{
    $student_id  = $row['Stud_id'];
    $school_name = $row['sch_Name'];
    $school_program = $row['sch_prog'];
    $directed_to     = $row['directed_To'];
    $region    = $row['region'];
    $district = $row['district'];
    $start_date = $row['start_Date'];
    $end_date   = $row['end_Date'];

    //Getting the fullname of the region from the region table
    $reg_query = "SELECT fullname FROM region WHERE reg_Abbrv = '$region'";
    $reg_results = $mysqli->query($reg_query);
    $reg_row     = $reg_results->fetch_array(MYSQLI_BOTH);
    $fullRegionName = $reg_row['fullname'];

    //Working on the start date and the end date --Formating it well --Start Date formatting
    $getGeneralDate = explode('-', $start_date);
    $getYear        = $getGeneralDate[0];
    $getMonth       = $getGeneralDate[1];
    $getDay         = $getGeneralDate[2];

    $parseMonth   = (int)($getMonth);
    $getMonthName = $dateArray[$parseMonth];

    //Working on the end date --Formatting the end date  --End date formatting
    $getGeneralDate1 = explode('-', $end_date);
    $getYear1        = $getGeneralDate1[0];
    $getMonth1       = $getGeneralDate1[1];
    $getDay1         = $getGeneralDate1[2];

    $parseMonth1   = (int)($getMonth1);
    $getMonthName1 = $dateArray[$parseMonth1];

    $qq = "SELECT f_Name,l_Name,other_Name FROM register  WHERE Stud_id = '$data'";
    $rs = $mysqli->query($qq);
    $dt = $rs->fetch_array(MYSQLI_BOTH);
    $student_firstname = $dt['f_Name'];
    $student_lastname  = $dt['l_Name'];
    $student_othername = $dt['other_Name'];

    $date = date("Y/m/d");

header("Content-type: application/pdf; charset=utf-8");
header("Content-Disposition: attachment; filename = letter.pdf");
require('fpdf/fpdf.php');
   
    
class PDF extends FPDF
{
     
    // Page header
    function Header()
    {
      $time=date("Y/m/d h:i:sa");  
      
       
        $this->Ln(4);
       // $this->Cell(0,0,'',1,1,'');
        // Line break
        $this->Ln(30);
    }


    // Page footer
    function Footer()
    {

        // Position at 1.5 cm from bottom
        $this->SetY(-15);
        // Arial italic 8
       
    }
}


// Instanciation of inherited class
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','',9);
$pdf->Cell(180,4,$date,0,1);
  $pdf->Ln(10);

$pdf->Cell(180,4,$directed_to ,0,1);
$pdf->Cell(180,4,$school_name ,0,1);
$pdf->Cell(180,4,$district ,0,1);
$pdf->Cell(180,4,$fullRegionName ,0,1);
  
$pdf->Ln(8);

$pdf->Cell(180,4,'Dear Sir/Madam,',0,1);

$pdf->Ln(8);

$pdf->SetFont('Times','U',10);
$pdf->Cell(180,4,'PERMISSION:OFF-CAMPUS TEACHING PRACTICUM',0,1);

$pdf->Ln(2);

$pdf->SetFont('Times','',9);
$pdf->Cell(180,4,'As part of our training programme, all level 300 students of the Education Department of Valley View University are',0,1);
$pdf->Cell(180,4,'required to acquire knowlegde in Off-Campus Teaching. Practicum. On behalf of the University, I write to seek permission',0,1);
$pdf->Cell(180,4,'from you to enable the below mentioned student to teaach in your reputable institution from '.$getMonthName.' '.$getDay.' ,'.$getYear.' to '.$getMonthName1.' '.$getDay1.' ,'.$getYear1.' .',0,1);



$pdf->Ln(4);

$pdf->Cell(50,4,'Name of Student                          :',0,0);
$pdf->Cell(70,4,$student_firstname.' '.$student_lastname.' '.$student_othername.' ',0,1);

$pdf->Ln(2);

$pdf->Cell(50,4,'ID Number                                   :',0,0);
$pdf->Cell(70,4,$student_id  ,0,1);

$pdf->Ln(2);

$pdf->Cell(50,4,'Program                                        :',0,0);
$pdf->Cell(70,4,$school_program  ,0,1);

$pdf->Ln(4);

$pdf->Cell(100,4,'Thank you in anticipation for your favorable consideration in this direction',0,1);

$pdf->Ln(4);

$pdf->Cell(70,4,'Yours faithfully,',0,1);


$pdf->Ln(20);

$pdf->Cell(70,4,'Abraham Okrah',0,1);

$pdf->SetFont('Times','I',9);
$pdf->Cell(180,4,'(Off-campus Coordinator)',0,1);

$pdf->Ln(6);


$pdf->SetFont('Times','',10);
$pdf->Cell(70,4,'Cc:',0,1);
$pdf->Cell(180,4,'                          Head Of Department',0,1);

$filename = "letter.pdf";

$pdf->Output();        

}
    
        
?>