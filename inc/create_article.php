<?php
session_start();
if (isset($_SESSION['username'])) //SESSION DOES EXIST
{
    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        include("scripts/header.php");
        ?>
        <main>
            <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
            <script>tinymce.init({selector: 'textarea'});</script>
            <form action="createarticle" method="post">
                <input type="text" name="articleName" placeholder="Article Name">
                <textarea name="articleText"></textarea>
                <label>Category</label>
                <select name="category">
                    <option value= "creepy stories"creepy stories </option>
                    <option value ="Life update" Life Update </option>
                    <option value = "recommendations" recommendations </option>
                </select>
                <br>

                <input type="submit">
            </form>
        </main>
        <?
        include("scripts/footer.php");
    } elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
        include ('scripts/dbconnect.php');
        $articleID = str_replace(' ', '-', $_POST["articleName"]);
        $articleName = $_POST["articleName"];
        $articleText = $_POST["articleText"];
        $articleAuthor = $_SESSION['username'];
        $articleCategory = $_SESSION['category'];
        $sql = "INSERT INTO blogArticles (articleID, articleName, articleText,
articleAuthor, category) VALUES ('". $articleID ."', '" .$articleName."', '".$articleText."',
'".$articleAuthor."')";
        if (mysqli_query($db, $sql)) {
        } else {
            echo "Error: " . $sql . "<br>Error Message:" . mysqli_error($db);
        }
        header("blog");
    }
//test
} else {
    header("location:login");
}
?>