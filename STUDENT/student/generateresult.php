<?php
    session_start();
    require_once('../../Database/connection.php');

    $PRN = $_SESSION['PRN'];
    $cid = $_SESSION['cid'];
    $sem = $_SESSION['semester'];
    
    $sql = "SELECT u_name,PRN,roll_no FROM user,student WHERE user.user_id = student.user_id AND semester=$sem AND course_id=$cid and student.PRN=$PRN";
    $res = mysqli_query($connection,$sql);
    $student_data = mysqli_fetch_assoc($res);

    $res2 = mysqli_query($connection,"SELECT c_name FROM course WHERE  course_id=$cid");
    $course = mysqli_fetch_assoc($res2);
    
    $res4 = mysqli_query($connection,"SELECT college_name,dept_name FROM college, department where college.college_id = department.college_id AND department.dept_id in(SELECT dept_id from course where course_id=$cid)");
    $result = mysqli_fetch_assoc($res4);

    require('fpdf.php');
    $pdf = new FPDF();
    $pdf->AddPage();
    
    //Cell(width,height,Text,Border(0/1),ln)
    
    $pdf->SetFont('Times','',16);
    $pdf->Cell(0,10,$result['college_name'],0,1,'C');
    $pdf->Cell(0,10 ,'Department of '.$result['dept_name'],0,1,'C');
    $pdf->Cell(0,2,$course['c_name'],0,1,'C');
    $pdf->Cell(0,15,'Provisional Marksheet',0,1,'C');
    
    $pdf->SetFont('Times','',13);
    $pdf->Cell(150);
    $pdf->Cell(30,15,'Date: '.date("d/m/Y"),0,1,'R');
    $pdf->SetFont('Times','',10 );

    

    $pdf->Cell(110,5,'Roll No            : '.$student_data['roll_no'],0,0,'L');
    $pdf->Cell(70,5,'Permanant Reg. No : '.$student_data['PRN'],0,1,'R');
    $pdf->Cell(70,10,'Course:            : '.$course['c_name'],0,1,'L');
    $pdf->Cell(70,5,'Student Name : '.$student_data['u_name'],0,1,'L');
    //$pdf->Cell(70,5,'Subject: Analysis of Algorithm and Computing',0,1,'L');
    //$pdf->Cell(70,5,'Exam   : CE_I',0,1,'R');
    $pdf->Cell(0,10,'',0,1,'L');
    
    $pdf->SetFont('Times','B',12);
    $width_cell=array(70,15,15,15,15,15,25,15);
    $pdf->SetFillColor(193,229,252);
    $pdf->Cell(0,10,'Semester - 1',0,1,'C');
    $pdf->Cell(10);
    
    // Header starts /// 
    $pdf->Cell($width_cell[0],10,'Subject',1,0,'C',true);
    $pdf->Cell($width_cell[2],10,'Int',1,0,'C',true); 
    $pdf->Cell($width_cell[3],10,'Ext',1,0,'C',true);
    $pdf->Cell($width_cell[4],10,'Total',1,0,'C',true); 
    $pdf->Cell($width_cell[5],10,'Credits',1,0,'C',true); 
    $pdf->Cell($width_cell[6],10,'Grade Point',1,0,'C',true); 
    $pdf->Cell($width_cell[7],10,'Grade',1,1,'C',true); 
    
    $sql = "SELECT * FROM subject WHERE semester=".$sem." AND course_id=".$cid;
    $result = mysqli_query($connection,$sql);

    $pdf->SetFont('Times','',10);
    $pdf->SetFillColor(235,236,236); //to give alternate background fill color to rows// 
    $fill=false;
    $FAIL = FALSE;

    $cum_total=0;
    $ob_credits = 0;
    $sub_credits = array();
    $obtained_gpa = array();
    $SGPA = 0;
    while ($row = mysqli_fetch_assoc($result))
    {
        $pdf->Cell(10);
        $pdf->Cell($width_cell[0],10,$row['sub_name'],1,0,'C',$fill);
        
        $sql = "SELECT score FROM result WHERE PRN=$PRN AND sub_id =".$row['sub_id']." AND exam_id=3";
        $exam_res = mysqli_query($connection,$sql);
        $ce1 = mysqli_fetch_row($exam_res);
        
        $sql = "SELECT score FROM result WHERE PRN=$PRN AND sub_id =".$row['sub_id']." AND exam_id=4";
        $exam_res = mysqli_query($connection,$sql);
        $ce2 = mysqli_fetch_row($exam_res);
        
        $sql = "SELECT score FROM result WHERE PRN=$PRN AND sub_id =".$row['sub_id']." AND exam_id=5";
        $exam_res = mysqli_query($connection,$sql);
        $ese = mysqli_fetch_row($exam_res);
        
        $total = $ese[0] + $ce1[0] + $ce2[0];
        $cum_total += $total;

        $pdf->Cell($width_cell[2],10,$ce1[0]+$ce2[0],1,0,'C',$fill);
        $pdf->Cell($width_cell[3],10,$ese[0],1,0,'C',$fill);
        $pdf->Cell($width_cell[4],10,$total,1,0,'C',$fill);
        
        if ($total>=40) {
            if($total>=80) {
                $gpa = 10;
                $grade = 'O';
            }
            elseif ($total>=70 and $total<=79) {
                $gpa = 9;
                $grade = 'A+';
            }
            elseif ($total>=60 and $total<=69) {
                $gpa = 8;
                $grade = 'A';
            }
            elseif ($total>=55 and $total<=59) {
                $gpa = 7;
                $grade = 'B+';
            }
            elseif ($total>=50 and $total<=54) {
                $gpa = 6;
                $grade = 'B';
            }
            elseif ($total>=45 and $total<=49) {
                $gpa = 5;
                $grade = 'C';
            }
            elseif ($total>=40 and $total<=44) {
                $gpa = 4;
                $grade = 'P';
            }
            $credits = $row['credits'];
        }
        elseif ($total<=39) {
            $gpa = 0;
            $grade = 'F';
            $credits = 0;
            $FAIL = TRUE;
        }
        
        array_push($obtained_gpa,$gpa);
        array_push($sub_credits,$row['credits']);
        $ob_credits+=$credits;

        $pdf->Cell($width_cell[5],10,$credits,1,0,'C',$fill);
        $pdf->Cell($width_cell[6],10,$gpa,1,0,'C',$fill);
        $pdf->Cell($width_cell[7],10,$grade,1,1,'C',$fill);

        //to give alternate background fill  color to rows//
        $fill = !$fill;
    }

    for($i=0;$i<count($sub_credits);$i++) {
        $SGPA = $SGPA + ($obtained_gpa[$i]*$sub_credits[$i]);
    }
    $SGPA/=array_sum($sub_credits);

    
    $pdf->Cell(0,10,'',0,1,'L');
    
    $pdf->Cell(10);
    $pdf->Cell(0,5,'SGPA : '.round($SGPA,2),0,1,'L'); 
    $pdf->Cell(10);
    $pdf->Cell(0,5,'Total Marks : '.$cum_total.'/'.count($sub_credits)*100,0,1,'L');
    $pdf->Cell(10);
    $pdf->Cell(0,5,'Total Earned Credits : '.$ob_credits.'/'.array_sum($sub_credits),0,1,'L');

    $pdf->Cell(10);
    if($FAIL)
        $pdf->Cell(0,15,'Result : FAIL',0,0,'L');
    else
        $pdf->Cell(0,5,'Result : PASS',0,0,'L');

    $pdf->Output('',"student_report.pdf",false);
?>