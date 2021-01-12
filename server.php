<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "empowher";
    session_start();
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    
    // Check connection
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }else{
        echo "connection successful\n";
    }

    echo "came here";
    
    if ( isset( $_GET['login'] ) ) 
    {
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "empowher";
       
        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        
        // Check connection
        if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
        }
    
        $emailid = $_GET['emailid']; 
        $pwd = $_GET['pwd'];

        if($emailid == 'admin' and $pwd = 'admin'){
            header("Location:portal_dashboard.php");
        }else{
            

        // commenting for new query.. 
        $sql_stmt = "SELECT id,Name,E_mailId,Password from register";
        //$sql_stmt = 'SELECT id,Name FROM register WHERE E_mailId = "' . $_GET['emailid'] . '" and Password = "' . $_GET['pwd'] . '"';
        
        $result = $conn->query($sql_stmt);
        $login_success = -1;
        if ($result->num_rows > 0) { //checking whether no. of rows greater then 0
            // output data of each row
            while($row = $result->fetch_assoc()) { // getting each object values into $rows
           
                if(0 == strcmp($emailid,$row["E_mailId"])){ // checking email given == db value
                    if(0 == strcmp($pwd,$row["Password"])){ // checking pwd with given pwd
                        $_SESSION['username'] = $row["Name"];
                        $_SESSION['userid'] = $row['id'];
                        $_SESSION['userresumedone'] = "false";
                        $_SESSION['userassessmentdone'] = "false";
                        $_SESSION['userdocdone'] = 'false';
                        //$_SESSION['userresumedone'] = checkResumeStatus($row['Name']);
                        if(addUserAcivity($conn,session_id(),$_SESSION['userid'],$_SESSION['username'],'login')==0){
                            echo "Logged in Successfully";
                            if($_SESSION['target_page']!=''){
                                $target_page = "profile.php";
                            }else{
                                $target_page = "index.php";
                            }
                            header("Location:".$target_page);
                        }else{
                            echo "Error in Logging out";
                            header("Location: failed.html");
                        }
                        $login_success = 0; // this will specify whether user is given correct values
                        break; // breaking if matched
                    }
                }

                //echo "Name: " . $row["E_mailId"]. " " . $row["Password"]. "<br>";
            }
        } else {
        echo "0 results";
        }
    }

        if($login_success == -1){ // if login_success == -1 the login has failed..
            echo '<script language="javascript">';
            echo 'alert("Login Failed. Incorrect Email or Password");';
            echo 'window.location.href="failed.html";';
            echo '</script>';
            
        }
       

        $conn->close();
    }

    if ( isset( $_POST['submit-logout'] ) ) 
    {
        // set the values needed
        $sessID = '';
        $userID = 0;
        $userName = '';
        if(isset($_POST['clientSessID'])){
            $sessID = $_POST['clientSessID'];
        }
        if(isset($_POST['clientName'])){
            $userName = $_POST['clientName'];
        }
        if(isset($_POST['clientID'])){
            $userID = $_POST['clientID'];
        }
        echo $sessID." ".$userID." ".$userName;
        if(addUserAcivity($conn,$sessID,$userID,$userName,'logout')==0){
            echo "Logged Out Successfully";
            header("Location: index.php");
            exit();
        }else{
            echo "Error in Logging out";
        }
    }

    if ( isset( $_POST['info-update'] ) ) 
    {
        // set the values needed
        $userP['Name'] = $_POST['Name'];
        $userP['EmailID'] = $_POST['EmailID'];
        $userP['ContactNumber'] = $_POST['ContactNumber'];
        $userP['Gender'] = $_POST['gender'];
        $userP['DOB'] = $_POST['DateofBirth'];
        if(updateUserProfile($conn,$userP)==0){
            echo "updated successfully Successfully";
            header("Location: profile.php");
            exit();
        }else{
            echo "Error in Updating";
        }
    }

    if ( isset( $_POST['submit-resume'] ) ) 
    {
        //print_r($_POST);
        $keys = array_keys($_POST);
        $size = sizeof($_POST);
        $int_var = array("contactno","pincode","hssyear","collegeugyear","collegepgyear","job1startdate");
        $sql_stmt = "INSERT INTO `usersresume`(`fullname`, `emailid`, `contactno`, `contactaddr`, `pincode`, `country`, `state`, `citynear`, `hsschool`, `hssyear`, `collegeug`, `collegeugyear`, `collegepg`, `collegepgyear`, `job1title`, `job1compname`, `job1country`, `job1startmonth`, `job1startdate`, `job1achievements` , `aaatitle`, `lknames`, `owskills`, `hobbies`) VALUES (";
        for($x = 0; $x < $size-1; $x++ ) { 
            if(array_search($keys[$x],$int_var)){
                $sql_stmt .= $_POST[$keys[$x]].",";
            }else{
                if($x != $size - 2){
                    $sql_stmt .= "'".$_POST[$keys[$x]]."',"; 
                }else{
                    $sql_stmt .= "'".$_POST[$keys[$x]]."'"; 
                }
            }
        }
        //$sql_stmt .= "[value-1],[value-2],[value-3],[value-4],[value-5],[value-6],[value-7],[value-8],[value-9],[value-10],[value-11],[value-12],[value-13],[value-14],[value-15],[value-16],[value-17],[value-18],[value-19],[value-20],[value-21],[value-22],[value-23],$_POST[])";  
        $sql_stmt .= ")";
        $result = runInsertQuery($conn,$sql_stmt);
        if($result){
            $sql_stmt = "SELECT COUNT(*) FROM userinfo where id=".$_SESSION['userid'].";";
            $result = runSelectCountQuery($conn,$sql_stmt); 
            if($result >= 1){
                $column = 'resumedone';
                $value = 1;
                $result = updateUserInfo($conn,$column,$value);
                if ($result == 1) {
                    $_SESSION['userresumedone'] = 'true';    
                }else{
                    $_SESSION['userresumedone'] = 'false';
                }
            }else{
                $sql_stmt = "INSERT INTO userinfo VALUES(".$_SESSION['userid'].",1,0,0,1);";
                $result = runInsertQuery($conn,$sql_stmt);
            }
        }else{
           $_SESSION['userresumedone'] = 'false';
        }

        $_SESSION['userresumedone'] = 'true';
        echo '<script language="javascript">';
        echo 'alert(" Resume has been updated successfully ");';
        echo 'window.location.href="marketingjob.php";';
        echo '</script>';
        //header("Location: marketingjob.php"); 
    }

    if(isset($_POST['submit-assessment'])){
        //print_r($_POST);
        //$keys = array_keys($_POST);  
        //subjecttype] => Decision Making [question] => iwuerlkmkew [option1] => a [option2] => b [option3] => c [option4] => d [answer] => Option3 [submit-portal-questions] => Submit )
        $size = sizeof($_POST) - 1;
        $key = array_keys($_POST);
        $quest_ans_array = array();
        $no_of_questions = $size/2;
        for($x = 0;$x<$no_of_questions;$x++){
            $quest_ans_array[$_POST[$key[$x*2]]] = $_POST[$key[($x*2)+1]];
        }
        //print_r($quest_ans_array);
        $question_key = array_keys($quest_ans_array);
        $no_of_correct = 0;
        for($x = 0;$x < $no_of_questions;$x++){
            $sql_stmt = "SELECT * FROM `assessment` WHERE ";
            $where_condition = '';
            $where_condition .= "question = '".$question_key[$x];
            $where_condition .= "' and answer = '".$quest_ans_array[$question_key[$x]]."'";
            $sql_stmt .= $where_condition;
            //print("<br>".$sql_stmt."</br>");
            $result = runInsertQuery($conn,$sql_stmt);    
            if($result->num_rows == 1){
                $no_of_correct++;
            }
        }
        echo '<script language="javascript">';
        echo 'alert(" You have scored '.$no_of_correct.' out of '.$no_of_questions.'");';
        echo 'window.location.href="marketingjob.php";';
        echo '</script>';
    }
    
    if(isset($_POST['submit-portal-questions'])){
        //print_r($_POST);
        $keys = array_keys($_POST);  //subjecttype] => Decision Making [question] => iwuerlkmkew [option1] => a [option2] => b [option3] => c [option4] => d [answer] => Option3 [submit-portal-questions] => Submit )
        $sql_stmt = "INSERT INTO `assessment`(`subjecttype`, `question`, `option1`, `option2`, `option3`, `option4`, `answer`) VALUES (";
        $size = sizeof($_POST);
        for($x = 0; $x < $size-1; $x++ ) { 
            if($keys[$x] == "answer"){
                if($_POST['answer']=="Option1"){
                    $sql_stmt .= "'".$_POST["option1"]."'";    
                }elseif ($_POST['answer']=="Option2") {
                    $sql_stmt .= "'".$_POST["option2"]."'";
                }elseif ($_POST['answer']=="Option3") {
                    $sql_stmt .= "'".$_POST["option3"]."'";
                }else{
                    $sql_stmt .= "'".$_POST["option4"]."'";
                }
            }else{
                if($x != $size - 2){
                    $sql_stmt .= "'".$_POST[$keys[$x]]."',"; 
                }else{
                    $sql_stmt .= "'".$_POST[$keys[$x]]."'"; 
                }
            }
        }
        $sql_stmt .= ")";
        //print($sql_stmt);
        $result = runInsertQuery($conn,$sql_stmt);
        echo '<script language="javascript">';
        echo 'alert(" Questions has been updated successfully ");';
        echo 'window.location.href="portal_questions.php";';
        echo '</script>';
    }


    if (isset($_POST['submit-teaching-attachement']) && !empty($_FILES['pdf_file']['name'])) {
        //a $_FILES 'error' value of zero means success. Anything else and something wrong with attached file.
        if ($_FILES['pdf_file']['error'] != 0) {
            echo 'Something wrong with the file.';
        } else { 
            //pdf file uploaded okay.
            //project_name supplied from the form field
            $project_name = 0;
            //attached pdf file information
            $file_name = $_FILES['pdf_file']['name'];
            $file_tmp = $_FILES['pdf_file']['tmp_name'];
            if ($pdf_blob = fopen($file_tmp, "rb")) {
                try {
                   $project_name = 1;
                   $insert_sql = "INSERT INTO `userDocs` ( `id`, `document_done`, `full_doc`) VALUES( :id, :document_done, :full_doc);";
                   /** This section of code is using a class called PDO 
                    * which is having db functions in methods. We are
                    * using here functions like 
                    * prepare() to prepare a sql statement ||y to preparedStatement in java 
                    * bindParam() which will bind the php variable to the placeholder variable
                    *  --> placeholder variabel is like :id,:document_done,:full_doc
                    * execute() will execute the prepared statement and give the desired result
                    * and error statement to print the error message
                    */
                   $connectionString = 'mysql:host=127.0.0.1;dbname='.$dbname;
                   $pdo_db = new PDO($connectionString, $username, $password);
                    $stmt = $pdo_db->prepare($insert_sql);
                    echo "<br>client id = ".$_POST['clientID']."</br>";
                    $stmt->bindParam(':id',$_POST['clientID']);
                    echo "<br>client id = ".$project_name."</br>";
                    $stmt->bindParam(':document_done', $project_name);
                    echo "<br>client id = ".$pdf_blob."</br>";
                    $stmt->bindParam(':full_doc', $pdf_blob, PDO::PARAM_LOB);
                    ob_start();
                    $stmt->debugDumpParams();
                    $r = ob_get_contents();
                    ob_end_clean();
                    if ($stmt->execute() === FALSE ) {
                        die(print_r($stmt->errorInfo(), true));
                        echo 'Could not save information to the database';
                    } else {
                        echo '<script language="javascript">';
                        echo 'alert(" Document has been updated successfully ");';
                        echo 'window.location.href="teachingjob.php";';
                        echo '</script>';
                    }
                    
                } catch (PDOException $e) {
                    //echo 'Database Error '. $e->getMessage(). ' in '. $e->getFile().': '. $e->getLine();
                    header("Location: failed.html");
                }
            } else {
                //fopen() was not successful in opening the .pdf file for reading.
                //echo 'Could not open the attached pdf file';
                header("Location: failed.html");
            }
        }
    }

    if(isset($_POST["create_pdf"])){
        require_once("tcpdf_min/tcpdf.php");
        $obj_pdf = new TCPDF('p',PDF_UNIT,PDF_PAGE_FORMAT,true,'UTF-8',false);
        $obj_pdf->SetCreator(PDF_CREATOR);
        $obj_pdf->SetTitle("Export html data to pdf using TCPDF in PHP");
        $obj_pdf->SetHeaderData('','',PDF_HEADER_TITLE,PDF_HEADER_STRING);
        $obj_pdf->SetHeaderFont(Array(PDF_FONT_NAME_MAIN,'',PDF_FONT_SIZE_MAIN));
        $obj_pdf->SetFooterFont(Array(PDF_FONT_NAME_DATA,'',PDF_FONT_SIZE_DATA));
        $obj_pdf->SetDefaultMonospacedFont('helvetica');
        $obj_pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
        $obj_pdf->SetMargins(PDF_MARGIN_LEFT, '5', PDF_MARGIN_LEFT);
        $obj_pdf->SetPrintHeader(false);
        $obj_pdf->SetPrintFooter(false);
        $obj_pdf->SetAutoPageBreak(TRUE,10);
        $obj_pdf->SetFont('helvetica','',12);
        $obj_pdf->AddPage();

        $resume_details_array = array();
        $resume_temp = "
<html>";
        $head_part = fopen("resume_template_head.txt", "r");
        $resume_temp .= $head_part;
        $resume_temp = "<body>
    <div id='page-wrap'>
        <div id='contact-info' class='vcard'>
            <!-- Microformats! -->
            <h1 class='fn'>".$_SESSION['username']."</h1>
            <p>
                Cell: <span class='tel'>555-666-7777</span><br />
                Email: <a class='email' href='mailto:greatoldone@lovecraft.com'>greatoldone@lovecraft.com</a>
            </p>
        </div>
        <div id='objective'>
            <p>
                I am an outgoing and energetic (ask anybody) young professional, seeking a
                career that fits my professional skills, personality, and murderous tendencies.
                My squid-like head is a masterful problem solver and inspires fear in who gaze upon it.
                I can bring world domination to your organization.
            </p>
        </div>
        <div class='clear'></div>
        <dl>
            <dd class='clear'></dd>
            <dt>Education</dt>
            <dd>
                <h2>Withering Madness University - Planet Vhoorl</h2>
                <p><strong>Major:</strong> Public Relations<br />
                    <strong>Minor:</strong> Scale Tending</p>
            </dd>
            <dd class='clear'></dd>
            <dt>Skills</dt>
            <dd>
                <h2>Office skills</h2>
                <p>Office and records management, database administration, event organization, customer support, travel
                    coordination</p>
                <h2>Computer skills</h2>
                <p>Microsoft productivity software (Word, Excel, etc), Adobe Creative Suite, Windows</p>
            </dd>
            <dd class='clear'></dd>
            <dt>Experience</dt>
            <dd>
                <h2>Doomsday Cult <span>Leader/Overlord - Baton Rogue, LA - 1926-2010</span></h2>
                <ul>
                    <li>Inspired and won highest peasant death competition among servants</li>
                    <li>Helped coordinate managers to grow cult following</li>
                    <li>Provided untimely deaths to all who opposed</li>
                </ul>

                <h2>The Watering Hole <span>Bartender/Server - Milwaukee, WI - 2009</span></h2>
                <ul>
                    <li>Worked on grass-roots promotional campaigns</li>
                    <li>Reduced theft and property damage percentages</li>
                    <li>Janitorial work, Laundry</li>
                </ul>
            </dd>
            <dd class='clear'></dd>
            <dt>Hobbies</dt>
            <dd>World Domination, Deep Sea Diving, Murder Most Foul</dd>
            <dd class='clear'></dd>
            <dt>References</dt>
            <dd>Available on request</dd>
            <dd class='clear'></dd>
        </dl>
        <div class='clear'></div>
    </div>
</body>
</html>
        ";

        //$obj_pdf->writeHTML($content);
        $obj_pdf->writeHTML($resume_temp);
        ob_end_clean();
        $obj_pdf->Output('Saple.pdf','I');

    }

    function getQuestionsAndOptions($conn){
      $sql_stmt = "SELECT subjecttype,question,option1,option2,option3,option4 FROM assessment";
      return runSelectQuery($conn,$sql_stmt);
    }
    
    function updateUserProfile($conn,$userProfile){
        $sql_stmt = "UPDATE `register` SET `Name`='".$userProfile['Name']."',`E_mailId`='".$userProfile['EmailID']."',`ContactNumber`='".$userProfile['ContactNumber']."',`DateofBirth`='".$userProfile['DOB']."',`Gender`='".$userProfile['Gender']."' WHERE id = ".$_SESSION['userid'];
        if ($conn->query($sql_stmt) == TRUE)
        {
            return 0;
        }else{
            return 1;
        }
    }

    function addUserAcivity($conn,$sessID,$userID,$userName,$activity){
        // sql query to store session variable
        $sql_stmt = "INSERT INTO `userActivity`(`sessionID`, `userID`, `userName`, `userActivity`) 
        VALUES ('$sessID','$userID','$userName','$activity')";
        if ($conn->query($sql_stmt) == TRUE)
        {
            if($activity == 'logout'){
                // destroy everything in this session
                unset($_SESSION);
                if (ini_get("session.use_cookies")) {
                    $params = session_get_cookie_params();
                    setcookie(session_name(), '', time() - 42000, $params["path"], $params["domain"], $params["secure"],$params["httponly"]);
                }            
                session_destroy();
            }
            return 0;
        }else{
            return 1;
        }
    }

    function getDetailsWithUserID($conn,$userID,$userName){
        $sql_stmt = "SELECT * FROM `register` WHERE id = $userID and Name = '$userName'";
        //echo "<br><br><p>".$sql_stmt."</p>";
        $result = $conn->query($sql_stmt);
        $userDetails = array();
        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                $userDetails["Name"] = $row["Name"];
                $userDetails["EmailID"] = $row["E_mailId"];
                $userDetails["ContactNumber"] = $row["ContactNumber"];
                $userDetails["DateofBirth"] = $row["DateofBirth"];
                $userDetails["Gender"] = $row["Gender"];
            }
        } else {
            return 0;
        }
        return $userDetails;
    }

    function runInsertQuery($conn,$sql_stmt){
        $result = $conn->query($sql_stmt);
        if ($result) {
            return $result;
        } else {
            return 0;
        }
    }

    function runSelectQuery($conn,$sql_stmt){
        $result = $conn->query($sql_stmt);
        if ($result->num_rows > 0) {
            return $result;
        } else {
            return 0;
        }
    }

    function runSelectCountQuery($conn,$sql_stmt){
        echo $sql_stmt;
        $result = $conn->query($sql_stmt);
        print_r($result);
        $data=$result->fetch_array(MYSQLI_NUM);
        print_r($data[0]);
        if ($result->num_rows) {
            return $data[0];
        } else {
            return 0;
        }
    }

    function updateUserInfo($conn,$sql_stmt,$column_name){
        $sql_stmt = "UPDATE userinfo SET ".$column_name." = 1 WHERE id=".$_SESSION['userid'].";";
        $result = $conn->query($sql_stmt);
        if ($result) {
            return 1;
        } else {
            return 0;
        }
    }
    function checkResumeStatus($conn,$userName){
        $sql_stmt = "Select count(*) from usersresume where fullname = '".$userName."'";
        $result = runSelectQuery($conn,$sql_stmt);
    }

    function getResumeData($conn,$userName){
        $sql_stmt = "Select * from usersresume where fullname = 'g'";
        $result = runSelectQuery($conn,$sql_stmt);
    }
?>