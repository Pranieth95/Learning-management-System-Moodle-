<?php
include_once('config.php');
if(isset($_POST['submit']))
{

    $username  = $_POST['username'];
    $qid    = $_POST['qid'];
    $answer  = $_POST['answer'];
    if((!empty($username)) && (!empty($qid)) && (!empty($answer)))
    {
        $result = mysqli_query($conn, "INSERT INTO `cirp`.`answer`
            (`id`,
             `answer`,
             `q_ID`,
             `user_email`)
        VALUES (NULL,
            '$answer',
            '$qid',
            '$username');");

        if ($result) 
        {
            header('location:home.php');
        } 
        else 
        {
            echo "failed";
        }

        $result2= mysqli_query($conn , "SELECT * FROM question WHERE `q_ID`='$qid'");
        while ($row = mysqli_fetch_assoc($result2))
        {
            $currentReply=$row['replies'];
            $reply=$currentReply + 1;

            $result3= mysqli_query($conn , "UPDATE question SET `replies`='$reply' WHERE `q_id`='$qid' ");

            if($result3)
            {
                echo "succsec";
            }
            else
            {
                echo "fail";
            }
        }
    }
    else
    {
        header('location: reply.php?registeration_fail=<span style="color:red">Please Fill All the Feilds.</span>');

    }
}
?>