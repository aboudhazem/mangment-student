<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@300&display=swap" rel="stylesheet">
<link rel="stylesheet" href="style.css">

<<body dir="rtl">


<div id="mother">
<form action="index.php" method="POST">

  <!-- لوحة التحكم -->
 <aside> 
  <div id = "div">

  <img src="https://img.lovepik.com/photo/50128/2226.jpg_wh860.jpg" alt="logo" width="200">

  <h3>  لوحة المدير  </h3>

  <label>  رقم الطالب :</label> <br>

  <input type="text" name="id" id="id"> <br>
  <label>  اسم  الطالب :</label> <br>
  <input type="text" name="name"  id="name"> <br>
  <label>  عنوان  الطالب :</label> <br>
  <input type="text" name="adress" id="adress"> <br>
  <button  name ="add">  اضافة طالب   </button>
  <button name ="del"> حذف الطالب  </button>

  </div>

 </aside>

              <!-- عرض بيانات الطلاب -->
    <main>
     <table id="tbl"> 
    <tr>  
       <th>الرقم التسلسلي </th>
       <th> اسم الطالب  </th>
       <th>  عنوان الطالب </th>

            </tr>

            <?php 
            
            
               while($row=mysqli_fetch_array( $result )) {


                echo "<tr>";
                echo "<td>".$row['id']."</td>";
                echo "<td>".$row['name']."</td>";
                echo "<td>".$row['adress']."</td>";
                echo "</tr>";
              
               }
            
            
            
            ?>
 
   </table>

  </main> 
 
  </form>



  
  <!-- الاتصال مع الداتا بيز -->

  <?php   
              
              $host='localhost';
              $user='root';
              $password='root';
              $dbName  ='students';
              $conn =mysqli_connect($host,$user,$password, $dbName);
              
            

              // ارسال البيانات  الطلاب  الي الداتا بيز 
              $SID          =$_POST['id'];
              $SName        =$_POST['name'];
              $SAdress      =$_POST['adress'];
              $SAdd         =$_POST['add'];
              $SDelate      =$_POST['del'];


              if($SAdd){
               
               $query="INSERT INTO student(id,name,adress) VALUE('$SID','$SName','$SAdress')";
               $result = mysqli_query($conn,$query);

               header("location:index.php");
              }
 
              if($SDelate ) {
                  $query="delete from student where name= ' $SName ' ";
                  $result = mysqli_query($conn,$query);
                  header("location:index.php");


              }
              
             
             ?>





 </div>

            

   
    
</body>
</html>