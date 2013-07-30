
<html>
 <head>
  <title>Edit Text</title>
 </head>
 <body>
<h1>Edit Text</h1>

<a href="index.html">&lt;&lt; Back to main page</a><br /><br />

<?php
  if (isset($_POST['newcontent']))
  {
    // Part 1: generate diff
    file_put_contents('index_new.txt', $_POST['newcontent']);
    $diff_output = shell_exec('diff -u index.txt index_new.txt');

    // Part 2: send email:    
    if (isset($_POST["email_jed"]))
    {
      if (mail('jedbrown@mcs.anl.gov', 'Update the webpage, diff attached', $diff_output))
        echo "Email to Jed sent!<br />";
      else
        echo "Email to Jed NOT sent!";
    }
    if (isset($_POST["email_karli"]))
    {
      if (mail('rupp@mcs.anl.gov', 'Update the webpage, diff attached', $diff_output))
        echo "Email to Karli sent!<br />";
      else
        echo "Email to Karli NOT sent!";
    }

    // Part 3: put new content online
    file_put_contents('index.txt', $_POST['newcontent']);
    echo exec('asciidoc -a max-width=45em index.txt');
    echo '<span style="color:darkgreen;">Page updated!</span><br /><br />';
  }
?>

  <form action="edit.php" method="POST">
  <textarea rows="30" cols="80" name="newcontent">
<?php
  echo trim(file_get_contents('index.txt'));
?>  
</textarea> <br />

  <table>
  <tr><td><input type="checkbox" name="email_jed" value="yes"></td><td>Email to Jed</td></tr>
  <tr><td><input type="checkbox" name="email_karli" value="yes"></td><td>Email to Karli</td></tr>
  <tr><td><input type="checkbox" name="email_list" value="yes"></td><td>Email to mailing list (inactive)</td></tr>
  </table>
  <input type="submit" value="Submit Changes">
  </form>
 </body>
</html>

