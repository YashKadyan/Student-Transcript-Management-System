<?php
    session_start();
    require_once('../../Database/connection.php');
    if(!isset($_SESSION['uid']))
    {
        echo"<script>alert('Unauthorised access!!!');</script>";
        header("location:../../home.html");
        die();
    }
    $cid=$_SESSION['cg'];
    $did=$_SESSION['dp'];

    $res = mysqli_query($connection,"SELECT college_name,dept_name FROM college,department WHERE college.college_id=department.college_id AND department.dept_id in(SELECT dept_id FROM department WHERE college.college_id=$cid AND department.dept_id=$did)");
    $result = mysqli_fetch_assoc($res);

    $dres = mysqli_query($connection,"SELECT * FROM course WHERE dept_id=$did");

    ob_start(); 
    require_once ('fpdf.php');
    $pdf = new FPDF('P','mm','A3');
    $pdf->AddPage();

	$start_x=$pdf->GetX();
	$current_y = $pdf->GetY();
	$current_x = $pdf->GetX();

    $pdf->SetFont('Times','',16);  
    $pdf->Cell(0,10,$result['college_name'],0,1,'C');
    $pdf->Cell(0,10,'Department of '.$result['dept_name'],0,1,'C');
    $pdf->Cell(0,10,'Course Report',0,1,'C');
    $pdf->Cell(150);

    $pdf->Cell(130,25,'Date: '.date("d/m/Y"),0,1,'R');

    $pdf->SetFont('Times','B',13);
    $width_cell=array(30,75,25,25,30,26);
    $pdf->SetFillColor(193,229,252);


	$start_x=$pdf->GetX()+50; 
    $current_y = $pdf->GetY();
    $current_x = $pdf->GetX()+31;

    $pdf->SetXY($current_x, $current_y);
    $start_x=$pdf->GetX();
    $pdf->MultiCell($width_cell[0],20,'Course ID',1,'C',true);
    
    $current_x += $width_cell[1]-45;
    $pdf->SetXY($current_x, $current_y);
    $pdf->MultiCell($width_cell[1],20,'Course Name',1,'C',true);

    $current_x += $width_cell[1];
    $pdf->SetXY($current_x, $current_y);
    $pdf->MultiCell($width_cell[2],10,'Course Duration',1,'C',true); 

    $current_x += $width_cell[2];
    $pdf->SetXY($current_x, $current_y);
    $pdf->MultiCell($width_cell[3],10,'No of Students',1,'C',true); 

    $current_x += $width_cell[3];
	$pdf->SetXY($current_x, $current_y);               
    $pdf->MultiCell($width_cell[4],10,'No of Subjects',1,'C',true);

    $current_x += $width_cell[4];
	$pdf->SetXY($current_x, $current_y);
    $pdf->MultiCell($width_cell[5],10,'No of Faculties',1,'C',true);                        
    
    $pdf->SetFont('Times','',12);
    $pdf->SetFillColor(235,236,236); 
     
    $fill=false;            //to give alternate background fill color to rows

    $pdf->Ln();
    $current_x=$start_x;    //set x to start_x (beginning of line)
    $current_y+=20;

    while($course_data = mysqli_fetch_assoc($dres))
    {    
        $pdf->SetXY($current_x, $current_y);
        $pdf->MultiCell($width_cell[0],10,$course_data['course_id'],1,'C',$fill);

        $current_x += $width_cell[1]-45;
        $pdf->SetXY($current_x, $current_y);
        $pdf->MultiCell($width_cell[1],10,$course_data['c_name'],1,'C',$fill);
    
        $current_x += $width_cell[3]+50;
        $pdf->SetXY($current_x, $current_y);               //set position for next cell to print
        $pdf->MultiCell($width_cell[2],10,$course_data['c_duration'].' years',1,'C',$fill);
        
        $sql = "SELECT count(PRN) FROM student WHERE college_id=$cid AND dept_id=$did AND course_id=".$course_data['course_id'];
        $courseid=$course_data['course_id'];
        $course_result = mysqli_query($connection,$sql);
        $course_data = mysqli_fetch_row($course_result);
        $current_x += $width_cell[1]-50;
        $pdf->SetXY($current_x, $current_y);
        $pdf->MultiCell($width_cell[3],10,$course_data[0],1,'C',$fill);

        $stdsql = "SELECT count(sub_id) FROM subject WHERE course_id=$courseid";
        $course_result = mysqli_query($connection,$stdsql);
        $course_data = mysqli_fetch_row($course_result);
        $current_x += $width_cell[1]-50;
        $pdf->SetXY($current_x, $current_y);
        $pdf->MultiCell($width_cell[4],10,$course_data[0],1,'C',$fill);
        
        $cres = mysqli_query($connection,"SELECT count(faculty_id) FROM faculty WHERE college_id=$cid and dept_id=$did");
        $fcount = mysqli_fetch_array($cres);
        $current_x += $width_cell[4];
        $pdf->SetXY($current_x, $current_y);
        $pdf->MultiCell($width_cell[5],10,$fcount[0],1,'C',$fill);

        $pdf->Ln();
        $current_x=$start_x;        //set x to start_x (beginning of line)
        $current_y+=10;             
        $fill = !$fill;             //to give alternate background fill  color to rows//
    }
    ob_end_flush();
    $pdf->Output('',"course_report.pdf",false);
?>    