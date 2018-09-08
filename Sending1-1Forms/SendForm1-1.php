<?php  
 function fetch_data()  
 {  
      $output = '';  
      $conn = mysqli_connect("localhost", "root", "", "spm_sprint");  
      $sql = "SELECT * FROM studentI1 ORDER BY id ASC";  
      $result = mysqli_query($conn, $sql);  
      while($row = mysqli_fetch_array($result))  
      {       
      $output .= '<tr>  
                          <td>'.$row["SID"].'</td>  
                          <td>'.$row["S_name"].'</td>  
                          <td>'.$row["S_address"].'</td>  
                          <td>'.$row["S_home_address"].'</td> 
						  <td>'.$row["S_mobile_phone"].'</td>
						  <td>'.$row["S_emial"].'</td>
						  <td>'.$row["semester"].'</td>
						  <td>'.$row["year"].'</td>
						  <td>'.$row["CGPA"].'</td>
						  <td>'.$row["E_name"].'</td>
						  <td>'.$row["E_address"].'</td>
						  <td>'.$row["SU_name"].'</td>
						  <td>'.$row["SU_phone"].'</td>
						  <td>'.$row["SU_title"].'</td>
						  <td>'.$row["SU_email"].'</td>
						  <td>'.$row["startDate"].'</td>
						  <td>'.$row["endDate"].'</td>
						  <td>'.$row["expected"].'</td>
						  <td>'.$row["learn"].'</td>
						  <td>'.$row["EXSU"].'</td>
						  <td>'.$row["date"].'</td>
                     </tr>  
                          ';  
      }  
      return $output;  
 }  
 if(isset($_POST["generate_pdf"]))  
 {  
      require_once('tcpdf/tcpdf.php');  
      $obj_pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);  
      $obj_pdf->SetCreator(PDF_CREATOR);  
      $obj_pdf->SetTitle("Generate HTML Table Data To PDF From MySQL Database Using TCPDF In PHP");  
      $obj_pdf->SetHeaderData('', '', PDF_HEADER_TITLE, PDF_HEADER_STRING);  
      $obj_pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));  
      $obj_pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));  
      $obj_pdf->SetDefaultMonospacedFont('helvetica');  
      $obj_pdf->SetFooterMargin(PDF_MARGIN_FOOTER);  
      $obj_pdf->SetMargins(PDF_MARGIN_LEFT, '10', PDF_MARGIN_RIGHT);  
      $obj_pdf->setPrintHeader(false);  
      $obj_pdf->setPrintFooter(false);  
      $obj_pdf->SetAutoPageBreak(TRUE, 10);  
      $obj_pdf->SetFont('helvetica', '', 11);  
      $obj_pdf->AddPage();  
      $content = '';  
      $content .= '  
      <h4 align="center">Generate HTML Table Data To PDF From MySQL Database Using TCPDF In PHP</h4><br /> 
      <table border="1" cellspacing="0" cellpadding="3">  
           <tr>  
                <th width="5%">SID</th>  
                <th width="30%">S_name</th>  
                <th width="15%">S_address</th>  
                <th width="50%">S_home_address</th> 
				<th width="50%">S_mobile_phone</th>	
				<th width="50%">S_emial</th>
				<th width="50%">semester</th>
				<th width="50%">year</th>
				<th width="50%">CGPA</th>
				<th width="50%">E_name</th>
				<th width="50%">E_address</th>
				<th width="50%">SU_name</th>
				<th width="50%">SU_phone</th>
				<th width="50%">SU_title</th>
				<th width="50%">SU_email</th>
				<th width="50%">startDate</th>
				<th width="50%">endDate</th>
				<th width="50%">expected</th>
				<th width="50%">learn</th>
				<th width="50%">EXSU</th>
				<th width="50%">date</th>
				
           </tr>  
      ';  
      $content .= fetch_data();  
      $content .= '</table>';  
      $obj_pdf->writeHTML($content);  
      $obj_pdf->Output('file.pdf', 'I');  
 }  
 ?>  

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <!-- cdn script imports-->
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

    <!-- cdn css import -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <!-- custom script and css import -->
    <script type="text/javascript" src="js/main/script.js"></script>
    <link rel="stylesheet" href="css/main/style.css" type="text/css">

    <title>Send Form 1-1</title>
	
	<script>
		function popup(e){
			alert("E-mail sent successfully!");
			e.preventDefault();
		}
	</script>
	
  </head>
  <body>
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="section-heading">
              <h1>Send the Form 1-1</h1>
            </div>
            <form class="form-body" action="upload.php" method="post" enctype="multipart/form-data">
					
				
				Select the form to upload:
				<input type="file" name="fileToUpload" id="fileToUpload">
				<input type="submit" value="Upload File" name="submit">
				
					
                <button type="submit" class="btn btn-primary" onClick="popup()">Send</button>
            </form>
          </div>
        </div>
      </div>
  </body>
</html>