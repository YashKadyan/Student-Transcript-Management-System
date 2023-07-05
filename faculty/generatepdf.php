<?php
    session_start();
    require_once('../Database/connection.php');

    if(!isset($_SESSION['uid']))
    {
        echo"<script>alert('Unauthorised access!!!');</script>";
        die();
    }
    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    $cid = test_input($_GET["course"]);
    $sem = test_input($_GET["sem"]);
    $subject = test_input($_GET["subject"]);
    $exam = test_input($_GET["exam"]);
    
    $sql = "SELECT u_name,PRN,roll_no FROM user,student WHERE user.user_id = student.user_id AND semester=$sem AND course_id=$cid ORDER BY roll_no ASC";
    $res = mysqli_query($connection,$sql);
    
    $res2 = mysqli_query($connection,"SELECT sub_name,c_name FROM subject,course WHERE course.course_id = subject.course_id AND subject.semester=$sem AND subject.course_id=$cid AND subject.sub_id=$subject");
    $subject_result = mysqli_fetch_assoc($res2);

    $res3 = mysqli_query($connection,"SELECT exam_name,total_marks FROM exam where exam_id=$exam");
    $ex_result = mysqli_fetch_assoc($res3);

    $res4 = mysqli_query($connection,"SELECT college_name,dept_name FROM college, department where college.college_id = department.college_id AND department.dept_id in(SELECT dept_id from course where course_id=$cid)");
    $result = mysqli_fetch_assoc($res4);

    ob_start(); 
    require ('fpdf.php');
    $pdf = new FPDF();
    $pdf->AddPage();

    $pdf->SetFont('Times','',16);  
    $pdf->Cell(0,10,$result['college_name'],0,1,'C');
    $pdf->Cell(0,10 ,'Department of '.$result['dept_name'],0,1,'C');
    $pdf->Cell(0,2,$subject_result['c_name'],0,1,'C');
    $pdf->Cell(0,10,'Semester-'.$sem,0,1,'C');
    $pdf->Cell(0,10,'Subject Report',0,1,'C');
    $pdf->Cell(150);
    $pdf->Cell(30,15,'Date: '.date("d/m/Y"),0,1,'R');
    
    $pdf->SetFont('Times','',13);
    $pdf->Cell(100,5,'Faculty: '.$_SESSION['name'],0,1,'L');
    $pdf->Cell(100,5,'Subject: '.$subject_result['sub_name'],0,1,'L');
    $pdf->Cell(100,5,'Exam   : '.str_replace('_','-',$ex_result['exam_name']),0,1,'L');
    $pdf->Cell(100,5,'Marks  : '.$ex_result['total_marks'],0,1,'L');
    $pdf->Cell(0,10,'',0,1,'L');
    $pdf->Cell(0,10,'',0,1,'L');
    
    $pdf->SetFont('Times','B',14);
    $width_cell=array(20,50,20,30,60);
    $pdf->SetFillColor(193,229,252);
    // Header starts ///
    $pdf->Cell(50);
    $pdf->Cell($width_cell[0],10,'Roll No',1,0,'C',true);
    $pdf->Cell($width_cell[1],10,'Name',1,0,'C',true);
    $pdf->Cell($width_cell[2],10,'Marks',1,1,'C',true);
    $pdf->SetFont('Times','',12);
    $pdf->SetFillColor(235,236,236); 
    //to give alternate background fill color to rows// 
    $fill=false;

    if((mysqli_num_rows($res)>0))
    {
        while($student_data = mysqli_fetch_assoc($res))
        {
            $res1 = mysqli_query($connection,"SELECT score,uploaded_on FROM result WHERE PRN=".$student_data['PRN']." AND sub_id=$subject AND exam_id=$exam");
            $exam_result = mysqli_fetch_assoc($res1);
            $pdf->Cell(50);
            $pdf->Cell($width_cell[0],10,$student_data['roll_no'],1,0,'C',$fill);
            $pdf->Cell($width_cell[1],10,$student_data['u_name'],1,0,'C',$fill);
            $pdf->Cell($width_cell[2],10,$exam_result['score'],1,1,'C',$fill);
            $fill = !$fill; //to give alternate background fill  color to rows//
        }
    }
    else
    {
        $pdf->SetFont('Times','',14);
        $pdf->SetTextColor(255,0,0);
        $pdf->Cell(73);
        $pdf->Cell(50,10,'No Records Found!',0,0,'C',false);
    }
    ob_end_flush();
    $pdf->Output('',"subject_report.pdf",false);
?>